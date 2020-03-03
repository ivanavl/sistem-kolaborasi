<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $primaryKey = 'id_client';
    
    public function OrderIklans()
    {
        return $this->hasMany('App\OrderIklan');
    }
}
