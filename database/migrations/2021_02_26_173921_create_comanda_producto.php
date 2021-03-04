<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComandaProducto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comanda_producto', function (Blueprint $table) {
            $table->unsignedBigInteger("idComanda");
            $table->unsignedBigInteger("idProducto");
            $table->timestamps();
            $table->tinyInteger("cantidad");

            $table->foreign("idComanda")->references("id")->on("comandas")->onDelete("cascade");
            $table->foreign("idProducto")->references("id")->on("productos")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comanda_producto');
    }
}
