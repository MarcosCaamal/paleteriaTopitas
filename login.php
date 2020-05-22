<?php session_start();
require 'conexionBD/config.php';
require 'funciones.php';
comprobar_session();

$errores ='';
    if ($_SERVER['REQUEST_METHOD']=='POST'){
        $usuario = filter_var($_POST['usuario'], FILTER_SANITIZE_STRING);
        $password = $_POST['password'];
        $password= hash('sha512', $password);

        $conexion = conexion($bd_config);

        if(!$conexion){
            $errores .= '<li>Se produjo un error de conexion</li>';
        }else{
            $statement = $conexion ->prepare(
                'SELECT * FROM usuarios WHERE usuario = :usuario AND password = :password'
            );

            $statement->execute(array(
                ':usuario' => $usuario,
                ':password' => $password
            ));

            $resultado = $statement->fetch();
            if($resultado != false){
                $_SESSION['usuario']=$usuario;
                header('Location: index.php');
            }else{
                $errores .= '<li>La contraseña o el usuario son incorrectos</li>';
            }

        }

    }

require 'views/login.view.php';
?>
