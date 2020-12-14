<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Terrain extends Model
{
    public function propertie()
    {
        return $this->hasOne('App\Propertie');
    }
}
