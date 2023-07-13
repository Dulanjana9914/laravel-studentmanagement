<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//students
Route::prefix('/students')->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('students');
    Route::get('/update', [StudentController::class, 'edit'])->name('students.edit');
    Route::get('/list', [StudentController::class, 'list'])->name('students.list');
    Route::post('/add', [StudentController::class, 'store'])->name('students.add');
    Route::delete('/{student_id}/delete', [StudentController::class, 'delete'])->name('students.delete');
    Route::get('/{student_id}/get', [StudentController::class, 'get'])->name('students.get');
    Route::post('/{student_id}/update', [StudentController::class, 'update'])->name('students.update');
    Route::get('/{student_id}/statusUpdate', [StudentController::class, 'statusUpdate'])->name('students.updatestatus');
    Route::get('/{student_id}/statusUpdateactive', [StudentController::class, 'statusUpdateActive'])->name('students.statusUpdateactive');
});

require __DIR__ . '/auth.php';