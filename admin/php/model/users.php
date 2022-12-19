<?php

function get_user($id){

	include "../php/model/connect.php";

	$sql = " SELECT `id`, `nombre`, `rut`, `fecha_nacimiento`, `login`, `mail`, `password`, `fono`, `observaciones`, `url_foto`, `url_curi`, `url_doc`, `aceptado`, `admin`, `activo`, link_pago FROM `medicos` WHERE id = $id; ";

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
	  	$curi = $row["url_curi"];
	  	$doc = $row["url_doc"];

	  	$resumen = $row["observaciones"];

	  	$link_pago = $row["link_pago"];


		$array_[$count] = array("id" => $id,
								"nombre" => $nombre,
								"fecha_nacimiento" => $fecha_nacimiento,
								"email" => $email,
								"login" => $login,

								"admin" => $admin,
								"rut" => $rut,
								
								"fono" => $fono,

								"curriculum" => $curi,
								"foto" => $foto,
								"doc" => $doc,
								"resumen" => $resumen,
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

function get_users_pending(){

	include "../php/model/connect.php";

	$sql = " SELECT `id`, `nombre`, `rut`, `fecha_nacimiento`, `login`, `mail`, `password`, `fono`, `aceptado`, `admin`, `activo`, url_foto, observaciones, url_curi, url_doc FROM `medicos` WHERE aceptado = 0  and activo = 1; ";

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
	  	$curi = $row["url_curi"];
	  	$doc = $row["url_doc"];

	  	$resumen = $row["observaciones"];


		$array_[$count] = array("id" => $id,
								"nombre" => $nombre,
								"fecha_nacimiento" => $fecha_nacimiento,
								"email" => $email,
								"login" => $login,

								"admin" => $admin,
								"rut" => $rut,
								
								"fono" => $fono,

								"curriculum" => $curi,
								"foto" => $foto,
								"doc" => $doc,
								"resumen" => $resumen


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



function get_users_accepted(){

	include "../php/model/connect.php";

	$sql = " SELECT `id`, `nombre`, `rut`, `fecha_nacimiento`, `login`, `mail`, `password`, `fono`, `aceptado`, `admin`, `activo`, url_foto, observaciones, url_curi, url_doc FROM `medicos` WHERE aceptado = 1 and activo = 1; ";

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
	  	$curi = $row["url_curi"];
	  	$doc = $row["url_doc"];

	  	$resumen = $row["observaciones"];



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

								"curriculum" => $curi,
								
								"doc" => $doc,
								"resumen" => $resumen


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


function get_pacientes(){

	include "../php/model/connect.php";

	$sql = " SELECT `id`, `nombre`, `rut`, `fecha_nacimiento`, `login`, `mail`, `password`, `fono`, `aceptado`, `admin`, `activo`, url_foto, observaciones FROM `pacientes` WHERE activo = 1; ";

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

	  	$resumen = $row["observaciones"];


		$array_[$count] = array("id" => $id,
								"nombre" => $nombre,
								"fecha_nacimiento" => $fecha_nacimiento,
								"email" => $email,
								"login" => $login,

								"admin" => $admin,
								"rut" => $rut,
								
								"fono" => $fono,

								"foto" => $foto,
								"resumen" => $resumen


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


	include "../php/model/connect.php";

	$sql = " SELECT `id`, `id_user`, `lunes`, `martes`, `miercoles`, `jueves`, `viernes`, `sabado`, `domingo`, `inicio_lunes`, `inicio_martes`, `inicio_miercoles`, `inicio_jueves`, `inicio_viernes`, `inicio_sabado`, `inicio_domingo`, `final_lunes`, `final_martes`, `final_miercoles`, `final_jueves`, `final_viernes`, `final_sabado`, `final_domingo`, `descanso_inicio_lunes`, `descanso_inicio_martes`, `descanso_inicio_miercoles`, `descanso_inicio_jueves`, `descanso_inicio_viernes`, `descanso_inicio_sabado`, `descanso_inicio_domigo`, `descanso_fin_lunes`, `descanso_fin_martes`, `descanso_fin_miercoles`, `descanso_fin_jueves`, `descanso_fin_viernes`, `descanso_fin_sabado`, `descanso_fin_domingo` FROM `horarios` WHERE id_user = $id_user; ";

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
								 "descanso_inicio_domigo" => $row["descanso_inicio_domigo"],

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

	include '../php/model/desconectar.php';
	return array( "xml" => $xml , "array" => $array_ );


}







function get_horas($id_user, $fecha){



   include "../php/model/connect.php";
    $sql = " SELECT th.id as id_th, th.hora_inicio, th.hora_fin, th.fecha, th.id_paciente as id_paciente, th.id_terapeuta, th.activo, th.correo_p, th.correo_t, th.fono, p.nombre as nombre, p.rut as rut, p.fecha_nacimiento as nacimiento  FROM `toma_horas` as th INNER JOIN pacientes as p ON p.id = th.id_paciente WHERE `fecha` = '$fecha' AND `id_terapeuta` = $id_user AND th.activo = 1 AND  p.activo = 1;";

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
	
		$array_[$count] = array("id" => $row["id_th"],

								"hora_inicio" => $row["hora_inicio"],
								"hora_fin" => $row["hora_fin"],
								"fecha" => $row["fecha"],
								"id_paciente" => $row["id_paciente"],
								"nombre_paciente" => $row["nombre"],
								"rut_paciente" => $row["rut"],
								"fecha_nacimiento" => $row["nacimiento"]
		);

		$count++;
	  }

	include '../php/model/desconectar.php';
	return array( "xml" => $xml , "array" => $array_ );

}





function get_horas_tomadas($fecha, $terapeuta){

	include "../php/model/connect.php";

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

	include '../php/model/desconectar.php';
	return array( "xml" => $xml , "array" => $array_ );

}



function get_ficha($id_user, $id_paciente,  $fecha){

	include "../php/model/connect.php";

	$array_fecha = explode("-", $fecha);
	$fecha2 = $fecha;//$array_fecha[2] . "-" . $array_fecha[1] . "-" . $array_fecha[0];

	$sql = " SELECT `id`, `fecha`, `id_paciente`, `id_terapeuta`, `activo`, texto FROM registro_sesion WHERE  id_paciente = $id_paciente AND id_terapeuta = $id_user ORDER BY id; ";



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

								"texto" => $row["texto"],
								"fecha" => $row["fecha"]

		);

		$count++;
	  }

	include '../php/model/desconectar.php';
	return array( "xml" => $xml , "array" => $array_ );


}


function get_pacientes_terapeuta($id_user){

	include "../php/model/connect.php";

	$sql = " SELECT DISTINCT p.id, p.nombre, p.rut, p.fecha_nacimiento, p.login, p.mail, p.fono, p.aceptado, p.url_foto, p.observaciones FROM `pacientes` p INNER JOIN toma_horas th ON p.id = th.id_paciente WHERE th.id_terapeuta = $id_user AND p.activo = 1; ";

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
	  	$rut = $row["rut"];

	  	$foto = $row["url_foto"];

	  	$resumen = $row["observaciones"];


		$array_[$count] = array("id" => $id,
								"nombre" => $nombre,
								"fecha_nacimiento" => $fecha_nacimiento,
								"email" => $email,
								"login" => $login,

								"rut" => $rut,
								
								"fono" => $fono,

								"foto" => $foto,
								"resumen" => $resumen


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