<?php

namespace App\Livewire\User;

use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Liste extends Component
{
    use WithPagination;
    public $createUserModal = false;
    public ?User $user;
    public $editMode = false;
    public $name;
    public $email;
    public $password;

    public function setUser(User $user)
    {
        $this->user = $user;
        $this->editMode = true;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = $user->password;
    }

    #[On('edit-user')]
    public function editUser($id)
    {
        //$user = User::findOrFail($id);
        //$this->setUser($user);

        $this->showCreateUserModal();
    }

    public function showCreateUserModal()
    {
        $this->createUserModal = true;
    }
    
    public function delete(User $user)
    {
        (!auth()->user()->canDestroy() || Auth::user()->currentTeam->id !== Team::find(1)->id) && abort(403, 'Unauthorized action.');
        $user->delete();
        return redirect()->route('user.index')->with('success', "L'utilisateur a été supprimé!");
    }

    #[Layout('layouts.app')]
    public function render()
    {
        $users = User::paginate(6);
        return view('livewire.user.liste',[
            'users'=> $users,
        ]);
    }
}
