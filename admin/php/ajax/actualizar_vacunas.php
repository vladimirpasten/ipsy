<?php session_start();

error_reporting(E_ALL);

ini_set('display_errors', '1');


include "../model/connect.php";

$id_usuario = $_SESSION['id'];
$id_empresa = $_SESSION['empresa'];
$id_sala	= $_SESSION['sala'];

$suma = $_POST["suma"];
$vacuna = $_POST["id_vacuna"];

	$agno_actual = date("Y");;
	$mes_actual = date("m");
	$dia_actual = date("d");
	$dia = intval ($dia_actual);

	if ($mes_actual<"10")
		$mes_actual = "0" . $mes_actual;
	

	if ($dia_actual < "10")
		$dia_actual = "0" . $dia_actual;

	$fecha_actual = $agno_actual . "-" . $mes_actual . "-" . $dia_actual;


//Calcular nueva cantidad:
	$sql =	"SELECT `id`, `id_sala`, `id_vacuna`, `nombre_vacuna`, `observaciones`, `activo`, `stock`, `fecha`, `inoculadas` FROM `vacunas` WHERE fecha = '$fecha_actual' AND id_vacuna = $vacuna AND id_sala = $id_sala LIMIT 1;";
//print($sql);
	$result = $mysqli->query($sql);

	$nueva_cantidad = 0;
	$num = mysqli_num_rows($result);

	if ($num>0){	
	while ($row = $result->fetch_assoc())
	  {
		$nueva_cantidad = $row["inoculadas"];
	  }	
	}

	$nueva_cantidad = intval($nueva_cantidad) + intval($suma);
	$fecha = date("Y-m-d");
	$hora = date('H:i:s');

	$sql =	"UPDATE `vacunas` SET `inoculadas`= $nueva_cantidad WHERE fecha = '$fecha_actual' AND id_vacuna = $vacuna AND id_sala = $id_sala ";

//print $sql;
//mysql_query($sql,$conexion);
$result = $mysqli->query($sql);

print $nueva_cantidad;
?>
