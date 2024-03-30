<?php

namespace App\Livewire\Student;

use App\Models\Classroom;
use App\Models\Option;
use App\Models\Question;
use App\Models\Student;
use App\Models\Survey;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SurveyEdit extends Component
{
    public $student;
    public $survey;
    public $classroom;
    public $quarter;

    public $option_text;

    public $categories;
    public $questions = [];
    public $option = [];

    public function mount($idsurvey, $id)
    {
        $this->student = Student::find($id);
        $this->classroom = DB::table('registrations')
            ->join('students', 'registrations.student_id', '=', 'students.id')
            ->join('classrooms', 'registrations.classroom_id', '=', 'classrooms.id')
            ->where('students.id', $id)
            ->where('academic_year', '2024-2025')
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
        $this->validate([
            'option.*.*' => 'required',
        ]);
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
