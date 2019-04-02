<script>
  var app = new Vue({
    el: "#app",
    data: {
      products: [],
      products_new: 'no',
      categories: [],
      categories_new: false,
      categories_new_descripcion: '',
      search: '',
      product: {
        codigo: '',
        descripcion: '',
        precio_con_igv: '',
        unidad: '',
        producto_stock_cantidad: '',
        moneda: '',
        pro_ser: '',
        igv_tipo: '',
        categoria_id: '',
        producto_stock_id: ''
      },
      editProductos: {}
    },
    methods: {
      products_new_state: function(product_new){
        if (product_new == 'no'){
          this.product.codigo = '';
          this.product.descripcion = '';
          this.product.precio_con_igv = '';
          this.product.unidad = '1';
          this.product.producto_stock_cantidad = '1';
          this.product.moneda = 'PEN';
          this.product.pro_ser = 'NIU';
          this.product.categoria_id = '12';
          this.product.igv_tipo = '10';
          this.products_new = 'si';
        }else if (product_new == 'si'){
          this.products_new = 'no';
        }
        /*this.product = {};*/
      },
      productDelete: function(product){
        axios.post('../../api/productos/productDelete.php', product).then(response => {
          this.products_list();
        })
      },
      products_new_add: function(){
        axios.post('../../api/products_save_new.php',this.product).then(response => {
          console.log(response.data);
          this.products_list();
          this.products_new = 'no';
        });
      },
      productoEditSimple: function(product_filter){
        if (product_filter.edit == 'no'){
          product_filter.edit = 'si';
        }else{
          axios.post(`../../api/productos/productoUpdate.php`,product_filter).then(response => {
            console.log(response.data);
            this.products_list();
          })
          product_filter.edit = 'no';
        }
      },
      modalProductoEditAdvanced: function(productoId){
        $('#modalProductoEditAdvanced').modal('show');
        axios.get(`../../api/productos/getUpdateProducto.php?id=${productoId}`).then(response => {
          this.editProductos = response.data;
          // console.log(response.data);
        });
      },
      modalProductoSaveAdvanced: function(editProductos){
        console.log(editProductos);
      },
/*      products_save: function(product){
        product.edit = true;
        axios.post('../../api/products_update.php',product).then(response => {
          this.products_list();
        });
      },
      new_product: function () {
        $('#new_product').modal('show');
      },*/
      products_list: function () {
        axios.get('../../api/product_list.php').then(response => {
          this.products = response.data;
          // console.log(response.data)
        });
      },
/*      save_product: function () {
        axios.post('../../api/product_save_new.php', this.product).then(response => {
          $('#new_product').modal('hide');
          this.producto = '';
        });
        $.getJSON('',function () {

        })
      },*/
      categories_modal: function () {
        $('#modal_categories').modal('show');
        this.categories_get_list();
      },
      categories_get_list: function () {
        axios.get('../../api/categories_get_list.php').then(response => {
          this.categories = response.data;
          /*console.log(response.data);*/
        });
      },
      categories_new_save: function () {
        axios.post('../../api/categories_new_save.php',this.categories_new_descripcion).then(response => {
          this.categories_get_list();
          this.categories_new = false;
          this.categories_new_descripcion = '';
        });
      },
      category_edit: function(category){
        category.edit = false;
      },
      category_save: function (category) {
        category.edit = true;
        axios.post('../../api/categories_update.php',category).then(response => {
          this.categories_get_list();
        });
      }
    },
    created: function () {
      this.categories_get_list();
      this.products_list();
    },
    computed: {
      products_filtro() {
        return this.products.filter(product_filter => {
          return product_filter.codigo.toLowerCase().includes(this.search.toLowerCase()) ||
            product_filter.descripcion.toLowerCase().includes(this.search.toLowerCase())
        })
      }
    }
  });
</script>