@extends('layouts.template')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $modul }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Data-master</a></div>
                    <div class="breadcrumb-item"><a href="{{ route($modul . '.index') }}">{{ $modul }}</a></div>
                    <div class="breadcrumb-item">create</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between">
                                            <a href="{{ route($modul . '.index') }}" class="btn btn-light">Kembali</a>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Nama Proyek</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-file"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" name="nama_proyek"
                                                        class="form-control float-right @error('nama_proyek')
                                                                is-invalid
                                                            @enderror"
                                                        value="{{ $data->nama_proyek }}" id="reservation" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Anggaran</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-money-check"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" name="anggaran"
                                                        class="form-control float-right @error('anggaran')
                                                                is-invalid
                                                            @enderror"
                                                        value="{{ $data->anggaran }}" id="reservation" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Lokasi Proyek</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-map-marker"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" name="lokasi" value="{{ $data->lokasi }}"
                                                        class="form-control float-right @error('lokasi')
                                                                is-invalid
                                                            @enderror"
                                                        id="reservation" disabled>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Waktu Mulai</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i
                                                                        class="far fa-calendar"></i></span>
                                                            </div>
                                                            <input type="text" name="waktu_mulai"
                                                                class="form-control float-right @error('waktu_mulai')
                                                                        is-invalid
                                                                    @enderror"
                                                                value="{{ $data->waktu_mulai }}" id="reservationtime"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Waktu Selesai</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i
                                                                        class="far fa-calendar"></i></span>
                                                            </div>
                                                            <input type="text" name="waktu_selesai"
                                                                class="form-control float-right @error('waktu_selesai')
                                                                        is-invalid
                                                                    @enderror"
                                                                value="{{ $data->waktu_selesai }}" id="reservationtime"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Penanggung Jawab</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i
                                                                        class="far fa-user"></i></span>
                                                            </div>
                                                            <input type="text" name="waktu_selesai"
                                                                class="form-control float-right @error('waktu_selesai')
                                                                        is-invalid
                                                                    @enderror"
                                                                value="{{ $data->user->name }}" id="reservationtime"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>File</label>
                                                        <div class="input-group">
                                                            <a href="{{ asset('uploads/files/' . $data->file) }}"
                                                                class="btn btn-primary">
                                                                Lihat file
                                                            </a>
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
    </div>
@endsection
