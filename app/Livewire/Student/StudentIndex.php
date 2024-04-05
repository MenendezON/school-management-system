<?php

namespace App\Livewire\Student;

use Livewire\Attributes\Rule;
use Livewire\Component;
use App\Models\Student;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class StudentIndex extends Component
{
    use WithPagination;

    public ?Student $student;
    public $editMode = false;

    #[Rule("required|min:3|max:50")]
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

    public $keyword;

    public $createPostModal = false;

    public function setStudent($student)
    {
        $this->student = $student;
        $this->editMode = true;
        $this->first_name = ucwords($student->first_name);
        $this->last_name = strtoupper($student->last_name);
        $this->date_of_birth = $student->date_of_birth;
        $this->place_of_birth = $student->place_of_birth;
        $this->gender = $student->gender;
        $this->nationality = $student->nationality;
        $this->blood_group = $student->blood_group;
        $this->email = $student->email;
        $this->phone = $student->phone;
        $this->address = $student->address;
        $this->city = $student->city;
        $this->previous_school = $student->previous_school;
        $this->medical_history = $student->medical_history;
        $this->allergies = $student->allergies;
        $this->decision = $student->decision;
    }


    public function showCreatePostModal()
    {
        $this->createPostModal = true;
    }

    public function create()
    {
        $this->validate();

        if ($this->editMode) {
            $this->student->update($this->all());
            $this->reset();
            request()->session()->flash('success', _("L'élève a été mise à jour!"));
            $this->createPostModal = false;
        } else {
            auth()->user()->students()->create($this->only(['first_name', 'last_name', 'date_of_birth', 'nationality', 'gender', 'phone', 'place_of_birth', 'city', 'email', 'address', 'previous_school', 'blood_group', 'medical_history', 'allergies', 'decision']));
            $this->reset();

            request()->session()->flash('success', _('The student has been added successfully!'));
            $this->createPostModal = false;
        }
    }

    public function removeflash()
    {
        session()->remove('success');
    }

    #[On('edit-student')]
    public function editStudent($id)
    {
        $student = Student::findOrFail($id);
        $this->setStudent($student);

        $this->showCreatePostModal();
    }

    public function deleteStudent(Student $student)
    {
        $student->delete();
    }


    public function render()
    {
        $students = Student::orderBy('id', 'desc')
            ->where('first_name', 'like', '%' . $this->keyword . '%')
            ->where('last_name', 'like', '%' . $this->keyword . '%')
            ->where('address', 'like', '%' . $this->keyword . '%')
            ->where('first_name', 'like', '%' . $this->keyword . '%')
            ->paginate(10);
        return view('livewire.student.student-index', [
            'students' => $students,
        ])
            ->layout('layouts.app');
    }
}
