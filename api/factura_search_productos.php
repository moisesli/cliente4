<?php

  include '../config/conn.php';
  $q = $_GET['q'];
  $sql = "select 
  producto.id,
   producto_header.codigo,
   producto_header.descripcion,
   producto.precio_con_igv,
   producto.unidad,
   producto.moneda,
   producto.medida,
   producto.igv_tipo 
  from producto_header 
  join producto on producto.products_header_id=producto_header.id
  where concat (codigo,' - ',descripcion) like '%$q%'";
  $sql = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);
  if (count($sql) != 0 ){
    echo json_encode($sql);
  }else{
    $sql = array();
    $sql[0]['descripcion'] = '';
    echo json_encode($sql);
  }

?>