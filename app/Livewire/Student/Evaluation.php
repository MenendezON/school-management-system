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
    public $student;
    public $studentid;
    public $quarterid;

    public $reports = array();
    public $options;
    public $survey;

    public function mount(Request $request, $id, $q)
    {
        $this->survey = $request->input('s');
        $this->student = Student::findOrFail($id);
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
        return str_replace(" ", "_", time() . "-" . ucwords($student->first_name) . ucwords($student->last_name) . ".pdf");
    }

    public function generateDoc()
    {

        // Creating the new document...
        $phpWord = new \PhpOffice\PhpWord\PhpWord();

        /* Note: any element you append to a document must reside inside of a Section. */

        // Adding an empty Section to the document...
        $section = $phpWord->addSection();
        // Adding Text element to the Section having font styled by default...
        $section->addText(
            '"Learn from yesterday, live for today, hope for tomorrow. '
                . 'The important thing is not to stop questioning." '
                . '(Albert Einstein)'
        );

        /*
 * Note: it's possible to customize font style of the Text element you add in three ways:
 * - inline;
 * - using named font style (new font style object will be implicitly created);
 * - using explicitly created font style object.
 */

        // Adding Text element with font customized inline...
        $section->addText(
            '"Great achievement is usually born of great sacrifice, '
                . 'and is never the result of selfishness." '
                . '(Napoleon Hill)',
            array('name' => 'Tahoma', 'size' => 10)
        );

        // Adding Text element with font customized using named font style...
        $fontStyleName = 'oneUserDefinedStyle';
        $phpWord->addFontStyle(
            $fontStyleName,
            array('name' => 'Tahoma', 'size' => 10, 'color' => '1B2232', 'bold' => true)
        );
        $section->addText(
            '"The greatest accomplishment is not in never falling, '
                . 'but in rising again after you fall." '
                . '(Vince Lombardi)',
            $fontStyleName
        );

        // Adding Text element with font customized using explicitly created font style object...
        $fontStyle = new \PhpOffice\PhpWord\Style\Font();
        $fontStyle->setBold(true);
        $fontStyle->setName('Tahoma');
        $fontStyle->setSize(13);
        $myTextElement = $section->addText('"Believe you can and you\'re halfway there." (Theodor Roosevelt)');
        $myTextElement->setFontStyle($fontStyle);

        // Saving the document as OOXML file...
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save('helloWorld.docx');
        return response()->download(public_path('helloWorld.docx'));
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

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, $this->generateFileName($this->studentid));
    }

    public function data_analyse($request)
    {
        foreach ($this->categories as $category) {
            $this->options = DB::table('options')
                ->join('questions', 'questions.id', '=', 'options.question_id')
                ->join('students', 'options.student_id', '=', 'students.id')
                ->where('student_id', $this->studentid)
                ->where('quarter', $this->quarterid)
                ->where('category', $category)
                ->where('academic_year', $request->input('ay'))
                ->get();

            foreach ($this->options as $option) {
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
            case 1:
                $result = $this->returnAnswer($opt, 'avec_aide');
                break;
            default:
                $result = null;
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

        return view('livewire.student.evaluation');
    }
}
