<?php

use Illuminate\Database\Seeder;

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
            'phone_number' => '4432209378',
            'name' => 'Dulce Gabriela Marin Rendon',
            'email' => 'DulcePop@hotmail.com',
            'comment' => 'La casa es muy bonita, me interesa',
            'status' => 'pending'
        ]);
        DB::table('c__proposals')->insert([
            'propertie_id' => 2,
            'phone_number' => '4432832378',
            'name' => 'Leonardo Andre Sanchez',
            'email' => 'Leo@hotmail.com',
            'comment' => 'Necesito comprar una propiedad y esta me gusto',
            'status' => 'pending'
        ]);
        DB::table('c__proposals')->insert([
            'propertie_id' => 3,
            'phone_number' => '4435609378',
            'name' => 'Bruno Marin',
            'email' => 'Bruno@hotmail.com',
            'comment' => 'Cuál es su precio y cuánto cuesta?',
            'status' => 'pending'
        ]);
    }
}
