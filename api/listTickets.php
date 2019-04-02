<?php

  include '../config/conn.php';

//  $post = json_decode(file_get_contents('php://input'), true);
  session_start();
  $fechaEmision = $_GET['fecha'];
  $emisorRuc = $_SESSION['ruc'];
  $localId = $_SESSION['local_id'];



  $resumenes = "select resumen from resumenes where   
                                json_extract(resumen,'$.emisorRuc') = '$emisorRuc' and
                                json_extract(resumen,'$.localId') = '$localId' and
                                json_extract(resumen,'$.fechaEmision') = '$fechaEmision'
                                order by json_extract(resumen,'$.respuestaCorrelativo'), json_extract(resumen,'$.fechaEnviado') Desc";
  $resumenes = $conn->query($resumenes)->fetch_all(MYSQLI_ASSOC);


  foreach ($resumenes as $index => $resumen){
    $resumenes[$index] = json_decode($resumen['resumen']);
  }

  //  print_r($resumenes);
  echo json_encode($resumenes);

?>