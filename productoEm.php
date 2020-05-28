<?php session_start();
  if (isset($_SESSION['usuario'])){
    require 'views/productoEm.view.php';
  }else{
    header ('Location: login.php');
  }
?>