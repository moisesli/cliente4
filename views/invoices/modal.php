
<div class="modal fade" id="modal" data-backdrop="true" tabindex="-1">
  <!-- data-backdrop="static" lo pone estatico al modal -->
  <!-- tabindex="-1" Activa escape para que se cierre -->
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <!-- Titulo Nuevo -->
        <h4 class="modal-title">
          <i class="fa fa-file"></i> {{doc.documentoTitulo}} {{doc.documentoSerie}}-{{doc.documentoNumero}}
        </h4>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-light">

        <!-- Cabezera Factura -->
        <!-- ####################################### -->
        <div class="row pl-3 pr-3">

          <!-- Dni o Ruc -->
          <div style="width: 22%" class="input-group input-group-sm">

            <input type="search"
                   v-model="doc.clienteDniRuc"
                   @input="dniRucList(doc.clienteDniRuc)"
                   list="dniRucList"
                   placeholder="Dni o Ruc"
                   class="form-control">

            <datalist id="dniRucList" style="max-height: 20%;">
              <option v-for="(result,index) in temp.dniRucList" :value="result.ruc_dni">
            </datalist>
            <div class="input-group-append">                       
              <span 
                class="input-group-text" 
                @click="reniecSunatDniRuc(doc.clienteDniRuc,doc.documentoTipo)">
                  <i class="fa fa-search"></i>
              </span>
            </div>
          </div>

          <!-- Nombre -->
          <div style="width: 38%;" class="pl-2">
            <input type="text"
                   v-model="doc.clienteRazon"
                   class="form-control form-control-sm"
                   placeholder="Nombre y Apellido">
          </div>

          <!-- Direccion -->
          <div style="width: 30%;" class="pl-2">
            <input type="text"
                   v-model="doc.clienteDireccion"
                   class="form-control form-control-sm"
                   placeholder="Direccion">
          </div>

          <!-- Avanzadas -->
          <div class="dropdown dropleft pr-0 pl-2" style="width:5%">
            <button
                class="btn btn-light btn-sm dropdown-toggle pl-1"
                style="width: 100%"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false">
              <i class="fa fa-cog"></i>
            </button>
            <!-- Opciones Avanzadas -->
            <div class="dropdown-menu p-0 bg-light" style="max-width: 190px;">
              <form class="p-3">
                <h6 class="dropdown-header p-0 text-center">Opciones Avanzadas</h6>
                <div class="dropdown-divider mb-0"></div>

                <!-- Serie -->
                <small class="text-muted">Serie</small>
                <select class="form-control form-control-sm" v-model="doc.documentoSerie">
                  <option v-for="serie in temp.documentoSerieListFacturas">{{serie.serie}}</option>
                </select>

                <!-- Fecha emision -->
                <small class="text-muted">Fecha Emision</small>
                <input type="date"
                       v-model="doc.documentoFecha"
                       class="form-control form-control-sm">

                <!-- Venta interna -->
                <small class="text-muted">Tipo de Operacion</small>
                <select class="form-control form-control-sm"
                        v-model="doc.documentoOperacion">
                  <option value="1">Venta Interna</option>
                  <option value="2">Anticipo o Deduccion de Anticipo en venta interna</option>
                  <option value="3">Exportacion</option>
                </select>

                <!-- Moneda -->
                <small class="text-muted">Moneda</small>
                <select class="form-control form-control-sm"
                        v-model="doc.documentoMoneda">
                  <option value="PEN">Soles (S/.)</option>
                  <option value="USD">Dolares ($)</option>
                </select>

                <!-- Tipo de cambio -->
                <small class="text-muted">Tipo de Cambio</small>
                <input type="text"                       
                       class="form-control form-control-sm"
                       placeholder="3.29" disabled>
              </form>
            </div>
          </div>

          <!-- Agregar Item -->
          <div style="width: 5%">
            <button class="btn btn-sm btn-outline-secondary ml-2"
                    v-on:click="addItem()"
                    style="width: 100%">
              <i class="fa fa-plus"></i>
            </button>
          </div>

        </div>
        <hr class="mb-2">



        <!-- ITEMS -->
        <!-- ####################################### -->
        <!-- Cabezera Items -->
        <div class="row pr-3 pl-3">
          <div style="width: 35%"><span class="text-black-50">Producto</span></div>
          <div style="width: 5%"></div>
          <div class="text-center " style="width: 15%" ><span class="text-black-50">Cantidad</span></div>
          <div class="text-right " style="width: 15%" ><span class="text-black-50">P.Unitario</span></div>
          <div class="text-right " style="width: 15%" ><span class="text-black-50">Subtotal</span></div>
          <div class="text-right " style="width: 15%"><span class="text-black-50">Total</span></div>
        </div>

        <div v-for="(item,index) in doc.items" class="row bg-light pb-1 pl-3 pr-3">

          <!-- Producto -->
          <div style="width: 35%">
            <input type="search"
                   v-model="item.descripcionCodigo"
                   @input="productList(item)"
                   class="form-control form-control-sm"
                   :list="'browsers'+index" placeholder="Producto o Codigo"
                   style="width: 100%">

            <!-- Codigo -->
            <input type="hidden" v-model="item.codigo">

            <!-- Descripcion -->
            <input type="hidden" v-model="item.descripcion">


            <datalist :id="'browsers'+index">
              <option v-for="(result,index) in temp.productList" :value="result.codigo + ' - ' + result.descripcion">
            </datalist>
          </div>

          <!-- Avanzadas Item -->
          <div class="dropdown dropright pr-0 pl-2" style="width:5%">
            <button
                class="btn btn-light btn-sm dropdown-toggle pl-1"
                style="width: 100%"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false">
              <i class="fa fa-cog"></i>
            </button>
            <!-- Opciones Avanzadas -->
            <div class="dropdown-menu p-0 bg-light" style="max-width: 190px;">
              <form class="p-3">
                <h6 class="dropdown-header p-0 text-center">Item Avanzadas</h6>
                <div class="dropdown-divider mb-0"></div>
                <!-- Tipo IGV -->
                <small class="text-muted">Tipo de IGV</small>
                <select class="form-control form-control-sm">
                  <option value="1">Gravada</option>
                  <option value="2">Exonerada</option>
                  <option value="2">Inafecto</option>
                </select>
                <!-- Descuento -->
                <small class="text-muted">Descuento</small>
                <input type="text"
                       v-model="item.descuento"
                       class="form-control form-control-sm"
                       placeholder="0.00">
                <!-- IGV Linea -->
                <small class="text-muted">IGV Linea</small>
                <input type="text" disabled
                       v-model="item.igv"
                       class="form-control form-control-sm"
                       placeholder="0.00">
                <!-- Eliminar -->
                <button type="button"
                        v-on:click="factura_item_delete(index)"
                        class="btn btn-light btn-sm mt-1 btn-block dropdown-toggle"><i class="fa fa-trash"></i> Eliminar Fila</button>
              </form>
            </div>
          </div>


          <!-- Cantidad -->
          <div class="pr-0 pl-2" style="width: 15%">
            <input type="text"
                   v-model="item.cantidad"
                   @input="editItem(item)"
                   style="width: 100%"
                   class="form-control form-control-sm text-center"
                   placeholder="0">
          </div>

          <!-- Precio Unitario -->
          <div class="pr-0 pl-2" style="width: 15%">
            <input type="text" style="width: 100%;"
                   v-model="item.precioConIgv"
                   @input="editItem(item)"
                   class="form-control form-control-sm text-right"
                   placeholder="0.00">

            <!-- Precio Sin Igv -->
            <input type="hidden" v-model="item.precioSinIgv">
          </div>

          <!-- Subtotal -->
          <div class="pr-0 pl-2" style="width: 15%">
            <input type="text" style="width: 100%;"
                   v-model="item.subtotal"
                   class="form-control form-control-sm text-right"
                   placeholder="0.00" disabled>
          </div>

          <!-- Total -->
          <div class="pr-0 pl-2" style="width: 15%">
            <input type="text" style="width: 100%;"
                   v-model="item.total"
                   class="form-control form-control-sm text-right"
                   placeholder="0.00">
          </div>
        </div>


        <!-- Totales -->
        <!-- ##################################################### -->
        <hr class="mb-2 mt-1">

        <div class="row pb-1 pl-3 pr-3">
          <!-- Espacion para usar -->
          <div style="width: 60%"></div>
          <div style="width: 40%">

            <!-- Anticipo -->
            <div
                style="width: 59.9%; float: left;"
                class="text-right pr-2 pb-1 text-muted"
                v-if="doc.documentoAnticipo != ''">
              Anticipo (-)
            </div>
            <div
                class="pl-3 pb-1"
                style="width: 40.1%; float: left;"
                v-if="doc.documentoAnticipo != ''">
              <input type="text" style="width: 100%;" class="form-control form-control-sm text-right" placeholder="0.00">
            </div>

            <!-- Exonerada -->
            <div style="width: 59.9%; float: left;"
                 class="text-right pr-2 text-muted pb-1"
                 v-if="doc.documentoExonerada != ''">
              Exonerada
            </div>
            <div class="pl-3 pb-1"
                 style="width: 40.1%; float: left;"
                 v-if="doc.documentoExonerada != ''">
              <input type="text" style="width: 100%;" class="form-control form-control-sm text-right" placeholder="0.00">
            </div>

            <!-- Inafecta -->
            <div style="width: 59.9%; float: left;"
                 class="text-right pr-2 text-muted pb-1"
                 v-if="doc.documentoInafecta != ''">
              Inafecta
            </div>
            <div class="pl-3 pb-1"
                 style="width: 40.1%; float: left;"
                 v-if="doc.documentoInafecta != ''">
              <input type="text" style="width: 100%;" class="form-control form-control-sm text-right" placeholder="0.00">
            </div>

            <!-- Gravada -->
            <div style="width: 59.9%; float: left;"
                 class="text-right pr-2 text-muted pb-1"
                 v-if="doc.documentoGravada != ''">
              Gravada
            </div>
            <div class="pl-3 pb-1"
                 style="width: 40.1%; float: left;"
                 v-if="doc.documentoGravada != ''">
              <input type="text" disabled style="width: 100%;"
                     v-model="doc.documentoGravada"
                     class="form-control form-control-sm text-right"
                     placeholder="0.00">
            </div>

            <!-- IGV -->
            <div style="width: 59.9%; float: left;"
                 class="text-right pr-2 text-muted pb-1"
                 v-if="doc.documentoIgv != ''">
              IGV
            </div>
            <div class="pl-3 pb-1"
                 style="width: 40.1%; float: left;"
                 v-if="doc.documentoIgv != ''">
              <input type="text" disabled style="width: 100%;"
                     v-model="doc.documentoIgv"
                     class="form-control form-control-sm text-right"
                     placeholder="0.00">
            </div>

            <!-- Gratuita -->
            <div style="width: 59.9%; float: left;"
                 class="text-right pr-2 text-muted pb-1"
                 v-if="doc.documentoGratuito != ''">
              Gratuita
            </div>
            <div class="pl-3 pb-1"
                 style="width: 40.1%; float: left;"
                 v-if="doc.documentoGratuito != ''">
              <input type="text" style="width: 100%;" class="form-control form-control-sm text-right" placeholder="0.00">
            </div>

            <!-- Otros Cargos -->
            <div style="width: 59.9%; float: left;"
                 class="text-right pr-2 text-muted pb-1"
                 v-if="doc.documentoOtros != ''">
              Otros Cargos
            </div>
            <div class="pl-3 pb-1"
                 style="width: 40.1%; float: left;"
                 v-if="doc.documentoOtros != ''">
              <input type="text" style="width: 100%;" class="form-control form-control-sm text-right" placeholder="0.00">
            </div>

            <!-- Descuento total (-) -->
            <div style="width: 59.9%; float: left;"
                 class="text-right pr-2 text-muted pb-1"
                 v-if="doc.documentoDescuento !=''">
              Descuento total (-)
            </div>
            <div class="pl-3 pb-1"
                 style="width: 40.1%; float: left;"
                 v-if="doc.documentoDescuento !=''">
              <input type="text"
                     style="width: 100%;"
                     class="form-control form-control-sm text-right"
                     placeholder="0.00">
            </div>

            <!-- Total -->
            <div style="width: 59.9%; float: left;"
                 class="text-right pr-2 pb-1"
                 v-if="doc.documentoTotal != ''">
              <strong>Total</strong>
            </div>
            <div class="pl-3 pb-1"
                 style="width: 40.1%; float: left;"
                 v-if="doc.documentoTotal != ''">
              <input type="text" disabled style="width: 100%; font-weight: bold"
                     v-model="doc.documentoTotal"
                     class="form-control form-control-sm text-right"
                     placeholder="0.00">
            </div>
          </div>
        </div>



      </div>
      <div class="modal-footer">

        <!-- Guardar Nueva Factura -->
        <button type="button" 
          class="btn btn-primary" 
          v-show="doc.documentoNuevo == 'nuevo'"
          v-on:click="saveNew()"
          :disabled="tempUso == 'si'">
          <i class="fa fa-save" v-show="temp.enviando == ''"></i>
          <i class="fa fa fa-spinner fa-spin" v-show="temp.enviando == 'si'"></i>
          Guardar
        </button>        

        <!-- Guardar Edit Factura -->
        <button type="button" 
          class="btn btn-primary" 
          v-if="temp.newEdit == 'edit'" 
          v-on:click="saveEdit()" 
          data-dismiss="modal">
          <i class="fa fa-save"></i>          
          Guardar Editado
        </button>

        <button type="button" class="btn btn-success" data-dismiss="modal">Salir</button>


      </div>
    </div>
  </div>
</div>
