@extends('layouts.main')
@section('content')
    @include('partials.status-panel')

    <div class="jumbotron" style="margin-top:-60px;">
      <div class="alert-heading">Monedas</div>
              <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ url('/crearMoneda') }}">
                        {{ csrf_field() }}
  <div class="form-group">
    <label for="nombre">Nombre corto:</label>
    <input type="text" class="form-control" id="nombre_corto" placeholder="Nombre corto de la moneda" name="nombre_corto">
  </div>
  <div class="form-group">
    <label for="simbolo">Simbolo:</label>
    <input type="text" class="form-control" id="simbolo" placeholder="Simbolo" name="simbolo">
  </div>
  <div class="form-group">
    <label for="descripcion">Descripción:</label>
    <input type="text" class="form-control" id="descripcion" placeholder="Descripción de la moneda" name="descripcion">
  </div>
  <div class="form-group">
    <label for="tasa">Tasa:</label>
    <input type="text" class="form-control" id="tasa" 
    placeholder="Indique la tasa" name="tasa">
  </div>
  <button type="submit" class="btn btn-primary">
  Crear moneda</button>
</form>
         
            </div>
    </div>
@stop
