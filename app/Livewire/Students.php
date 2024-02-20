<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Student;
use Livewire\WithPagination;

class Students extends Component
{
    use WithPagination;

    public function render()
    {
        $students = Student::where('user_id', auth()->user()->id)->paginate(12);
        return view('livewire.students', ['students'=> $students])->layout('layouts.app');
    }
}
