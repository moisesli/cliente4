<?php
  include '../config/conn.php';


  $descripcion = file_get_contents('php://input');
  $insert = "insert into producto_categoria (descripcion,edit) values ('".$descripcion."','false')";
  $conn->query($insert);

?>