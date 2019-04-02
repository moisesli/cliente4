<div class="modal fade" id="new_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Nuevo Producto</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <!-- Primera Fila -->
        <div class="row form-group">
          <div class="col-sm-4 pr-0">
            <input type="text" class="form-control" v-model="product.codigo" placeholder="Codigo">
          </div>
          <div class="col-sm-8">
            <input type="text" class="form-control" v-model="product.descripcion"  placeholder="Descripcion">
          </div>
        </div>



        <!-- Segunda Fila -->
        <div class="row form-group">
          <div class="col-sm-3 pr-0">
            <input type="text" class="form-control" v-model="product.precio_sin_igv" placeholder="425.56">
            <small class="text-muted">Precio sin IGV</small>
          </div>
          <div class="col-sm-3 pr-0">
            <input type="text" class="form-control" v-model="product.precio_con_igv" placeholder="500.26">
            <small class="text-muted">Precio con IGV</small>
          </div>
          <div class="col-sm-2 pr-0">
            <input type="text" class="form-control" v-model="product.cantidad" placeholder="852">
            <small class="form-text text-muted">Cantidad</small>
          </div>
          <div class="col-sm-4">
            <select class="form-control" v-model="product.moneda">
              <option value="PEN">Soles (S/.)</option>
              <option value="USD">Dolares ($)</option>
            </select>
            <small class="form-text text-muted">Moneda</small>
          </div>
        </div>

        <!-- Tercera Fila -->
        <div class="row form-group">
          <div class="col-sm-5 pr-0">
            <select class="form-control" v-model="product.unidad">
              <option value="NIU">Producto (NIU)</option>
              <option value="ZZ">Servicio (ZZ)</option>
            </select>
            <small class="form-text text-muted">Unidad de Medida</small>
          </div>
          <div class="col-sm-7">
            <select class="form-control" v-model="product.categoria_id">
              <option value="">Categoria</option>
              <option value="1">ESPARRAGO VERDE FRESCO-CAJA 5 KG</option>
              <option value="2">Recursos hidrobiologicos</option>
            </select>
            <small class="form-text text-muted">Categoria del Producto</small>
          </div>
        </div>

        <!-- Cuarta Fila -->
        <div class="row form-group">
          <div class="col-sm-7 pr-0">
            <select class="form-control" v-model="product.igv_afectacion">
              <option value="10">10-Gravado - Operación Onerosa</option>
              <option value="11">11-[Gratuita] Gravado – Retiro por premio</option>
              <option value="12">12-[Gratuita] Gravado – Retiro por donación</option>
              <option value="13">13-[Gratuita] Gravado – Retiro</option>
              <option value="14">14-[Gratuita] Gravado – Retiro por publicidad</option>
              <option value="15">15-[Gratuita] Gravado – Bonificaciones</option>
              <option value="16">16-[Gratuita] Gravado – Retiro por entrega a trabajadores</option>
              <option value="20">20-Exonerado - Operación Onerosa</option>
              <option value="30">30-Inafecto - Operación Onerosa</option>
              <option value="31">31-[Gratuita] Inafecto – Retiro por Bonificación</option>
              <option value="32">32-[Gratuita] Inafecto – Retiro</option>
              <option value="33">33-[Gratuita] Inafecto – Retiro por Muestras Médicas</option>
              <option value="34">34-[Gratuita] Inafecto - Retiro por Convenio Colectivo</option>
              <option value="35">35-[Gratuita] Inafecto – Retiro por premio</option>
              <option value="36">36-[Gratuita] Inafecto - Retiro por publicidad</option>
              <option value="40">40-Exportación</option>
            </select>
            <small class="form-text text-muted">Tipo de Afectacion IGV</small>
          </div>
          <div class="col-sm-5">
            <select class="form-control" v-model="product.grupos">
              <option value="">Ninguno</option>
              <option value="1">1 Grupo</option>
              <option value="2">2 Grupos</option>
            </select>
            <small class="form-text text-muted">Grupos de este Producto</small>
          </div>
        </div>


      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" v-on:click="save_product()">Crear Producto</button>
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>