<?php session_start();

error_reporting(E_ALL);
ini_set('display_errors', '1');



///// Funciones necesarias////
function form_mail($sPara, $sAsunto, $sTexto, $sDe, $guardar = 0)
{
		$bHayFicheros = 0;
		$sCabeceraTexto = "";
		$sAdjuntos = "";
		if ($sDe)$sCabeceras = "From:".$sDe."\n";
		else $sCabeceras = "";
		$sCabeceras .= "MIME-version: 1.0\n";
		
		//foreach ($_POST as $sNombre => $sValor)
		//	$sTexto = $sTexto."\n".$sNombre." = ".$sValor;


		$array_adjuntos = array( "", "", "");
		$x = 0;
		foreach ($_FILES as $vAdjunto)
		{	
			if ($bHayFicheros == 0)
			{
				$bHayFicheros = 1;
				$sCabeceras .= "Content-type: multipart/mixed;";
				$sCabeceras .= "boundary=\"--_Separador-de-mensajes_--\"\n";
				$sCabeceraTexto = "----_Separador-de-mensajes_--\n";
				$sCabeceraTexto .= "Content-type: text/plain;charset=iso-8859-1\n";
				$sCabeceraTexto .= "Content-transfer-encoding: 7BIT\n";
				$sTexto = $sCabeceraTexto.$sTexto;
			}
			if ($vAdjunto["size"] > 0)
			{
				$sAdjuntos .= "\n\n----_Separador-de-mensajes_--\n";
				$sAdjuntos .= "Content-type: ".$vAdjunto["type"].";name=\"".$vAdjunto["name"]."\"\n";;
				$sAdjuntos .= "Content-Transfer-Encoding: BASE64\n";
				$sAdjuntos .= "Content-disposition: attachment;filename=\"".$vAdjunto["name"]."\"\n\n";
				$oFichero = fopen($vAdjunto["tmp_name"], 'r');
				$sContenido = fread($oFichero, filesize($vAdjunto["tmp_name"]));
				$sAdjuntos .= chunk_split(base64_encode($sContenido));
				fclose($oFichero);

				$array_adjuntos[$x] = $vAdjunto["name"];
			}
			$x++;
		}
		if ($bHayFicheros)
			$sTexto .= $sAdjuntos."\n\n----_Separador-de-mensajes_----\n";
		if ($guardar == 1)
			$ret = guardar_envio($array_adjuntos[0], $array_adjuntos[1],$array_adjuntos[2]);
		
		$ret2=true;		
		$ret2 = mail($sPara, $sAsunto, $sTexto, $sCabeceras);

//print "RET 2:" . $ret2;


	return($ret2);
}




include "../model/connect.php";

$id_usuario = $_POST['id'];

$sql =	"UPDATE `medicos` SET `aceptado`= 1 WHERE id = $id_usuario   ";
//print $sql;
//mysql_query($sql,$conexion);
$result = $mysqli->query($sql);

//obtener datos del médico:
	$sql = " SELECT `id`, `nombre`, `rut`, `mail`, `fono` FROM `medicos` WHERE id = $id_usuario; ";
//print $sql;

	$array_ = array();
	$xml = "";
	$count = 0;
//	$result=mysql_query($sql, $conexion);  
//    while ($row=@mysql_fetch_array($result))
	$result2 = $mysqli->query($sql);
	$num2 = mysqli_num_rows($result2);
	if ($num2>0)
	while ($row = $result2->fetch_assoc())

	  {
	  	$id = $row["id"];
	  	$nombre = $row["nombre"];
	  	
	  	$email = $row["mail"];

	  	$fono = $row["fono"];
	  	$rut = $row["rut"];

	  


		$sql = "INSERT INTO `ea_users`( `first_name`, `last_name`, `email`, `mobile_number`, `phone_number`, `address`, `id_roles`) VALUES ('$nombre','','$email','$fono','','',2);";

		$result = $mysqli->query($sql);
		$id_nuevo_user = $mysqli->insert_id;


		$sql = "INSERT INTO `ea_services_providers`(`id_users`, `id_services`) VALUES ($id_nuevo_user, 1);";

//print $sql;
		$result = $mysqli->query($sql);

   $max_length = 100;
   $salt = hash('sha256', (uniqid(rand(), TRUE)));
    $salt = substr($salt, 0, $max_length);


$horario = '{"monday":{"start":"09:00","end":"18:00","breaks":[{"start":"14:30","end":"15:00"}]},"tuesday":{"start":"09:00","end":"18:00","breaks":[{"start":"14:30","end":"15:00"}]},"wednesday":{"start":"09:00","end":"18:00","breaks":[{"start":"14:30","end":"15:00"}]},"thursday":{"start":"09:00","end":"18:00","breaks":[{"start":"14:30","end":"15:00"}]},"friday":{"start":"09:00","end":"18:00","breaks":[{"start":"14:30","end":"15:00"}]},"saturday":{"start":"09:00","end":"18:00","breaks":[{"start":"14:30","end":"15:00"}]},"sunday":{"start":"09:00","end":"18:00","breaks":[{"start":"14:30","end":"15:00"}]}}';

$sql = "INSERT INTO `ea_user_settings`(`id_users`, `username`, `password`, `salt`, `working_plan`) VALUES ($id_nuevo_user,'$email','7032925943b0d3a8f9c55f6478d6cdaccd0dc7270cf0bd79919de7d5bf52b2a1','$salt','$horario')";

$result = $mysqli->query($sql);
//print $sql;
	  }


//ENVIAR CORREO DE QUE SE aceptó el nuevo psicólogo:
	$nombre = $nombre;
	$phone = $fono;

	$mail_destinatario = $email;//$_POST['email'];
	$mail_cc = "vladimir.pasten@gmail.com";
	$cuerpo = "Usted ha sido aceptado como psicólogo en el sistema de IPSY   \n\n  Recuerde que puede ingresar a sus funcionalidades en la siguiente dirección con las credenciales que usted definió al momento de inscribirse:\n\nhttp://ipsy.cl/admin\n\nAtentamente\nEquipo IPSY\n ";

	$mail = "noreply@ipsy.cl"; //$_POST['hdn_email'];

	$asunto = "Usted ha sido aceptado en Ipsy";
	
	form_mail(
		$mail_destinatario, 
		$asunto,
		$cuerpo,
		$mail,0);
	




print "OK";
?>
