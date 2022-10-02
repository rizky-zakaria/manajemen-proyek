@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <form action="{{ route('user.store') }}" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ url('user') }}" class="btn btn-light">Batal</a>
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
                                    <input type="text" name="nama"
                                        class="form-control float-right @error('nama') is-invalid @enderror"
                                        id="reservation">
                                </div>
                                @error('nama')
                                    <span class="text-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>
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
                                        id="reservation">
                                </div>
                                @error('email')
                                    <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user-lock"></i></span>
                                            </div>
                                            <input type="password" name="password"
                                                class="form-control float-right @error('password')
                                                is-invalid
                                            @enderror"
                                                id="reservationtime">
                                        </div>
                                        @error('password')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Konfirmasi Password</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user-lock"></i></span>
                                            </div>
                                            <input type="password" name="password_confirmation"
                                                class="form-control float-right" id="reservationtime">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <fieldset class="form-group row">
                                <legend class="col-form-label col-sm-2 float-sm-left pt-0">Role</legend>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input
                                            class="form-check-input @error('role')
                                            is-invalid
                                        @enderror"
                                            type="radio" name="role" id="gridRadios1" value="petugas">
                                        <label class="form-check-label" for="gridRadios1">
                                            Petugas Lapangan
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input
                                            class="form-check-input @error('role')
                                            is-invalid
                                        @enderror"
                                            type="radio" name="role" id="gridRadios1" value="client">
                                        <label class="form-check-label" for="gridRadios1">
                                            User Client
                                        </label>
                                    </div>
                                    @error('role')
                                        <span class="text-sm text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </fieldset>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
