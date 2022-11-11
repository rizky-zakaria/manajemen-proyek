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
                                    <button type="submit" class="btn btn-success">kirim</button>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Nama Proyek</label>
                                        <input type="text" name="proyek_id" class="form-control float-right"
                                            id="reservation" value="{{ $data->nama_proyek }}" disabled>
                                        @error('proyek_id')
                                            <span class="text-sm text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Pesan</label>
                                        <textarea name="" class="form-control"></textarea>
                                        @error('nominal')
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
