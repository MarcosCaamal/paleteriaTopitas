<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- Site Metas -->
    <title>Paletería las Topitas</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
	<meta name="author" content="">
    <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
	<link rel="stylesheet" href="css/responsive.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
	<link rel="stylesheet" href="css/estilos.css">

</head>

<body>
	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="index.php">
					<img src="images/logo.jpg" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a class="nav-link" href="index.php">Inicio</a></li>

					<li class="nav-item"><a class="nav-link" href="paginas/producto.php">Productos</a></li>
					<li class="nav-item"><a class="nav-link" href="paginas/compras.php">Compras</a></li>
					<li class="nav-item"><a class="nav-link" href="paginas/ventas.php">Ventas</a></li>
          <li class="nav-item"><a class="nav-link" href="actualizarperfil.php">Actualizar Perfil</a></li>
          <li class="nav-item"><a class="nav-link" href="Cerrar.php">Cerrar Sesión</a></li>

					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
	<br>
	<br>
	<br>
	<br>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST", class="formulario" name="actualizarPerfil">

		<h1>Actualizar perfil</h1>
		<div class="contenedor">

			<label for="telefono" class="nombreDatos">Usuario: </label>
			<div class="input-contenedor">
				<i class="fas fa-user icon"></i>
				<input type="text" placeholder="Usuario" name="user" value="<?php echo $resultado['usuario']?>" readonly>
			</div>

			<label for="telefono" class="nombreDatos">Tipo de usuario: </label>
			<div class="input-contenedor">
				<i class="fas fa-user-cog icon"></i>
				<input type="text" placeholder="Tipo de Usuario" name="rol" value="<?php echo $resultado['rol']?>" readonly>
			</div>

			<label for="telefono" class="nombreDatos">Nombres: </label>
			<div class="input-contenedor">
				<i class="fas fa-user icon"></i>
				<input type="text" placeholder="Nombre" name="nombre" value="<?php echo $resultado['nombre']?>">
			</div>

			<label for="telefono" class="nombreDatos">Apellidos: </label>
			<div class="input-contenedor">
				<i class="fas fa-user icon"></i>
				<input type="text" placeholder="Apellidos" name="apellidos" value="<?php echo $resultado['apellidos']?>">
			</div>

			<label for="telefono" class="nombreDatos">Email: </label>
			<div class="input-contenedor">
				<i class="fas fa-envelope icon"></i>
				<input type="text" placeholder="something@example.com" name="email" value="<?php echo $resultado['email']?>">
			</div>

			<label for="telefono" class="nombreDatos">Telefono: </label>
			<div class="input-contenedor">
				<i class="fas fa-phone icon"></i>
				<input type="text" placeholder="Teléfono" name="telefono" value="<?php echo $resultado['telefono']?>">
			</div>

			<input type="submit" value="Actualizar Datos" class="button" onclick="actualizarperfil">

		</div>

	</form>
	<!-- Start slides -->


	<!-- Start Footer -->


		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<p class="company-name">TODOS LOS DERECHOS RESERVADOS. &copy;MAYO 2020 <a href="#">Paleteria Las Topitas</a>
					</div>
				</div>
			</div>
		</div>

	<!-- ALL JS FILES -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
	<script src="js/jquery.superslides.min.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>
