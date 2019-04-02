<?php

  // Conexion
  include '../config/conn.php';

  $post = json_decode(file_get_contents('php://input'), true);

  // Datos Recoge de Post
  $id           = $post['id'];
  $ruc_dni      = $post['ruc_dni'];
  $razon_social = $post['razon_social'];
  $tipo         = $post['tipo'];

  $update = "update customers set ruc_dni='$ruc_dni', razon_social='$razon_social', tipo='$tipo' where id=$id";
  $conn->query($update);

?>