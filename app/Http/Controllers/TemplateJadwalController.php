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
        
    public function tempstoretemplate(Request $request)
    {
        $waktu_tayang = $request->input('waktu_tayang');
        $durasi_template = $request->input('durasi_tayang');

        for ($i=0; $i < intval($request->input('n'))+1 ; $i++) 
        { 
            if($i >= intval($request->input('n')))
            {
                $array_waktu_tayang[$i] = $waktu_tayang;
                $array_durasi_template[$i] = $durasi_template;
            }else{
                $array_waktu_tayang[$i] = $request->input('waktu_tayang'.$i);
                $array_durasi_template[$i] = $request->input('durasi_template'.$i);
            }
        }
        return view('pages.templatejadwal.createtemplate')->with('waktu_tayang', $array_waktu_tayang)
        ->with('durasi_template', $array_durasi_template);
    }

    //Buat Template Baru
    public function storetemplate(Request $request)
    {
        $create1 = new TemplateJadwal;
        $create1->nama_template = $request->input('nama_template');
        $create1->save();

        foreach ($request as $req) 
        {
            $create2 = new IsiTemplate;
            $create2->nama_template = $req->input('nama_template');
            $create2->jam_awal = $req->input('jam_awal');
            $create2->durasi_template = $req->input('durasi_template');
            $create2->save();
        }

        return 123;

    }
    
    //View Lihat Template
    public function indextemplate()
    {
        $temp = TemplateJadwal::whereNotIn('id_template', [3])
        ->pluck('nama_template','id_template');
        $template_jadwals = $temp->all();

        return view('pages.templatejadwal.lihattemplate')->with('template_jadwals', $template_jadwals);
    }

    //Lihat Template
    public function showtemplate(Request $id)
    {
        $temp = TemplateJadwal::whereNotIn('id_template', [3])
        ->pluck('nama_template','id_template');
        $template_jadwals = $temp->all();
        $nama_template = TemplateJadwal::select('nama_template')
        ->where('id_template','=',$id->input('template_jadwal'))
        ->first();
        $isi_templates = DB::table('isi_templates')
        ->join('template_jadwals', 'isi_templates.nama_template',
        '=','template_jadwals.nama_template')
        ->where('isi_templates.nama_template', $nama_template->nama_template)
        ->get();

        return view('pages.templatejadwal.lihattemplate')->with('isi_templates', $isi_templates)
        ->with('template_jadwals', $template_jadwals);
    }
}
