<div 	class="modal fade" 
		id="modalProductoEditAdvanced" 
		tabindex="-1" 
		role="dialog" 
		aria-labelledby="modalProductoEditAdvanced" 
		aria-hidden="true">
	<div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">
      <!-- Header -->
      <div class="modal-header">
        <h4>Editar Producto</h4>
      </div>
      <!-- Main -->
      <div class="modal-body">
        <div v-for="editProducto in editProductos" class="row pl-2">

          <!-- Codigo -->
          <div style="width: 12%" class="mr-1">
            <small class="form-text text-muted">Codigo</small>
            <input type="text" v-model="editProducto.codigo" name="codigo" class="form-control form-control-sm">
          </div>

          <!-- Descripcion -->
          <div style="width: 27%;" class="mr-1">
            <small class="form-text text-muted">Descripcion</small>
            <input type="text" v-model="editProducto.descripcion" class="form-control form-control-sm">
          </div>

          <!-- PrecioConIgv -->
          <div style="width: 9%" class="mr-1">
            <small class="form-text text-muted">Precio</small>
            <input type="text" v-model="editProducto.precio_con_igv" class="form-control form-control-sm">
          </div>

          <!-- Unidad -->
          <div style="width: 7%;" class="mr-1">
            <small class="form-text text-muted">Unidad</small>
            <input type="text" v-model="editProducto.unidad" class="form-control form-control-sm">
          </div>

          <!-- Stock -->
          <div style="width: 7%" class="mr-1">
            <small class="form-text text-muted">Stock</small>
            <input type="text" v-model="editProducto.producto_stock_id" class="form-control form-control-sm">
          </div>

          <!-- Moneda -->
          <div style="width: 7%;" class="mr-1">
            <small class="form-text text-muted">Moneda</small>
            <select v-model="editProducto.moneda" class="form-control form-control-sm">
              <option value="PEN">Soles</option>
              <option value="USD">Dolares</option>
            </select>
          </div>

          <!-- Tipo Igv -->
          <div style="width: 10%" class="mr-1">
            <small class="form-text text-muted">Tipo Igv</small>
            <select v-model="editProducto.igv_tipo" class="form-control form-control-sm">
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
          </div>

          <!-- Categoria -->
          <div style="width: 10%" class="mr-1">
            <small class="form-text text-muted">Categoria</small>
            <select v-model="editProducto.categoria_id" class="form-control form-control-sm">
              <option value=""></option>
            </select>
          </div>

          <div style="width: 100%" >
            <hr class="p-0 mt-3 mb-1">
          </div>
        </div>
      </div>
      <!--   Footer   -->
      <div class="modal-footer">
        <button class="btn btn-primary" @click="modalProductoSaveAdvanced(editProductos)" data-dismiss="modal">
          Actualizar
        </button>
        <button class="btn btn-success" data-dismiss="modal">Cerrar</button>
      </div>
    </div>    
  </div>  	
</div>