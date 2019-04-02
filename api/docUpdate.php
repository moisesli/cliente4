<?php

  /*
   * Update send invoice check
   */
  include '../config/conn.php';
  $doc = json_decode(file_get_contents('php://input'), true);
  // $conn->query("update documentos set documento = JSON_REPLACE(documento, '$.sunat', '1') WHERE id = '{$id}'");
  $conn->query("update documentos set documento = '".json_encode($doc)."' WHERE id = '{$doc['id']}'");
  echo json_encode($doc);

?>