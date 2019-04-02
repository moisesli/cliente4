
<div class="modal fade" id="modalResumen" data-backdrop="true" tabindex="-1">
  <!-- data-backdrop="static" lo pone estatico al modal -->
  <!-- tabindex="-1" Activa escape para que se cierre -->
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <!-- Titulo Nuevo -->
        <h4 class="modal-title">
          Enviar Resumen Boletas <span class="badge badge-info">{{temp.fecha}}</span>
        </h4>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-light">
        <!--        Resumen lista   -->
        <span class="badge badge-secondary mr-1" v-for="item in temp.listPreResumen.items">
          {{item.documentoSerie}}-{{item.documentoNumero}}
        </span>
        <!--Enviar-->
        <button type="button" class="btn btn-primary btn-sm" @click="saveResumen()">
          <i class="fa fa-send-o"></i> Enviar Resumen</button>
        

        <table class="table table-sm mt-3">
          <tr>
            <th>F. Emision</th>
            <th>F. Generado</th>
            <th>Correlativo</th>
            <th>Ticket</th>
            <th>Codigo</th>
            <th>Accion</th>
          </tr>
          <tr v-for="resumen in temp.listTickets">
<!--            20532710066-01-R-20190211-1            -->
            <td>{{resumen.fechaEmision}}</td>
            <td>{{resumen.fechaGenerado}}</td>
            <th>{{resumen.respuestaCorrelativo}}</th>
            <td>{{resumen.respuestaMensaje}}</td>
            <th></th>
            <td><button class="btn btn-primary btn-sm"><i class="fa fa-redo"></i></button></td>
          </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Salir</button>
      </div>
    </div>
  </div>
</div>