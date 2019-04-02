<?php

  include '../config/conn.php';

  $post = json_decode(file_get_contents('php://input'), true);
  $serie = $post['documento_serie'];
  $json = json_encode($post);


  // consulta numero
  session_start();
  $emisor_id = $_SESSION['emisor_id'];  
  $serie = $conn->query("select number from series where serie='$serie' and emisor_id='$emisor_id'")->fetch_array(MYSQLI_ASSOC);
  $last_number = $serie['number']+1;

  $post['documento_numero'] = $last_number;

  $insert = "insert into documentos (documento) values ('$json')";
  $conn->query($insert);
  $post['id'] = $conn->insert_id;

  $conn->query("update series set number=$last_number where serie='$sierie' and emisor_id='$emisor_id'");

  echo $post['id'];

?>