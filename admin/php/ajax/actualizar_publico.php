<?php session_start();

error_reporting(E_ALL);

ini_set('display_errors', '1');


include "../model/connect.php";

$id_usuario = $_SESSION['id'];
$id_empresa = $_SESSION['empresa'];
$id_sala	= $_SESSION['sala'];

$suma = $_POST["suma"];


//Calcular nueva cantidad:
	$sql =	"SELECT `cantidad`  ";
	$sql .= " FROM `asistentes` WHERE  id_usuario = $id_usuario AND id_sala = $id_sala ORDER BY id DESC LIMIT 1;";
//print($sql);
	$result = $mysqli->query($sql);

	$nueva_cantidad = 0;
	$num = mysqli_num_rows($result);

	if ($num>0){	
	while ($row = $result->fetch_assoc())
	  {
		$nueva_cantidad = $row["cantidad"];
	  }	
	}

	$nueva_cantidad = intval($nueva_cantidad) + intval($suma);
	$fecha = date("Y-m-d");
	$hora = date('H:i:s');

	$sql =	"INSERT INTO `asistentes`( `id_sala`, `id_usuario`, `cantidad`, `fecha`, `hora`)   ";
	$sql .= " VALUES  ($id_sala,$id_usuario,$nueva_cantidad, '$fecha', '$hora')";

//print $sql;
//mysql_query($sql,$conexion);
$result = $mysqli->query($sql);

print $nueva_cantidad;
?>
