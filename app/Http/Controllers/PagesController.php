<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;

class PagesController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function homeIndex()
    {
        $menus = Menu::all();
        return view('home')->with('menus', $menus);
    }
}
