<?php include '../../config/validate.php' ?>
<?php include '../../layout/header.php'; ?>

<div class="container" id="app">

  <nav class="navbar navbar-expand-lg navbar-light bg-light mt-3 pl-0 pr-0">

    <!--  Cliente Titulo  -->
    <a class="navbar-brand" href="/views/invoices/"><b>Clientes & Proveedores</b></a>

    <!-- Nuevo -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <!-- Nuevo -->
        <li class="nav-item">
          <a class='nav-link' @click="functionClienteNew(clienteNew)" style="cursor: pointer">
            <i class='fa fa-plus-circle'></i> Nuevo
          </a>
        </li>
      </ul>
    </div>

    <!--  Form Search -->
    <form class="form-inline my-2 my-lg-0" action="">
      <input type="search"
             class="form-control mr-sm-2"
             placeholder="Buscar">
    </form>
  </nav>


	<!--<div class="row pt-4">


		<div class="col-sm-6">
			<h5 class="d-inline">Clientes Y Proveedores</h5>
		</div>


		<div class="col-sm-6 text-right pt-2 ">
			<form class="form-inline justify-content-end">
				<input type="text" class="form-control mr-sm-2" v-model="search" placeholder="Buscar Cliente">
				<a href="#" class="btn btn-primary" @click="modal_nuevo_cliente()">Nuevo</a>				
			</form>
		</div>

	</div>-->

	

	<div class="row pt-4">
		<div class="col-sm-12">

			<!-- Tabla de clientes -->
			<table class="table table-sm">

				<!-- Cabezera -->
				<tr>					
					<th>RucDni</th>
					<th>RazonSocial</th>
					<th>Direccion</th>
					<th>Email</th>
					<th>Telefonos</th>
					<th>Detraccion</th>
					<th class="text-center">Acciones</th>
				</tr>

        <!--Nuevo-->
        <tr v-if=" clienteNew == 'si' ">
          <td>
            <input
                type="text" style="width: 100%; font-size: 100%;"
                placeholder="Ruc o Dni" v-model="customer.rucDni">
          </td>
          <td>
            <input
                type="text"
                style="width: 100%; font-size: 100%;" placeholder="Razon Social"
                v-model="customer.razonSocial">
          </td>
          <td>
            <input
                type="text"
                style="width: 100%; font-size: 100%;" placeholder="Direccion"
                v-model="customer.direccion">
          </td>
          <td>
            <input
                type="text"
                style="width: 100%; font-size: 100%;" placeholder="Email"
                v-model="customer.email">
          </td>
          <td>
            <input
                type="text"
                style="width: 100%; font-size: 100%;" placeholder="Telefonos"
                v-model="customer.telefono">
          </td>
          <td>
            <input
                type="text"
                style="width: 100%; font-size: 100%;" placeholder="Detraccion"
                v-model="customer.detraccion">
          </td>
          <td style="width: 10%" class="text-right">
            <button class="btn btn-sm" style="height: 28px;">
              <i class="fa fa-trash-alt"></i>
            </button>
            <button class="btn btn-sm"  style="height: 28px;"
                    @click="functionCustomerSave(customer)">
              <i class="fa fa-edit"></i> Add
            </button>
          </td>
        </tr>

				<tr v-for="item in filteredList">
					<td>
						<span v-show="item.tipo == 6">RUC</span>
						<span v-show="item.tipo == 1">DNI</span>
					</td>
					<td>{{item.ruc_dni}}</td>
					<td>{{item.razon_social.slice(0,40)}} </td>
					<td>{{item.direccion_fiscal}} </td>
					<td>{{item.email_principal}} </td>
					<td>{{item.telefonos}} </td>
					<td>
						<a href="#" v-on:click="modal_edit(item.id)">Editar</a> |
						<a href="#" v-on:click="modal_delete(item.id)">Borrar</a>
					</td>
				</tr>

			</table>

			<!-- Modal Nuevo -->
			<?php /*include './_modal_nuevo.php'*/ ?>

			<!-- Modal Edit -->
			<?php /*include './_customer_modal_edit.php'*/ ?>

			<!-- Modal Delete -->
			<?php /*include './_modal_delete.php'*/ ?>

		</div>
	</div>

</div>

<!-- Javascript -->
<?php include __DIR__.'/clienteJs.php' ?>

<?php include '../../layout/footer.php'; ?>