<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public function propertie()
    {
        return $this->belongsTo('App\Propertie');
    }
}
