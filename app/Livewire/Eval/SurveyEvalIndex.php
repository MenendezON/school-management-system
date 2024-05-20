<?php

namespace App\Livewire\Eval;

use App\Models\Option;
use Livewire\Attributes\Layout;
use Livewire\Component;

class SurveyEvalIndex extends Component
{
    public $evaluations;

    public function mount()
    {
        $this->evaluations = Option::select('options.student_id', 'options.quarter', 'surveys.title', 'options.academic_year')
        ->join('questions', 'options.question_id', '=', 'questions.id')
        ->join('surveys', 'questions.survey_id', '=', 'surveys.id')
        ->groupBy('options.student_id', 'options.quarter', 'surveys.title', 'options.academic_year')
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
