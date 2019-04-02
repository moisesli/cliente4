<?php

  // iniciamos session
  $global_user_id = $_SESSION['user_id'];

  if ($global_user_id == null || $global_user_id == '') {
    header("Location: /index.php");
  }

?>