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
        $this->validate($request,[
            'jam_awal' => 'required',
            'durasi_template' => 'required|integer',
        ]);

        Session::reflash();

        $collection = collect(['jam_awal' => $request->jam_awal, 
        'durasi_template' => $request->durasi_template]);
        Session::push('template', $collection);

        return view('pages.templatejadwal.createtemplate');
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
                unset($template[$count]);
            }
            $count++;
        }

        Session::forget('template');
        Session::put('template', $template);

        return view('pages.templatejadwal.createtemplate');
    }
        
     //Buat Template Baru
    public function storetemplate(Request $request)
    {
        Session::reflash();

        $create1 = new TemplateJadwal;
        $create1->nama_template = $request->input('nama_template');
        $create1->id_jenis_iklan = 1;
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

        return redirect('/createjadwal')->with('success', 'Template iklan berhasil dibuat');

    }
    
    //View Lihat Template
    public function indextemplate()
    {
        $template_jadwals = TemplateJadwal::whereNotIn('id_template', [3])->get();

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
