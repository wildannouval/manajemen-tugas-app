@extends('layout.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('tasks.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Edit Tugas</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Edit Tugas : {{ $task->judul }}</h2>
            <p class="section-lead">
                Form Edit Tugas
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form</h4>
                        </div>
                        <div class="card-body">
                            <form action={{ route('tasks.update', $task->id) }} method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                            name="judul" value="{{ old('judul', $task->judul) }}">
                                        @error('judul')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi">{{ old('deskripsi', $task->deskripsi) }}</textarea>
                                        @error('deskripsi')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="selectgroup w-100">
                                            @foreach ($statuses as $status)
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="status_id" value="{{ $status->id }}"
                                                        class="selectgroup-input" @checked($task->status_id == $status->id)>
                                                    <span class="selectgroup-button">{{ $status->status_name }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary" type="submit">Edit Tugas</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
