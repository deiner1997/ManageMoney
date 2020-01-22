@extends('layouts.main')

@section('content')

    @include('partials.status-panel')
  <div class="row">
  <div class="col-md-4">
  <div class="jumbotron" style="margin-top:-60px;">
      <h3>Mes</h3>
  <div class="panel-body">
  <form class="form-horizontal" method="POST" action="{{ url('/Mes') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
  <div class="form-group">
    <label for="descripcion">Mes</label>
  <input type="date" id="fecha" name="fecha" max="2017-12-04" >
  </div>
  <button type="submit" class="btn btn-primary">
  Buscar</button>
</form>
</div>
</div>
</div>
  <div class="col-md-4">  
  <div class="jumbotron" style="margin-top:-60px;">
      <h3>Consultas</h3>
  <div class="panel-body">
  <form class="form-horizontal" method="POST" action="{{ url('/Consultas') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
  <div class="form-group">
    <label for="descripcion">Fecha Inicial:</label>
  <input type="date" id="fecha_inicio" name="fecha_inicio" max="2017-12-04" >
  </div>
  <div class="form-group">
    <label for="descripcion">Fecha Final:</label>
  <input type="date" id="fecha_final" name="fecha_final" max="2017-12-04" >
  </div>
  <button type="submit" class="btn btn-primary">
  Buscar</button>
</form>
</div>
</div>
</div>
  <div class="col-md-4">
    <div class="jumbotron" style="margin-top:-60px;">
      <h3>Año</h3>
  <div class="panel-body">
  <form class="form-horizontal" method="POST" action="{{ url('/Ano') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
  <div class="form-group">
    <label for="descripcion">Año</label>
  <input type="date" id="fecha" name="fecha" max="2017-12-04" >
  </div>
  <button type="submit" class="btn btn-primary">
  Buscar</button>
</form>
</div>
</div>
  </div>
</div>          

<div class="row">
  <div class="col-md-4">
  <div class="jumbotron" style="margin-top:-60px;">
      <h3>Ultimo Mes</h3>
  <div class="panel-body">
  <form class="form-horizontal" method="POST" action="{{ url('/Ultimomes') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
  <button type="submit" class="btn btn-primary">
  Consultar</button>
</form>
</div>
</div>
</div>
  <div class="col-md-4">  
</div>
  <div class="col-md-4">
    <div class="jumbotron" style="margin-top:-60px;">
      <h3>Año</h3>
  <div class="panel-body">
  <form class="form-horizontal" method="POST" action="{{ url('/Ultimoano') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
  <button type="submit" class="btn btn-primary">
  Consultar</button>
</form>
</div>
</div>
  </div>
</div>              
 
@stop