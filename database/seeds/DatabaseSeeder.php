<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(properties_table::class);
        $this->call(userSeeder::class);
        //$this->call(proposalSeeder::class);
        //$this->call(c_proposalSeeder::class);
    }
}