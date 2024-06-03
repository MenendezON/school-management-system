<?php

namespace App\Livewire\Student;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Student;
use App\Models\Survey;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SurveyShow extends Component
{
    //public $survey_id;
    
    public $student;
    public $survey;
    public $createQuestionModal = false;
    public $createAnswerModal = false;
    public $category;
    public $categories;
    public $questions = [];

    public ?Question $question;
    public $editMode = false;
    public $question_id;
    public $fait_seul;
    public $avec_aide;
    public $fait_pas;

    public function setQuestion(Question $question)
    {
        $this->question = $question;
        $this->editMode = true;
        $this->question_id = $question->id;
        $this->fait_seul = $question->fait_seul;
        $this->avec_aide = $question->avec_aide;
        $this->fait_pas = $question->fait_pas;  
    }

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

    public function showCreateAnswerModal($question_id)
    {
        $question = Question::find($question_id);
        $this->setQuestion($question);
        $this->createAnswerModal = true;
        //$this->question_id = Question::findOrfail($question_id)->id;
        //$this->reset('fait_seul', 'avec_aide', 'fait_pas');
    }

    public function create_answer()
    {
        (!auth()->user()->canUpdate() || Auth::user()->currentTeam->id !== Team::find(1)->id) && abort(403, 'Unauthorized action.');
            
        if($this->editMode){
            $this->question->update($this->only(['fait_seul', 'avec_aide', 'fait_pas']));
            $this->reset('fait_seul', 'avec_aide', 'fait_pas');
            request()->session()->flash('success', 'Les réponses ont été ajoutées!');
            $this->createAnswerModal = false;
        }
    }

    public function create()
    {
        (!auth()->user()->canCreate() || Auth::user()->currentTeam->id !== Team::find(1)->id) && abort(403, 'Unauthorized action.');
            
        $this->validate([
            'questions.*.text' => 'required',
        ]);

        foreach ($this->questions as $question) {
            $newQuestion = new Question([
                'survey_id' =>$this->survey->id,
                'category' => $this->category,
                'question_text' => $question['text'],
                'fait_seul' => null,
                'avec_aide' => null,
                'fait_pas' => null,
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
        (!auth()->user()->canRead() || Auth::user()->currentTeam->id !== Team::find(1)->id) && abort(403, 'Unauthorized action.');
            
        return view('livewire.student.survey-show', [
            'survey' => $this->survey,
            'categories' => $this->categories,
            'questions' => $this->questions,
        ])->layout('layouts.app');
    }
}
