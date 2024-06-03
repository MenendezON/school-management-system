<?php

namespace App\Livewire\Student;

use App\Models\Medical;
use App\Models\Student;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

class MedicalCreate extends Component
{
    public $createMedicalModal = false;
    public $editMode = false;
    public ?Student $student;
    public ?Medical $medical;

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
        if($this->editMode){
            (!auth()->user()->canUpdate() || Auth::user()->currentTeam->id !== Team::find(1)->id) && abort(403, 'Unauthorized action.');
            $this->student->medical()->update($this->only(['field1']));
            request()->session()->flash("success", "Le dossier médical a été crée");
            $this->createMedicalModal = false;
        }else{
            (!auth()->user()->canCreate() || Auth::user()->currentTeam->id !== Team::find(1)->id) && abort(403, 'Unauthorized action.');
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

    public function destroy()
    {
        (!auth()->user()->canDestroy() || Auth::user()->currentTeam->id !== Team::find(1)->id) && abort(403, 'Unauthorized action.');

    }

    public function render()
    {
        (!auth()->user()->canRead() || Auth::user()->currentTeam->id !== Team::find(1)->id) && abort(403, 'Unauthorized action.');

        $medical = Medical::where('student_id', $this->id)->first();
        return view('livewire.student.medical-create', [
            'medical'=> $medical
        ]);
    }
}
