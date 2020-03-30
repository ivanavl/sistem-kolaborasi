@extends('layouts.app')

@section('content')
    <div class="container full-height">
        <div class="row justify-content-center full-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Lihat Jadwal Final</div>

                    {{ Form::open(['action'=> 'JadwalTrafficIklanController@showjadwalfinal', 'method' => 'POST']) }}
                    <div class="card-body align-center-vh">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-3">
                                    <label for="jenis_iklan" class="col-form-label">Jenis Iklan</label>
                                </div>
                                <div class="col-4">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis_iklan" id="jenis_iklan"
                                               value="1" checked>
                                        <label class="form-check-label" for="jenis_iklan">Spot Iklan</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis_iklan" id="jenis_iklan"
                                               value="2">
                                        <label class="form-check-label" for="jenis_iklan">Talkshow</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <label for="tanggal_jadwal" class="col-form-label">Tanggal Iklan</label>
                                </div>
                                <div class="col-7">
                                    <input class="form-control" name="tanggal_jadwal" type="date">
                                </div>
                                <div class="col-2">
                                    <input class="btn btn-primary" type="submit" value="Search">
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