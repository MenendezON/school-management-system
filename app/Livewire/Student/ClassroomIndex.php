<?php

namespace App\Livewire\Student;

use App\Models\classroom;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class ClassroomIndex extends Component
{
    use WithPagination;

    #[Rule("required|min:2|max:50")]
    public $name;
    #[Rule("required")]
    public $type;

    public $createClassroomModal = false;

    public function showCreateClassroomModal()
    {
        $this->createClassroomModal = true;
    }

    public function create()
    {
        $this->validate();
        auth()->user()->classrooms()->create($this->only(['name', 'type']));
        $this->reset('name', 'type');

        session()->flash('success', 'The classroom has been added successfully!');
        $this->createClassroomModal = false;
    }

    public function removeflash()
    {
        session()->remove('success');
    }

    public function render()
    {
        $classrooms = classroom::where('user_id', auth()->user()->id)
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('livewire.student.classroom-index', ['classrooms' => $classrooms])->layout('layouts.app');
    }
}
