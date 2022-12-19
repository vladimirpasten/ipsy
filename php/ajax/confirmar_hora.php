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

$id_terapeuta = $_POST['id_terapeuta'];
$id_paciente = $_POST['id_paciente'];
$fecha = $_POST['fecha'];
$hora = $_POST["hora"];
$correo_t = $_POST["correo_t"];
$correo_p = $_POST["correo_p"];
$fono = $_POST["fono"];

$nombre_terapeuta = $_POST["nombre_t"];
$nombre_paciente = $_POST["nombre_p"];

$hora_array = explode(" a ", $hora);

$hora_inicio = trim($hora_array["0"]);
$hora_fin = trim($hora_array["1"]);



//print $fecha;

$array_fecha = explode("-", $fecha);
$fecha2 = $array_fecha[2] . "-" . $array_fecha[1] . "-" . $array_fecha[0];

//Calcular nueva cantidad:
	$sql =	" INSERT INTO `toma_horas`( `hora_inicio`, `hora_fin`, `fecha`, `id_paciente`, `id_terapeuta`, correo_p, correo_t, fono) VALUES ('$hora_inicio','$hora_fin','$fecha2',$id_paciente,$id_terapeuta, '$correo_p', '$correo_t', '$fono'); ";

//print($sql);
	$result = $mysqli->query($sql);

//OBTENER CORREO DEL PACIENTE Y DEL TERAPEUTA


//ENVIAR CORREO DE LA NUEVA CITA:

	$mail_destinatario = $correo_p;//$_POST['email'];
	$mail_cc = "vladimir.pasten@gmail.com";
	$cuerpo = "Estimado(a) $nombre_paciente , \n Enviamos los datos de la hora agendada en Ipsy: \nPsicólogo: $nombre_terapeuta \n Hora: $hora \n  Fecha: $fecha \n   Saluda atentamente\nEl equipo Ipsy\n\n";

	$mail = "noreply@ipsy.cl"; //$_POST['hdn_email'];

	$asunto = "Nueva hora agendada en Ipsy";
	
	form_mail(
		$mail_destinatario, 
		$asunto,
		$cuerpo,
		$mail,0);
	

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





	print "OK";
?>
