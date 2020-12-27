<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePremisesOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('premises__offices', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('propertie_id');         //id de la propiedad asociada
            $table->unsignedSmallInteger('construction');        //construccion m2
            $table->unsignedTinyInteger('half_bathrooms');      //medios baños
            $table->unsignedTinyInteger('floor')->nullable();   //piso
            $table->boolean('cistern');                         //cisterna
            $table->boolean('elevator');                        //tiene elevador o no
            $table->boolean('security_vigilance');              //hay vigilancia o no (caseta o no se :v)
            $table->enum('type', ['premises','office']);        //tipo de propiedad

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
        Schema::dropIfExists('premises__offices');
    }
}
