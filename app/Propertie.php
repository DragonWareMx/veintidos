<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Propertie extends Model
{
    public function setOwnerNameAttribute($value) {
        $this->attributes['owner_name'] = Crypt::encryptString($value);
    }

    public function setOwnerInfoAttribute($value) {
        $this->attributes['owner_info'] = Crypt::encryptString($value);
    }

    public function getOwnerNameAttribute($value) {
        try{
            return Crypt::decryptString($value);
        }catch(\Exception $e){
            return "Error: ¡Datos no válidos!";
        }
    }

    public function getOwnerInfoAttribute($value) {
        try{
            return Crypt::decryptString($value);
        }catch(\Exception $e){
            return "Error: ¡Datos no válidos!";
        }
    }

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
    public function office()
    {
        return $this->hasOne('App\Premises_Office');
    }
    public function photos()
    {
        return $this->hasMany('App\Photo');
    }
    public function proposals()
    {
        return $this->hasMany('App\C_Proposal');
    }
}
