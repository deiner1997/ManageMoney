@extends('layouts.main')

@section('content')

    @include('partials.status-panel')
 
<div class="container">
  <h1 class="text-center">Lista de Ingresos</h1>
  
    <br />
    <br />
  <table class="table table-hover table-bordered">
    <tr class="info">
        <th class="active">Usuario </th>
        <th class="active">Cuenta a Creditar</th>
        <th class="active">Categoria</th>
        <th class="active">Tipo</th>
        <th class="active">Fecha</th>
        <th class="active">Detalle</th>
        <th class="active">Monto</th>
        <th class="active">Edición</th>
        <th class="active">Eliminación</th>
        <th class="active">Consultar</th>

    </tr>
 @foreach ($traslados as $t)
    <tr class="info">
       @if (Auth::user()->id === $t->usuario_id)
      <td>{{ Auth::user()->first_name }} </td>
      @foreach ($cuentas as $c)
       @if ($c->id === $t->cuenta_creditar_id)
      <td>{{ $c->nombre_corto }}</td>
      <td>{{ $t->categoria_id }}</td>
      <td>{{ $t->tipo }}</td>
      <td>{{ $t->fecha }}</td>
      <td>{{ $t->detalle }}</td>
      <td>{{ $t->monto }}</td>

      @endif 
      @endforeach
      @endif 
       <td>
                <a class="btn btn-info" href="/VerTrasl/{{$t->id}}">Editar</a>
            </td>
            <td><a class="btn btn-danger" href="/ElimTrasl/{{ $t->id }}">Eliminar</a>
            </td>
            <td>
                <a class="btn btn-info" href="/ConsultTrasl/{{$t->id}}">Ver</a>
            </td>
           
            @endforeach
    </tr>
</table>
</div>
 
@stop


