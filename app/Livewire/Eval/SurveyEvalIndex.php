<?php

namespace App\Livewire\Eval;

use App\Models\Option;
use Livewire\Attributes\Layout;
use Livewire\Component;

class SurveyEvalIndex extends Component
{
    public $evaluations;

    public function mount($id)
    {
        $this->evaluations = Option::select('options.created_at', 'options.student_id', 'options.quarter', 'surveys.title', 'options.academic_year')
        ->join('questions', 'options.question_id', '=', 'questions.id')
        ->join('surveys', 'questions.survey_id', '=', 'surveys.id')
        ->groupBy('options.created_at', 'options.student_id', 'options.quarter', 'surveys.title', 'options.academic_year')
        ->where('surveys.id', $id)
        ->get();
    }
    
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.eval.survey-eval-index',[
            'evaluations' => $this->evaluations
        ]);
    }
}
