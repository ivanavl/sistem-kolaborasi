<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderIklan;
use App\JadwalTrafficIklan;
use Illuminate\Support\Facades\DB;

class OrderIklanController extends Controller
{
    //Request Booking
    public function createorder()
    {
        return view('pages.requestbooking.createorder');
    }

    public function storeorder(Request $request)
    {
        // $create = new OrderIklan;
        // $create->nama_produk = $request->input('nama_produk');
        // $create->jumlah_tayang = 1;
        // $create->priode_awal = 1;
        // $create->priode_akhir = 1;
        // $create->tanggal_request = 1;
        // $create->tanggal_konfirmasi = null;
        // $create->status_order = 'Requested';
        // $create->id_kategori = 1;
        // $create->username = 1;
        // $create->save();

        return 123;
    }

    //Lihat Request
    //tambah id nanti
    public function showrequest()
    {
        $lihat_requests = DB::table('order_iklans')
        ->join('clients', 'order_iklans.id_client','=','clients.id_client')
        ->join('jenis_iklans','order_iklans.id_jenis_iklan','=',
        'jenis_iklans.id_jenis_iklan')
        ->join('users', 'order_iklans.username','=','users.username')
        ->join('kategoris', 'order_iklans.id_kategori',
        '=','kategoris.id_kategori')
        // ->where('order.iklans.username', $id)
        ->orderByRaw('FIELD(order_iklans.status_order, "Requested", "Confirmed", "Canceled")')
        ->get();

        return view('pages.lihatrequest.lihatrequest')->with('lihat_requests', $lihat_requests);
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
        if($konfirmasi == 1)
        {
            $update_order = OrderIklan::where('id_order_iklan','=',$request->input('id_order_iklan'))
            ->update(['status_order' => 'Confirmed']);

            return view('pages.lihatjadwal.showjadwal')->with('error','Request booking iklan diterima');
        }else{
            $update_order = OrderIklan::where('id_order_iklan','=',$request->input('id_order_iklan'))
            ->update(['status_order' => 'Canceled']);
            $update_jadwal = JadwalTrafficIklan::where('id_order_iklan','=',$request->input('id_order_iklan'))
            ->update(['id_order_iklan' => null]);

            return view('pages.lihatjadwal.showjadwal')->with('error','Request booking iklan dibatalkan');
        }

        return view('pages.lihatjadwal.showjadwal')->with('error','Konfirmasi booking gagal');
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

        $query = OrderIklan::where('id_order_iklan','=',$request->input('id_order_iklan'))
        ->update(['versi_iklan' => $request->input('versi_iklan')]);

        return redirect('/updateversi')->with('success', 'Versi iklan sudah diperbaharui');
    }
}
