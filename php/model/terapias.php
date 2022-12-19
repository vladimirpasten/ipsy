<?php




function get_terapias(){

	include "php/model/connect.php";

	//$sql = " SELECT `id`, `nombre`, `codigo`, `observaciones`, `activo` FROM `terapias` WHERE activo = 1; ";
	$sql = " SELECT `id`, `nombre` FROM `especialidades` WHERE activo = 1; ";


	$array_ = array();
	$xml = "";
	$count = 0;
//	$result=mysql_query($sql, $conexion);  
//    while ($row=@mysql_fetch_array($result))
	$result = $mysqli->query($sql);
	$num = mysqli_num_rows($result);
	if ($num>0)
	while ($row = $result->fetch_assoc())

	  {
	  	$id = $row["id"];
	  	$nombre = $row["nombre"];
	  	//$codigo = $row["codigo"];
	  	//$observaciones = $row["observaciones"];

		$array_[$count] = array("id" => $id,
								"nombre" => $nombre
							);

		$count++;

	  }

	include 'php/model/desconectar.php';
	return array( "xml" => $xml , "array" => $array_ );

}



?>


