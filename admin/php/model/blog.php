<?php

function get_blogs($id = "", $id_user = ""){

	include "../php/model/connect.php";

	$sql2 = "";
	if ($id != ""){
		$sql2 = " and id = $id ";

	}

	$sql = " SELECT `id`, `titulo`, `fecha`, `texto`, `foto1`, `foto2`, `foto3`, `activo` FROM `blog` WHERE  activo = 1 $sql2  ";

	if ($id_user!=""){
		$sql .= " AND id_autor = $id_user ";
	}

	$sql .= "ORDER BY fecha DESC;";
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
	  	$id = $row["id"];
	  	$titulo = $row["titulo"];
	  	$fecha = $row["fecha"];
	  	$texto = $row["texto"];
	  	
	  	$foto1 = $row["foto1"];

	  	$foto2 = $row["foto2"];
	  	$foto3 = $row["foto3"];


		$array_[$count] = array("id" => $id,
								"titulo" => $titulo,
								"fecha" => $fecha,
								"texto" => $texto,
								"foto1" => $foto1,

								"foto2" => $foto2,
								"foto3" => $foto3

		);

		$count++;
		/*
		$xml = "<calendario>";
		$xml .= "<id>".$id."</id>";
		$xml .= "<texto>".$texto."</texto>";
		$xml .= "<url_imagen>".$url_imagen."</url_imagen>";
		
		$xml .= "</calendario>";
		*/

	  }

	include 'php/model/desconectar.php';
	return array( "xml" => $xml , "array" => $array_ );

}



?>