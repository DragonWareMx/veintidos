<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c__proposals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('propertie_id')->nullable();     //id de la propiedad asociada
            $table->string('phone_number');             //numero telefonico de la persona que hace la propuesta
            $table->string('name');                         //nombre de la persona que hace la propuesta
            $table->string('email')->nullable();       //correo electronico de la persona que hace la propuesta           
            $table->string('comment')->nullable();          //comentario que hace la persona sobre la propuesta
            $table->enum('status', ['reviewed','pending']);  
            $table->foreign('propertie_id')->references('id')->on('properties')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('c__proposals');
    }
}
