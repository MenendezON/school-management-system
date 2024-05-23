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
use PhpOffice\PhpWord\SimpleType\Jc;

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
        $phpWord = new \PhpOffice\PhpWord\PhpWord();

        // déclarer une nouvelle section
        $section = $phpWord->addSection();
        // définir les numéros de page
        $section->getStyle()->setPageNumberingStart(1);
        
        $section->addImage(public_path('./assets/img/etincelle-logo.jpg'), array(
            'width'         => 100,
            'alignment' => Jc::CENTER, // Centered alignment
            'marginTop'     => -1,
            'marginLeft'    => -1,
            'wrappingStyle' => 'behind'
        ));


        $lineStyle = array('weight' => 1, 'width' => 450, 'height' => 0, 'color' => 000000);
        $section->addLine($lineStyle);

        $fontStyleTitle = [
            'name' => 'Times New Roman', // Font family
            'size' => 12, // Font size
            'bold' => true, // Bold text
            'italic' => false, // Not italic
            'color' => '000000', // Font color (black)
        ];

        $paragraphStyleTitle = [
            'alignment' => Jc::BOTH, // Justified alignment
            'lineHeight' => 1.15, // Line spacing of 1.15
        ];

        $fontStyleParagraph = [
            'name' => 'Times New Roman', // Font family
            'size' => 12, // Font size
            'bold' => false, // Bold text
            'italic' => false, // Not italic
            'color' => '000000', // Font color (black)
        ];

        $paragraphStyle = [
            'alignment' => Jc::BOTH, // Justified alignment
            'lineHeight' => 1.15, // Line spacing of 1.15
            'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(10), // Space after in points (e.g., 10 points)
        ];

        foreach($this->reports as $key => $rslt)
        {
            //$section->addText($key, $fontStyleTitle, $paragraphStyleTitle);
            $phpWord->addTitleStyle(1, $fontStyleTitle, $paragraphStyleTitle);

            $section->addTitle($key, 1, 0);

            $text = "";
            foreach($rslt as $val)
            {
                $text .= $val." ";
            }
            $section->addText($text, $fontStyleParagraph, $paragraphStyle);
        }

        
        $footer = $section->addFooter();
        // Define paragraph style for footer text
        $footerParagraphStyle = [
            'alignment' => Jc::CENTER // Centered alignment
        ];
        // Add the page number field to the footer
        $footer->addPreserveText('Page {PAGE} of {NUMPAGES}', null, $footerParagraphStyle);


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
                $result .= '.';
                break;
            case 2:
                $result = $this->returnAnswer($opt, 'fait_pas');
                $result .= '.';
                break;
            case 1:
                $result = $this->returnAnswer($opt, 'avec_aide');
                $result .= '.';
                break;
            default:
                $result = null;
        }
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
