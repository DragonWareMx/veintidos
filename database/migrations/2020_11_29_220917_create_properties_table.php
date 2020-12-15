<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('owner_name');                                           //nombre del dueño o responsable de la propiedad
            $table->string('description',700);                                           //descripcion de la propiedad

            //DATOS DE LA DIRECCION DE LA PROPIEDAD
            $table->string('street', 255)->nullable();                              //calle
            $table->string('int_number', 10)->nullable();                           //numero interior
            $table->string('ext_number', 10)->nullable();                           //numero exterior
            $table->string('suburb', 255);                                          //colonia
            $table->string('town', 255);                                            //municipio
            $table->string('city', 255)->nullable();                                //ciudad
            $table->string('state', 255);                                           //estado

            $table->enum('deal', ['sale','rent']);                                  //indica si la propiedad esta en renta o venta
            $table->decimal('price', 11, 2);                                        //precio de la propiedad
            $table->enum('status', ['available','occupied','deleted']);             //estatus de la propiedad
            $table->string('photo');                                                 //ubicacion donde se encuentra la foto  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
