<?php

namespace App\Livewire\Student;

use App\Models\Answer;
use App\Models\Option;
use App\Models\Question;
use App\Models\Student;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;

class Evaluation extends Component
{
    public $categories;
    public $studentid;
    public $quarterid;

    public $reports = array();
    public $options;

    public function mount(Request $request, $id, $q)
    {
        $this->quarterid = $q;
        $this->studentid = $id;

        $this->categories = Question::select('category')
            ->distinct()
            ->pluck('category');

        $this->data_analyse($request);

    }

    public function generateFileName($id)
    {
        $student = Student::findOrFail($id);
        return str_replace(" ", "_", time()."-".ucwords($student->first_name).ucwords($student->last_name).".pdf");
    }

    public function generatePdf()
    {
        $data = [
            'options' => $this->options,
            'categories' => $this->categories,
            'reports' => $this->reports,
        ];

        $pdf = Pdf::loadView('livewire.pdf-evaluation', $data)
        ->setPaper('a4', 'portrait');

        return response()->streamDownload(function() use($pdf){ 
            echo $pdf->stream();
        }, $this->generateFileName($this->studentid));

    }

    public function data_analyse($request)
    {
        foreach($this->categories as $category){
            $this->options = DB::table('options')
            ->join('questions', 'questions.id', '=', 'options.question_id')
            ->join('students', 'options.student_id', '=', 'students.id')
            ->where('student_id', $this->studentid)
            ->where('quarter', $this->quarterid)
            ->where('category', $category)
            ->where('academic_year', $request->input('ay'))
            ->get();

            //dd($this->options);

            foreach($this->options as $option){
                $this->reports[$category][$option->question_id] = $this->extract_result($option);
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

    #[Layout('layouts.app')] 
    public function render()
    {
        (!auth()->user()->canRead() || Auth::user()->currentTeam->id !== Team::find(1)->id) && abort(403, 'Unauthorized action.');

        return view('livewire.student.evaluation', [
            'categories' => $this->categories,
        ]);
    }
}
