<?php

include '../config/conn.php';
$q = $_GET['q'];
// $q = 'A';
$sql = "select
       producto.id,
       producto.codigo,
       producto.descripcion,
       producto.precio_con_igv,
       producto.unidad,
       producto.moneda,
       producto.igv_tipo
from producto
where concat (codigo,' - ',descripcion) like '%$q%'";
$sql = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);

foreach ($sql as $index => $sqlite){
  $sql[$index]['lista'] = '';
}

if (count($sql) == 1) {
  $tempQ = $sql[0]['codigo'].' - '.$sql[0]['descripcion'];
  if ($q == $tempQ) {
    // hay una coincidencia y es igual que la busqueda
    // $sql = array();
    $sql[0]['lista'] = 'unoIgual';
    echo json_encode($sql);
  }else {
    // Hay solo una coincidencia pero no es igual que la busqueda
    echo json_encode($sql);
  }  
}elseif (count($sql) == 0) {
  // ninguna coincidencia
  $sql = array();
  $sql[0]['lista'] = 'ceroNinguno';
  echo json_encode($sql);
}else {
  // Hay muchas coinciencias 
  echo json_encode($sql);
}

// print_r($sql);
// if (count($sql) != 0 ){
//   echo json_encode($sql);
// }

// else{
//   $sql = array();
//   $sql[0]['descripcion'] = '';
//   echo json_encode($sql);
// }

?>