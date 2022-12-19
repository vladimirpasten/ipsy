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

                $inicio_lunes = $_POST["inicio_lunes"];
                $inicio_martes = $_POST["inicio_martes"];
                $inicio_miercoles = $_POST["inicio_miercoles"];
                $inicio_jueves = $_POST["inicio_jueves"];
                $inicio_viernes = $_POST["inicio_viernes"];
                $inicio_sabado = $_POST["inicio_sabado"];
                $inicio_domingo = $_POST["inicio_domingo"];

                $final_lunes = $_POST["final_lunes"];
                $final_martes = $_POST["final_martes"];
                $final_miercoles = $_POST["final_miercoles"];
                $final_jueves = $_POST["final_jueves"];
                $final_viernes = $_POST["final_viernes"];
                $final_sabado = $_POST["final_sabado"];
                $final_domingo = $_POST["final_domingo"];

                $descanso_inicio_lunes = $_POST["descanso_inicio_lunes"];
                $descanso_inicio_martes = $_POST["descanso_inicio_martes"];
                $descanso_inicio_miercoles = $_POST["descanso_inicio_miercoles"];
                $descanso_inicio_jueves = $_POST["descanso_inicio_jueves"];
                $descanso_inicio_viernes = $_POST["descanso_inicio_viernes"];
                $descanso_inicio_sabado = $_POST["descanso_inicio_sabado"];
                $descanso_inicio_domigo = $_POST["descanso_inicio_domigo"];

                $descanso_fin_lunes = $_POST["descanso_fin_lunes"];
                $descanso_fin_martes = $_POST["descanso_fin_martes"];
                $descanso_fin_miercoles = $_POST["descanso_fin_miercoles"];
                $descanso_fin_jueves = $_POST["descanso_fin_jueves"];
                $descanso_fin_viernes = $_POST["descanso_fin_viernes"];
                $descanso_fin_sabado = $_POST["descanso_fin_sabado"];
                $descanso_fin_domingo = $_POST["descanso_fin_domingo"];


if($inicio_sabado) $inicio_sabado = "00:00"; 
if($inicio_domingo) $inicio_domingo = "00:00";
if($final_sabado)   $final_sabado = "00:00";
if ($final_domingo) $final_domingo = "00:00";

if($descanso_inicio_sabado) $descanso_inicio_sabado = "00:00"; 
if($descanso_inicio_domigo) $descanso_inicio_domigo = "00:00";
if($descanso_fin_domingo)   $descanso_fin_domingo = "00:00";
if ($descanso_fin_sabado)   $descanso_fin_sabado =  "00:00";


$existe = false;

    $sql = " SELECT `id`, `id_user`, `lunes`, `martes`, `miercoles`, `jueves`, `viernes`, `sabado`, `domingo`, `inicio_lunes`, `inicio_martes`, `inicio_miercoles`, `inicio_jueves`, `inicio_viernes`, `inicio_sabado`, `inicio_domingo`, `final_lunes`, `final_martes`, `final_miercoles`, `final_jueves`, `final_viernes`, `final_sabado`, `final_domingo`, `descanso_inicio_lunes`, `descanso_inicio_martes`, `descanso_inicio_miercoles`, `descanso_inicio_jueves`, `descanso_inicio_viernes`, `descanso_inicio_sabado`, `descanso_inicio_domigo`, `descanso_fin_lunes`, `descanso_fin_martes`, `descanso_fin_miercoles`, `descanso_fin_jueves`, `descanso_fin_viernes`, `descanso_fin_sabado`, `descanso_fin_domingo` FROM `horarios` WHERE id_user = $id_user; ";

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

    $sql = " INSERT INTO `horarios`( `id_user`, `inicio_lunes`, `inicio_martes`, `inicio_miercoles`, `inicio_jueves`, `inicio_viernes`, `inicio_sabado`, `inicio_domingo`, `final_lunes`, `final_martes`, `final_miercoles`, `final_jueves`, `final_viernes`, `final_sabado`, `final_domingo`, `descanso_inicio_lunes`, `descanso_inicio_martes`, `descanso_inicio_miercoles`, `descanso_inicio_jueves`, `descanso_inicio_viernes`, `descanso_inicio_sabado`, `descanso_inicio_domigo`, `descanso_fin_lunes`, `descanso_fin_martes`, `descanso_fin_miercoles`, `descanso_fin_jueves`, `descanso_fin_viernes`, `descanso_fin_sabado`, `descanso_fin_domingo`) VALUES ( $id_user, '$inicio_lunes', '$inicio_martes', '$inicio_miercoles', '$inicio_jueves', '$inicio_viernes', '$inicio_sabado', '$inicio_domingo', '$final_lunes', '$final_martes', '$final_miercoles', '$final_jueves', '$final_viernes', '$final_sabado', '$final_domingo', '$descanso_inicio_lunes', '$descanso_inicio_martes', '$descanso_inicio_miercoles', '$descanso_inicio_jueves', '$descanso_inicio_viernes', '$descanso_inicio_sabado', '$descanso_inicio_domigo', '$descanso_fin_lunes', '$descanso_fin_martes','$descanso_fin_miercoles', '$descanso_fin_jueves', '$descanso_fin_viernes', '$descanso_fin_sabado', '$descanso_fin_domingo' )";


}else{


    $sql = "

UPDATE `horarios` SET 
        `inicio_lunes`='$inicio_lunes',
        `inicio_martes`='$inicio_martes',
        `inicio_miercoles`='$inicio_miercoles',
        `inicio_jueves`='$inicio_jueves',
        `inicio_viernes`='$inicio_viernes',
        `inicio_sabado`='$inicio_sabado',
        `inicio_domingo`='$inicio_domingo',
        `final_lunes`='$final_lunes',
        `final_martes`='$final_martes',
        `final_miercoles`='$final_miercoles',
        `final_jueves`='$final_jueves',
        `final_viernes`='$final_viernes',
        `final_sabado`='$final_sabado',
        `final_domingo`='$final_domingo',
        `descanso_inicio_lunes`='$descanso_inicio_lunes',
        `descanso_inicio_martes`='$descanso_inicio_martes',
        `descanso_inicio_miercoles`='$descanso_inicio_miercoles',
        `descanso_inicio_jueves`='$descanso_inicio_jueves',
        `descanso_inicio_viernes`='$descanso_inicio_viernes',
        `descanso_inicio_sabado`='$descanso_inicio_sabado',
        `descanso_inicio_domigo`='$descanso_inicio_domigo',
        `descanso_fin_lunes`='$descanso_fin_lunes',
        `descanso_fin_martes`='$descanso_fin_martes',
        `descanso_fin_miercoles`='$descanso_fin_miercoles',
        `descanso_fin_jueves`='$descanso_fin_jueves',
        `descanso_fin_viernes`='$descanso_fin_viernes',
        `descanso_fin_sabado`='$descanso_fin_sabado',
        `descanso_fin_domingo`='$descanso_fin_domingo' WHERE id_user = $id_user;

    ";

}

//print $sql;

	$result = $mysqli->query($sql);




	print "OK";
?>
