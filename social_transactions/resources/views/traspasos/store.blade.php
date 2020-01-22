@extends('layouts.main')
@section('content')
    @include('partials.status-panel')

    <div class="jumbotron" style="margin-top:-60px;">
      <h3>Translados</h3>
              <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ url('/crearTrans') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
   
   <div class="col-xs-6">
  <div class="form-group">
  <!-- For para las cuentas -->
    <label for="nombre">Cuenta a creditar:</label>
    <select class="selectpicker form-control" 
    id="cuenta_creditar_id" name="cuenta_creditar_id">
    <option value="" selected>Seleccione una cuenta</option> 
     @foreach ($cuentas as $c)
<option data-icon="glyphicon-coin" value="{{ $c->id}}">{{ $c->nombre_corto}}</option>
@endforeach
</select>
  </div>
   <div class="form-group">
  <!-- For para las cuentas -->
    <label for="nombre">Cuenta a debitar:</label>
    <select class="selectpicker form-control" 
    id="cuenta_adebitar_id" name="cuenta_adebitar_id">
    <option value="" selected>Seleccione una cuenta</option> 
     @foreach ($cuentas as $c)
<option data-icon="glyphicon-coin" value="{{ $c->id}}">{{ $c->nombre_corto}}</option>
@endforeach
</select>
  </div>
  <div class="form-group">
  <label for="tipo">Tipo de translado :</label>
    <select class="selectpicker form-control"
    id="tipo" name="tipo">
  <option value="Ingreso">Ingreso</option>
  <option value="Gasto">Gasto</option>
  <option value="Translados">Translados</option>
</select>
  </div>
  </div>
  <div class="col-xs-6">
<!-- For para las categorias -->
   <div class="form-group">
    <label for="nombre">Categoria :</label>
    <select class="selectpicker form-control" 
    id="categoria_id" name="categoria_id">
    <option value="" selected>Seleccione una</option> 
    @foreach ($categorias as $cat)
<option data-icon="glyphicon-coin" value="{{ $cat->id}}">{{ $cat->nombre }}</option>
@endforeach
</select>
</select>   
  </div>
  <div class="form-group">
    <label for="descripcion">Fecha :</label>
  <input type="date" id="fecha" name="fecha" >
  </div>
  <div class="form-group">
    <label for="saldo">Detalle del translado :</label>
    <input type="text" class="form-control" id="detalle" 
    placeholder="Indique el detalle" name="detalle">
  </div>
   <div class="form-group">
    <label for="monto">Monto del translado :</label>
    <input type="text" class="form-control" id="monto" 
    placeholder="Indique el monto" name="monto">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">
  Crear Translado</button>
</form>
         
            </div>
    </div>
@stop