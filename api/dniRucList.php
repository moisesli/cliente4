<?php


  include '../config/conn.php';
  $q = $_GET['q'];
  $sql = "select * from customers where ruc_dni like '%$q%' or razon_social like '%$q%'";
  $sql = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);
  if (count($sql) == 0){
    $sql = array();
    $sql[0]['ruc_dni'] = '';
  }
  if (strlen($q) == 8) {    
    $sql[0]['tipo'] = '1';
  }elseif(strlen($q) == 11 ){
    $sql[0]['tipo'] = '6';
  }
  echo json_encode($sql);

?>