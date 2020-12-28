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
            'phone_number' => '4432209378',
            'name' => 'Dulce Gabriela',
            'lastname' => 'Marin',
            'email' => 'DulcePop@hotmail.com',
            'propertie_type' => 'house',
            'deal' => 'sale',
            'price' => 2500000,
            'status'=>'available'
        ]);
        DB::table('proposals')->insert([
            'phone_number' => '0123456780',
            'name' => 'Bruno',
            'lastname' => 'Marin',
            'email' => 'Bruno@hotmail.com',
            'propertie_type' => 'office',
            'deal' => 'rent',
            'price' => 250720,
            'status'=>'accepted'
        ]);
    } 
}
