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

$name = $_POST['name'];
$rut = $_POST['rut'];
$phone = $_POST['phone'];
//$esp	= $_POST['esp'];

$email = $_POST["email"];
$message = $_POST["message"];
$nac = $_POST["nac"];
$pwd = $_POST["pwd"];

$pwd_a = md5($pwd);

$url_foto = $_POST["url_foto"];
//$url_curi = $_POST["url_curi"];
//$url_doc = $_POST["url_doc"];

$especialidades = $_POST["especialidades"];

//Calcular nueva cantidad:
	$sql =	"INSERT INTO `medicos`( `nombre`, `rut`, `fecha_nacimiento`, `login`, `mail`, `password`, `fono`, `aceptado`, `activo`, observaciones, url_foto, url_curi, url_doc) VALUES ('$name','$rut', '$nac' ,'$email','$email','$pwd_a','$phone',0,1, '$message', '$url_foto', '', '')";
//print($sql);
	$result = $mysqli->query($sql);
	$id_psicologo = $mysqli->insert_id;
//guardar las especialidades del nuevo sicólogo:

	$array_especialidades = explode(",", $especialidades);

	foreach($array_especialidades as $esp){

		 $sql2 = "INSERT INTO `psico_especialidades`( `id_psicologo`, `id_especialidad`) VALUES ('$id_psicologo','$esp')";
		 $result2 = $mysqli->query($sql2);

	}




//ENVIAR CORREO DE QUE SE INSCRIBIO UN NUEVO USUARIO:
	$nombre = $name;
	$phone = $phone;

	$mail_destinatario = "contacto@ipsy.cl";//$_POST['email'];
	$mail_cc = "vladimir.pasten@gmail.com";
	$cuerpo = "Se ha inscrito en IPSY un nuevo usuario: \nNombre: $nombre \n Mail: $mail_cc \n Fono: $phone \n\n";

	$mail = "noreply@ipsy.cl"; //$_POST['hdn_email'];

	$asunto = "Nueva inscripción";
	
	form_mail(
		$mail_destinatario, 
		$asunto,
		$cuerpo,
		$mail,0);
	



	print "OK";
?>
