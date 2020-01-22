@extends('layouts.main')

@section('content')

    @include('partials.status-panel')

<div class="container">
  <h1 class="text-center">Lista de cuentas</h1>
  <a class="btn btn-primary"  href="{{ url('/cuentas') }}">+</a>
    <br />
    <br />
@foreach ($cuentas as $c)
  <table class="table">
  <thead>
    <tr class="info">
     <th class="active">Usuario </th>
     <th class="active">Moneda ID</th>
     <th class="active">Nombre de la cuenta</th>
     <th class="active">Descripción</th>
     <th class="active">Saldo Inicial</th>
     <th class="active">Icono</th>
     <th class="active">Editación</th>
     <th class="active">Eliminación</th>
    </tr>
  </thead>
   @for ($i=0; $i < count($c); $i++)
  <tbody>
    <tr class="info">
    @if (Auth::user()->id === $c[$i]->usuario_id)
      <td>{{ Auth::user()->first_name }}</td>
      <td>{{ $c[$i]->moneda->nombre_corto }}</td>
      <td>{{ $c[$i]->nombre_corto }}</td>
      <td>{{ $c[$i]->descripcion }}</td>
      <td>{{ $c[$i]->saldo_inicial }}</td>
      <td>
      <img src="/uploads/avatars/{{ $c[$i]->avatar }}" 
      style="width:58px; height:56px; border-radius:25%; padding-top: initial; margin-top: -10px;">
      </td>
       <td>
       
      <a class="btn btn-info" href="/VerCuenta/{{$c[$i]->id}}">Editar</a>
            </td>
       <td><a class="btn btn-danger" href="/ElimCuen/{{ $c[$i]->id }}">Eliminar</a>
            </td>
            @endif 
    </tr>
  </tbody>
   @endfor
</table>
@endforeach
</div>
@stop