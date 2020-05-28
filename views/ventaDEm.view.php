
<?php
include_once '../CrudVDEm.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Venta Detalle</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../est.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="text-center ba">
  <h1 class="titPrin">Registro de Venta Detalle</h1>
  <img src="../logob.png" style="width:15%">
</div>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="estMe btns"><a href="../index.php">Inicio</a></li>
        <li class="active estMe btns"><a href="ventaDEm.php">Venta Detalle</a></li>
        <li class="estMe btns"><a href="productoEm.php">Productos</a></li>
        <li class="estMe btns"><a href="ventasEm.php">Ventas</a></li>
        <li class="nav-item"><a class="nav-link" href="../actualizarperfil.php">Actualizar Perfil</a></li>
        <li class="nav-item"><a class="nav-link" href="../Cerrar.php">Cerrar Sesión</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid ">
 <form method="post">
    <div class="form-group">
      <label class="control-label tamla">PRODUCTO:</label>
      <select name="idProducto">
      <option value="0" selected disabled="disabled">Elige una opcion</option>
      <?php $res = $MySQLiconn->query("SELECT * FROM producto");
        while($row=$res->fetch_array())
        {
      ?>
        <option value="<?php echo $row['idProducto']; ?>"><?php echo $row['nombre']; ?></option>
        <?php
        }
        ?>
      </select>
    </div>
    <div class="form-group">
      <label class="control-label tamla" for="nombre">Ventas:</label>
      <select id="Tipo" name="idVentas">
      <option value="0" selected disabled="disabled">Elige una opcion</option>
      <?php $res = $MySQLiconn->query("SELECT * FROM ventas");
        while($row=$res->fetch_array())
        {
      ?>
        <option value="<?php echo $row['idVentas']; ?>"><?php echo $row['idVentas']; ?></option>
        <?php
        }
        ?>
      </select>
    </div>
    <div class="form-group obtds">
       <label class="control-label tamla" for="cantidadProducto">Cantidad Producto:</label>
       <div class="col">
          <input type="text" class="form-control text-uppercase" name="cantidadProducto" placeholder="2"
          value="<?php if(isset($_GET['editar'])) echo $getROW['cantidadProducto'];  ?>" />
       </div>
    </div>
    <div class="form-group obtds">
       <label class="control-label tamla" for="subtotal">Subtotal:</label>
       <div class="col">
          <input type="text" class="form-control text-uppercase" name="subtotal" placeholder="00.00"
          required value="<?php if(isset($_GET['editar'])) echo $getROW['subtotal'];  ?>" />
       </div>
    </div>
    <div class="form-group">
       <?php
        if(isset($_GET['editar']))
         {
       ?>
       <div class="col-12">
          <button type="submit" class="btn btncamf" name="actualizar">Actualizar</button>
         </div>
      <?php
     }
     else
     {
      ?>
      <div class="col-12">
        <button type="submit" class="btn btncamf" name="guardar">Guardar</button>
      </div>
      <?php
     }
     ?>
    </div>
 </form>
 <?php
  include_once '../Db.php';
  $filtro= "SELECT Producto_idProducto,Ventas_idVentas,cantidadProducto,subtotal,producto.nombre, producto.precioVenta FROM detalleventa, producto WHERE detalleventa.Producto_idProducto = producto.idProducto ORDER BY detalleventa.Ventas_idVentas";
  //  $filtro="select * from detalleventa order by Producto_idProducto";
  $SQL = $MySQLiconn->query($filtro);
?>
 <h3 class="textoTa text-center">Listado de Venta Detalle</h3><BR></BR>
 <table class="table table-hover table-bordered shadow p-3 mb-5 bg-white rounded">
   <tr class="tabTit">
      <th>ID Venta</th>
      <th>Cantidad</th>
      <th>Nombre del producto</th>
      <th>Precio</th>
      <th>subtotal</th>
      <th>Acciones</th>
    </tr>
   <?php
   while($row=$SQL ->fetch_array())
   {
    ?>
       <tr class="tabCont">
         <td> <?php echo $row['Ventas_idVentas']; ?> </td>
         <td> <?php echo $row['cantidadProducto']; ?> </td>
         <td> <?php echo $row['nombre']; ?> </td>
         <td> <?php echo $row['precioVenta']; ?> </td>
         <td> <?php echo $row['subtotal']; ?> </td>
         <td>
           <a href="?editar=<?php echo $row['Producto_idProducto']; ?>" onclick="return confirm('¿Deseas Editarlo ?'); ">

             <span class="glyphicon glyphicon-pencil"></span>

           </a>

           <a href="?eliminar=<?php echo $row['Producto_idProducto']; ?>" onclick="return confirm('¿Seguro deseas eliminarlo?'); ">
             <span class="glyphicon glyphicon-trash"></span>
         </a>
       </td>
       </tr>
       <?php
   }
   ?>
 </table>
</div><br><br>

<footer class="page-footer font-small mdb-color lighten-3 pt-4 fot">
  <!-- Copyright -->
  <div class="footer-copyright text-center py-3 forText">
    <div class="tamI">
      <a href="https://www.instagram.com/michelleaccesorios/" class="fa fa-instagram fa-inverse" target="_blank"></a>
      <a href="https://www.facebook.com/michelleaccesorios/" class="fa fa-facebook fa-inverse" target="_blank"></a>
    </div>
    © Michelle Accesorios<br>servicioalcliente@michelle.com.mx
  </div>
   <!-- Copyright -->
</footer>
</body>
</html>
