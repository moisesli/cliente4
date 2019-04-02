<div class="modal fade" id="modal_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Eliminar Cliente</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <!-- Primera Fila -->
        <div class="row form-group">
          <div class="col-sm-5 pr-0">              
            <input type="text" class="form-control" placeholder="ruc o dni" v-bind:value="customer.ruc_dni" disabled="">
          </div>
          <div class="col-sm-3 pr-0">
            <button class="btn btn-secondary btn-block">
              <i class="fa fa-spinner fa-spin" v-show="estado_extraer"></i>
              <span>Extraer</span>
            </button>
          </div>
          <div class="col-sm-4">
            <select class="form-control" v-model="customer.tipo" disabled="">
              <option value="0">Seleccione</option>
              <option value="1">DNI</option>
              <option value="6">RUC</option>
              <option value="4">Carnet Extranjeria</option>
              <option value="7">Pasaporte</option>
            </select>
          </div>
        </div>

        <!-- Segunda Fila -->
        <div class="row form-group">
          <div class="col-sm-12">
            <input type="text" class="form-control" v-model="customer.razon_social" placeholder="Razon social o Nombre" disabled="disabled">
          </div>            
        </div>

        <!-- Tercera Fila -->
        <div class="row form-group">
          <div class="col-sm-4 pr-0">
            <input type="text" class="form-control" placeholder="Direccion Fiscal" disabled="disabled">
          </div>
          <div class="col-sm-4 pr-0">
            <input type="text" class="form-control" placeholder="Email" disabled="disabled">
          </div>
          <div class="col-sm-4">
            <input type="text" class="form-control" placeholder="Telefono" disabled="disabled">
          </div>
        </div>

        <!-- Cuarta Fila -->          
        <div class="row form-group">
          <div class="col-sm-5 pr-0">
            <input type="text" class="form-control" placeholder="Cuenta de Detraccion" disabled="disabled">
          </div>
          <div class="col-sm-7">
            <input type="text" class="form-control" placeholder="Detalles" disabled="disabled">
          </div>            
        </div>
        
      </div>
      <div class="modal-footer">
        <button class="btn btn-danger" v-on:click="delete_cliente(customer.id)">Borrar Cliente</button>
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>