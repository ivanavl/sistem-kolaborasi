<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IsiTemplate extends Model
{
    protected $primaryKey = 'nama_template';

    public function TemplateJadwal()
    {
        return $this->belogsTo('App\TemplateJadwal');
    }
}
