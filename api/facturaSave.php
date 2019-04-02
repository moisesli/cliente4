<?php

  include '../config/conn.php';

  $post = json_decode(file_get_contents('php://input'), true);
  $serie = $post['documentoSerie'];

  // consulta numero
  session_start();
  $emisor_id = $_SESSION['emisor_id'];
  $serie = $conn->query("select number from series where serie='$serie' and emisor_id='$emisor_id'")->fetch_array(MYSQLI_ASSOC);
  $last_number = $serie['number']+1;

  //  colocal el numero del documento de la tabla series
  $post['documentoNumero'] = "$last_number";


  $json = json_encode($post);

  $insert = "insert into documentos (documento) values ('$json')";
  $conn->query($insert);
  $post['id'] = $conn->insert_id;

  // update doc id
  $conn->query("update documentos set documento = '".json_encode($post)."' WHERE id = {$post['id']}");

  // update series
  $conn->query("update series set number=$last_number where serie='{$post['documentoSerie']}' and emisor_id='{$post['emisorId']}'");

//  retorna el id para enviarlo y recien guardar
//  echo $post['id'];
  echo json_encode($post);

?>