<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('categoria', function(Blueprint $table){
          $table->increments('id');
          $table->string('cat_padre')->nullable();
          $table->string('tipo');
          $table->integer('usuario_id')->unsigned()->index();
          $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
          $table->string('nombre');
          $table->string('avatar')->nullable();
          $table->integer('presupuesto')->nullable();
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
        Schema::dropIfExists('categoria');
    }
}
