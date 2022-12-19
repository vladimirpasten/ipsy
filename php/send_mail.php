<?php

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

/*
function guardar_envio($adjunto1="", $adjunto2 = "", $adjunto3 = "" ){
	include "../admin/php/model/connect.php";

	$id_agente 		= $_POST["hdn_id_agente"];
	$email_agente 	= $_POST["hdn_email"];
	$destinatario 	= $_POST["email"];
	$cc 			= $_POST["cc"];
	$asunto 		= $_POST["titulo"];
	$mensaje 		= $_POST["mensaje"];
	$adjunto_1 		= $adjunto1;
	$adjunto_2 		= $adjunto2;
	$adjunto_3 		= $adjunto3;
	$id_tarea 		= $_POST["hdn_id_tarea"];

	$sql =	"INSERT INTO `correos`( `id_agente`, `email_agente`, `destinatario`, `cc`, `asunto`, `mensaje`, `adjunto_1`, `adjunto_2`, `adjunto_3`, `id_tarea`) ";
	$sql .= " VALUES ($id_agente, '$email_agente', '$destinatario', '$cc', '$asunto' , '$mensaje', '$adjunto1', '$adjunto2', '$adjunto3', $id_tarea);";

	$result = $mysqli->query($sql);

	print $sql ;
	$sql =	"UPDATE `tareas` SET estado = '2' WHERE id = $id_tarea "; 
	print "<br>" . $sql;
	$result = $mysqli->query($sql);


	return true;
}
*/


//if (isset ($_POST['enviar'])) {
//print "1";
	$nombre = $_POST["nombre"];
	$phone = $_POST['phone'];

	$mail_destinatario = "vladimir.pasten@gmail.com";//"contacto@ipsy.cl";//$_POST['email'];
	$mail_cc = $_POST['email'];
	$cuerpo = "\nNombre: $nombre \n Mail: $mail_cc \n Fono: $phone \n\n" . $_POST['message'];
	$mail = "noreply@ipsy.cl"; //$_POST['hdn_email'];

	$asunto = "Nuevo correo enviado desde Ipsy web - ";
//print "2";
	if (form_mail(
		$mail_destinatario, 
		$asunto,
		$cuerpo,
		$mail,0)
	   ){

		//form_mail($mail_cc, $asunto, $cuerpo, $mail,0);
		//form_mail($mail_cc, "[Gestion InHouse] " . $asunto, " Acabas de enviar el siguiente mensaje a través de la plataforma Gestión InHouse: \n". $cuerpo, $mail,0);
		

		//guardar información en la Base de Datos.
		print "Mail enviado.";
		//header('Location: ../contacts.html?mail=ok');
		//;

	}
	else print "Error en el envío del mensaje."; //header('Location: ../contacts.html?mail=error');		 
//}

//print "FINAL";
?>