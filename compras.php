<?php session_start();
  if (isset($_SESSION['usuario'])){
    require 'views/compras.view.php';
  }else{
    header ('Location: login.php');
  }
?>
