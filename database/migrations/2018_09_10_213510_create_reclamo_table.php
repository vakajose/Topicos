<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReclamoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('reclamo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('descripcion');
            $table->string('latitud');
            $table->string('longitud');
            $table->integer('votos');
            $table->enum('estado',['Recibido','En Proceso','Solucionado']);
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('zona_id')->unsigned();
            $table->foreign('zona_id')->references('id')->on('zona')
                ->onUpdate('cascade')
                ->onDelete('cascade');  
             $table->integer('categoria_id')->unsigned();
            $table->foreign('categoria_id')->references('id')->on('categoria')
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
        Schema::dropIfExists('reclamo');
    }
}
