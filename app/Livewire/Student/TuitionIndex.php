<?php

namespace App\Livewire\Student;

use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class TuitionIndex extends Component
{
    use WithPagination;
    public $createTuitionModal = false;
    public $studentId;

    public $classroomId;

    public $label;
    public $amount;
    //public $schoolYear = 

    public $classrooms=[];

    public function showCreateTuitionModal()
    {
        $this->createTuitionModal = true;
    }

    public function create(){
        $tab = explode(',',$this->classroomId);
        
        $student = Student::find($this->studentId);
        $classroom = Classroom::find($tab[0]);

        $classroom->studentsfees()->attach($student->id, ['label'=> $this->label, 'amount'=>$this->amount, 'academic_year' => $tab[1]]);
        $this->reset('studentId', 'classroomId', 'label', 'amount');

        session()->flash('success', 'The tuition has beed added successfully');
        $this->createTuitionModal = false;
    }

    public function fillSelect(){
        $this->classrooms = Student::findOrFail($this->studentId)->classrooms()->withPivot('academic_year', 'observations')->get();
    }

    public function render()
    {
        $students = DB::table('tuitions')
        ->join('students', 'tuitions.student_id', '=', 'students.id')
        ->join('classrooms', 'tuitions.classroom_id', '=', 'classrooms.id')
        ->get();
        
        return view('livewire.student.tuition-index', ['students'=>$students])->layout('layouts.app');
    }
}
