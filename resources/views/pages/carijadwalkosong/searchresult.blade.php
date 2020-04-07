@extends('layouts.app')

@section('content')
    <div class="row justify-content-center full-height">
        <div class="col-md-12 accordion" id="accordion-menu">
            @if(isset($result))
                {{ Form::open(['action' => 'JadwalTrafficIklanController@keepjadwal', 'method' => 'POST']) }}
                @foreach($result as $k => $v)
                    <div class="card">
                        <div class="card-header" id="accordion-heading-{{ $loop->iteration }}"
                             data-toggle="collapse"
                             data-target="#accordion-menu-{{ $loop->iteration }}" aria-expanded="true"
                             aria-controls="accordion-menu-{{ $loop->iteration }}">
                            {{$k}}
                        </div>
                        <div id="accordion-menu-{{ $loop->iteration }}" class="collapse"
                             aria-labelledby="accordion-heading-{{ $loop->iteration }}"
                             data-parent="#accordion-menu">
                            <div class="card-body align-center-vh">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="pilihan_tanggal" class="col-form-label">
                                                Tersedia {{$resultCount[$k][0]->total}} slot yang sesuai dengan prefernsi waktu
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        @foreach($v as $data)
                                            <div class="form-check-inline col-3">
                                                <label class="form-check-label">
                                                    <input name="jadwal[]" type="checkbox" class="form-check-input"
                                                           value="{{ $data->id_jadwal }}" onchange="countSelected()">
                                                    {{ $data->jam_jadwal }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="alternatif_tanggal" class="col-form-label">
                                                Tersedia {{$resultAltCount[$k][0]->total}} slot alternatif yang berbeda dengan preferensi waktu
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        @foreach($resultAlt[$k] as $data)
                                            <div class="form-check-inline col-3">
                                                <label class="form-check-label">
                                                    <input name="jadwal[]" type="checkbox" class="form-check-input"
                                                           value="{{ $data->id_jadwal }}" onchange="countSelected()">
                                                    {{ $data->jam_jadwal }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($loop->last)
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-8">
                                        Pilih <strong><span id="checkbox_counter">{{ $counter }}</span></strong> jadwal
                                        lagi.
                                    </div>
                                    <div class="col-4">
                                        <input class="btn btn-primary" id="keep-jadwal" type="submit" value="Next"
                                               disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach
                {{ Form::close() }}
            @else
                <div>

                </div>
            @endif

        </div>
    </div>
@endsection
