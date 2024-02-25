<?php

namespace App\Livewire\Student;

use Livewire\Component;
use App\Models\Classroom;
use App\Models\Student;

class StudentClassroomIndex extends Component
{

    public $schoolyear;
    public $studentId;
    public $classroomId;
    public $observations = '';

    

    public function create(){

        //$this->validate();
        $student = Student::find($this->studentId);
        $classroom = Classroom::find($this->classroomId);

    // Adding the product to the cart with the specified quantity
        $classroom->students()->attach($student->id, ['schoolyear' => $this->schoolyear, 'observations'=> $this->observations]);

        $this->reset('studentId', 'classroomId', 'schoolyear', 'observations');

        session()->flash('success', 'The student has beed added successfully to the classroom');
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

    public $createStudentClassroomModal = false;

    public function showCreateStudentClassroomModal()
    {
        $this->createStudentClassroomModal = true;
    }

    public function render()
    {
       


        $students = Student::orderBy('id','desc')->paginate(10);

        // find product in the order and access extra field 'quantity' from pivot
        //$quantity = $order->products->find($product->id)->pivot->quantity;
        return view('livewire.student.studentclassroom-index', ['students' => $students, 'generateSchoolYears' => $this->generateSchoolYears()])->layout('layouts.app');
    }
}
