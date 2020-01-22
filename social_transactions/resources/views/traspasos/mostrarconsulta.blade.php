@extends('layouts.main')

@section('content')

    @include('partials.status-panel')           
<div class="container">
  <h1 class="text-center">Consulta</h1>
    <br />
    <br />
  <table class="table table-hover table-bordered">
    <tr class="info">
        <th class="active">Usuario </th>
        <th class="active">Cuenta a Creditar</th>
        <th class="active">Cuenta a Debitar</th>
        <th class="active">Categoria</th>
        <th class="active">Tipo</th>
        <th class="active">Fecha</th>
        <th class="active">Detalle</th>
        <th class="active">Monto</th>
    </tr>
    @foreach ($consulta as $consul)
    @if (Auth::user()->id === $consul->usuario_id)
    <tr class="info">
      <td>{{ Auth::user()->first_name }}</td>
      <td>{{ $consul->cuenta_creditar_id }}</td>
      <td>{{ $consul->cuenta_adebitar_id }}</td>
      <td>{{ $consul->categoria_id }}</td>
      <td>{{ $consul->tipo }}</td>
      <td>{{ $consul->fecha }}</td>
      <td>{{ $consul->detalle }}</td>
      <td>{{ $consul->monto }}</td>
       @endif 
      @endforeach
    </tr>
   </table>
   <table class="table table-hover table-bordered">
    <tr class="info">
        <th class="active">Monto total de gastos</th>
        <th class="active">Monto total de ingresos</th>
    </tr>
    <tr class="info">
      <td>{{ $sumagasto }}</td>
      <td>{{ $sumaingreso }}</td>
    </tr>
  </table>
</div>


 
@stop