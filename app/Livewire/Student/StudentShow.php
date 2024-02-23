<?php

namespace App\Livewire\Student;

use App\Models\Student;
use Livewire\Component;

class StudentShow extends Component
{
    public $id;
    public $students;

    public function mount($id){
        $this->id = $id;
        $this->students = Student::findOrfail($id);
    }

    public function render()
    {
        return view('livewire.student.student-show', ['student' => $this->students])->layout('layouts.app');
    }
}
