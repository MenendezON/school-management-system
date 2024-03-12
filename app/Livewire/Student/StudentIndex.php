<?php

namespace App\Livewire\Student;

use Livewire\Attributes\Rule;
use Livewire\Component;
use App\Models\Student;
use Livewire\WithPagination;

class StudentIndex extends Component
{
    use WithPagination;

    #[Rule("required|min:2|max:50")]
    public $first_name;
    #[Rule("required|min:2|max:50")]
    public $last_name;
    #[Rule("required|min:2|max:50")]
    public $date_of_birth;
    #[Rule("required|min:2|max:50")]
    public $place_of_birth;
    #[Rule("required|min:2|max:50")]
    public $city;
    #[Rule("required")]
    public $nationality;
    public $email;
    public $phone;
    #[Rule("required")]
    public $gender;
    #[Rule("required|min:2|max:50")]
    public $address;
    #[Rule("required")]
    public $previous_school;
    #[Rule("required")]
    public $blood_group;
    #[Rule("required")]
    public $medical_history;
    #[Rule("required")]
    public $allergies;
    public $decision;

    public $createPostModal = false;


    public function showCreatePostModal()
    {
        $this->createPostModal = true;
    }

    public function create()
    {
        $this->validate();
        auth()->user()->students()->create($this->only(['first_name', 'last_name', 'date_of_birth', 'nationality', 'gender', 'phone', 'place_of_birth', 'city', 'email', 'address', 'previous_school', 'blood_group', 'medical_history', 'allergies', 'decision']));
        $this->reset('first_name', 'last_name', 'date_of_birth', 'nationality', 'gender', 'phone', 'place_of_birth', 'city', 'email', 'address', 'previous_school', 'blood_group', 'medical_history', 'allergies', 'decision');

        session()->flash('success', 'The student has been added successfully!');
        $this->createPostModal = false;
    }

    public function removeflash()
    {
        session()->remove('success');
    }

    

    public function render()
    {
        $students = Student::orderBy('id', 'desc')
            ->paginate(10);
        return view('livewire.student.student-index', [
            'students' => $students, 
            ])
            ->layout('layouts.app');
    }
}
