@extends('layouts.main')

@section('content')

    @include('partials.status-panel')

<div class="container">
 	<h1 class="text-center">Categorias</h1>
    <a href="/FormCrearCategoria">Crear nueva categoria</a>
    <br />
    <br />
 	<table class="table table-hover table-bordered">
    <tr class="info">
        <th class="active">
            Usuario
        </th>
        <th class="active">
            Cat Padre
        </th>
        <th class="active">
            Tipo
        </th>
        <th class="active">
            Descripción
        </th>
        <th class="active">
            Icono
        </th>
        <th class="active">
            Presupuesto
        </th>
        <th class="active">Edición</th>
        <th class="active">Eliminación</th>
    </tr>
        <tr class="info">
            <td>
               {{ Auth::user()->first_name }}   
            </td>
            <td>          
               {{$categoria->cat_padre}}
            </td>
            <td>          
               {{$categoria->tipo}}
            </td>
            <td>          
               {{$categoria->nombre}}
            </td>
            <td>
            <img src="/uploads/categorias/{{ $categoria->avatar }}" 
            style="width:58px; height:56px; border-radius:25%; padding-top: initial; margin-top: -10px;">
            </td>
            <td>          
               {{$categoria->presupuesto}}
            </td>
            <td>
                <a class="btn btn-info" href="/ActualizarCategoriaForm/{{$categoria->id}}">Editar</a>
            </td>
            <td>
                <a class="btn btn-danger" href="/EliminarCategoria/{{$categoria->id}}">Eliminar</a>
            </td>
        </tr>
 	</table>
 </div>

@stop