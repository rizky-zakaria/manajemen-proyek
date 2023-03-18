@extends('layouts.template')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $modul }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Data-master</a></div>
                    <div class="breadcrumb-item"><a href="">{{ $modul }}</a></div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="alert alert-primary" role="alert">
                                                <h4>Form Kegiatan</h4>
                                            </div>
                                            <div class="card">
                                                <form action="{{ route('kalender.store') }}" method="POST">
                                                    @csrf
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <div class="form-label">Keterangan Kegiatan</div>
                                                            <textarea name="kegiatan" class="form-control" id="kegiatan" cols="30" rows="2"></textarea>
                                                        </div>
                                                        <div class="form-group mt-4">
                                                            <div class="form-label">Tgl Mulai</div>
                                                            <input type="datetime-local" class="form-control" name="mulai"
                                                                id="mulai">
                                                        </div>
                                                        <div class="form-group mt-4">
                                                            <div class="form-label">Tgl Selesai</div>
                                                            <input type="datetime-local" class="form-control" name="selesai"
                                                                id="selesai">
                                                        </div>
                                                        <div class="form-group mt-4">
                                                            <button type="submit" class="btn btn-success">Simpan</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div id="calendar"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- @include('layouts.script.delete') --}}
@endsection
@push('js')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
        integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: [
                    <?php
                    foreach($data as $item){
                        ?> {
                        title: '{{ $item->kegiatan }}',
                        start: '{{ $item->mulai }}',
                        end: '{{ $item->selesai }}'
                    }
                    <?php
                    }                        
                    ?>
                ],
                selectOverlap: function(event) {
                    return event.rendering === 'background';
                }
            });

            calendar.render();
        });
    </script>
@endpush
