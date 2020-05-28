<?php session_start();
  if (isset($_SESSION['usuario'])){
    require 'views/ventasEm.view.php';
  }else{
    header ('Location: login.php');
  }
?>
