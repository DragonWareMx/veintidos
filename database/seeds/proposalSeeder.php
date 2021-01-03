<?php

use Illuminate\Database\Seeder;

class proposalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('proposals')->insert([
            'phone_number' => Crypt::encryptString('4432209378'),
            'name' => Crypt::encryptString('Dulce Gabriela'),
            'lastname' => Crypt::encryptString('Marin'),
            'email' => Crypt::encryptString('DulcePop@hotmail.com'),
            'propertie_type' => 'house',
            'deal' => 'sale',
            'price' => 2500000,
            'status'=>'available'
        ]);
        DB::table('proposals')->insert([
            'phone_number' => Crypt::encryptString('0123456780'),
            'name' => Crypt::encryptString('Bruno'),
            'lastname' => Crypt::encryptString('Marin'),
            'email' => Crypt::encryptString('Bruno@hotmail.com'),
            'propertie_type' => 'office',
            'deal' => 'rent',
            'price' => 250720,
            'status'=>'accepted'
        ]);
    } 
}
