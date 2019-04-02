<?php

  date_default_timezone_set('America/Lima');
  include '../config/conn.php';
  session_start();
  $fecha = $_GET['fecha'];
  $emisorRuc = $_SESSION['ruc'];
  $boletas = "select 
    json_unquote(json_extract(documento,'$.documentoFecha')) as fecha,
    json_unquote(json_extract(documento,'$.documentoTipo')) as documentoTipo,
    json_unquote(json_extract(documento,'$.documentoSerie')) as documentoSerie,
    json_unquote(json_extract(documento,'$.documentoNumero')) as documentoNumero,
    json_unquote(json_extract(documento,'$.documentoMoneda')) as moneda,
    json_unquote(json_extract(documento,'$.clienteTipo')) as clienteTipo,
    json_unquote(json_extract(documento,'$.clienteDniRuc')) as clienteDniRuc,
    json_unquote(json_extract(documento,'$.clienteRazon')) as clienteRazon,
    json_unquote(json_extract(documento,'$.documentoGravada')) as documentoGravada,
    json_unquote(json_extract(documento,'$.documentoIgv')) as documentoIgv,
    json_unquote(json_extract(documento,'$.documentoTotal')) as documentoTotal,
    json_unquote(json_extract(documento,'$.respuestaEnviado')) as respuestaEnviado
  from documentos where  json_extract(documento,'$.documentoFecha') = '$fecha' and
                                              json_extract(documento,'$.documentoTipo') = '03' and
                                              json_extract(documento,'$.respuestaEnviado') = 'no' and
                                              json_extract(documento,'$.respuestaXml') != '' and
                                              json_extract(documento,'$.respuestaPdf') != '' and
                                              json_extract(documento,'$.emisorRuc') = '$emisorRuc' and
                                              json_extract(documento,'$.emisorLocal') = '3'";
  $boletas = $conn->query($boletas)->fetch_all(MYSQLI_ASSOC);

  $resumen['emisorGenerar'] = 'resumen';
  $resumen['emisorUsername'] = 'AMLO11';
  $resumen['emisorRuc'] = $_SESSION['ruc'];
  $resumen['emisorPassword'] = 'moiseslinar3s';
  $resumen['emisorId'] = $_SESSION['emisor_id'];
  $resumen['localId'] = $_SESSION['local_id'];
  $resumen['fechaEmision'] = $fecha;
  $resumen['fechaGenerado'] = date('Y').'-'.date('m').'-'.date('d');

  $resumen['respuestaEnviado'] = '';
  $resumen['respuestaMensaje'] = '';
  $resumen['respuestaXml'] = '';
  $resumen['respuestaPdf'] = '';
  $resumen['respuestaNombre'] = '';
  $resumen['respuestaCorrelativo'] = '';

  foreach ($boletas as $index => $boleta){
    $resumen['items'][$index]['documentoTipo'] = $boleta['documentoTipo'];
    $resumen['items'][$index]['documentoSerie'] = $boleta['documentoSerie'];
    $resumen['items'][$index]['documentoNumero'] = $boleta['documentoNumero'];
    $resumen['items'][$index]['clienteTipo'] = $boleta['clienteTipo'];
    $resumen['items'][$index]['clienteDniRuc'] = $boleta['clienteDniRuc'];
    $resumen['items'][$index]['documentoGravada'] = $boleta['documentoGravada'];
    $resumen['items'][$index]['documentoIgv'] = $boleta['documentoIgv'];
    $resumen['items'][$index]['documentoTotal'] = $boleta['documentoTotal'];
  }
  echo json_encode($resumen);
  // print_r($resumen);

?>