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
                            <div class="card-header d-flex justify-content-between">
                                <h4>{{ $modul }}</h4>
                                @if (Auth::user()->role === 'petugas')
                                    <a href="{{ route($modul . '.create') }}" class="btn btn-primary float-right">Tambah</a>
                                @endif
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    #
                                                </th>
                                                <th>Nama Proyek</th>
                                                <th>Lokasi</th>
                                                <th>Persentase</th>
                                                <th>Bar</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            ?>
                                            @foreach ($data as $item)
                                                <tr>
                                                    <td>
                                                        {{ $no++ }}
                                                    </td>
                                                    <td>{{ $item->proyek->nama_proyek }}</td>
                                                    <td>
                                                        {{ $item->proyek->lokasi }}
                                                    </td>
                                                    <td>
                                                        {{ $item->persentase }}
                                                    </td>
                                                    <td class="align-middle">
                                                        <div class="progress" data-height="4" data-toggle="tooltip"
                                                            title="{{ $item->persentase }}%">
                                                            <div class="progress-bar bg-success"
                                                                data-width="{{ $item->persentase }}%"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        @if ($item->persentase < 100)
                                                            on proses
                                                        @else
                                                            done
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ url('data-master/progress/' . $item->id) }}"
                                                            class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                                                        @if (Auth::user()->role === 'petugas')
                                                            <a href="{{ url('data-master/progress/' . $item->id . '/edit') }}"
                                                                class="btn btn-sm btn-success"><i
                                                                    class="fas fa-edit"></i></a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
