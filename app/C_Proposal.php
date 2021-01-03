<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class C_Proposal extends Model
{
    //
    public function setPhoneNumberAttribute($value) {
        $this->attributes['phone_number'] = Crypt::encryptString($value);
    }

    public function setNameAttribute($value) {
        $this->attributes['name'] = Crypt::encryptString($value);
    }

    public function setEmailAttribute($value) {
        $this->attributes['email'] = Crypt::encryptString($value);
    }

    public function getPhoneNumberAttribute($value) {
        try{
            return Crypt::decryptString($value);
        }catch(\Exception $e){
            return "Error: ¡Datos no válidos!";
        }
    }

    public function getNameAttribute($value) {
        try{
            return Crypt::decryptString($value);
        }catch(\Exception $e){
            return "Error: ¡Datos no válidos!";
        }
    }

    public function getEmailAttribute($value) {
        try{
            return Crypt::decryptString($value);
        }catch(\Exception $e){
            return "Error: ¡Datos no válidos!";
        }
    }

    public function propertie()
    {
        return $this->belongsTo('App\Propertie');
    }
}
