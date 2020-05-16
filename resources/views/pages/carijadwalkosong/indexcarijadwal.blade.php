@extends('layouts.app')

@section('content')
    <div class="row justify-content-center full-height">
        <div class="col-md-12">
            <div class="card full">
                <div class="card-header">Cari Jadwal Kosong</div>

                {{ Form::open(['action'=> 'JadwalTrafficIklanController@carijadwalresult', 'method' => 'POST']) }}
                <div class="card-body align-center-vh">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="jenis_iklan" class="col-form-label">Jenis Iklan</label>
                            </div>
                            <div class="col-9">
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
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_iklan" id="jenis_iklan"
                                           value="3">
                                    <label class="form-check-label" for="jenis_iklan">Ads Lips</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label for="kategori" class="col-form-label">Kategori Jadwal</label>
                            </div>
                            <div class="col-9">
                                <select id="id_kategori" name="id_kategori" class="form-control"
                                        onClick="checkKategori()">
                                    @foreach ($kategoris as $kategori)
                                        <option value="{{ $kategori->id_kategori }}">
                                            {{ $kategori->nama_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                                <input id="kategori_lainlain" type="hidden" class="form-control" name="nama_kategori">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label for="jumlah_tayang" class="col-form-label">Jumlah Tayang</label>
                            </div>
                            <div class="col-9">
                                <input type="number" class="form-control" name="jumlah_tayang">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label for="jumlah_tayang" class="col-form-label">Periode Tayang</label>
                            </div>
                            <div class="col-4">
                                <input type="date" class="form-control" name="priode_awal">
                            </div>
                            <div class="col-1 align-center-vh">
                                <label class="col-form-label"> s.d. </label>
                            </div>
                            <div class="col-4">
                                <input type="date" class="form-control" name="priode_akhir">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label for="jumlah_tayang" class="col-form-label">Jumlah Tayang</label>
                            </div>
                            <div class="col-9">
                                <div class="row">
                                    <div class="form-check-inline col-4">
                                        <label class="form-check-label">
                                            <input name="waktu_tayang[]" type="checkbox" class="form-check-input"
                                                   value="1">04:00-06:00
                                        </label>
                                    </div>
                                    <div class="form-check-inline col-4">
                                        <label class="form-check-label">
                                            <input name="waktu_tayang[]" type="checkbox" class="form-check-input"
                                                   value="2">06:00-10:00

                                        </label>
                                    </div>
                                    <div class="form-check-inline col-4">
                                        <label class="form-check-label">
                                            <input name="waktu_tayang[]" type="checkbox" class="form-check-input"
                                                   value="3">10:00-14:00
                                        </label>
                                    </div>
                                    <div class="form-check-inline col-4">
                                        <label class="form-check-label">
                                            <input name="waktu_tayang[]" type="checkbox" class="form-check-input"
                                                   value="4">14:00-18:00
                                        </label>
                                    </div>
                                    <div class="form-check-inline col-4">
                                        <label class="form-check-label">
                                            <input name="waktu_tayang[]" type="checkbox" class="form-check-input"
                                                   value="5">18:00-23.00
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <input class="btn btn-primary" type="submit" value="Cari">
                </div>
            </div>
        </div>
    </div>
@endsection
