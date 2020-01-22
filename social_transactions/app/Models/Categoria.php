<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Transaccion;

class Categoria extends Model
{
 protected $table = 'categoria';

 protected function showCategorias()
    {
        $usuario_id = Auth::user()->id;
    	$categorias = DB::table('categoria')->where('usuario_id','=', $usuario_id)->get();
    return $categorias;
    }
    public function trasacciones() {
        return $this->hasMany('App\Models\Transaccion');
    }

    protected function categorias()
    {
    	$categorias = DB::table('categoria')->get();
    return $categorias;
    }
}
