<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TemplateJadwal;
use Illuminate\Support\Facades\DB;

class TemplateJadwalController extends Controller
{

    //View Buat Tempalte Baru
    public function createtemplate()
    {
        return view('pages.templatejadwal.createtemplate');
    }

    //Buat Template Baru
    public function storetemplate(Request $request)
    {
        $create1 = new TemplateJadwal;
        $create1->nama_template = $request->input('nama_template');
        $create1->save();

        foreach ($$request as $req) 
        {
            $create2 = new IsiTemplate;
            $create2->nama_template = $req->input('nama_template');
            $create2->jam_awal = $req->input('jam_awal');
            $create2->jumlah_iklan = $req->input('jumlah_iklan');
            $create2->save();
        }

        return 123;

    }
    
    //View Lihat Template
    public function indextemplate()
    {
        $temp = TemplateJadwal::pluck('nama_template','id_template');
        $template_jadwals = $temp->all();
        return view('pages.templatejadwal.lihattemplate')->with('template_jadwals', $template_jadwals);
    }

    //Lihat Template
    public function showtemplate($id)
    {
        $isi_templates = DB::table('isi_templates')
                            ->join('template_jadwals', 'isi_templates.nama_template', '=', 'template_jadwals.nama_template')
                            ->select('isi_templates.*')
                            ->where('template_jadwals.id_template', $id)
                            ->get();

        return view('pages.templatejadwal.lihattemplate')->with('isi_templates', $isi_templates);
    }
}
