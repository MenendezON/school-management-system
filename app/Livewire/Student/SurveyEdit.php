<?php

namespace App\Livewire\Student;

use App\Models\Option;
use App\Models\Question;
use App\Models\Student;
use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Rule;
use Livewire\Component;

class SurveyEdit extends Component
{
    public $student;
    public $survey;
    public $classroom;
    #[Rule("Required")]
    public $quarter;

    public $option_text;

    public $categories;
    public $questions = [];
    public $option = [];

    public function mount(Request $request, $idsurvey, $id)
    {
        $this->student = Student::find($id);
        $this->classroom = DB::table('registrations')
            ->join('students', 'registrations.student_id', '=', 'students.id')
            ->join('classrooms', 'registrations.classroom_id', '=', 'classrooms.id')
            ->where('students.id', $id)
            ->where('academic_year', $request->input('ay'))
            ->get();
        $this->survey = Survey::find($idsurvey);

        $this->categories = Question::select('category')
            ->where('survey_id', $idsurvey)
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

    public function save()
    {
        // $this->validate([
            //option.0.32
        //     'option.*.*' => 'required',
        // ]);

        $this->validate();
        $this->fill_question();


        $val = '';
        foreach ($this->option as $opt) {
            foreach ($opt as $key => $value) {
                $opt = new Option([
                    'student_id' => $this->student->id,
                    'question_id' => $key,
                    'option_text' => $value,
                    'quarter' => $this->quarter,
                    'academic_year' => $this->classroom->value('academic_year')
                ]);
                $opt->save();
            }
        }

        // Reset input fields
        $this->questions = [];

        // // Optionally, redirect or show a success message
        session()->flash('success', "L'évaluation a été bien enregistrée!");
        // $this->createQuestionModal = false;
        return redirect()->route('student-show', ['id' =>$this->student->id]);
    }

    public function render()
    {
        return view('livewire.student.survey-option', [
            'survey' => $this->survey,
            'categories' => $this->categories,
            'classroom' => $this->classroom,
        ])->layout('layouts.app');
    }
}
