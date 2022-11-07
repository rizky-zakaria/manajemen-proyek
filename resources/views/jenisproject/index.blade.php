@extends('layouts.template')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>DataTables</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Modules</a></div>
                    <div class="breadcrumb-item">DataTables</div>
                </div>
            </div>
            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('jenis-proyek.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jenis Proyek</label>
                                        <input type="text" class="form-control" name="jenis" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Bidang</label>
                                        <select class="form-control" name="bidang" required>
                                            <option value="infrastruktur">Infrastruktur</option>
                                            <option value="layanan">Layanan Publik</option>
                                            <option value="gedung">Gedung</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-success float-right">simpan</button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Basic DataTables</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Jenis</th>
                                                <th>Bidang</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            @foreach ($data as $item)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $item->jenis }}</td>
                                                    <td>{{ $item->bidang }}</td>
                                                    <td>
                                                        <a href="" class="btn btn-sm btn-success"><i
                                                                class="fas fa-edit"></i></a>
                                                        <a href="javascript:;" data-toggle="modal"
                                                            onclick="deleteData({{ $item->id }})"
                                                            data-target="#DeleteModal" class="btn btn-sm btn-danger"><i
                                                                class="fas fa-fw fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Proyek</th>
                                                <th>Lokasi</th>
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
                        <button type="submit" name="" class="btn btn-danger" data-dismiss="modal"
                            onclick="formSubmit()">Yes, Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @include('layouts.script.delete')
@endsection
