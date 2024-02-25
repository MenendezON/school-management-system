<?php

namespace App\Livewire\Student;

use App\Models\Student;
use Livewire\Component;

class Search extends Component
{
    public $search;
    public $student = [];


    public function searchfunction()
    {
        if (!$this->search) {
            $this->student = Student::all();
        } else {
            $this->student = Student::query()
                ->where('first_name', 'LIKE', "%{$this->search}%")
                ->orWhere('last_name', 'LIKE', "%{$this->search}%")
                ->orWhere('email', 'LIKE', "%{$this->search}%")
                ->get();
        }
    }
    public function render()
    {
        return view('livewire.student.search', ['student' => $this->student]);
    }
}
