<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Status;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $title = 'Tugas';
        $tasks = Task::latest()->paginate(5);

        return view('taskpage.index', compact('tasks', 'title'));
    }

    public function incompleted(): View
    {
        $title = 'Tugas Incompleted';
        $tasks = Task::where('status_id', 1)->paginate(5);

        return view('taskpage.index', compact('tasks', 'title'));
    }

    public function completed(): View
    {
        $title = 'Tugas Completed';
        $tasks = Task::where('status_id', 2)->paginate(5);

        return view('taskpage.index', compact('tasks', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $statuses = Status::all();
        return view('taskpage.create', compact('statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'judul' => 'required',
            'deskripsi' => 'required',
            'status_id' => 'required',
        ]);

        Task::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'status_id' => $request->status_id,
        ]);

        return redirect()->route('tasks.index')->with(['success' => 'Data Berhasil Disimpan!']);;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $task = Task::findOrfail($id);
        return view('taskpage.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $task = Task::findOrFail($id);
        $statuses = Status::all();
        return view('taskpage.edit', compact('task', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $this->validate($request, [
            'judul' => 'required',
            'deskripsi' => 'required',
            'status_id' => 'required',
        ]);

        $task = Task::findOrfail($id);

        $task->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'status_id' => $request->status_id,
        ]);
        return redirect()->route('tasks.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function updatestatus(string $id): RedirectResponse
    {
        $task = Task::findOrFail($id);
        $task->update([
            'status_id' => $task->status_id == '1' ? '2' : '1',
        ]);
        return redirect()->route('tasks.index')->with(['success' => 'Status Berhasil Diubah!']);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $task = Task::findOrfail($id);
        $task->delete();
        return redirect()->route('tasks.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
