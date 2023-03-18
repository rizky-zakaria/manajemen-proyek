@extends('layouts.template')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $modul }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Data-master</a></div>
                    <div class="breadcrumb-item"><a href="{{ route($modul . '.index') }}">{{ $modul }}</a></div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <form action="{{ url('data-master/proyek/update-percent-progres/') }}" method="post">
                                @csrf
                                <div class="card-header d-flex justify-content-between">
                                    <h4>{{ $modul }}</h4>
                                    <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                                </div>
                                <div class="card-body">
                                    <div class="">
                                        <div class="row">
                                            <div class="col">
                                                <label for="nama">Progres</label>
                                                <input type="text" name="nama" id="nama"
                                                    value="{{ $data->task_name }}" class="form-control" disabled>
                                                <input type="hidden" name="id" value="{{ $data->task_id }}">
                                            </div>
                                            <div class="col">
                                                <label for="percent">Persentasi</label>
                                                <input type="number" name="progres" id="percent"
                                                    value="{{ $data->percent }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
