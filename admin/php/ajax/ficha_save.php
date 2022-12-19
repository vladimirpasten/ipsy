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

$fecha = $_POST['fecha'];
$id_terapeuta = $_POST['id_terapeuta'];
$id_paciente = $_POST['id_paciente'];
$hora_inicio = $_POST['hora_inicio'];
$hora_fin = $_POST['hora_fin'];
$texto = $_POST['texto'];

$array_fecha = explode("-", $fecha);
$fecha2 = $fecha;//$array_fecha[2] . "-" . $array_fecha[1] . "-" . $array_fecha[0];

//print $fecha2;

$hora = $hora_inicio;

$existe = false;

$sql = " SELECT * FROM `registro_sesion` WHERE id_terapeuta = $id_terapeuta AND id_paciente = $id_paciente AND hora = '$hora_inicio' AND fecha = '$fecha2' ; ";
//print $sql;
    $array_ = array();
    $xml = "";
    $count = 0;
//  $result=mysql_query($sql, $conexion);  
//    while ($row=@mysql_fetch_array($result))
    $result = $mysqli->query($sql);
    $num = mysqli_num_rows($result);
    if ($num>0)
        $existe = true;

if (!$existe){

    $sql = " INSERT INTO `registro_sesion`( `id_terapeuta`, `id_paciente`, `fecha`, `hora`, `texto`) VALUES ('$id_terapeuta','$id_paciente','$fecha2','$hora','$texto'); ";

}else{

    $sql = "

        UPDATE `registro_sesion` SET `texto`='$texto' WHERE 
        `id_terapeuta`='$id_terapeuta' AND 
        `id_paciente`='$id_paciente' AND 
        `fecha`='$fecha2' AND 
        `hora`='$hora_inicio'; 


    ";

}

//print $sql;

	$result = $mysqli->query($sql);

	print "OK";
?>
