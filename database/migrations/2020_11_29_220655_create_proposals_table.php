<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //propuestas de propiedades
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            
            $table->string('phone_number', 50);                                     //numero de telefono del que hace la propuesta
            $table->string('name');                                                 //nombre(s)
            $table->string('lastname')->nullable();                                              //apellido(s)
            $table->string('email', 320)->nullable();                               //correo electrónico (opcional)
            $table->enum('propertie_type',          
                ['house', 'department','premises','office','terrain','warehouse']); //tipo de propiedad propuesta
            $table->enum('deal', ['sale','rent']);                                  //renta o venta
            $table->decimal('price', 17, 2);                                        //precio propuesto
            $table->enum('status', ['available','accepted','rejected']);            //estado de la propuesta, disponible (sin revisar), aceptado, rechazado
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proposals');
    }
}
