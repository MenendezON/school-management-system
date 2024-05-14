<?php

namespace App\Livewire\Student;

use Livewire\Attributes\Rule;
use Livewire\Attributes\On;
use App\Models\Teacher;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TeacherIndex extends Component
{
    public ?Teacher $teacher;
    public $editMode = false;

    public $createTeacherModal = false;

    #[Rule("required|min:3|max:50")]
    public $first_name;
    #[Rule("required|min:2|max:50")]
    public $last_name;
    #[Rule("required|min:3|max:50")]
    public $speciality;
    #[Rule("required|min:6|max:50")]
    public $email;
    #[Rule("required|min:3|max:50")]
    public $phone_1;
    public $phone_2;

    public function setTeacher(Teacher $teacher)
    {
        $this->teacher = $teacher;
        $this->editMode = true;
        $this->first_name = ucwords($teacher->first_name);
        $this->last_name = strtoupper($teacher->last_name);
        $this->speciality = $teacher->speciality;
        $this->email = $teacher->email;
        $this->phone_1 = $teacher->phone_1;
        $this->phone_2 = $teacher->phone_2;
    }

    public function create(){
        $this->validate();

        if($this->editMode)
        {
            (!auth()->user()->canUpdate() || Auth::user()->currentTeam->id !== Team::find(1)->id) && abort(403, 'Unauthorized action.');
            
            $this->teacher->update($this->all());
            $this->reset();
            request()->session()->flash('success', "L'enseignant a été mis à jour!");
            $this->createTeacherModal = false;
        }else{
            (!auth()->user()->canCreate() || Auth::user()->currentTeam->id !== Team::find(1)->id) && abort(403, 'Unauthorized action.');
            
            Teacher::create($this->all());
            $this->reset();
            session()->flash('success', "L'enseignant a été créée!");
            $this->createTeacherModal = false;
        }
    }

    #[On('edit-teacher')]
    public function editTeacher($id)
    {
        $teacher = Teacher::findOrFail($id);
        $this->setTeacher($teacher);

        $this->showCreateTeacherModal();
    }

    public function deleteTeacher(Teacher $teacher)
    {
        (!auth()->user()->canDestroy() || Auth::user()->currentTeam->id !== Team::find(1)->id) && abort(403, 'Unauthorized action.');
        $teacher->delete();
    }

    public function showCreateTeacherModal()
    {
        $this->createTeacherModal = true;
    }
    public function render()
    {
        (!auth()->user()->canRead() || Auth::user()->currentTeam->id !== Team::find(1)->id) && abort(403, 'Unauthorized action.');
            
        $teachers = Teacher::with('subjects')->get();
        return view('livewire.student.teacher-index',[
            'teachers' => $teachers,
        ])->layout('layouts.app');
    }
}
