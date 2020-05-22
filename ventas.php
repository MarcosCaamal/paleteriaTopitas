<?php session_start();
  if (isset($_SESSION['usuario'])){
    require 'views/ventas.view.php';
  }else{
    header ('Location: login.php');
  }
?>
