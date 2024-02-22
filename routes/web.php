<?php

use App\Livewire\Dashboard;
use App\Livewire\Student\ClassroomIndex;
use App\Livewire\Student\StudentIndex;
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

    Route::get('dashboard', Dashboard::class)->name('dashboard');
    Route::get('students', StudentIndex::class)->name('student-index');
    Route::get('classrooms', ClassroomIndex::class)->name('classroom-index');
});
