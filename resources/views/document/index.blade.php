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
                            @if (Auth::user()->role === 'admin')
                            <a href="{{ route($modul . '.create') }}" class="btn btn-primary float-right">Tambah</a>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Proyek</th>
                                            <th>Jenis Dokumen</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>
                                                {{ $item->nama_proyek }}
                                            </td>
                                            <td>
                                                {{ $item->jenis_dokumen }}
                                            </td>
                                            <td>
                                                {{-- <a href="{{ asset('uploads/files/' . $item->dokumen) }}"
                                                    class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a> --}}
                                                <iframe src="{{ asset('uploads/files/' . $item->dokumen) }}"
                                                    width="100%" height="500px">
                                                </iframe>
                                                @if (Auth::user()->role === 'admin')
                                                <a href="javascript:;" data-toggle="modal"
                                                    onclick="deleteData({{ $item->id }})" data-target="#DeleteModal"
                                                    class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash"></i>
                                                </a>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Proyek</th>
                                            <th>Jenis Dokumen</th>
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
                    <button type="button" class="btn btn-outline-warning" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="" class="btn btn-outline-danger" data-dismiss="modal"
                        onclick="formSubmit()">Yes, Delete</button>
                </div>
            </div>
        </form>
    </div>
</div>


@include('layouts.script.delete')
@endsection
