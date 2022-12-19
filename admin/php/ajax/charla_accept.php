<?php session_start();

error_reporting(E_ALL);

ini_set('display_errors', '1');


include "../model/connect.php";

$id_charla = $_POST['id'];
$id_user = $_SESSION['id'];



$sql =	"UPDATE `charlas_colaboradores` 
				SET `aprobado` = 2    
				WHERE `id_colaborador` = $id_user AND `id_charla` = $id_charla; "; 
     

//print $sql;
//mysql_query($sql,$conexion);
$result = $mysqli->query($sql);


print "OK";
?>
