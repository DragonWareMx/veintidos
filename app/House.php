<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    public function propertie()
    {
        return $this->belongsTo('App\Propertie');
    }
}
