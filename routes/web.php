<?php

use App\Livewire\Dashboard;
use App\Livewire\Student\ClassroomIndex;
use App\Livewire\Student\Evaluation;
use App\Livewire\Student\NoteIndex;
use App\Livewire\Student\ShowClassroom;
use App\Livewire\Student\StudentclassroomIndex;
use App\Livewire\Student\StudentIndex;
use App\Livewire\Student\TuitionIndex;
use App\Livewire\Student\StudentShow;
use App\Livewire\Student\SubjectIndex;
use App\Livewire\Student\SurveyEdit;
use App\Livewire\Student\SurveyIndex;
use App\Livewire\Student\SurveyShow;
use App\Livewire\Student\TeacherIndex;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', ])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    
    // Route::get('/students', function () {
    //     return view('students');
    // })->name('students');

    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/students', StudentIndex::class)->name('student-index');
    Route::get('/students/{id}', StudentShow::class)->name('student-show');


    Route::get('/students/{id}/evaluation/{q}', Evaluation::class)->name('evaluation-index');

    Route::get('/students/{id}/survey/{idsurvey}', SurveyEdit::class)->name('student-survey-show');
    Route::get('/survey', SurveyIndex::class)->name('survey-index');
    Route::get('/survey/{idsurvey}', SurveyShow::class)->name('survey-show');
    //Route::get('/students/{id}/tutors', StudentShow::class)->name('student-tutor-index');
    Route::get('/classrooms', ClassroomIndex::class)->name('classroom-index');
    Route::get('/classrooms/{id}', ShowClassroom::class)->name('classroom-show');
    Route::get('/classrooms/{id}/subjects', SubjectIndex::class)->name('subject-index');
    Route::get('/classrooms/{idclassroom}/subjects/{idsubject}/notes', NoteIndex::class)->name('note-index');


    Route::get('/studentclassroom', StudentclassroomIndex::class)->name('studentclassroom-index');
    Route::get('/tuition', TuitionIndex::class)->name('tuition-index');
    Route::get('/teacher', TeacherIndex::class)->name('teacher-index');

});
