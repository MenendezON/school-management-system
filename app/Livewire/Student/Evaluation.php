<?php

namespace App\Livewire\Student;

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

    public function Evaluation()
    {

    }


    public function mount($id, $q)
    {
        $this->quarterid = $q;
        $this->studentid = $id;


        $this->categories = Question::select('category')
            ->where('survey_id', 1)
            ->distinct()
            ->pluck('category');
        

            $this->data_analyse();
    }

    public function data_analyse(){
        

        foreach($this->categories as $category){
            

            $this->option = DB::table('options')
            ->join('questions', 'questions.id', '=', 'options.question_id')
            ->join('students', 'options.student_id', '=', 'students.id')
            ->where('student_id', $this->studentid)
            ->where('quarter', $this->quarterid)
            ->where('category', $category)
            ->where('academic_year', '2024-2025')
            ->get();

            foreach($this->option as $opt){
                $this->reports[$category][$opt->question_id] = $this->extract_result($opt);
            }
        }
    }

    public function extract_result($opt){
        $sexe = ($opt->gender == "Male") ? "Il":"Elle";
        $result = "";
        switch ($opt->option_text) {
            case 3:
                $result = "$sexe est capable de ".strtolower($opt->question_text)." seul.";
              break;
            case 2:
                $result = "$sexe n'est pas capable de ".strtolower($opt->question_text)." seul.";
              break;
            case 1:
                $result = "$sexe est capable de ".strtolower($opt->question_text)." mais avec l'assistance de quelqu'un.";
              break;
            default:
            $result = "rien à dire sur sa capacité de ".strtolower($opt->question_text).".";
          }
        return $result;
    }

    public function render()
    {
        
        //dd($this->option);
        return view('livewire.student.evaluation', [
            'categories' => $this->categories,
        ])->layout('layouts.app');
    }
}
