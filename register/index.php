<?php include '../config/validate.php' ?>
<?php include '../layout/header.php'; ?>
<main class="container" id="app">

  <div class="row justify-content-center">
    <div class="col-sm-10 py-5">
      <img class="d-block mx-auto mb-4" src="/assets/img/bootstrap-solid.svg" alt="" width="72" height="72">
      <h2 class="text-center">Registro de Usuario {{message}}</h2>
      <p class="lead text-center pb-5">Below is an example form built entirely with Bootstrap's form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>

      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Pasos Registro</span>
            <span class="badge badge-secondary badge-pill">4</span>
          </h4>

          <!-- Pasos -->
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div class="text-success">
                <h6 class="my-0">Usuarios</h6>
                <small class="text-success">En proceso de Registro</small>
              </div>
              <span class="text-muted">0</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Emisor</h6>
                <small class="text-muted">Sin registrar</small>
              </div>
              <span class="text-muted">0</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Locales</h6>
                <small class="text-muted">Sin registrar</small>
              </div>
              <span class="text-muted">4</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Documentos</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">1</span>
            </li>
            <li class="list-group-item d-flex justify-content-between bg-light">
              <div>
                <h6 class="my-0">Series</h6>
                <small>Logo, colores</small>
              </div>
              <span class="text-muted">No</span>
            </li>
          </ul>
          <!-- End Pasos -->

        </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Llene los datos personales</h4>

          <!-- Form -->
          <form @submit.prevent="register()">

            <!-- Nombre -->
            <div class="mb-3">
              <label for="email">Nombre Completo</label>
              <input
                  type="text"
                  class="form-control form-control-lg"
                  v-bind:class="{'is-invalid':error.nombre}"
                  placeholder="Juan Perez Gutierrez"
                  v-model="datos.nombre">
              <div class="invalid-feedback" v-show="error.nombre">
                Este campo no puede estar vacio
              </div>
            </div>

            <!-- Telefono -->
            <div class="mb-3">
              <label for="email">Telefono</label>
              <input
                  type="text"
                  class="form-control form-control-lg"
                  v-bind:class="{'is-invalid':error.telefono}"
                  placeholder="952631806"
                  v-model="datos.telefono">
              <div class="invalid-feedback" v-show="error.telefono">
                Telefono no puede estar vacio.
              </div>
            </div>

            <!-- Email -->
            <div class="mb-3">
              <label>Email</label>
              <div class="input-group input-group-lg">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-at"></i></span>
                </div>
                <input 
                  type="email" 
                  class="form-control" 
                  placeholder="correo@gmail.com"
                  v-bind:class="{'is-invalid':error.email}"
                  v-model="datos.email">
                <div class="invalid-feedback" v-show="error.email">
                  Error en el email.
                </div>
              </div>
            </div>

            <!-- Contraseña -->
            <div class="row">
              <!-- contra 1 -->
              <div class="col-md-6 mb-3">
                <label for="firstName">Contraseña</label>
                <div class="input-group input-group-lg">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                  </div>
                  <input 
                    type="password" 
                    class="form-control" 
                    placeholder="**********"
                    v-bind:class="{'is-invalid':error.contra1}"
                    v-model="datos.contra1">
                  <div class="invalid-feedback" v-show="error.contra1">
                    Error en la conrtaseña.
                  </div>
                </div>
              </div>
              <!-- contra 2 -->
              <div class="col-md-6 mb-3">
                <label for="lastName">Repetir Contraseña</label>
                <div class="input-group input-group-lg">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                  </div>
                  <input 
                    type="password" 
                    class="form-control" 
                    placeholder="**********"
                    v-bind:class="{'is-invalid':error.contra2}"
                    v-model="datos.contra2">
                  <div class="invalid-feedback" v-show="error.contra2">
                    Error en la conrtaseña.
                  </div>
                </div>
              </div>
            </div>

            <!-- Ruc -->
            <div class="mb-3">
              <label for="username">RUC</label>
              <div class="input-group input-group-lg">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-check-circle"></i></span>
                </div>
                <input 
                  type="text" 
                  class="form-control" 
                  placeholder="12345678912"
                  v-bind:class="{'is-invalid':error.ruc}"
                  v-model="datos.ruc">
                <div class="invalid-feedback" v-show="error.ruc" style="width: 100%;">
                  Error en el RUC.
                </div>
              </div>
            </div>

            <hr class="mb-4">
            <button
                class="btn btn-primary btn-lg btn-block"
                :disabled="error.button_send"
                type="submit">
              <i class="fa fa-spinner fa-spin" v-show="error.button_send"></i>
              Registrarme</button>
          </form>
          <!-- End Form -->

        </div>
      </div>
    </div>
  </div>

</main>
<script>
  var app = new Vue({
    el: '#app',
    data: {
      message: 'moises',
      datos: {
        nombre: '',
        telefono: '',
        email: '',
        contra1: '',
        contra2: '',
        ruc: ''
      },
      error: {        
        nombre: false,
        telefono: false,
        email: false,
        contra1: false,
        contra2: false,
        ruc: false,
        button_send: false
      }
    },
    methods: {
      register: function () {

        //button send
        this.error.button_send = true;

        // Nombre
        if (this.datos.nombre.length < 3 ) {
          this.error.nombre = true;          
        }else{
          this.error.nombre = false;
        }

        // Telefono
        if (this.datos.telefono.length < 3 ) {
          this.error.telefono = true;
        }else{
          this.error.telefono = false;
        }

        // Email
        if (this.datos.email.length < 3 ) {
          this.error.email = true;
        }else{
          this.error.email = false;
        }

        // Contra 1
        if (this.datos.contra1.length < 3 ) {
            this.error.contra1 = true;
        }else{
            this.error.contra1 = false;
        }

        // Contra 2
        if (this.datos.contra2.length < 3 ) {
            this.error.contra2 = true;
        }else{
            this.error.contra2 = false;
        }

        // Ruc
        if (this.datos.ruc.length < 3 ) {
            this.error.ruc = true;
        }else{
            this.error.ruc = false;
        }

        // consulta
        if ((this.error.nombre == false) && (this.error.telefono == false) && (this.error.email == false) && (this.error.contra1 == false) && (this.error.contra2 == false) && (this.error.contra1 == this.error.contra2) && (this.error.ruc == false)) {
          axios.post('../api/check_ruc.php', this.datos).then(response => {
            if (response.data == true){
              this.error.ruc = false;
            }else{
              this.error.ruc = true;
            }
            console.log(response.data);
          });
        }
        this.error.button_send = false;
      }
    }
  });
</script>
<?php include '../layout/footer.php'; ?>