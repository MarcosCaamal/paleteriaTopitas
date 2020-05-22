<?php
include_once '../Cruds/Db.php';
require '../funciones.php';
/* Codigo para Insertar Datos */
$errores ='';
if(isset($_POST['guardar']))
{
  $nombre = $MySQLiconn->real_escape_string($_POST['nombre']);
  $precioVenta = $MySQLiconn->real_escape_string($_POST['precioVenta']);
  $costoCompra = $MySQLiconn->real_escape_string($_POST['costoCompra']); 
  $stockActual = $MySQLiconn->real_escape_string($_POST['stockActual']);
  $stockMinimo = $MySQLiconn->real_escape_string($_POST['stockMinimo']);
  $stockMaximo = $MySQLiconn->real_escape_string($_POST['stockMaximo']);
  $descripcion = $MySQLiconn->real_escape_string($_POST['descripcion']);
  $estado      =   $MySQLiconn->real_escape_string($_POST['estado']);
  if($_SERVER['REQUEST_METHOD']=='POST'){
    $nombre       = limpiarDatos($_POST['nombre']);
    $precioVenta  = limpiarDatos($_POST['precioVenta']);
    $costoCompra  = limpiarDatos($_POST['costoCompra']);
    $stockActual  = limpiarDatos($_POST['stockActual']);
    $stockMinimo  = limpiarDatos($_POST['stockMinimo']);
    $stockMaximo  = limpiarDatos($_POST['stockMaximo']);
    $descripcion  = limpiarDatos($_POST['descripcion']);
    $estado       = limpiarDatos($_POST['estado']);
  }
  if (empty($nombre) or empty($precioVenta) or empty($costoCompra) or empty($stockActual) or empty($stockMinimo) or empty($stockMaximo) or empty($descripcion) or empty($estado)){
    $errores .="<li>Por favor rellena todos los datos correctamente</li>";     
  }else{

  $SQL = $MySQLiconn->query("INSERT INTO producto(nombre,precioVenta,costoCompra,stockActual,stockMinimo,stockMaximo,descripcion, estado) VALUES('$nombre','$precioVenta','$costoCompra','$stockActual','$stockMinimo','$stockMaximo','$descripcion','$estado')");
  if(!$SQL)
  {
   echo $MySQLiconn->error;
  }
  header("Location:../paginas/producto.php");
  }
}

/* Codigo para eliminar Datos */
if(isset($_GET['eliminar']))
{
 $SQL = $MySQLiconn->query("DELETE FROM producto WHERE idProducto=".$_GET['eliminar']);
 header("Location:../paginas/producto.php");
}


/* Codigo para Editar Datos */
if(isset($_GET['editar']))
{
 $SQL = $MySQLiconn->query("SELECT * FROM producto WHERE idProducto=".$_GET['editar']);
 $getROW = $SQL->fetch_array();
}

/* Codigo para Actualizar Datos */
if(isset($_POST['actualizar']))
{
  if (empty($_POST['nombre']) or empty($_POST['precioVenta']) or empty($_POST['costoCompra']) or empty($_POST['stockActual']) or empty($_POST['stockMinimo']) or empty($_POST['stockMaximo']) or empty($_POST['descripcion'])  or empty($_POST['estado'])            ){
    $errores .="<li>Por favor rellena todos los datos correctamente</li>";     
  }else{
 $SQL = $MySQLiconn->query("UPDATE producto SET nombre ='".$_POST['nombre']."', precioVenta='".$_POST['precioVenta']."', costoCompra='".$_POST['costoCompra']."' ,stockActual='".$_POST['stockActual']."',stockMinimo='".$_POST['stockMinimo']."', stockMaximo='".$_POST['stockMaximo']."',descripcion='".$_POST['descripcion']."', estado='".$_POST['estado']."' WHERE idProducto=".$_GET['editar']);
 header("Location:../paginas/producto.php");
  }
}
?>
