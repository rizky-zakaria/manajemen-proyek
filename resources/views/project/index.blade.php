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
                                <a href="{{ route($modul . '.create') }}" class="btn btn-primary float-right">Tambah</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Proyek</th>
                                                <th>Lokasi</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            @foreach ($data as $item)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $item->nama_proyek }}</td>
                                                    <td>{{ $item->lokasi }}</td>
                                                    <td>
                                                        @if ($item->status == 'diajukan')
                                                            <div class="badge badge-primary">{{ $item->status }}</div>
                                                        @elseif ($item->status == 'diproses')
                                                            <div class="badge badge-warning">{{ $item->status }}</div>
                                                        @elseif ($item->status == 'ditolak')
                                                            <div class="badge badge-danger">{{ $item->status }}</div>
                                                        @else
                                                            <div class="badge badge-success">{{ $item->status }}</div>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route($modul . '.show', $item->id) }}"
                                                            class="btn btn-sm btn-primary">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        @if (Auth::user()->role == 'admin')
                                                            @if ($item->status == 'diajukan' || $item->status == 'ditolak')
                                                                <a href="{{ url('data-master/' . $modul . '/accept', $item->id) }}"
                                                                    class="btn btn-sm btn-success">
                                                                    <i class="fas fa-check"></i>
                                                                </a>
                                                            @endif
                                                            @if ($item->status == 'diajukan' || $item->status == 'diproses')
                                                                <a href="{{ url('data-master/' . $modul . '/reject', $item->id) }}"
                                                                    class="btn btn-sm btn-danger">
                                                                    <i class="fas fa-window-close"></i>
                                                                </a>
                                                            @endif
                                                        @else
                                                            <a href="{{ route('proyek.edit', $item->id) }}"
                                                                class="btn btn-sm btn-success">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            @if ($item->status == 'diajukan')
                                                                <a href="javascript:;" data-toggle="modal"
                                                                    onclick="deleteData({{ $item->id }})"
                                                                    data-target="#DeleteModal"
                                                                    class="btn btn-sm btn-danger"><i
                                                                        class="fas fa-fw fa-trash"></i>
                                                                </a>
                                                            @endif
                                                        @endif
                                                        @if ($item->status == 'diproses' && Auth::user()->role != 'client')
                                                            <a href="{{ url('data-master/' . $modul . '/grapich', $item->id) }}"
                                                                class="btn btn-sm btn-warning">
                                                                <i class="fas fa-chart-line"></i>
                                                            </a>
                                                        @else
                                                            @if ($item->jenis = 'Pembangunan Jalan')
                                                                <a href="{{ url('client/data-master/pembangunan-jalan/grapich', $item->id) }}"
                                                                    class="btn btn-sm btn-warning">
                                                                    <i class="fas fa-chart-line"></i>
                                                                </a>
                                                            @elseif($item->jenis = 'Pembangunan Jembatan')
                                                                <a href="{{ url('client/data-master/pembangunan-jembatan/grapich', $item->id) }}"
                                                                    class="btn btn-sm btn-warning">
                                                                    <i class="fas fa-chart-line"></i>
                                                                </a>
                                                            @elseif($item->jenis = 'Pembangunan Waduk')
                                                                <a href="{{ url('client/data-master/pembangunan-waduk/grapich', $item->id) }}"
                                                                    class="btn btn-sm btn-warning">
                                                                    <i class="fas fa-chart-line"></i>
                                                                </a>
                                                            @elseif($item->jenis = 'Pembangunan Gedung')
                                                                <a href="{{ url('client/data-master/pembangunan-gedung/grapich', $item->id) }}"
                                                                    class="btn btn-sm btn-warning">
                                                                    <i class="fas fa-chart-line"></i>
                                                                </a>
                                                            @elseif($item->jenis = 'Pembangunan Saluran')
                                                                <a href="{{ url('client/data-master/pembangunan-saluran/grapich', $item->id) }}"
                                                                    class="btn btn-sm btn-warning">
                                                                    <i class="fas fa-chart-line"></i>
                                                                </a>
                                                            @endif
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Proyek</th>
                                                <th>Lokasi</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </tfoot>
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
