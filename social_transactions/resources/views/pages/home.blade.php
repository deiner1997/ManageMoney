@extends('layouts.main')

@section('content')

    @include('partials.status-panel')

    <div class="jumbotron" style="margin-top:-20px;">
        <center><h1>Bienvenido a nuestro sistema de transacciones</h1>
          <br>
          <br>
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
                  <h3 class="centrar">Moneda</h3>
                  <div  class="item"  id="clientes">
                      <a href="/Monedas">
                          <img src="/assets/Images/moneda.jpg" alt="" class="tamano">
                      </a>
                  </div>
              </div>
              <div class="col-md-4">
                <h3 class="centrar">Cuenta</h3>
                  <div  class="item"  id="cuentas">
                      <a href="/Cuentas">
                          <img src="/assets/Images/cuentas.jpg" alt="" class="cuentasImg">
              </div>
          </div>
 <div class="row">
     <div class="col-md-4">
         <h3 class="centrar">Ingresos</h3>
         <div  class="item"  id="clientes">
             <a href="/Ingresos">
                 <img src="/assets/Images/ingresos.jpg" alt="" class="tamano">
             </a>
         </div>
     </div>
     <div class="col-md-4">
         <h3 class="centrar">Translados</h3>
         <div class="item" id="clientes">
             <a href="Traspasos">
                 <img src="assets/Images/traspasos.jpg" alt="" class="tamano">
             </a>
         </div>
     </div>
     <div class="col-md-4">
         <h3 class="centrar">Gastos</h3>
         <div class="item" id="clientes">
             <a href="Gastos">
                 <img src="/assets/Images/gastos.jpg" alt="" class="tamano">
             </a>
         </div>
     </div>
    </div>

@stop
