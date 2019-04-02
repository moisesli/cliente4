<?php 
	ini_set('max_execution_time', 300);
	require_once("../vendor/autoload.php");
	$ruc = $_GET['ruc_dni'];
	//$ruc = '20532710066';	
	$cliente = new \Sunat\Sunat();
	$datos = $cliente->search($ruc);
	echo json_encode($datos);	
?>