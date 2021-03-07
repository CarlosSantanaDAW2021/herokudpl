<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Añade una columna imagen a la tabla productos
class AddProductosImagen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("productos", function(Blueprint $table) {
            $table->string("imagen", 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("productos", function(Blueprint $table) {
            $table->dropColumn(["imagen"]);
        });
    }
}
