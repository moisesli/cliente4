<!-- Form -->
          <form @submit.prevent="enviar_factura()">

            <!-- Primer fila -->
            <div class="form-row">

              <!-- Cliente -->
              <div class="form-group col-sm-6">                
                <label>Cliente</label>
                <div class="input-group">
                  <input type="text" class="form-control" disabled v-model="invoice.cliente">
                  <input type="hidden" v-model="invoice.cliente_id">
                  <div class="input-group-append">
                    <span class="input-group-text" style="cursor: pointer" @click="cliente"><i class="fa fa-search"></i></span>
                  </div>
                </div>
              </div>

              <!-- Serie -->
              <div class="col-sm-2">
                <label>Serie</label>
                <select class="form-control" id="exampleFormControlSelect1">
                  <option>F001</option>
                  <option>F002</option>
                  <option>F003</option>
                </select>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label>Fecha Emision</label>
                  <input type="date" class="form-control" placeholder="">
                </div>
              </div> 
            </div>

            <!-- Segunda fila -->
            <div class="form-row">
              <!-- Tipo Operacion -->
              <div class="form-group col-sm-3">
                <label>Tipo Operacion</label>
                <select class="form-control"> 
                  <option>Venta Interna</option>
                  <option>Anticipo o Deduccion de anticipo en venta interna</option>
                  <option>Exportacion</option>
                </select>
              </div>
              <div class="form-group col-sm-7">
                <label>Observaciones</label>
                <input type="text" class="form-control" placeholder="">
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="form-group col-sm-2">
                <label>Opciones</label>
                <button class="btn btn-outline-secondary btn-block"><i class="fa fa-lock"></i> Extra</button>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            </div>


            <div class="form-row">
              <div class="col-sm-4">
                <strong>Producto</strong>
              </div>
              <div class="col-sm-1">
                <strong>Cant</strong>
              </div>
              <div class="col-sm-2">
                <strong>P.Unit</strong>
              </div>
              <div class="col-sm-2">
                <strong>Subtotal</strong>
              </div>
              <div class="col-sm-2">
                <strong>Total</strong>
              </div>
              <div class="col-sm-1">
                <button type="button" class="btn btn-primary btn-block btn-sm" @click="add_producto">
                  <i class="fa fa-plus"></i>
                </button>
              </div>

            </div>
              <hr class="mt-1">


            <!-- Tercera fila -->
            <div class="form-row" v-for="(item,index) in invoice.items">
              <div class="form-group col-sm-4">
                <div class="input-group">
                  <input type="text" class="form-control" disabled placeholder="Producto" >
                  <input type="hidden">
                  <div class="input-group-append">
                    <span class="input-group-text" style="cursor: pointer" @click="producto()"><i class="fa fa-search"></i></span>
                  </div>
                </div>
              </div>
              <div class="form-group col-sm-1">
                <!-- <label>Cant</label> -->
                <input type="text" name="" class="form-control" placeholder="10">
              </div>              
              <div class="form-group col-sm-2">
                <!-- <label>P. unitario</label> -->
                <input type="text" name="" class="form-control" placeholder="45.59">
              </div>
              <div class="form-group col-sm-2">
                <!-- <label>SubTotal</label> -->
                <input type="text" name="" class="form-control" placeholder="85.12">
              </div>
              <div class="form-group col-sm-2">
                <!-- <label>Total</label> -->
                <input type="text" name="" v-model="item.total" class="form-control" placeholder="102.89">
              </div>
              <div class="form-group col-sm-1">
                <!-- <label>Opcion</label> -->
                <button type="button" class="btn btn-outline-secondary btn-block" @click="send_item(index,item)"><i class="fa fa-cog"></i></button>
              </div>
            </div> 


            <hr class="mb-4">
            <button type="submit" class="btn btn-primary btn-lg btn-block">
              <i class="fa fa-spinner fa-spin"></i> Crear Documento
            </button>
          </form>
          <!-- End Form -->