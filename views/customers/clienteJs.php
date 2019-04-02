<script>
  var app = new Vue({
    el: "#app",
    data: {
      clienteNew: 'no',
      estado_extraer: false,
      ruc_dni: '',
      razon_nombre: '',
      search: '',
      tipo: '',
      customers: [],
      customer: {
        rucDni: '',
        razonSocial: '',
        direccion: '',
        email: '',
        telefono: '',
        detraccion: '',
        detalles: ''
      }
    },
    methods: {
      functionClienteNew: function(clienteNew){
        if (clienteNew == 'no'){
          this.clienteNew = 'si';
        }else{
          this.clienteNew = 'no';
        }
      },
      functionCustomerSave: function(customer){
        console.log(customer);
      },
      extraer: function() {
        this.estado_extraer = true;
        axios.post('../../api/extraer_ruc_dni.php?ruc_dni='+this.ruc_dni).then(response => {
          this.razon_nombre = response.data.result.razon_social;
          this.estado_extraer = false;
          // Comprueba el tipo Ruc o dni
          if (this.ruc_dni.length == 8) {
            this.tipo = 1;
          }else if(this.ruc_dni.length == 11){
            this.tipo = 6;
          }
        });
      },
      get_customers: function(){
        axios.get('../../api/get_customers.php').then(response => {
          this.customers = response.data;
        });
      }
    },
    created: function(){
      this.get_customers();
    },
    computed: {
      filteredList() {
        return this.customers.filter(item => {
          return item.razon_social.toLowerCase().includes(this.search.toLowerCase()) ||
            item.ruc_dni.toLowerCase().includes(this.search.toLowerCase());
        })
      }
    }
  });
</script>