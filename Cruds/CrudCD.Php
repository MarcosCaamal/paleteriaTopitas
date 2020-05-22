<?php
include_once 'Db.php';
/* Codigo para Insertar Datos */
if(isset($_POST['guardar']))
{
  $Producto_idProducto = $MySQLiconn->real_escape_string($_POST['idProducto']);
  $cantidadProducto = $MySQLiconn->real_escape_string($_POST['cantidadProducto']);
  $costoP= "SELECT producto.costoCompra FROM producto WHERE producto.idProducto ='$Producto_idProducto'"; $SQL = $MySQLiconn->query($costoP);
  if ($row = $SQL->fetch_array()) {  $co=$row['costoCompra']; }
  $subtotal = $cantidadProducto * $co;  
  $rs ="SELECT max(idcompras) as id from compras"; $SQL=$MySQLiconn->query($rs);
  if ($row = $SQL->fetch_array()) { $compras_idcompras = trim($row[0]); }
  $SQL = $MySQLiconn->query("INSERT INTO detallecompra(Producto_idProducto,compras_idcompras,cantidadProducto,subtotal) VALUES ('$Producto_idProducto','$compras_idcompras','$cantidadProducto','$subtotal')");
  if(!$SQL)
  {
   echo $MySQLiconn->error;
  } 
  header("Location:compras.php");
}

/* Codigo para eliminar Datos */
if(isset($_GET['eliminar']))
{
 $SQL = $MySQLiconn->query("DELETE FROM detallecompra WHERE Producto_idProducto=".$_GET['eliminar']);
 header("Location:compras.php");
}

/* Codigo para Editar Datos */
if(isset($_GET['editar']))
{
  $rs ="SELECT max(idcompras) as id from compras"; $SQL=$MySQLiconn->query($rs);
  if ($row = $SQL->fetch_array()) { $compras_idcompras = trim($row[0]); }
 $SQL = $MySQLiconn->query("SELECT * FROM detallecompra WHERE compras_idcompras = '$compras_idcompras' 
 AND Producto_idProducto=".$_GET['editar']);
 $getROW = $SQL->fetch_array();
}

/* Codigo para Actualizar Datos */
if(isset($_POST['actualizar']))
{
  $costoP= "SELECT producto.costoCompra FROM producto WHERE producto.idProducto ='".$_POST['idProducto']."'";$SQL = $MySQLiconn->query($costoP);
  if ($row = $SQL->fetch_array()) { $co=$row['costoCompra']; }

  $rs ="SELECT max(idcompras) as id from compras"; $SQL=$MySQLiconn->query($rs);
  if ($row = $SQL->fetch_array()) { $compras_idcompras = trim($row[0]); }
  $subtotal = $_POST['cantidadProducto'] * $co; 

  $SQL = $MySQLiconn->query("UPDATE detallecompra SET Producto_idProducto='".$_POST['idProducto']."', compras_idcompras='".$compras_idcompras."', cantidadProducto='".$_POST['cantidadProducto']."', subtotal='".$subtotal."' 
  WHERE compras_idcompras = '$compras_idcompras' AND Producto_idProducto=".$_GET['editar']);
  header("Location:compras.php");
}
?>