<?php

use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'Dreigonweir',
            'lastname' => 'Si',
            'email' => 'DragonWareOficial@hotmail.com',
            'password' => bcrypt('viledruid9000'),
        ]);

        DB::table('users')->insert([
            'name' => 'Veintidós',
            'lastname' => 'Inmmobiliaria',
            'email' => 'contacto@veintidos.mx',
            'password' => bcrypt('12345678'),
        ]);
    }
}