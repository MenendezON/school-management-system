<?php

namespace App\Livewire\Users;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use App\Actions\Fortify\CreateNewUser;
use App\Models\Team;
use Illuminate\Support\Facades\DB;
use Laravel\Jetstream\Jetstream;
use App\Actions\Jetstream\CreateTeam;

use Laravel\Jetstream\Events\AddingTeamMember;
use Laravel\Jetstream\Events\TeamMemberAdded;

class Index extends Component
{
    use PasswordValidationRules;
    public $createUserModal = false;
    public ?User $user;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $role;
    public $currentTeam;

    public function mount()
    {
        $this->user = Auth::user();
        $this->currentTeam = $this->user->currentTeam;
    }

    public function save()
    {
        $input = [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'terms' => null,
        ];

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        if ($this->password === $this->password_confirmation) {
            $this->password = Hash::make($this->password);

            return DB::transaction(function () use ($input) {
                return tap(User::create([
                    'name' => $input['name'],
                    'email' => $input['email'],
                    'password' => Hash::make($input['password']),
                ]), function (User $user) {
                    $this->createTeam($user);
                    //dd($this->currentTeam->id);
                    //$user->update(['current_team_id' => $this->currentTeam->id]);
                    //$this->add($this->user, $this->currentTeam, $this->email, $this->role);
                });
            });
        }

        $this->createUserModal = false;
    }

    protected function createTeam(User $user): void
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
    }

    public function showCreateUserModal()
    {
        $this->createUserModal = true;
    }

    #[Layout('layouts.app')]
    public function render()
    {
        (!auth()->user()->canRead() || Auth::user()->currentTeam->id !== Team::find(1)->id || !Auth::user()->hasTeamRole(Auth::user()->currentTeam, 'admin')) && abort(403, 'Unauthorized action.');
        
        $users = User::all();
        return view('livewire.users.index', ['users' => $users]);
    }
}
