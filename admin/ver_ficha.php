<?php session_start();
error_reporting(E_ALL);

ini_set('display_errors', '1');


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

  $fecha = "";
  $id_paciente = "";
  $hora_inicio = "";
  $hora_fin = "";

if (isset($_GET["fecha"])) {
  
  $fecha = $_GET["fecha"];
  $id_paciente = $_GET["id_paciente"];
  $nombre_paciente = $_GET["nombre_paciente"];
  $hora_inicio = $_GET["hora_inicio"];
  $hora_fin = $_GET["hora_fin"];



}else{
    header('Location: login.html');   
}

include "php/model/users.php";

//$array_fecha = explode("-", $fecha);
$fecha2 = $fecha; //$array_fecha[2] . "-" . $array_fecha[1] . "-" . $array_fecha[0];

$data_ = get_ficha($id_user, $id_paciente,  $fecha2);
$fichas = $data_["array"];

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ficha</title>

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
                        <li><a href="horas.php">Horas</a></li>

                        <li  class="active"><a href="fichas.php">Fichas</a></li>
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



                            

                        <div class="col-lg-4">

                            <div class="ibox ">
                                <div class="ibox-title">
                                    <h5>Registro de la Sesión - <?php print $nombre_paciente; ?></h5>
                                </div>


                                <div class="ibox-content">

                                    <!--                                                            
                                    - Terminar lo de las fichas
                                    - Corregir la vista de los botones día anterior y día siguiente
                                    - Colores en las horas de atención - agenda
                                    -->

                                    <input type="hidden" id="hdn_fecha" name="hdn_fecha" value="<?php print $fecha; ?>"/>
                                    <input type="hidden" id="hdn_id_paciente" name="hdn_id_paciente" value="<?php print $id_paciente; ?>"/>
                                    <input type="hidden" id="hdn_hora_inicio" name="hdn_hora_inicio" value="<?php print $hora_inicio; ?>"/>
                                    <input type="hidden" id="hdn_hora_fin" name="hdn_hora_fin" value="<?php print $hora_fin; ?>"/>
                                    <input type="hidden" id="hdn_id_terapeuta" name="hdn_id_terapeuta" value="<?php print $id_user; ?>"/>


                                    <div class="form-group row">
                                        <div class="col-lg-offset-2 col-lg-10">



                                        <textarea id="ficha_paciente" name="ficha_paciente" cols="30"  rows="30" >




                                        </textarea>

                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <div class="col-lg-offset-2 col-lg-10">

                                                <button class="btn btn-sm btn-primary float-right m-t-n-xs" onclick="javascript:ficha_save();"><strong>Guardar</strong></button>

                                        </div>
                                    </div>



                                </div>



                            </div>


                            
                        </div>



                        <div class="col-lg-4">

                            <div class="ibox ">
                                <div class="ibox-title">
                                    <h5>Ficha paciente - <?php print $nombre_paciente; ?></h5>
                                </div>

                                <!--div class="ibox-content ibox-heading">
                                    <h3>You have meeting today!</h3>
                                    <small><i class="fa fa-map-marker"></i> Meeting is on 6:00am. Check your schedule to see detail.</small>
                                </div-->


                                <div class="ibox-content">

                                    <textarea id="ficha_historica" name="ficha_historica" cols="30"  rows="30" disabled="disabled" >
                                        <?php 

                                            foreach ($fichas as $ficha) {
                                                // code...
                                                print $ficha["fecha"] . "\n" . $ficha["texto"];
                                            }

                                        ?>


                                    </textarea>

                                    <!--                      
                                    - Terminar lo de las fichas
                                    - Corregir la vista de los botones día anterior y día siguiente
                                    - Colores en las horas de atención - agenda
                                    -->
        

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








function ficha_save(){


        $.ajax ({
              url:        'php/ajax/ficha_save.php',  
              type:         'post',    
              data: {
                'fecha' : $("#hdn_fecha").val(),
                'id_terapeuta' : $("#hdn_id_terapeuta").val(),
                'id_paciente' : $("#hdn_id_paciente").val(),
                'hora_inicio' : $("#hdn_hora_inicio").val(),
                'hora_fin' : $("#hdn_hora_fin").val(),
                'texto' : $("#ficha_paciente").val(),

                
                

            },
              success:  function(data)
              {
                var ret = data;

                if (data == "OK"){

                    alert("Información grabada con éxito");

                    get_ficha();                    
                    //toastr.success('OK', 'Información grabada con éxito');
                    /*
                    setTimeout(function() {

                       location.reload();                  
                    }, 3300);
                    */

                }
                else
                    //toastr.error('Error', 'Hubo un error al intentar grabar la información, favor inténtelo más tarde' + data);
                    alert("Hubo un error al intentar grabar la información, favor inténtelo más tarde." + data);

                    console.log(data);
              },
              
              error:  function(request, settings)
              {
                alert("error");
                ret =  "error";
              }       
            });




        }
    


function get_ficha(){


        $.ajax ({
              url:        'php/ajax/ficha_get.php',  
              type:         'post',    
              data: {
                'id_terapeuta' : $("#hdn_id_terapeuta").val(),
                'id_paciente' : $("#hdn_id_paciente").val()

            },
              success:  function(data)
              {
                var ret = data;


                $("#ficha_historica").text(data);
                $("#ficha_historica").val(data);
              },
              
              error:  function(request, settings)
              {
                alert("error");
                ret =  "error";
              }       
            });




        }






</script>




</html>
