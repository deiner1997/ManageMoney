@extends('layouts.main')

@section('content')

    @include('partials.status-panel')
<div class="row">
        <div class="col-lg-4">
        </div>
        <div class="col-lg-4">
        <div class="">
        <h1 class="centrar" >Editar Categoria</h1>
        </div>
        </div>
        <div class="col-lg-4">
        </div>
      </div>
       <div class="row">
        <div class="col-lg-4">
        </div>
        <div class="col-lg-4">
        <div class="container">
    <div id = caja>
      <form class="" action="/ActualizarCategoria/{{$category->id}}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="exampleInputPassword1">Categorias</label>
        <select class="btn-info selectpicker" name="cat_padre">
        <option value="{{ $category->cat_padre}}"></option> 
      @foreach ($categoria as $cate)
      @if (Auth::user()->id === $cate->usuario_id)      
          <option value="{{ $cate->nombre }}">{{ $cate->nombre  }}</option>  
      @endif       
      @endforeach
       </select>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Tipo</label>
        <select class="btn-info selectpicker" name="tipo">
          <option value="{{ $category->tipo}}">{{ $category->tipo}}</option>
          <option value="gasto">Gasto</option>
          <option value="ingreso">Ingreso</option>      
       </select>
      </div>     
       <div class="form-group">
        <label for="exampleLastName">Descripción</label>
        <input value="{{ $category->nombre}}" id="usuario" type="text" class="form-control" placeholder="Descripción" name="nombre">
      </div>
      <img src="/uploads/categorias/{{ $category->avatar }}" 
            style="width:58px; height:56px; border-radius:25%; padding-top: initial; margin-top: -10px;">
       <div class="form-group">
       <label for="imagen">Icono</label>
       <input type="file" class="form-control" id="avatar" value="{{ $category->avatar }}" 
       name="avatar">
       </div>
      <div class="form-group">
        <label for="exampleLastName">Presupuesto</label>
        <input value="{{ $category->presupuesto}}" id="usuario" type="text" class="form-control" placeholder="Presupuesto" name="presupuesto">
      </div>
      <button type="submit" class="btn btn-success">
      Registrar
   </button>
    </form>
  </div>
</div>
        </div>
        <div class="col-lg-4">
        </div>
      </div>
      @stop