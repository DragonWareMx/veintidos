<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('propertie_id');     //id de la propiedad asociada
            $table->unsignedTinyInteger('living_rooms');    //salas
            $table->unsignedTinyInteger('kitchens');        //cocinas
            $table->unsignedTinyInteger('integral_kitchen');//cocina integrales
            $table->unsignedTinyInteger('dining_rooms');    //comedores
            $table->unsignedTinyInteger('half_bathrooms');  //medios baños
            $table->unsignedTinyInteger('bedrooms');        //habitaciones
            $table->unsignedTinyInteger('bathrooms');       //baños completos
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
            $table->unsignedTinyInteger('floors');          //pisos
            $table->unsignedTinyInteger('floor');           //piso
            $table->boolean('elevator');                    //tiene elevador o no

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
        Schema::dropIfExists('departments');
    }
}
