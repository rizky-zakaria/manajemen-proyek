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
                            <form action="{{ url('data-master/progress/' . $data->id) }}" enctype="multipart/form-data"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-header d-flex justify-content-between">
                                    <h4>{{ $modul }}</h4>
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationDefault01">Nama Proyek</label>
                                            <input type="text" class="form-control" id="validationDefault01"
                                                value="{{ $data->proyek->nama_proyek }}" disabled>
                                            <input type="hidden" name="id" value="{{ $data->id }}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationDefault02">Update Presentase</label>
                                            <input type="number" class="form-control" id="validationDefault02"
                                                name="persentase" value="{{ $data->persentase }}" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationDefault01">Keterangan</label>
                                            <input type="text" class="form-control" name="keterangan"
                                                id="validationDefault01" value="" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationDefault02">Bukti pengerjaan</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile"
                                                    name="file">
                                                <label class="custom-file-label" for="customFile">Pilih file</label>
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
