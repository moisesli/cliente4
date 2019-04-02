<?php



  session_start();
  include '../config/conn.php';

  $local_id = $_GET['local_id'];

  $local = "select * from locales where id=$local_id";
  $local = $conn->query($local)->fetch_array(MYSQLI_ASSOC);


  $_SESSION['local_id'] = $local['id'];
  $_SESSION['local_descripcion'] = $local['descripcion'];

  //views/invoices/index.php
  header("Location: /views/invoices/index.php");
  die();

?>