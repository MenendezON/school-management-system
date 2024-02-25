<?php

namespace App\Livewire\Student;

use App\Models\Classroom;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ShowClassroom extends Component
{

    public $id;
    public $yearfilter = '';

    public function mount($id)
    {
        $this->id = $id;
        date('m') <= 7 ? $this->yearfilter = (date('Y') - 1) . ' - ' . date('Y') : $this->yearfilter = date('Y') . ' - ' . (date('Y') + 1);
    }

    public function generateSchoolYears()
    {
        $currentYear = date('Y');
        $schoolYear = [];

        for ($year = $currentYear; $year >= 2000; $year--) {
            $schoolYear[] = $year; 
        }
        return $schoolYear;
    }

    public function render()
    {
        $classroom = DB::table('classroom_student')
            ->join('students', 'classroom_student.student_id', '=', 'students.id')
            ->join('classrooms', 'classroom_student.classroom_id', '=', 'classrooms.id')
            ->where('classroom_student.classroom_id', $this->id)
            ->where('classroom_student.schoolyear', 'like', '%'.$this->yearfilter.'%')
            ->get();

        return view('livewire.student.show-classroom', [
            'classroom' => $classroom,
            'generateSchoolYears' => $this->generateSchoolYears()
        ])->layout('layouts.app');
    }
}
