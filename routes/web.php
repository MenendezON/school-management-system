<?php

use App\Livewire\Dashboard;
use App\Livewire\Students;
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

    Route::get('dashboard', Dashboard::class)->name('dashboard.index');
    Route::get('students', Students::class)->name('student.index');
});
