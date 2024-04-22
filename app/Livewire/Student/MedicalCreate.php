<?php

namespace App\Livewire\Student;

use App\Models\Medical;
use App\Models\Student;
use Livewire\Attributes\On;
use Livewire\Component;

class MedicalCreate extends Component
{
    public $createMedicalModal = false;
    public $editMode = false;

    public ?Medical $medical;

    public $field1 = 'Hello world';

    public $student;

    public function mount()
    {
        $this->student = Student::findOrFail(1);
    }

    public function setMedical(Medical $medical)
    {
        $this->medical = $medical;
        $this->editMode = true;
    }

    public function create()
    {
        //$this->validate();
        $this->student->medical()->create($this->only(['field1']));
        request()->session()->flash("success", "Le dossier médical a été crée");
        $this->createMedicalModal = false;
    }

    #[On('edit-medical')]
    public function editMedical($id)
    {
        $medical = Medical::findOrFail($id);
        $this->setMedical($medical);

        $this->showCreateMedicalModal();
    }

    public function showCreateMedicalModal()
    {
        $this->createMedicalModal = true;
    }
    public function render()
    {
        $medical = Student::all();
        return view('livewire.student.medical-create', [
            'medical' => $medical
        ]);
    }
}
