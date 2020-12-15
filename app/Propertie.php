<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Propertie extends Model
{
    public function house()
    {
        return $this->hasOne('App\House');
    }
    public function terrain()
    {
        return $this->hasOne('App\Terrain');
    }
    public function warehouse()
    {
        return $this->hasOne('App\Warehouse');
    }
    public function department()
    {
        return $this->hasOne('App\Department');
    }
    public function photos()
    {
        return $this->hasMany('App\Photo');
    }
}
