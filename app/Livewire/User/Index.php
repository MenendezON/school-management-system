<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Team;
use Laravel\Jetstream\Jetstream;
use App\Livewire\Forms\UserForm;

class Index extends Component
{
    public UserForm $form;
    public $createUserModal = false;
    public ?User $user;
    public $editMode = false;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
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

            $this->form->createUser($input);
            $this->form->reset();
            
            $this->createUserModal = false;
        }
    }

    public function showCreateUserModal()
    {
        $this->createUserModal = true;
    }

    #[Layout('layouts.app')]
    public function render()
    {
        (!auth()->user()->canRead() || Auth::user()->currentTeam->id !== Team::find(1)->id) && abort(403, 'Unauthorized action.');
         
        (!Auth::user()->hasTeamRole(Auth::user()->currentTeam, 'admin')) && redirect()->route('dashboard');

        return view('livewire.user.index');
    }
}
