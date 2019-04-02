<?php

include '../../config/conn.php';
$json = json_decode(file_get_contents('php://input'), true);
$deleteProducto = "delete from producto where id='{$json['id']}'";
$conn->query($deleteProducto);


?>