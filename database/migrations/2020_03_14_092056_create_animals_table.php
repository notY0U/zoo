<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->unsignedBigInteger('specie_id');
            $table->integer('yob');
            $table->text('animal_book');
            $table->unsignedBigInteger('manager_id');
            $table->timestamps();
            $table->foreign('manager_id')->references('id')->on('managers');
            $table->foreign('specie_id')->references('id')->on('species');
        });
    }
   
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animals');
    }
}
