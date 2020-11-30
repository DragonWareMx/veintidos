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
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            
            $table->string('phone_number', 50);
            $table->string('name');
            $table->string('email', 320);
            $table->enum('propertie_type', 
                ['house', 'department','premises','office','terrain','warehouse']);
            $table->enum('deal', ['sale','rent']);
            $table->decimal('price', 17, 2);
            $table->enum('status', ['available','accepted','rejected']);
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
