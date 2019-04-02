<?php

/*error_reporting(E_ALL);
ini_set('display_errors', '1');*/

	require_once("../vendor/jossmp/sunatphp/src/autoload.php");

	// Dni
	$dniRuc = $_GET['dniRuc'];

	if (strlen($dniRuc) == 8) {
		$consulta = file_get_contents('http://aplicaciones007.jne.gob.pe/srop_publico/Consulta/Afiliado/GetNombresCiudadano?DNI='.$dniRuc);
		$partes = explode("|", $consulta);	
		$nombre = $partes[0].' '.$partes[1].' '.$partes[2];

		$resultado['nombre'] = $nombre;
	  $resultado['direccion'] = '';

	}elseif (strlen($dniRuc) == 11) {
		$cliente = new \Sunat\Sunat();
	  $datos = $cliente->search($dniRuc);

	  $resultado['nombre'] = $datos->result->razon_social;
	  $resultado['direccion'] = $datos->result->direccion;
	}	

	echo json_encode($resultado);

?>