<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIconColorColToCategoriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categoria', function (Blueprint $table) {
            $table->string('icon')->after('nombre')->nullable();
            $table->string('color')->after('nombre')->nullable();
            $table->enum('estado',['Activo','Inactivo'])->after('icon')->default('Activo');          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categoria', function (Blueprint $table) {
            //
            $table->dropColumn(['icon','color','estado']);
        });
    }
}
