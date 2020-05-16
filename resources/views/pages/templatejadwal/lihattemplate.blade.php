@extends('layouts.app')

@section('content')
    <div class="row justify-content-center full-height">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Lihat Templat</div>

                {{ Form::open(['action' => 'TemplateJadwalcontroller@showtemplate','method' => 'POST']) }}
                <div class="card-body align-center-vh">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="nama_template" class="col-form-label">Nama Templat</label>
                            </div>
                            <div class="col-7">
                                <select id="template_jadwal" name="template_jadwal" class="form-control">
                                    @foreach ($template_jadwals as $tj)
                                        @if(isset($selected_template))
                                            @if($selected_template == $tj->id_template)
                                                <option value="{{ $tj->id_template }}" selected>
                                            @else
                                                <option value="{{ $tj->id_template }}">
                                                    @endif
                                                    {{ $tj->nama_template }}
                                                </option>
                                                @else
                                                    <option value="{{ $tj->id_template }}">
                                                        {{ $tj->nama_template }}
                                                    </option>
                                                @endif
                                                @endforeach
                                </select>
                            </div>
                            <div class="col-2">
                                <input class="btn btn-primary" type="submit" value="Cari">
                            </div>
                        </div>
                        <div class="row">
                            <a class="col-12 mini-link" href="/buattemplat">Buat Templat Baru</a>
                        </div>
                    </div>
                </div>
                {{ Form::close() }}
                @if(isset($isi_templates))
                    <div class="card-body align-center-vh">
                        <div class="content-width">
                            <div class="table-container">
                                <table class="table table-striped table-custom table-bordered">
                                    <thead>
                                    <tr class="table-title">
                                        <th colspan="3">
                                            <h3>Templat Jadwal</h3>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>#</th>
                                        <th>Waktu Segmen</th>
                                        <th>Durasi (dalam menit)</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($isi_templates as $result)
                                        <tr>
                                            <th>{{ $loop->iteration }}</th>
                                            <td>{{$result->jam_awal}}</td>
                                            <td>{{$result->durasi_template}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
