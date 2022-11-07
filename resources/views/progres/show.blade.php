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
                            <div class="card-header d-flex justify-content-between">
                                <h4>{{ $modul }}</h4>
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
                                        <input type="text" class="form-control" id="validationDefault02"
                                            name="persentase" value="{{ $data->persentase }}" disabled>
                                    </div>
                                </div>
                                <h4 style="margin-top: 50px">History Pengerjaan</h4>
                                @foreach ($history as $item)
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationDefault01">Keterangan</label>
                                            <input type="text" class="form-control" name="keterangan"
                                                id="validationDefault01" value="{{ $item->keterangan }}" disabled>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationDefault02">Bukti pengerjaan</label>
                                            <br>
                                            <a href="{{ asset('uploads/files/' . $item->bukti) }}">
                                                <img src="{{ asset('uploads/files/' . $item->bukti) }}" alt=""
                                                    width="300px">
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
