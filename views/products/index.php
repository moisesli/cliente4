
<!-- Validate Session -->
<?php include '../../config/validate.php' ?>
<!-- Header -->
<?php include '../../layout/header.php' ?>

<div class="container" id="app">
  
  <!-- Herramientas -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light mt-3 pl-0 pr-0">

    <!--  Productos  -->
    <a class="navbar-brand" href="/views/invoices/"><b>Productos</b></a>

    <!-- Opciones -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <!-- Nuevo -->
        <li class="nav-item">
          <a href="#" class='nav-link' @click="products_new_state(products_new)">
            <i class='fa fa-plus-circle'></i> Nuevo
          </a>
        </li>
        <!-- Categorias -->
        <li class="nav-item">
          <a @click="categories_modal" class='nav-link' style="cursor: pointer">
            <i class='fa fa-plus-circle'></i> Categorias
          </a>
        </li>
      </ul>
    </div>

    <!--  Form Search -->
    <form class="form-inline my-2 my-lg-0" action="">
      <input type="search"
             class="form-control  mr-sm-2"
             placeholder="Producto"
      >
    </form>
  </nav>


  <!-- Tabla -->
  <div class="row pt-3">
    <div class="col-sm-12">
      <table class="table table-sm">
        <!-- Headers table -->
        <tr>
          <th>Codigo</th>
          <th>Descripcion</th>
          <th>Precio</th>
          <th>Und</th>
          <th>Stock</th>
          <th>Moneda</th>
          <th>ProSer</th>
          <th>Igv</th>
          <th>Categoria</th>
          <th class="text-right">Editar</th>
        </tr>

        <!--Nuevo-->
        <tr v-if="products_new == 'si'">
          <td>
            <input
                type="text"
                style="width: 100%; font-size: 100%;"
                placeholder="Codigo"
                v-model="product.codigo">
          </td>
          <td>
            <input
                type="text"
                style="width: 100%; font-size: 100%;"
                placeholder="Descripcion"
                v-model="product.descripcion">
          </td>
          <td>
            <input
                type="text"
                style="width: 100%; font-size: 100%;"
                placeholder="Precio"
                v-model="product.precio_con_igv">
          </td>
          <td>
            <input type="text" style="width: 100%" placeholder="Unidad" v-model="product.unidad">
          </td>
          <td>
            <input type="text" style="width: 100%" placeholder="1000" v-model="product.producto_stock_cantidad">
            <input type="hidden" v-model="product.producto_stock_id">
          </td>
          <td>
            <select style="width: 100%; height: 30px;" v-model="product.moneda">
              <option value="PEN">Soles</option>
              <option value="USD">Dolares</option>
            </select>
          </td>
          <td>
            <select style="width: 100%; height: 30px;" v-model="product.pro_ser">
              <option value="NIU">Producto</option>
              <option value="ZZ">Servicio</option>
            </select>
          </td>
          <td>
            <select style="width: 100%; height: 30px;" v-model="product.igv_tipo">
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
          </td>
          <td>
            <select style="width: 100%; height: 30px;" v-model="product.categoria_id">
              <option :value="categorie.id" v-for="categorie in categories">{{ categorie.descripcion }}</option>
            </select>
          </td>
          <td class="text-right">
            <button class="btn btn-sm" style="height: 28px;" @click="products_new_state(products_new)">
              <i class="fa fa-trash-alt"></i>
            </button>
            <button class="btn btn-sm"  style="height: 28px;" @click="products_new_add(product)"><i class="fa fa-edit"></i> Add</button>
          </td>
        </tr>

        <!-- LISTADO PRODUCTOS -->
        <tr v-for="product_filter in products_filtro">

          <!-- Codigo -->
          <td style="width: 10%" class="m-0 p-0 align-middle">
            <span v-if="product_filter.edit == 'no'">{{ product_filter.codigo }}</span>
            <input
                type="text"
                v-else style="width: 100%; font-size: 100%;"
                placeholder="Codigo"
                v-model="product_filter.codigo">
          </td>

          <!--Descripcion-->
          <td style="width: 25%" class="m-0 p-0 align-middle">
            <span v-if="product_filter.edit == 'no'">{{ product_filter.descripcion }}</span>
            <input
                type="text"
                v-else style="width: 100%; font-size: 100%;"
                placeholder="Descripcion"
                v-model="product_filter.descripcion">
          </td>

          <!-- PrecioConIgv -->
          <td style="width: 7%" class="m-0 p-0 align-middle">
            <span v-if="product_filter.edit == 'no'">{{ product_filter.precio_con_igv }}</span>
            <input
                type="text"
                v-else style="width: 100%; font-size: 100%;"
                placeholder="Precio"
                v-model="product_filter.precio_con_igv">
          </td>

          <!-- Unidad -->
          <td style="width: 7%" class="m-0 p-0 align-middle">
            <span v-if="product_filter.edit == 'no'">{{ product_filter.unidad }}</span>
            <input type="text" v-else style="width: 100%" placeholder="Unidad" v-model="product_filter.unidad">
          </td>

          <!-- Stock -->
          <td style="width: 7%" class="m-0 p-0 align-middle">
            <span v-if="product_filter.edit == 'no'">
              {{ product_filter.cantidad }}
              <i class="fa fa-share-alt" v-if="product_filter.dependiente == 'si'"></i>
            </span>
            <input v-else v-model="product_filter.cantidad" type="text" style="width: 100%" placeholder="45.87">
          </td>


          <!-- Moneda -->
          <td style="width: 7%" class="m-0 p-0 align-middle">
            <span v-if="product_filter.edit == 'no'">{{product_filter.moneda_nombre}}</span>
            <select v-else v-model="product_filter.moneda" style="width: 100%; height: 30px;">
              <option value="PEN">Soles</option>
              <option value="USD">Dolares</option>
            </select>
            <!--{{ product_filter.pro_ser }}-->
          </td>

          <!-- ProSer -->
          <td style="width: 7%" class="m-0 p-0 align-middle">
            <span v-if="product_filter.edit == 'no'">{{product_filter.pro_ser_nombre}}</span>
            <select v-else v-model="product_filter.pro_ser" style="width: 100%; height: 30px;">
              <option value="NIU">Producto</option>
              <option value="ZZ">Servicio</option>
            </select>
            <!--{{ product_filter.categoria.slice(0,15) }}-->
          </td>

          <!-- Tipo Igv -->
          <td style="width: 7%" class="m-0 p-0 align-middle">
            <span v-if="product_filter.edit == 'no'">{{product_filter.igv_tipo_nombre.slice(0,7)}}</span>
            <select v-else v-model="product_filter.igv_tipo" style="width: 100%; height: 30px;">
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
          </td>

          <!-- Categoria -->
          <td style="width: 13%" class="m-0 p-0 align-middle">
            <span v-if="product_filter.edit == 'no'">{{ product_filter.categoria_nombre.slice(0,15) }}</span>
            <select v-else v-model="product_filter.categoria_id" style="width: 100%; height: 30px;">
              <option :value="categorie.id" v-for="categorie in categories">{{ categorie.descripcion }}</option>
            </select>
          </td>

          <!-- Acciones -->
          <td class="text-right" style="margin: 0px; padding: 3px;">
            <button class="btn btn-sm" v-if="product_filter.edit == 'si'" @click="productDelete(product_filter)">
              <i class="fa fa-trash-alt"></i>
            </button>
            <button class="btn btn-sm" @click="productoEditSimple(product_filter)" style="height: 28px;">
              <i class="fa fa-edit"></i> Edit
            </button>
            <!--<button class="btn btn-sm" @click="modalProductoEditAdvanced(product_filter.stock_id)" style="height: 28px;">
              <i class="fa fa-file-alt"></i>
              Avanzado
            </button>-->
          </td>
        </tr>

      </table>
    </div>
  </div>

  <!-- Modal Categories -->
  <?php include './_modal_categories.php'?>


</div>

<!-- Js -->
<?php include './js.php' ?>
<!-- Footer -->
<?php include '../../layout/footer.php' ?>
