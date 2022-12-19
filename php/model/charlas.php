<?php

function get_charlas($fecha1, $fecha2){

	include "php/model/connect.php";

	$sql = " SELECT ch.id, ch.titulo, ch.fecha, ch.hora, ch.texto, ch.foto1, ch.id_autor, ch.activo, m.nombre  
				FROM `charlas` as ch INNER JOIN medicos as m ON m.id = ch.id_autor  
				WHERE `fecha` BETWEEN '$fecha1' AND '$fecha2' AND ch.activo = 1  ";

	$sql .= " ORDER BY fecha DESC; ";

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

	  	$hora = $row["hora"];
	  	$id_autor = $row["id_autor"];

	  	$autor = $row["nombre"]; 

		$array_[$count] = array("id" => $id,
								"titulo" => $titulo,
								"fecha" => $fecha,
								"texto" => $texto,
								"foto1" => $foto1,

								"hora" => $hora,
								"id_autor" => $id_autor,
								"autor" => $autor

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


function get_charla($id){

	include "php/model/connect.php";

	$sql = " SELECT ch.id, ch.titulo, ch.fecha, ch.hora, ch.texto, ch.foto1, ch.id_autor, ch.activo, m.nombre, ch.link_pago  
				FROM `charlas` as ch INNER JOIN medicos as m ON m.id = ch.id_autor  
				WHERE ch.id = $id AND ch.activo = 1  ";

	$sql .= " ORDER BY fecha DESC; ";

print $sql;
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

	  	$hora = $row["hora"];
	  	$id_autor = $row["id_autor"];

	  	$autor = $row["nombre"];
	  	$link_pago = $row["link_pago"]; 

		$array_[$count] = array("id" => $id,
								"titulo" => $titulo,
								"fecha" => $fecha,
								"texto" => $texto,
								"foto1" => $foto1,

								"hora" => $hora,
								"id_autor" => $id_autor,
								"autor" => $autor,
								"link_pago" => $link_pago	

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