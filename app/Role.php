<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const TRAFFIC_IKLAN = 1;
    const MARKETING = 2;
    const PRODUKSI = 3;
    const STUDIO = 4;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_name'
    ];

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'role_id';

    /**
     * Get the users for this role.
     */
    public function user()
    {
        return $this->hasMany('App\User', 'role_id');
    }
}
