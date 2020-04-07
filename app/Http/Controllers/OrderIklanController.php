<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderIklan;
use App\JadwalTrafficIklan;
use App\JenisIklan;
use App\Kategori;
use Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Session;

class OrderIklanController extends Controller
{
    public function createorder()
    {
        $jenis_iklan = JenisIklan::select('nama_jenis_iklan')
        ->where('id_jenis_iklan','=',Session::get('id_jenis_iklan'))->pluck('nama_jenis_iklan');
        $kategori = Kategori::select('nama_kategori')
        ->where('id_kategori','=',Session::get('id_kategori'))->pluck('nama_kategori');
        $jumlah_tayang = Session::get('jumlah_tayang');
        $priode_awal = Session::get('priode_awal');
        $priode_akhir = Session::get('priode_akhir');

        $collection = collect(['jenis_iklan' => $jenis_iklan[0], 'kategori' => $kategori[0],
        'jumlah_tayang' => $jumlah_tayang, 'priode_awal' => $priode_awal, 'priode_akhir' => $priode_akhir]);

        $client = Session::get('client');
        
        Session::reflash();
        return view('pages.requestbooking.createorder')->with('client', $client)
        ->with('collection', $collection);
    }
    
    //Request Booking
    public function storeorder(Request $request)
    {
        $this->validate($request,[
            'nama_produk' => 'required',
        ]);

        $create = new OrderIklan;
        $create->nama_produk = $request->input('nama_produk');
        $create->jumlah_tayang = Session::get('jumlah_tayang');
        $create->priode_awal = Session::get('priode_awal');
        $create->priode_akhir = Session::get('priode_akhir');
        $create->versi_iklan = null;
        $create->tanggal_request = Carbon::now();
        $create->tanggal_konfirmasi = null;
        $create->status_order = 'Requested';
        $create->id_kategori = Session::get('id_kategori');
        $create->id_client = $request->id_client;
        $create->username = Auth::user()->username;
        $create->id_jenis_iklan = Session::get('id_jenis_iklan');
        $create->save();

        $id = $create->id_order_iklan;

        $jadwal = Session::get('jadwal');
        foreach($jadwal as $j)
        {
            JadwalTrafficIklan::where('id_jadwal','=',$j)
            ->update(['id_order_iklan' => $id]);
        }

        return redirect('/carijadwal')->with('success', 'Request booking berhasil');
    }

    //Lihat Request
    public function showrequest()
    {
        $lihat_requests1 = DB::table('order_iklans')
        ->join('clients', 'order_iklans.id_client','=','clients.id_client')
        ->join('jenis_iklans','order_iklans.id_jenis_iklan','=',
        'jenis_iklans.id_jenis_iklan')
        ->join('users', 'order_iklans.username','=','users.username')
        ->join('kategoris', 'order_iklans.id_kategori',
        '=','kategoris.id_kategori')
        ->where('order_iklans.username', Auth::user()->username)
        ->where('order_iklans.status_order','=','Requested')
        ->get();

        $lihat_requests2 = DB::table('order_iklans')
        ->join('clients', 'order_iklans.id_client','=','clients.id_client')
        ->join('jenis_iklans','order_iklans.id_jenis_iklan','=',
        'jenis_iklans.id_jenis_iklan')
        ->join('users', 'order_iklans.username','=','users.username')
        ->join('kategoris', 'order_iklans.id_kategori',
        '=','kategoris.id_kategori')
        ->where('order_iklans.username', Auth::user()->username)
        ->where('order_iklans.status_order','NOT LIKE','Requested')
        ->orderByRaw('FIELD(order_iklans.status_order, "Confirmed", "Canceled")')
        ->get();

        return view('pages.lihatrequest.lihatrequest')->with('lihat_requests1', $lihat_requests1)
        ->with('lihat_requests2', $lihat_requests2);
    }

    public function showrequestdetail($id)
    {
        $lihat_request = DB::table('order_iklans')
        ->join('jadwal_traffic_iklans', 'order_iklans.id_order_iklan',
        '=','jadwal_traffic_iklans.id_order_iklan')
        ->join('kategoris', 'order_iklans.id_kategori',
        '=','kategoris.id_kategori')
        ->join('jenis_iklans', 'jenis_iklans.id_jenis_iklan',
        '=','jadwal_traffic_iklans.id_jenis_iklan')
        ->where('jadwal_traffic_iklans.id_order_iklan','=',$id)
        ->get();

        return view('pages.lihatrequest.lihatrequestdetail')->with('lihat_request', $lihat_request);
    }

    //Konfirmasi Booking
    public function indexrequest()
    {
        $lihat_requests = DB::table('order_iklans')
        ->join('jenis_iklans', 'order_iklans.id_jenis_iklan',
        '=','jenis_iklans.id_jenis_iklan')
        ->join('clients', 'order_iklans.id_client','=','clients.id_client')
        ->orderByRaw('FIELD(order_iklans.status_order, "Requested", "Confirmed", "Canceled")')
        ->get();

        return view('pages.konfirmasibooking.lihatrequest')->with('lihat_requests', $lihat_requests);
    }

    public function searchrequest(Request $request)
    {
        $lihat_requests = DB::table('order_iklans')
        ->join('jenis_iklans', 'order_iklans.id_jenis_iklan',
        '=','jenis_iklans.id_jenis_iklan')
        ->join('clients', 'order_iklans.id_client','=','clients.id_client')
        ->where('nama_produk', 'LIKE','%'.$request->input('search').'%')
        ->orwhere('nama_client', 'LIKE','%'.$request->input('search').'%')
        ->orwhere('id_order_iklan', 'LIKE','%'.$request->input('search').'%')
        ->get();

        return view('pages.konfirmasibooking.lihatrequest')->with('lihat_requests', $lihat_requests);
    }

    public function showkonfirmasibooking($id)
    {
        $result1 = DB::table('order_iklans')
        ->join('jenis_iklans', 'order_iklans.id_jenis_iklan',
        '=','jenis_iklans.id_jenis_iklan')
        ->join('kategoris', 'order_iklans.id_kategori','=','kategoris.id_kategori')
        ->join('clients', 'order_iklans.id_client','=','clients.id_client')
        ->where('order_iklans.id_order_iklan','=',$id)
        ->get();
        $result2 = JadwalTrafficIklan::where('id_order_iklan','=',$id)->get();

        return view('pages.konfirmasibooking.konfirmasibooking')->with('result1', $result1)
        ->with('result2', $result2);
    }

    public function konfirmasibooking(Request $request)
    {
        $konfirmasi = $request->input('konfirmasi');
        $date = Carbon::now();
        if($konfirmasi == 1)
        {
            $update_order = OrderIklan::where('id_order_iklan','=',$request->input('id_order_iklan'))
            ->update(['status_order' => 'Confirmed', 'tanggal_konfirmasi' => $date]);

            return redirect('/konfirmasibooking')->with('success', 'Konfirmasi pemasangan berhasil');
        }else{
            $update_order = OrderIklan::where('id_order_iklan','=',$request->input('id_order_iklan'))
            ->update(['status_order' => 'Canceled', 'tanggal_konfirmasi' => $date]);
            $update_jadwal = JadwalTrafficIklan::where('id_order_iklan','=',$request->input('id_order_iklan'))
            ->update(['id_order_iklan' => null]);

            return redirect('/konfirmasibooking')->with('success', 'Konfirmasi pembatalan berhasil');
        }

        return redirect('/konfirmasibooking')->with('error', 'Konfirmasi booking gagal');
    }

    //Lihat Order
    public function indexorder()
    {
        $lihat_orders = DB::table('order_iklans')
        ->join('jenis_iklans', 'order_iklans.id_jenis_iklan',
        '=','jenis_iklans.id_jenis_iklan')
        ->join('clients', 'order_iklans.id_client','=','clients.id_client')
        ->where('status_order', 'Confirmed')
        ->where('order_iklans.id_jenis_iklan','!=',2)
        ->orderBy('versi_iklan', 'ASC')
        ->get();

        return view('pages.updateversi.lihatorder')->with('lihat_orders', $lihat_orders);
    }

    public function searchorder(Request $request)
    {
        $search = $request->input('search');
        $lihat_orders = DB::table('order_iklans')
        ->join('jenis_iklans', 'order_iklans.id_jenis_iklan',
        '=','jenis_iklans.id_jenis_iklan')
        ->join('clients', 'order_iklans.id_client','=','clients.id_client')
        ->where('order_iklans.id_jenis_iklan','!=',2)
        ->where('order_iklans.status_order', 'Confirmed')
        ->where(function($q) use ($search){
        $q->orwhere('nama_produk', 'LIKE','%'.$search.'%')
        ->orwhere('nama_client', 'LIKE','%'.$search.'%')
        ->orwhere('id_order_iklan', 'LIKE','%'.$search.'%');
        })
        ->orderBy('versi_iklan', 'ASC')
        ->get();

        return view('pages.updateversi.lihatorder')->with('lihat_orders', $lihat_orders);
    }

    //View Update Versi
    public function editversi($id)
    {
        $lihat_order = OrderIklan::where('id_order_iklan','=',$id)
        ->join('jenis_iklans', 'order_iklans.id_jenis_iklan',
        '=','jenis_iklans.id_jenis_iklan')
        ->join('clients', 'order_iklans.id_client','=','clients.id_client')
        ->join('kategoris', 'order_iklans.id_kategori','=','kategoris.id_kategori')
        ->join('users', 'order_iklans.username','=','users.username')
        ->get();

        return view('pages.updateversi.updateversi')->with('lihat_order', $lihat_order);
    }

    //Update Versi
    public function updateversi(Request $request)
    {
        $this->validate($request,[
            'versi_iklan' => 'required',
        ]);

        $query = OrderIklan::where('id_order_iklan','=',$request->input('id_order_iklan'))
        ->update(['versi_iklan' => $request->input('versi_iklan')]);

        return redirect('/updateversi')->with('success', 'Versi iklan sudah diperbaharui');
    }
}
