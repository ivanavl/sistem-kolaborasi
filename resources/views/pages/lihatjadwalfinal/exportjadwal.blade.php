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
                @if($request->jenis_iklan == 1)
                    @if(isset($jadwal_final))
                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-title">
                                <th colspan="8">
                                    <h3>Jadwal Traffic Iklan Spot Iklan {{ \Carbon\Carbon::parse($request->tanggal_jadwal)->translatedFormat('l, j F Y') }}</h3>
                                </th>
                            </tr>
                            <tr>
                                <th>Jam</th>
                                <th>Nama Produk</th>
                                <th>Versi</th>
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
                                @if($jadwal->status_order == 'Confirmed')
                                    <td>{{$jadwal->nama_produk}}</td>
                                    <td>{{$jadwal->versi_iklan}}</td>
                                    <td>{{$jadwal->nama_kategori}}</td>
                                    @if(is_null($jadwal->priode_awal))
                                        <td></td>
                                    @else
                                        <td>{{$jadwal->priode_awal}}
                                            - {{$jadwal->priode_akhir}}</td>
                                    @endif
                                    <td>{{$jadwal->nama_kategori}}</td>
                                    <td>{{$jadwal->id_order_iklan}}</td>
                                    <td>{{$jadwal->name}}</td>
                                @else
                                    <td></td>
                                    <td></td>
                                    <td></td>
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
                @else
                    @if(isset($jadwal_final))
                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-title">
                                <th colspan="8">
                                    <h3>Jadwal Traffic Iklan
                                    @if($request->jenis_iklan == 2)
                                        Talkshow
                                    @else
                                        Ads Lips
                                    @endif
                                        {{ \Carbon\Carbon::parse($request->tanggal_jadwal)->translatedFormat('l, j F Y') }}</h3>
                                </th>
                            </tr>
                            <tr>
                                <th>Jam</th>
                                <th>Nama Produk</th>
                                <th>Kategori</th>
                                <th>Periode Tayang</th>
                                <th>No Order</th>
                                <th>AE</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jadwal_final as $jadwal)
                            <tr>
                                <td>{{$jadwal->jam_jadwal}}</td>
                                @if($jadwal->status_order == 'Confirmed')
                                    <td>{{$jadwal->nama_produk}}</td>
                                    <td>{{$jadwal->nama_kategori}}</td>
                                    @if(is_null($jadwal->priode_awal))
                                        <td></td>
                                    @else
                                        <td>{{$jadwal->priode_awal}}
                                            - {{$jadwal->priode_akhir}}</td>
                                    @endif
                                    <td>{{$jadwal->id_order_iklan}}</td>
                                    <td>{{$jadwal->name}}</td>
                                @else
                                    <td></td>
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
