<?php

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   public function run()
    {
         $cat = Categoria::create(array(
            'usuario_id'    => 6 ,
            'nombre'     => 'Alimento',
            'tipo'         => 'Gasto'
        ));
    }
}
