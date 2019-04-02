<?php
  // Conn
  include '../config/conn.php';

  // SQL
  $sql = "select * from producto_categoria order by id DESC ";
  $sql = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);
  echo json_encode($sql);

?>
