<?php 
/*
'mysql' => array(
			'driver'    => 'mysql',
			'host'      => 'localhost',
			'database'  => 'bifacecl_mqv',
			'username'  => 'bifacecl_mqv',
			'password'  => 'biface_2015',
			'charset'   => 'utf8',
			'collation' => 'utf8_spanish_ci',
			'prefix'    => '',
		),

*/


$db_host="127.0.0.1";
$db_usuario="root";
$db_password="";
$db_nombre="app";





$db_host="mysql.ecoliderazgo.cl";
$db_usuario="vladimirguaguash";
$db_password="sabadote1801";
$db_nombre="ipsy";

$mysqli = new mysqli($db_host, $db_usuario,  $db_password, $db_nombre);
$mysqli->set_charset("utf8");

//$conexion = @mysql_connect($db_host, $db_usuario, $db_password) or die(mysql_error());
//mysql_query("SET NAMES 'utf8'");
//$db = @mysql_select_db($db_nombre, $conexion) or die(mysql_error());


?>