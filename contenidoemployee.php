<?php session_start();
    if (isset($_SESSION['usuario'])){
    require 'funciones.php';
    comprobar_privilegiosemployee();
    require 'views/contenidoemployee.view.php';

    }else{
    header ('Location: login.php');
    }

?>
