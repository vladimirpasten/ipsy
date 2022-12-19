<?php session_start();

error_reporting(E_ALL);

ini_set('display_errors', '1');


include "../model/connect.php";

$id_usuario = $_POST['id'];

	$sql =	"UPDATE `pacientes` SET `activo`= 0 WHERE id = $id_usuario   ";


//print $sql;
//mysql_query($sql,$conexion);
$result = $mysqli->query($sql);

print "OK";
?>
