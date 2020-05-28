<?php
include_once '../Cruds/Db.php';

$rs ="SELECT max(idVentas) as id from ventas"; $SQL=$MySQLiconn->query($rs);
if ($row = $SQL->fetch_array()) { $Ventas_idVentas = trim($row[0]); }
/* Codigo para Insertar Datos */
if(isset($_POST['guardar']))
{
  $fechaVenta = $MySQLiconn->real_escape_string($_POST['fechaVenta']);
  $descuento = $MySQLiconn->real_escape_string($_POST['descuento']);
  $SQL = $MySQLiconn->query("INSERT INTO ventas(totalProductoVendido, fechaVenta, importeTotal,descuento) VALUES ('0', '$fechaVenta', '0','$descuento')");
  if(!$SQL)
  {
   echo $MySQLiconn->error;
  } 
  header("Location:../paginas/ventasEm.php");
}

/* Codigo para eliminar Datos */
if(isset($_GET['eliminar']))
{
 $SQL = $MySQLiconn->query("DELETE FROM ventas WHERE idVentas=".$Ventas_idVentas);
 header("Location:../paginas/ventasEm.php");
}

/* Codigo para Editar Datos */
if(isset($_GET['editar']))
{
 $SQL = $MySQLiconn->query("SELECT * FROM ventas WHERE idVentas=".$Ventas_idVentas);
 $getROW = $SQL->fetch_array();
}

/* Codigo para Actualizar Datos */
if(isset($_POST['actualizar']))
{
 $SQL = $MySQLiconn->query("UPDATE ventas SET fechaVenta='".$_POST['fechaVenta']."', descuento='".$_POST['descuento']."'  WHERE idVentas=".$Ventas_idVentas);
 header("Location:../paginas/ventasEm.php");
}
?>