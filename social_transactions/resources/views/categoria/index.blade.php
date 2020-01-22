@extends('layouts.main')

@section('content')

    @include('partials.status-panel')

<div class="container">
 	<h1 class="text-center">Categorias</h1>
    <a href="/FormCrearCategoria">Crear una nueva</a>
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
        <th class="active">Ver</th>
    </tr>
    @foreach ($categoria as $cate)
    @if (Auth::user()->id === $cate->usuario_id)
        <tr class="info">
            <td>
               {{ Auth::user()->first_name }}   
            </td>
            <td>          
               {{$cate->cat_padre}}
            </td>
            <td>          
               {{$cate->tipo}}
            </td>
            <td>          
               {{$cate->nombre}}
            </td>
            <td>
            <img src="/uploads/categorias/{{ $cate->avatar }}" 
            style="width:58px; height:56px; border-radius:25%; padding-top: initial; margin-top: -10px;">
            </td>
            <td>          
               {{$cate->presupuesto}}
            </td>
            <td>
                <a class="btn btn-info" href="/VerCategoria/{{$cate->id}}">Ver</a>
            </td>
        </tr>
         @endif
 	@endforeach
 	</table>
 </div>

@stop
