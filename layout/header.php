<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="/vendor/twbs/bootstrap/dist/css/bootstrap.css" >
  <link rel="stylesheet" href="/assets/css/style.css">
  <link rel="stylesheet" href="/vendor/components/font-awesome/css/fontawesome-all.min.css">

  <script src="/assets/js/vue.js"></script>
  <script src="/assets/js/axios.min.js"></script>
  <script src="/assets/js/jquery-3.3.1.slim.min.js"></script>

  <title>Lineysoft.com</title>
</head>
<body class="bg-light" style="min-height: 50rem; padding-top: 4.5rem;">

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-info p-2">
  <a class="navbar-brand" href="/views/invoices/index.php">
    <i class="fa fa-file-alt"></i> Factura Electronica
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto">

      <!--Documentos-->
      <li class="nav-item dropdown">
          <a class="nav-link" href="/views/invoices/index.php">Documentos</a>
      </li>

      <!-- Products -->
      <li class="nav-item dropdown">
        <a class="nav-link" href="/views/products/index.php">Productos</a>
      </li>

      <!-- Clientes -->
      <li class="nav-item dropdown">
        <a class="nav-link" href="/views/customers/index.php">Clientes</a>
      </li>

    </ul>
    <ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex">

      <!-- LOCALES -->
      <?php if ($user_acces == 'ok') { ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $_SESSION['local_descripcion']; ?>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown01">
          <?php if ($user_acces == 'ok') {?>
            <?php foreach ($_SESSION['locales'] as $local) {?>
              <?php if ($local['id'] != $_SESSION['local_id']) { ?>
                <a class="dropdown-item" href="/api/login_cambio_local.php?local_id=<?php echo $local['local_id'] ?>"><?php echo $local['descripcion'] ?></a>
              <?php }  ?>
            <?php } ?>
          <?php } ?>
        </div>
      </li>
      <?php } ?>
      <?php if ($user_acces == 'ok') { ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tu Cuenta</a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="#">Emisor</a>
            <a class="dropdown-item" href="#">Locales</a>
            <a class="dropdown-item" href="#">Series</a>
            <a class="dropdown-item" href="#">Usuarios</a>
            <a class="dropdown-item" href="#">Tu Datos</a>
            <a class="dropdown-item" href="/api/salir.php"><i class="fa fa-sign-out-alt"></i> Salir</a>
          </div>
        </li>
      <?php }else{ ?>
        <li>
          <a href="/register" class="nav-link"><i class="fa fa-sign-in-alt"></i> Registro</a>
        </li>
      <?php } ?>

    </ul>
  </div>
</nav>

