<?php

include '../config/conn.php';
session_start();
$get_last_serie_number = "select number 
    from series where emisor_id=".$_SESSION['emisor_id']." and serie ='".$_SESSION['B']."'";
$get_last_serie_number = $conn->query($get_last_serie_number)->fetch_array(MYSQLI_ASSOC);
echo $get_last_serie_number['number']+1;

?>