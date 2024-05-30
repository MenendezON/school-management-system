<?php

use App\Livewire\Dashboard;
use App\Livewire\Eval\SurveyEvalCreate;
use App\Livewire\Eval\SurveyEvalIndex;
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
use App\Livewire\User\Create;
use App\Livewire\User\Edit;
use App\Livewire\User\Index;
use App\Livewire\User\Delete;
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
    return redirect()->route('dashboard');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', ])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
});
