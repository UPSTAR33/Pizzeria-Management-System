<?php
  session_start();
  session_unset();
  session_destroy();
  $loginUrl = array_slice(explode('/', $_SERVER['REQUEST_URI']),0,3);
  $loginUrl = implode('/',$loginUrl);  
  header("Location:$loginUrl/login.php");
?>