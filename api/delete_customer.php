<?php 
	
	include '../config/conn.php';
	$post = json_decode(file_get_contents('php://input'), true);
	$delete = "delete from customers where id='$post'";
	$conn->query($delete);	
	
?>