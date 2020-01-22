@extends('layouts.main')

@section('content')

    @include('partials.status-panel')
 
<div class="container">
  <h1 class="text-center">Su consulta de la moneda:</h1>
   <a class="btn btn-primary"  href="{{ url('/Monedas') }}"><< Regresar</a>
    <br />
    <br />
  <table class="table table-hover table-bordered">
   @foreach ($monedas as $m)
    <tr class="info">
        <th class="active">Usuario</th>
        <th class="active">Nombre</th>
        <th class="active">Descripción</th>
        <th class="active">Simbolo</th>
        <th class="active">Tasa</th>
    </tr>
    <tr class="info">
    @if (Auth::user()->id === $m->usuario_id)
      <td>{{ Auth::user()->first_name}}</td>
      <td>{{ $m->nombre_corto }}</td>
      <td>{{ $m->descripcion }}</td>
      <td>{{ $m->simbolo }}</td>
      <td>{{ $m->tasa }}</td>
  @endif
    </tr>
  
  @endforeach
</table>
</div>
 
@stop