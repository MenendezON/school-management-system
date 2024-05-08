<?php

namespace App\Livewire\Student;

use App\Models\Medical;
use App\Models\Student;
use Livewire\Component;

class MedicalIndex extends Component
{
    public $id;
    public function mount($student){
        $this->id = $student->id;
    }
    public function render()
    {
        $medical = Medical::where('student_id', $this->id)->first();
        return view('livewire.student.medical-index', [
            'medical'=> $medical
        ]);
    }
}
