<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TemplateJadwal;
use App\TempIsiTemplate;
use App\IsiTemplate;
use App\JenisIklan;
use Illuminate\Support\Facades\DB;
use Session;

class TemplateJadwalController extends Controller
{

    //View Buat Tempalte Baru
    public function createtemplate()
    {
        Session::reflash();
        $jenis_iklan = JenisIklan::all();
        return view('pages.templatejadwal.createtemplate')
        ->with('jenis_iklan', $jenis_iklan);
    }

    public function tempstoretemplate(Request $request)
    {
        $this->validate($request,[
            'jam_awal' => 'required',
            'durasi_template' => 'required|integer',
        ],[
            'required' => ':attribute tidak boleh kosong',
            'integer' => ':attribute harus berbentuk angka'
        ]);

        $collection = collect(['jam_awal' => $request->jam_awal, 
        'durasi_template' => $request->durasi_template]);
        Session::push('template', $collection);

        return redirect('/buattemplat');
    }

    public function removesegmen($id)
    {
        $template = Session::get('template');
        
        if(count(Session::get('template')) == 1)
        {
            Session::forget('template');
        }else{
            $count = 0;
            foreach($template as $t)
            {
                if($t->get('jam_awal') == $id)
                {
                    unset($template[$count]);
                }
                $count++;
            }
    
            Session::forget('template');
            Session::put('template', $template);
        }

        return redirect('/buattemplat');
    }
        
     //Buat Template Baru
    public function storetemplate(Request $request)
    {
        $this->validate($request,[
            'nama_template' => 'required'
        ],[
            'required' => ':attribute tidak boleh kosong'
        ]);

        $nama_template_db = TemplateJadwal::all();

        $check = 0;
        foreach($nama_template_db as $n)
        {
            if($n->nama_template == $request->input('nama_template'))
            {
                $check = 1;
            }
        }

        if($check < 1)
        {
            Session::reflash();

            $create1 = new TemplateJadwal;
            $create1->nama_template = $request->input('nama_template');
            $create1->id_jenis_iklan = $request->input('jenis_iklan');
            $create1->save();
    
            foreach(Session::get('template') as $temp)
            {
                $create2 = new IsiTemplate;
                $create2->nama_template =  $request->input('nama_template');
                $create2->jam_awal = $temp->get('jam_awal');
                $create2->durasi_template = $temp->get('durasi_template');
                $create2->save();
            }
    
            Session::forget('template');
    
            return redirect('/buatjadwal')->with('success', 'Templat iklan berhasil dibuat');
        }

        return redirect('/buattemplat')->with('error', 'Nama templat sudah ada');
    }
    
    //View Lihat Template
    public function indextemplate()
    {
        $template_jadwals = TemplateJadwal::whereNotIn('id_template', [3])->get();

        Session::forget('template');
        return view('pages.templatejadwal.lihattemplate')->with('template_jadwals', $template_jadwals);
    }

    //Lihat Template
    public function showtemplate(Request $id)
    {
        $template_jadwals = TemplateJadwal::whereNotIn('id_template', [3])->get();
        $nama_template = TemplateJadwal::select('nama_template')
        ->where('id_template','=',$id->input('template_jadwal'))
        ->first();
        $isi_templates = DB::table('isi_templates')
        ->join('template_jadwals', 'isi_templates.nama_template',
        '=','template_jadwals.nama_template')
        ->where('isi_templates.nama_template', $nama_template->nama_template)
        ->get();

        return view('pages.templatejadwal.lihattemplate')->with('isi_templates', $isi_templates)
        ->with('template_jadwals', $template_jadwals)->with('selected_template', $id->input('template_jadwal'));
    }
}
