@extends('layouts.app')

@section('content')
    <div class="container full-height">
        <div class="row justify-content-center full-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">List Template</div>

                    {{ Form::open(['action' => 'TemplateJadwalcontroller@showtemplate','method' => 'POST']) }}
                    <div class="card-body align-center-vh">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-3">
                                    <label for="nama_template" class="col-form-label">Nama Template</label>
                                </div>
                                <div class="col-7">
                                    <select id="template_jadwal" name="template_jadwal" class="form-control">
                                        @foreach ($template_jadwals as $tj)
                                            @if($selected_template == $tj->id_template)
                                            <option value="{{ $tj->id_template }}" selected>
                                            @else
                                            <option value="{{ $tj->id_template }}">
                                            @endif
                                                {{ $tj->nama_template }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-2">
                                    <input class="btn btn-primary" type="submit" value="Search">
                                </div>
                            </div>
                            <div class="row">
                                <a class="col-12 mini-link" href="/createtemplate">Buat Template Baru</a>
                            </div>
                        </div>
                    </div>
                    {{ Form::close() }}
                    <div class="card-body align-center-vh">
                        <div class="content-width">
                            @if(isset($isi_templates))
                                <table class="table table-striped table-custom table-bordered">
                                    <thead>
                                        <tr class="d-flex">
                                            <th class="col-12" colspan="3">
                                                <h3>Template Jadwal</h3>
                                            </th>
                                        </tr>
                                        <tr class="d-flex">
                                            <th class="col-2">#</th>
                                            <th class="col">Jam Awal</th>
                                            <th class="col">Durasi Segmen</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($isi_templates as $result)
                                            <tr class="d-flex">
                                                <th class="col-2">{{ $loop->iteration }}</th>
                                                <td class="col">{{$result->jam_awal}}</td>
                                                <td class="col">{{$result->durasi_template}}&nbspmenit</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection