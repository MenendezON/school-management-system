<?php

namespace App\Livewire\Student;

use App\Models\Classroom;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ClassroomIndex extends Component
{
    use WithPagination;

    public ?Classroom $classroom;
    public $editMode = false;

    #[Rule("required|min:2|max:50")]
    public $name;
    #[Rule("required")]
    public $type;
    public $capacity = 0;

    public $createClassroomModal = false;

    public function setClassroom(Classroom $classroom)
    {
        $this->classroom = $classroom;
        $this->editMode = true;
        $this->name = $classroom->name;
        $this->type = $classroom->type;
        $this->capacity = $classroom->capacity;
    }

    #[On('edit-classroom')]
    public function editClassroom($id)
    {
        $classroom = Classroom::findOrFail($id);
        $this->setClassroom($classroom);

        $this->showCreateClassroomModal();
    }

    public function deleteClassroom(Classroom $classroom)
    {
        (!auth()->user()->canDestroy() || Auth::user()->currentTeam->id !== Team::find(1)->id) && abort(403, 'Unauthorized action.');
        $classroom->delete();
        return redirect()->route('classroom-index')->with('success', 'Classroom deleted successfully');
    }

    public function showCreateClassroomModal()
    {
        $this->createClassroomModal = true;
    }

    public function create()
    {
        $this->validate();

        if ($this->editMode) {
            (!auth()->user()->canUpdate() || Auth::user()->currentTeam->id !== Team::find(1)->id) && abort(403, 'Unauthorized action.');
            $this->classroom->update($this->all());
            $this->reset();
            request()->session()->flash('success', 'La classe a été mis à jour!');
            $this->createClassroomModal = false;
        } else {
            (!auth()->user()->canCreate() || Auth::user()->currentTeam->id !== Team::find(1)->id) && abort(403, 'Unauthorized action.');
            Classroom::create($this->only(['name', 'type', 'capacity']));
            $this->reset();
            session()->flash('success', 'La classe a été créée!');
            $this->createClassroomModal = false;
            return redirect()->route('classroom-index')->with('success', 'Classroom deleted successfully');
        }
    }

    public function removeflash()
    {
        session()->remove('success');
    }

    #[Layout('layouts.app')]
    public function render()
    {
        (!auth()->user()->canRead() || Auth::user()->currentTeam->id !== Team::find(1)->id) && abort(403, 'Unauthorized action.');

        $classrooms = Classroom::orderBy('id', 'desc')
            ->paginate(13);
        return view('livewire.student.classroom-index', ['classrooms' => $classrooms]);
    }
}
