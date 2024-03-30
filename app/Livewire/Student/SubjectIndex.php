<?php

namespace App\Livewire\Student;

use App\Models\Classroom;
use App\Models\Teacher;
use Livewire\Component;

class SubjectIndex extends Component
{
    public $classroom;
    public $category;
    public $label;
    public $value = 20;
    public $teacher_id;
    public $createSubjectModal = false;

    public function mount($id){
        $this->classroom = Classroom::find($id);
    }

    public function showSubjectModal()
    {
        $this->createSubjectModal = true;
    }

    public function create(){
        $this->classroom->subjects()->create(['category'=> $this->category, 'teacher_id'=>$this->teacher_id, 'label' => $this->label, 'value'=>$this->value]);
        $this->reset('category', 'label', 'value', 'teacher_id');
        session()->flash('success', 'The subject has been added successfully!');
        $this->createSubjectModal = false;
    }

    public function render()
    {
        return view('livewire.student.subject-index')->layout('layouts.app');
    }
}
