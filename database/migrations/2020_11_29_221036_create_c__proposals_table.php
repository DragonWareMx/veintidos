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

            $table->string('phone_number', 50); //numero telefonico de la persona que hace la propuesta
            $table->string('name');             //nombre de la persona que hace la propuesta
            $table->string('email', 320);       //correo electronico de la persona que hace la propuesta           
            $table->string('comment');          //comentario que hace la persona sobre la propuesta
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
