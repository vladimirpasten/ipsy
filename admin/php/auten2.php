<?php session_start();
	
	include "./model/connect.php";
	//4dm1n_2oia
	//827ccb0eea8a706c4c34a16891f84e7b


	$login=$_GET['mail'];
	$pos = strpos($login, '@');

	// Nótese el uso de ===. Puesto que == simple no funcionará como se espera
	// porque la posición de 'a' está en el 1° (primer) caracter.
	//if ($pos === false) {
	//    $login = str_replace(".", "", $login);
	//} 	
	
	$pwd=$_GET['clave'];
	$sql = "";
//print 1;
	//header('Location: ../index.html');
	
	$sql  = " SELECT `id`, `nombre`, `rut`, `fecha_nacimiento`, `login`, `mail`, `password`, `fono`, `observaciones`, `url_foto`, `aceptado`, `admin`, `activo` FROM `pacientes` ";
	$sql .= " WHERE (login = '$login' OR mail = '$login') AND (activo = 1);";	

	$pass = "";	$name = "";$admin=""; $foto = ""; $fono = "";
	$id = ""; $type_user = ""; $admin_eventos = ""; $ingresos = 0;

	$result = $mysqli->query($sql);
	$num = mysqli_num_rows($result);
//print 2;
	if ($num>0){
//print 3;		
		while ($row = $result->fetch_assoc())
		  {
			$name = $row["nombre"];
			$pass = $row["password"];
			$id=  $row["id"];
			$type_user=  $row["admin"];
			$mail = $row["mail"];
			$fono = $row["fono"];
		  }


		if (md5($pwd)==$pass){
//print 4;			
			$_SESSION['usuario'] = $name;
			$_SESSION['id'] = $id;
			$_SESSION['mail'] = $mail;
			$_SESSION['fono'] = $fono;
			$_SESSION['admin'] = $type_user;
			$_SESSION['type_user'] = $type_user;
			
				setcookie("user_id", $id, time()+(60*60*24*365), $_SERVER['HTTP_HOST']);
				setcookie("marca2", $pass, time()+(60*60*24*365), $_SERVER['HTTP_HOST']);
				setcookie("admin", $type_user, time()+(60*60*24*365), $_SERVER['HTTP_HOST']);
			
			//header('Location: ../.html');

			
				header('Location: ../tomar_hora_log.php');

			



		}else{
				header('Location: ../tomar_hora.php?error=1');
		}
 	}else{
 		header('Location: ../tomar_hora.php?error=1');
 	}
 		
?>