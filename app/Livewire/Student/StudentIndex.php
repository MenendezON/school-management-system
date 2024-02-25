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
    public $country;
    #[Rule("required|min:2|max:50")]
    public $email;
    #[Rule("required|min:2|max:50")]
    public $phone;

    #[Rule("required")]
    public $gender;
    #[Rule("required|min:2|max:50")]
    public $address;

    public $createPostModal = false;

    public function showCreatePostModal()
    {
        $this->createPostModal = true;
    }

    public function create()
    {
        $this->validate();
        auth()->user()->students()->create($this->only(['first_name', 'last_name', 'date_of_birth', 'country', 'gender', 'phone', 'place_of_birth', 'city', 'email', 'address']));
        $this->reset('first_name', 'last_name', 'date_of_birth', 'country', 'gender', 'phone', 'place_of_birth', 'city', 'email', 'address');

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
        return view('livewire.student.student-index', ['students' => $students])->layout('layouts.app');
    }
}
