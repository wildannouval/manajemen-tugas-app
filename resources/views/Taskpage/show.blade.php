@extends('layout.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('tasks.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Detail Tugas</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Detail Tugas</h2>
            <p class="section-lead">
                Halaman Detail Tugas
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Detail</h4>
                        </div>
                        <div class="card-body">
                            <div class="col-12 col-sm-7 col-lg-7">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>{{ $task->judul }}</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 col-sm-12 col-md-4">
                                                <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="home-tab4" data-toggle="tab"
                                                            href="#" role="tab" aria-controls="home"
                                                            aria-selected="true">{{ $task->status->status_name }}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-8">
                                                <div class="tab-content no-padding" id="myTab2Content">
                                                    <div class="tab-pane fade show active" id="home4" role="tabpanel"
                                                        aria-labelledby="home-tab4">
                                                        <strong class="mb-2">Deskripsi Tugas : </strong><br>

                                                        {!! $task->deskripsi !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
