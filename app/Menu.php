<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $primaryKey = 'id_menu';
    
    public function Users()
    {
        return $this->belongsToMany('App\User');
    }
}
