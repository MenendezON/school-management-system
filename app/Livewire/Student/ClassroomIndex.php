<?php

namespace App\Livewire\Student;

use Livewire\Component;

class ClassroomIndex extends Component
{
    public function render()
    {
        return view('livewire.student.classroom-index')->layout('layouts.app');
    }
}
