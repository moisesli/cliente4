<div class="modal fade" id="modal_categories" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">

        <h4 class="modal-title">
          Categorias de Productos
          <small>
            <a href="#" v-on:click="categories_new=!categories_new">Nuevo</a>
          </small>
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
      <div class="modal-body">

        <table class="table table-sm table-striped">

          <tr>
            <th class="text-left">#</th>
            <th class="text-left">Descripcion</th>
            <th class="text-right">Acciones</th>
          </tr>

          <!-- Nuevo -->
          <tr v-if="categories_new">
            <td>0</td>
            <td class="m-0 p-0 align-middle">
              <input type="text"
                     v-model="categories_new_descripcion"
                     style="width: 100%;"
                     v-on:keyup.13="categories_new_save"
                     placeholder="Nombre Categoria">
            </td>
            <td class="text-right">
              <a href="#" v-on:click="categories_new_save()">Guardar</a>
            </td>
          </tr>
          <!-- END Nuevo -->

          <tr v-for="(category,index) in categories">
            <td >{{index + 1}}</td>
            <td width="70%"  class="m-0 p-0 align-middle">
              <span v-if="category.edit">{{category.descripcion.substring(0, 40)}}</span>
              <input type="text"
                     v-if="!category.edit"
                     v-model="category.descripcion"
                     v-on:keyup.13="category_save(category)"
                     style="width: 100%;">
            </td>
            <td class="text-right">
              <a href="#" v-if="category.edit" v-on:click="category_edit(category)">Editar</a>
              <a href="#" v-if="!category.edit" v-on:click="category_save(category)">Guardar</a>
            </td>
          </tr>

        </table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Salir</button>
      </div>
    </div>
  </div>
</div>