<?php
  
  // emisorId: 11
  // localId: 3¡
  date_default_timezone_set('America/Lima');
  include '../config/conn.php';
  session_start();
  $emisorRuc = $_GET['emisor_ruc'];
  $emisorLocal = $_GET['local_id'];
  $documentoFecha = $_GET['fecha'];
  $nombre = $_GET['nombre'];

  if (strlen($_GET['fecha']) > 3){
    $documentos = "select * from documentos 
                            where  
                                json_extract(documento,'$.documentoFecha') = '$documentoFecha' and
                                json_extract(documento,'$.emisorRuc') = '$emisorRuc' and
                                json_extract(documento,'$.emisorLocal') = '$emisorLocal'
                                order by json_extract(documento,'$.documentoNumero') DESC";
  }else {
    $documentos = "select * from documentos where  lower(concat(
                                            JSON_EXTRACT(documento,'$.documentoSerie'),
                                            JSON_EXTRACT(documento,'$.documentoNumero'),
                                            JSON_EXTRACT(documento,'$.clienteDniRuc'),
                                            JSON_EXTRACT(documento,'$.clienteRazon')
                                      ))
                                like lower('%$nombre%') and
                                json_extract(documento,'$.emisorRuc') = '$emisorRuc' and
                                json_extract(documento,'$.emisorLocal') = '$emisorLocal'";
  }

  $documentos = $conn->query($documentos)->fetch_all(MYSQLI_ASSOC);

  //print_r($documentos);

  foreach ($documentos as $index => $invoices){
    $temp_documentos = json_decode($invoices['documento'],true);

    //Tipo de documento en letras (factura,boleta,credito,debito)
    if ($temp_documentos['documentoTipo'] == '01'){
      $temp_documentos['documentoTipo_'] = 'Factura';
    }elseif ($temp_documentos['documentoTipo'] == '03'){
      $temp_documentos['documentoTipo_'] = 'Boleta';
    }

    $documentos[$index] = $temp_documentos;
  }
  echo json_encode($documentos);
  //print_r($documentos);

?>