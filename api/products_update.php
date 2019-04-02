<?php

  // Conexion
  include '../config/conn.php';

  // Datos Post
  $post = json_decode(file_get_contents('php://input'), true);

  $id = $post['id'];
  $codigo = $post['codigo'];
  $descripcion = $post['descripcion'];
  $precio_sin_igv = $post['precio_sin_igv'];
  $precio_con_igv = $post['precio_con_igv'];
  $cantidad = $post['cantidad'];
  $moneda = $post['moneda'];
  $unidad = $post['unidad'];
  $categoria_id = $post['categoria_id'];
  $igv_afectacion = $post['igv_afectacion'];
  $grupos = $post['grupos'];



  $insert = "update producto set  codigo = '$codigo',
                                  descripcion = '$descripcion',
                                  precio_sin_igv = '$precio_sin_igv',
                                  precio_con_igv = '$precio_con_igv',
                                  cantidad = '$cantidad',
                                  moneda = '$moneda',
                                  unidad = '$unidad',
                                  categoria_id = '$categoria_id',
                                  igv_afectacion = '$igv_afectacion',
                                  grupos = '$grupos'
                                  where id=$id";
  $conn->query($insert);
?>
