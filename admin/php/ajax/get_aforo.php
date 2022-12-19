<?php session_start();

error_reporting(E_ALL);
ini_set('display_errors', '1');

include "../model/connect.php";

$id_usuario = $_SESSION['id'];
$id_empresa = $_SESSION['empresa'];
$id_sala	= $_SESSION['sala'];

//Obtener aforo de la sala:
$aforo = 0;
$nombre_sala = "";

	$agno_actual = date("Y");;
	$mes_actual = date("m");
	$dia_actual = date("d");
	$dia = intval ($dia_actual);

	if ($mes_actual<"10")
		$mes_actual = "0" . $mes_actual;
	

	if ($dia_actual < "10")
		$dia_actual = "0" . $dia_actual;

	$fecha_actual = $agno_actual . "-" . $mes_actual . "-" . $dia_actual;


//$sql =	" SELECT `id`, `id_empresa`, `descripcion`, `nombre`, `contacto`, `fono`, `email`, `aforo`, `direccion`, `latitud`, `longitud`, `region`, `comuna`, `activo` FROM `sala` WHERE id = $id_sala; ";
	
$sql = " SELECT `id`, `id_sala`, `id_vacuna`, `nombre_vacuna`, `observaciones`, `activo`, `stock`, `fecha`, `inoculadas` FROM `vacunas` WHERE fecha = '$fecha_actual' AND id_sala = $id_sala ";


$result = $mysqli->query($sql);

	$num = mysqli_num_rows($result);

	$txt = "";

	if ($num>0){	
	while ($row = $result->fetch_assoc())
	  {

	  	$txt .= "<h4>" . $row["nombre_vacuna"] . ": <span style='color:red;'>" . $row["inoculadas"] . " </span> de " . $row["stock"] . "</h4>";
		
		
	  }	
	}




/*
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
*/

//print $nombre_sala . "|" . $aforo . "|" . $nueva_cantidad;
	print $txt;
?>
