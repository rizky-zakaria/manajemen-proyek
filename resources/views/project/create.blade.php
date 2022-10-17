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
                                    <form action="{{ route($modul . '.store') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between">
                                                <a href="{{ route($modul . '.index') }}" class="btn btn-light">Batal</a>
                                                <button class="btn btn-success float-right" type="submit">Simpan</button>
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
                                                            class="form-control float-right" id="reservation">
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
                                                        <input type="text" name="lokasi"
                                                            class="form-control float-right" id="reservation">
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
                                                                <input type="date" name="waktu_mulai"
                                                                    class="form-control float-right" id="reservationtime">
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
                                                                <input type="date" name="waktu_selesai"
                                                                    class="form-control float-right" id="reservationtime">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">Example select</label>
                                                            <select class="form-control" name="jenis"
                                                                id="exampleFormControlSelect1" required>
                                                                <option selected>Pilih ...</option>
                                                                <option value="Pembangunan Jalan">Pembangunan Jalan</option>
                                                                <option value="Pembangunan Jembatan">Pembangunan Jembatan
                                                                </option>
                                                                <option value="Pembangunan Gedung">Pembangunan Gedung
                                                                </option>
                                                                <option value="Pembangunan Saluran">Pembangunan Saluran
                                                                </option>
                                                                <option value="Pembangunan Waduk">Pembangunan Waduk</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>File Pengajuan</label>
                                                            <div class="input-group is-invalid">
                                                                <div class="custom-file">
                                                                    <label class="custom-file-label"
                                                                        for="validatedInputGroupCustomFile">Pilih
                                                                        File</label>
                                                                    <input type="file" class="custom-file-input"
                                                                        id="validatedInputGroupCustomFile" name="file"
                                                                        required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
