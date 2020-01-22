<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaccionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('transaccion', function(Blueprint $table){
        $table->increments('id');
        $table->integer('usuario_id')->unsigned()->index();
        $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
        $table->string('tipo');
        //Fecha
        $table->date('fecha');
        //Cuenta
        $table->integer('cuenta_creditar_id')->unsigned()->index()->nullable();
        $table->foreign('cuenta_creditar_id')->references('id')->on('cuentas')->onDelete('cascade');
        $table->integer('cuenta_adebitar_id')->unsigned()->index()->nullable();
        $table->foreign('cuenta_adebitar_id')->references('id')->on('cuentas')->onDelete('cascade');
        //Categoria
        $table->integer('categoria_id')->unsigned()->index()->nullable();
        $table->foreign('categoria_id')->references('id')->on('categoria')->onDelete('cascade');
        //Descripcion y montos
        $table->string('detalle');
        $table->double('monto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaccion');
    }
}
