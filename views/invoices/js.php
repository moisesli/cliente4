<script type="module">
<?php
date_default_timezone_set('America/Lima');
include __DIR__.'/../../config/const.php';
?>
var app = new Vue({
  el: "#app",
  data: {
    documentos: [],
    temp: {
      tipDoc: '',       // Factura, Boleta, Credito, Debito
      tipDocAbre: '',   // F,B,C,D
      newEdit: '',      // New, Edit
      modalTitle: '',
      dniRucList: '',
      nombreDniRuc: '',
      serieList: '',
      productList: '',   // item list temporal
      documentoNumero: '',
      enviando: '', // si: enviando, no: no enviando
      fecha: '<?php echo date('Y').'-'.date('m').'-'.date('d') ?>',
      nombre: '',
      emisorId: '<?php echo $_SESSION['emisor_id'] ?>',
      localId: '<?php echo $_SESSION['local_id'] ?>',
      listPreResumen: {},
      listTickets: {},
      documentoSerieListFacturas: <?php echo $_SESSION['documentoSerieListFacturas'] ?>,
      documentoSerieListBoletas: <?php echo $_SESSION['documentoSerieListBoletas'] ?>,
      emisorRuc: <?php echo $_SESSION['ruc'] ?>
    },    
    documento:{},
    docs: [],
    doc: {},
    documento_temp: {},
    tempUso: '',
    tempEdit: ''
  },
  methods: {
    docList: function(){
      axios.get(`../../api/docList.php?emisor_ruc=${this.temp.emisorRuc}&local_id=${this.temp.localId}&fecha=${this.temp.fecha}&nombre=`).then(response=>{
        this.documentos = response.data;
        /*console.log(this.documentos);*/
      });
    },
    modalResumen: function(){

      // Lista de Json Boletas
      axios.get(`../../api/getJsonResumen.php?fecha=${this.temp.fecha}`).then(response => {
        this.temp.listPreResumen = response.data;
        // console.log(JSON.stringify(response.data));
      })

      // Lista los Tikets
      this.listTickets();

      console.log(this.temp.fecha);

      $('#modalResumen').modal('show')
    },
    listTickets: function(){
      // Lista de Resumenes enviados
      axios.get(`../../api/listTickets.php?fecha=${this.temp.fecha}`).then(response => {
        // Almacena variable resumenes
        this.temp.listTickets = response.data;
        console.log(this.temp.listTickets);
      })
    },
    saveResumen: function(){
      axios.post(`../../api/saveResumen.php`,this.temp.listPreResumen).then(response => {
        // console.log(response.data);
        this.listTickets();
      })
      // console.log(this.temp.listPreResumen);
    },
    modal: function(documentoNuevo,documentoTipo,documentoSerie,documentoNumero){
      /**
       * Modal Datos :
       * **************
       * documentoNuevo
       * documentoNumero
       * documentoTipo
       * documentoSerie
       */
      axios.get(`../../api/docJson.php?documentoNuevo=${documentoNuevo}&documentoNumero=${documentoNumero}&documentoTipo=${documentoTipo}&documentoSerie=${documentoSerie}`).then(json => {
        this.doc = json.data
      })
      $('#modal').modal('show');
    },
    searchCustom: function(fechaNombre,custom){
      if (custom == 'fecha'){
        this.temp.nombre = '';
      }else if (custom == 'nombre' && fechaNombre.length > 1){
        this.temp.fecha = '';
      }else if (custom == 'nombre' && fechaNombre.length == 0){
        this.temp.fecha = '<?php echo date('Y').'-'.date('m').'-'.date('d') ?>';
        this.temp.nombre = '';
      }
      axios.get(`../../api/docList.php?emisor_ruc=${this.temp.emisorRuc}&local_id=${this.temp.localId}&fecha=${this.temp.fecha}&nombre=${fechaNombre}`).then(response=>{
        this.documentos = response.data;
        // console.log(response.data);
      });
    },
    saveNew: function (){
      this.temp.enviando = 'si';
      axios.post(`../../api/saveDocument.php`,this.doc).then(response => {
        /*console.log(this.doc);*/
        this.temp.enviando = '';
        this.docList();
        $('#modal').modal('hide');
        console.log(response.data);
      })
    },    
    editItem: function (item) {
      item.unidad = 'NIU';
      item.igv = (item.cantidad * item.precioConIgv*0.18).toFixed(2);
      item.total = (item.cantidad*item.precioConIgv).toFixed(2);
      item.subtotal = (item.cantidad*item.precioConIgv*0.82).toFixed(2);
      this.totales();
    },
    totales: function (){
      // Gravadas
      this.doc.documentoGravada = this.doc.items.reduce(function (gravada, item) {
        return ((gravada*10 + Number(item.subtotal)*10)/10).toFixed(2);
      }, 0.00 );
      // IGV
      this.doc.documentoIgv = this.doc.items.reduce(function (igv, item) {
        return ((igv*10 + Number(item.igv)*10)/10).toFixed(2);
      }, 0.00 );
      // Total
      this.doc.documentoTotal = this.doc.items.reduce(function (total, item) {
        return ((total*10 + Number(item.total)*10)/10).toFixed(2);
      }, 0.00 );      
    },
    productList: function (item) {
      // console.log(item.itemDescripcion);
      axios.get('../../api/buscaCodigoDescripcion.php?q=' + item.descripcionCodigo).then(response => {

        if (response.data[0].lista == 'unoIgual') {
          // se envia uno y es igual

          // variables 
          item.codigo = response.data[0].codigo;
          item.descripcion = response.data[0].descripcion;
          item.cantidad = '1';          
          item.precioConIgv = item.total = response.data[0].precio_con_igv;
          item.precioSinIgv = (response.data[0].precio_con_igv*0.82).toFixed(2);
          item.descuento = '0.00';
          item.igv = (parseFloat(response.data[0].precio_con_igv)*(0.18)).toFixed(2);
          item.subtotal = (item.precioConIgv*0.82).toFixed(2);

          this.totales();
          this.temp.productList = null;

        }else if(response.data[0].lista == 'ceroNinguno'){
          // se envia uno y no hay ninguna coincidedncia
          this.temp.productList = null;

        }else{
          // hay mas de una coincidencia
          this.temp.productList = response.data;
        }
      });
      
    },
    dniRucList: function (dniRuc){
      if (dniRuc.length == 8 || dniRuc.length == 11){
        // Cuando sale 8 u 11 busca y pone null la lista
        axios.get('../../api/dniRucList.php?q='+dniRuc).then(response => {        
          this.doc.clienteRazon = response.data[0].razon_social;
          // va poner si osi el tipo siempre que se escriba no importa si busca igual
          this.doc.clienteTipo = response.data[0].tipo;
        });
        this.temp.dniRucList = null;
      }else{
        // Cuando la cantidad de numeros es otro hace list por si hay
        axios.get('../../api/dniRucList.php?q='+dniRuc).then(response => {
          this.temp.dniRucList = response.data;
          this.doc.clienteRazon = '';
        });
      }      
    },
    addItem: function (params) {
      this.doc.items.push({
        codigo: '',     // ARR0045GTR
        descripcion: '',// Arroz Costeño Graneadito 5 Kg
        unidad: '',     // ZZ, UZ
        cantidad: '',   // 12
        igv: '',        // 36.00
        precioConIgv: '',     // 200
        precioSinIgv: '',
        descuento: '',  // 0.00
        subtotal: '',   // 164.00
        total: ''       // 200.00
      });
    },    
    reniecSunatDniRuc: function (documentoDniRuc,documentotipo){      
      // Si es Dni
      axios.get('../../api/reniecDniRuc.php?dniRuc=' + documentoDniRuc).then(response => {
        this.doc.clienteRazon = response.data.nombre;
        this.doc.clienteDireccion = response.data.direccion;
        // console.log(response.data);
      });      
    }
  },
  created: function () {
    this.docList();
  }
});
</script>
