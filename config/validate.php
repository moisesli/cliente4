<?php

  session_start(); // siempre se tiene que inicializar para saber
  $url = $_SERVER['PHP_SELF'];
  $user_acces = 'no';

  if (isset($_SESSION['email'])){ // si hay session

    $user_acces = 'ok';

    if ($url == '/index.php' || $url == '/register/index.php'){
      header("Location: /invoices/index.php");
    }

  }else{ // si no hay session

    if ($url == '/index.php' || $url == '/register/index.php'){
      // no hace nada
    }else{
      header("Location: /index.php");
    }

  }

?>
