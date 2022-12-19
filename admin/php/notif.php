<?php session_start();
error_reporting(E_ALL);

ini_set('display_errors', '1');


$titulo = "Prueba de notificación";
$message = "Este es el detalle de la prueba de notificación.";

//notificar:

//OBTENER TOKEN:
$data = array(
    'grant_type' => 'client_credentials',
    'client_id' => '402d3c268aab74e728a5cc0c6915254a',
    'client_secret' => '0cd4619065e5c926f0ee8f8225b7063e'

);
 
$payload = json_encode($data);
 
// Prepare new cURL resource
$ch = curl_init('https://api.sendpulse.com/oauth/access_token');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLINFO_HEADER_OUT, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
 
// Set HTTP Header for POST request 
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($payload))
);
 
// Submit the POST request
$result = curl_exec($ch);
print $result . "<br><br>"; 
 
 $array_result = json_decode ( $result , true);
// Close cURL session handle
curl_close($ch);

$type = $array_result["token_type"];
$token = $array_result["access_token"];

print $token . "<br>";

/*
// OBTENER ID DEL WEBSITE:
// Prepare new cURL resource
$ch = curl_init('https://api.sendpulse.com/push/websites/');
curl_setopt($ch, CURLINFO_HEADER_OUT, true);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Authorization: Bearer $token')
); 

//curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BEARER);
//curl_setopt($ch, CURLOPT_XOAUTH2_BEARER,$token);

 
// Submit the POST request
$result = curl_exec($ch);
 
 //print $result;
 $array_result = json_decode ( $result , true);
 print_r($array_result);
 print "<br>";
// Close cURL session handle
curl_close($ch);
*/




// ENVIAR NOTIFICACIONES PUSH:
$data = array(

    'title' => $titulo,
    'website_id' => 51032,
    'body' => $message,
    'ttl' => 86400

);
 
$payload = json_encode($data);
 
// Prepare new cURL resource
$ch = curl_init('https://api.sendpulse.com/push/tasks');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLINFO_HEADER_OUT, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

//define('CURLAUTH_BEARER', 5);

curl_setopt($ch, CURLOPT_HTTPAUTH, 5);
curl_setopt($ch, CURLOPT_XOAUTH2_BEARER,$token);

 //'Authorization: Bearer $token',
// Set HTTP Header for POST request 
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
            
    'Content-Length: ' . strlen($payload))
);
 
// Submit the POST request
$result = curl_exec($ch);
 
 //print $result;
 $array_result = json_decode ( $result , true);
 print_r($array_result);
// Close cURL session handle
curl_close($ch);


?>