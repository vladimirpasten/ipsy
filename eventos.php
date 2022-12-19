<?php session_start();
error_reporting(E_ALL);

ini_set('display_errors', '1');

//$id_blog = $_GET['id'];




//print_r($listUsers);

include "php/model/terapias.php";

$data_ = get_terapias();
$listTerapias = $data_["array"];


$diaSemana = date("w") - 1;
# Calcular el tiempo (no la fecha) de cuándo fue el inicio de semana
$tiempoDeInicioDeSemana = strtotime("-" . $diaSemana . " days"); # Restamos -X days
# Y formateamos ese tiempo
$fechaInicioSemana = date("Y-m-d", $tiempoDeInicioDeSemana);
# Ahora para el fin, sumamos
$tiempoDeFinDeSemana = strtotime("+7 days", $tiempoDeInicioDeSemana); # Sumamos +X days, pero partiendo del tiempo de inicio
# Y formateamos
$fechaFinSemana = date("Y-m-d", $tiempoDeFinDeSemana);

# Listo. Hora de imprimir
//print "Hoy es " . date("Y-m-d") . ". ";
//print  "El inicio de semana es $fechaInicioSemana y el fin es $fechaFinSemana";

include "php/model/charlas.php";

$data_ = get_charlas($fechaInicioSemana, $fechaFinSemana);
$listCharlas = $data_["array"];

//print_r($listCharlas);

$array_horas = array("07:00", "07:30", "08:00","08:30",
                "09:00", "09:30", "10:00", "10:30",
                "11:00", "11:30", "12:00", "12:30",
                "13:00", "13:30", "14:00", "14:30",
                "15:00", "15:30", "16:00", "16:30",
                "17:00", "17:30", "18:00", "18:30",
                "19:00", "19:30", "20:00", "20:30",
                "21:00", "21:30", "22:30"
              );


?>


<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head> 
    <!-- Site Title-->
    <title>IPsy Blog</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="images/new/logo_ipsy.png" type="image/x-icon">
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=JosefinSans:400,700%7CQuattrocento+Sans:400,700">
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
                      <ul class="rd-navbar-dropdown">
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
                    <li><a href="tomar_hora.php">Tomar hora</a></li>
                    <li class="active"><a href="blog.php">iPsy Blog</a></li>
                    <li><a href="eventos.php">Eventos</a></li>
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
        <div class="parallax-container breadcrumb-wrapper" data-parallax-img="images/headers/ipsyblog.jpg">
          <div class="parallax-content section-lg context-dark">
            <div class="shell context-dark">
              <h2> iPsy Eventos </h2>
              <div class="divider"></div>
            </div>
          </div>
        </div>
      </section>


      <!-- DateTimeTable-->
      <section class="section section-lg bg-white">
        <div class="shell">
          <button class="button button-timeline button-sm button-primary" data-custom-toggle=".time-table-header" data-custom-toggle-disable-on-blur="true">Seleccione por terapias</button>
          <div class="time-table-header">
            <ul class="timeline-list">
              <li class="active" data-event="event-all">All</li>

                <?php foreach ($listTerapias   as $user){
                ?>  

                      <li data-event="event-<?php print $user["id"];?>"> <?php print $user["nombre"];?></li>

                <?php
                  }
                ?> 
              

              <!--li data-event="event-6">Family Therapy</li>
              <li data-event="event-1">Couples Therapy</li>
              <li data-event="event-2">Career Counseling</li>
              <li data-event="event-7">Stress Therapy</li>
              <li data-event="event-4">Child Counseling</li>
              <li data-event="event-3">Private Counseling</li>
              <li data-event="event-8">Mental Health</li-->
            </ul>
            <ul class="timeline-list-nav">
              <li class="fl-budicons-free-left161 icon icon-md prev"></li>
              <li class="fl-budicons-free-right163 icon icon-md next"></li>
            </ul>
          </div>
        </div>
        <div class="cd-schedule-wrap">
          <!-- Timetable-->
          <div class="cd-schedule loading text-center">
            <div class="timeline text-left" style="height:auto;">
              <ul>
                <!--li><span>07:00</span></li>
                <li><span>07:30</span></li>
                <li><span>08:00</span></li>
                <li><span>08:30</span></li>
                <li><span>09:00</span></li>
                <li><span>09:30</span></li>
                <li><span>10:00</span></li>
                <li><span>10:30</span></li>
                <li><span>11:00</span></li-->
                <li><span>11:30</span></li>
                <li><span>12:00</span></li>
                <li><span>12:30</span></li>
                <li class="active"><span>13:00</span></li>
                <li><span>13:30</span></li>
                <li><span>14:00</span></li>
                <li><span>14:30</span></li>
                <li><span>15:00</span></li>
                <li><span>15:30</span></li>
                <li><span>16:00</span></li>
                <li><span>16:30</span></li>
                <li><span>17:00</span></li>
                <li><span>17:30</span></li>
                <li><span>18:00</span></li>
                <li><span>18:30</span></li>
                <li><span>19:00</span></li>
                <li><span>19:30</span></li>
                <li><span>20:00</span></li>
                <li><span>20:30</span></li>
                <li><span>21:00</span></li>
                <li><span>21:30</span></li>

                <li><span>22:00</span></li>

              </ul>
            </div>
            <!-- .timeline-->
            <div class="events">
              <ul>
                <!-- Sunday-->
                <li class="events-group">

<?php 

  $fecha_dia = $fechaInicioSemana;

  $count_eventos = 1;


?>



                  <div class="top-info"><span>Lunes</span></div>
                  <ul>


                    <?php 

                      foreach ($listCharlas as $charla) {
                        // code...

                        if ($charla["fecha"] == $fecha_dia){

                          $horaInicial = $charla["hora"];
                          $nuevaHora=date("H:i",strtotime($horaInicial)+5400);



                          print "<li class='single-event'  onclick='javascript:hid(".$charla["id"].")' data-start='".$charla["hora"]."' data-end='".$nuevaHora."' data-event='event-".$count_eventos."'><a href='#0'><span class='event-name'>" . $charla["titulo"] ."</span><span class='event-place'>Room 16</span><span class='this-time'></span><span class='event-content'> ". $charla["autor"] ." </span><span class='event-info'>".$charla["texto"] . "</span></a></li>";
                          $count_eventos++;
                        }




                      }
                    ?>

                  </ul>
                </li>

                <!-- Martes-->
                <?php 

                //$fecha_dia = $fechaInicioSemana;
                $fecha_i = strtotime($fecha_dia);
                $fecha_nueva = strtotime("+1 days", $fecha_i); //Sumamos 1 days
                # Y formateamos ese tiempo
                $fecha_ = date("Y-m-d", $fecha_nueva);



                ?>


                <li class="events-group">
                  <div class="top-info"><span>Martes</span></div>
                  <ul>

                    <?php 

                      foreach ($listCharlas as $charla) {
                        // code...

                        if ($charla["fecha"] == $fecha_){
                          $horaInicial = $charla["hora"];
                          $nuevaHora=date("H:i",strtotime($horaInicial)+5400);


                          print "<li class='single-event'  onclick='javascript:hid(".$charla["id"].")' data-start='".$charla["hora"]."' data-end='".$nuevaHora."' data-event='event-".$count_eventos."'><a href='#0'><span class='event-name'>" . $charla["titulo"] ."</span><span class='event-place'>Room 16</span><span class='this-time'></span><span class='event-content'> ". $charla["autor"] ." </span><span class='event-info'>".$charla["texto"] . "</span></a></li>";
                          $count_eventos++;
                        }




                      }
                    ?>


                  </ul>
                </li>
                <!-- Miércoles-->
                
                <?php 

                //$fecha_dia = $fechaInicioSemana;
                $fecha_i = strtotime($fecha_);
                $fecha_nueva = strtotime("+1 days", $fecha_i); # Sumamos 1 days
                # Y formateamos ese tiempo
                $fecha_ = date("Y-m-d", $fecha_nueva);



                ?>


                <li class="events-group">
                  <div class="top-info"><span>Miércoles</span></div>
                  <ul>

                    <?php 

                      foreach ($listCharlas as $charla) {
                        // code...

                        if ($charla["fecha"] == $fecha_){
                          $horaInicial = $charla["hora"];
                          $nuevaHora=date("H:i",strtotime($horaInicial)+5400);



                          print "<li class='single-event'  onclick='javascript:hid(".$charla["id"].")' data-start='".$charla["hora"]."' data-end='".$nuevaHora."' data-event='event-".$count_eventos."'><a href='#0'><span class='event-name'>" . $charla["titulo"] ."</span><span class='event-place'>Room 16</span><span class='this-time'></span><span class='event-content'> ". $charla["autor"] ." </span><span class='event-info'>".$charla["texto"] . "</span></a></li>";
                          $count_eventos++;
                        }




                      }
                    ?>


                  </ul>
                </li>

                <!-- Jueve-->
                
                <?php 

                //$fecha_dia = $fechaInicioSemana;
                $fecha_i = strtotime($fecha_);
                $fecha_nueva = strtotime("+1 days", $fecha_i); # Sumamos 1 days
                # Y formateamos ese tiempo
                $fecha_ = date("Y-m-d", $fecha_nueva);



                ?>


                <li class="events-group">
                  <div class="top-info"><span>Jueves</span></div>
                  <ul>

                    <?php 

                      foreach ($listCharlas as $charla) {
                        // code...

                        if ($charla["fecha"] == $fecha_){
                          $horaInicial = $charla["hora"];
                          $nuevaHora=date("H:i",strtotime($horaInicial)+5400);


                          print "<li class='single-event'  onclick='javascript:hid(".$charla["id"].")' data-start='".$charla["hora"]."' data-end='".$nuevaHora."' data-event='event-".$count_eventos."'><a href='#0'><span class='event-name'>" . $charla["titulo"] ."</span><span class='event-place'>Room 16</span><span class='this-time'></span><span class='event-content'> ". $charla["autor"] ." </span><span class='event-info'>".$charla["texto"] . "</span></a></li>";
                          $count_eventos++;  
                        }




                      }
                    ?>


                  </ul>
                </li>

                
                <!-- Viernes-->
                <?php 

                //$fecha_dia = $fechaInicioSemana;
                $fecha_i = strtotime($fecha_);
                $fecha_nueva = strtotime("+1 days", $fecha_i); # Sumamos 1 days
                # Y formateamos ese tiempo
                $fecha_ = date("Y-m-d", $fecha_nueva);



                ?>


                <li class="events-group">
                  <div class="top-info"><span>Viernes</span></div>
                  <ul>

                    <?php 

                      foreach ($listCharlas as $charla) {
                        // code...

                        if ($charla["fecha"] == $fecha_){
                          $horaInicial = $charla["hora"];
                          $nuevaHora=date("H:i",strtotime($horaInicial)+5400);



                          print "<li class='single-event'  onclick='javascript:hid(".$charla["id"].")' data-start='".$charla["hora"]."' data-end='".$nuevaHora."' data-event='event-".$count_eventos."'><a href='#0'><span class='event-name'>" . $charla["titulo"] ."</span><span class='event-place'>Room 16</span><span class='this-time'></span><span class='event-content'> ". $charla["autor"] ." </span><span class='event-info'>".$charla["texto"] . "</span></a>   </li>";
                          $count_eventos++;
                        }




                      }
                    ?>


                  </ul>
                </li>


                <!-- Sábado-->
                
                <?php 

                //$fecha_dia = $fechaInicioSemana;
                $fecha_i = strtotime($fecha_);
                $fecha_nueva = strtotime("+1 days", $fecha_i); # Sumamos 1 days
                # Y formateamos ese tiempo
                $fecha_ = date("Y-m-d", $fecha_nueva);



                ?>


                <li class="events-group">
                  <div class="top-info"><span>Sábado</span></div>
                  <ul>

                    <?php 

                      foreach ($listCharlas as $charla) {
                        // code...

                        if ($charla["fecha"] == $fecha_){
                          $horaInicial = $charla["hora"];
                          $nuevaHora=date("H:i",strtotime($horaInicial)+5400);


                          print "<li class='single-event'  onclick='javascript:hid(".$charla["id"].")' data-start='".$charla["hora"]."' data-end='".$nuevaHora."' data-event='event-".$count_eventos."'><a href='#0'><span class='event-name'>" . $charla["titulo"] ."</span><span class='event-place'>Room 16</span><span class='this-time'></span><span class='event-content'> ". $charla["autor"] ." </span><span class='event-info'>".$charla["texto"] . "</span></a></li>";
                          $count_eventos++;

                        }




                      }
                    ?>


                  </ul>
                </li>

                <!--  Domingo-->
                
                <?php 

                //$fecha_dia = $fechaInicioSemana;
                $fecha_i = strtotime($fecha_);
                $fecha_nueva = strtotime("+1 days", $fecha_i); # Sumamos 1 days
                # Y formateamos ese tiempo
                $fecha_ = date("Y-m-d", $fecha_nueva);



                ?>



                <li class="events-group">
                  <div class="top-info"><span>Domingo</span></div>
                  <ul>

                    <?php 

                      foreach ($listCharlas as $charla) {
                        // code...

                        if ($charla["fecha"] == $fecha_){
                          $horaInicial = $charla["hora"];
                          $nuevaHora=date("H:i",strtotime($horaInicial)+5400);


                          print "<li class='single-event' onclick='javascript:hid(".$charla["id"].")' data-start='".$charla["hora"]."' data-end='".$nuevaHora."' data-event='event-".$count_eventos."'><a href='#0'><span class='event-name'>" . $charla["titulo"] ."</span><span class='event-place'>Room 16</span><span class='this-time'></span><span class='event-content'> ". $charla["autor"] ." </span><span class='event-info'>".$charla["texto"] . "</span></a></li>";
                          $count_eventos++;

                        }




                      }
                    ?>


                  </ul>
                </li>

              </ul>
            </div>

            <div class="event-modal">
              <header class="header">
                <div class="content">
                  <span class="event-name"></span>
                  <span class="event-place"></span>
                  <span class="event-date"></span>
                  
                  <span class="event-content"></span>
                  <span class="event-add"> <button onclick="javascript:inscribir();" class='form-input' id='enviar' name='enviar' value='Inscribirme' style='width: 100%;  color: #fff;background-color: #01C4C7;' >Inscribirme</button>  </span>  
                  <input type="hidden" name="hdn_id_event" id="hdn_id_event" value=""/>

                </div>
                <div class="header-bg"></div>
              </header>
              <div class="body">
                <div class="event-info"></div>
                
                <div class="body-bg"></div>
              </div><a class="close" href="#0">Close</a>
            </div>
            <div class="cover-layer"></div>
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
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript-->
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>

<script language="javascript">


       $(document).ready(function(){

        //cargar_ultimos_terapeutas();
        //cargar_terapias();
       });
 

      function cargar_ultimos_terapeutas(){

              $.ajax ({
                    url:        'php/ajax/cargar_medicos_index.php',  // URL a invocar asíncronamente 
                    type:         'post' ,   // Método utilizado para el requerimiento 
                                
                    // Información local a enviarse con el requerimiento 
                    // Que hacer en caso de ser exitoso el requerimiento 
                    success:  function(data)
                    {
                      
                      console.log(data);

                      $("#ultimos_terapeutas").html(data);



                    },
                    // Que hacer en caso de que sea fallido el requerimiento 
                    error:  function(request, settings)
                    {
                      alert("error");
                      ret =  "error";
                    }       
                  });




      }
 


/*
      function cargar_terapias(){

              $.ajax ({
                    url:        'php/ajax/cargar_terapias_index.php',  // URL a invocar asíncronamente 
                    type:         'post' ,   // Método utilizado para el requerimiento 
                                
                    // Información local a enviarse con el requerimiento 
                    // Que hacer en caso de ser exitoso el requerimiento 
                    success:  function(data)
                    {
                      
                      console.log(data);

                      $("#terapias").html(data);



                    },
                    // Que hacer en caso de que sea fallido el requerimiento 
                    error:  function(request, settings)
                    {
                      alert("error");
                      ret =  "error";
                    }       
                  });




      }
 */

 function inscribir(){
  var id = $("#hdn_id_event").val();
  window.location.href = "inscribir_evento.php?id="+id ;

 }

function hid(id){
  //alert(id);
  $("#hdn_id_event").val(id);



}

</script>