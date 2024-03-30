<?php

namespace App\Livewire\Student;

use App\Models\Question;
use App\Models\Survey;
use Livewire\Attributes\Rule;
use Livewire\Component;

class SurveyIndex extends Component
{
    public $createSurveyModal = false;
    #[Rule("required|min:2|max:50")]
    public $title;
    public $description;

    public function showCreateSurveyModal()
    {
        $this->createSurveyModal = true;
    }

    public function create()
    {
        $this->validate();
        Survey::create($this->only(['title', 'description']));
        $this->reset('title', 'description');

        session()->flash('success', 'Le questionnaire a été bien créé!');
        $this->createSurveyModal = false;
    }

    public function render()
    {
        $surveys = Survey::all();
        return view('livewire.student.survey-index', [
            'surveys' => $surveys,
        ])->layout('layouts.app');
    }
}
