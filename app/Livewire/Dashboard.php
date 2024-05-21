<?php

namespace App\Livewire;

use App\Models\Student;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public $team;
    public $currentTeam;

    public function mount()
    {
       $this->team = Team::find(1); 
       $this->currentTeam = Auth::user()->currentTeam;

       if(Team::find(1)->id !== Auth::user()->currentTeam->id)
       {
        //abort(403);
        //return redirect()->route('dashboard');
       }
    }
    public function render()
    {
        if(Auth::user()->email === "satabah@yahoo.fr"){
            redirect()->route('survey-index');
        }
            

        $students = Student::all();
        return view('livewire.dashboard', ['students' => $students])->layout('layouts.app');
    }
}
