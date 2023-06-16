<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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
    return redirect()->route('tasks.index');
});

//index data tasks
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/tasks/completed', [TaskController::class, 'completed'])->name('tasks.completed');
Route::get('/tasks/incompleted', [TaskController::class, 'incompleted'])->name('tasks.incompleted');

//create data tasks
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');

//store data tasks
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

//show data by id task
Route::get('/tasks/{id}', [TaskController::class, 'show'])->name('tasks.show');

//edit data by id task
Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');

//update data by id
Route::put('/tasks/{id}', [Taskcontroller::class, 'update'])->name('tasks.update');
Route::put('/tasks/{id}/status', [Taskcontroller::class, 'updatestatus'])->name('tasks.updatestatus');

//delete data by id
Route::delete('/tasks/{id}', [Taskcontroller::class, 'destroy'])->name('tasks.destroy');
