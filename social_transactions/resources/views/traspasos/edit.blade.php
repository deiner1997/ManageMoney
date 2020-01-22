@extends('layouts.main')
@section('content')
    @include('partials.status-panel')

    <div class="jumbotron" style="margin-top:-60px;">
      <h3>Edición de Traslados</h3>
              <div class="panel-body">  
            <form class="form-horizontal" method="POST" action="{{ url('/updatTra/'. $translado->id) }}">
                        {{ csrf_field() }}
   <div class="col-xs-6">
  <div class="form-group">
  <!-- For para las cuentas -->
    <label for="nombre">Cuenta a creditar:</label>
    <select class="selectpicker form-control" 
    id="cuenta_creditar_id" name="cuenta_creditar_id">
    @foreach ($cuentas as $c)
    @if ($c->id === $translado->cuenta_creditar_id )
    <option value="{{ $c->id }}" selected>
  {{ $c->nombre_corto }}
    </option>
<option data-icon="glyphicon-coin" value="{{ $c->id}}">
{{ $c->nombre_corto }}
</option>
@endif
@endforeach
</select>
  </div>
   <div class="form-group">
  <!-- For para las cuentas -->
    <label for="nombre">Cuenta a debitar:</label>
    <select class="selectpicker form-control" 
    id="cuenta_adebitar_id" name="cuenta_adebitar_id">
      @foreach ($cuentas as $c)
      @if ($c->id === $translado->cuenta_adebitar_id )
    <option value="{{ $c->id }}" selected>{{ $c->nombre_corto }}</option> 
<option data-icon="glyphicon-coin" value="{{ $c->id}}">{{ $c->nombre_corto}}</option>
@endif
@endforeach
</select>
  </div>
  <div class="form-group">
  <label for="tipo">Tipo de translado :</label>
    <select class="selectpicker form-control" 
    id="tipo" name="tipo">
  <option value="{{ $translado->tipo }}" selected>{{ $translado->tipo }}
  </option>
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
    @foreach ($categorias as $cat)
    @if ($cat->id === $translado->categoria_id)
    <option value="{{ $cat->id }}" selected>
    {{ $cat->nombre }}
    </option> 
<option data-icon="glyphicon-coin" value="{{ $cat->id}}">{{ $cat->nombre }}</option>
@endif
@endforeach
</select>
  </div>
  <div class="form-group">
    <label for="descripcion">Fecha :</label>
  <input type="date" id="fecha" value="{{ $translado->fecha }}" name="fecha" max="2017-12-04" >
  </div>
  <div class="form-group">
    <label for="saldo">Detalle del translado :</label>
    <input type="text" class="form-control" id="detalle" 
    placeholder="Indique el detalle" value="{{ $translado->detalle }}" name="detalle">
  </div>
   <div class="form-group">
    <label for="monto">Monto del translado :</label>
    <input type="text" class="form-control" id="monto" 
    placeholder="Indique el monto" value="{{ $translado->monto }}" name="monto">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">
  Editar</button>
</form>
            </div>
    </div>
@stop