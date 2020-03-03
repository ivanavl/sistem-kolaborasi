<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JadwalTrafficIklan extends Model
{
    protected $primaryKey = 'id_jadwal';

    public function OrderIklan()
    {
        return $this->belogsTo('App\OrderIklan');
    }
}
