<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use Session;

class ClientController extends Controller
{
    //CreateClient
    public function createclient()
    {
        Session::reflash();
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

        $id_client = $create->id_client;
        $clients = Client::find($id_client);
        $order_detail = Session::get('order_detail');

        Session::reflash();
        return view('pages.requestbooking.createorder')->with('clients', $clients)
        ->with('order_detail', $order_detail);
    }

    //LihatClient
    public function indexclient()
    {
        $clients = Client::all();

        Session::reflash();
        return view('pages.requestbooking.indexclient')->with('clients', $clients);
    }

    public function searchclient(Request $request)
    {
        $clients = Client::where('nama_client', 'LIKE','%'.$request->input('search').'%')
        ->orWhere('alamat_client', 'LIKE','%'.$request->input('search').'%')
        ->orWhere('contact_person', 'LIKE','%'.$request->input('search').'%')
        ->get();
        
        Session::reflash();
        return view('pages.requestbooking.indexclient')->with('clients', $clients);         
    }

    public function showclient($id)
    {
        $clients = Client::find($id);
        $order_detail = Session::get('order_detail');

        echo $order_detail;

        // Session::reflash();
        // return view('pages.requestbooking.createorder')->with('clients', $clients)
        // ->with('order_detail', $order_detail);
    }
}
