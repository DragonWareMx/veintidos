<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarehousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('propertie_id');     //id de la propiedad asociada
            $table->unsignedSmallInteger('terrain');         //terreno m2
            $table->unsignedSmallInteger('construction');    //construccion m2
            $table->boolean('office');                      //oficina
            $table->unsignedTinyInteger('half_bathrooms');      //medios baños

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
        Schema::dropIfExists('warehouses');
    }
}
