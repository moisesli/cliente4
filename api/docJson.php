<?php

  /**
   * Json: Factura Boleta Credito Debito Resumen
   */

  date_default_timezone_set('America/Lima');
  include '../config/conn.php';
  session_start();

  // variables get
  $documento['documentoTipo'] = $_GET['documentoTipo'];
  $documento['documentoNuevo'] = $_GET['documentoNuevo'];
  $documento['documentoSerie'] = $_GET['documentoSerie'];
  $documento['documentoNumero'] = $_GET['documentoNumero'];

  $documento['emisorLocal'] = $_SESSION['local_id'];
  $documento['emisorUsername'] = 'AMLO11';
  $documento['emisorPassword'] = 'moiseslinar3s';
  $documento['emisorRuc'] = $_SESSION['ruc'];

  if ($documento['documentoNuevo'] == 'nuevo' && $documento['documentoTipo'] == '01'){

    $documento['emisorGenerar'] = 'factura';
    $documento['documentoTitulo'] = 'Factura';
    $documento['documentoSerie'] = $_SESSION['F']; // default


  }elseif ($documento['documentoNuevo'] == 'nuevo' && $documento['documentoTipo'] == '03'){
    $documento['emisorGenerar'] = 'boleta';
    $documento['documentoTitulo'] = 'Boleta';
    $documento['documentoSerie'] = $_SESSION['B']; // default
  }

  $documento['documentoNumero'] = documentoNumero($_SESSION['emisor_id'],$documento['documentoSerie']);
  $documento['documentoLetras'] = '';
  $documento['documentoFecha'] = date('Y-m-d');
  $documento['documentoMoneda'] = 'PEN';
  $documento['documentoOperacion'] = '1';
  $documento['clienteTipo'] = '';
  $documento['clienteDniRuc'] = '';
  $documento['clienteRazon'] = '';
  $documento['clienteDireccion'] = '';

  // Items
  $documento['items'][0]['codigo'] = '';
  $documento['items'][0]['descripcionCodigo'] = '';
  $documento['items'][0]['descripcion'] = '';
  $documento['items'][0]['unidad'] = '';
  $documento['items'][0]['cantidad'] = '';
  $documento['items'][0]['igv'] = '';
  $documento['items'][0]['precioConIgv'] = '';
  $documento['items'][0]['precioSinIgv'] = '';
  $documento['items'][0]['descuento'] = '';
  $documento['items'][0]['subtotal'] = '';
  $documento['items'][0]['total'] = '';

  // Totales
  $documento['documentoInafecta'] = '';
  $documento['documentoAnticipo'] = '';
  $documento['documentoExonerada'] = '';
  $documento['documentoGravada'] = '0.00';
  $documento['documentoIgv'] = '0.00';
  $documento['documentoGratuito'] = '';
  $documento['documentoOtros'] = '';
  $documento['documentoDescuento'] = '';
  $documento['documentoTotal'] = '0.00';
  $documento['respuestaEnviado'] = '';
  $documento['respuestaPdf'] = '';
  $documento['respuestaXml'] = '';
  $documento['respuestaCdr'] = '';
  $documento['respuestaMensaje'] = '';

  echo json_encode($documento);

  function documentoNumero ($emisorId,$documentoSerie){
    global $conn;
    $sqlNumero = "select number from series where emisor_id='$emisorId' and serie ='$documentoSerie'";
    $sqlNumero = $conn->query($sqlNumero)->fetch_array(MYSQLI_ASSOC);
    $sqlNumero = $sqlNumero['number'] + 1;
    return "$sqlNumero";
//    $documento['documentoNumero'] = "$sqlNumero";
  }


?>