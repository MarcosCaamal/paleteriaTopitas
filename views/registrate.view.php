<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title></title> 
	<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
	<link rel="stylesheet" href="css/estilos.css">
	

</head>  
<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST", class="formulario" name="login">
        
        <h1>Registrate</h1>
        <div class="contenedor">
        
            <div class="input-contenedor">
                <i class="fas fa-user icon"></i>
                <input type="text" placeholder="Usuario" name="usuario" maxlength="15">
            
            </div>
            
            
            <div class="input-contenedor">
                <i class="fas fa-key icon"></i>
                <input type="password" placeholder="Contraseña" name="password" maxlength="12">
            </div>

            <div class="input-contenedor">
                <i class="fas fa-key icon"></i>
                <input type="password" placeholder="Confirmar Contraseña" name="password2" maxlength="12">
                
            </div>
            <input type="submit" value="Registrate" class="button" onclik="login">
        </div>
        <?php if(!empty($errores)):?>
                <div class="errror">
                    <ul>
                        <?php echo $errores; ?>
                    </ul>
                </div>
        <?php endif;?>
        <p>¿Ya tienes una cuenta?<a class="link" href="login.php">Iniciar Sesion</a></p>
</form>

</body>
</html>