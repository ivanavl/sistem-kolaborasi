<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JadwalTrafficIklan;
use App\TemplateJadwal;
use App\Kategori;
use App\User;
use Illuminate\Support\Facades\DB;
use Session;

class JadwalTrafficIklanController extends Controller
{

    //View Create Jadwal
    public function createjadwal()
    {
        $temp1 = TemplateJadwal::where('id_jenis_iklan', '1')
            ->select('nama_template', 'id_template');
        $template_jadwals1 = $temp1->get();
        $temp2 = TemplateJadwal::where('id_jenis_iklan', '2')
            ->select('nama_template', 'id_template');
        $template_jadwals2 = $temp2->get();
        $temp3 = TemplateJadwal::where('id_jenis_iklan', '3')
            ->select('nama_template', 'id_template');
        $template_jadwals3 = $temp3->get();

        Session::forget('template');
        return view('pages.createjadwal.createjadwal')->with('template_jadwals1', $template_jadwals1)
            ->with('template_jadwals2', $template_jadwals2)->with('template_jadwals3', $template_jadwals3);
    }

    //CreateJadwal
    public function storejadwal(Request $request)
    {
        $jenis_iklan = intval($request->input('jenis_iklan'));

        if ($jenis_iklan == 1) {
            $this->validate($request, [
                'tanggal_awal' => 'required'
            ], [
                'required' => ':attribute tidak boleh kosong'
            ]);

            $tanggal_awal = strtotime($request->input('tanggal_awal'));
            $tanggal_akhir = strtotime($request->input('tanggal_akhir'));
            if ($tanggal_akhir == null) {
                $tanggal_akhir = $tanggal_awal;
            }

            $check = 0;
            while ($tanggal_awal <= $tanggal_akhir) {
                $tanggal_awal = date('Y-m-d', $tanggal_awal);
                $cek_jadwal = JadwalTrafficIklan::where('tanggal_jadwal', '=', $tanggal_awal)
                    ->where('id_jenis_iklan', '=', $jenis_iklan)->get();
                if (!$cek_jadwal->isEmpty()) {
                    $check = 1;
                    return redirect('/buatjadwal')->with('error',
                        'Jadwal ' . \Carbon\Carbon::parse($tanggal_awal)->translatedFormat('l, j F Y') . ' sudah ada');
                }

                $tanggal_awal = strtotime($tanggal_awal);
                $tanggal_awal = strtotime('+1 days', $tanggal_awal);
            }

            $tanggal_awal = strtotime($request->input('tanggal_awal'));
            if ($check < 1) {
                $isi_jadwals = DB::table('isi_templates')
                    ->join('template_jadwals', 'isi_templates.nama_template', '=',
                        'template_jadwals.nama_template')
                    ->select('isi_templates.jam_awal', 'isi_templates.durasi_template')
                    ->where('template_jadwals.id_template', $request->input('template_jadwal'))
                    ->get();

                do {
                    foreach ($isi_jadwals as $isi_jadwal) {
                        $jam_jadwal = $isi_jadwal->jam_awal;
                        $count = 0;
                        do {
                            $temp_next = 0;
                            $create = new JadwalTrafficIklan;
                            $create->tanggal_jadwal = date('Y-m-d', $tanggal_awal);
                            $create->jam_jadwal = $jam_jadwal;
                            $create->id_jenis_iklan = $jenis_iklan;
                            if ($count != 0) {
                                $create->prev = $temp_prev;
                            }
                            $create->save();
                            $temp_prev = $create->id_jadwal;

                            if ($count < $isi_jadwal->durasi_template - 1) {
                                $temp_next = JadwalTrafficIklan::find($temp_prev);
                                $temp_next->next = $temp_prev + 1;
                                $temp_next->save();
                            }

                            $jam_jadwal = date('H:i:s', strtotime('+1 minutes', strtotime($jam_jadwal)));
                            $count++;
                        } while ($count < $isi_jadwal->durasi_template);
                    }
                    $tanggal_awal = strtotime('+1 days', $tanggal_awal);
                } while ($tanggal_awal <= $tanggal_akhir);
                return redirect('/buatjadwal')->with('success', 'Jadwal berhasil dibuat');
            }
        } else if ($jenis_iklan == 2) {
            $this->validate($request, [
                'tanggal_awal' => 'required'
            ], [
                'required' => ':attribute tidak boleh kosong'
            ]);

            if ($request->input('template_jadwal') != 3) {
                $tanggal_awal = strtotime($request->input('tanggal_awal'));
                $tanggal_akhir = strtotime($request->input('tanggal_akhir'));
                if ($tanggal_akhir == '0000-00-00') {
                    $tanggal_akhir = strtotime($tanggal_awal);
                }
                $check = 0;
                do {
                    $tanggal_awal = date('Y-m-d', $tanggal_awal);
                    $cek_jadwal = JadwalTrafficIklan::where('tanggal_jadwal', '=', $tanggal_awal)
                        ->where('id_jenis_iklan', '=', $jenis_iklan)->get();
                    if (!$cek_jadwal->isEmpty()) {
                        $check = 1;
                        return redirect('/buatjadwal')->with('error',
                            'Jadwal ' . \Carbon\Carbon::parse($tanggal_awal)->translatedFormat('l, j F Y') . ' sudah ada');
                    }
                    $tanggal_awal = strtotime($tanggal_awal);
                    $tanggal_awal = strtotime('+1 days', $tanggal_awal);
                } while ($tanggal_awal <= $tanggal_akhir);

                $tanggal_awal = strtotime($request->input('tanggal_awal'));

                if ($check == 0) {
                    $isi_jadwals = DB::table('isi_templates')
                        ->join('template_jadwals', 'isi_templates.nama_template', '=',
                            'template_jadwals.nama_template')
                        ->select('isi_templates.jam_awal', 'isi_templates.durasi_template')
                        ->where('template_jadwals.id_template', $request->input('template_jadwal'))
                        ->get();
                    do {
                        foreach ($isi_jadwals as $isi_jadwal) {
                            $create = new JadwalTrafficIklan;
                            $create->tanggal_jadwal = date('Y-m-d', $tanggal_awal);
                            $create->jam_jadwal = $isi_jadwal->jam_awal;
                            $create->id_jenis_iklan = $jenis_iklan;

                            $create->save();
                        }
                        $tanggal_awal = strtotime('+1 days', $tanggal_awal);
                    } while ($tanggal_awal <= $tanggal_akhir);

                    return redirect('/buatjadwal')->with('success', 'Jadwal berhasil dibuat');
                }
            } else {
                $this->validate($request, [
                    'jam_jadwal' => 'required',
                ], [
                    'required' => ':attribute tidak boleh kosong'
                ]);
                $count = 1;
                $check = 0;
                $jam_jadwal = $request->input('jam_jadwal');

                while ($count <= 25) {
                    $cek_jadwal = JadwalTrafficIklan::where('tanggal_jadwal', '=',
                        $request->input('tanggal_awal'))
                        ->where('jam_jadwal', '=', $jam_jadwal)
                        ->where('id_jenis_iklan', '=', $jenis_iklan)->get();

                    if (!$cek_jadwal->isEmpty()) {
                        $check = 1;
                    }
                    $jam_jadwal = date('H:i:s', strtotime('+1 minutes', strtotime($jam_jadwal)));
                    $count++;
                }

                $jam_jadwal = $request->input('jam_jadwal');
                $count = 1;
                if ($check == 0) {
                    while ($count <= 25) {
                        $cek_jadwal = JadwalTrafficIklan::where('tanggal_jadwal', '=',
                            $request->input('tanggal_awal'))
                            ->where('jam_jadwal', '=', $jam_jadwal)
                            ->where('id_jenis_iklan', '=', $jenis_iklan)->get();
                        if (!$cek_jadwal->isEmpty()) {
                            $check = 1;
                        }
                        $jam_jadwal = date('H:i:s', strtotime('-1 minutes', strtotime($jam_jadwal)));
                        $count++;
                    }
                }

                if ($check == 0) {
                    $create = new JadwalTrafficIklan;
                    $create->tanggal_jadwal = $request->input('tanggal_awal');
                    $create->jam_jadwal = $request->input('jam_jadwal');
                    $create->id_jenis_iklan = $jenis_iklan;
                    $create->save();

                    return redirect('/buatjadwal')->with('success', 'Jadwal berhasil dibuat');
                } else {
                    return redirect('/buatjadwal')->with('error',
                        'Jadwal jam ' . $request->input('jam_jadwal') . ' untuk ' . 
                        \Carbon\Carbon::parse($request->input('tanggal_awal'))->translatedFormat('l, j F Y')
                         . ' sudah ada');
                }
            }
        } else if ($jenis_iklan == 3) {
            $this->validate($request, [
                'tanggal_awal' => 'required'
            ], [
                'required' => ':attribute tidak boleh kosong'
            ]);

            $tanggal_awal = strtotime($request->input('tanggal_awal'));
            $tanggal_akhir = strtotime($request->input('tanggal_akhir'));
            if ($tanggal_akhir == '0000-00-00') {
                $tanggal_akhir = strtotime($tanggal_awal);
            }
            $check = 0;
            do {
                $tanggal_awal = date('Y-m-d', $tanggal_awal);
                $cek_jadwal = JadwalTrafficIklan::where('tanggal_jadwal', '=', $tanggal_awal)
                    ->where('id_jenis_iklan', '=', $jenis_iklan)->get();
                if (!$cek_jadwal->isEmpty()) {
                    $check = 1;
                    return redirect('/buatjadwal')->with('error',
                        'Jadwal ' . \Carbon\Carbon::parse($tanggal_awal)->translatedFormat('l, j F Y') . ' sudah ada');
                }
                $tanggal_awal = strtotime($tanggal_awal);
                $tanggal_awal = strtotime('+1 days', $tanggal_awal);
            } while ($tanggal_awal <= $tanggal_akhir);

            $tanggal_awal = strtotime($request->input('tanggal_awal'));

            if ($check == 0) {
                $isi_jadwals = DB::table('isi_templates')
                    ->join('template_jadwals', 'isi_templates.nama_template', '=',
                        'template_jadwals.nama_template')
                    ->select('isi_templates.jam_awal', 'isi_templates.durasi_template')
                    ->where('template_jadwals.id_template', $request->input('template_jadwal'))
                    ->get();
                do {
                    foreach ($isi_jadwals as $isi_jadwal) {
                        $create = new JadwalTrafficIklan;
                        $create->tanggal_jadwal = date('Y-m-d', $tanggal_awal);
                        $create->jam_jadwal = $isi_jadwal->jam_awal;
                        $create->id_jenis_iklan = $jenis_iklan;
                        $create->save();
                    }
                    $tanggal_awal = strtotime('+1 days', $tanggal_awal);
                } while ($tanggal_awal <= $tanggal_akhir);

                return redirect('/buatjadwal')->with('success', 'Jadwal berhasil dibuat');
            }
        }
    }

    //Lihat Jadwal
    public function showjadwal()
    {
        return view('pages.lihatjadwal.showjadwal');
    }

    public function showjadwalresult(Request $request)
    {
        $this->validate($request, [
            'tanggal_jadwal' => 'required',
        ], [
            'required' => ':attribute tidak boleh kosong'
        ]);

        $date = $request->input('tanggal_jadwal');
        $id_jenis_iklan = 0;
        if ($request->jenis_iklan == "Spot Iklan") {
            $id_jenis_iklan = 1;
        } else if ($request->jenis_iklan == "Talkshow") {
            $id_jenis_iklan = 2;
        } else if ($request->jenis_iklan == "Ads Lips") {
            $id_jenis_iklan = 3;
        }
        if ($date != "") {
            if($id_jenis_iklan > 0){
                $query = DB::table('jadwal_traffic_iklans')
                ->join('jenis_iklans', 'jadwal_traffic_iklans.id_jenis_iklan',
                    '=', 'jenis_iklans.id_jenis_iklan')
                ->leftJoin('order_iklans', 'jadwal_traffic_iklans.id_order_iklan',
                    '=', 'order_iklans.id_order_iklan')
                ->leftJoin('kategoris', 'kategoris.id_kategori', '=', 'order_iklans.id_kategori')
                ->leftJoin('users', 'users.username', '=', 'order_iklans.username')
                ->where('jadwal_traffic_iklans.tanggal_jadwal', '=', $date)
                ->where('jadwal_traffic_iklans.id_jenis_iklan', $id_jenis_iklan)
                ->get();
            }else{
                $query = DB::table('jadwal_traffic_iklans')
                ->join('jenis_iklans', 'jadwal_traffic_iklans.id_jenis_iklan',
                    '=', 'jenis_iklans.id_jenis_iklan')
                ->leftJoin('order_iklans', 'jadwal_traffic_iklans.id_order_iklan',
                    '=', 'order_iklans.id_order_iklan')
                ->leftJoin('kategoris', 'kategoris.id_kategori', '=', 'order_iklans.id_kategori')
                ->leftJoin('users', 'users.username', '=', 'order_iklans.username')
                ->where('jadwal_traffic_iklans.tanggal_jadwal', '=', $date)
                ->orderBy('jam_jadwal')
                ->get();
            }

            if (count($query) > 0) {
                return view('pages.lihatjadwal.showjadwal')->with('results', $query)->with('request', $request);
            }
        }
        return redirect('/lihatjadwal')->with('error', 'Jadwal tidak tersedia');
    }

    //Cari Jadwal Kosong
    public function indexcarijadwal()
    {
        $kategoris = Kategori::orderBy('nama_kategori')->get();
        return view('pages.carijadwalkosong.indexcarijadwal')->with('kategoris', $kategoris);
    }

    //Resutl Cari Jadwal Kosong
    public function carijadwalresult(Request $request)
    {
        $this->validate($request, [
            'jumlah_tayang' => 'required|integer',
            'priode_awal' => 'required',
            'waktu_tayang' => 'required'
        ], [
            'required' => ':attribute tidak boleh kosong',
            'integer' => ':attribute harus berbentuk angka'
        ]);

        $tanggal_awal = strtotime($request->priode_awal);
        $tanggal_akhir = strtotime($request->priode_akhir);
        if ($tanggal_akhir == '') {
            $tanggal_akhir = $tanggal_awal;
        }


        $notAvailableNext = JadwalTrafficIklan::join('order_iklans', 'jadwal_traffic_iklans.id_order_iklan',
            '=', 'order_iklans.id_order_iklan')->where('id_kategori', $request->id_kategori)->pluck('next');
        $notAvailablePrev = JadwalTrafficIklan::join('order_iklans', 'jadwal_traffic_iklans.id_order_iklan',
            '=', 'order_iklans.id_order_iklan')->where('id_kategori', $request->id_kategori)->pluck('prev');
        $notAvailable = array_merge($notAvailableNext->toArray(), $notAvailablePrev->toArray());
        $notAvailable = array_unique($notAvailable);
        $notAvailable = array_filter($notAvailable);

        $count = 0;
        foreach ($request->waktu_tayang as $waktu_tayang) {
            $query = JadwalTrafficIklan::whereNull('id_order_iklan')
                ->where('tanggal_jadwal', '>=', date('Y-m-d', $tanggal_awal))
                ->where('tanggal_jadwal', '<=', date('Y-m-d', $tanggal_akhir))
                ->where('id_jenis_iklan', $request->input('jenis_iklan'))
                ->whereNotIn('id_jadwal', $notAvailable)
                ->select(
                    'jadwal_traffic_iklans.id_jadwal as id_jadwal',
                    'jadwal_traffic_iklans.tanggal_jadwal as tanggal_jadwal'
                );

            if ($waktu_tayang == 1) {
                $query
                    ->where('jam_jadwal', '>=', date('H:i:s', strtotime('04:00:00')))
                    ->where('jam_jadwal', '<=', date('H:i:s', strtotime('06:00:00')));
            } else if ($waktu_tayang == 2) {
                $query
                    ->where('jam_jadwal', '>=', date('H:1:s', strtotime('06:00:00')))
                    ->where('jam_jadwal', '<=', date('H:i:s', strtotime('10:00:00')));
            } else if ($waktu_tayang == 3) {
                $query
                    ->where('jam_jadwal', '>=', date('H:i:s', strtotime('10:00:00')))
                    ->where('jam_jadwal', '<=', date('H:i:s', strtotime('14:00:00')));
            } else if ($waktu_tayang == 4) {
                $query
                    ->where('jam_jadwal', '>=', date('H:i:s', strtotime('14:00:00')))
                    ->where('jam_jadwal', '<=', date('H:i:s', strtotime('18:00:00')));
            } else if ($waktu_tayang == 5) {
                $query
                    ->where('jam_jadwal', '>=', date('H:i:s', strtotime('18:00:00')))
                    ->where('jam_jadwal', '<=', date('H:i:s', strtotime('23:59:00')));
            }

            if ($count == 0) {
                $result = $query;
            } else {
                $result->union($query);
            }
            $count++;
        }
        $resultCount = DB::query()->fromSub($result, 'res')
            ->select('tanggal_jadwal', DB::raw('count(*) as total'))
            ->groupBy('tanggal_jadwal')
            ->get()
            ->groupBy('tanggal_jadwal');
        $result = $result
            ->get()
            ->groupBy('tanggal_jadwal');
        $finalResult = [];
        foreach ($result as $date => $data){
            $finalResult[$date] = [];
            foreach ($data as $d){
                array_push ($finalResult[$date], $d->id_jadwal);
            }
        }

        $count = 0;
        foreach ($request->waktu_tayang as $waktu_tayang) {
            $query = JadwalTrafficIklan::where('tanggal_jadwal', '>=', date('Y-m-d', $tanggal_awal))
                ->where('tanggal_jadwal', '<=', date('Y-m-d', $tanggal_akhir))
                ->where('jadwal_traffic_iklans.id_jenis_iklan', $request->input('jenis_iklan'))
                ->leftjoin('order_iklans', 'order_iklans.id_order_iklan', 'jadwal_traffic_iklans.id_order_iklan')
                ->leftjoin('kategoris', 'kategoris.id_kategori', 'order_iklans.id_kategori')
                ->select(
                    'jadwal_traffic_iklans.id_jadwal as id_jadwal',
                    'jadwal_traffic_iklans.jam_jadwal as jam_jadwal',
                    'jadwal_traffic_iklans.tanggal_jadwal as tanggal_jadwal',
                    'order_iklans.nama_produk as nama_produk',
                    'kategoris.nama_kategori as nama_kategori'
                )
                ->orderBy('jam_jadwal')
                ->orderBy('tanggal_jadwal');

            if ($waktu_tayang == 1) {
                $query
                    ->where('jam_jadwal', '>=', date('H:i:s', strtotime('04:00:00')))
                    ->where('jam_jadwal', '<=', date('H:i:s', strtotime('06:00:00')));
            } else if ($waktu_tayang == 2) {
                $query
                    ->where('jam_jadwal', '>=', date('H:1:s', strtotime('06:00:00')))
                    ->where('jam_jadwal', '<=', date('H:i:s', strtotime('10:00:00')));
            } else if ($waktu_tayang == 3) {
                $query
                    ->where('jam_jadwal', '>=', date('H:i:s', strtotime('10:00:00')))
                    ->where('jam_jadwal', '<=', date('H:i:s', strtotime('14:00:00')));
            } else if ($waktu_tayang == 4) {
                $query
                    ->where('jam_jadwal', '>=', date('H:i:s', strtotime('14:00:00')))
                    ->where('jam_jadwal', '<=', date('H:i:s', strtotime('18:00:00')));
            } else if ($waktu_tayang == 5) {
                $query
                    ->where('jam_jadwal', '>=', date('H:i:s', strtotime('18:00:00')))
                    ->where('jam_jadwal', '<=', date('H:i:s', strtotime('23:59:00')));
            }

            if ($count == 0) {
                $all = $query;
            } else {
                $all->union($query);
            }
            $count++;
        }
        $all = $all
            ->get()
            ->groupBy('tanggal_jadwal');

        $count = 0;
        for ($i = 1; $i < 5; $i++) {
            if (!in_array($i, $request->waktu_tayang)) {
                $query = JadwalTrafficIklan::whereNull('id_order_iklan')
                    ->where('tanggal_jadwal', '>=', date('Y-m-d', $tanggal_awal))
                    ->where('tanggal_jadwal', '<=', date('Y-m-d', $tanggal_akhir))
                    ->where('id_jenis_iklan', $request->input('jenis_iklan'))
                    ->whereNotIn('id_jadwal', $notAvailable)
                    ->select(
                        'jadwal_traffic_iklans.id_jadwal as id_jadwal',
                        'jadwal_traffic_iklans.tanggal_jadwal as tanggal_jadwal'
                    );

                if ($i == 1) {
                    $query
                        ->where('jam_jadwal', '>=', date('H:i:s', strtotime('04:00:00')))
                        ->where('jam_jadwal', '<=', date('H:i:s', strtotime('06:00:00')));
                } else if ($i == 2) {
                    $query
                        ->where('jam_jadwal', '>=', date('H:1:s', strtotime('06:00:00')))
                        ->where('jam_jadwal', '<=', date('H:i:s', strtotime('10:00:00')));
                } else if ($i == 3) {
                    $query
                        ->where('jam_jadwal', '>=', date('H:i:s', strtotime('10:00:00')))
                        ->where('jam_jadwal', '<=', date('H:i:s', strtotime('14:00:00')));
                } else if ($i == 4) {
                    $query
                        ->where('jam_jadwal', '>=', date('H:i:s', strtotime('14:00:00')))
                        ->where('jam_jadwal', '<=', date('H:i:s', strtotime('18:00:00')));
                } else if ($i == 5) {
                    $query
                        ->where('jam_jadwal', '>=', date('H:i:s', strtotime('18:00:00')))
                        ->where('jam_jadwal', '<=', date('H:i:s', strtotime('23:59:00')));
                }

                if ($count == 0) {
                    $resultAlt = $query;
                } else {
                    $resultAlt->union($query);
                }
                $count++;
            }
        }
        $resultAltCount = DB::query()->fromSub($resultAlt, 'res')
            ->select('tanggal_jadwal', DB::raw('count(*) as total'))
            ->groupBy('tanggal_jadwal')
            ->get()
            ->groupBy('tanggal_jadwal');
        $resultAlt = $resultAlt
            ->get()
            ->groupBy('tanggal_jadwal');
        $finalResultAlt = [];
        foreach ($resultAlt as $date => $data){
            $finalResultAlt[$date] = [];
            foreach ($data as $d){
                array_push ($finalResultAlt[$date], $d->id_jadwal);
            }
        }

        $count = 0;
        for ($i = 1; $i < 5; $i++) {
            if (!in_array($i, $request->waktu_tayang)) {
                $query = JadwalTrafficIklan::where('tanggal_jadwal', '>=', date('Y-m-d', $tanggal_awal))
                    ->where('tanggal_jadwal', '<=', date('Y-m-d', $tanggal_akhir))
                    ->where('jadwal_traffic_iklans.id_jenis_iklan', $request->input('jenis_iklan'))
                    ->leftjoin('order_iklans', 'order_iklans.id_order_iklan', 'jadwal_traffic_iklans.id_order_iklan')
                    ->leftjoin('kategoris', 'kategoris.id_kategori', 'order_iklans.id_kategori')
                    ->select(
                        'jadwal_traffic_iklans.id_jadwal as id_jadwal',
                        'jadwal_traffic_iklans.jam_jadwal as jam_jadwal',
                        'jadwal_traffic_iklans.tanggal_jadwal as tanggal_jadwal',
                        'order_iklans.nama_produk as nama_produk',
                        'kategoris.nama_kategori as nama_kategori'
                    )
                    ->orderBy('jam_jadwal')
                    ->orderBy('tanggal_jadwal');

                if ($i == 1) {
                    $query
                        ->where('jam_jadwal', '>=', date('H:i:s', strtotime('04:00:00')))
                        ->where('jam_jadwal', '<=', date('H:i:s', strtotime('06:00:00')));
                } else if ($i == 2) {
                    $query
                        ->where('jam_jadwal', '>=', date('H:1:s', strtotime('06:00:00')))
                        ->where('jam_jadwal', '<=', date('H:i:s', strtotime('10:00:00')));
                } else if ($i == 3) {
                    $query
                        ->where('jam_jadwal', '>=', date('H:i:s', strtotime('10:00:00')))
                        ->where('jam_jadwal', '<=', date('H:i:s', strtotime('14:00:00')));
                } else if ($i == 4) {
                    $query
                        ->where('jam_jadwal', '>=', date('H:i:s', strtotime('14:00:00')))
                        ->where('jam_jadwal', '<=', date('H:i:s', strtotime('18:00:00')));
                } else if ($i == 5) {
                    $query
                        ->where('jam_jadwal', '>=', date('H:i:s', strtotime('18:00:00')))
                        ->where('jam_jadwal', '<=', date('H:i:s', strtotime('23:59:00')));
                }

                if ($count == 0) {
                    $allAlt = $query;
                } else {
                    $allAlt->union($query);
                }
                $count++;
            }
        }
        $allAlt = $allAlt
            ->get()
            ->groupBy('tanggal_jadwal');

        if (!$result->isEmpty() && !$resultAlt->isEmpty()) {
            $id_kategori = $request->id_kategori;
            if ($id_kategori == 1) {
                $this->validate($request, [
                    'nama_kategori' => 'required',
                ], [
                    'required' => ':attribute tidak boleh kosong'
                ]);

                $kategori = $request->input('nama_kategori');

                $query = Kategori::where('nama_kategori', 'LIKE', '%' . $kategori . '%')->get();

                if ($query->isEmpty()) {
                    $create = new Kategori;
                    $create->nama_kategori = $kategori;
                    $create->save();
                    $id_kategori = $create->id_kategori;
                }
            }

            Session::put('id_kategori', $id_kategori);
            Session::put('id_jenis_iklan', $request->input('jenis_iklan'));
            return view('pages.CariJadwalKosong.searchresult')->with('result', $finalResult)
                ->with('resultCount', $resultCount)->with('resultAlt', $finalResultAlt)
                ->with('resultAltCount', $resultAltCount)->with('counter', $request->jumlah_tayang)
                ->with('all', $all)->with('allAlt', $allAlt);
        }

        return redirect('/carijadwalkosong')->with('error', 'Jadwal tidak ditemukan');
    }

    //Lihat Jadwal Final
    public function indexjadwalfinal()
    {
        return view('pages.lihatjadwalfinal.carijadwalfinal');
    }

    public function showJadwalFinal(Request $request)
    {
        $this->validate($request, [
            'tanggal_jadwal' => 'required',
        ], [
            'required' => ':attribute tidak boleh kosong'
        ]);

        if($request->input('jenis_iklan') > 0)
        {
            $jadwal_final = DB::table('jadwal_traffic_iklans')
            ->join('jenis_iklans', 'jadwal_traffic_iklans.id_jenis_iklan'
                , '=', 'jenis_iklans.id_jenis_iklan')
            ->leftJoin('order_iklans', 'jadwal_traffic_iklans.id_order_iklan'
                , '=', 'order_iklans.id_order_iklan')
            ->leftJoin('kategoris', 'kategoris.id_kategori', '=', 'order_iklans.id_kategori')
            ->leftJoin('users', 'users.username', '=', 'order_iklans.username')
            ->where('jadwal_traffic_iklans.tanggal_jadwal', '=', $request->input('tanggal_jadwal'))
            ->where('jadwal_traffic_iklans.id_jenis_iklan', '=', $request->input('jenis_iklan'))
            ->get();
        }else{
            $jadwal_final = DB::table('jadwal_traffic_iklans')
            ->join('jenis_iklans', 'jadwal_traffic_iklans.id_jenis_iklan'
                , '=', 'jenis_iklans.id_jenis_iklan')
            ->leftJoin('order_iklans', 'jadwal_traffic_iklans.id_order_iklan'
                , '=', 'order_iklans.id_order_iklan')
            ->leftJoin('kategoris', 'kategoris.id_kategori', '=', 'order_iklans.id_kategori')
            ->leftJoin('users', 'users.username', '=', 'order_iklans.username')
            ->where('jadwal_traffic_iklans.tanggal_jadwal', '=', $request->input('tanggal_jadwal'))
            ->orderBy('jam_jadwal')
            ->get();
        }

        if (!$jadwal_final->isEmpty()) {
            return view('pages.lihatjadwalfinal.lihatjadwalfinal')->with('jadwal_final', $jadwal_final)
                ->with('request', $request);
        } else {
            return redirect('/lihatjadwalfinal')->with('error', 'Jadwal tidak tersedia');
        }

    }

    public function exportjadwal(Request $request)
    {
        if($request->input('jenis_iklan') > 0)
        {
            $jadwal_final = DB::table('jadwal_traffic_iklans')
            ->join('jenis_iklans', 'jadwal_traffic_iklans.id_jenis_iklan'
                , '=', 'jenis_iklans.id_jenis_iklan')
            ->leftJoin('order_iklans', 'jadwal_traffic_iklans.id_order_iklan'
                , '=', 'order_iklans.id_order_iklan')
            ->leftJoin('kategoris', 'kategoris.id_kategori', '=', 'order_iklans.id_kategori')
            ->leftJoin('users', 'users.username', '=', 'order_iklans.username')
            ->where('jadwal_traffic_iklans.tanggal_jadwal', '=', $request->input('tanggal_jadwal'))
            ->where('jadwal_traffic_iklans.id_jenis_iklan', '=', $request->input('jenis_iklan'))
            ->get();
        }else{
            $jadwal_final = DB::table('jadwal_traffic_iklans')
            ->join('jenis_iklans', 'jadwal_traffic_iklans.id_jenis_iklan'
                , '=', 'jenis_iklans.id_jenis_iklan')
            ->leftJoin('order_iklans', 'jadwal_traffic_iklans.id_order_iklan'
                , '=', 'order_iklans.id_order_iklan')
            ->leftJoin('kategoris', 'kategoris.id_kategori', '=', 'order_iklans.id_kategori')
            ->leftJoin('users', 'users.username', '=', 'order_iklans.username')
            ->where('jadwal_traffic_iklans.tanggal_jadwal', '=', $request->input('tanggal_jadwal'))
            ->orderBy('jam_jadwal')
            ->get();
        }

        return view('pages.lihatjadwalfinal.exportjadwal')->with('jadwal_final', $jadwal_final)
            ->with('request', $request);
    }
}
