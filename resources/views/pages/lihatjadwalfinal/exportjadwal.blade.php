<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sistem-Kolaborasi') }}</title>

    <!-- Styles -->

    <!-- Bootstrap CSS CDN -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
    <br>
    @if(isset($request))
    <div class="row justify-content-center full-height">
        <div class="col-md-12">
            <div class="card-body">
                @if(isset($jadwal_final))
                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-title">
                                <th colspan="9">
                                    <h3>Jadwal Traffic Iklan Spot Iklan {{ \Carbon\Carbon::parse($request->tanggal_jadwal)->translatedFormat('l, j F Y') }}</h3>
                                </th>
                            </tr>
                            <tr>
                                <th>Jam</th>
                                @if($request->jenis_iklan == 0)
                                    <th>Jenis Iklan</th>
                                @endif
                                <th>Nama Produk</th>
                                @if($request->jenis_iklan == 1 || $request->jenis_iklan == 0)
                                    <th>Versi</th>
                                @endif
                                <th>Kategori</th>
                                <th>Periode Tayang</th>
                                <th>Kategori</th>
                                <th>No Order</th>
                                <th>AE</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jadwal_final as $jadwal)
                            <tr>
                                <td>{{$jadwal->jam_jadwal}}</td>
                                @if($request->jenis_iklan == 0)
                                    <td>{{$jadwal->nama_jenis_iklan}}</td>
                                @endif
                                @if($jadwal->status_order == 'Confirmed')
                                    <td>{{$jadwal->nama_produk}}</td>
                                    @if($request->jenis_iklan == 1 || $request->jenis_iklan == 0)
                                        <td>{{$jadwal->versi_iklan}}</td>
                                    @endif
                                    <td>{{$jadwal->nama_kategori}}</td>
                                    @if(is_null($jadwal->priode_awal))
                                        <td></td>
                                    @else
                                        <td>{{\Carbon\Carbon::parse($jadwal->priode_awal)->translatedFormat('l, j F Y') . " - " . \Carbon\Carbon::parse($jadwal->priode_akhir)->translatedFormat('l, j F Y') }}</td>
                                    @endif
                                    <td>{{$jadwal->nama_kategori}}</td>
                                    <td>{{$jadwal->id_order_iklan}}</td>
                                    <td>{{$jadwal->name}}</td>
                                @else
                                    <td></td>
                                    <td></td>
                                    @if($request->jenis_iklan == 1 || $request->jenis_iklan == 0)
                                        <td></td>
                                    @endif
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
    @endif

    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>
