<?php

if ($_SERVER["HTTP_HOST"] == 'cliente.lineysoft2.com'){
  define("serverApi","http://api.lineysoft2.com");
}elseif ($_SERVER["HTTP_HOST"] == 'cliente.lineysoft.com'){
  define("serverApi","http://api.lineysoft.com");
}

?>