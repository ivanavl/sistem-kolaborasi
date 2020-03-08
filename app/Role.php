<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $primaryKey = 'id_role';
    
    public function Users()
    {
        return $this->hasMany('App\User');
    }

    public function Menus()
    {
        return $this->belogsToMany('App\Menu');
    }
}
