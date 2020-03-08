<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
    //CreateClient
    public function createclient()
    {
        return view('pages.requestbooking.createclient');
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

    //LihatClient
    public function indexclient()
    {
        $clients = Client::all();
        return view('pages.requestbooking.indexclient')->with('clients', $clients);
    }

    public function searchclient(Request $request)
    {
        $clients = Client::where('nama_client', 'LIKE','%'.$request->input('search').'%')
        ->orWhere('alamat_client', 'LIKE','%'.$request->input('search').'%')
        ->orWhere('contact_person', 'LIKE','%'.$request->input('search').'%')
        ->get();
        
        return view('pages.requestbooking.indexclient')->with('clients', $clients);         
    }
}
