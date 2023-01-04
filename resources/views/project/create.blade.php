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
                                                            class="form-control float-right @error('nama_proyek')
                                                                is-invalid
                                                            @enderror"
                                                            id="reservation" required>
                                                        @error('nama_proyek')
                                                            <span class="text-sm text-danger">{{ $message }}</span>
                                                        @enderror
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
                                                        <input type="number" name="anggaran"
                                                            class="form-control float-right @error('anggaran')
                                                                is-invalid
                                                            @enderror"
                                                            id="reservation" required>
                                                        @error('anggaran')
                                                            <span class="text-sm text-danger">{{ $message }}</span>
                                                        @enderror
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
                                                            class="form-control float-right @error('lokasi')
                                                                is-invalid
                                                            @enderror"
                                                            id="reservation" required>
                                                        @error('lokasi')
                                                            <span class="text-sm text-danger">{{ $message }}</span>
                                                        @enderror
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
                                                                    class="form-control float-right @error('waktu_mulai')
                                                                        is-invalid
                                                                    @enderror"
                                                                    id="reservationtime" required>
                                                                @error('waktu_mulai')
                                                                    <span class="text-sm text-danger">{{ $message }}</span>
                                                                @enderror
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
                                                                    class="form-control float-right @error('waktu_selesai')
                                                                        is-invalid
                                                                    @enderror"
                                                                    id="reservationtime" required>
                                                                @error('waktu_selesai')
                                                                    <span class="text-sm text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">Penanggung Jawab</label>
                                                            <select
                                                                class="form-control @error('petugas')
                                                                is-invalid
                                                            @enderror"
                                                                name="petugas" id="exampleFormControlSelect1" required>
                                                                <option selected>Pilih...</option>
                                                                @foreach ($user as $item)
                                                                    <option value="{{ $item->id }}">
                                                                        {{ $item->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('petugas')
                                                                <span class="text-sm text-danger">{{ $message }}</span>
                                                            @enderror
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
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="jenis_proyek">Jenis Proyek</label>
                                                            <select
                                                                class="form-control @error('jenis_proyek')
                                                                is-invalid
                                                            @enderror"
                                                                name="jenis_proyek" id="jenis_proyek" required>
                                                                <option selected disabled>Pilih...</option>
                                                                <option value="konstruksi" value="21"
                                                                    data-rc="konstruksi">
                                                                    Konstruksi</option>
                                                                <option value="non-konstruksi" data-rc="non-konstruksi">
                                                                    Non-Konstruksi</option>
                                                            </select>
                                                            @error('jenis_proyek')
                                                                <span class="text-sm text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6" id="bidang">
                                                    </div>
                                                </div>
                                                <div class="form-row" id="lainnya">

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
    <script>
        var selection = document.getElementById("jenis_proyek");
        selection.onchange = function(event) {
            var rc = event.target.options[event.target.selectedIndex].dataset.rc;
            $("#form").remove();
            if (rc === "konstruksi") {
                $("#bidang").append(
                    `
                    <div class="form-group" id="form">
                    <label for="bidang_proyek">Bidang Proyek</label>
                    <select
                        class="form-control"
                        name="petugas" id="bidang_proyek" required>
                        <option selected disabled>Pilih...</option>
                        <option value="Konstruksi Bangunan Gedung" data-rc="kbg">
                            Konstruksi Bangunan Gedung
                        </option>
                        <option value="Konstruksi Rumah" data-rc="kr">
                            Konstruksi Rumah
                        </option>
                        <option value="Konstruksi Perkantoran" data-rc="kp">
                            Konstruksi Perkantoran
                        </option>
                        <option value="Konstruksi Perhotelan" data-rc="kh">
                            Konstruksi Perhotelan
                        </option>
                        <option value="Konstruksi Drainase" data-rc="kd">
                            Konstruksi Drainase
                        </option>
                        <option value="Konstruksi Jalan" data-rc="kj">
                            Konstruksi Jalan
                        </option>
                        <option value="Konstruksi Jembatan" data-rc="kjb">
                            Konstruksi Jembatan
                        </option>
                        <option value="Lainnya" data-rc="lain">
                            Lainnya
                        </option>
                    </select>
                </div>
                    `
                );

            } else {
                $("#bidang").append(
                    `
                    <div class="form-group" id="form">
                    <label for="bidang_proyek">Bidang Proyek</label>
                    <select
                        class="form-control"
                        name="petugas" id="bidang_proyek" required>
                        <option selected disabled>Pilih...</option>
                        <option value="Kajian lingkungan hidup strategis" data-rc="klhs">
                            Kajian lingkungan hidup strategis
                        </option>
                        <option value="Amdal" data-rc="amdal">
                            Amdal
                        </option>
                        <option value="Lainnya" data-rc="lain">
                            Lainnya
                        </option>
                    </select>
                </div>
                    `
                );
            }
        };

        var selec = document.getElementById("bidang_proyek");
        console.log(selec);
        selec.onchange = function(event) {
            var rnc = event.target.options[event.target.selectedIndex].dataset.rc;
            console.log(rnc);
            $("#ll").remove();
            if (rnc === "lain") {
                $("#lainnya").append(
                    `
                        <div class="form-group" id="ll">
                            <label for="lainnya">Keterangan lainnya</label>
                            <input type="text" class="form-control"
                                id="lainnya"name="lain" required>
                        </div>
                    `
                );
            }
        }
    </script>
@endsection
