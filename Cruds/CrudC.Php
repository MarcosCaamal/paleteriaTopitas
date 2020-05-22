<?php
include_once '../Cruds/Db.php';
$rs ="SELECT max(idcompras) as id from compras"; $SQL=$MySQLiconn->query($rs);
if ($row = $SQL->fetch_array()) { $idcompras = trim($row[0]); }
/* Codigo para Insertar Datos */
if(isset($_POST['guardar']))
{
	 echo "Guardandoooooooooooooooooooo";
     $fechaCompra = $MySQLiconn->real_escape_string($_POST['fechaCompra']);
  $SQL = $MySQLiconn->query("INSERT INTO compras(precioCostoProducto, fechaCompra, cantidad) VALUES ('0', '$fechaCompra', '0')");
  if(!$SQL)
  {
   echo $MySQLiconn->error;
  } 
  header("Location:../paginas/compras.php");
}

/* Codigo para eliminar Datos */
if(isset($_GET['eliminar']))
{
 $SQL = $MySQLiconn->query("DELETE FROM compras WHERE idcompras=".$idcompras);
 header("Location:../paginas/compras.php");
}

/* Codigo para Editar Datos */
if(isset($_GET['editar']))
{
 $SQL = $MySQLiconn->query("SELECT * FROM compras WHERE idcompras=".$idcompras);
 $getROW = $SQL->fetch_array();
}

/* Codigo para Actualizar Datos */
if(isset($_POST['actualizar']))
{
 $SQL = $MySQLiconn->query("UPDATE compras SET fechaCompra='".$_POST['fechaCompra']."' WHERE idcompras=".$idcompras);
 header("Location:../paginas/compras.php");
}
?>