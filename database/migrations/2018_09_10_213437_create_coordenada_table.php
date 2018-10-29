<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoordenadaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('coordenada', function (Blueprint $table) {
            $table->increments('id');
            $table->string('latitud');
            $table->string('longitud');
            $table->integer('zona_id')->unsigned();
            $table->foreign('zona_id')->references('id')->on('zona')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coordenada');
    }
}
