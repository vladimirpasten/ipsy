<?php

function get_users_accepted($id="", $id_terapia=""){

	include "php/model/connect.php";

	$sql = " SELECT m.id, m.nombre, m.rut, m.fecha_nacimiento, m.login, m.mail, m.password, m.fono, m.aceptado, m.admin, m.activo, m.observaciones, m.url_foto FROM `medicos` as m  ";

	$sql2 = "";
	if ($id_terapia !=""){

		$sql .= " INNER JOIN psico_especialidades pse ON pse.id_psicologo = m.id ";
		$sql2 = " AND pse.id_especialidad = $id_terapia ";

	}

	$sql3 = "";
	if ($id != ""){
		$sql3 = " AND m.id = $id " ;


	}


	$sql .= " WHERE aceptado = 1 and activo = 1 $sql2  $sql3 ;";



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
	  	$fecha_nacimiento = $row["fecha_nacimiento"];
	  	$login = $row["login"];
	  	
	  	$email = $row["mail"];

	  	$fono = $row["fono"];
	  	$admin = $row["admin"];
	  	$rut = $row["rut"];

	  	$foto = $row["url_foto"];
	  	$observaciones = $row["observaciones"];

		$array_[$count] = array("id" => $id,
								"nombre" => $nombre,
								"fecha_nacimiento" => $fecha_nacimiento,
								"email" => $email,
								"login" => $login,

								"admin" => $admin,
								"rut" => $rut,
								
								"fono" => $fono,

								"curriculum" => "",
								"foto" => $foto,
								"resumen" => $observaciones


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


function get_horario($id_user){


	include "php/model/connect.php";

	$sql = " SELECT `id`, `id_user`, `lunes`, `martes`, `miercoles`, `jueves`, `viernes`, `sabado`, `domingo`, `inicio_lunes`, `inicio_martes`, `inicio_miercoles`, `inicio_jueves`, `inicio_viernes`, `inicio_sabado`, `inicio_domingo`, `final_lunes`, `final_martes`, `final_miercoles`, `final_jueves`, `final_viernes`, `final_sabado`, `final_domingo`, `descanso_inicio_lunes`, `descanso_inicio_martes`, `descanso_inicio_miercoles`, `descanso_inicio_jueves`, `descanso_inicio_viernes`, `descanso_inicio_sabado`, `descanso_inicio_domigo`, `descanso_fin_lunes`, `descanso_fin_martes`, `descanso_fin_miercoles`, `descanso_fin_jueves`, `descanso_fin_viernes`, `descanso_fin_sabado`, `descanso_fin_domingo` FROM `horarios` WHERE id_user = $id_user; ";


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
	  	$id_user = $row["id_user"];


		$array_[$count] = array("id" => $row["id"],

								"lunes" => $row["lunes"],
								"martes" => $row["martes"],
								"miercoles" => $row["miercoles"],
								"jueves" => $row["jueves"],
								"viernes" => $row["viernes"],
								"sabado" => $row["sabado"],
								"domingo" => $row["domingo"],

								 "inicio_lunes" => $row["inicio_lunes"], 
								 "inicio_martes" => $row["inicio_martes"],
								 "inicio_miercoles" => $row["inicio_miercoles"],
								 "inicio_jueves" => $row["inicio_jueves"],
								 "inicio_viernes" => $row["inicio_viernes"],
								 "inicio_sabado" => $row["inicio_sabado"],
								 "inicio_domingo" => $row["inicio_domingo"],

								 "final_lunes" => $row["final_lunes"],
								 "final_martes" => $row["final_martes"],
								 "final_miercoles" => $row["final_miercoles"],
								 "final_jueves" => $row["final_jueves"],
								 "final_viernes" => $row["final_viernes"],
								 "final_sabado" => $row["final_sabado"],
								 "final_domingo" => $row["final_domingo"],

								 "descanso_inicio_lunes" => $row["descanso_inicio_lunes"],
								 "descanso_inicio_martes" => $row["descanso_inicio_martes"],
								 "descanso_inicio_miercoles" => $row["descanso_inicio_miercoles"],
								 "descanso_inicio_jueves" => $row["descanso_inicio_jueves"],
								 "descanso_inicio_viernes" => $row["descanso_inicio_viernes"],
								 "descanso_inicio_sabado" => $row["descanso_inicio_sabado"],
								 "descanso_inicio_domingo" => $row["descanso_inicio_domigo"],

								 "descanso_fin_lunes" => $row["descanso_fin_lunes"],
								 "descanso_fin_martes" => $row["descanso_fin_martes"],
								 "descanso_fin_miercoles" => $row["descanso_fin_miercoles"],
								 "descanso_fin_jueves" => $row["descanso_fin_jueves"],
								 "descanso_fin_viernes" => $row["descanso_fin_viernes"],
								 "descanso_fin_sabado" => $row["descanso_fin_sabado"],
								 "descanso_fin_domingo" => $row["descanso_fin_domingo"]


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


function get_horas_tomadas($fecha, $terapeuta){

	include "php/model/connect.php";

	$array_fecha = explode("-", $fecha);
	$fecha2 = $array_fecha[2] . "-" . $array_fecha[1] . "-" . $array_fecha[0];

	$sql = " SELECT `id`, `hora_inicio`, `hora_fin`, `fecha`, `id_paciente`, `id_terapeuta`, `activo` FROM `toma_horas` WHERE  id_terapeuta = $terapeuta AND fecha = '$fecha2'; ";

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

		$array_[$count] = array("id" => $row["id"],

								"hora_inicio" => $row["hora_inicio"],
								"hora_fin" => $row["hora_fin"],
								"fecha" => $row["fecha"]

		);

		$count++;
	  }

	include 'php/model/desconectar.php';
	return array( "xml" => $xml , "array" => $array_ );

}


function get_link($id_terapeuta){

   include "php/model/connect.php";
    $sql = " SELECT `link_pago` FROM `medicos` WHERE id = $id_terapeuta; ";

//print($sql);
	$array_ = array();
	$xml = "";
	$count = 0;

	$txt = "";
//	$result=mysql_query($sql, $conexion);  
//    while ($row=@mysql_fetch_array($result))
	$result = $mysqli->query($sql);
	$num = mysqli_num_rows($result);
	if ($num>0)
	while ($row = $result->fetch_assoc())
	  {
	  	$link = $row["link_pago"];
		$count++;
	  }

	//include 'php/model/desconectar.php';
	$mysqli->close();  

 return $link;

}


?>