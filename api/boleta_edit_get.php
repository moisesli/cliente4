<?php

  include '../config/conn.php';
  $id = file_get_contents('php://input');
  $documento = $conn->query("select * from cliente.documentos where id=$id")->fetch_array(MYSQLI_ASSOC);
  $documento_temp = json_decode($documento['documento'],true);
  $documento_temp['id'] = $documento['id'];
  //echo $documento['id'];
  echo json_encode($documento_temp);
?>