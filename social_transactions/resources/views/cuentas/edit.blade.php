@extends('layouts.main')
@section('content')
    @include('partials.status-panel')

    <div class="jumbotron" style="margin-top:-60px;">
      <div class="alert-heading">Editar cuenta</div>
              <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ url('/editCuen/'. $cuenta->id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
   <div class="col-xs-6">
  <div class="form-group">
    <label for="nombre">Moneda :</label>
    <select class="selectpicker form-control" 
    id="moneda_id" name="moneda_id">
    @foreach ($monedas as $m)    
<option data-icon="glyphicon-coin" value="{{ $m->id }}">{{ $m->nombre_corto }}
</option>
 @endforeach
 </select>
  </div>

  <div class="form-group">
    <label for="nombre">Nombre corto :</label>
    <input type="text" class="form-control" id="nombre_corto" value="{{ $cuenta->nombre_corto }}" name="nombre_corto">
  </div>
  </div>
  <div class="col-xs-6">
  <div class="form-group">
    <label for="descripcion">Descripción :</label>
    <input type="text" class="form-control" id="descripcion" value="{{ $cuenta->descripcion }}" name="descripcion">
  </div>
  <div class="form-group">
    <label for="saldo">Saldo Inicial :</label>
    <input type="text" class="form-control" id="saldo_inicial" 
    value="{{ $cuenta->saldo_inicial }}" name="saldo_inicial">
  </div>
  </div>
   <div class="form-group">
    <label for="imagen">Icono :</label>
    <input type="file" class="form-control" id="avatar" 
    name="avatar">
    <img src="/uploads/avatars/{{ $cuenta->avatar }}" 
      style="width:58px; height:56px; border-radius:25%; padding-top: initial; margin-top: -10px;">
  </div>
   
  <button type="submit" class="btn btn-primary">
  Modificar</button>
</form>
            </div>
    </div>
@stop
