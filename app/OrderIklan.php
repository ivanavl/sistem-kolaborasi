<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderIklan extends Model
{
    protected $primaryKey = 'id_order_iklan';
    
    public function Client()
    {
        return $this->belongsTo('App\Client');
    }

    public function Kategori()
    {
        return $this->belongsTo('App\Kategori');
    }

    public function JadwalTrafficIklans()
    {
        return $this->hasMany('App\JadwalTrafficIklan');
    }

    public function User()
    {
        return $this->belongsTo('App\User');
    }

    public function JenisIklan()
    {
        return $this->belongsTo('App\JenisIklan');
    }
}
