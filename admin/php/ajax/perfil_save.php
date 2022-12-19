<?php session_start();

error_reporting(E_ALL);
ini_set('display_errors', '1');

$logged = 0;
$name_user_logged = "";
$id_user = "";
$area = "";
$type_user = "";

if (isset($_SESSION['usuario'])){

    //if ($_SESSION['admin']=="1") {
        $name_user_logged = $_SESSION['usuario'];
        $id_user = $_SESSION['id'];
        $logged = 1;
        $area = $_SESSION['mail'];
        $type_user = $_SESSION['type_user'];
    //}
}


include "../model/connect.php";

$id_user = $_POST['id'];
$name = $_POST['nombre'];
$phone = $_POST['fono'];
$email = $_POST["email"];
$message = $_POST["texto"];

$pwd = $_POST["clave"];
$pwd_a = md5($pwd);


$url_foto = $_POST["foto"];

$especialidades = $_POST["especialidades"];
$link_pago = $_POST["link_pago"];

//Calcular nueva cantidad:
$clave = "";
if ($pwd!="")
	$clave = "`password`='$pwd_a',"; 

	$sql =	"
UPDATE `medicos` SET `nombre`='$name', login='$email',`mail`='$email', $clave `fono`='$phone',`observaciones`='$message',`url_foto`='$url_foto', link_pago = '$link_pago'  WHERE  id = $id_user;


	";
//print($sql);
	$result = $mysqli->query($sql);

     $sql2 = "DELETE FROM `psico_especialidades` WHERE  `id_psicologo` = '$id_user'; ";
     $result2 = $mysqli->query($sql2);

    $array_especialidades = explode(",", $especialidades);
    foreach($array_especialidades as $esp){

         $sql2 = "INSERT INTO `psico_especialidades`( `id_psicologo`, `id_especialidad`) VALUES ('$id_user','$esp')";
         $result2 = $mysqli->query($sql2);

    }






	print "OK";
?>
