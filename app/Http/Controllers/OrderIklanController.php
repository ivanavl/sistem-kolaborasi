<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderIklanController extends Controller
{
    public function create()
    {
        return view('pages.orderiklan.create');
    }

    public function store(Request $request)
    {
        $create = new OrderIklan;
        $create->nama_produk = $request->input('nama_produk');
        $create->jumlah_tayang = 1;
        $create->priode_awal = 1;
        $create->priode_akhir = 1;
        $create->tanggal_request = 1;
        $create->status_order = 'Requested';
        $create->id_kategori = 1;
        $create->username = 1;
        $create->save();
    }

    public function show($id)
    {
        
    }
}
