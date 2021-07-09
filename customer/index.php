<?php
  if(!isset($_SESSION)){
    session_start();
  } 
  if (!isset($_SESSION['custId'])) {
    header('Location:login.php');
  } else {
    header('Location:orders.php');
  }
?>