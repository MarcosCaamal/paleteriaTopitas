<?php 
session_set_cookie_params(5);
session_start();
    if (isset($_SESSION['usuario'])){
    require 'funciones.php';
    comprobar_privilegiosadmin();
    require 'views/contenidoadmin.view.php';

    }else{
    header ('Location: login.php');
    }

?>
