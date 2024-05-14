<?php

namespace App\Livewire\Student;

use App\Models\Question;
use App\Models\Survey;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Attributes\On;
use Livewire\Component;

class SurveyIndex extends Component
{
    public ?Survey $survey;
    public $editSurveyMode = false;

    public $createSurveyModal = false;
    #[Rule("required|min:2|max:50")]
    public $title;
    public $description;

    public function setSurvey(Survey $survey){
        $this->survey = $survey;
        $this->editSurveyMode = true;
        $this->title = $survey->title;
        $this->description = $survey->description;
    }

    #[On('edit-survey')]
    public function editSurvey($id)
    {
        $survey = Survey::findOrFail($id);
        $this->setSurvey($survey);

        $this->showCreateSurveyModal();
    }

    public function deleteSurvey(Survey $survey)
    {
        (!auth()->user()->canDestroy() || Auth::user()->currentTeam->id !== Team::find(1)->id) && abort(403, 'Unauthorized action.');
            
        $survey->delete();
    }

    public function showCreateSurveyModal()
    {
        $this->createSurveyModal = true;
    }

    public function create()
    {
        $this->validate();

        if($this->editSurveyMode){
            (!auth()->user()->canUpdate() || Auth::user()->currentTeam->id !== Team::find(1)->id) && abort(403, 'Unauthorized action.');
            
            $this->survey->update($this->all());
            $this->reset();

            request()->session()->flash('success', 'La grille a été modifiée!');
            $this->createSurveyModal = false;
        }else{
            (!auth()->user()->canCreate() || Auth::user()->currentTeam->id !== Team::find(1)->id) && abort(403, 'Unauthorized action.');
            Survey::create($this->only(['title', 'description']));
            $this->reset();

            request()->session()->flash('success', 'La grille a été bien créée!');
            $this->createSurveyModal = false;
        }
    }

    public function removeflash()
    {
        request()->session()->remove('success');
    }

    public function render()
    {
        (!auth()->user()->canRead() || Auth::user()->currentTeam->id !== Team::find(1)->id) && abort(403, 'Unauthorized action.');
        
        $surveys = Survey::all();
        return view('livewire.student.survey-index', [
            'surveys' => $surveys,
        ])->layout('layouts.app');
    }
}
