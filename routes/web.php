<?php

use App\Http\Controllers\SubTaskController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskSearchController;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [TaskSearchController::class,'search'])
->name('Task.index')->middleware(['auth']);

require __DIR__.'/auth.php';


// +++++++++++++++++++++++++++++++start Task api+++++++++++++++++++++++++++++++++++
Route::group(['prefix' => 'Task' , 'middleware'=>'auth' ], function() {
    Route::get('/index',           [TaskSearchController::class,'search'])->name('Task.index');
    Route::get('/create',           [TaskController::class,'create'])->name('Task.create');
    Route::get('/edit/{task}',      [TaskController::class,'edit'])->name('Task.edit');
    Route::post('/store',           [TaskController::class,'store'])->name('Task.store');
    Route::get('/show/{task}',      [TaskController::class,'show'])->name('Task.show'); 
    Route::put('/update/{task}',    [TaskController::class,'update'])->name('Task.update');
    Route::delete('/destroy/{task}',[TaskController::class,'destroy'])->name('Task.delete');
});
// +++++++++++++++++++++++++++++++end Task api+++++++++++++++++++++++++++++++++++

// +++++++++++++++++++++++++++++++start SubTask api+++++++++++++++++++++++++++++++++++
Route::group(['prefix' => 'SubTask' , 'middleware'=>'auth' ], function() {
    Route::get('/create/{task}',  [SubTaskController::class,'create'])->name('SubTask.create');
    Route::post('/store',  [SubTaskController::class,'store'])->name('SubTask.store');
});
// +++++++++++++++++++++++++++++++end SubTask api+++++++++++++++++++++++++++++++++++











