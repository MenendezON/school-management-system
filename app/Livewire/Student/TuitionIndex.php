<?php

namespace App\Livewire\Student;

use App\Models\Classroom;
use App\Models\Student;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class TuitionIndex extends Component
{
    use WithPagination;

    public $createTuitionModal = false;

    #[Rule("Required")]
    public $studentId;
    #[Rule("Required")]
    public $classroomId;
    #[Rule("Required")]
    public $label;
    #[Rule("Required|min:5")]
    public $amount;

    public $field_search;

    public $classrooms=[];


    public function showCreateTuitionModal()
    {
        $this->createTuitionModal = true;
    }

    public function create(){
        (!auth()->user()->canCreate() || Auth::user()->currentTeam->id !== Team::find(1)->id) && abort(403, 'Unauthorized action.');
            
        $this->validate();
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
        (!auth()->user()->canRead() || Auth::user()->currentTeam->id !== Team::find(1)->id) && abort(403, 'Unauthorized action.');
            
        $students = DB::table('tuitions')
        ->join('students', 'tuitions.student_id', '=', 'students.id')
        ->join('classrooms', 'tuitions.classroom_id', '=', 'classrooms.id')
        ->where('first_name', 'like', "%$this->field_search%")
        ->orWhere('last_name', 'like', "%$this->field_search%")
        ->get();
        
        return view('livewire.student.tuition-index', [
            'students'=>$students,
            'generateSchoolYears' => $this->generateSchoolYears(),
            ])->layout('layouts.app');
    }
}
