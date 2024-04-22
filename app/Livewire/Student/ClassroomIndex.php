<?php

namespace App\Livewire\Student;

use App\Models\Classroom;
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
        $classroom->delete();
    }

    public function showCreateClassroomModal()
    {
        $this->createClassroomModal = true;
    }

    public function create()
    {
        $this->validate();

        if($this->editMode)
        {
            $this->classroom->update($this->all());
            $this->reset();
            request()->session()->flash('success', 'La classe a été mis à jour!');
            $this->createClassroomModal = false;
        }else{
            Classroom::create($this->only(['name', 'type', 'capacity']));
            $this->reset();
            session()->flash('success', 'La classe a été créée!');
            $this->createClassroomModal = false;
        }
    }

    public function removeflash()
    {
        session()->remove('success');
    }

    #[Layout('layouts.app')] 
    public function render()
    {
        $classrooms = Classroom::orderBy('id', 'desc')
            ->paginate(13);
        return view('livewire.student.classroom-index', ['classrooms' => $classrooms]);
    }
}
