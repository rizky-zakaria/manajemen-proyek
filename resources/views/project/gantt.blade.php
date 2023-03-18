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
                {{-- <div class="container mt-3 mb-5">
                    <div class="card">
                        
                    </div>
                </div> --}}
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5>Gantt Chart</h5>
                    </div>
                    <div class="card-body" id="bd-body">
                        <h6>Task Name</h6>
                        <div id="chart_div"></div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('js')
    <script type="text/javascript" src="{{ asset('charts/js/loader.js') }}"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['gantt']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            const dataJson = [];
            const jml = 2;
            $.ajax({
                type: "get",
                url: "gantt-by-project/" + {{ $id }},
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
