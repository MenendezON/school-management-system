<?php

namespace App\Livewire\Eval;

use App\Models\Option;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class SurveyEvalIndex extends Component
{
    public $evaluations;

    public $surveyid;

    public function editEvaluation($s, $q, $a)
    {
        session([
            'studentid' => $s,
            'quarter' => $q,
            'academic_year' => $a,
            'edit' => true
        ]);
        return redirect()->route('survey-eval-create', ['id' =>$this->surveyid]);
    }

    public function mount($id)
    {
        $this->surveyid = $id;

        $this->evaluations = Option::select('questions.survey_id', 'options.student_id', 'options.quarter', 'surveys.title', 'options.academic_year')
            ->join('questions', 'options.question_id', '=', 'questions.id')
            ->join('surveys', 'questions.survey_id', '=', 'surveys.id')
            ->groupBy('questions.survey_id', 'options.student_id', 'options.quarter', 'surveys.title', 'options.academic_year')
            ->where('surveys.id', $id)
            ->get();
    }

    public function deleteEvaluation($s, $q, $a)
    {
        (!auth()->user()->canDestroy() || Auth::user()->currentTeam->id !== Team::find(1)->id) && abort(403, 'Unauthorized action.');
        Option::where('student_id', $s)
            ->where('quarter', $q)
            ->where('academic_year', $a)
            ->delete();

        session()->flash('success', "L'évaluation a été bien enregistrée!");
        return redirect()->route('survey-eval-index', ['id' =>$this->surveyid]);
    }

    #[Layout('layouts.app')]
    public function render()
    {
        (!auth()->user()->canRead() || Auth::user()->currentTeam->id !== Team::find(1)->id) && abort(403, 'Unauthorized action.');
        return view('livewire.eval.survey-eval-index', [
            'evaluations' => $this->evaluations
        ]);
    }
}
