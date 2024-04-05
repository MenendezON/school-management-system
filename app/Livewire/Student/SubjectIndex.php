<?php

namespace App\Livewire\Student;

use Livewire\Attributes\Rule;
use Livewire\Attributes\On;
use App\Models\Classroom;
use App\Models\Teacher;
use App\Models\Subject;
use Livewire\Component;

class SubjectIndex extends Component
{
    public ?Subject $subjet;
    public $editMode = false;

    public ?Classroom $classroom;
    #[Rule("required")]
    public $category;
    #[Rule("required|min:3|max:50")]
    public $label;
    #[Rule("required")]
    public $value = 20;
    #[Rule("required")]
    public $teacher_id;

    public $createSubjectModal = false;

    public function setSubject(Subject $subject)
    {
        $this->subject = $subject;
        $this->editMode = true;
        $this->category = $subject->category;
        $this->label = $subject->label;
        $this->value = $subject->value;
        $this->teacher_id = $subject->teacher_id;
    }

    public function mount($id){
        $this->classroom = Classroom::findOrfail($id);
    }

    public function create(){
        $this->validate();

       if($this->editMode)
       {
            $this->classroom->subjects()->where('id', $this->subject->id)->update(['category'=> $this->category, 'teacher_id'=>$this->teacher_id, 'label' => $this->label, 'value'=>$this->value]);
            session()->flash('success', 'La matière a été modifié!');
            $this->createSubjectModal = false;
       }else{
            $this->classroom->subjects()->create(['category'=> $this->category, 'teacher_id'=>$this->teacher_id, 'label' => $this->label, 'value'=>$this->value]);
            session()->flash('success', 'La matière a été ajoutée!');
            $this->createSubjectModal = false;
        }
    }

    #[On('edit-subject')]
    public function editSubject($id)
    {
        $subject = Subject::findOrFail($id);
        $this->setSubject($subject);

        $this->showSubjectModal();
    }

    public function deleteSubject(Subject $subject)
    {
        $subject->delete();
    }

    public function showSubjectModal()
    {
        $this->createSubjectModal = true;
    }

    public function render()
    {
        return view('livewire.student.subject-index')->layout('layouts.app');
    }
}
