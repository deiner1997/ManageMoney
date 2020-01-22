<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Cuenta;
use App\Models\Categoria;
use Carbon\Carbon;

class Transaccion extends Model
{
  protected $table = 'transaccion';
  public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'usuario_id', 'cuenta_creditar_id','cuenta_adebitar_id', 'categoria_id','fecha',
        'tipo', 'detalle', 'monto',
    ];
    
    protected function verTranslados()
    {

 $usuario_id = Auth::user()->id;
  $translados = DB::table('transaccion')
    ->where('usuario_id', '=',  $usuario_id)
    ->where('tipo', '=', 'Translados')
    ->get();

    	return $translados;
    }
     protected function verIngre()
    {

 $usuario_id = Auth::user()->id;
 $translados = DB::table('transaccion')
    ->where('usuario_id', '=',  $usuario_id)
    ->where('tipo', '=', 'Ingreso')
    ->get();

        return $translados;
    }
     protected function verGast()
    {

 $usuario_id = Auth::user()->id;
$translados = DB::table('transaccion')
    ->where('usuario_id', '=',  $usuario_id)
    ->where('tipo', '=', 'Gasto')
    ->get();

        return $translados;
    }
    protected function Graficos()
    {
      $usuario_id = Auth::user()->id;
$translados = DB::table('transaccion')
    ->where('usuario_id', '=',  $usuario_id)
    ->where('tipo', '=', 'Gasto')
    ->orWhere('tipo', '=', 'Ingreso')
    ->get();
    return $translados;
    }

    public function cuentas()
{
    //return $this->belongsTo(User::class);
    return $this->belongsTo('App\Models\Cuenta');
}
public function categorias()
{
  return $this->belongsTo('App\Models\Categoria');
}
protected function consulta($fecha_inicio,$fecha_final)
{
  return DB::table('transaccion')->whereBetween('fecha', [$fecha_inicio,  $fecha_final])->get();
}
protected function mes($fecha)
{
  return DB::table('transaccion')->whereMonth('fecha', '=', $fecha)
    ->get();
}
protected function ano($fecha)
{
  return DB::table('transaccion')->whereYear('fecha', '=', $fecha)
    ->get();
}
protected function ultimomes()
{
  return DB::table('transaccion')->where('fecha', '>=', Carbon::now()->subMonth())->get();
}
protected function ultimoano()
{
  return DB::table('transaccion')->where('fecha', '>=', Carbon::now()->subYear())->get();
}   
}