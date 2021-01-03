<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;

class c_proposalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('c__proposals')->insert([
            'propertie_id' => 1,
            'phone_number' => Crypt::encryptString('4432209378'),
            'name' => Crypt::encryptString('Dulce Gabriela Marin Rendon'),
            'email' => Crypt::encryptString('DulcePop@hotmail.com'),
            'comment' => 'La casa es muy bonita, me interesa',
            'status' => 'pending'
        ]);
        DB::table('c__proposals')->insert([
            'propertie_id' => 2,
            'phone_number' => Crypt::encryptString('4432832378'),
            'name' => Crypt::encryptString('Leonardo Andre Sanchez'),
            'email' => Crypt::encryptString('Leo@hotmail.com'),
            'comment' => 'Necesito comprar una propiedad y esta me gusto',
            'status' => 'pending'
        ]);
        DB::table('c__proposals')->insert([
            'propertie_id' => 3,
            'phone_number' => Crypt::encryptString('4435609378'),
            'name' => Crypt::encryptString('Bruno Marin'),
            'email' => Crypt::encryptString('Bruno@hotmail.com'),
            'comment' => 'Cuál es su precio y cuánto cuesta?',
            'status' => 'pending'
        ]);
    }
}
