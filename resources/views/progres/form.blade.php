@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <form action="{{ url('data-master/pembangunan-jalan/store-grapich') }}" method="post">
                        @csrf
                        @method('POST')
                        <div class="card-head mt-3 ml-3">
                            <a class="btn btn-light">
                                Kembali</a>
                            <button type="submit" class="btn btn-success float-right mr-3">Simpan</button>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-8 mb-3">
                                        <label for="validationDefault01">Parameter Penilaian</label>
                                        <input type="hidden" name="id" value="{{ $id }}">
                                        <input type="text" class="form-control" id="validationDefault01"
                                            name="parameter[]" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationDefault02">Nilai Persentase</label>
                                        <input type="number" class="form-control" id="validationDefault02" name="nilai[]"
                                            required>
                                    </div>
                                    <div class="col-md-1" style="margin-top: 31px">
                                        <button class="btn btn-primary" onclick="add()" id="add"><i
                                                class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="form-row" id="form-add">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
