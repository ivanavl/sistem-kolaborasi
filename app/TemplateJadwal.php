<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TemplateJadwal extends Model
{
    protected $primaryKey = 'id_template';

    public function IsiTemplate()
    {
        return $this->hasMany('App\isiTemplate');
    }

    public function JenisIklan()
    {
        return $this->belongsTo('App\JenisIklan');
    }
}
