@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-head mt-3 ml-3">
                        {{-- <a class="btn btn-light">
                            Kembali</a> --}}
                        <a href=" {{ route('proyek.create') }} " class="btn btn-primary float-right mr-3">Tambah</a>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-striped">
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
                                                        data-target="#DeleteModal" class="btn btn-sm btn-danger"><i
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

    <div id="DeleteModal" class="modal fade" aria-hidden="true">
        <div class="modal-dialog ">
            <!-- Modal content-->
            <form action="" id="deleteForm" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-center">DELETE CONFIRMATION</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <p class="text-center">Are you sure want to delete this data ?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="" class="btn btn-outline-light" data-dismiss="modal"
                            onclick="formSubmit()">Yes, Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal -->
    {{-- @if ($data != [])
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Item</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin ingin menghapus item ini?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <form action=" {{ route('proyek.destroy', $item->id) }} " method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif --}}
    @include('layouts.script.delete')
@endsection
