<?php

namespace App\Livewire\Student;

use App\Models\Medical;
use App\Models\Student;
use Livewire\Component;

class MedicalIndex extends Component
{
    public ?Student $student;
    public function mount($student)
    {
        $this->student = $student;
    }

    public function render()
    {
        $medical = Medical::all();
        return view('livewire.student.medical-index', [
            'medical'=> $medical
        ]);
    }
}
