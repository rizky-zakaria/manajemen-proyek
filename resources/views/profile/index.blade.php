@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <form action="{{ route('proyek.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            {{-- <a href="{{ url('client/proyek') }}" class="btn btn-light">Kembali</a> --}}
                            <button class="btn btn-success float-right" type="submit">Simpan</button>
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
                                    <input type="text" name="nama_proyek" class="form-control float-right"
                                        id="reservation" value="{{ Auth::user()->name }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-envelope"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="lokasi" class="form-control float-right" id="reservation"
                                        value="{{ Auth::user()->email }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                                            </div>
                                            <input type="text" name="waktu_mulai" class="form-control float-right"
                                                id="reservationtime">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kelurahan / Desa</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                                            </div>
                                            <input type="text" name="waktu_selesai" class="form-control float-right"
                                                id="reservationtime">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kecamatan</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                                            </div>
                                            <input type="text" name="waktu_mulai" class="form-control float-right"
                                                id="reservationtime">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kabupaten / Kota</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                                            </div>
                                            <input type="text" name="waktu_selesai" class="form-control float-right"
                                                id="reservationtime">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Provinsi</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                                            </div>
                                            <input type="text" name="waktu_mulai" class="form-control float-right"
                                                id="reservationtime">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kode Pos Kelurahan / Desa</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-code-branch"></i></span>
                                            </div>
                                            <input type="text" name="waktu_selesai" class="form-control float-right"
                                                id="reservationtime">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <form action="" method="post">
                    <div class="card">
                        <div class="card-header"><button class="btn btn-success float-right" type="submit">Simpan</button>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Password Lama</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="nama_proyek" class="form-control float-right"
                                        id="reservation">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password Baru</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                            </div>
                                            <input type="text" name="waktu_mulai" class="form-control float-right"
                                                id="reservationtime">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Konfirmasi Password</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                            </div>
                                            <input type="text" name="waktu_selesai" class="form-control float-right"
                                                id="reservationtime">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <a class="btn btn-danger" href=" {{ route('logout') }} "
                    onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <span class="nav-link-text ms-1"><i class="fas fa-power-off"></i>
                        Logout</span>
                </a>
            </div>
        </div>
    </div>
@endsection
