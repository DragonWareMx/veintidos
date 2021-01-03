<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function propertie()
    {
        return $this->belongsTo('App\Propertie');
    }
}
