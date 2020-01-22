<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Transaccion;
use App\Models\Moneda;

class Cuenta extends Model
{
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $table = 'cuentas';
    protected $fillable = [
        'usuario_id', 'moneda_id', 'nombre_corto',
        'descripcion', 'saldo_inicial', 'avatar',
    ];
    
    protected function verCuentas()
    {

 $usuario_id = Auth::user()->id;
 $cuentas = DB::table('cuentas')->where('usuario_id','=', $usuario_id)->get();

    	return $cuentas;
    }
    public function trasacciones() {
        return $this->hasMany('App\Models\Transaccion');
    }
    public function moneda()
  {
    return $this->belongsTo('App\Models\Moneda');
  }
}
