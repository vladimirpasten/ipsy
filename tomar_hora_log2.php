<?php session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');

function hourIsBetween($from, $to, $input) {


//print " **** $from $to $input **** ";

   // $dateFrom = DateTime::createFromFormat('!H:i', $from);
   // $dateTo = DateTime::createFromFormat('!H:i', $to);
   // $dateInput = DateTime::createFromFormat('!H:i', $input);

    //$dateInput2 = $dateInput->modify('+1 day');
    //if ($dateFrom > $dateTo) $dateTo->modify('+1 day');

//print "***" . ($dateFrom <= $dateInput);
//print "*****"; 
//print "***" . ($dateInput <= $dateTo);


//    return ($dateFrom <= $dateInput && $dateInput <= $dateTo) ;

return ($from <= $input && $to >= $input);

}

function hora_disponible($hora_inicio, $hora_fin, $inicio, $fin , $hora_descanso_inicio, $hora_descanso_fin, $horas_tomadas){

//print ("$hora_inicio  $hora_fin $inicio $fin $hora_descanso_inicio   $hora_descanso_fin ");

    //Si esta hora está entre inicio y fin:
    if (hourIsBetween($inicio, $fin, $hora_inicio) && hourIsBetween($inicio, $fin, $hora_fin) ){

        //si esta hora está fuera del horario de descanso:
        if (!hourIsBetween($hora_descanso_inicio, $hora_descanso_fin, $hora_inicio) && !hourIsBetween($hora_descanso_inicio, $hora_descanso_fin, $hora_fin)){

            //Si la hora no está tomada ya por otro paciente:
              foreach ($horas_tomadas as $horat) {
                
                //print " $hora_inicio, $hora_fin, ". $horat["hora_inicio"] . "," . $horat["hora_fin"] . "  ";

                  if (hourIsBetween($hora_inicio, $hora_fin, $horat["hora_inicio"]) && hourIsBetween($hora_inicio, $hora_fin, $horat["hora_fin"])){
//                    print "3: false";
                    return false;
                  }

              }
        }else{
//          print "2: false";
          return false;
        }
    }else{
//      print "1: false";
      return false;
    }
      return true;
}

//hourIsBetween($from, $to, $input)


$logged = 0;
$name_user_logged = "";
$id_user = "";
$area = "";$fono = "";

$fecha_anterior = "";

if (isset($_SESSION['usuario'])){

    //if ($_SESSION['admin']=="1") {
        $name_user_logged = $_SESSION['usuario'];
        $id_user = $_SESSION['id'];
        $logged = 1;
        $area = $_SESSION['mail'];
        $fono = $_SESSION['fono'];
    //}
}

if ($logged == 0 || $name_user_logged == ""){
    ;//header('Location: ../tomar_hora.php');
}

$terapeuta = "0";
if (isset($_POST["terapeuta"])){
  $terapeuta = $_POST["terapeuta"];
}else{
    $terapeuta = $_GET["terapeuta"];

}

$dia_de_hoy = "";
$siguiente_dia = "";
$anterior_dia = "";
$fecha = "";

if (isset($_GET["dia"])) {
  $dia_de_hoy = $_GET["dia"];
  $fecha = $_GET["fecha"];

$date_future = strtotime('+1 day', strtotime($fecha));
$fecha_siguiente = date('d-m-Y', $date_future);

$date_past = strtotime('-1 day', strtotime($fecha));
$fecha_anterior = date('d-m-Y', $date_past);


switch ($dia_de_hoy) {
    case "domingo":
           $siguiente_dia = "lunes";
           $anterior_dia = "sabado";
    break;
    case "lunes":
           $siguiente_dia = "martes";
           $anterior_dia = "domingo";

    break;
    case "martes":
           $siguiente_dia = "miercoles";
           $anterior_dia = "lunes";

    break;
    case "miercoles":
           $siguiente_dia = "jueves";
           $anterior_dia = "martes";

    break;
    case "jueves":
           $siguiente_dia = "viernes";
           $anterior_dia = "miercoles";

    break;
    case "viernes":
           $siguiente_dia = "sabado";
           $anterior_dia = "jueves";

    break;
    case "sabado":
           $siguiente_dia = "domingo";
           $anterior_dia = "viernes";

    break;
}





}else{

$fecha = date('d-m-Y', time());  

$date_future = strtotime('+1 day', strtotime($fecha));
$fecha_siguiente = date('d-m-Y', $date_future);

$date_past = strtotime('-1 day', strtotime($fecha));
$fecha_anterior = date('d-m-Y', $date_past);

//echo "The current date and time are $fecha.";

$day = date("l");

switch ($day) {
    case "Sunday":
           $dia_de_hoy = "domingo";
           $siguiente_dia = "lunes";
           $anterior_dia = "sabado";
    break;
    case "Monday":
           $dia_de_hoy = "lunes";
           $siguiente_dia = "martes";
           $anterior_dia = "domingo";

    break;
    case "Tuesday":
           $dia_de_hoy = "martes";
           $siguiente_dia = "miercoles";
           $anterior_dia = "lunes";

    break;
    case "Wednesday":
           $dia_de_hoy = "miercoles";
           $siguiente_dia = "jueves";
           $anterior_dia = "martes";

    break;
    case "Thursday":
           $dia_de_hoy = "jueves";
           $siguiente_dia = "viernes";
           $anterior_dia = "miercoles";

    break;
    case "Friday":
           $dia_de_hoy = "viernes";
           $siguiente_dia = "sabado";
           $anterior_dia = "jueves";

    break;
    case "Saturday":
           $dia_de_hoy = "sabado";
           $siguiente_dia = "domingo";
           $anterior_dia = "viernes";

    break;
}

}
//print " $dia_de_hoy  - $siguiente_dia - $anterior_dia ";



//obtener horarios del terapeuta:
include "php/model/users.php";
$data_ = get_horario($terapeuta);
$listUsers = $data_["array"];
$ter = $listUsers[0]; 

//obtener si hay alguna hora tomada para la fecha:
$data = get_horas_tomadas($fecha, $terapeuta);
$horas_tomadas = $data["array"];

print_r($horas_tomadas);

$dia_array_inicio = "inicio_".$dia_de_hoy;
$dia_array_termino = "final_".$dia_de_hoy; 
$descanso_array_inicio = "descanso_inicio_".$dia_de_hoy;
$descanso_array_termino = "descanso_fin_".$dia_de_hoy; 

$hora_inicio = $ter[$dia_array_inicio];
$hora_fin = $ter[$dia_array_termino];
$hora_descanso_inicio = $ter[$descanso_array_inicio];
$hora_descanso_fin = $ter[$descanso_array_termino];



/*
$ruta = "?nombre=" . $name_user_logged . "&mail=" . $area . "&fono=". $fono;

include "php/model/terapias.php";

$data_ = get_terapias();
$listTerapias = $data_["array"];
*/



?>




<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head> 
    <!-- Site Title-->
    <title>Tomar hora</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="images/new/logo_ipsy.png" type="image/x-icon">
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato:400,700%7CQuattrocento+Sans:400,700">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/style.css">
		<!--[if lt IE 10]>
    <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <script src="js/html5shiv.min.js"></script>
		<![endif]-->
  </head>
  <body>
    <!-- Page-->
    <div class="text-left page">
      <!-- Page preloader-->
      <div class="preloader">
        <div class="preloader-body">
          <div class="cssload-container">
            <div class="cssload-speeding-wheel"></div>
          </div>
          <p>Cargando...</p>
        </div>
      </div>
      <!-- Page Header-->
      
      <header class="page-header">


        <div class="rd-navbar-wrap">



          <nav class="rd-navbar rd-navbar-default" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-static" data-md-stick-up-offset="49px" data-lg-stick-up-offset="46px" data-stick-up="true" data-sm-stick-up="true" data-md-stick-up="true" data-lg-stick-up="true">
            <div class="rd-navbar-collapse-toggle" data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></div>
            <div class="rd-navbar-inner">
              <div class="rd-navbar-panel">
                <!-- RD Navbar Toggle-->
                <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                <!-- RD Navbar Brand-->
                <div class="rd-navbar-brand"><a class="brand-name" href="index.php"><img src="images/new/logo_ipsy.png" alt="" width="81" height="46"/></a></div>
              </div>
              <div class="rd-navbar-aside-right">
                <div class="rd-navbar-nav-wrap rd-navbar-nav-wrap-default">
                  <!-- RD Navbar Nav-->
                  <ul class="rd-navbar-nav">

                    <li  style="background-color: #01C4C7; border-radius:   10px;"> <a href="#" style="margin:5px;color:white;" >Inscríbete</a> 
                      <ul class="rd-navbar-dropdown">-
                        <li><a href="signup-paciente.html">Paciente</a></li>
                        <li><a href="signup.html">Psicólogo</a></li>

                      </ul>

                    </li>


                    <li><a href="our-doctors.php">Psicólogos</a></li>
                    <li><a href="services.php">Terapias</a>
                      <!--ul class="rd-navbar-dropdown">
                        <li><a href="single-service.html">Single Service</a></li>
                      </ul-->
                    </li>
                    <!--li><a href="timetable.html">Timetable</a></li-->

                    <!--li> <a href="signup.html">Inscríbete</a> 
                      <ul class="rd-navbar-dropdown">
                        <li><a href="signup-paciente.html">Paciente</a></li>
                        <li><a href="signup.html">Sicólogo</a></li>

                      </ul>

                    </li-->
                    <li class="active"><a href="tomar_hora.php">Tomar hora</a></li>
                    <li><a href="blog.php">iPsy Blog</a></li>
                    <li><a href="preguntas_frecuentes.php">Preguntas frecuentes</a></li>
                    <li><a href="contacts.html">Contacto</a></li>
                    <li><a target="_blank" href="https://ipsy.cl/admin/login.html">Iniciar sesión</a></li>
                  </ul>


                <div class="rd-navbar-search"><span class="rd-navbar-search-tooltip"> </span><a class="rd-navbar-search-toggle" data-rd-navbar-toggle=".rd-navbar-search" href="#"><span></span></a>
                  <form class="rd-search" action="search-results.html" data-search-live="rd-search-results-live" method="GET">
                    <div class="form-wrap">
                      <label class="form-label form-label" for="rd-navbar-search-form-input"></label>
                      <input class="rd-navbar-search-form-input form-input" id="rd-navbar-search-form-input" type="text" name="s" autocomplete="off">
                      <div class="rd-search-results-live" id="rd-search-results-live"></div>
                      <div class="rd-search-form-close fl-budicons-free-cross84"></div>
                      <button class="rd-search-form-submit linearicons-magnifier"></button>
                    </div>
                  </form>
                </div>



                  <!--div class="rd-navbar-call">
                    <div class="unit-link-with-icon unit unit-spacing-xs unit-horizontal">
                      <div class="unit-left"><span class="icon icon-md-big icon-primary mdi-phone icon-gradient"></span></div>
                      <div class="unit-body"><a href="tel:#">1-800-700-6200</a></div>
                    </div>
                  </div-->
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>


      <!-- Doctors-->
      <section class="section section-breadcrumb">
        <ul class="breadcrumb-custom">
          <li><a href="./">Inicio</a></li>
          
          <li>Tomar hora
          </li>
        </ul>
      </section>






      <!-- Get in Touch-->
      <section class="section section-lg bg-white">
        <div class="shell">
          <div class="range range-30">
            <div class="cell-md-10">
              <center>
                <h3>Toma de Horas</h3>

                <p>Por favor, selecciona la hora disponible que deseas para tu atención.
                </p>

                <p><center>
                  Fecha: 
                            <?php print $fecha; ?>  
                </center>
                </p>
                    <div class="cell-sm-10">
                       <div class="form-wrap form-wrap-validation">
                        <center>
                            <button onclick="javascript:anterior_dia();" class="form-input" style=" width: 20%;float:left;margin-left:30%;" id="btn_1" name="btn_1" value=""> Día Anterior </button>
                            <button onclick="javascript:siguiente_dia();" class="form-input" style=" width: 20%;float:left;" id="btn_1" name="btn_1" value=""> Siguiente Día </button>

                        </center>
                       </div>
                    </div>
            </center>
          </div>

              
                  <div class="range range-xs-center range-20 range-narrow">
                    <div class="cell-sm-5">
                    </div>

                    <?php
                        $color = "";
                        $color_letra = "";
                        $disabled = "";
                        $rr = hora_disponible("08:00:00", "08:50:00",$hora_inicio, $hora_fin, $hora_descanso_inicio, $hora_descanso_fin, $horas_tomadas);

                        if (!$rr){
                          $color = "background-color: #e75854;";
                          $color_letra = "color:#fff;";
                          $disabled= "disabled";
                        }

                    ?>


                    <div class="cell-sm-10">
                       <div class="form-wrap form-wrap-validation">
                        <center>
                            <button onclick="javascript:tomar_hora('08:01 a 08:50');" <?php print $disabled; ?> class="form-input" style="<?php print $color . $color_letra; ?> width: 50%;" id="btn_1" name="btn_1" value="08:00 a 08:50">08:00 a 08:50 </button>
                        </center>
                      </div>
                    </div>


                    <?php
                        $color = "";
                        $color_letra = "";
                        $disabled = "";
                        $rr = hora_disponible("09:00:01", "09:50:00",$hora_inicio, $hora_fin, $hora_descanso_inicio, $hora_descanso_fin, $horas_tomadas);

                        if (!$rr){
                          $color = "background-color: #e75854;";
                          $color_letra = "color:#fff;";
                          $disabled= "disabled";
                        }

                    ?>
                    <div class="cell-sm-10">
                       <div class="form-wrap form-wrap-validation">
                        <center>
                        <button onclick="javascript:tomar_hora('09:01 a 09:50');" <?php print $disabled; ?> class="form-input" style="<?php print $color . $color_letra; ?> width: 50%;" id="btn_2" name="btn_2" value="09:00 a 09:50"> 09:00 a 09:50 </button>
                        </center>
                      </div>
                    </div>

                    <?php
                        $color = "";
                        $color_letra = "";
                        $disabled = "";
                        $rr = hora_disponible("10:00:01", "10:50:00",$hora_inicio, $hora_fin, $hora_descanso_inicio, $hora_descanso_fin, $horas_tomadas);

                        if (!$rr){
                          $color = "background-color: #e75854;";
                          $color_letra = "color:#fff;";
                          $disabled= "disabled";
                        }

                    ?>

                    <div class="cell-sm-10">
                       <div class="form-wrap form-wrap-validation">
                        <center>
                        
                        <button onclick="javascript:tomar_hora('10:01 a 10:50');" <?php print $disabled; ?>  class="form-input" style="<?php print $color . $color_letra; ?>width: 50%;" id="btn_3" name="btn_3" value="10:00 a 10:50">10:00 a 10:50</button>
                        </center>
                      </div>
                    </div>

                    <?php
                        $color = "";
                        $color_letra = "";
                        $disabled = "";
                        $rr = hora_disponible("11:00:01", "11:50:00",$hora_inicio, $hora_fin, $hora_descanso_inicio, $hora_descanso_fin, $horas_tomadas);

                        if (!$rr){
                          $color = "background-color: #e75854;";
                          $color_letra = "color:#fff;";
                          $disabled= "disabled";
                        }

                    ?>

                    <div class="cell-sm-10">
                       <div class="form-wrap form-wrap-validation">
                        <center>
                        <button onclick="javascript:tomar_hora('11:01 a 11:50');" <?php print $disabled; ?>  class="form-input" style="<?php print $color . $color_letra; ?>width: 50%;" id="btn_4" name="btn_4" value="11:00 a 11:50">11:00 a 11:50</button>
                        </center>
                      </div>
                    </div>

                    <?php
                        $color = "";
                        $color_letra = "";
                        $disabled = "";
                        $rr = hora_disponible("12:00:01", "12:50:00",$hora_inicio, $hora_fin, $hora_descanso_inicio, $hora_descanso_fin, $horas_tomadas);

                        if (!$rr){
                          $color = "background-color: #e75854;";
                          $color_letra = "color:#fff;";
                          $disabled= "disabled";
                        }

                    ?>

                    <div class="cell-sm-10">
                       <div class="form-wrap form-wrap-validation">
                        <center>
                        <button onclick="javascript:tomar_hora('12:01 a 12:50');" <?php print $disabled; ?>  class="form-input" style="<?php print $color . $color_letra; ?>width: 50%;" id="btn_5" name="btn_5" value="12:00 a 12:50">12:00 a 12:50</button>
                        </center>
                      </div>
                    </div>

                    <?php
                        $color = "";
                        $color_letra = "";
                        $disabled = "";
                        $rr = hora_disponible("13:00:01", "13:50:00",$hora_inicio, $hora_fin, $hora_descanso_inicio, $hora_descanso_fin, $horas_tomadas);

                        if (!$rr){
                          $color = "background-color: #e75854;";
                          $color_letra = "color:#fff;";
                          $disabled= "disabled";
                        }

                    ?>

                    <div class="cell-sm-10">
                       <div class="form-wrap form-wrap-validation">
                        <center>
                        <button onclick="javascript:tomar_hora('13:01 a 13:50');" <?php print $disabled; ?>  class="form-input" style="<?php print $color . $color_letra; ?>width: 50%;" id="btn_6" name="btn_6" value="13:00 a 13:50">13:00 a 13:50</button>
                        </center>
                      </div>
                    </div>

                    <?php
                        $color = "";
                        $color_letra = "";
                        $disabled = "";
                        $rr = hora_disponible("14:00:01", "14:50:00",$hora_inicio, $hora_fin, $hora_descanso_inicio, $hora_descanso_fin, $horas_tomadas);

                        if (!$rr){
                          $color = "background-color: #e75854;";
                          $color_letra = "color:#fff;";
                          $disabled= "disabled";
                        }

                    ?>

                    <div class="cell-sm-10">
                       <div class="form-wrap form-wrap-validation">
                        <center>
                        <button onclick="javascript:tomar_hora('14:01 a 14:50');" <?php print $disabled; ?>  class="form-input" style="<?php print $color . $color_letra; ?>width: 50%;" id="btn_7" name="btn_7" value="14:00 a 14:50">14:00 a 14:50</button>
                        </center>
                      </div>
                    </div>

                    <?php
                        $color = "";
                        $color_letra = "";
                        $disabled = "";
                        $rr = hora_disponible("15:00:01", "15:50:00",$hora_inicio, $hora_fin, $hora_descanso_inicio, $hora_descanso_fin, $horas_tomadas);

                        if (!$rr){
                          $color = "background-color: #e75854;";
                          $color_letra = "color:#fff;";
                          $disabled= "disabled";
                        }

                    ?>

                    <div class="cell-sm-10">
                       <div class="form-wrap form-wrap-validation">
                        <center>
                        <button onclick="javascript:tomar_hora('15:01 a 15:50');" <?php print $disabled; ?>  class="form-input" style="<?php print $color . $color_letra; ?>width: 50%;" id="btn_8" name="btn_8" value="15:00 a 15:50">15:00 a 15:50</button>
                        </center>
                      </div>
                    </div>

 
                    <?php
                        $color = "";
                        $color_letra = "";
                        $disabled = "";
                        $rr = hora_disponible("16:00:01", "16:50:00",$hora_inicio, $hora_fin, $hora_descanso_inicio, $hora_descanso_fin, $horas_tomadas);

                        if (!$rr){
                          $color = "background-color: #e75854;";
                          $color_letra = "color:#fff;";
                          $disabled= "disabled";
                        }

                    ?>

                    <div class="cell-sm-10">
                       <div class="form-wrap form-wrap-validation">
                        <center>
                        <button onclick="javascript:tomar_hora('16:01 a 16:50');" <?php print $disabled; ?>  class="form-input" style="<?php print $color . $color_letra; ?>width: 50%;" id="btn_9" name="btn_9" value="16:00 a 16:50">16:00 a 16:50</button>
                        </center>
                      </div>
                    </div>

                    <?php
                        $color = "";
                        $color_letra = "";
                        $disabled = "";
                        $rr = hora_disponible("17:00:01", "17:50:00",$hora_inicio, $hora_fin, $hora_descanso_inicio, $hora_descanso_fin, $horas_tomadas);

                        if (!$rr){
                          $color = "background-color: #e75854;";
                          $color_letra = "color:#fff;";
                          $disabled= "disabled";
                        }

                    ?>

                    <div class="cell-sm-10">
                       <div class="form-wrap form-wrap-validation">
                        <center>
                        <button onclick="javascript:tomar_hora('17:01 a 17:50');" <?php print $disabled; ?>  class="form-input" style="<?php print $color . $color_letra; ?>width: 50%;" id="btn_10" name="btn_10" value="17:00 a 17:50">17:00 a 17:50</button>
                        </center>
                      </div>
                    </div>

                    <?php
                        $color = "";
                        $color_letra = "";
                        $disabled = "";
                        $rr = hora_disponible("18:00:01", "18:50:00",$hora_inicio, $hora_fin, $hora_descanso_inicio, $hora_descanso_fin, $horas_tomadas);

                        if (!$rr){
                          $color = "background-color: #e75854;";
                          $color_letra = "color:#fff;";
                          $disabled= "disabled";
                        }

                    ?>

                    <div class="cell-sm-10">
                       <div class="form-wrap form-wrap-validation">
                        <center>
                        <button onclick="javascript:tomar_hora('18:01 a 18:50');" <?php print $disabled; ?>  class="form-input" style="<?php print $color . $color_letra; ?>width: 50%;" id="btn_11" name="btn_11" value="18:00 a 18:50">18:00 a 18:50</button>
                        </center>
                      </div>
                    </div>

                    <?php
                        $color = "";
                        $color_letra = "";
                        $disabled = "";
                        $rr = hora_disponible("19:00:01", "19:50:00",$hora_inicio, $hora_fin, $hora_descanso_inicio, $hora_descanso_fin, $horas_tomadas);

                        if (!$rr){
                          $color = "background-color: #e75854;";
                          $color_letra = "color:#fff;";
                          $disabled= "disabled";
                        }

                    ?>

                    <div class="cell-sm-10">
                       <div class="form-wrap form-wrap-validation">
                        <center>
                        <button onclick="javascript:tomar_hora('19:01 a 19:50');" <?php print $disabled; ?>  class="form-input" style="<?php print $color . $color_letra; ?>width: 50%;" id="btn_12" name="btn_12" value="19:00 a 19:50">19:00 a 19:50</button>
                        </center>
                      </div>
                    </div>


                    <div class="cell-sm-10">
                      <div class="form-wrap form-wrap-validation">
                        <center> 
                        <button  class="form-input" id="enviar" name="enviar" value="Confirmar hora" style="width: 50%;display: none;" onclick="javascript:confirmar_hora();"> 


                          Aceptar
                        </button>
                        </center>


                      </div>
                    </div>


                  </div>
                
              
            </div>
          </div>
        </div>
      </section>




      <!-- Page Footer-->
      <section class="section section-sm bg-white-lighter">
        <div class="shell shell-out">
          <div class="range range-30">
            <div class="cell-sm-3 cell-xs-5">
              <div class="preffix-xl-70" style="max-width: 274px">
                <h6 class="text-spacing-200 text-uppercase font-base">Contáctanos</h6>
                <div class="divider-modern"></div>
                <ul class="list list-md">
                  <li>
                    <div class="unit unit-spacing-xs unit-horizontal unit-custom">
                      <div class="unit-left"><span class="icon icon-md icon-primary mdi-phone icon-gradient"></span></div>
                      <div class="unit-body"><a class="link-gray-darker" href="tel:#">+56 (9) 3870 8191</a></div>
                    </div>
                  </li>
                  <li>
                    <div class="unit unit-spacing-xs unit-horizontal unit-custom">
                      <div class="unit-left"><span class="icon icon-md icon-primary mdi-email-outline icon-gradient"></span></div>
                      <div class="unit-body" style="position: relative; top: 1px"><a class="link-gray-darker" href="mailto:#">contacto@ipsy.cl</a></div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <div class="cell-sm-3 cell-xs-5">
              <div class="preffix-xl-70" style="max-width: 274px">
                <!--h6 class="text-spacing-200 text-uppercase font-base">clinic address</h6>
                <div class="divider-modern"></div>
                <ul class="list list-md">
                  <li>
                    <div class="unit unit-spacing-xs unit-horizontal">
                      <div class="unit-left"><span class="icon icon-md-biger icon-primary mdi-map-marker icon-gradient"></span></div>
                      <div class="unit-body" style="position: relative; top: -4px;"><a class="link-default" href="#">2130 Fulton Street San Diego, CA 94117-1080 USA</a></div>
                    </div>
                  </li>
                </ul-->
              </div>
            </div>
            <div class="cell-sm-4">
              <div class="preffix-xl-70" style="max-width: 433px">
                <h6 class="text-spacing-200 text-uppercase font-base">IPSY</h6>
                <div class="divider-modern"></div>
                <ul class="list-inline list-inline-lg">
                  <li>
                    <ul class="list list-marked list-marked-sm list-marked-primary" style="line-height: 1.2">
                      <li><a class="link-default" href="preguntas_frecuentes.php">¿Qué es iPsy?</a></li>
                      <li><a class="link-default" href="services.php">Terapias</a></li>
                    </ul>
                  </li>
                  <li>
                    <ul class="list list-marked list-marked-sm list-marked-primary" style="line-height: 1.2">
                      <li><a class="link-default" href="our-doctors.php">Psicólogos</a></li>
                      <li><a class="link-default" href="tomar_hora.php">Tomar Hora</a></li>
                    </ul>
                  </li>
                  <li>
                    <ul class="list list-marked list-marked-sm list-marked-primary" style="line-height: 1.2">
                      <li><a class="link-default" href="preguntas_frecuentes.php">Preguntas Frecuentes</a></li>
                      <li><a class="link-default" href="blog.php">Blog</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
      <footer class="page-footer section text-center">
        <div class="shell shell-out">
          <div class="range range-xs-reverse range-10">
            <div class="cell-xs-4 cell-sm-4 text-xs-right">
              <div class="preffix-xl-70" style="max-width: 433px">
                <ul class="list-inline">
                  <li><a class="icon icon-gray-darker fa-facebook" href="#"></a></li>
                  <li><a class="icon icon-gray-darker fa-twitter" href="#"></a></li>
                  <li><a class="icon icon-gray-darker fa-instagram" href="https://www.instagram.com/ipsy_cl/"></a></li>
                  <!--li><a class="icon icon-gray-darker fa-pinterest-p" href="#"></a></li-->
                </ul> 
              </div>
            </div>
            <div class="cell-xs-6 cell-sm-6 text-xs-left">
              <p class="copyright preffix-xl-70">iPsy &#169; <span class="copyright-year">2022</span>. <a href="privacy-policy.html">Ver Políticas de Privacidad y Uso de Datos.</a>
              </p>
            </div>
          </div>
        </div>
      </footer>
    </div>


    
    <!-- Javascript-->
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>

    <script type="text/javascript">
      

      function selecciona_terapia(){

        var id_terapia = $("#especialidad").val();

              $.ajax ({
                    url:        'php/ajax/terapeutas_from_terapia.php',  // URL a invocar asíncronamente 
                    type:         'post' ,   // Método utilizado para el requerimiento 
                    data:   {
                      'id_terapia': id_terapia
                   
                    },
                                
                    // Información local a enviarse con el requerimiento 
                    // Que hacer en caso de ser exitoso el requerimiento 
                    success:  function(data)
                    {
                      
                      console.log(data);

                      $("#terapeuta").html(data);
                      //alert("datos enviados con éxito. " + data);

                      //location.reload();

                    },
                    // Que hacer en caso de que sea fallido el requerimiento 
                    error:  function(request, settings)
                    {
                      alert("error");
                      ret =  "error";
                    }       
                  });


      }


  function selecciona_terapeuta(){
    $("#enviar").show();

  }

function ver_horario(){

  $("#form_terapeuta").submit();

}


function anterior_dia(){

      dia_de_hoy = "<?php print $anterior_dia;  ?>"; // $_GET["dia"];
      siguiente_dia = ""; //$_GET["siguiente_dia"];
      anterior_dia = "" ;//$_GET["anterior_dia"];
      fecha = "<?php print $fecha_anterior ;  ?>";

      terapeuta = "<?php print $terapeuta  ;  ?>";

      window.location.href= "tomar_hora_log2.php?dia=" + dia_de_hoy  + "&fecha=" + fecha + "&terapeuta=" + terapeuta;


}

function siguiente_dia(){

      dia_de_hoy = "<?php print $siguiente_dia;  ?>"; // $_GET["dia"];
      siguiente_dia = ""; //$_GET["siguiente_dia"];
      anterior_dia = "" ;//$_GET["anterior_dia"];
      fecha = "<?php print $fecha_siguiente ;  ?>";

      terapeuta = "<?php print $terapeuta  ;  ?>";

      window.location.href= "tomar_hora_log2.php?dia=" + dia_de_hoy  + "&fecha=" + fecha + "&terapeuta=" + terapeuta;


}

function tomar_hora(hora){

    fecha = "<?php print $fecha;  ?>";

    terapeuta = "<?php print $terapeuta;  ?>";

    if (confirm("Está seguro que desea tomar la hora indicada: " + hora)){

      window.location.href= "tomar_hora_log3.php?hora=" + hora  + "&fecha=" + fecha + "&terapeuta=" + terapeuta;



    }


}


    </script>


  </body>
</html>