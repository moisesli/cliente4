<?php 
	
	include '../config/conn.php';

	$sql = "select * from customers where id = '".$_GET['id']."'";
	$sql = $conn->query($sql)->fetch_array(MYSQLI_ASSOC);
	echo json_encode($sql);
?>