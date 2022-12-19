<?php session_start();

include "../model/connect.php";

$titulo = $_POST["titulo"];
$texto = $_POST["texto"];

$id = $_POST["id"];

$foto1 = $_POST["foto1"];
$foto2 = $_POST["foto2"];
$foto3 = $_POST["foto3"];

$id_autor = $_SESSION['id'];

if ($id==""){
	$sql =	"INSERT INTO `blog`( `titulo`, `texto`, `foto1`, `foto2`, `foto3`, id_autor) ";
	$sql .= " VALUES ('$titulo', '$texto', '$foto1', '$foto2', '$foto3', $id_autor)";
}else{
		$sql =	"UPDATE `blog` ";
		$sql .= " SET `titulo`='$titulo',`foto1`='$foto1', `foto2`='$foto2', `foto3`='$foto3', `texto`='$texto' ";

		$sql .= " WHERE id = $id ";

}

//print $sql;
$result = $mysqli->query($sql);


 print "OK";
?>
