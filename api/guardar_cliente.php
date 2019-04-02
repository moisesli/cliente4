<?php 

  include '../config/conn.php';
	$post = json_decode(file_get_contents('php://input'), true);
  $ruc_dni = $post['ruc_dni'];
  $razon_social = $post['razon_nombre'];
  $tipo = $post['tipo'];
  echo $ruc_dni;
  $insert = "insert into customers (ruc_dni,razon_social,tipo) values ('".$ruc_dni."','".$razon_social."','$tipo')";
  $conn->query($insert);
?>