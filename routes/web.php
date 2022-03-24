<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;

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
    return redirect('login');
});

Route::redirect('/','task');

// Route::get('/task',[TaskController::class,'index'])->name('task.home');

Route::controller(TaskController::class)->prefix('task')->name('task.')->middleware('auth')->group(function(){
    Route::get('/','index')->name('home');
    Route::post('/add','store')->name('add');
    Route::get('/done/{id}','done')->name('done');
    Route::get('/undone/{id}','undone')->name('undone');
    Route::post('/update','update')->name('update');
    Route::get('/delete/{id}','delete')->name('delete');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
