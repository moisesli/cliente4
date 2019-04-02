<?php

  include '../config/conn.php';
  $post = json_decode(file_get_contents('php://input'), true);

  $json = json_encode($post);
  $update = "update documentos set documento='$json' where id=".$post['id'];
  $conn->query($update);
  echo $json;

?>