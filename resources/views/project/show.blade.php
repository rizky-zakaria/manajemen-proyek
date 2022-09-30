@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <form action="{{ route('proyek.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ url('client/proyek') }}" class="btn btn-light">Batal</a>
                            {{-- <button class="btn btn-success float-right" type="submit">Simpan</button> --}}
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
                                    <input type="text" name="nama_proyek" class="form-control float-right"
                                        id="reservation" disabled value="{{ $data->nama_proyek }}">
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
                                    <input type="text" name="lokasi" class="form-control float-right" id="reservation"
                                        value="{{ $data->lokasi }}" disabled>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Waktu Mulai</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-calendar"></i></span>
                                            </div>
                                            <input type="text" name="waktu_mulai" class="form-control float-right"
                                                id="reservationtime" value="{{ $data->waktu_mulai }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Waktu Selesai</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-calendar"></i></span>
                                            </div>
                                            <input type="text" name="waktu_selesai" class="form-control float-right"
                                                id="reservationtime" value="{{ $data->waktu_selesai }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Lokasi Proyek</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <a href="{{ url('uploads/files/', $data->file) }}" class="input-group-text">
                                            <i class="fas fa-download"></i>
                                        </a>
                                    </div>
                                    <input type="text" name="file" class="form-control float-right" id="reservation"
                                        value="{{ $data->file }}" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
