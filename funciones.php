<?php

    function conexion($bd_config){
        try{
            $conexion = new PDO('mysql:host=localhost:3306;dbname='.$bd_config['basedatos'].';charset=UTF8', $bd_config['usuario'], $bd_config['pass']);
            return $conexion;
        }catch(PDOException $e)
        {
            return false;
        }

    }

    function limpiarDatos($datos){
        $datos = trim($datos);
        $datos = stripslashes($datos);
        $datos = filter_var($datos, FILTER_SANITIZE_STRING);
        return $datos;

    }

    function comprobar_contenido($bd_config){
        if (isset($_SESSION['usuario'])){
            $username= $_SESSION['usuario'];

            $conexion=conexion($bd_config);
            if($conexion !=false){
                $statementconsulta = $conexion ->prepare(
                    'SELECT idrol FROM usuarios WHERE usuario = :usuario '
                );

                $statementconsulta->execute(array(
                    ':usuario' => $username
                ));

                $resultado = $statementconsulta->fetch();
                //si no hubo error al consultar al usuario lo direccionamos a su contenido
                if ($resultado != false){
                    $rol= $resultado[0];
                    $_SESSION['rol']=$rol;
                    comprobar_rol();

                }
            }
        }else{
            header('Location: registrate.php');
        }
    }

    function comprobar_session(){
        if(isset($_SESSION['usuario'])){
            header("Location: index.php");
        }


    }

    function cerrar_session(){
        session_destroy();
        $_SESSION = array();//limpiamos la sesion
        header('Location: login.php');
    }

    function comprobar_rol(){
        if(isset($_SESSION['rol'])){
            switch($_SESSION['rol']){
                case 1:
                    header('Location: contenidoadmin.php');
                break;
                case 2:
                    header('Location: contenidoemployee.php');
                break;
            }
        }
    }

    function comprobar_privilegiosadmin(){
        if($_SESSION['rol'] != 1){
            header('Location: login.php');
        }

    }

    function comprobar_privilegiosemployee(){
        if($_SESSION['rol'] != 2){
            header('Location: login.php');
        }

    }

?>
