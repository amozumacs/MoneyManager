<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
//Route::get('/menu', function () {
//    return view('menu');
//});
use App\Http\Controllers\MenuController;
Route::resource('/menu', MenuController::class);
Route::get('/income', function () {
    return view('income');
});
use App\Http\Controllers\IncomeController;
Route::redirect('/', 'income');
Route::resource('income', IncomeController::class);
Route::get('income/create', [IncomeController::class, 'create']);
Route::get('IncomeSearch', [IncomeController::class, 'search'])->middleware(['auth']);
use App\Http\Controllers\ExpenseController;
Route::redirect('/', 'expense');
Route::resource('expense', ExpenseController::class);
Route::get('expense/create', [ExpenseController::class, 'create']);
Route::get('ExpenseSearch', [ExpenseController::class, 'search'])->middleware(['auth']);
use App\Http\Controllers\NotesController;
Route::redirect('/', 'notes');
Route::resource('notes', NotesController::class);
Route::get('notes/create', [NotesController::class, 'create'])->middleware(['auth']);
Route::get('NotesSearch', [NotesController::class, 'search'])->middleware(['auth']);
use App\Http\Controllers\AdminController;
Route::resource('/admin', AdminController::class);;


