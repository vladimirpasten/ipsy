<?php session_start();

error_reporting(E_ALL);

ini_set('display_errors', '1');

include "../model/connect.php";

	$txt = $_POST["txt"];


	$sql = " SELECT s.id, s.id_empresa, s.descripcion, s.nombre, s.contacto, s.fono, s.email, s.aforo, s.direccion, s.latitud, s.longitud, s.region, s.comuna, s.activo, e.nombre as nombre_empresa "; 
	$sql .= " FROM sala as s INNER JOIN empresa as e ON e.id = s.id_empresa";
	$sql .= " WHERE s.nombre LIKE '%" . $txt . "%' OR s.direccion LIKE '%" . $txt . "%' OR s.comuna LIKE '%".$txt."%' ";

	$sql .= " ORDER BY s.id ASC;";


	$array_ = array();
	$txt = "";
	$count = 0;

	$result = $mysqli->query($sql);
	$num = mysqli_num_rows($result);

	if ($num>0)
		while ($row = $result->fetch_assoc())
		  {

		  	if ($txt != "")
		  		$txt .= "#";

		  	$txt .= $row["id"] . "|";
		  	$txt .= $row["id_empresa"] . "|";
		  	$txt .= $row["nombre_empresa"] . "|"; 
		  	$txt .= $row["descripcion"] . "|";
		  	$txt .= $row["aforo"]. "|" ;
			$txt .= $row["direccion"]. "|"  ;
			
			$id_sala = $row["id"];

			$count++;


			$sql =	"SELECT `cantidad`  ";
			$sql .= " FROM `asistentes` WHERE  id_sala = $id_sala ORDER BY id DESC LIMIT 1;";
		//print($sql);
			$result2 = $mysqli->query($sql);

			$nueva_cantidad = 0;
			$num = mysqli_num_rows($result2);

			if ($num>0){	
			while ($row2 = $result2->fetch_assoc())
			  {
				$nueva_cantidad = $row2["cantidad"];
			  }	
			}
			$txt .= $nueva_cantidad;

		  }

	//include 'php/model/desconectar.php';
	$mysqli->close();  

 print $txt;
?>
