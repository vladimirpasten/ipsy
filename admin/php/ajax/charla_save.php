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

$titulo = $_POST["titulo"];
$texto = $_POST["texto"];

$id = $_POST["id"];

$foto1 = $_POST["foto1"];
$fecha = $_POST["fecha"];
$hora = $_POST["hora"];

$link_pago	 = $_POST["link_pago"];

$espec = $_POST["espec"];
$colab = $_POST["colab"];

$array_fecha = explode("-", $fecha);
$fecha2 = $array_fecha[2] . "-" . $array_fecha[1] . "-" . $array_fecha[0];  

//print $hora;
$id_charla = 0;
$id_autor = $_SESSION['id'];

if ($id==""){
	$sql =	"INSERT INTO `charlas`( `titulo`, `texto`, `foto1`, `fecha`, hora,  id_autor, link_pago	) ";
	$sql .= " VALUES ('$titulo', '$texto', '$foto1', '$fecha', '$hora',  $id_autor , '$link_pago')";

	$result = $mysqli->query($sql);

	$id_charla = $mysqli->insert_id;


}else{
		$sql =	"UPDATE `charlas` ";
		$sql .= " SET `titulo`='$titulo',`foto1`='$foto1', `fecha`='$fecha', hora = '$hora', `texto`='$texto' , link_pago	= '$link_pago	' ";

		$sql .= " WHERE id = $id ";

		$result = $mysqli->query($sql);

		//actualizar especialidades:
		$sql = " DELETE FROM `charlas_colaboradores` WHERE `id_charla` = $id; ";
		$result = $mysqli->query($sql);

		//actualizar colaboradores:
		$sql = " DELETE FROM `charlas_especialidades` WHERE `id_charla` = $id; ";
		$result = $mysqli->query($sql);

		$id_charla = $id;

}

//agregar colaboradores:


//agregar especialidades:
$array_espec = explode(",", $espec);
foreach ($array_espec as $e) {
	// code...
	$sql = "INSERT INTO `charlas_especialidades`(`id_charla`, `id_especialidad`) VALUES ($id_charla,$e)";
	$result = $mysqli->query($sql);
}



//print "**".$colab."**";

if ($colab!=""){

$array_colab = explode(",", $colab);
foreach ($array_colab as $c) {
	// code...
	$sql = "INSERT INTO `charlas_colaboradores`(`id_colaborador`, `id_charla`) VALUES ($c, $id_charla)";

	$result = $mysqli->query($sql);


	//Enviar correo a los colaboradores incritos:
	$sql = " SELECT  `nombre`, `mail` FROM `medicos` WHERE `id` = $c; ";
//print $sql . "\n";	

	  $result2 = $mysqli->query($sql);
	  $num = mysqli_num_rows($result2);
	  if ($num>0)
	  while ($row = $result2->fetch_assoc())

	    {
		    
		    $nombre = $row["nombre"];
		    $mail = $row["mail"];


		    //Enviar correo a esta persona:
				$mail_destinatario = "$mail";//$_POST['email'];
				$mail_cc = "vladimir.pasten@gmail.com";
				$cuerpo = "Estimado $nombre, \n\n Usted ha sido agregado como colaborador a una nueva charla: $titulo.   \n\n  Para aceptar esta solicitud debe ingresar al sistema iPsy.";

				$mail = "noreply@ipsy.cl"; //$_POST['hdn_email'];

				$asunto = "Nueva inscripción";
				
				form_mail(
					$mail_destinatario, 
					$asunto,
					$cuerpo,
					$mail,0);


				form_mail(
					$mail_cc, 
					$asunto,
					$cuerpo,
					$mail,0);


		    //$count++;

	    }




}




}

	  include '../model/desconectar.php';


 print "OK";
?>
