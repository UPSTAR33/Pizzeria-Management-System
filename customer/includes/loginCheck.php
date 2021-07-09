<?php
  session_start();
  if (!isset($_SESSION['custId'])) {
  header('Location:login.php');
}
?>