@extends('layouts.main')
@section('content')
    @include('partials.status-panel')

    <div class="jumbotron" style="margin-top:-60px;">
      <div class="alert-heading">Edición de su moneda</div>
              <div class="panel-body">
               @foreach ($monedas as $m)
            <form class="form-horizontal" method="POST" action="{{ url('/editMon/'. $m->id ) }}">
                        {{ csrf_field() }}
  <div class="form-group">
    <label for="nombre">Nombre corto:</label>
    <input type="text" class="form-control" id="nombre_corto" value="{{ $m->nombre_corto }}" name="nombre_corto">
  </div>
  <div class="form-group">
    <label for="simbolo">Simbolo:</label>
    <input type="text" class="form-control" id="simbolo" value="{{ $m->simbolo }}" name="simbolo">
  </div>
  <div class="form-group">
    <label for="descripcion">Descripción:</label>
    <input type="text" class="form-control" id="descripcion" value="{{ $m->descripcion }} " name="descripcion">
  </div>
  <div class="form-group">
    <label for="tasa">Tasa:</label>
    <input type="text" class="form-control" id="tasa" 
    value="{{ $m->tasa }}" name="tasa">
  </div>
  <button type="submit" class="btn btn-primary">
  Modificar</button>
  @endforeach
</form>
         
            </div>
    </div>
@stop
