<?php 
	
	// Connexion
	include '../config/conn.php';

	$sql = "select * from customers";
	$sql = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);

	// Get Customers
	echo json_encode($sql);

?>