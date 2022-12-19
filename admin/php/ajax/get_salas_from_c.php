<?php session_start();

error_reporting(E_ALL);

ini_set('display_errors', '1');

include "../model/connect.php";

	$lat1 = $_POST["lat1"];
	$lng1 = $_POST["lng1"];

	$lat2 = $_POST["lat2"];
	$lng2 = $_POST["lng2"];

	$txt = $_POST["txt"]; 


	$sql = " SELECT s.id, s.id_empresa, s.descripcion, s.nombre, s.contacto, s.fono, s.email, s.aforo, s.direccion, s.latitud, s.longitud, s.region, s.comuna, s.activo, e.nombre as nombre_empresa "; 
	$sql .= " FROM sala as s INNER JOIN empresa as e ON e.id = s.id_empresa";
	$sql .= " WHERE latitud >= $lat1 AND latitud <= $lat2 ";
	$sql .= "       AND longitud >= $lng1 AND longitud <= $lng2 ";

	if ($txt!=""){
		$sql .= " AND s.nombre LIKE s.nombre LIKE '%" . $txt . "%' OR s.direccion LIKE '%" . $txt . "%' OR s.comuna LIKE '%".$txt."%' AND ";
	}

	$sql .= " ORDER BY s.id ASC;";

//print $sql;
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



			$agno_actual = date("Y");;
			$mes_actual = date("m");
			$dia_actual = date("d");
			$dia = intval ($dia_actual);

			if ($mes_actual<"10")
				$mes_actual = "0" . $mes_actual;
			

			if ($dia_actual < "10")
				$dia_actual = "0" . $dia_actual;

			$fecha_actual = $agno_actual . "-" . $mes_actual . "-" . $dia_actual;

			$sql = " SELECT `id`, `id_sala`, `id_vacuna`, `nombre_vacuna`, `observaciones`, `activo`, `stock`, `fecha`, `inoculadas` FROM `vacunas` WHERE fecha = '$fecha_actual' AND id_sala = $id_sala ";


			$result2 = $mysqli->query($sql);
			$num = mysqli_num_rows($result2);

			$txt .=  "0|" ;
			$txt .= $row["latitud"]. "|" ;
			$txt .= $row["longitud"] . "|";
			$txt .= $row["nombre"] . "|";

			if ($num>0){	
			while ($row2 = $result2->fetch_assoc())
			  {



				$txt .= $row2["nombre_vacuna"] . ":" .  $row2["inoculadas"] . " de " . $row2["stock"] . "\n<br>";
				/*
			  	$txt .= "<h4>" . $row["nombre_vacuna"] . ": <span style='color:red;'>" . $row["inoculadas"] . " </span> de " . $row["stock"] . "</h4>";
				*/
				
			  }	
			}


			/*
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
			$txt .= $nueva_cantidad . "|" ;
			$txt .= $row["latitud"]. "|" ;
			$txt .= $row["longitud"] . "|";
			$txt .= $row["nombre"];
			*/




		  }

	//include 'php/model/desconectar.php';
	$mysqli->close();  

 print $txt;
?>
