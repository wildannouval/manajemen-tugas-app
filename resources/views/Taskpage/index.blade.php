@extends('layout.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ $title }}</h1>
            <div class="section-header-button">
                <a href="{{ route('tasks.create') }}" class="btn btn-primary">Tambah Tugas +</a>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">{{ $title }}</h2>
            <p class="section-lead">
                Aplikasi manajemen tugas sederhana menggunakan Laravel
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card mb-0">
                        <div class="card-body">
                            <ul class="nav nav-pills">
                                <li class="nav-item mr-2">
                                    <a class="nav-link bg-info text-white" href="{{ route('tasks.index') }}">All</a>
                                </li>
                                <li class="nav-item mr-2">
                                    <a class="nav-link bg-success text-white"
                                        href="{{ route('tasks.completed') }}">Completed</a>
                                </li>
                                <li class="nav-item mr-2">
                                    <a class="nav-link bg-warning text-white"
                                        href="{{ route('tasks.incompleted') }}">Incompleted</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Semua {{ $title }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="text-center">
                                        <tr>
                                            <th scope="col">NO</th>
                                            <th scope="col">JUDUL</th>
                                            <th scope="col">DESKRIPSI</th>
                                            <th scope="col">STATUS</th>
                                            <th scope="col">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($tasks as $task)
                                            <tr class="text-center">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $task->judul }}</td>
                                                <td>{!! $task->deskripsi !!}</td>
                                                <td>
                                                    @if ($task->status->status_name == 'Belum Selesai')
                                                        <div class="badge badge-danger">{{ $task->status->status_name }}
                                                        </div>
                                                    @elseif ($task->status->status_name == 'Selesai')
                                                        <div class="badge badge-success">{{ $task->status->status_name }}
                                                        </div>
                                                    @else
                                                        <div class="badge badge-info">{{ $task->status->status_name }}
                                                        </div>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                        action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                                        <a href="{{ route('tasks.show', $task->id) }}"
                                                            class="btn btn-sm btn-dark">SHOW</a>
                                                        <a href="{{ route('tasks.edit', $task->id) }}"
                                                            class="btn btn-sm btn-primary">EDIT</a>
                                                        <a href="{{ route('tasks.updatestatus', $task->id) }}"
                                                            class="btn btn-sm btn-warning">EDIT STATUS</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <div class="alert alert-danger">
                                                Data Tugas belum Tersedia.
                                            </div>
                                        @endforelse
                                    </tbody>
                                </table>
                                {{ $tasks->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
