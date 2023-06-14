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
    return view('layout.master');
});

// //create data tasks
// Route::post('/tasks', [TaskController::class, 'create'])->name('create');

// //index data tasks
// Route::get('/tasks', [TaskController::class, 'index'])->name('index');

// //Show data by id
// Route::get('/tasks/{id}', [TaskController::class, 'show'])->name('show');

// //update data by id
// Route::put('/tasks/{id}', [Taskcontroller::class, 'update']);

// //delete data by id
// Route::delete('/tasks/{id}', [Taskcontroller::class, 'delete'])->name('delete');

//mengambil tugas telah selesai
Route::get('/tasks/completed', [TaskController::class, 'tugas_completed'])->name('tugas_completed');

//mengambil tugas belum selesai
Route::get('/tasks/incompleted', [TaskController::class, 'tugas_incompleted'])->name('tugas_incompleted');

Route::put('/tasks/{id}/status', [TaskController::class, 'update_status']);

Route::resource('tasks', TaskController::class);