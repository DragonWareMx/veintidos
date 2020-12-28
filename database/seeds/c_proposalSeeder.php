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
            'phone_number' => '4432209378',
            'name' => 'Dulce Gabriela Marin Rendon',
            'email' => 'DulcePop@hotmail.com',
            'comment' => 'La casa es muy bonita, me interesa '
        ]);
    }
}
