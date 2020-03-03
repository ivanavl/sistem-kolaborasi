<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
    public function create()
    {
        return view('pages.requestbooking.create');
    }

    public function storeclient(Request $request)
    {
        $create = new Client;
        $create->nama_client = $request->input('nama_client');
        $create->alamat_client = $request->input('alamat_client');
        $create->npwp_client = $request->input('npwp_client');
        $create->contact_person = $request->input('contact_person');
        $create->telepon_client = $request->input('telepon_client');
        $create->email_client = $request->input('email_client');
        $create->save();

        return 123;
    }

    public function indexclient()
    {
        return view('pages.requestbooking.index');
    }
}
