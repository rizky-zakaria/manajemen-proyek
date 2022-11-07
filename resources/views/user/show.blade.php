@extends('layouts.template')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $modul }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Data-master</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('user.index') }}">{{ $modul }}</a></div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between col-12">
                                    <a href="{{ route($modul . '.index') }}" class="btn btn-light">Kembali</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-user"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="nama"
                                            class="form-control float-right @error('nama') is-invalid @enderror"
                                            value="{{ $data->name }}" id="reservation" disabled>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-envelope"></i>
                                                    </span>
                                                </div>
                                                <input type="email" name="email"
                                                    class="form-control float-right @error('email') is-invalid @enderror"
                                                    value="{{ $data->email }}" id="reservation" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tempat / Tanggal Lahir</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-cookie"></i>
                                                    </span>
                                                </div>
                                                <input type="text" name="ttl"
                                                    class="form-control float-right @error('ttl') is-invalid @enderror"
                                                    value="{{ $data->biodata->ttl }}" id="reservation"
                                                    placeholder="Gorontalo / 01 Januari 1990" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>NIK</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                </div>
                                                <input type="number" name="nik" value="{{ $data->biodata->nik }}"
                                                    class="form-control float-right @error('nik')
                                                is-invalid
                                            @enderror"
                                                    id="reservationtime" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Telepon</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                </div>
                                                <input type="text" name="telepon" value="{{ $data->biodata->telepon }}"
                                                    class="form-control float-right @error('telepon')
                                                is-invalid
                                            @enderror"
                                                    id="reservationtime" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Agama</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-ankh"></i></span>
                                                </div>
                                                <input type="text" name="agama" value="{{ $data->biodata->agama }}"
                                                    class="form-control float-right @error('agama')
                                                is-invalid
                                            @enderror"
                                                    id="reservationtime" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Jenis Kelamin </label>
                                            <select name="jk"
                                                class="form-control @error('jk')
                                                    is-invalid
                                                @enderror"
                                                id="exampleFormControlSelect1" disabled>
                                                <option value="{{ $data->biodata->jenis_kelamin }}" selected>
                                                    {{ $data->biodata->jenis_kelamin }}</option>
                                                <option value="pria">Pria</option>
                                                <option value="wanita">Wanita</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Alamat</label>
                                    <textarea name="alamat"
                                        class="form-control @error('alamat')
                                            is-invalid
                                        @enderror"
                                        id="exampleFormControlTextarea1" rows="3" disabled>{{ $data->biodata->alamat }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
