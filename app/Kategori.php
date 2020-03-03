<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $primaryKey = 'id_kategori';
    
    public function OrderIklans()
    {
        return $this->hasMany('App\OrderIklan');
    }
}
