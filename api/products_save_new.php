<?php

  // Conexion
  include '../config/conn.php';

  // Datos Post
  $post = json_decode(file_get_contents('php://input'), true);

  session_start();

$codigo = $post['codigo'];
$descripcion = $post['descripcion'];
$precio_con_igv = $post['precio_con_igv'];
$precio_sin_igv = $post['precio_sin_igv']*0.82;
$unidad = $post['unidad'];
$producto_stock_cantidad = $post['producto_stock_cantidad'];
$moneda = $post['moneda'];
$pro_ser = $post['pro_ser'];
$igv_tipo = $post['igv_tipo'];
$categoria_id = $post['categoria_id'];
$local_id = $_SESSION['local_id'];

$producto_stock_id = $post['producto_stock_id'];


  /*Inser Stock*/
  $stock_insert = "insert into producto_stock (producto_id,cantidad) values ('$producto_stock_id','$producto_stock_cantidad')";
  $conn->query($stock_insert);
  $producto_stock_id = $conn->insert_id;

  /*Inserta Producto*/
  $insert = "insert into producto ( 
                                    codigo,
                                    descripcion,
                                    precio_con_igv,
                                    precio_sin_igv,
                                    unidad,
                                    moneda,
                                    pro_ser,                                    
                                    igv_tipo,
                                    categoria_id,
                                    local_id,
                                    producto_stock_id                                    
                                  ) values (
                                    '$codigo',
                                    '$descripcion',
                                    '$precio_con_igv',
                                    '$precio_sin_igv',
                                    '$unidad',
                                    '$moneda',
                                    '$pro_ser',
                                    '$igv_tipo',
                                    '$categoria_id',
                                    '$local_id',
                                    '$producto_stock_id'
                                  )";
  $conn->query($insert);
?>
