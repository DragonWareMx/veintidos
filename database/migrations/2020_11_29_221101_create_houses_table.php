<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('propertie_id');     //id de la propiedad asociada
            $table->unsignedTinyInteger('living_rooms');    //salas
            $table->unsignedTinyInteger('kitchens');        //cocinas
            $table->unsignedTinyInteger('integral_kitchen');//cocina integrales
            $table->unsignedTinyInteger('dining_rooms');    //comedores
            $table->unsignedTinyInteger('half_bathrooms');  //medios baños
            $table->unsignedTinyInteger('bathrooms');       //baños completos
            $table->unsignedTinyInteger('bedrooms');        //habitaciones
            $table->unsignedTinyInteger('garages');         //garages
            $table->boolean('yard');                        //patio
            $table->boolean('service_yard');                //patio de servicio
            $table->boolean('service_room');                //cuartos de servicio
            $table->unsignedTinyInteger('home_office');     //estudios
            $table->unsignedTinyInteger('garages');         //garages
            $table->boolean('security_vigilance');          //hay vigilancia o no (caseta o no se :v)
            $table->boolean('cistern');                     //cisterna
            $table->unsignedTinyInteger('antiquity');       //antigüedad
            $table->unsignedTinyInteger('construction');    //constriccion m2
            $table->unsignedTinyInteger('terrain');         //terreno m2
            $table->unsignedTinyInteger('floors');          //pisos

            $table->foreign('propertie_id')->references('id')->on('properties')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('houses');
    }
}
