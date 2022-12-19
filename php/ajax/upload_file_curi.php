

<?php error_reporting(E_ALL);

ini_set('display_errors', '1');

include "../model/connect.php";	

//Método con str_shuffle() 
function generateRandomString($length = 10) { 
    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length); 
} 

/*
Uploadify
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
Released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
*/

// Define a destination
$targetFolderImages = 'curis'; // Relative to the root
$targetFolderVideos = 'videos'; // Relative to the root

$nombre = generateRandomString(3) . $_FILES['Filedata']['name']; 
$ruta_archivo = "uploads";
$ruta_archivo = str_replace("\n", "", $ruta_archivo);
$ruta_archivo = str_replace("../../", "", $ruta_archivo);
//$verifyToken = md5('unique_salt' . $_POST['timestamp']);
//if (!empty($_FILES) && $_POST['token'] == $verifyToken) {

	//$ruta = __FILE__;
	$directorio = __DIR__;
	$ruta = realpath($directorio . "/../../");
	$ruta = $ruta . "/" . $ruta_archivo;
	//$ruta = str_replace("upload.php", "", $ruta);

	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPathImages = $ruta . "/" . $targetFolderImages;
	//$targetPathVideos = $_SERVER['DOCUMENT_ROOT'] . $targetFolderVideos;

	// Validate the file type
	$fileTypesImages = array('doc','DOC', 'docx', 'DOCX', 'pdf', 'PDF'); // File extensions
	
	$fileParts = pathinfo($_FILES['Filedata']['name']);
	$tipo = "imagen";

	if (in_array($fileParts['extension'],$fileTypesImages)) {
		$targetFile = rtrim($targetPathImages,'/') . '/' . $nombre ;
		//print $targetFile;
		move_uploaded_file($tempFile,$targetFile);
	} 

$nombre = str_replace("\n", "", $nombre);
print $nombre;

?>

