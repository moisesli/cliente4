


// Factura 
//  $json =
//    '{
//      "documentoTipo": "01",
//      "documentoNuevo": "nuevo",
//      "documentoSerie": "F001",
//      "documentoNumero": 25,
//      "emisorLocal": "3",
//      "emisorUsername": "AMLO11",
//      "emisorPassword": "moiseslinar3s",
//      "emisorRuc": "20532710066",
//      "emisorGenerar": "factura",
//      "documentoTitulo": "Factura",
//      "documentoLetras": "",
//      "documentoFecha": "2019-02-20",
//      "documentoMoneda": "PEN",
//      "documentoOperacion": "1",
//      "clienteTipo": "6",
//      "clienteDniRuc": "20532710066",
//      "clienteRazon": "SUR MOTRIZ SOCIEDAD COMERCIAL DE RESPONSABILIDAD LIMITADA- SURMOTRIZ S.R.L.",
//      "clienteDireccion": "AV. LEGUIA NRO. 1870 (FRENTE A I.E. JOSE ROSA ARA) TACNA - TACNA - TACNA",
//      "items": [
//        {
//          "codigo": "ARROZ45",
//          "descripcionCodigo": "ARROZ45 - Arroz Costeño 5 KG clase 4 Bells",
//          "descripcion": "Arroz Costeño 5 KG clase 4 Bells",
//          "unidad": "",
//          "cantidad": "1",
//          "igv": "3.33",
//          "precioConIgv": "18.50",
//          "precioSinIgv": "15.17",
//          "descuento": "0.00",
//          "subtotal": "15.17",
//          "total": "18.50"
//        }
//      ],
//      "documentoInafecta": "",
//      "documentoAnticipo": "",
//      "documentoExonerada": "",
//      "documentoGravada": "15.17",
//      "documentoIgv": "3.33",
//      "documentoGratuito": "",
//      "documentoOtros": "",
//      "documentoDescuento": "",
//      "documentoTotal": "18.50",
//      "respuestaEnviado": "",
//      "respuestaPdf": "",
//      "respuestaXml": "",
//      "respuestaCdr": "",
//      "respuestaMensaje": ""
//    }';


// Resumen
//  $json =
//    '{
//      "emisorGenerar": "resumen",
//      "emisorUsername": "AMLO11",
//      "emisorPassword": "moiseslinar3s",
//      "emisorRuc": "20532710066",
//      "emisorId": "11",
//      "localId": "3",
//      "fechaEmision": "2019-02-14",
//      "fechaGenerado": "2019-02-19",
//      "items": [
//        {
//          "documentoTipo": "03",
//          "documentoSerie": "B001",
//          "documentoNumero": "16787",
//          "clienteTipo": "1",
//          "clienteDniRuc": "73904305",
//          "documentoGravada": "165.25",
//          "documentoIgv": "29.75",
//          "documentoTotal": "195.00"
//        },
//        {
//          "documentoTipo": "03",
//          "documentoSerie": "B001",
//          "documentoNumero": "16788",
//          "clienteTipo": "1",
//          "clienteDniRuc": "73904305",
//          "documentoGravada": "165.25",
//          "documentoIgv": "29.75",
//          "documentoTotal": "195.00"
//        }
//      ]
//    }';



<!-- Afectacion IGV -->
<!--          <td v-if="product_filter.edit" style="width: 10%">{{ product_filter.igv_afectacion_nombre.slice(23,37) }}</td>-->
<!--          <td v-if="!product_filter.edit" class="m-0 p-0 align-middle" style="width: 10%">-->
<!--            <select style="width: 100%; height: 100%; padding: 0; margin: 0; height: 30px;" v-model="product_filter.igv_afectacion">-->
<!--              <option value="10">10-Gravado - Operación Onerosa</option>-->
<!--              <option value="11">11-[Gratuita] Gravado – Retiro por premio</option>-->
<!--              <option value="12">12-[Gratuita] Gravado – Retiro por donación</option>-->
<!--              <option value="13">13-[Gratuita] Gravado – Retiro</option>-->
<!--              <option value="14">14-[Gratuita] Gravado – Retiro por publicidad</option>-->
<!--              <option value="15">15-[Gratuita] Gravado – Bonificaciones</option>-->
<!--              <option value="16">16-[Gratuita] Gravado – Retiro por entrega a trabajadores</option>-->
<!--              <option value="20">20-Exonerado - Operación Onerosa</option>-->
<!--              <option value="30">30-Inafecto - Operación Onerosa</option>-->
<!--              <option value="31">31-[Gratuita] Inafecto – Retiro por Bonificación</option>-->
<!--              <option value="32">32-[Gratuita] Inafecto – Retiro</option>-->
<!--              <option value="33">33-[Gratuita] Inafecto – Retiro por Muestras Médicas</option>-->
<!--              <option value="34">34-[Gratuita] Inafecto - Retiro por Convenio Colectivo</option>-->
<!--              <option value="35">35-[Gratuita] Inafecto – Retiro por premio</option>-->
<!--              <option value="36">36-[Gratuita] Inafecto - Retiro por publicidad</option>-->
<!--              <option value="40">40-Exportación</option>-->
<!--            </select>-->
<!--          </td>-->

factura_start: function() {
this.tempEdit = 'no';
Vue.set(this.documento,'id','');
this.documento.emisor_operacion = 'generar_factura';
Vue.set(this.documento,'emisor_user','AMLO11');
Vue.set(this.documento,"emisor_password","moiseslinar3s");
this.documento.emisor_id = '<?php echo $_SESSION['emisor_id'] ?>';
this.documento.emisor_local_id = '<?php echo $_SESSION['local_id'] ?>';
Vue.set(this.documento,'sunat','0');
this.documento.documento_tipo = '01';
this.documento.documento_serie = '<?php echo $_SESSION['F']?>';
axios.get('../../api/factura_get_serie_number.php').then(response =>{
Vue.set(this.documento,'documento_numero',''+response.data+'');
//this.documento.documento_numero = ''+response.data+'';
});
this.documento.documento_fecha_emision = '<?php echo date('d-m-Y') ?>';
this.documento.documento_moneda = 'PEN';
this.documento.documento_tipo_operacion = '1';
this.documento.cliente_identificacion_tipo = '';
this.documento.cliente_direccion = '';
this.documento.cliente_identificacion_numero = '';
this.documento.cliente_razon = '';
Vue.set(this.documento,'cliente_identificacion_numero_list','');
Vue.set(this.documento,'items',[
{
codigo: '',
descripcion: '',
unidad_de_medida: '',
producto_list: '',
cantidad: '',
igv: '0.00',
precio_unitario_sin_igv: '0.00',
precio_unitario_con_igv: '0.00',
descuento: '0.00',
subtotal: '0.00',
precio_venta: '0.00'
}
]);
Vue.set(this.documento,'documento_inafecta','');
Vue.set(this.documento,'documento_anticipo','');
Vue.set(this.documento,'documento_exonerada','');
Vue.set(this.documento,'documento_gravada','0.00');
Vue.set(this.documento,'documento_igv',0);
Vue.set(this.documento,'documento_gratuita','');
Vue.set(this.documento,'documento_otros_cargos','');
Vue.set(this.documento,'documento_descuento_total','');
Vue.set(this.documento,'documento_total','0.00');
Vue.set(this.documento,'respuestaEnviado','');
Vue.set(this.documento,'respuestaPdf','');
Vue.set(this.documento,'respuestaXml','');
Vue.set(this.documento,'respuestaCdr','');
Vue.set(this.documento,'respuestaMensaje','');
$('#factura_modal').modal('show');
},
factura_edit_view: function(id){
$('#factura_modal').modal('show');
axios.post('../../api/factura_edit_get.php',id).then(response => {
this.documento = response.data;
});
},
facturaEditSave: function(){
axios.post('../../api/factura_edit_save.php',this.documento).then(response => {
});
this.documentos_list();
},
factura_send: function(doc){
// Activa el estado en 2 que es enviando
doc.sunat = '2';
axios.post('http://localhost:8081/doc.php',doc).then(response => {
if (response.data.respuesta_enviado == 'si'){
doc.respuestaEnviado = response.data.respuesta_enviado;
doc.respuestaPdf = response.data.respuesta_pdf;
doc.respuestaXml = response.data.respuesta_xml;
doc.respuestaMensaje = response.data.respuesta_mensaje;
// console.log(doc);
axios.post('../../api/factura-send-update.php',doc).then(respuesta => {
this.documentos_list();
console.log(respuesta.data);
})
}
doc.sunat = '0';
});

//console.log(doc);
},
facturaGuardar: function () {
this.tempUso = 'si';
// Delete temp list
delete this.documento.cliente_identificacion_numero_list;
this.documento.items.forEach(function (item,index,arreglo) {
delete arreglo[index].producto_list;
});

// Save Factura New
axios.post('../../api/factura_safve.php',JSON.stringify(this.documento)).then(facturaNew => {
this.documentos_list();
this.documento.id = facturaNew.data;
axios.post('http://localhost:8081/doc.php',this.documento).then(response => {
this.documento.respuestaEnviado = response.data.respuesta_enviado;
this.documento.respuestaPdf = response.data.respuesta_pdf;
this.documento.respuestaXml = response.data.respuesta_xml;
this.documento.respuestaCdr = response.data.respuesta_cdr;
this.documento.respuestaMensaje = response.data.respuesta_mensaje;
axios.post('../../api/factura-send-update.php',this.documento).then(respuesta => {
this.tempUso = '';
$('#factura_modal').modal('hide');
this.documentos_list();
});

});

});

},
factura_item_new: function () {
this.documento.items.push({
codigo: '',
descripcion: '',
unidad_de_medida: '',
producto_list: '',
cantidad: 0,
igv: '0.00',
precio_unitario_sin_igv: '0.00',
precio_unitario_con_igv: '0.00',
descuento: 0,
subtotal: 0,
precio_venta: 0
});
},
factura_item_delete: function (index) {
this.documento.items.splice(index,1)
//console.log('removio item '+index);
},
factura_item_cantidad: function (item) {
if (item.cantidad == ''){
item.igv = 0;
item.precio_venta = '';
item.subtotal = '';
}else{
item.igv = (item.cantidad * item.precio_unitario_con_igv*0.18).toFixed(2);
item.precio_venta = (item.cantidad*item.precio_unitario_con_igv).toFixed(2);
item.subtotal = (item.cantidad*item.precio_unitario_con_igv*0.82).toFixed(2);
}
this.factura_totales_suma();
},
factura_item_unitario: function (item) {
if (item.precio_con_igv == ''){
item.precio_venta = '';
item.subtotal = '';
item.igv = '';
}else{
item.igv = (item.precio_unitario_con_igv*0.18).toFixed(2);
item.precio_venta = (item.cantidad*item.precio_unitario_con_igv).toFixed(2);
item.subtotal = (item.cantidad*item.precio_unitario_con_igv*0.82).toFixed(2);
}
this.factura_totales_suma();
},
factura_cliente_identificacion_numero_list: function (identificacion) {
//console.log(identificacion);
axios.get('../../api/factura_search_dni_ruc.php?q='+identificacion).then(response=>{
if(this.documento.cliente_identificacion_numero == response.data[0].ruc_dni){
this.documento.cliente_identificacion_numero_list = {};
this.documento.cliente_razon = response.data[0].razon_social;
if (this.documento.cliente_identificacion_numero.length == 8){
this.documento.cliente_identificacion_tipo = '1';
}else if (this.documento.cliente_identificacion_numero.length == 11){
this.documento.cliente_identificacion_tipo = '6';
}
}else if (this.documento.cliente_identificacion_numero != response.data[0].ruc_dni) {
this.documento.cliente_identificacion_numero_list = response.data;
}
});
},
factura_totales_suma: function () {
// Gravadas
this.documento.documento_gravada = this.documento.items.reduce(function (gravada, item) {
return ((gravada*10 + Number(item.subtotal)*10)/10).toFixed(2);
}, 0.00 );
// IGV
this.documento.documento_igv = this.documento.items.reduce(function (igv, item) {
return ((igv*10 + Number(item.igv)*10)/10).toFixed(2);
}, 0.00 );
// Total
this.documento.documento_total = this.documento.items.reduce(function (total, item) {
return ((total*10 + Number(item.precio_venta)*10)/10).toFixed(2);
}, 0.00 );
}


{'btn-outline-secondary': sunatClassNoEnviado(doc.respuestaEnviado), 'btn-info': sunatClassSiEnviado(doc.respuestaEnviado)}