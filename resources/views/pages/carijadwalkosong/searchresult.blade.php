@extends('layouts.app')

@section('content')
    <div class="row justify-content-center full-height">
        @if(isset($result))
            {{ Form::open(['action' => 'OrderIklanController@keepjadwal', 'method' => 'POST', 'style="width: 100%"']) }}
            <div class="col-md-12 accordion" id="accordion-menu">
                @foreach($all as $k => $v)
                    <div class="card">
                        <div class="card-header" id="accordion-heading-{{ $loop->iteration }}"
                             data-toggle="collapse"
                             data-target="#accordion-menu-{{ $loop->iteration }}" aria-expanded="true"
                             aria-controls="accordion-menu-{{ $loop->iteration }}">
                            {{ \Carbon\Carbon::parse($k)->translatedFormat('l, j F Y') }}
                            @if (isset($resultCount[$k][0]))
                                ({{$resultCount[$k][0]->total}} slot tersedia)
                            @elseif (isset($resultAltCount[$k][0]))
                                ({{$resultAltCount[$k][0]->total}} slot alternatif tersedia)
                            @else
                                (Tidak ada slot tersedia)
                            @endif
                        </div>
                        <div id="accordion-menu-{{ $loop->iteration }}" class="collapse"
                             aria-labelledby="accordion-heading-{{ $loop->iteration }}"
                             data-parent="#accordion-menu">
                            <div class="card-body align-center-vh">
                                <div class="content-width">
                                    @if (isset($resultCount[$k][0]) or isset($resultAltCount[$k][0]))
                                        <div class="table-container">
                                            <table class="table table-striped table-custom table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Pilih</th>
                                                        <th>Jam</th>
                                                        <th>Nama Produk</th>
                                                        <th>Kategori</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @if (isset($resultCount[$k][0]))
                                                    @foreach($v as $data)
                                                        @if (in_array($data->id_jadwal, $result[$k]))
                                                            <tr>
                                                                <td>
                                                                    <input name="jadwal[]" type="checkbox" class="form-check-input"
                                                                           value="{{ $data->id_jadwal }}" onchange="countSelected()">
                                                                </td>
                                                                <td>{{ $data->jam_jadwal }}</td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                        @elseif ($data->nama_produk)
                                                            <tr class="table-disabled">
                                                                <td>
                                                                </td>
                                                                <td>{{ $data->jam_jadwal }}</td>
                                                                <td>{{ $data->nama_produk }}</td>
                                                                <td>{{ $data->nama_kategori }}</td>
                                                            </tr>
                                                        @else
                                                            <tr class="table-disabled">
                                                                <td>
                                                                </td>
                                                                <td>{{ $data->jam_jadwal }}</td>
                                                                <td>Slot tidak tersedia karena kategori</td>
                                                                <td></td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    @foreach($allAlt[$k] as $data)
                                                        @if (in_array($data->id_jadwal, $resultAlt[$k]))
                                                            <tr>
                                                                <td>
                                                                    <input name="jadwal[]" type="checkbox" class="form-check-input"
                                                                           value="{{ $data->id_jadwal }}" onchange="countSelected()">
                                                                </td>
                                                                <td>{{ $data->jam_jadwal }}</td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                        @elseif ($data->nama_produk)
                                                            <tr class="table-disabled">
                                                                <td>
                                                                </td>
                                                                <td>{{ $data->jam_jadwal }}</td>
                                                                <td>{{ $data->nama_produk }}</td>
                                                                <td>{{ $data->nama_kategori }}</td>
                                                            </tr>
                                                        @else
                                                            <tr class="table-disabled">
                                                                <td>
                                                                </td>
                                                                <td>{{ $data->jam_jadwal }}</td>
                                                                <td>Slot tidak tersedia karena kategori</td>
                                                                <td></td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    @else
                                        <div class="alert alert-danger" style="width: 100%">
                                            Data tidak tersedia!
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($loop->last)
                        <div class="card">
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
                        </div>
                    @endif
                @endforeach
            </div>
            {{ Form::close() }}
        @else

        @endif

    </div>
@endsection
