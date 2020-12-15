<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Premises_Office extends Model
{
    public function propertie()
    {
        return $this->hasOne('App\Propertie');
    }
}
