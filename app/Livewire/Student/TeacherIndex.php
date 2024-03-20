<?php

namespace App\Livewire\Student;

use Livewire\Attributes\Rule;
use App\Models\Teacher;
use Livewire\Component;

class TeacherIndex extends Component
{
    public $createTeacherModal = false;

    #[Rule("required|min:3|max:50")]
    public $first_name;
    #[Rule("required|min:2|max:50")]
    public $last_name;
    #[Rule("required|min:3|max:50")]
    public $spec;
    #[Rule("required|min:6|max:50")]
    public $email;
    #[Rule("required|min:3|max:50")]
    public $phone_1;
    public $phone_2;

    public function create(){
        $this->validate();
    }

    public function showCreateTeacherModal()
    {
        $this->createTeacherModal = true;
    }
    public function render()
    {
        $teachers = Teacher::with('subjects')->get();
        return view('livewire.student.teacher-index',[
            'teachers' => $teachers,
        ])->layout('layouts.app');
    }
}
