<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisIklan extends Model
{
    public function JadwalTrafficIklans()
    {
        return $this->hasMany('App\JadwalTrafficIklan');
    }

    public function TemplateJadwals()
    {
        return $this->hasMany('App\TemplateJadwal');
    }

    public function OrderIklans()
    {
        return $this->hasMany('App\OrderIklan');
    }
}
