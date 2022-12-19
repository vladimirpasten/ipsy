<?php

function get_charlas($id = "", $id_user = ""){

	include "../php/model/connect.php";

	$sql2 = "";
	if ($id != ""){
		$sql2 = " and id = $id ";

	}

	$sql = " SELECT `id`, `titulo`, `fecha`, `texto`, `foto1`, `fecha`, hora,  `activo` FROM `charlas` WHERE  activo = 1 $sql2  ";

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
	  	$hora = $row["hora"];
	  	$texto = $row["texto"];
	  	
	  	$foto1 = $row["foto1"];

		$array_[$count] = array("id" => $id,
								"titulo" => $titulo,
								"fecha" => $fecha,
								"hora" => $hora,
								"texto" => $texto,
								"foto1" => $foto1


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






function get_solicitudes($id = "", $id_user = ""){

	include "../php/model/connect.php";

	$sql2 = "";
	if ($id != ""){
		$sql2 = " and id = $id ";

	}

	$sql = " SELECT c.id as id, `titulo` as titulo, `fecha` as fecha, `texto` as texto, `foto1` as foto1, `fecha` as fecha, hora as hora,  c.activo, m.nombre as nombre_m
			 	FROM `charlas` as c 
			 		INNER JOIN charlas_colaboradores as cc ON c.id = cc.id_charla 
			 		INNER JOIN medicos as m ON c.id_autor = m.id
			 	WHERE  c.activo = 1 AND aprobado = 0  $sql2   ";

	if ($id_user!=""){
		$sql .= " AND cc.id_colaborador = $id_user ";
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
	  	$hora = $row["hora"];
	  	$texto = $row["texto"];
	  	
	  	$foto1 = $row["foto1"];
	  	$nombre_m = $row["nombre_m"];

		$array_[$count] = array("id" => $id,
								"titulo" => $titulo,
								"fecha" => $fecha,
								"hora" => $hora,
								"texto" => $texto,
								"foto1" => $foto1,
								"nombre" => $nombre_m


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



function get_charlas_aprobadas($id = "", $id_user = ""){


	include "../php/model/connect.php";

	$sql2 = "";
	if ($id != ""){
		$sql2 = " and id = $id ";

	}

	$sql = " SELECT c.id as id, `titulo` as titulo, `fecha` as fecha, `texto` as texto, `foto1` as foto1, `fecha` as fecha, hora as hora,  c.activo, m.nombre as nombre_m
			 	FROM `charlas` as c 
			 		INNER JOIN charlas_colaboradores as cc ON c.id = cc.id_charla 
			 		INNER JOIN medicos as m ON c.id_autor = m.id
			 	WHERE  c.activo = 1 AND aprobado = 2  $sql2   ";

	if ($id_user!=""){
		$sql .= " AND cc.id_colaborador = $id_user ";
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
	  	$hora = $row["hora"];
	  	$texto = $row["texto"];
	  	
	  	$foto1 = $row["foto1"];
	  	$nombre_m = $row["nombre_m"];

		$array_[$count] = array("id" => $id,
								"titulo" => $titulo,
								"fecha" => $fecha,
								"hora" => $hora,
								"texto" => $texto,
								"foto1" => $foto1,
								"nombre" => $nombre_m


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

function get_inscritos($id_charla){

	include "../php/model/connect.php";

	$sql2 = "";
	if ($id_charla != ""){
		$sql2 = " and id = $id_charla ";

	}

	$sql = " SELECT `id`, `nombre`, `rut`, `email`, `fono`, `id_charla`, `activo` FROM `charlas_inscripciones` WHERE id_charla = $id_charla   ";

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
	  	$rut = $row["rut"];
	  	$email = $row["email"];
	  	$fono = $row["fono"];

		$array_[$count] = array("id" => $id,
								"nombre" => $nombre,
								"rut" => $rut,
								"email" => $email,
								"fono" => $fono

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