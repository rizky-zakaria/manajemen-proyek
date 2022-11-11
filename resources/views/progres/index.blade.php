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
                                                    <td>{{ $item->nama_proyek }}</td>
                                                    <td>
                                                        {{ $item->lokasi }}
                                                    </td>
                                                    <td class="align-middle">
                                                        <div class="progress" style="width: 100px">
                                                            <div class="progress-bar" role="progressbar"
                                                                style="width: {{ $item->persentase }}%"
                                                                aria-valuenow="{{ $item->persentase }}" aria-valuemin="0"
                                                                aria-valuemax="100">
                                                                <strong class="text-dark">{{ $item->persentase }}%</strong>
                                                            </div>
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
                                                            <a href="{{ url('data-master/progress/form-email/' . $item->id) }}"
                                                                class="btn btn-sm btn-warning"><i
                                                                    class="fas fa-envelope"></i></a>
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
