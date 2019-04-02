<?php 
	
	// include ('../config/conn.php');
	$conn=mysqli_connect('localhost', 'root', 'moiseslinar3s', 'cliente');
	$id = mysqli_insert_id($conn);
	echo $id;	
		
?>