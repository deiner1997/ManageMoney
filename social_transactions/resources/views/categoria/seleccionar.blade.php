@extends('layouts.main')

@section('content')

    @include('partials.status-panel')

<div class="row">
            <div class="col-md-4">
            <h3 class="centrar">Categorias</h3>
                  <div  class="item"  id="clientes">
                      <a href="/VerCategorias">
                          <img src="/assets/Images/moneda.jpg" alt="" class="tamano">
                      </a>
                  </div>
            </div>
              <div class="col-md-4">
              </div>
              <div class="col-md-4">
                <h3 class="centrar">Subcategorias</h3>
                  <div  class="item"  id="cuentas">
                      <a href="/VerSubcategorias">
                          <img src="/assets/Images/moneda.jpg" alt="" class="cuentasImg">
                      </a>
              </div>
          </div>
          </div>

@stop