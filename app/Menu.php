<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $primaryKey = 'id_menu';
    
    public function Roles()
    {
        return $this->belongsToMany('App\Role');
    }
}
