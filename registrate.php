<?php  session_start();
require 'conexionBD/config.php';
require 'funciones.php';
comprobar_session();

if($_SERVER['REQUEST_METHOD']=='POST'){
    $usuario = filter_var($_POST['usuario'], FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    $password2 = $_POST['password2'];


    $errores ='';

    if (empty($usuario) or empty($password) or empty($password2)){
        $errores .="<li>Por favor rellena todos los datos correctamente</li>";
    }else{

        $conexion = conexion($bd_config);
        if(!$conexion){
            $errores .= '<li>Se produjo un error de conexion</li>';
        }else{
            $statament = $conexion-> prepare ('SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1');
            $statament->execute(array(':usuario' => $usuario));
            $resultado = $statament->fetch();

            if ($resultado != false){
                $errores .='<li>El nombre del usuario ya existe</li>';
            }

            $password = hash('sha512', $password);
            $password2 = hash('sha512', $password2);

            if ($password != $password2){
                $errores .= '<li>Las contraseñas no son iguales</li>';
            }
        }

    }

    // Comprobamos si hay errores, sino entonces agregamos el usuario y redirigimos.
	if ($errores == '') {
		$statement = $conexion->prepare('INSERT INTO usuarios (idUsuario, usuario, password, idrol) VALUES (null, :usuario, :pass, 2)');
		$statement->execute(array(
				':usuario' => $usuario,
				':pass' => $password
            ));
        $statementconsulta = $conexion ->prepare(
                'SELECT idUsuario FROM usuarios WHERE usuario = :usuario AND password = :password'
        );

        $statementconsulta->execute(array(
                ':usuario' => $usuario,
                ':password' => $password
        ));

        $resultado = $statementconsulta->fetch();
        //si no hubo error al insertar el usuario creamos su  perfil
        if ($resultado != false){
            $statement = $conexion->prepare(
                'INSERT INTO perfiles (idPerfil, idusuario) VALUES (null, :iduser)'
            );

            $statement->execute(array(
                ':iduser' => $resultado[0]
            ));


        }
        // Despues de registrar al usuario redirigimos para que inicie sesion.
        header('Location: login.php');
	}
}
require 'views/registrate.view.php';

?>
