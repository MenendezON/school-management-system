<?php

namespace App\Livewire\Student;

use App\Models\Medical;
use App\Models\Student;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MedicalIndex extends Component
{
    public $id;
    public function mount($student){
        $this->id = $student->id;
    }
    public function render()
    {
        (!auth()->user()->canRead() || Auth::user()->currentTeam->id !== Team::find(1)->id) && abort(403, 'Unauthorized action.');
        $medical = Medical::where('student_id', $this->id)->first();
        return view('livewire.student.medical-index', [
            'medical'=> $medical
        ]);
    }
}
