<?php

namespace App\Livewire\Student;

use App\Models\Classroom;
use App\Models\Subject;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NoteIndex extends Component
{
    public $classroomID = 'classroom ID';
    public $subjectID = 'subject ID';

    public function mount($idclassroom, $idsubject){
        $this->classroomID = Classroom::find($idclassroom)->students()->where('academic_year', '2024-2025')->get();
        $this->subjectID = Classroom::find($idclassroom)->Subjects()->get();//Subject::find($idsubject);
    }

    public function render()
    {
        (!auth()->user()->canRead() || Auth::user()->currentTeam->id !== Team::find(1)->id) && abort(403, 'Unauthorized action.');
        return view('livewire.student.note-index')->layout('layouts.app');
    }
}
