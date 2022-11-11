@extends('layouts.template')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $modul }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ url('home') }}">{{ $modul }}</a></div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="card card-statistic-2">
                            <div class="card-chart">
                                <canvas id="balance-chart" height="40"></canvas>
                            </div>
                            <div class="card-icon shadow-primary bg-primary">
                                <i class="fas fa-project-diagram"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Data Proyek</h4>
                                </div>
                                <div class="card-body">
                                    {{ $proyek }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="card card-statistic-2">
                            <div class="card-chart">
                                <canvas id="balance-chart" height="40"></canvas>
                            </div>
                            <div class="card-icon shadow-primary bg-primary">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Data Pegawai</h4>
                                </div>
                                <div class="card-body">
                                    {{ $user }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="card card-statistic-2">
                            <div class="card-chart">
                                <canvas id="balance-chart" height="40"></canvas>
                            </div>
                            <div class="card-icon shadow-primary bg-primary">
                                <i class="fas fa-cogs"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Data Jenis Proyek</h4>
                                </div>
                                <div class="card-body">
                                    {{ $jenis }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="card card-statistic-2">
                            <div class="card-chart">
                                <canvas id="sales-chart" height="40"></canvas>
                            </div>
                            <div class="card-icon shadow-primary bg-primary">
                                <i class="fas fa-book"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Dokumen</h4>
                                </div>
                                <div class="card-body">
                                    {{ $dokumen }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div style="width: 100%;height: 100%">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h6>Histori update progres</h6>
                    </div>
                    <div class="card-body" style="overflow: scroll">
                        <ul class="list-group">
                            @foreach ($his as $item)
                                <li class="list-group-item">{{ $item->user->name }} menambahkan progres pada proyek
                                    <b>{{ $item->proyek->nama_proyek }}</b>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
