<?php

namespace App\Livewire\Eval;

use App\Models\Option;
use App\Models\Question;
use App\Models\Student;
use App\Models\Survey;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;

class SurveyEvalCreate extends Component
{

    #[Rule('required')]
    public $studentId;
    #[Rule('required')]
    public $quarter;
    #[Rule('required')]
    public $academic_year;
    public $editMode = false;
    public $survey;
    public $categories;
    public $questions = [];
    public $option = [];

    public function mount($id)
    {
        $this->academic_year = session('academic_year');
        $this->quarter = session('quarter');
        $this->studentId = session('studentid');
        $this->editMode = session('edit');

        session()->forget(['academic_year', 'quarter', 'studentid', 'edit']);
        $eval = Option::where('student_id', $this->studentId)
            ->where('quarter', $this->quarter)
            ->where('academic_year', $this->academic_year)
            ->get();

        foreach($eval as $e)
        {
            $this->option[] = [$e->question_id => $e->option_text];
        }

        //dd($this->option);

        $this->survey = Survey::find($id);

        $this->categories = Question::select('category')
            ->where('survey_id', $id)
            ->distinct()
            ->pluck('category');
    }

    public function fill_question()
    {
        foreach ($this->survey->questions as $qst) {
            $this->questions[] = ['text' => $qst->id];
        }

        return $this->questions;
    }

    public function generateSchoolYears()
    {
        $currentYear = date('Y');
        $schoolYear = [];

        for ($year = $currentYear; $year >= 2000; $year--) {
            $schoolYear[] = $year;
        }
        return $schoolYear;
    }

    public function save()
    {
        //(!auth()->user()->canCreate() || Auth::user()->currentTeam->id !== Team::find(1)->id) && abort(403, 'Unauthorized action.');
            
        $this->validate();
        //$this->fill_question();
        

        foreach ($this->option as $opt) {
            foreach ($opt as $key => $value) {
                // $ot = new Option([
                //     'student_id' => $this->studentId,
                //     'question_id' => $key,
                //     'option_text' => $value,
                //     'quarter' => $this->quarter,
                //     'academic_year' => $this->academic_year
                // ]);
                // $ot->save();

                $ot = Option::updateOrCreate(
                    [
                        'student_id' => $this->studentId,
                        'question_id' => $key,
                        'quarter' => $this->quarter,
                        'academic_year' => $this->academic_year
                    ],
                    [
                        'option_text' => $value
                    ]
                );
                
            }
        }

        // Reset input fields
        //$this->questions = [];

        // // Optionally, redirect or show a success message
        session()->flash('success', "L'évaluation a été bien enregistrée!");
        // $this->createQuestionModal = false;
        return redirect()->route('survey-eval-index', ['id' =>$this->survey->id]);
    }

    #[Layout('layouts.app')]
    public function render()
    {
        (!auth()->user()->canRead() || Auth::user()->currentTeam->id !== Team::find(1)->id) && abort(403, 'Unauthorized action.');
        return view('livewire.eval.survey-eval-create', [
            'survey' => $this->survey,
            'categories' => $this->categories,
            'generateSchoolYears' => $this->generateSchoolYears(),
        ]);
    }
}
