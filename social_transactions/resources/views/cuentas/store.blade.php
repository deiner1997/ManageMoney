@extends('layouts.main')
@section('content')
    @include('partials.status-panel')

    <div class="jumbotron" style="margin-top:-60px;">
      <div class="alert-heading">Cuentas</div>
              <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ url('/crearCuenta') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
   
   <div class="col-xs-6">
  <div class="form-group">
  
    <label for="nombre">Moneda :</label>
    <select class="selectpicker form-control" 
    id="moneda_id" name="moneda_id">
    @foreach ($monedas as $m)
    @for ($i=0; $i < count($m); $i++)
<option data-icon="glyphicon-coin" value="{{ $m[$i]->id }}">{{ $m[$i]->nombre_corto }}</option>
@endfor
@endforeach
</select> 
  </div>
  <div class="form-group">
    <label for="nombre">Nombre corto :</label>
    <input type="text" class="form-control" id="nombre_corto" placeholder="Nombre" name="nombre_corto">
  </div>
  </div>
  <div class="col-xs-6">
  <div class="form-group">
    <label for="descripcion">Descripción :</label>
    <input type="text" class="form-control" id="descripcion" placeholder="Descripción de la cuenta" name="descripcion">
  </div>
  <div class="form-group">
    <label for="saldo">Saldo Inicial :</label>
    <input type="text" class="form-control" id="saldo_inicial" 
    placeholder="Indique el saldo" name="saldo_inicial">
  </div>
  </div>
   <div class="form-group">
    <label for="imagen">Icono :</label>
    <input type="file" class="form-control" id="avatar" 
    name="avatar">
  </div>
  <button type="submit" class="btn btn-primary">
  Crear cuenta</button>
</form>
         
            </div>
    </div>
@stop
