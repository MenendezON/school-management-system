<?php

namespace App\Livewire\Student;

use App\Models\Question;
use App\Models\Student;
use App\Models\Survey;
use Livewire\Component;

class SurveyShow extends Component
{
    //public $survey_id;
    public $student;
    public $survey;
    public $createQuestionModal = false;
    public $category;
    public $categories;
    public $questions = [];

    public function mount($idsurvey, $id=null)
    {
        $this->student = Student::find($id);

        $this->survey = Survey::find($idsurvey);
        $this->categories = Question::select('category')
            ->where('survey_id', $idsurvey)
            ->distinct()
            ->pluck('category');
    }

    public function addQuestion()
    {
        $this->questions[] = ['text' => ''];
    }

    public function removeQuestion($index)
    {
        unset($this->questions[$index]);
        $this->questions = array_values($this->questions);
    }

    public function showCreateQuestionModal()
    {
        $this->createQuestionModal = true;
    }

    public function create()
    {
        $this->validate([
            'questions.*.text' => 'required',
        ]);

        //dd($this->survey_id);

        foreach ($this->questions as $question) {
            $newQuestion = new Question([
                'survey_id' => $this->survey->value('id'),
                'category' => $this->category,
                'question_text' => $question['text'],
            ]);
            $newQuestion->save();
        }

        // Reset input fields
        $this->questions = [];

        // Optionally, redirect or show a success message
        session()->flash('success', 'Le(s) questions ont été bien créées!');
        $this->createQuestionModal = false;
    }

    public function render()
    {
        return view('livewire.student.survey-show', [
            'survey' => $this->survey,
            'categories' => $this->categories,
            'questions' => $this->questions,
        ])->layout('layouts.app');
    }
}
