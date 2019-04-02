<?php
  
  // Conn
  include '../config/conn.php';

  session_start();
  
  // echo $_SESSION['local_id'];
  // SQL
  $productos =
    "select
        producto.id,
        producto.codigo,
        producto.descripcion,
        producto.precio_con_igv,
        producto.unidad,  
        producto_categoria.descripcion  categoria_nombre,
        producto_categoria.id categoria_id,
        producto.dependiente,
        producto.pro_ser,
        producto.moneda,
        producto_stock.cantidad,
        producto_stock.id as stock_id,
        producto.igv_tipo
    from producto
    join producto_categoria on producto_categoria.id = producto.categoria_id    
    join producto_stock on producto_stock.id = producto.producto_stock_id
    where producto.local_id = '{$_SESSION['local_id']}'
    order by producto.id Desc";

  $productos = $conn->query($productos)->fetch_all(MYSQLI_ASSOC);

  

  foreach ($productos as $index => $producto ){

    /*Edicion*/
    $productos[$index]['edit'] = 'no';

    /*Tipo de Igv*/
    if ($producto['igv_tipo'] == '10'){
      $productos[$index]['igv_tipo_nombre'] = '10-Gravado - Operación Onerosa';
    }elseif ($producto['igv_tipo'] == '15'){
      $productos[$index]['igv_tipo_nombre'] = '15-[Gratuita] Gravado – Bonificaciones';
    }elseif( $producto['igv_tipo'] == '10' ){
      $productos[$index]['igv_tipo_nombre'] = '10-Gravado - Operación';
    }elseif( $producto['igv_tipo'] == '11' ){
      $productos[$index]['igv_tipo_nombre'] = '11-[Gratuita] Gravado – Retiro por premio';
    }elseif( $producto['igv_tipo'] == '12' ){
      $productos[$index]['igv_tipo_nombre'] = '12-[Gratuita] Gravado – Retiro por donació';
    }elseif( $producto['igv_tipo'] == '13' ){
      $productos[$index]['igv_tipo_nombre'] = '13-[Gratuita] Gravado – Retiro';
    }elseif( $producto['igv_tipo'] == '14' ){
      $productos[$index]['igv_tipo_nombre'] = '14-[Gratuita] Gravado – Retiro por publicida';
    }elseif( $producto['igv_tipo'] == '15' ){
      $productos[$index]['igv_tipo_nombre'] = '15-[Gratuita] Gravado – Bonificaciones';
    }elseif( $producto['igv_tipo'] == '16' ){
      $productos[$index]['igv_tipo_nombre'] = '16-[Gratuita] Gravado – Retiro por entrega a trabajadore';
    }elseif( $producto['igv_tipo'] == '20' ){
      $productos[$index]['igv_tipo_nombre'] = '20-Exonerado - Operación Onerosa';
    }elseif( $producto['igv_tipo'] == '30' ){
      $productos[$index]['igv_tipo_nombre'] = '30-Inafecto - Operación Oneros';
    }elseif( $producto['igv_tipo'] == '31' ){
      $productos[$index]['igv_tipo_nombre'] = '31-[Gratuita] Inafecto – Retiro por Bonificación';
    }elseif( $producto['igv_tipo'] == '32' ){
      $productos[$index]['igv_tipo_nombre'] = '32-[Gratuita] Inafecto – Retir';
    }elseif( $producto['igv_tipo'] == '33' ){
      $productos[$index]['igv_tipo_nombre'] = '33-[Gratuita] Inafecto – Retiro por Muestras Médicas';
    }elseif( $producto['igv_tipo'] == '34' ){
      $productos[$index]['igv_tipo_nombre'] = '34-[Gratuita] Inafecto - Retiro por Convenio Colectiv';
    }elseif( $producto['igv_tipo'] == '35' ){
      $productos[$index]['igv_tipo_nombre'] = '35-[Gratuita] Inafecto – Retiro por premio';
    }elseif( $producto['igv_tipo'] == '36' ){
      $productos[$index]['igv_tipo_nombre'] = '36-[Gratuita] Inafecto - Retiro por publicida';
    }elseif( $producto['igv_tipo'] == '40' ){
      $productos[$index]['igv_tipo_nombre'] = '40-Exportación';
    }

    /*Producto o Servicio NIU ZZ*/
    if ($producto['pro_ser'] == 'NIU'){
      $productos[$index]['pro_ser_nombre'] = 'Producto';
    }else {
      $productos[$index]['pro_ser_nombre'] = 'Servicio';
    }

    /*Moneda*/
    if ( $productos[$index]['moneda'] == 'PEN' ){
      $productos[$index]['moneda_nombre'] = 'Soles';
    }else {
      $productos[$index]['moneda_nombre'] = 'Dolares';
    }


  }

  // print_r($productos);
  echo json_encode($productos,JSON_UNESCAPED_UNICODE);

//  print_r($sql);

?>
