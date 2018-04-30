<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConsumosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('consumo_id')->unsigned();
            $table->string('descripcion');
            $table->string('cantidad');
            $table->string('precioUnitario');
            $table->string('precioTotal');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('consumo_id')->references('id')->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('consumos');
    }
}
