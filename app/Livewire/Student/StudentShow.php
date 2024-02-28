<?php

namespace App\Livewire\Student;

use App\Models\Student;
use App\Models\Tutor;
use Livewire\Attributes\Rule;
use Livewire\Component;

class StudentShow extends Component
{
    public $id;
    public $students;
    public $createTutorModal = false;


    #[Rule("required|min:5|max:50")]
    public $first_name;
    #[Rule("required|min:5|max:50")]
    public $last_name;
    #[Rule("required")]
    public $relationship;
    #[Rule("required|min:13|max:20")]
    public $phone_1;
    public $phone_2;
    public $email = '';

    public function mount($id){
        $this->id = $id;
        $this->reset('students');
        $this->students = Student::findOrfail($id);
    }

    // Create a new tutor for a specific student
    public function create(){
        $this->validate();
        $this->students->tutors()->create($this->only(['first_name', 'last_name','relationship','phone_1', 'phone_2', 'email']));
        $this->reset('first_name', 'last_name', 'relationship', 'phone_1', 'phone_2', 'email');
        session()->flash('success', 'The tutor has been added successfully!');
        $this->createTutorModal = false;

    }

    public function showCreateTutorModal()
    {
        $this->createTutorModal = true;
    }

    public function render()
    {
        return view('livewire.student.student-show', ['student' => $this->students])->layout('layouts.app');
    }
}
