<?php


  // conexion
  $conn = new mysqli('localhost', 'root', 'moiseslinar3s', 'cliente');
  mysqli_set_charset($conn,"utf8");
  
  // error de conexion
  if ($conn->connect_errno) {
    echo "No se pudo conectar a la Base de Datos";
    exit;
  }
?>