<?php

  include '../config/conn.php';
  include '../api/curlPost.php';
  include __DIR__.'/../config/const.php';

  $json = json_decode(file_get_contents('php://input'),true);



  $url = serverApi.'/doc.php';
  $jsonResponse = json_decode(curlPost($url,json_encode($json)),true);

  $json['respuestaEnviado'] = $jsonResponse['respuestaEnviado'];
  $json['respuestaXml'] = $jsonResponse['respuestaXml'];
  $json['respuestaPdf'] = $jsonResponse['respuestaPdf'];
  $json['respuestaMensaje'] = $jsonResponse['respuestaMensaje'];
  $json['respuestaNombre'] = $jsonResponse['respuestaNombre'];
  $json['respuestaCorrelativo'] = $jsonResponse['respuestaCorrelativo'];

  $sql = "insert into resumenes (resumen) values ('".json_encode($json)."')";
  $conn->query($sql);
  echo json_encode($json);

?>