<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuenta;
use App\Models\Moneda;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use DB;
use Image;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

class CuentaController extends Controller
{
   public function __construct()
    {

        $this->middleware('auth');

    }
    public function crearCuenta(Request $request)
    {
//Agregar la cuenta a mysql
    	    	
$avatar = $request->file('avatar');
$filename = time() . '.' . $avatar->getClientOriginalExtension();
Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
      $usuario_id = Auth::user()->id;
      $moneda_id = Input::get('moneda_id');
      $nombre_corto = Input::get('nombre_corto');
      $descripcion = Input::get('descripcion');
      $saldo_inicial = Input::get('saldo_inicial');

      //Creamos el array de las monedas
      $cuentas = array('usuario_id' => $usuario_id, 
        'moneda_id' => $moneda_id,
        'nombre_corto' => $nombre_corto,
        'descripcion' => $descripcion,
        'saldo_inicial' => $saldo_inicial,
        'avatar' => $filename);

      DB::table('cuentas')->insert($cuentas);  
        return Redirect::back();
    	
      }
    	

   public function show()
    {       
        $cuentas = Cuenta::with('moneda')->get();
        return view('cuentas.index')->with('cuentas',compact('cuentas'));
    } 

    public function showEdit($id)
    {   
    //Cargar los datos de la cuenta    
       $cuenta = Cuenta::find($id);
       $json = json_encode($cuenta);
       //Cargar las monedas
       $monedas = Moneda::verMonedas();
    //print($cuenta);
    return view('cuentas.edit', compact('cuenta','monedas'));
    }
    
    /**
     * Edit the specified user resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
  $cuentas = Cuenta::find($id);
  $cuentas->update($request->all());
  
       if($cuentas->save())
     {
      //Se editó
        return $this->show();
     }
   
    }
    
     /**
     * Remove the specified cuenta resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cuenta = Cuenta::find($id);
        $cuenta->delete();
        return Redirect::back();
    }
}
