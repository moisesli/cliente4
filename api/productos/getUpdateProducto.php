<?php 

  include '../../config/conn.php';
  $productoId = $_GET['id'];
  $updateProduct = "select * from producto where producto_stock_id='$productoId'";
  $updateProduct = $conn->query($updateProduct)->fetch_all(MYSQLI_ASSOC);
  echo json_encode($updateProduct);
	
?>