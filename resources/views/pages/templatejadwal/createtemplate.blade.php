@extends('layouts.app')

@section('content')
    <div class="container full-height">
        <div class="row justify-content-center full-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">List Template</div>

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
                    <div class="card-body align-center-vh">
                        <div class="content-width">
                            @if(Session::has('template'))
                                <table class="table table-striped table-custom table-bordered">
                                    <thead>
                                    <tr class="d-flex">
                                        <th class="col-12" colspan="3">
                                            <h3>Jadwal Dibuat</h3>
                                        </th>
                                    </tr>
                                    <tr class="d-flex">
                                        <th class="col-2">#</th>
                                        <th class="col">Jam Awal</th>
                                        <th class="col">Durasi Segmen</th>
                                        <th class="col-1">
                                            <i class="fas fa-trash"></i>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(Session::get('template') as $t)
                                        <tr class="d-flex">
                                            <th class="col-2"> {{ $loop->iteration }}</th>
                                            <td class="col"> {{ $t->get('jam_awal') }} </td>
                                            <td class="col"> {{ $t->get('durasi_template') }} &nbspiklan </td>
                                            <td class="col-1">
                                                <a  href="/removesegmen/{{$t->get('jam_awal')}}">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @endif
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
                </div>
            </div>
        </div>
    </div>
@endsection