<?php

use Illuminate\Database\Seeder;

class properties_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('properties')->insert([
            'owner_name' => 'Oscar Huerta Pantoja de Nivardy',
            'description' => 'Casa lujosa de 3 pisos, increíble, buena ubicación, incluye todo lo necesario para una vida de rey, ya trae muebles.',
            'street' => '11 de mayo',
            'int_number'=>null,
            'ext_number'=>666,
            'suburb'=>'Centro',
            'town'=>'Morelia',
            'city'=>'Morelia',
            'state'=>'Michoacán',
            'deal'=>'sale',
            'price'=>2500000,
            'status'=>'available',
        ]);
        DB::table('houses')->insert([
            'propertie_id'=>1,
            'living_rooms'=>3,
            'kitchens'=>0,
            'integral_kitchen'=>2,
            'dining_rooms'=>2,
            'half_bathrooms'=>0,
            'bathrooms'=>4,
            'bedrooms'=>7,
            'yard'=>true,
            'service_yard'=>true,
            'service_room'=>true,
            'home_office'=>3,
            'garages'=>2,
            'security_vigilance'=>true,
            'cistern'=>true,
            'antiquity'=>1,
            'construction'=>500,
            'terrain'=>750,
            'floors'=>3,
        ]);
        DB::table('properties')->insert([
            'owner_name' => 'Lonardo Lopez Castillo',
            'description' => 'Departamento en edificio lujoso, muy espacioso, con estacionamiento hasta para dos coches, vive la vida que siempre quisiste, aquí y ahora, se feliz como una lombriz en este increíble departamento, aquí mismo vivió el famoso músico Oscar Huerta Pantoja de Nivardy.',
            'street' => 'La misteriosa',
            'int_number'=>27,
            'ext_number'=>1997,
            'suburb'=>'Santiaguito',
            'town'=>'Tacámbaro',
            'city'=>'Tacámbaro',
            'state'=>'Michoacán',
            'deal'=>'rent',
            'price'=>7000,
            'status'=>'available',
        ]);
        DB::table('departments')->insert([
            'propertie_id'=>2,
            'living_rooms'=>2,
            'kitchens'=>1,
            'integral_kitchen'=>1,
            'dining_rooms'=>1,
            'half_bathrooms'=>1,
            'bathrooms'=>3,
            'bedrooms'=>4,
            'yard'=>true,
            'service_yard'=>true,
            'service_room'=>true,
            'home_office'=>1,
            'garages'=>2,
            'security_vigilance'=>true,
            'cistern'=>true,
            'antiquity'=>10,
            'construction'=>400,
            'floors'=>2,
            'floor'=>77,
            'elevator'=>true,
        ]);
        DB::table('properties')->insert([
            'owner_name' => 'Adrián García Sánches Pedraza',
            'description' => 'Terreno muy grande, excelente ubicación, al rededor hay muchos locales, puedes poner tu casa con negocios y comenzar una vida muy bella.',
            'street' => 'Primitivis',
            'int_number'=>null,
            'ext_number'=>12,
            'suburb'=>'Beauty Moon',
            'town'=>'Morelia',
            'city'=>'Morelia',
            'state'=>'Michoacán',
            'deal'=>'sale',
            'price'=>200000,
            'status'=>'available',
        ]);
        DB::table('terrains')->insert([
            'propertie_id'=>3,
            'terrain'=>200,
            'access_roads'=>true,
        ]);
    }
}
