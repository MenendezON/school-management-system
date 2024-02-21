<?php

namespace App\Livewire\Student;

use App\Models\Student;
use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Component;

class StudentCreate extends Component
{
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
    
    public $country;
    #[Rule("required|min:2|max:50")]
    public $email;
    #[Rule("required|min:2|max:50")]
    public $phone;
    public $gender;
    #[Rule("required|min:2|max:50")]
    public $address;

    public function addstudent()
    {
        //$validated = $this->validate(['first_name', 'last_name', 'date_of_birth', 'place_of_birth', 'city', 'email', 'address']);

        //Student::create($validated);
        auth()->user()->students()->create($this->only(['first_name', 'last_name', 'date_of_birth', 'country', 'gender', 'phone', 'place_of_birth', 'city', 'email', 'address']));
        $this->reset('first_name', 'last_name', 'date_of_birth', 'country', 'gender', 'phone', 'place_of_birth', 'city', 'email', 'address');
       
        session()->flash('success','The task has been added successfully!');

        //$this->resetPage();
    }

public function removeflash(){
    session()->remove('success');
}

    public function render()
    {
        return view('livewire.student.student-create')->layout('layouts.app');
    }
}
