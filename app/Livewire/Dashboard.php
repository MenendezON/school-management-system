<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $students = Student::all();
        return view('livewire.dashboard', ['students' => $students])->layout('layouts.app');
    }
}
