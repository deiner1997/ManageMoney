@extends('layouts.main')

@section('content')

    @include('partials.status-panel')
 
<div class="container">
  <h1 class="text-center">Su consulta del traslado:</h1>
   <a class="btn btn-primary"  href="{{ url('/Traspasos') }}"><< Regresar</a>
    <br />
    <br />
  <table class="table table-hover table-bordered">
   @foreach ($translado as $t)
    <tr class="info">
       <th class="active">Usuario </th>
        <th class="active">Cuenta</th>
        <th class="active">Categoria</th>
        <th class="active">Fecha</th>
        <th class="active">Detalle</th>
        <th class="active">Monto</th>
    </tr>
    <tr class="info">
    @if (Auth::user()->id === $t->usuario_id)
      <td>{{ Auth::user()->first_name }} </td>
      <td>{{ $t->cuenta_id }}</td>
      <td>{{ $t->categoria_id }}</td>
      <td>{{ $t->fecha }}</td>
      <td>{{ $t->detalle }}</td>
      <td>{{ $t->monto }}</td>
      @endif 
       <td>
    </tr>
  
  @endforeach
</table>
</div>
 
@stop