<?php

namespace App\Livewire\Student;

use App\Models\Medical;
use App\Models\Student;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

class MedicalCreate extends Component
{
    public $createMedicalModal = false;
    public $editMode = false;
    public ?Student $student;

    public $field1;

    public $id;
    public function mount($student){
        $this->id = $student->id;
    }

    public function setMedical(Medical $medical)
    {
        $this->medical = $medical;
        $this->editMode = true;
        $this->field1 = $medical->field1;
    }

    public function create()
    {
        //$this->validate();
        if($this->editMode){
            $this->student->medical()->update($this->only(['field1']));
            request()->session()->flash("success", "Le dossier médical a été crée");
            $this->createMedicalModal = false;
        }else{
            $this->student->medical()->create($this->only(['field1']));
            request()->session()->flash("success", "Le dossier médical a été crée");
            $this->createMedicalModal = false;
        }
    }

    public function showCreateMedicalModal()
    {
        $this->createMedicalModal = true;
    }

    #[On('edit-medical')]
    public function editMedical($id)
    {
        $medical = Medical::find($id);
        $this->setMedical($medical);

        $this->showCreateMedicalModal();
    }

    public function render()
    {
        $medical = Medical::where('student_id', $this->id)->first();
        return view('livewire.student.medical-create', [
            'medical'=> $medical
        ]);
    }
}
