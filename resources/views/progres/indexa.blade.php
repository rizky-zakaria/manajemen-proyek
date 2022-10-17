@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-head mt-3 ml-3">
                        {{-- <a  class="btn btn-light">
                            Kembali</a> --}}
                        @if (Auth::user()->role == 'petugas')
                            <a class="btn btn-primary float-right mr-3"
                                href="{{ url('data-master/' . $modul . '/update/' . $id) }}">
                                Update Progres</a>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Progress {{ $title }}</h3>
                                    </div>
                                    <div class="card-body">
                                        @foreach ($cek as $item)
                                            <span>{{ $item->progres }} : {{ $item->persentase . '%' }}</span>
                                            <div class="progress mb-3">
                                                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="40"
                                                    aria-valuemin="0" aria-valuemax="100"
                                                    style="width: {{ $item->persentase . '%' }}">
                                                    <span class="sr-only">40% Complete (success)</span>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
