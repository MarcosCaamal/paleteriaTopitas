<?php session_start();
require 'conexionBD/config.php';
require 'funciones.php';
    if (isset($_SESSION['usuario'])){

        $conexion = conexion($bd_config);

        if($_SERVER['REQUEST_METHOD']=='POST'){
            $usuario = limpiarDatos($_SESSION['usuario']);
            $rol = limpiarDatos($_SESSION['rol']);
            $nombre = limpiarDatos($_POST['nombre']);
            $apellidos = limpiarDatos($_POST['apellidos']);
            $email = limpiarDatos($_POST['email']);
            $telefono = limpiarDatos($_POST['telefono']);

            $statementconsulta = $conexion ->prepare(
                'SELECT idUsuario FROM usuarios WHERE usuario = :usuario AND idrol=:rol LIMIT 1'
            );

            $statementconsulta->execute(array(
                    ':usuario' => $usuario,
                    ':rol' => $rol
            ));

            $resultado = $statementconsulta->fetch();


            //si el usuario existe en la base de datos actualizamos su perfil
            if($resultado != false){
                $idusuario=$resultado[0];

                $statament = $conexion-> prepare (
                    'UPDATE perfiles SET
                    nombre=:nombre,
                    apellidos=:apellidos,
                    email=:email,
                    telefono=:telefono
                    WHERE idusuario = :idusuario'
                );
                $statament->execute(array(
                    ':nombre' => $nombre,
                    ':apellidos' => $apellidos,
                    ':email' => $email,
                    ':telefono' => $telefono,
                    ':idusuario' => $idusuario
                ));
               header('Location: actualizarperfilEm.php');
            }


        }else{
            $usuario=$_SESSION['usuario'];
            $rol=$_SESSION['rol'];
            $statementconsulta = $conexion ->prepare(
                'SELECT usuarios.usuario, roles.rol, perfiles.nombre, perfiles.apellidos, perfiles.email, perfiles.telefono
                FROM roles INNER JOIN usuarios ON roles.idRol=usuarios.idrol
                INNER JOIN perfiles ON usuarios.idUsuario=perfiles.idusuario
                WHERE usuarios.usuario = :usuario AND  roles.idRol= :rol'
            );

            $statementconsulta->execute(array(
                    ':usuario' => $usuario,
                    ':rol' => $rol
            ));

            $resultado = $statementconsulta->fetch();


        }

    require 'views/actualizarperfilEm.view.php';

    }else{
    header ('Location: login.php');
    }




?>
