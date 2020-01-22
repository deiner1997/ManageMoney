@extends('layouts.main')

@section('content')

    @include('partials.status-panel')
 
<div class="container">
  <h1 class="text-center">Lista de monedas</h1>
   <a class="btn btn-primary"  href="{{ url('/moneda') }}">+</a>
    <br />
    <br />
  <table class="table table-hover table-bordered">
   @foreach ($monedas as $m)
    <tr class="info">
        <th class="active">Usuario </th>
        <th class="active">Nombre de la moneda</th>
        <th class="active">Descripción</th>
        <th class="active">Simbolo</th>
        <th class="active">Tasa</th>
        <th class="active">Edición</th>
        <th class="active">Eliminación</th>
        <th class="active">Consultar</th>

    </tr>
  @for ($i=0; $i < count($m); $i++)
    <tr class="info">
       @if (Auth::user()->id === $m[$i]->usuario_id)
      <td>{{ Auth::user()->first_name }} </td>
      <td>{{ $m[$i]->nombre_corto }}</td>
      <td>{{ $m[$i]->descripcion }}</td>
      <td>{{ $m[$i]->simbolo }}</td>
      <td>{{ $m[$i]->tasa }}</td>
      @endif 
       <td>
                <a class="btn btn-info" href="/VerMoneda/{{$m[$i]->id}}">Editar</a>
            </td>
            <td><a class="btn btn-danger" href="/ElimMone/{{ $m[$i]->id }}">Eliminar</a>
            </td>
            <td>
                <a class="btn btn-info" href="/ConsultMon/{{$m[$i]->id}}">Ver</a>
            </td>
    </tr>
      @endfor
  
  @endforeach
</table>
</div>
 
@stop

