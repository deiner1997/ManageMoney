<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Cuenta;

class Moneda extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'usuario_id', 'nombre_corto', 'simbolo',
        'descripcion', 'tasa',
    ];
    
    protected function verMonedas()
    {

 $usuario_id = Auth::user()->id;
 $monedas = DB::table('monedas')->where('usuario_id','=', $usuario_id)->get();

    	return $monedas;
    }
    public function cuenta()
    {
        return $this->hasMany('App\Models\Cuenta');
    }

}
