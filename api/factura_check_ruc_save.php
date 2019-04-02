<?php
  require_once("../vendor/autoload.php");
  require_once("../config/conn.php");
  $cliente = new \Sunat\Sunat();
  $datos = $cliente->search('10425162531');
  print_r($datos)
?>