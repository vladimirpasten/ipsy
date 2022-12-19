<?php

include "../model/connect.php";

	$id = $_POST["id"];

	$sql = " SELECT `id`, `titulo`, `fecha`, `hora`, hora_fin, `texto`, `foto1`, `id_autor`, `link_pago`, `activo`   ";
	$sql .= " FROM `charlas`   ";
	$sql .= " WHERE 1 and activo = 1  ";
	if ($id!=0)
		$sql .= " and id = $id ";
	$sql .= " ORDER BY id ASC;";

//print $sql;

	$array_ = array();
	$txt = "";
	$count = 0;

	$result = $mysqli->query($sql);
	$num = mysqli_num_rows($result);

	if ($num>0)
		while ($row = $result->fetch_assoc())
		  {


		  	$txt .= $row["id"] . "|";
		  	$txt .= $row["titulo"] . "|";
		  	$txt .= $row["texto"] . "|" ;
		  	$txt .= $row["fecha"] . "|" ;
		  	$txt .= $row["hora"] . "|" ;
		  	$txt .= $row["hora_fin"] . "|" ;
			$txt .= $row["foto1"] . "|" ;
 		  	$txt .= $row["link_pago"];


			$count++;
			/*
			$xml = "<calendario>";
			$xml .= "<id>".$id."</id>";
			$xml .= "<texto>".$texto."</texto>";
			$xml .= "<url_imagen>".$url_imagen."</url_imagen>";
			
			$xml .= "</calendario>";
			*/

		  }

	//include 'php/model/desconectar.php';
	$mysqli->close();  

 print $txt;
?>
