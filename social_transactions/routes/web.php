<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Auth::routes();
$s = 'public.';
Route::get('/',         ['as' => $s . 'home',   'uses' => 'PagesController@getHome']);

$s = 'social.';
Route::get('/social/redirect/{provider}',   ['as' => $s . 'redirect',   'uses' => 'Auth\SocialController@getSocialRedirect']);
Route::get('/social/handle/{provider}',     ['as' => $s . 'handle',     'uses' => 'Auth\SocialController@getSocialHandle']);

Route::get('/moneda', function(){
    return view('monedas.store');
});
Route::get('/cuentas', 'MonedaController@showCA')->name('Monedas');

Route::group(['middleware' => 'auth:all'], function()
{
    $a = 'authenticated.';
    Route::get('/logout', ['as' => $a . 'logout', 'uses' => 'Auth\LoginController@logout']);
    Route::get('/activate/{token}', ['as' => $a . 'activate', 'uses' => 'ActivateController@activate']);
    Route::get('/activate', ['as' => $a . 'activation-resend', 'uses' => 'ActivateController@resend']);
    Route::get('not-activated', ['as' => 'not-activated', 'uses' => function () {
        return view('errors.not-activated');
    }]);
});
Route::post('/crearMoneda', 'MonedaController@crearMoneda')->name('crearMoneda');
Route::post('/crearCuenta', 'CuentaController@crearCuenta')->name('crearCuenta');

Auth::routes(['login' => 'auth.login']);

Route::get('/Ingresos', 'TransladoController@mostIngr')->name('Ingresos');
Route::get('/Gastos', 'TransladoController@verGast')->name('Gastos');
Route::get('/Cuentas', 'CuentaController@show')->name('Cuentas');

Route::get('/Traspasos', 'TransladoController@index')->name('Translados');
Route::post('/crearTrans', 'TransladoController@crearTranslado')->name('crearTrans');

Route::get('/CrearTransp', 'TransladoController@storeView')->name('Translados');
Route::get('/VerTrasl/{id}', 'TransladoController@showEdit')->name('Translados');
Route::post('/updatTra/{id}', 'TransladoController@edit')->name('Translados');
Route::get('/Monedas', 'MonedaController@show')->name('Monedas');

//Ruta que muestra el formulario para crear categorias
Route::get('/FormCrearCategoria' , 'CategoriaController@index2', function(){
return view('categoria.store');
}); 
//Ruta que muestra la categoria a eliminar o actualizar
Route::get('/VerCategoria/{id}', "CategoriaController@show", function(){
    return view('categoria.show');
});
//Ruta que muestra el formulario para actualizar una categoria.
Route::get('/ActualizarCategoriaForm/{id}', "CategoriaController@edit", function(){
    return view('categoria.update');
});
//Ruta que va al controlador CategoriaController para crear una categoria.
Route::post('/CrearCategoria', 'CategoriaController@store');
//Ruta que va al controlador CategoriaController para crear actualizar una categoria.
Route::post('/ActualizarCategoria/{id}', 'CategoriaController@update');
//Ruta que va al controlador CategoriaController para eliminar una categoria.
Route::get('/EliminarCategoria/{id}', 'CategoriaController@destroy');
//Ruta que va al controlador CategoriaController para cargar la lista de categorias.
Route::get('/VerCategorias','CategoriaController@index');
Route::get('/ElimTrasl/{id}', 'TransladoController@destroy');
Route::get('/ElimMone/{id}', 'MonedaController@destroy');
Route::get('/ElimCuen/{id}', 'CuentaController@destroy');
Route::get('/VerCuenta/{id}', 'CuentaController@showEdit');
Route::get('/ConsultMon/{id}', 'MonedaController@showM');
Route::get('/ConsultTrasl/{id}', 'TransladoController@show');
Route::get('/VerMoneda/{id}', 'MonedaController@showEdit');
Route::post('/editMon/{id}', 'MonedaController@edit');
Route::post('/editCuen/{id}', 'CuentaController@edit');
//Ruta que muestra el formulario para crear subcategorias
Route::get('/FormCrearSubcategoria', 'SubcategoriaController@index2', function(){
return view('subcategoria.store');
}); 
//Ruta que muestra la subcategoria a eliminar o actualizar
Route::get('/VerSubcategoria/{id}', "SubcategoriaController@show", function(){
    return view('subcategoria.show');
});
//Ruta que muestra el formulario para actualizar una subcategoria.
Route::get('/ActualizarSubcategoriaForm/{id}', "SubcategoriaController@edit", function(){
    return view('subcategoria.update');
});
//Ruta que va al controlador SubcategoriaController para crear una subcategoria.
Route::post('/CrearSubcategoria', 'SubcategoriaController@store');
//Ruta que va al controlador SubcategoriaController para crear actualizar una subcategoria.
Route::post('/ActualizarSubcategoria/{id}', 'SubcategoriaController@update');
//Ruta que va al controlador SubcategoriaController para eliminar una subcategoria.
Route::get('/EliminarSubcategoria/{id}', 'SubcategoriaController@destroy');
//Ruta que va al controlador SubcategoriaController para cargar la lista de subcategoria.
Route::get('/VerSubcategorias','SubcategoriaController@index');

Route::post('/Consultas', 'TransladoController@consultar')->name('Consultas');
Route::post('/Ano', 'TransladoController@ano')->name('Ano');
Route::post('/Mes', 'TransladoController@mes')->name('Mes');
Route::post('/Ultimoano', 'TransladoController@ultimoano')->name('Ano');
Route::post('/Ultimomes', 'TransladoController@ultimomes')->name('Mes');
Route::get('/Graficos', 'TransladoController@graficos')->name('Graficos');
//Ruta que muestra la vista seleccionar.
Route::get('/Seleccionar', function(){
return view('categoria.seleccionar');
}); 
Route::get('/MostrarGrafico', function(){
return view('traspasos.graficos');
}); 
Route::get('/Consulta', function(){
return view('traspasos.mostrarconsulta');
}); 
Route::get('/FormConsulta', function(){
return view('traspasos.consultas');
}); 
