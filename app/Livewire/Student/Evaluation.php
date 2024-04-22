<?php

namespace App\Livewire\Student;

use App\Models\Answer;
use App\Models\Option;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Evaluation extends Component
{
    public $categories;
    public $studentid;
    public $quarterid;

    public $reports = array();
    public $option;

    public function mount(Request $request, $id, $q)
    {
        $this->quarterid = $q;
        $this->studentid = $id;

        $this->categories = Question::select('category')
            ->where('survey_id', 1)
            ->distinct()
            ->pluck('category');

            $this->data_analyse($request);
    }

    public function data_analyse($request)
    {
        foreach($this->categories as $category){
            $this->option = DB::table('options')
            ->join('questions', 'questions.id', '=', 'options.question_id')
            ->join('students', 'options.student_id', '=', 'students.id')
            ->where('student_id', $this->studentid)
            ->where('quarter', $this->quarterid)
            ->where('category', $category)
            ->where('academic_year', $request->input('ay'))
            ->get();

            foreach($this->option as $opt){
                $this->reports[$category][$opt->question_id] = $this->extract_result($opt);
            }
        }
    }

    public function extract_result($opt)
    {
        $result = null;
        switch ($opt->option_text) {
            case 3:
                $result = $this->returnAnswer($opt, 'fait_seul');
              break;
            case 2:
                $result = $this->returnAnswer($opt, 'fait_pas');
              break;
            default:
                $result = $this->returnAnswer($opt, 'avec_aide');
        }
        $result .= '.';
        return trim($result);
    }

    public function returnAnswer($opt, $answer)
    {
        $answer = Question::where('id', $opt->question_id)->get($answer)->value($answer);
        $answer = str_replace('.', '', $answer);
        return $answer;
    }

    public function render()
    {
        return view('livewire.student.evaluation', [
            'categories' => $this->categories,
        ])->layout('layouts.app');
    }
}
