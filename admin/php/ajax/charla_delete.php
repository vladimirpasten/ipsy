<?php session_start();

error_reporting(E_ALL);

ini_set('display_errors', '1');


include "../model/connect.php";

$id_usuario = $_POST['id'];

	$sql =	"UPDATE `charlas` SET `activo`= 0 WHERE id = $id_usuario   ";


//print $sql;
//mysql_query($sql,$conexion);
$result = $mysqli->query($sql);

		//actualizar especialidades:
		$sql = " DELETE FROM `charlas_colaboradores` WHERE `id_charla` = $id_usuario; ";
		$result = $mysqli->query($sql);

		//actualizar colaboradores:
		$sql = " DELETE FROM `charlas_especialidades` WHERE `id_charla` = $id_usuario; ";
		$result = $mysqli->query($sql);




print "OK";
?>
