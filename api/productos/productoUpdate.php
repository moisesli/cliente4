<?php

include __DIR__.'/../../config/conn.php';

// Recibimos Datos
$json = json_decode(file_get_contents('php://input'), true);
$precio_sin_igv = number_format($json['precio_con_igv'] * 0.82,2,'.','');


$productoUpdate = "update producto set  precio_con_igv = '{$json['precio_con_igv']}',
                                        precio_sin_igv = '$precio_sin_igv',
                                        unidad = '{$json['unidad']}',
                                        codigo = '{$json['codigo']}',
                                        descripcion = '{$json['descripcion']}',
                                        moneda = '{$json['moneda']}',
                                        pro_ser = '{$json['pro_ser']}',
                                        igv_tipo = '{$json['igv_tipo']}',
                                        categoria_id = '{$json['categoria_id']}'  
                  where id='{$json['id']}'";
$conn->query($productoUpdate);

$updateStock = "update producto_stock set cantidad='{$json['stock']}' where id='{$json['stockId']}'";
$conn->query($updateStock);

/*Actualiza stock*/
$updateStock = "update producto_stock set cantidad = '{$json['cantidad']}'
                    where id = '{$json['stock_id']}'";
$conn->query($updateStock);


echo json_encode($json);

?>