<?php

namespace App\Livewire\Student;

use Livewire\Component;
use Livewire\Attributes\Rule;
use App\Models\Classroom;
use App\Models\Student;
use Livewire\WithPagination;

class StudentClassroomIndex extends Component
{

    use WithPagination;

    public $students;
    public $classrooms;
    #[Rule('required')]
    public $academic_year;

    #[Rule('required')]
    public $selectStudent = null;
    #[Rule('required')]
    public $selectClassroom = null;
    //public $classroomId;
    public $observations = '';

    //public $speclassroom = [];

    public $createStudentClassroomModal = false;

    public function mount()
    {
        $this->students = Student::all();
        $this->classrooms = Classroom::all();
    }

    public function updatedSelectStudent($student)
    {
        $decision = Student::find($student)->decision;
        $this->classrooms = Classroom::where('type', $decision)->get();
    }

    public function create()
    {
        $this->validate();
        $student = Student::find($this->selectStudent);
        $classroom = Classroom::find($this->selectClassroom);

        $classroom->students()->attach($student->id, ['observations' => $this->observations, 'academic_year' => $this->academic_year]);

        $this->reset('selectStudent', 'selectClassroom', 'academic_year', 'observations');

        request()->session()->flash('success', 'The student has beed added successfully to the classroom');
        $this->createStudentClassroomModal = false;
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

    public function showCreateStudentClassroomModal()
    {
        $this->createStudentClassroomModal = true;
    }

    public function render()
    {
        $students = Student::orderBy('last_name', 'asc')->paginate(10);
        
        return view('livewire.student.studentclassroom-index', [
            'liststudents' => $students,
            'generateSchoolYears' => $this->generateSchoolYears(),
            //'speclassroom' => $this->speclassroom,
        ])->layout('layouts.app');
    }
}
