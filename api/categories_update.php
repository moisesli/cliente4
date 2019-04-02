<?php
  include '../config/conn.php';

  $post = json_decode(file_get_contents('php://input'), true);
  $id = $post['id'];
  $descripcion = $post['descripcion'];
  echo $descripcion;
  $update = "update producto_categoria set descripcion='$descripcion' where id=$id";
  $conn->query($update);
?>