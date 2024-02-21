<?php

namespace App\Livewire\Student;

use Livewire\Component;
use App\Models\Student;
use Livewire\WithPagination;

class StudentIndex extends Component
{
    use WithPagination;

    public function navigateToAnotherPage(){
        return redirect()->to('/students/create');
    }

    public $modalVisible = false;
    public $name; // Add other fields as needed

    public function openModal()
    {
        $this->modalVisible = true;
    }

    public function closeModal()
    {
        $this->modalVisible = false;
    }

    public function addStudent()
    {
        // Validation can be added here if needed
        Student::create([
            'name' => $this->name,
            // Add other fields as needed
        ]);

        // Emit an event to close the modal
        $this->emit('studentAdded');
        $this->reset(); // Reset form fields
        $this->modalVisible = false; // Close modal
    }
    

    public function render()
    {
        $students = Student::where('user_id', auth()->user()->id)->paginate(12);
        return view('livewire.student.student-index', ['students'=> $students])->layout('layouts.app');
    }
}
