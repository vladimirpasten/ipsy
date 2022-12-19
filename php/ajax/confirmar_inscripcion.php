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
//print "A";			
		$ret2 = mail($sPara, $sAsunto, $sTexto, $sCabeceras);
//print "B";
//print "RET 2:" . $ret2;


	return($ret2);
}




include "../model/connect.php";

$id_charla = $_POST['id_charla'];
$nombre = $_POST["nombre"];
$rut = $_POST["rut"];
$correo = $_POST["correo"];
$fono = $_POST["fono"];

$fecha = $_POST["fecha"];
$hora = $_POST["hora"];

$titulo = $_POST["titulo"];

//Calcular nueva cantidad:
	$sql =	" INSERT INTO `charlas_inscripciones`( `nombre`, `rut`, `email`, `fono`, id_charla) VALUES 
					('$nombre','$rut','$correo','$fono','$id_charla') ";

//print($sql);
	$result = $mysqli->query($sql);

//OBTENER CORREO DEL PACIENTE Y DEL TERAPEUTA


//ENVIAR CORREO DE LA NUEVA CITA:

	$mail_destinatario = $correo;//$_POST['email'];
	$mail_cc = "vladimir.pasten@gmail.com";
	$cuerpo = "Estimado(a) $nombre , \n Su participación en la charla $titulo ha sido agendada en Ipsy \n Recuerde que esta charla se realizará el $fecha a las $hora \n\n   Saluda atentamente\nEl equipo Ipsy\n\n";

	$mail = "noreply@ipsy.cl"; //$_POST['hdn_email'];

	$asunto = "Nueva inscripción a Charla iPsy";
	
//	print "Antes de";

	$ret = form_mail(
		$mail_destinatario, 
		$asunto,
		$cuerpo,
		$mail,0);



//	print $mail_destinatario . "-" . $asunto . "-" . $cuerpo . "-" . $ret;
	
/*
	$mail_destinatario = $correo_t;//$_POST['email'];
	$mail_cc = "vladimir.pasten@gmail.com";
	$cuerpo = "Estimado(a) $nombre_terapeuta , \n Enviamos los datos de la hora agendada en Ipsy: \nPaciente: $nombre_paciente \n Hora: $hora \n  Fecha: $fecha \n   Saluda atentamente\nEl equipo Ipsy\n\n";

	$mail = "noreply@ipsy.cl"; //$_POST['hdn_email'];

	$asunto = "Nueva hora agendada en Ipsy";
	
	form_mail(
		$mail_destinatario, 
		$asunto,
		$cuerpo,
		$mail,0);
*/




	print "OK";
?>
