<?php

namespace App\Livewire\Student;

use App\Models\Option;
use App\Models\Student;
use App\Models\Survey;
use App\Models\Team;
use App\Models\Tutor;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\On;
use Livewire\Component;

class StudentShow extends Component
{
    public $student;

    public ?Tutor $tutor;
    public $editTutorMode;

    
    #[Rule("required|min:3|max:50")]
    public $first_name;
    #[Rule("required|min:2|max:50")]
    public $last_name;
    #[Rule("required")]
    public $relationship;
    #[Rule("required")]
    public $nationality;
    #[Rule("required|min:5")]
    public $address;
    public $occupation = '';
    public $duty_station;
    #[Rule("required|min:13|max:20")]
    public $phone;
    public $email = '';
    public $evaluations;

    public $createTutorModal = false;

    public function setTutor($tutor){
        $this->tutor = $tutor;
        $this->editTutorMode = true;
        $this->first_name = ucwords($tutor->first_name);
        $this->last_name = strtoupper($tutor->last_name);
        $this->relationship = $tutor->relationship;
        $this->nationality = $tutor->nationality;
        $this->address = $tutor->address;
        $this->occupation = $tutor->occupation;
        $this->duty_station = $tutor->duty_station;
        $this->phone = $tutor->phone;
        $this->email = $tutor->email;
    }

    public function mount($id){
        $this->reset('student');
        $this->student = Student::findOrfail($id);

        $this->evaluations = Option::select('options.quarter', 'surveys.title', 'options.academic_year')
        ->join('questions', 'options.question_id', '=', 'questions.id')
        ->join('surveys', 'questions.survey_id', '=', 'surveys.id')
        ->where('options.student_id', $id)
        ->groupBy('options.quarter', 'surveys.title', 'options.academic_year')
        ->get();
    }

    // Create a new tutor for a specific student
    public function create(){
        $this->validate();

        if($this->editTutorMode){
            (!auth()->user()->canUpdate() || Auth::user()->currentTeam->id !== Team::find(1)->id) && abort(403, 'Unauthorized action.');
            $this->tutor->update($this->all());
            request()->session()->flash('success', "Un lien parenté a été modifié avec succès");
            $this->createTutorModal = false;
        }else{
            (!auth()->user()->canCreate() || Auth::user()->currentTeam->id !== Team::find(1)->id) && abort(403, 'Unauthorized action.');
            $this->student->tutors()->create($this->only(['first_name', 'last_name','relationship', 'nationality', 'address', 'occupation', 'duty_station', 'phone', 'email']));
            request()->session()->flash('success', 'The tutor has been added successfully!');
            $this->createTutorModal = false;
        }
    }

    #[On('edit-tutor')]
    public function editTutor($id)
    {
        $tutor = Tutor::findOrFail($id);
        $this->setTutor($tutor);

        $this->showCreateTutorModal();
    }

    public function deleteTutor(Tutor $tutor)
    {
        (!auth()->user()->canDestroy() || Auth::user()->currentTeam->id !== Team::find(1)->id) && abort(403, 'Unauthorized action.');
        $tutor->delete();
    }

    public function showCreateTutorModal()
    {
        $this->createTutorModal = true;
    }

    #[Layout('layouts.app')] 
    public function render()
    {
        (!auth()->user()->canRead() || Auth::user()->currentTeam->id !== Team::find(1)->id) && abort(403, 'Unauthorized action.');
            
        return view('livewire.student.student-show', [
            'student' => $this->student,
            'evaluations' => $this->evaluations,
        ]);
    }
}
