<?php

include "../model/connect.php";

	$id_paciente = $_POST["id_paciente"];
	$id_terapeuta = $_POST["id_terapeuta"];

	$sql = " SELECT `id`, `fecha`, `id_paciente`, `id_terapeuta`, `activo`, texto FROM registro_sesion WHERE  id_paciente = $id_paciente AND id_terapeuta = $id_terapeuta ORDER BY id; ";

//print $sql;

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


            print $row["fecha"] . "\n" . $row["texto"];
		$count++;
	  }

	include '../php/model/desconectar.php';


 //print $txt;
?>
