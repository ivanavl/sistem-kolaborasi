<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Http\Controllers\OrderIklanController;
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
        $this->validate($request,[
            'nama_client' => 'required',
            'alamat_client' => 'required',
            'contact_person' => 'required',
            'telepon_client' => 'required',
            'email_client' => 'required',
        ]);
        $create = new Client;
        $create->nama_client = $request->input('nama_client');
        $create->alamat_client = $request->input('alamat_client');
        if($request->input('npwp_client') != null)
        {
            $create->npwp_client = $request->input('npwp_client');
        }
        $create->contact_person = $request->input('contact_person');
        $create->telepon_client = $request->input('telepon_client');
        $create->email_client = $request->input('email_client');
        $create->save();

        $id_client = $create->id_client;
        $client = Client::find($id_client);
        Session::put('client', $client);
        
        
        Session::reflash();
        return redirect('/buatorder');
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
        $client = Client::find($id);
        Session::put('client', $client);
        
        Session::reflash();
        return redirect('/buatorder');
    }
}
