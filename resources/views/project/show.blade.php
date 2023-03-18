@extends('layouts.template')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $modul }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Data-master</a></div>
                    <div class="breadcrumb-item"><a href="{{ route($modul . '.index') }}">{{ $modul }}</a></div>
                    <div class="breadcrumb-item">Detail</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        {{-- start --}}
                        <div class="card">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-toggle="tab"
                                        data-target="#nav-milestone" type="button" role="tab" aria-controls="nav-home"
                                        aria-selected="true">Milestone</button>
                                    <button class="nav-link" id="nav-profile-tab" data-toggle="tab"
                                        data-target="#nav-tasklist" type="button" role="tab"
                                        aria-controls="nav-profile" aria-selected="false">Tasklist</button>
                                    <button class="nav-link" id="nav-profile-tab" data-toggle="tab"
                                        data-target="#nav-kanban" type="button" role="tab" aria-controls="nav-profile"
                                        aria-selected="false">Task Kanban</button>
                                    <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-files"
                                        type="button" role="tab" aria-controls="nav-profile"
                                        aria-selected="false">Files</button>
                                    <button class="nav-link" id="nav-profile-tab" data-toggle="tab"
                                        data-target="#nav-detail" type="button" role="tab" aria-controls="nav-profile"
                                        aria-selected="false">Details</button>
                                    {{-- <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-gantt"
                                        type="button" role="tab" aria-controls="nav-profile"
                                        aria-selected="false">Gantt chart</button> --}}
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-milestone" role="tabpanel"
                                    aria-labelledby="nav-home-tab">
                                    <div class="card-header">
                                        Milestone
                                    </div>
                                    <div class="card-body">
                                        <div class="timeline" id="timeline">
                                            <div class="timeline__wrap">
                                                <div class="timeline__items">
                                                    @foreach ($timeline as $item)
                                                        <div class="timeline__item">
                                                            <div class="timeline__content">
                                                                <h2>{{ $item->tgl_mulai . ' ' . $bulan[$item->bln_mulai] . ' ' . $item->thn_mulai }}
                                                                    s/d
                                                                    {{ $item->tgl_selesai . ' ' . $bulan[$item->bln_selesai] . ' ' . $item->thn_selesai }}
                                                                </h2>
                                                                <p>{{ $item->task_name }}</p>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-tasklist" role="tabpanel"
                                    aria-labelledby="nav-profile-tab">
                                    <div class="card-header d-flex justify-content-between">
                                        <h4>Task List</h4>
                                        @if (Auth::user()->role === 'faskes')
                                            <a href="{{ route('obat.create') }}"
                                                class="btn btn-primary float-right">Tambah</a>
                                        @endif
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ url('form-input/gantt') }}" method="post">
                                            @csrf
                                            <div class="card-header d-flex justify-content-between">
                                                <h4>Form Tambah Pekerjaan</h4>
                                                <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label for="">Nama Pekerjaan</label>
                                                        <input type="text" name="nama" id="nama"
                                                            class="form-control">
                                                        <input type="hidden" name="id" value="{{ $data->id }}">
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="resource">Resource</label>
                                                        <input type="text" name="resource" id="resource"
                                                            class="form-control">
                                                    </div>
                                                    <div class="col-4">
                                                        <label for="tanggal_mulai">Tanggal Mulai</label>
                                                        <input type="number" name="tanggal_mulai" id="tanggal_mulai"
                                                            class="form-control">
                                                    </div>
                                                    <div class="col-4">
                                                        <label for="bulan_mulai">Bulan Mulai</label>
                                                        <select class="form-control" aria-label="Default select example"
                                                            name="bulan_mulai">
                                                            <option selected disabled>Pilih</option>
                                                            <option value="0">Januari</option>
                                                            <option value="1">Februari</option>
                                                            <option value="2">Maret</option>
                                                            <option value="3">April</option>
                                                            <option value="4">Mei</option>
                                                            <option value="5">Juni</option>
                                                            <option value="6">Juli</option>
                                                            <option value="7">Agustus</option>
                                                            <option value="8">September</option>
                                                            <option value="9">Oktober</option>
                                                            <option value="10">November</option>
                                                            <option value="11">Desember</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-4">
                                                        <label for="tahun_mulai">Tahun Mulai</label>
                                                        <input type="number" name="tahun_mulai" id="tahun_mulai"
                                                            class="form-control">
                                                    </div>
                                                    <div class="col-4">
                                                        <label for="tanggal_selesai">Tanggal Selesai</label>
                                                        <input type="number" name="tanggal_selesai" id="tanggal_selesai"
                                                            class="form-control">
                                                    </div>
                                                    <div class="col-4">
                                                        <label for="bulan_selesai">Bulan Mulai</label>
                                                        <select class="form-control" aria-label="Default select example"
                                                            name="bulan_selesai">
                                                            <option selected disabled>Pilih</option>
                                                            <option value="0">Januari</option>
                                                            <option value="1">Februari</option>
                                                            <option value="2">Maret</option>
                                                            <option value="3">April</option>
                                                            <option value="4">Mei</option>
                                                            <option value="5">Juni</option>
                                                            <option value="6">Juli</option>
                                                            <option value="7">Agustus</option>
                                                            <option value="8">September</option>
                                                            <option value="9">Oktober</option>
                                                            <option value="10">November</option>
                                                            <option value="11">Desember</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-4">
                                                        <label for="tahun_selesai">Tahun Mulai</label>
                                                        <input type="number" name="tahun_selesai" id="tahun_selesai"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <table class="table table-striped" id="table-1">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Pekerjaan</th>
                                                        <th>Tgl Mulai</th>
                                                        <th>Tgl Selesai</th>
                                                        <th>Persentasi</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1; ?>
                                                    @foreach ($timeline as $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $item->task_name }}</td>
                                                            <td>
                                                                {{ $item->tgl_mulai . ' ' . $bulan[$item->bln_mulai] . ' ' . $item->thn_mulai }}
                                                            </td>
                                                            <td>
                                                                {{ $item->tgl_selesai . ' ' . $bulan[$item->bln_selesai] . ' ' . $item->thn_selesai }}
                                                            </td>
                                                            <td>{{ $item->percent }}%</td>
                                                            <td>
                                                                <a href="{{ url('data-master/proyek/update-progres/' . $item->task_id) }}"
                                                                    class="btn btn-sm btn-primary">Update
                                                                    Progres</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Pekerjaan</th>
                                                        <th>Tgl Mulai</th>
                                                        <th>Tgl Selesai</th>
                                                        <th>Persentasi</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade show" id="nav-kanban" role="tabpanel"
                                    aria-labelledby="nav-home-tab">
                                    <div class="card-header d-flex justify-content-between">
                                        <h4>Task Kanban</h4>
                                    </div>
                                    <div class="card-body" id="pasien">
                                        <div class="row d-flex justify-content-between">
                                            <div class="col">
                                                <div class="card">
                                                    <div class="card-header bg-warning">
                                                        <h4 class="text-light">To Do</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <ul class="list-group">
                                                            @foreach ($kanbanToDo as $item)
                                                                <li class="list-group-item">{{ $item->task_name }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="card">
                                                    <div class="card-header bg-primary text-center">
                                                        <h4 class="text-light">In Progress</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <ul class="list-group">
                                                            @foreach ($kanbanInPro as $item)
                                                                <li class="list-group-item">{{ $item->task_name }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="card">
                                                    <div class="card-header bg-success text-center">
                                                        <h4 class="text-light">Done</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <ul class="list-group">
                                                            @foreach ($kanbanDone as $item)
                                                                <li class="list-group-item">{{ $item->task_name }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-files" role="tabpanel"
                                    aria-labelledby="nav-profile-tab">
                                    <div class="card-header d-flex justify-content-between">
                                        <h4>File</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <iframe src="{{ asset('uploads/files/' . $data->file) }}" width="100%"
                                                height="500px">
                                            </iframe>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade show" id="nav-detail" role="tabpanel"
                                    aria-labelledby="nav-home-tab">
                                    <div class="card-header d-flex justify-content-between">
                                        <h4>Detail</h4>
                                    </div>
                                    <div class="card-body" id="pasien">
                                        <div class="table-responsive">
                                            <div class="card">
                                                <div class="card-header d-flex justify-content-between">
                                                    <a href="{{ route($modul . '.index') }}"
                                                        class="btn btn-light">Kembali</a>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label>Nama Proyek</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="fas fa-file"></i>
                                                                </span>
                                                            </div>
                                                            <input type="text" name="nama_proyek"
                                                                class="form-control float-right @error('nama_proyek')
                                                                is-invalid
                                                            @enderror"
                                                                value="{{ $data->nama_proyek }}" id="reservation"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Anggaran</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="fas fa-money-check"></i>
                                                                </span>
                                                            </div>
                                                            <input type="text" name="anggaran"
                                                                class="form-control float-right @error('anggaran')
                                                                is-invalid
                                                            @enderror"
                                                                value="{{ $data->anggaran }}" id="reservation" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Lokasi Proyek</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="fas fa-map-marker"></i>
                                                                </span>
                                                            </div>
                                                            <input type="text" name="lokasi"
                                                                value="{{ $data->lokasi }}"
                                                                class="form-control float-right @error('lokasi')
                                                                is-invalid
                                                            @enderror"
                                                                id="reservation" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Waktu Mulai</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i
                                                                                class="far fa-calendar"></i></span>
                                                                    </div>
                                                                    <input type="text" name="waktu_mulai"
                                                                        class="form-control float-right @error('waktu_mulai')
                                                                        is-invalid
                                                                    @enderror"
                                                                        value="{{ $data->waktu_mulai }}"
                                                                        id="reservationtime" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Waktu Selesai</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i
                                                                                class="far fa-calendar"></i></span>
                                                                    </div>
                                                                    <input type="text" name="waktu_selesai"
                                                                        class="form-control float-right @error('waktu_selesai')
                                                                        is-invalid
                                                                    @enderror"
                                                                        value="{{ $data->waktu_selesai }}"
                                                                        id="reservationtime" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Penanggung Jawab</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i
                                                                                class="far fa-user"></i></span>
                                                                    </div>
                                                                    <input type="text" name="waktu_selesai"
                                                                        class="form-control float-right @error('waktu_selesai')
                                                                        is-invalid
                                                                    @enderror"
                                                                        value="{{ $data->user->name }}"
                                                                        id="reservationtime" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>File</label>
                                                                <div class="input-group">
                                                                    <a href="{{ asset('uploads/files/' . $data->file) }}"
                                                                        class="btn btn-primary">
                                                                        Lihat file
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="tab-pane fade show" id="nav-gantt" role="tabpanel"
                                    aria-labelledby="nav-home-tab">
                                    <div class="container">
                                        <div id="chart_div"></div>
                                    </div>
                                    <div class="card-body" id="bd-body">

                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        {{-- end --}}
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('layouts.script.gantt')
@endsection
@push('js')
    {{-- <script src="{{ asset('timeline/dist/js/timeline.min.js') }}"></script> --}}
    {{-- <script>
        timelineApp(document.querySelectorAll('#timeline'), {
            mode: 'horizontal'
        });
    </script> --}}
    <script type="text/javascript" src="{{ asset('charts/js/loader.js') }}"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['gantt']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            console.log('hello');
            const dataJson = [];
            const jml = 2;
            $.ajax({
                type: "get",
                url: "gantt-chart/gantt-by-project/" + {{ $id }},
                dataType: "json",
                success: function(response) {
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'Task ID');
                    data.addColumn('string', 'Task Name');
                    data.addColumn('string', 'Resource');
                    data.addColumn('date', 'Start Date');
                    data.addColumn('date', 'End Date');
                    data.addColumn('number', 'Duration');
                    data.addColumn('number', 'Percent Complete');
                    data.addColumn('string', 'Dependencies');
                    response.forEach(element => {
                        data.addRows([
                            [element.task_id, element.task_name, element.resource, new Date(
                                    element
                                    .thn_mulai, element.bln_mulai, element.tgl_mulai),
                                new Date(element.thn_selesai, element.bln_selesai, element
                                    .tgl_selesai), null, element.percent,
                                null
                            ]
                        ]);
                    });
                    var options = {
                        height: 400,
                        gantt: {
                            trackHeight: 30
                        }
                    };
                    var chart = new google.visualization.Gantt(document.getElementById('chart_div'));
                    chart.draw(data, options);
                }
            });
        }
    </script>
@endpush
