<?php include '../config/validate.php'; ?>
<?php include '../layout/header.php'; ?>
<div class="container" id="app">
  <div class="row justify-content-center">
    <div class="col-sm-11 py-5">
      <h2 class="text-center pb-">Nueva Factura Electrónica</h2>

      <!-- Formulario -->
      <div class="row">

        <!-- TOTALES DE FACTURA -->
        <!-- ****************** -->
        <div class="col-md-3 order-md-2 mb-4">
          <!-- totales -->
          <?php include './_totales.php' ?>          
        </div>

        <div class="col-md-9 pt-4">
          <h4 class="mb-3">Datos de la Factura</h4>

          <!-- Formulario -->
          <?php include './_formulario.php' ?>

          <!-- Modal Cliente -->
          <?php include './_modal_cliente.php' ?>

          <!-- Modal Producto -->
          <?php include './_modal_producto.php' ?>

        </div>
      </div>
    </div>
  </div>
</div>
<script>
  var app = new Vue({
    el: '#app',
    data: {
      invoice: {
        cliente: '',
        cliente_id: '',
        items: [
          {
            producto: '',
            total: ''
          }

          ],
        total: ''
      }
    },
    watch: {
      totales: function () {
        return this.invoice.items.reduce(
          function (total, item) {
            return total + Number(item.total);
          },
          0
        );
      }
    },
    methods: {
      cliente: function () {
        //activa el modal
        this.invoice.cliente = 'Abraham Moises.. - 01425162531';
        this.invoice.cliente_id = 5;
        $("#modal_cliente").modal('show');
      },
      enviar_factura: function () {
        console.log(this.invoice);
      },
      producto: function () {
        $("#modal_producto").modal('show');
      },
      add_producto: function () {
        this.invoice.items.push({
          producto: 'segundo',
          total: ''
        });
      },
      send_item: function (index,item) {
        console.log(index);
      },
      sumatotal: function () {
        return this.invoice.items.reduce(function (total, item) { return total + Number(item.total);}, 0 );
        // https://www.youtube.com/watch?v=dink4fgmF9Q
      }
    }

  });
</script>
<?php include '../layout/footer.php'; ?>
