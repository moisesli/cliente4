<?php
	include ('../config/conn.php');

	$post = json_decode(file_get_contents('php://input'), true);
	$email = $post['email'];
	$password = $post['contra'];


	// consulta la tabla usuarios
	$login = "select count(*) counte from users where email='$email' and password='$password' ";
	$login = $conn->query($login)->fetch_array(MYSQLI_ASSOC);



	if ($login['counte'] == 1) {

	  $user = "select * from cliente.users where email='$email' and password='$password'";
	  $user = $conn->query($user)->fetch_array(MYSQLI_ASSOC);

    // local default
	  $locales_user =
      "select usuarios_locales.local_id,
			 locales.descripcion,
       usuarios_locales.user_id,
       usuarios_locales.default_local,
       emisores_locales.emisor_id,
       emisores.ruc
       from usuarios_locales
       join emisores_locales on emisores_locales.local_id = usuarios_locales.local_id 
       join locales on locales.id = usuarios_locales.local_id 
       join emisores on locales.emisor_id = emisores.id
       where user_id=".$user['id']." and default_local=1";
	  $locales_user = $conn->query($locales_user)->fetch_array(MYSQLI_ASSOC);

	  // locales
    $locales = "select * from usuarios_locales
                join locales on locales.id = usuarios_locales.local_id
                where user_id=3";
    $locales = $conn->query($locales)->fetch_all(MYSQLI_ASSOC);

    // documentoSerieListFacturas
    $documentoSerieListFacturas = "select series.id, series.type, series.serie, localesseries.defecto
                           from localesseries
                           join series on serie_id = series.id where local_id=3 and series.type='F'";
    $documentoSerieListFacturas = $conn->query($documentoSerieListFacturas)->fetch_all(MYSQLI_ASSOC);
    $documentoSerieListFacturas = json_encode($documentoSerieListFacturas,true);

    // documentoSerieListBoletas
    $documentoSerieListBoletas = "select series.id, series.type, series.serie, localesseries.defecto
                           from localesseries
                           join series on serie_id = series.id where local_id=3 and series.type='B'";
    $documentoSerieListBoletas = $conn->query($documentoSerieListBoletas)->fetch_all(MYSQLI_ASSOC);
    $documentoSerieListBoletas = json_encode($documentoSerieListBoletas,true);

	  // si hay mas de dos
    if (count($locales_user)>0){
      // session
      session_start();
      $_SESSION['email'] = $email;
      $_SESSION['password'] = $password;
      $_SESSION['user_id'] = $locales_user['user_id'];
      $_SESSION['local_id'] = $locales_user['local_id'];
      $_SESSION['local_descripcion'] = $locales_user['descripcion'];
      $_SESSION['emisor_id'] = $locales_user['emisor_id'];
      $_SESSION['locales'] = $locales;
      $_SESSION['ruc'] = $locales_user['ruc'];
      $_SESSION['documentoSerieListFacturas'] = $documentoSerieListFacturas;
      $_SESSION['documentoSerieListBoletas'] = $documentoSerieListBoletas;

      // SERIES POR DEFECTO
			// *******************
			$series_default = "select localesseries.local_id,
			localesseries.serie_id,
			series.serie,
			series.type 
			from localesseries 
			join	series on localesseries.serie_id=series.id
			where defecto='1' and local_id=3";
			$series_default = $conn->query($series_default)->fetch_all(MYSQLI_ASSOC);
      foreach ($series_default as $item) {
				if ($item['type'] == 'F'){
          $_SESSION['F'] = $item['serie'];
				}elseif ($item['type'] == 'FNC'){
          $_SESSION['FNC'] = $item['serie'];
        }elseif ($item['type'] == 'FND'){
          $_SESSION['FND'] = $item['serie'];
        }elseif ($item['type'] == 'B'){
          $_SESSION['B'] = $item['serie'];
        }elseif ($item['type'] == 'BNC'){
          $_SESSION['BNC'] = $item['serie'];
        }elseif ($item['type'] == 'BND'){
          $_SESSION['BND'] = $item['serie'];
        }
			}
    }
    // si todo salio bien
    echo 'ok';
	}
	else{
		echo 'no';
	}
	?>