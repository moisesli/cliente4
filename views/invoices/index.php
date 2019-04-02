<!-- Validate Session -->
<?php include '../../config/validate.php' ?>
<!-- Header -->
<?php include '../../layout/header.php' ?>

<!-- Contenido -->
<div class="container" id="app">

  <!-- Row Container -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light mt-3 pl-0 pr-0">

    <!--  Documentos  -->
    <a class="navbar-brand" href="/views/invoices/"><b>Documentos</b></a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a href="#" class='nav-link' @click="modal('nuevo','01','','')"><i class='fa fa-plus-circle'></i> Factura</a>
        </li>
        <li class="nav-item">
          <a href="#" class='nav-link' @click="modal('nuevo','03','','')" ><i class='fa fa-plus-circle'></i> Boleta</a>
        </li>
        <li class="nav-item">
          <a class='nav-link' @click="modalResumen()" style="cursor: pointer;" ><i class='fa fa-calendar-alt'></i> Resumen</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0" action="">
        <input type="date" class="form-control mr-2" name="dia" v-model="temp.fecha"  @input="searchCustom(temp.fecha,'fecha')" >
        <input type="search" class="form-control  mr-sm-2" v-model="temp.nombre" @input="searchCustom(temp.nombre,'nombre')" placeholder="Numero Dni Ruc">
<!--        <button class="btn btn-info my-2 my-sm-0" type="submit">Buscar</button>-->
      </form>
    </div>
  </nav>

  <table class="table table-sm table-hover mt-2">
    <tr>
      <th>Fecha</th>
      <th>Tipo</th>
      <th>Serie</th>
      <th>Numero</th>
      <th>Ruc,Dni,Etc</th>
      <th>Denominacion</th>
      <th>Opciones</th>
      <th>Moneda</th>
      <th class="text-right">Total</th>
    </tr>
    <tr v-for="doc in documentos">
      <td>{{doc.documentoFecha}}</td>
      <td>{{doc.documentoTipo_}}</td>
      <td>{{doc.documentoSerie}}</td>
      <td>{{doc.documentoNumero}}</td>
      <td>{{doc.clienteDniRuc}}</td>
      <td>{{doc.clienteRazon.slice(0,30)}}</td>
      <td class="text-center">

        <!-- Opciones Menu -->
        <div class="btn-group btn-group-sm">
          <div class="btn-group dropleft">

            <button type="button" class="btn  p-0 pl-1 pr-1 dropdown-toggle dropdown-toggle-split"
                    v-bind:class="[doc.respuestaEnviado == 'si' ? 'btn-info' : 'btn-outline-secondary']"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">&nbsp;
              <i class="fa fa-cog"></i>
              <i class="fa fa-cog fa-spin" style="animation-duration: 1s; " v-if="doc.sunat == '2'"></i>
            </button>

            <!-- Menu Factura -->
            <div class="dropdown-menu" v-if="doc.documento_tipo=='01'">
              <a class="dropdown-item disabled" href="#">
                  {{doc.documentoSerie}}-{{doc.documentoNumero}} <small>(Factura)</small>
                  <br>{{doc.respuestaMensaje}}
              </a>

              <a class="dropdown-item" v-if="doc.respuestaEnviado==''" href="#" v-on:click="factura_send(doc)">
                <i class="fa fa-upload"></i> Enviar Factura
              </a>
              <a class="dropdown-item" v-if="doc.respuestaEnviado==''" href="#" v-on:click="factura_edit_view(doc.id)">
                  <i class="fa fa-edit"></i> Editar Factura
              </a>

              <a class="dropdown-item" href="#"><i class="fa fa-file-alt"></i> Generar Nota Credito</a>
              <a class="dropdown-item" href="#"><i class="fa fa-file-alt"></i> Generar Nota Debito</a>
              <a class="dropdown-item" href="#"><i class="fa fa-arrow-down"></i> Generar Baja</a>
            </div>            

            <!-- Menu Boleta -->
            <div class="dropdown-menu" v-if="doc.documento_tipo=='03'">
              <a class="dropdown-item disabled" href="#">
                  {{doc.documento_serie}}-{{doc.documento_numero}} <small>(Boleta)</small>
              </a>
              <a class="dropdown-item" href="#" v-on:click="boleta_edit_view(doc.id)">
                  <i class="fa fa-edit"></i> Editar Boleta
              </a>
              <!-- <a class="dropdown-item" href="#"><i class="fa fa-upload"></i> Enviar Boleta</a> -->
              <a class="dropdown-item" href="#"><i class="fa fa-file-alt"></i> Generar Nota Credito</a>
              <a class="dropdown-item" href="#"><i class="fa fa-file-alt"></i> Generar Nota Debito</a>
              <a class="dropdown-item" href="#"><i class="fa fa-arrow-down"></i> Generar Baja</a>
            </div>

          </div>
          <a class="btn btn-sm p-0 pl-2 pr-2"
             :href="doc.respuestaPdf" target="_blank"
             v-bind:class="[doc.respuestaEnviado == 'si' ? 'btn-info' : 'btn-outline-secondary']">
            Imprimir
          </a>

        </div>
        <!-- End Menu Opciones -->

      </td>
      <td>{{doc.documentoMoneda}}</td>
      <td class="text-right m-0 p-0">
        {{doc.documentoTotal}}
      </td>
    </tr>
  </table>

  <!-- Modal -->
  <?php include __DIR__.'/modal.php' ?>

  <!-- modalResumen -->
  <?php include __DIR__.'/modalResumen.php' ?>

</div>
<!-- Js -->
<?php include './js.php' ?>
<!-- Footer -->
<?php include '../../layout/footer.php' ?>
