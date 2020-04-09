<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\OrderIklan;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function homeIndex()
    {
        return view('home');
    }

    public static function notifKonfirmasi()
    {
        $query = OrderIklan::where('status_order','=','Requested')->count();

        return $query;
    }

    public static function notifUpdate()
    {
        $query = OrderIklan::where('status_order','=','Confirmed')
        ->whereNull('versi_iklan')
        ->where('id_jenis_iklan',1)
        ->count();

        return $query;
    }
}
