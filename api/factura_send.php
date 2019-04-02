<?php

  // Impor conexion a la BD
  include '../config/conn.php';

  $post = json_decode(file_get_contents('php://input'), true);
  $id = $post['id'];

  // Extrae el documento
  $get_documento = $conn->query("select * from documentos where id=$id")->fetch_array(MYSQLI_ASSOC);

  // Envio de datos en formato json
  echo $get_documento['documento'];

?>