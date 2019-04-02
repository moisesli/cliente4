<?php 

  // conexion mysq;
  include __DIR__.'/../config/conn.php';

  // get variables
  $id = $_GET['localId'];
  $type = $_GET['serieType'];

  // query
  $sql = "select series.id, series.type, series.serie, localesseries.defecto 
          from localesseries 
          join series on serie_id = series.id where local_id=$id and series.type='$type'";
  $sql = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);

  // result
  echo json_encode($sql);

?>