<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use DB;
use Image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class CategoriaController extends Controller
{
     public function __construct()
    {

        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoria = Categoria::all();
        return view('categoria.index', compact('categoria'));
    }
     public function index2()
    {
        $categoria = Categoria::all();
        return view('categoria.store', compact('categoria'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $avatar = $request->file('avatar');
        $filename = time() . '.' . $avatar->getClientOriginalExtension();
        Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/categorias/' . $filename ) );
        $usuario_id = Auth::user()->id;
        $categoria = new Categoria();
        $categoria->cat_padre = $request->cat_padre;
        $categoria->tipo = $request->tipo;
        $categoria->usuario_id = $usuario_id;
        $categoria->nombre = $request->nombre;
        $categoria->avatar = $filename;
        $categoria->presupuesto = $request->presupuesto;
        $categoria->save();
        return redirect()->action('CategoriaController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria = Categoria::find($id);
        return view('categoria.show', compact('categoria')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Categoria::all();
        $category = Categoria::find($id);
        return view('categoria.update', compact('category', 'categoria')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categoria = Categoria::find($id);
        $avatar = $request->file('avatar');
        $filename = time() . '.' . $avatar->getClientOriginalExtension();
        Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/categorias/' . $filename ) );
        $categoria->cat_padre = $request->cat_padre;
        $categoria->tipo = $request->tipo;
        $categoria->nombre = $request->nombre;
        $categoria->avatar = $filename;
        $categoria->presupuesto = $request->presupuesto;
        $categoria->save();
        return redirect()->action('CategoriaController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        $categoria->delete();
        return redirect()->action('CategoriaController@index');
    }
}
