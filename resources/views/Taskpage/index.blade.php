@extends('layout.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Tugas</h1>
            <div class="section-header-button">
                <a href="{{ route('tasks.create') }}" class="btn btn-primary">Tambah Tugas +</a>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Tugas</h2>
            <p class="section-lead">
                Aplikasi manajemen tugas sederhana menggunakan Laravel
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card mb-0">
                        <div class="card-body">
                            <ul class="nav nav-pills">
                                <li class="nav-item mr-2">
                                    <a class="nav-link bg-info text-white" href="#">All</a>
                                </li>
                                <li class="nav-item mr-2">
                                    <a class="nav-link bg-success text-white" href="#">Completed</a>
                                </li>
                                <li class="nav-item mr-2">
                                    <a class="nav-link bg-warning text-white" href="#">Incompleted</a>
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
                            <h4>Semua Tugas</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
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
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $task->judul }}</td>
                                                <td>{{ $task->deskripsi }}</td>
                                                <td>
                                                    @if ($task->status == 'Belum Selesai')
                                                        <div class="badge badge-danger">Belum Selesai</div>
                                                    @else
                                                        <div class="badge badge-success">Selesai</div>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                        action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                                        <a href="{{ route('tasks.show', $task->id) }}"
                                                            class="btn btn-sm btn-dark">SHOW</a>
                                                        <a href="{{ route('tasks.edit', $task->id) }}"
                                                            class="btn btn-sm btn-primary">EDIT</a>
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
