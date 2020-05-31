@extends('layouts.app')

@section('content')
    <div class="row justify-content-center full-height">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Buat Templat</div>

                {{ Form::open(['action' => 'TemplateJadwalController@tempstoretemplate', 'menthod' => 'POST']) }}
                <div class="card-body align-center-vh">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="jam_awal" class="col-form-label">Waktu Segmen</label>
                            </div>
                            <div class="col-2">
                                <input type="time" name="jam_awal" class="form-control">
                            </div>
                            <div class="col-3">
                                <label for="durasi_template" class="col-form-label">Durasi (dalam menit)</label>
                            </div>
                            <div class="col-2">
                                <input type="number" name="durasi_template" class="form-control">
                            </div>
                            <div class="col-2">
                                <input class="btn btn-primary" type="submit" value="Tambah">
                            </div>
                        </div>
                        <div class="row">
                            <a class="col-12 mini-link" href="/lihattemplat">Lihat Templat Jadwal</a>
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
                                        <th>Waktu Segmen</th>
                                        <th>Durasi (dalam menit)</th>
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
                                            <td> {{ $t->get('durasi_template') }}</td>
                                            <td>
                                                <a href="/hapussegmen/{{$t->get('jam_awal')}}">
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
                                    <label for="nama_template" class="col-form-label">Nama Templat</label>
                                </div>
                                <div class="col-9">
                                    <input name="nama_template" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <label for="jenis_iklan" class="col-form-label">Jenis Iklan</label>
                                </div>
                                <div class="col-9">
                                    <select id="jenis_iklan" name="jenis_iklan" class="form-control">
                                        @foreach ($jenis_iklan as $js)
                                            @if($loop->iteration == 1)
                                                <option value="{{ $js->id_jenis_iklan }}" selected="selected">
                                            @else
                                                <option value="{{ $js->id_jenis_iklan }}">
                                                    @endif
                                                    {{ $js->nama_jenis_iklan }}
                                                </option>
                                                @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            <input class="btn btn-primary" type="submit" value="Buat" style="float:right">
                        </div>
                    </div>
                    {{ Form::close() }}
                @endif
            </div>
        </div>
    </div>
@endsection
