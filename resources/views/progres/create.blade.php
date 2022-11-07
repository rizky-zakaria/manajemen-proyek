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
                            <form action="{{ route($modul . '.store') }}" method="post">
                                @csrf
                                <div class="card-header d-flex justify-content-between">
                                    <h4>{{ $modul }}</h4>
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Example select</label>
                                            <select class="form-control" id="exampleFormControlSelect1" name="proyek_id"
                                                required>
                                                <option>Pilih proyek</option>
                                                @foreach ($data as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama_proyek }}</option>
                                                @endforeach
                                            </select>
                                        </div>

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
