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
                            <form action="{{ route($modul . '.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-header d-flex justify-content-between">
                                    <h4>{{ $modul }}</h4>
                                    <button type="submit" class="btn btn-success">simpan</button>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Nama Proyek</label>
                                        <select name="proyek_id"
                                            class="form-control @error('proyek_id')
                                            is-invalid
                                        @enderror"
                                            id="exampleFormControlSelect1" required>
                                            <option selected>Pilih proyek</option>
                                            @foreach ($data as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_proyek }}</option>
                                            @endforeach
                                        </select>
                                        @error('proyek_id')
                                            <span class="text-sm text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Jenis Proyek</label>
                                        <select
                                            class="form-control @error('jenis_id')
                                            is-invalid
                                        @enderror"
                                            name="jenis_id" id="exampleFormControlSelect1" required>
                                            <option selected>Pilih jenis</option>
                                            @foreach ($jenis as $item)
                                                <option value="{{ $item->id }}">{{ $item->jenis }}</option>
                                            @endforeach
                                        </select>
                                        @error('jenis_id')
                                            <span class="text-sm text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Jenis Dokumen</label>
                                        <input type="text" name="jenis_dokumen"
                                            class="form-control @error('jenis_dokumen')
                                            is-invalid
                                        @enderror"
                                            id="exampleFormControlInput1" placeholder="RAB / DED / Laporan Akhir" required>
                                        @error('jenis_dokumen')
                                            <span class="text-sm text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupFileAddon01">File</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" name="file"
                                                class="custom-file-input @error('file')
                                                is-invalid
                                            @enderror"
                                                id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" required>
                                            <label class="custom-file-label" for="inputGroupFile01">Pilih file</label>
                                        </div>
                                        @error('file')
                                            <span class="text-sm text-danger">{{ $message }}</span>
                                        @enderror
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
