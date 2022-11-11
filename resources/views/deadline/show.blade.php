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
                                            value="{{ $data->nama_proyek }}" disabled>
                                        <input type="hidden" name="id" value="{{ $data->id }}">
                                    </div>
                                    @if ($status === 'terlambat')
                                        <div class="col-md-6 mb-3">
                                            <label for="validationDefault02">Jumlah Keterlambatan</label>
                                            <input type="text" class="form-control" id="validationDefault02"
                                                name="persentase" value="{{ $hari }} hari" disabled>
                                        </div>
                                    @else
                                        <div class="col-md-6 mb-3">
                                            <label for="validationDefault02">Waktu Tersisa</label>
                                            <input type="text" class="form-control" id="validationDefault02"
                                                name="persentase" value="{{ $hari }} hari" disabled>
                                        </div>
                                    @endif
                                </div>
                                @if ($status === 'terlambat')
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label for="validationDefault01">Nominal Yang Harus Di Bayarkan</label>
                                            <input type="text" class="form-control" id="validationDefault01"
                                                value="{{ 'Rp ' . number_format($jmlDenda, 0, ',', '.') }}" disabled>
                                        </div>
                                    </div>
                                @else
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label for="validationDefault01">Nominal Yang Harus Di Bayarkan</label>
                                            <input type="text" class="form-control" id="validationDefault01"
                                                value="Rp. 0" disabled>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
