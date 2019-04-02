<div class="modal fade" id="modal_edit_cliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Editar Cliente</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">        
        
        <!-- Primera Fila -->
        <div class="row form-group">
          <div class="col-sm-5 pr-0">              
            <input type="text" class="form-control" v-on:keyup.enter="extraer()" v-model="customer.ruc_dni" placeholder="ruc o dni">            
          </div>
          <div class="col-sm-3 pr-0">
            <button class="btn btn-secondary btn-block" v-on:click="extraer()">
              <i class="fa fa-spinner fa-spin" v-show="estado_extraer"></i>
              <span>Extraer</span>
            </button>
          </div>
          <div class="col-sm-4">
            <select class="form-control" v-model="customer.tipo" :disabled="estado_extraer">
              <option value="">Seleccione</option>
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
            <input type="text" class="form-control" v-model="customer.razon_social" placeholder="Razon social o Nombre" :disabled="estado_extraer">
          </div>            
        </div>

        <!-- Tercera Fila -->
        <div class="row form-group">
          <div class="col-sm-4 pr-0">
            <input type="text" class="form-control" placeholder="Direccion Fiscal" :disabled="estado_extraer">
          </div>
          <div class="col-sm-4 pr-0">
            <input type="text" class="form-control" placeholder="Email" :disabled="estado_extraer">
          </div>
          <div class="col-sm-4">
            <input type="text" class="form-control" placeholder="Telefono" :disabled="estado_extraer">
          </div>
        </div>

        <!-- Cuarta Fila -->          
        <div class="row form-group">
          <div class="col-sm-5 pr-0">
            <input type="text" class="form-control" placeholder="Cuenta de Detraccion" :disabled="estado_extraer">
          </div>
          <div class="col-sm-7">
            <input type="text" class="form-control" placeholder="Detalles" :disabled="estado_extraer">
          </div>            
        </div>

        
      </div>

      <div class="modal-footer">
        <button class="btn btn-primary" v-on:click="edit_cliente()">Editar Cliente</button>
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
      </div>

    </div>
  </div>
</div>