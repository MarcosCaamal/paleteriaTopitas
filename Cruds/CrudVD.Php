<?php
include_once 'Db.php';
/* Codigo para Insertar Datos */
if(isset($_POST['guardar']))
{
	echo "Guardandoooooooooooooooooooo";
  $Producto_idProducto = $MySQLiconn->real_escape_string($_POST['idProducto']);
  $cantidadProducto = $MySQLiconn->real_escape_string($_POST['cantidadProducto']);
  $precioV= "SELECT producto.precioVenta FROM producto WHERE producto.idProducto ='$Producto_idProducto'"; $SQL = $MySQLiconn->query($precioV);
  if ($row = $SQL->fetch_array()) {  $pv=$row['precioVenta'];  }
  $subtotal = $cantidadProducto * $pv;  
  $rs ="SELECT max(idVentas) as id from ventas"; $SQL=$MySQLiconn->query($rs);
  if ($row = $SQL->fetch_array()) { $Ventas_idVentas = trim($row[0]); }
  $SQL = $MySQLiconn->query("INSERT INTO detalleventa(Producto_idProducto,Ventas_idVentas,cantidadProducto,subtotal) VALUES ('$Producto_idProducto','$Ventas_idVentas','$cantidadProducto','$subtotal')");
  if(!$SQL){
   echo $MySQLiconn->error;
  } 
  header("Location:../paginas/ventas.php");
}

/* Codigo para eliminar Datos */
if(isset($_GET['eliminar']))
{
 $SQL = $MySQLiconn->query("DELETE FROM detalleventa WHERE Producto_idProducto=".$_GET['eliminar']);
 header("Location:../paginas/ventas.php");
}

/* Codigo para Editar Datos */
if(isset($_GET['editar']))
{
  $rs ="SELECT max(idVentas) as id from ventas"; $SQL=$MySQLiconn->query($rs);
  if ($row = $SQL->fetch_array()) { $Ventas_idVentas = trim($row[0]); }
 $SQL = $MySQLiconn->query("SELECT * FROM detalleventa WHERE 
 Ventas_idVentas = '$Ventas_idVentas' AND Producto_idProducto=".$_GET['editar']);
 $getROW = $SQL->fetch_array();
}

/* Codigo para Actualizar Datos */
if(isset($_POST['actualizar']))
{
  $precioV= "SELECT producto.precioVenta FROM producto WHERE producto.idProducto ='".$_POST['idProducto']."'";$SQL = $MySQLiconn->query($precioV);
  if ($row = $SQL->fetch_array()) { $pv=$row['precioVenta']; }

  $rs ="SELECT max(idVentas) as id from ventas"; $SQL=$MySQLiconn->query($rs);
  if ($row = $SQL->fetch_array()) { $Ventas_idVentas = trim($row[0]); }
  $subtotal = $_POST['cantidadProducto'] * $pv; 

  $SQL = $MySQLiconn->query("UPDATE detalleventa SET Producto_idProducto='".$_POST['idProducto']."', 
  Ventas_idVentas='".$Ventas_idVentas."', cantidadProducto='".$_POST['cantidadProducto']."', 
  subtotal='".$subtotal."' WHERE Ventas_idVentas = '$Ventas_idVentas' AND Producto_idProducto=".$_GET['editar']);
  header("Location:../paginas/ventas.php");
}
?>