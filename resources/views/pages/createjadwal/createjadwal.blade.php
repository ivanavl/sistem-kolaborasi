@extends('layouts.app')

@section('content')
    <div class="container full-height">
        <div class="row justify-content-center full-height">
            <div class="col-md-12 accordion" id="accordion-menu">
                <div class="card">
                    <div class="card-header" id="accordion-heading-1" data-toggle="collapse"
                         data-target="#accordion-menu-1" aria-expanded="true" aria-controls="accordion-menu-1">
                        Create Jadwal - Spot Iklan
                    </div>
                    <div id="accordion-menu-1" class="collapse show" aria-labelledby="accordion-heading-1" data-parent="#accordion-menu">
                        {{ Form::open(['action' => 'JadwalTrafficIklanController@storejadwal', 'method' => 'POST']) }}
                        <div class="card-body align-center-vh">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-4">
                                        <label for="tanggal_awal" class="col-form-label">Tanggal Awal</label>
                                    </div>
                                    <div class="col-8">
                                        <input name="tanggal_awal" type="date" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <label for="tanggal_akhir" class="col-form-label">Tanggal Akhir</label>
                                    </div>
                                    <div class="col-8">
                                        <input name="tanggal_akhir" type="date" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <label for="template_jadwal" class="col-form-label">Template Jadwal</label>
                                        <br>
                                        <a class="mini-link" href="/lihattemplate">Lihat Template</a>
                                    </div>
                                    <div class="col-8">
                                        <select id="template_jadwal" name="template_jadwal" class="form-control">
                                            @foreach ($template_jadwals1 as $tj1)
                                                <option value="{{ $loop->iteration }}" selected="selected">
                                                    {{ $tj1 }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            {{Form::hidden('jenis_iklan', 1)}}
                        </div>
                        <div class="card-footer">
                            <input class="btn btn-primary" type="submit" value="Create">
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="accordion-heading-2" data-toggle="collapse"
                         data-target="#accordion-menu-2" aria-expanded="false" aria-controls="accordion-menu-2">
                        Create Jadwal - Talkshow
                    </div>
                    <div id="accordion-menu-2" class="collapse" aria-labelledby="accordion-heading-2" data-parent="#accordion-menu">
                        {{ Form::open(['action' => 'JadwalTrafficIklanController@storejadwal', 'menthod' => 'POST']) }}
                        <div class="card-body align-center-vh">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-4">
                                        <label for="tanggal_awal" class="col-form-label">Tanggal Awal</label>
                                    </div>
                                    <div class="col-8">
                                        <input name="tanggal_awal" type="date" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <label for="tanggal_akhir" class="col-form-label">Tanggal Akhir</label>
                                    </div>
                                    <div class="col-8">
                                        <input name="tanggal_akhir" type="date" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <label for="template_jadwal" class="col-form-label">Template Jadwal</label>
                                    </div>
                                    <div class="col-8">
                                        <select id="template_jadwal talkshow" name="template_jadwal" class="form-control"
                                                onchange="checkIfBAT()">
                                            @foreach ($template_jadwals2 as $tj2)
                                                <option value="{{ $loop->iteration }}" selected="selected">
                                                    {{ $tj2 }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <input name="jam_jadwal" id="bat_time" type="hidden" class="form-control">
                                    </div>
                                </div>
                            </div>
                            {{Form::hidden('jenis_iklan', 2)}}
                        </div>
                        <div class="card-footer">
                            <input class="btn btn-primary" type="submit" value="Create">
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection