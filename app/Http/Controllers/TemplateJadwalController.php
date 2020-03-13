<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TemplateJadwal;
use App\TempIsiTemplate;
use App\IsiTemplate;
use Illuminate\Support\Facades\DB;
use Session;

class TemplateJadwalController extends Controller
{

    //View Buat Tempalte Baru
    public function createtemplate()
    {
        Session::forget('template');
        return view('pages.templatejadwal.createtemplate');
    }

    public function tempstoretemplate(Request $request)
    {
        Session::reflash();

        $collection = collect(['jam_awal' => $request->jam_awal, 
        'durasi_template' => $request->durasi_template]);
        Session::push('template', $collection);

        // $tempate = Session::put('template', $request);

        
        $template = Session::get('template');
        return view('pages.templatejadwal.createtemplate')->with('template', $template);
    }

    public function removesegmen($id)
    {
        Session::reflash();
        $template = Session::get('template');
        
        $count = 0;
        foreach($template as $t)
        {
            if($t->get('jam_awal') == $id)
            {
                unset($template[$count])    ;
            }
            $count++;
        }
        // for ($i=0; $i < count($template); $i++) 
        // {
        //     if($template[$i]->get('jam_awal') == $id)
        //     {
        //         unset($template[$i]);
        //     }
        // }

        foreach($template as $t)
        {
            echo $t->get('jam_awal');
            echo $t->get('durasi_template');
        }
        // print_r($template);
        Session::forget('template');
        Session::push('template', $template);

        $template = Session::get('template');

        // foreach($template as $t)
        // {
        //     echo $t->get('jam_awal');
        //     echo $t->get('durasi_template');
        // }
        return view('pages.templatejadwal.createtemplate')->with('template', $template);
    }
        
     //Buat Template Baru
    public function storetemplate(Request $request)
    {
        $create1 = new TemplateJadwal;
        $create1->nama_template = $request->input('nama_template');
        $create1->id_jenis_iklan = 1;
        $create1->save();

        $temp_isi_template = TempIsiTemplate::all();
        foreach($temp_isi_template as $temp)
        {
            $create2 = new IsiTemplate;
            $create2->nama_template =  $request->input('nama_template');
            $create2->jam_awal = $temp->jam_awal;
            $create2->durasi_template = $temp->durasi;
            $create2->save();
        }

        DB::table('temp_isi_templates')->delete();

        return redirect('/createjadwal')->with('success', 'Template iklan berhasil dibuat');

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
