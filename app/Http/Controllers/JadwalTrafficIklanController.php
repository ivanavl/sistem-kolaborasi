<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TemplateJadwal;
use App\JadwalTrafficIklan;
use App\Kategori;
use App\User;
use Illuminate\Support\Facades\DB;

class JadwalTrafficIklanController extends Controller
{

    //View Create Jadwal
    public function createjadwal()
    {
        $temp = TemplateJadwal::pluck('nama_template','id_template');
        $template_jadwals = $temp->all();
        return view('pages.createjadwal.createjadwal')->with('template_jadwals', $template_jadwals);
    }

    //Create Jadwal
    public function storejadwal(Request $request)
    {
        
        $jenis_iklan = $request->input('jenis_iklan');

        if($jenis_iklan = "Spot iklan")
        {
            $this->validate($request,[
                'tanggal_awal' => 'required',
                'template_jadwal' => 'required'
            ]);

            $tanggal = $request->input('tanggal_awal');
            $tanggal_akhir = $request->input('tanggal_akhir');
            $jadwal_jams = DB::table('isi_templates')
                        ->join('template_jadwals', 'isi_templates.nama_template', '=', 'template_jadwals.nama_template')
                        ->select('isi_templates.jam_awal', 'isi_templates.jumlah_iklan')
                        ->where('template_jadwals.id_template', $request->input('template_jadwal'))
                        ->get();

            do
            {
                foreach ($jadwal_jams as $jadwal_jam)
                { 
                    $jam = $jadwal_jam->jam_awal;
                    $count = 0;
                    do
                    {
                        $create = new JadwalTrafficIklan;
                        $create->tanggal_jadwal = $tanggal;
                        $create->jam_jadwal = $jam;
                        $create->jenis_iklan = $jenis_iklan;
                        $create->save();
                        
                        $jam = date('H:i:s', strtotime('+1 minutes', strtotime($jam)));
                        $count++;
                    }while($count!=$jadwal_jam->jumlah_iklan);   
                }
                $tanggal = date('Y-m-d', strtotime('+1 days', strtotime($tanggal)));
            }while($tanggal!=$tanggal_akhir);

        }else{
            $this->validate($request,[
                'tanggal_jadwal' => 'required',
                'jam_jadwal' => 'required'
            ]);

            $create = new JadwalTrafficIklan;
            $create->tanggal_jadwal = $request->input('tanggal_jadwal');
            $create->jam_jadwal = $request->input('jam_jadwal');
            $create->jenis_iklan= $jenis_iklan;
            $create->save();

        }

        return 123;
    }

    //Lihat Jadwal
    public function showjadwal($id)
    {
        $query = DB::table('jadwal_traffic_iklans')
                            ->join('order_iklans', 
                            'jadwal_traffic_iklans.id_order_iklan', '=', 'order_iklans.id_order_iklan')
                            ->join('kategoris', 'kategoris.id_kategoris','=','order_iklans.id_kategori')
                            ->join('users', 'users.username','=','order_iklans.username')
                            ->select('jadwal_traffic_iklans.*, order_iklans.*, kategoris.nama_kategori, users.name')
                            ->where('order_iklans.tanggal_jadwal', $id)
                            ->get();

        return view('pages.jadwaltrafficiklan.show')->with('isi_templates', $query);
    }

    //Cari Jadwal Kosong
    public function indexcarijadwal()
    {
        $waktu_tayang_collection = collect([
            ['id'=>'1', 'jam'=>'04:00 - 06:00'],
            ['id'=>'2', 'jam'=>'06:00 - 10:00'],
            ['id'=>'3', 'jam'=>'10:00 - 14:00'],
            ['id'=>'4', 'jam'=>'14:00 - 18:00'],
            ['id'=>'5', 'jam'=>'18:00 - 23.00']

        ]);
        $waktu_tayang = $waktu_tayang_collection->pluck('jam', 'id');
        $temp = Kategori::pluck('nama_kategori','id_kategori');
        $kategoris = $temp->all();
        return view('pages.carijadwalkosong.indexcarijadwal')->with('waktu_tayang', $waktu_tayang);
    }

    //Resutl Cari Jadwal Kosong
    public function result()
    {
        return view('pages.carijadwalkosong.searchresult');
    }
}
