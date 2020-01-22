<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Moneda;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

class MonedaController extends Controller
{
   public function __construct()
    {

        $this->middleware('auth');

    }
     public function crearMoneda(Request $request)
    {
//Agregar la moneda a mysql
      $usuario_id = Auth::user()->id;
      $nombre = Input::get('nombre_corto');
      $simbolo = Input::get('simbolo');
      $descripcion = Input::get('descripcion');
      $tasa = Input::get('tasa');
      //Creamos el array de las monedas
      $monedas = array('usuario_id' => $usuario_id, 
        'nombre_corto' => $nombre,
        'simbolo' => $simbolo,
        'descripcion' => $descripcion,
        'tasa' => $tasa);
       
      $id = DB::table('monedas')->insertGetId($monedas);
        
        return Redirect::back();
  }

   public function show()
    {       
        $monedas = Moneda::verMonedas();
        return view('monedas.index')->with('monedas',compact('monedas'));
    }
      
      public function showM($id)
    {       
        $monedas = Moneda::find($id);
       return view('monedas.show')->with('monedas',compact('monedas'));
    }
     public function showCA()
    {       
        $monedas = Moneda::verMonedas();
        return view('cuentas.store')->with('monedas',compact('monedas'));
    }
      public function showEdit($id)
    {       
        $monedas = Moneda::find($id);
       return view('monedas.edit')->with('monedas',compact('monedas'));
    }

   
    /**
     * Edit the specified moneda resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
  $moneda = Moneda::find($id);
  $moneda->update($request->all());

    if($moneda->save())
     {
      //Se editó

        return $this->show();
     }
    }
     /**
     * Remove the specified moneda resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $monedas = Moneda::find($id);
        $monedas->delete();
        return Redirect::back();
    }
}
