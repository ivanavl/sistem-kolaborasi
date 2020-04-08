@extends('layouts.app')

@section('content')
    <div class="row justify-content-center full-height">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create Template</div>

                {{ Form::open(['action' => 'TemplateJadwalController@tempstoretemplate', 'menthod' => 'POST']) }}
                <div class="card-body align-center-vh">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-2">
                                <label for="jam_awal" class="col-form-label">Waktu Tayang</label>
                            </div>
                            <div class="col-3">
                                <input type="time" name="jam_awal" class="form-control">
                            </div>
                            <div class="col-2">
                                <label for="durasi_template" class="col-form-label">Durasi Segmen</label>
                            </div>
                            <div class="col-3">
                                <input type="number" name="durasi_template" class="form-control">
                            </div>
                            <div class="col-2">
                                <input class="btn btn-primary" type="submit" value="Add">
                            </div>
                        </div>
                        <div class="row">
                            <a class="col-12 mini-link" href="/lihattemplate">Lihat Template Jadwal</a>
                        </div>
                    </div>
                </div>
                {{ Form::close() }}
                @if(Session::get('template'))
                    <div class="card-body align-center-vh">
                        <div class="content-width">
                            <div class="table-container">
                                <table class="table table-striped table-custom table-bordered">
                                    <thead>
                                    <tr class="table-title">
                                        <th colspan="4">
                                            <h3>Jadwal Dibuat</h3>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>#</th>
                                        <th>Jam Awal</th>
                                        <th>Durasi Segmen</th>
                                        <th>
                                            <i class="fas fa-trash"></i>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(Session::get('template') as $t)
                                        <tr>
                                            <th> {{ $loop->iteration }}</th>
                                            <td> {{ $t->get('jam_awal') }} </td>
                                            <td> {{ $t->get('durasi_template') }} &nbspiklan</td>
                                            <td>
                                                <a href="/removesegmen/{{$t->get('jam_awal')}}">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{ Form::open(['action' => 'TemplateJadwalController@storetemplate','menthod' => 'POST']) }}
                    <div class="card-footer">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-3">
                                    <label for="nama_template" class="col-form-label">Nama Template</label>
                                </div>
                                <div class="col-7">
                                    <input name="nama_template" class="form-control">
                                </div>
                                <div class="col-2">
                                    <input class="btn btn-primary" type="submit" value="Create">
                                </div>
                            </div>
                        </div>
                    </div>
                    {{ Form::close() }}
                @endif
            </div>
        </div>
    </div>
@endsection