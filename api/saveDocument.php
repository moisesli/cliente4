<?php


/*guardar documento*/

  include '../config/conn.php';
  include __DIR__.'/curlPost.php';
  include __DIR__.'/../config/const.php';

  // Parametros
  $url = serverApi.'/doc.php';
  $json = json_decode(file_get_contents('php://input'),true);

  // documentoNumero
  $documentoNumero = "select series.number, series.emisor_id from series
                      inner join emisores on emisores.id = series.emisor_id
                      where emisores.ruc = '{$json['emisorRuc']}' and series.serie = '{$json['documentoSerie']}'";
  $documentoNumero = $conn->query($documentoNumero)->fetch_array(MYSQLI_ASSOC);
  $documentoNumero = $documentoNumero['number'] + 1;
  $json['documentoNumero'] = "$documentoNumero";


  // Llamada
  $jsonResponse = json_decode(curlPost($url,json_encode($json)),true);
  $json['respuestaEnviado'] = $jsonResponse['respuestaEnviado'];
  $json['respuestaXml'] = $jsonResponse['respuestaXml'];
  $json['respuestaPdf'] = $jsonResponse['respuestaPdf'];
  $json['respuestaMensaje'] = $jsonResponse['respuestaMensaje'];


  // Guardar
  $insert = "insert into documentos (documento) values ('".json_encode($json)."')";
  $conn->query($insert);


  // Number count
  $insert = "update series 
              inner join emisores on emisores.id = series.emisor_id 
              set number = {$json['documentoNumero']} 
              where serie='{$json['documentoSerie']}' and emisores.ruc = '{$json['emisorRuc']}'";
  $conn->query($insert);


//  print_r($json_);
  echo json_encode($json);




?>