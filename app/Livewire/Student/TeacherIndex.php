<?php

namespace App\Livewire\Student;

use App\Models\Teacher;
use Livewire\Component;

class TeacherIndex extends Component
{
    public function render()
    {
        $teachers = Teacher::with('subjects')->get();
        return view('livewire.student.teacher-index',[
            'teachers' => $teachers,
        ])->layout('layouts.app');
    }
}
