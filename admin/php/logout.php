<?php session_start();

error_reporting(E_ALL);
ini_set('display_errors', '1');

            $_SESSION['usuario'] = "";
            $_SESSION['id'] = "";
            $_SESSION['empresa'] = "";
            $_SESSION['sala'] = "";
            
                setcookie("user_id", "", time()-(60*60*24*365), $_SERVER['HTTP_HOST']);
                setcookie("marca2", "", time()-(60*60*24*365), $_SERVER['HTTP_HOST']);

            unset ($_COOKIE ["user_id"], $_SERVER['HTTP_HOST']);
            unset ($_COOKIE ["marca2"],  $_SERVER['HTTP_HOST']);


//print "**" . $_SESSION["id"] . "**|" . $_COOKIE['id_user'] . "|";


header('Location: ../index.html'); 


?>

