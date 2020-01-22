<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuario_id');
            $table->integer('moneda_id');
            $table->string('nombre_corto');
            $table->string('descripcion');
            $table->string('saldo_inicial');
            $table->string('avatar');
            $table->timestamps();
        });
        Schema::table('cuentas', function ($table) {
          $table->double('saldo_inicial')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cuentas');
    }
    
}
