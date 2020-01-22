<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuenta;
use App\Models\Moneda;
use App\Models\Categoria;
use App\Models\Transaccion;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Khill\Lavacharts\Lavacharts;

class TransladoController extends Controller
{
   public function __construct()
    {

        $this->middleware('auth');

    }
    public function crearTranslado(Request $request)
    {
       
        $tipo = Input::get('tipo');
   if ($tipo === "Ingreso") {
     # code... para ingresar los ingresos a la BD
      $usuario_id = Auth::user()->id;
      $cuenta_creditar_id = Input::get('cuenta_creditar_id');
      $tipo = Input::get('tipo');
      $detalle = Input::get('detalle');
      $monto = Input::get('monto');
      $fecha = Input::get('fecha');
      $categoria_id = Input::get('categoria_id');

    //Creamos el array de los traslados
      $translado = array(
        'usuario_id' => $usuario_id, 
        'cuenta_creditar_id' => $cuenta_creditar_id,
        'categoria_id' => $categoria_id,
        'tipo' => $tipo,
        'detalle' => $detalle,
        'monto' => $monto,
        'fecha' => $fecha
        );
      $montoinicial = Cuenta::find($cuenta_creditar_id);
      $montoaumentado = $montoinicial->saldo_inicial + $monto;
      DB::table('cuentas')->where('id', $cuenta_creditar_id)->update(['saldo_inicial' => $montoaumentado]);
      $insert = DB::table('transaccion')->insert($translado);
    if($insert === true)
     {
        return Redirect::back();
     }
   }   else if($tipo === "Gasto")
   {  
 # code... para gastos a la BD
      $usuario_id = Auth::user()->id;
      $cuenta_adebitar_id = Input::get('cuenta_adebitar_id');
      $tipo = Input::get('tipo');
      $detalle = Input::get('detalle');
      $monto = Input::get('monto');
      $fecha = Input::get('fecha');
      $categoria_id = Input::get('categoria_id');
      
      $cuenta1 = Cuenta::find($cuenta_adebitar_id);
      $montocuenta = $cuenta1->saldo_inicial;
      if ($montocuenta >= $monto) {

    //Creamos el array de los gastos
      $translado = array(
        'usuario_id' => $usuario_id, 
        'cuenta_adebitar_id' => $cuenta_adebitar_id,
        'categoria_id' => $categoria_id,
        'tipo' => $tipo,
        'detalle' => $detalle,
        'monto' => $monto,
        'fecha' => $fecha
        );
      $montodescontado = $montocuenta - $monto;
      DB::table('cuentas')->where('id', $cuenta_adebitar_id)->update(['saldo_inicial' => $montodescontado]);
      $insert = DB::table('transaccion')->insert($translado);
      }
    if($insert === true)
     {
      //Se insertó
        return Redirect::back();
     }
   }
     {
# code... para ingresar los traslados a la BD
      $usuario_id = Auth::user()->id;
      $cuenta_creditar_id = Input::get('cuenta_creditar_id');
      $cuenta_adebitar_id = Input::get('cuenta_adebitar_id');
      $tipo = Input::get('tipo');
      $detalle = Input::get('detalle');
      $monto = Input::get('monto');
      $fecha = Input::get('fecha');
      $categoria_id = Input::get('categoria_id');

    //Creamos el array de los traslados
      $cuenta1 = Cuenta::find($cuenta_adebitar_id);
      $cuenta2 = Cuenta::find($cuenta_creditar_id);
      $montocuenta = $cuenta1->saldo_inicial;
      if ($montocuenta >= $monto) {
      $translado = array(
        'usuario_id' => $usuario_id, 
        'cuenta_creditar_id' => $cuenta_creditar_id,
        'cuenta_adebitar_id' => $cuenta_adebitar_id,
        'tipo' => $tipo,
        'detalle' => $detalle,
        'monto' => $monto,
        'fecha' => $fecha
        );
      $moneda1 = Moneda::find($cuenta1->moneda_id);
      $moneda2 = Moneda::find($cuenta2->moneda_id);
      if ($moneda1->simbolo === $moneda2->simbolo) {
         $montodescontado = $montocuenta - $monto;
      DB::table('cuentas')->where('id', $cuenta_adebitar_id)->update(['saldo_inicial' => $montodescontado]);     
      $montoaumentado = $cuenta2->saldo_inicial + $monto;
      DB::table('cuentas')->where('id', $cuenta_creditar_id)->update(['saldo_inicial' => $montoaumentado]);
      $insert = DB::table('transaccion')->insert($translado); 
      if($insert === true)
     {
        return Redirect::back();
     }
      } else if ($moneda1->simbolo === '$' && $moneda2->simbolo === '¢') {
          $convertir = $monto * $moneda1->tasa;
          $montoaume = $cuenta2->saldo_inicial + $convertir;
          $montodes = $cuenta1->saldo_inicial - $monto;
           DB::table('cuentas')->where('id', $cuenta_adebitar_id)->update(['saldo_inicial' => $montodes]);
           DB::table('cuentas')->where('id', $cuenta_creditar_id)->update(['saldo_inicial' => $montoaume]);
          $insert = DB::table('transaccion')->insert($translado);  
          if($insert === true)
     {
        return Redirect::back();
     }    
        } else if($moneda2->simbolo === '$' && $moneda1->simbolo === '¢') {
         $convertir = $monto / $moneda2->tasa;
          $montoaume = $cuenta2->saldo_inicial + $convertir;
          $montodes =  $cuenta1->saldo_inicial - $monto;
           DB::table('cuentas')->where('id', $cuenta_adebitar_id)->update(['saldo_inicial' => $montodes]);
           DB::table('cuentas')->where('id', $cuenta_creditar_id)->update(['saldo_inicial' => $montoaume]);
          $insert = DB::table('transaccion')->insert($translado);   
          if($insert === true)
     {
        return Redirect::back();
     }   
        } else if($moneda1->simbolo === '€' && $moneda2->simbolo === '¢') {
          $convertir = $monto * $moneda1->tasa;
          $montoaume = $cuenta2->saldo_inicial + $convertir;
          $montodes =  $cuenta1->saldo_inicial - $monto;
           DB::table('cuentas')->where('id', $cuenta_adebitar_id)->update(['saldo_inicial' => $montodes]);
           DB::table('cuentas')->where('id', $cuenta_creditar_id)->update(['saldo_inicial' => $montoaume]);
          $insert = DB::table('transaccion')->insert($translado);  
          if($insert === true)
     {
        return Redirect::back();
     }    
        } else if ($moneda2->simbolo === '€' && $moneda1->simbolo === '¢') {
           $convertir = $monto / $moneda2->tasa;
          $montoaume = $cuenta2->saldo_inicial + $convertir;
          $montodes = $cuenta1->saldo_inicial - $monto;
           DB::table('cuentas')->where('id', $cuenta_adebitar_id)->update(['saldo_inicial' => $montodes]);
           DB::table('cuentas')->where('id', $cuenta_creditar_id)->update(['saldo_inicial' => $montoaume]);
          $insert = DB::table('transaccion')->insert($translado); 
          if($insert === true)
     {
        return Redirect::back();
     } 
        }       
     }    
   }
   
    }
    	public function cambio($value='')
      {
        # code...
      }
       public function storeView()
    {       
        $cuentas = Cuenta::verCuentas();
        //$json = json_encode($cuentas);
        $categorias = Categoria::showCategorias();
        //$cat_json = json_encode($categorias);
         //print_r($cuentas);
        return view('traspasos.store', compact('cuentas','categorias'));
    }

   public function index()
    {       
      //Mostrar solamente los traslados
        $traslados = Transaccion::verTranslados();
        $cuentas = Cuenta::verCuentas();
        //print($traslados);
        return view('traspasos.index', compact('cuentas','traslados'));
    } 
    public function mostIngr()
    {       
      //Mostrar solamente los ingresos
        $traslados = Transaccion::verIngre();
        $cuentas = Cuenta::verCuentas();
        //print($traslados);
        return view('ingresos.index', compact('cuentas','traslados'));
    } 
     public function verGast()
    {       
      //Mostrar solamente los ingresos
        $traslados = Transaccion::verGast();
        $cuentas = Cuenta::verCuentas();
        //print($traslados);
        return view('gastos.index', compact('cuentas','traslados'));
    } 
    
    public function show($id)
    {       
       $translado = Transaccion::find($id);
       
        return view('traspasos.show')->with('translado',compact('translado'));
    } 

    public function showEdit($id)
    {   
    //Cargar los datos del translado    
       $translado = Transaccion::find($id);
       $json = json_encode($translado);

       //Cargar las cuentas
       $cuentas = Cuenta::verCuentas();
       $categorias = Categoria::showCategorias();
    
    return view('traspasos.edit', compact('translado','cuentas','categorias'));
    }
    
    /**
     * Edit the specified translado resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
  $translado = Transaccion::find($id);
  $translado->update($request->all());
  
       if($translado->save())
     {
      //Se editó
        echo "Transaccion editada";
     } 
     else {
      echo "Not updated it";
     }
   
    }
    
     /**
     * Remove the specified translado resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
    {
        Transaccion::destroy($id);
        return Redirect::back();
    }
    public function consultar(Request $request)
    {
      $fecha_inicio = $request->fecha_inicio;
      $fecha_final = $request->fecha_final;
      $sumagasto=0;
      $sumaingreso=0;
      $consulta = Transaccion::consulta($fecha_inicio, $fecha_final);
      $usuario_id = Auth::user()->id;
      foreach ($consulta as $consu) {
        if ($usuario_id === $consu->usuario_id) {
          if ($consu->tipo == "Gasto") {
             $sumagasto += $consu->monto;
          } else if( $consu->tipo == "Ingreso" ){
             $sumaingreso += $consu->monto;
          }
        }
      }
      return view('traspasos.mostrarconsulta', compact('consulta', 'sumagasto','sumaingreso'));
    }
    public function mes(Request $request)
    {
      $fecha = $request->fecha;
      $month = date("n",strtotime($fecha));
      $sumagasto=0;
      $sumaingreso=0;
      $consulta = Transaccion::mes($month);
      $usuario_id = Auth::user()->id;
      foreach ($consulta as $consu) {
        if ($usuario_id === $consu->usuario_id) {
          if ($consu->tipo == "Gasto") {
             $sumagasto += $consu->monto;
          } else if( $consu->tipo == "Ingreso" ){
             $sumaingreso += $consu->monto;
          }
        }
      }
        return view('traspasos.mostrarconsulta', compact('consulta', 'sumagasto','sumaingreso'));
    }
    public function ano(Request $request)
    {
      $fecha = $request->fecha;
      $year = date("Y",strtotime($fecha));
      $sumagasto=0;
      $sumaingreso=0;
      $consulta = Transaccion::ano($year);
      $usuario_id = Auth::user()->id;
      foreach ($consulta as $consu) {
        if ($usuario_id === $consu->usuario_id) {
          if ($consu->tipo == "Gasto") {
             $sumagasto += $consu->monto;
          } else if( $consu->tipo == "Ingreso" ){
             $sumaingreso += $consu->monto;
          }
        }
      }
        return view('traspasos.mostrarconsulta', compact('consulta', 'sumagasto','sumaingreso'));
    }
    public function ultimomes(Request $request)
    {
      $sumagasto=0;
      $sumaingreso=0;
      $consulta = Transaccion::ultimomes();
      $usuario_id = Auth::user()->id;
      foreach ($consulta as $consu) {
        if ($usuario_id === $consu->usuario_id) {
          if ($consu->tipo == "Gasto") {
             $sumagasto += $consu->monto;
          } else if( $consu->tipo == "Ingreso" ){
             $sumaingreso += $consu->monto;
          }
        }
      }
        return view('traspasos.mostrarconsulta', compact('consulta', 'sumagasto','sumaingreso'));
    }
    public function ultimoano(Request $request)
    {
      $sumagasto=0;
      $sumaingreso=0;
      $consulta = Transaccion::ultimoano();
      $usuario_id = Auth::user()->id;
      foreach ($consulta as $consu) {
        if ($usuario_id === $consu->usuario_id) {
          if ($consu->tipo == "Gasto") {
             $sumagasto += $consu->monto;
          } else if( $consu->tipo == "Ingreso" ){
             $sumaingreso += $consu->monto;
          }
        }
      }
        return view('traspasos.mostrarconsulta', compact('consulta', 'sumagasto','sumaingreso'));
    }
    public function graficos()
    {
      $numero1 =0;
      $numero2 =0;
      $consulta = Transaccion::Graficos();
      $consulta2 = Categoria::categorias();
      $usuario_id = Auth::user()->id;

      foreach ($consulta as $consu) {

        if ($usuario_id === $consu->usuario_id) {

 foreach ($consulta2 as $cat_json) 
 {
           if ($consu->categoria_id == $cat_json->id)
           {
     $consu->categoria_id = $cat_json->nombre;

           } 
        }
      }
                       }
     // var_dump($consulta);
   $json = json_encode($consulta);
  
   return view('traspasos.graficos', compact('consulta'));


    }

}
