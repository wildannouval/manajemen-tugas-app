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
    return view('taskpage.completed');
});

//index data tasks
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');

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

//delete data by id
Route::delete('/tasks/{id}', [Taskcontroller::class, 'destroy'])->name('tasks.destroy');

//mengambil tugas telah selesai
Route::get('/tasks/selesai', [TaskController::class, 'tugascompleted'])->name('tasks.tugascompleted');

//mengambil tugas belum selesai
// Route::get('/tasks/incompleted', [TaskController::class, 'tugasincompleted'])->name('tasks.tugas_incompleted');

//update status tugas berdasarkan id
// Route::put('/tasks/{id}/status', [TaskController::class, 'updatestatus'])->name('tasks.update_status');

// Route::resource('tasks', TaskController::class);