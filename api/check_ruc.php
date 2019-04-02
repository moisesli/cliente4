<?php

  require_once("../vendor/autoload.php");
  require_once("../config/conn.php");
  $cliente = new \Sunat\Sunat();

  // datos post
  $post = json_decode(file_get_contents('php://input'), true);
  $nombre = $post['nombre'];
  $email = $post['email'];
  $password = $post['contra1'];
  $ruc = $post['ruc'];


  // reniec consult ruc
  $datos = $cliente->search($ruc);
  $sunat_ruc = $datos['result']['RUC'];
  $sunat_razon_social = $datos['result']['RazonSocial'];
  $sunat_razon_comercial = $datos['result']['NombreComercial'];
  $sunat_direccion = $datos['result']['Direccion'];

  // si existe el ruc
  if ($datos['success'] == 'true'){
    $ruc_count = $conn->query("select count(*) counte from users where ruc='$ruc'")->fetch_array(MYSQLI_ASSOC);
    // si es nuevo ruc en la bd
    if ($ruc_count['counte'] == 0){

      // crear usuario (para agregar id al local)
      $create_user = "insert into users (nombre,email,password) values ('$nombre','$email','$password')";
      $conn->query($create_user);
      $create_user_id = $conn->insert_id;

      // crear emisor1
      $create_emisor = "insert into emisores (ruc,razon_social,razon_comercial) values ('$sunat_ruc','$sunat_razon_social','$sunat_razon_comercial')";
      $conn->query($create_emisor);
      $create_emisor_id = $conn->insert_id;

      // crear local      
      $create_local = "insert into locales (codigo,descripcion,direccion,emisor_id) values ('001','$sunat_razon_social','$sunat_direccion','$create_emisor_id')";
      $conn->query($create_local);
      $create_local_id = $conn->insert_id;

      // crear series (asociadas a local)
      $default_factura  = 'F001';
      $default_boleta   = 'B001' ;
      $default_nota_credito_factura = 'FC01';
      $default_nota_credito_boleta = 'BC01';
      $default_nota_debito_factura = 'FD01';
      $default_nota_debito_boleta = 'BD01';
      $default_guia_remision = 'T001';

      $create_series = "insert into series (serie,type,emisor_id) values ('$default_factura','1','$create_local_id')";
      $conn->query($create_series);      

      echo json_encode($datos);
    }else{
      echo 'false';
    }
  }else{
    echo 'false';
  }


?>