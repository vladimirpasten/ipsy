<?php session_start();
error_reporting(E_ALL);

ini_set('display_errors', '1');

function hourIsBetween($from, $to, $input) {
    return ($from <= $input && $to >= $input);
}

function hora_disponible($hora_inicio, $hora_fin, $inicio, $fin , $hora_descanso_inicio, $hora_descanso_fin, $horas_tomadas){

    //Si esta hora está entre inicio y fin:
    if (hourIsBetween($inicio, $fin, $hora_inicio) && hourIsBetween($inicio, $fin, $hora_fin) ){

        //si esta hora está fuera del horario de descanso:
        if (!hourIsBetween($hora_descanso_inicio, $hora_descanso_fin, $hora_inicio) && !hourIsBetween($hora_descanso_inicio, $hora_descanso_fin, $hora_fin)){

            //Si la hora no está tomada ya por otro paciente:
              foreach ($horas_tomadas as $horat) {
                
                  if (hourIsBetween($hora_inicio, $hora_fin, $horat["hora_inicio"]) && hourIsBetween($hora_inicio, $hora_fin, $horat["hora_fin"])){
//                    print "3: false";

                    $params = "?hora_inicio=" . $hora_inicio . "&hora_fin=" . $hora_fin . "&id_paciente=" . $horat["id_paciente"] . "&fecha=" . $horat["fecha"] . "&nombre_paciente=" . $horat["nombre_paciente"];
                    return " Hora tomada por " . $horat["nombre_paciente"] . " <a href='ver_ficha.php".$params."'>Ver Ficha</a> ";
                  }

              }
        }else{
//          print "2: false";
          return "descanso";
        }
    }else{
//      print "1: false";
      return "fuera";
    }
      return "libre";
}



$logged = 0;
$name_user_logged = "";
$id_user = "";
$area = "";
$type_user = "";
$admin = "";

if (isset($_SESSION['usuario'])){

    //if ($_SESSION['admin']=="1") {
        $name_user_logged = $_SESSION['usuario'];
        $id_user = $_SESSION['id'];
        $logged = 1;
        $area = $_SESSION['mail'];
        $type_user = $_SESSION['type_user'];
        $admin = $_SESSION['admin'];
    //}
}

if ($logged == 0){
    ;//header('Location: login.html');
}

$section = "users";
$list = array();

$dia_de_hoy = "";
$siguiente_dia = "";
$anterior_dia = "";
$fecha = "";



//echo "The current date and time are $fecha.";


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

include "php/model/users.php";

$array_fecha = explode("-", $fecha);
$fecha2 = $array_fecha[2] . "-" . $array_fecha[1] . "-" . $array_fecha[0];


$data_ = get_horas($id_user, $fecha2);
$horas_tomadas = $data_["array"];



$data_ = get_horario($id_user);
$listUsers = $data_["array"];
$ter = $listUsers[0]; 

$dia_array_inicio = "inicio_".$dia_de_hoy;
$dia_array_termino = "final_".$dia_de_hoy; 
$descanso_array_inicio = "descanso_inicio_".$dia_de_hoy;
$descanso_array_termino = "descanso_fin_".$dia_de_hoy; 

$hora_inicio = $ter[$dia_array_inicio];
$hora_fin = $ter[$dia_array_termino];
$hora_descanso_inicio = $ter[$descanso_array_inicio];
$hora_descanso_fin = $ter[$descanso_array_termino];


?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Horas tomadas</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/plugins/summernote/summernote-bs4.css" rel="stylesheet">


</head>

<body>

    <div id="wrapper">


    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <img alt="image" class="rounded-circle" src="img/profile_small.jpg"/>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="block m-t-xs font-bold">David Williams</span>
                            <span class="text-muted text-xs block">Art Director <b class="caret"></b></span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a class="dropdown-item" href="profile.html">Profile</a></li>
                            <li><a class="dropdown-item" href="contacts.html">Contacts</a></li>
                            <li><a class="dropdown-item" href="mailbox.html">Mailbox</a></li>
                            <li class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="login.html">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>

                <?php if ($type_user == "1") { ?>
                <li>
                    <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Usuarios</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        
                        <li><a href="usuarios_pendientes.php">Pendientes</a></li>
                        <li><a href="usuarios_aceptados.php">Aceptados</a></li>
                        <li><a href="pacientes.php">Pacientes</a></li>
                        <!--li class="active"><a href="banner_izquierdo.html">Banner Derecho</a></li-->
                    </ul>
                </li>

                <?php } ?>

                <li>
                    <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Web</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        
                        <li  class="active"><a href="perfil.php">Perfil</a></li>
                        <li><a href="blog.php">Blog</a></li>
                        <li><a href="charlas.php">Charlas</a></li>
                        <li><a href="solicitudes.php">Solicitudes</a></li>
                        <!--li><a href="usuarios_aceptados.php">Aceptados</a></li-->
                        <!--li class="active"><a href="banner_izquierdo.html">Banner Derecho</a></li-->
                    </ul>
                </li>
                <li class="active">
                    <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Atención</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        
                        <li><a href="horarios.php">Horarios</a></li>
                        <li  class="active"><a href="horas.php">Horas</a></li>

                        <li><a href="fichas.php">Fichas</a></li>
                        <!--li><a href="usuarios_aceptados.php">Aceptados</a></li-->
                        <!--li class="active"><a href="banner_izquierdo.html">Banner Derecho</a></li-->
                    </ul>
                </li>


                <!--li>
                    <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Preferentes</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="active"><a href="form_editors.html">Horarios</a></li>
                        <li class="active"><a href="form_editors_metodos.html">Métodos</a></li>
                    </ul>
                </li-->


                <!--li>
                    <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Contenidos</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="form_basic.html">Contenidos</a></li>
                    </ul>
                </li-->


                
                <!--li>
                    <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Analítica</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="analitica_banners.html">Flot Charts</a></li>
                        <li><a href="analitica_ingresos.html">Flot Charts</a></li>
                        <li><a href="analitica_pagar.html">Flot Charts</a></li>
                    </ul>
                </li-->
            </ul>

        </div>
    </nav>



        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
            <ul class="nav navbar-top-links navbar-right">


                <li>
                    <a href="login.html">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Administrador</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a>Horas</a>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>












        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">



                            

                        <div class="col-lg-8">
                            <div class="ibox ">
                                <div class="ibox-title">
                                    <h5>Horas del día: <?php print $fecha; ?></h5>


                                </div>



                                <div class="form-group row">

                                    <div class="col-lg-4">
                                        <button class="btn btn-sm btn-primary float-left m-t-n-l" onclick="javascript:anterior_dia();" style=" margin-left: 100px;width: 50%;" id="btn_1" name="btn_1" value=""> Día Anterior </button>
                                    </div>


                                    <div class="col-lg-4">
                                        <button class="btn btn-sm btn-primary float-right m-t-n-l" onclick="javascript:siguiente_dia();" style=" width: 50%;" id="btn_1" name="btn_1" value=""> Siguiente Día </button>


                                    </div>
                                </div>






                                <div class="ibox-content inspinia-timeline">




                                    <?php
                                        $color = "";
                                        $disabled = "";
                                        $rr = hora_disponible("08:00:00", "08:50:00",$hora_inicio, $hora_fin, $hora_descanso_inicio, $hora_descanso_fin, $horas_tomadas);
                                        $texto = "";

                                        if ($rr == "libre"){
                                            $texto = "No agendado aún.";
                                        }else{
                                            if ($rr == "fuera"){
                                              $color = "background-color: #2f4050;";
                                              $disabled= "disabled";
                                              $texto = "Fuera de horario de atención.";

                                            }else{
                                                if ($rr == "descanso"){
                                                  $color = "background-color: #2f4050;";
                                                  $disabled= "disabled";
                                                  $texto = "Hora de Descanso.";
                                                }else{
                                                    //hora tomada por 
                                                    $texto = "<br>" . $rr;
                                                }

                                            }

                                        }

                                    ?>
                                    <div class="timeline-item">
                                        <div class="row">
                                            <div class="col-4 date">
                                                <i class="fa fa-briefcase"></i>
                                                08:00 am
                                                <br/>
                                                <!--small class="text-navy">2 hour ago</small-->
                                            </div>
                                            <div class="col content no-top-border" style="<?php print $color;?>">

                                                <p class="m-b-xs"><strong>Agendamiento</strong></p>

                                                <p><?php print $texto; ?></p>

                                                <!--p><span data-diameter="40" class="updating-chart">5,3,9,6,5,9,7,3,5,2,5,3,9,6,5,9,4,7,3,2,9,8,7,4,5,1,2,9,5,4,7,2,7,7,3,5,2</span></p-->
                                            </div>
                                        </div>
                                    </div>



                                    <?php
                                        $color = "";
                                        $disabled = "";
                                        $rr = hora_disponible("09:00:00", "09:50:00",$hora_inicio, $hora_fin, $hora_descanso_inicio, $hora_descanso_fin, $horas_tomadas);
                                        $texto = "";

                                        if ($rr == "libre"){
                                            ;
                                        }else{
                                            if ($rr == "fuera"){
                                              $color = "background-color: #2f4050;";
                                              $disabled= "disabled";
                                              $texto = "Fuera de horario de atención.";

                                            }else{
                                                if ($rr == "descanso"){
                                                  $color = "background-color: #2f4050;";
                                                  $disabled= "disabled";
                                                  $texto = "Hora de Descanso.";
                                                }else{
                                                    //hora tomada por 
                                                    $texto = "<br>" . $rr;
                                                }

                                            }

                                        }

                                    ?>
                                    <div class="timeline-item">
                                        <div class="row">
                                            <div class="col-4 date">
                                                <i class="fa fa-briefcase"></i>
                                                09:00 am
                                                <br/>
                                                <!--small class="text-navy">2 hour ago</small-->
                                            </div>
                                            <div class="col content no-top-border" style="<?php print $color;?>">

                                                <p class="m-b-xs"><strong>Agendamiento</strong></p>

                                                <p><?php print $texto; ?></p>

                                                <!--p><span data-diameter="40" class="updating-chart">5,3,9,6,5,9,7,3,5,2,5,3,9,6,5,9,4,7,3,2,9,8,7,4,5,1,2,9,5,4,7,2,7,7,3,5,2</span></p-->
                                            </div>
                                        </div>
                                    </div>


                                    <?php
                                        $color = "";
                                        $disabled = "";
                                        $rr = hora_disponible("10:00:00", "10:50:00",$hora_inicio, $hora_fin, $hora_descanso_inicio, $hora_descanso_fin, $horas_tomadas);
                                        $texto = "";

                                        if ($rr == "libre"){
                                            ;
                                        }else{
                                            if ($rr == "fuera"){
                                              $color = "background-color: #2f4050;";
                                              $disabled= "disabled";
                                              $texto = "Fuera de horario de atención.";

                                            }else{
                                                if ($rr == "descanso"){
                                                  $color = "background-color: #2f4050;";
                                                  $disabled= "disabled";
                                                  $texto = "Hora de Descanso.";
                                                }else{
                                                    //hora tomada por 
                                                    $texto = "<br>" . $rr;
                                                }

                                            }

                                        }

                                    ?>
                                    <div class="timeline-item">
                                        <div class="row">
                                            <div class="col-4 date">
                                                <i class="fa fa-briefcase"></i>
                                                10:00 am
                                                <br/>
                                                <!--small class="text-navy">2 hour ago</small-->
                                            </div>
                                            <div class="col content no-top-border" style="<?php print $color;?>">

                                                <p class="m-b-xs"><strong>Agendamiento</strong></p>

                                                <p><?php print $texto; ?></p>

                                                <!--p><span data-diameter="40" class="updating-chart">5,3,9,6,5,9,7,3,5,2,5,3,9,6,5,9,4,7,3,2,9,8,7,4,5,1,2,9,5,4,7,2,7,7,3,5,2</span></p-->
                                            </div>
                                        </div>
                                    </div>




                                    <?php
                                        $color = "";
                                        $disabled = "";
                                        $rr = hora_disponible("11:00:00", "11:50:00",$hora_inicio, $hora_fin, $hora_descanso_inicio, $hora_descanso_fin, $horas_tomadas);
                                        $texto = "";

                                        if ($rr == "libre"){
                                            ;
                                        }else{
                                            if ($rr == "fuera"){
                                              $color = "background-color: #2f4050;";
                                              $disabled= "disabled";
                                              $texto = "Fuera de horario de atención.";

                                            }else{
                                                if ($rr == "descanso"){
                                                  $color = "background-color: #2f4050;";
                                                  $disabled= "disabled";
                                                  $texto = "Hora de Descanso.";
                                                }else{
                                                    //hora tomada por 
                                                    $texto = "<br>" . $rr;
                                                }

                                            }

                                        }

                                    ?>
                                    <div class="timeline-item">
                                        <div class="row">
                                            <div class="col-4 date">
                                                <i class="fa fa-briefcase"></i>
                                                11:00 am
                                                <br/>
                                                <!--small class="text-navy">2 hour ago</small-->
                                            </div>
                                            <div class="col content no-top-border" style="<?php print $color;?>">

                                                <p class="m-b-xs"><strong>Agendamiento</strong></p>

                                                <p><?php print $texto; ?></p>

                                                <!--p><span data-diameter="40" class="updating-chart">5,3,9,6,5,9,7,3,5,2,5,3,9,6,5,9,4,7,3,2,9,8,7,4,5,1,2,9,5,4,7,2,7,7,3,5,2</span></p-->
                                            </div>
                                        </div>
                                    </div>


                                    <?php
                                        $color = "";
                                        $disabled = "";
                                        $rr = hora_disponible("12:00:00", "12:50:00",$hora_inicio, $hora_fin, $hora_descanso_inicio, $hora_descanso_fin, $horas_tomadas);
                                        $texto = "";

                                        if ($rr == "libre"){
                                            ;
                                        }else{
                                            if ($rr == "fuera"){
                                              $color = "background-color: #2f4050;";
                                              $disabled= "disabled";
                                              $texto = "Fuera de horario de atención.";

                                            }else{
                                                if ($rr == "descanso"){
                                                  $color = "background-color: #2f4050;";
                                                  $disabled= "disabled";
                                                  $texto = "Hora de Descanso.";
                                                }else{
                                                    //hora tomada por 
                                                    $texto = "<br>" . $rr;
                                                }

                                            }

                                        }

                                    ?>
                                    <div class="timeline-item">
                                        <div class="row">
                                            <div class="col-4 date">
                                                <i class="fa fa-briefcase"></i>
                                                12:00 am
                                                <br/>
                                                <!--small class="text-navy">2 hour ago</small-->
                                            </div>
                                            <div class="col content no-top-border" style="<?php print $color;?>">

                                                <p class="m-b-xs"><strong>Agendamiento</strong></p>

                                                <p><?php print $texto; ?></p>

                                                <!--p><span data-diameter="40" class="updating-chart">5,3,9,6,5,9,7,3,5,2,5,3,9,6,5,9,4,7,3,2,9,8,7,4,5,1,2,9,5,4,7,2,7,7,3,5,2</span></p-->
                                            </div>
                                        </div>
                                    </div>


                                    <?php
                                        $color = "";
                                        $disabled = "";
                                        $rr = hora_disponible("13:00:00", "13:50:00",$hora_inicio, $hora_fin, $hora_descanso_inicio, $hora_descanso_fin, $horas_tomadas);
                                        $texto = "";

                                        if ($rr == "libre"){
                                            ;
                                        }else{
                                            if ($rr == "fuera"){
                                              $color = "background-color: #2f4050;";
                                              $disabled= "disabled";
                                              $texto = "Fuera de horario de atención.";

                                            }else{
                                                if ($rr == "descanso"){
                                                  $color = "background-color: #2f4050;";
                                                  $disabled= "disabled";
                                                  $texto = "Hora de Descanso.";
                                                }else{
                                                    //hora tomada por 
                                                    $texto = "<br>" . $rr;
                                                }

                                            }

                                        }

                                    ?>
                                    <div class="timeline-item">
                                        <div class="row">
                                            <div class="col-4 date">
                                                <i class="fa fa-briefcase"></i>
                                                13:00 am
                                                <br/>
                                                <!--small class="text-navy">2 hour ago</small-->
                                            </div>
                                            <div class="col content no-top-border" style="<?php print $color;?>">

                                                <p class="m-b-xs"><strong>Agendamiento</strong></p>

                                                <p><?php print $texto; ?></p>

                                                <!--p><span data-diameter="40" class="updating-chart">5,3,9,6,5,9,7,3,5,2,5,3,9,6,5,9,4,7,3,2,9,8,7,4,5,1,2,9,5,4,7,2,7,7,3,5,2</span></p-->
                                            </div>
                                        </div>
                                    </div>


                                    <?php
                                        $color = "";
                                        $disabled = "";
                                        $rr = hora_disponible("14:00:00", "14:50:00",$hora_inicio, $hora_fin, $hora_descanso_inicio, $hora_descanso_fin, $horas_tomadas);
                                        $texto = "";

                                        if ($rr == "libre"){
                                            ;
                                        }else{
                                            if ($rr == "fuera"){
                                              $color = "background-color: #2f4050;";
                                              $disabled= "disabled";
                                              $texto = "Fuera de horario de atención.";

                                            }else{
                                                if ($rr == "descanso"){
                                                  $color = "background-color: #2f4050;";
                                                  $disabled= "disabled";
                                                  $texto = "Hora de Descanso.";
                                                }else{
                                                    //hora tomada por 
                                                    $texto = "<br>" . $rr;
                                                }

                                            }

                                        }

                                    ?>
                                    <div class="timeline-item">
                                        <div class="row">
                                            <div class="col-4 date">
                                                <i class="fa fa-briefcase"></i>
                                                14:00 am
                                                <br/>
                                                <!--small class="text-navy">2 hour ago</small-->
                                            </div>
                                            <div class="col content no-top-border" style="<?php print $color;?>">

                                                <p class="m-b-xs"><strong>Agendamiento</strong></p>

                                                <p><?php print $texto; ?></p>

                                                <!--p><span data-diameter="40" class="updating-chart">5,3,9,6,5,9,7,3,5,2,5,3,9,6,5,9,4,7,3,2,9,8,7,4,5,1,2,9,5,4,7,2,7,7,3,5,2</span></p-->
                                            </div>
                                        </div>
                                    </div>



                                    <?php
                                        $color = "";
                                        $disabled = "";
                                        $rr = hora_disponible("15:00:01", "15:50:00",$hora_inicio, $hora_fin, $hora_descanso_inicio, $hora_descanso_fin, $horas_tomadas);
                                        $texto = "";

                                        if ($rr == "libre"){
                                            ;
                                        }else{
                                            if ($rr == "fuera"){
                                              $color = "background-color: #2f4050;";
                                              $disabled= "disabled";
                                              $texto = "Fuera de horario de atención.";

                                            }else{
                                                if ($rr == "descanso"){
                                                  $color = "background-color: #2f4050;";
                                                  $disabled= "disabled";
                                                  $texto = "Hora de Descanso.";
                                                }else{
                                                    //hora tomada por 
                                                    $texto = "<br>" . $rr;
                                                }

                                            }

                                        }

                                    ?>
                                    <div class="timeline-item">
                                        <div class="row">
                                            <div class="col-4 date">
                                                <i class="fa fa-briefcase"></i>
                                                15:00 am
                                                <br/>
                                                <!--small class="text-navy">2 hour ago</small-->
                                            </div>
                                            <div class="col content no-top-border" style="<?php print $color;?>">

                                                <p class="m-b-xs"><strong>Agendamiento</strong></p>

                                                <p><?php print $texto; ?></p>

                                                <!--p><span data-diameter="40" class="updating-chart">5,3,9,6,5,9,7,3,5,2,5,3,9,6,5,9,4,7,3,2,9,8,7,4,5,1,2,9,5,4,7,2,7,7,3,5,2</span></p-->
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                        $color = "";
                                        $disabled = "";
                                        $rr = hora_disponible("16:00:00", "16:50:00",$hora_inicio, $hora_fin, $hora_descanso_inicio, $hora_descanso_fin, $horas_tomadas);
                                        $texto = "";

                                        if ($rr == "libre"){
                                            ;
                                        }else{
                                            if ($rr == "fuera"){
                                              $color = "background-color: #2f4050;";
                                              $disabled= "disabled";
                                              $texto = "Fuera de horario de atención.";

                                            }else{
                                                if ($rr == "descanso"){
                                                  $color = "background-color: #2f4050;";
                                                  $disabled= "disabled";
                                                  $texto = "Hora de Descanso.";
                                                }else{
                                                    //hora tomada por 
                                                    $texto = "<br>" . $rr;
                                                }

                                            }

                                        }

                                    ?>
                                    <div class="timeline-item">
                                        <div class="row">
                                            <div class="col-4 date">
                                                <i class="fa fa-briefcase"></i>
                                                16:00 am
                                                <br/>
                                                <!--small class="text-navy">2 hour ago</small-->
                                            </div>
                                            <div class="col content no-top-border" style="<?php print $color;?>">

                                                <p class="m-b-xs"><strong>Agendamiento</strong></p>

                                                <p><?php print $texto; ?></p>

                                                <!--p><span data-diameter="40" class="updating-chart">5,3,9,6,5,9,7,3,5,2,5,3,9,6,5,9,4,7,3,2,9,8,7,4,5,1,2,9,5,4,7,2,7,7,3,5,2</span></p-->
                                            </div>
                                        </div>
                                    </div>


                                    <?php
                                        $color = "";
                                        $disabled = "";
                                        $rr = hora_disponible("17:00:00", "17:50:00",$hora_inicio, $hora_fin, $hora_descanso_inicio, $hora_descanso_fin, $horas_tomadas);
                                        $texto = "";

                                        if ($rr == "libre"){
                                            ;
                                        }else{
                                            if ($rr == "fuera"){
                                              $color = "background-color: #2f4050;";
                                              $disabled= "disabled";
                                              $texto = "Fuera de horario de atención.";

                                            }else{
                                                if ($rr == "descanso"){
                                                  $color = "background-color: #2f4050;";
                                                  $disabled= "disabled";
                                                  $texto = "Hora de Descanso.";
                                                }else{
                                                    //hora tomada por 
                                                    $texto = "<br>" . $rr;
                                                }

                                            }

                                        }

                                    ?>
                                    <div class="timeline-item">
                                        <div class="row">
                                            <div class="col-4 date">
                                                <i class="fa fa-briefcase"></i>
                                                17:00 am
                                                <br/>
                                                <!--small class="text-navy">2 hour ago</small-->
                                            </div>
                                            <div class="col content no-top-border" style="<?php print $color;?>">

                                                <p class="m-b-xs"><strong>Agendamiento</strong></p>

                                                <p><?php print $texto; ?></p>

                                                <!--p><span data-diameter="40" class="updating-chart">5,3,9,6,5,9,7,3,5,2,5,3,9,6,5,9,4,7,3,2,9,8,7,4,5,1,2,9,5,4,7,2,7,7,3,5,2</span></p-->
                                            </div>
                                        </div>
                                    </div>


                                    <?php
                                        $color = "";
                                        $disabled = "";
                                        $rr = hora_disponible("18:00:00", "18:50:00",$hora_inicio, $hora_fin, $hora_descanso_inicio, $hora_descanso_fin, $horas_tomadas);
                                        $texto = "";

                                        if ($rr == "libre"){
                                            ;
                                        }else{
                                            if ($rr == "fuera"){
                                              $color = "background-color: #2f4050;";
                                              $disabled= "disabled";
                                              $texto = "Fuera de horario de atención.";

                                            }else{
                                                if ($rr == "descanso"){
                                                  $color = "background-color: #2f4050;";
                                                  $disabled= "disabled";
                                                  $texto = "Hora de Descanso.";
                                                }else{
                                                    //hora tomada por 
                                                    $texto = "<br>" . $rr;
                                                }

                                            }

                                        }

                                    ?>
                                    <div class="timeline-item">
                                        <div class="row">
                                            <div class="col-4 date">
                                                <i class="fa fa-briefcase"></i>
                                                18:00 am
                                                <br/>
                                                <!--small class="text-navy">2 hour ago</small-->
                                            </div>
                                            <div class="col content no-top-border" style="<?php print $color;?>">

                                                <p class="m-b-xs"><strong>Agendamiento</strong></p>

                                                <p><?php print $texto; ?></p>

                                                <!--p><span data-diameter="40" class="updating-chart">5,3,9,6,5,9,7,3,5,2,5,3,9,6,5,9,4,7,3,2,9,8,7,4,5,1,2,9,5,4,7,2,7,7,3,5,2</span></p-->
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                        $color = "";
                                        $disabled = "";
                                        $rr = hora_disponible("19:00:00", "19:50:00",$hora_inicio, $hora_fin, $hora_descanso_inicio, $hora_descanso_fin, $horas_tomadas);
                                        $texto = "";

                                        if ($rr == "libre"){
                                            ;
                                        }else{
                                            if ($rr == "fuera"){
                                              $color = "background-color: #2f4050;";
                                              $disabled= "disabled";
                                              $texto = "Fuera de horario de atención.";

                                            }else{
                                                if ($rr == "descanso"){
                                                  $color = "background-color: #2f4050;";
                                                  $disabled= "disabled";
                                                  $texto = "Hora de Descanso.";
                                                }else{
                                                    //hora tomada por 
                                                    $texto = "<br>" . $rr;
                                                }

                                            }

                                        }

                                    ?>
                                    <div class="timeline-item">
                                        <div class="row">
                                            <div class="col-4 date">
                                                <i class="fa fa-briefcase"></i>
                                                19:00 am
                                                <br/>
                                                <!--small class="text-navy">2 hour ago</small-->
                                            </div>
                                            <div class="col content no-top-border" style="<?php print $color;?>">

                                                <p class="m-b-xs"><strong>Agendamiento</strong></p>

                                                <p><?php print $texto; ?></p>

                                                <!--p><span data-diameter="40" class="updating-chart">5,3,9,6,5,9,7,3,5,2,5,3,9,6,5,9,4,7,3,2,9,8,7,4,5,1,2,9,5,4,7,2,7,7,3,5,2</span></p-->
                                            </div>
                                        </div>
                                    </div>























                            
                        </div>
                    </div>
                </div>








        </div>
        <div class="footer">
            <div class="float-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2018
            </div>
        </div>

        </div>
        </div>



    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>


    <link href="js/upload/css/uploadfile.css" rel="stylesheet">
    <script src="js/upload/js/jquery.uploadfile.min.js"></script>  


    <!-- SUMMERNOTE -->
    <script src="js/plugins/summernote/summernote-bs4.js"></script>


</body>


<script type="text/javascript">






        $(document).ready(function(){






        });








function perfil_save(){



        $.ajax ({
              url:        'php/ajax/horario_save.php',  
              type:         'post',    
              data: {
                'id' : $("#hdn_id_user").val(),
                'inicio_lunes': $("#inicio_lunes").val(),
                'inicio_martes': $("#inicio_martes").val(),
                'inicio_miercoles': $("#inicio_miercoles").val(),
                'inicio_jueves': $("#inicio_jueves").val(),
                'inicio_viernes': $("#inicio_viernes").val(),
                'inicio_sabado': $("#inicio_sabado").val(),
                'inicio_domingo': $("#inicio_domingo").val(),

                'final_lunes': $("#fin_lunes").val(),
                'final_martes': $("#fin_martes").val(),
                'final_miercoles': $("#fin_miercoles").val(),
                'final_jueves': $("#fin_jueves").val(),
                'final_viernes': $("#fin_viernes").val(),
                'final_sabado': $("#fin_sabado").val(),
                'final_domingo': $("#fin_domingo").val(),

                'descanso_inicio_lunes': $("#descanso_inicio_lunes").val(),
                'descanso_inicio_martes': $("#descanso_inicio_martes").val(),
                'descanso_inicio_miercoles': $("#descanso_inicio_miercoles").val(),
                'descanso_inicio_jueves': $("#descanso_inicio_jueves").val(),
                'descanso_inicio_viernes': $("#descanso_inicio_viernes").val(),
                'descanso_inicio_sabado': $("#descanso_inicio_sabado").val(),
                'descanso_inicio_domigo': $("#descanso_inicio_domigo").val(),

                'descanso_fin_lunes': $("#descanso_fin_lunes").val(),
                'descanso_fin_martes': $("#descanso_fin_martes").val(),
                'descanso_fin_miercoles': $("#descanso_fin_miercoles").val(),
                'descanso_fin_jueves': $("#descanso_fin_jueves").val(),
                'descanso_fin_viernes': $("#descanso_fin_viernes").val(),
                'descanso_fin_sabado': $("#descanso_fin_sabado").val(),
                'descanso_fin_domingo': $("#descanso_fin_domingo").val(),

            },
              success:  function(data)
              {
                var ret = data;

                if (data == "OK"){

                    alert("Información grabada con éxito");
                    
                    //toastr.success('OK', 'Información grabada con éxito');
                    setTimeout(function() {

                       location.reload();                  
                    }, 3300);
                    

                }
                else
                    //toastr.error('Error', 'Hubo un error al intentar grabar la información, favor inténtelo más tarde' + data);
                    alert("Hubo un error al intentar grabar la información, favor inténtelo más tarde." + data);
              },
              
              error:  function(request, settings)
              {
                alert("error");
                ret =  "error";
              }       
            });




        }
    



function anterior_dia(){

      dia_de_hoy = "<?php print $anterior_dia;  ?>"; // $_GET["dia"];
      siguiente_dia = ""; //$_GET["siguiente_dia"];
      anterior_dia = "" ;//$_GET["anterior_dia"];
      fecha = "<?php print $fecha_anterior ;  ?>";

      terapeuta = "<?php print $id_user  ;  ?>";

      window.location.href= "horas.php?dia=" + dia_de_hoy  + "&fecha=" + fecha + "&terapeuta=" + terapeuta;


}

function siguiente_dia(){

      dia_de_hoy = "<?php print $siguiente_dia;  ?>"; // $_GET["dia"];
      siguiente_dia = ""; //$_GET["siguiente_dia"];
      anterior_dia = "" ;//$_GET["anterior_dia"];
      fecha = "<?php print $fecha_siguiente ;  ?>";

      terapeuta = "<?php print $id_user  ;  ?>";

      window.location.href= "horas.php?dia=" + dia_de_hoy  + "&fecha=" + fecha + "&terapeuta=" + terapeuta;


}







</script>




</html>
