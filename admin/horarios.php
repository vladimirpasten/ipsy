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
    header('Location: login.html');
}

$section = "users";
$list = array();

include "php/model/users.php";

$data_ = get_horario($id_user);
$listUsers = $data_["array"];
if (isset($listUsers[0])){
    $user = $listUsers[0];

    $lunes = $user["lunes"];
    $martes = $user["martes"];
    $miercoles = $user["miercoles"];
    $jueves = $user["jueves"];
    $viernes = $user["viernes"];
    $sabado = $user["sabado"];
    $domingo = $user["domingo"];

    $inicio_lunes = $user["inicio_lunes"];
    $inicio_martes = $user["inicio_martes"];
    $inicio_miercoles = $user["inicio_miercoles"];
    $inicio_jueves = $user["inicio_jueves"];
    $inicio_viernes = $user["inicio_viernes"];
    $inicio_sabado = $user["inicio_sabado"];
    $inicio_domingo = $user["inicio_domingo"];

    $final_lunes = $user["final_lunes"];
    $final_martes = $user["final_martes"];
    $final_miercoles = $user["final_miercoles"];
    $final_jueves = $user["final_jueves"];
    $final_viernes = $user["final_viernes"];
    $final_sabado = $user["final_sabado"];
    $final_domingo = $user["final_domingo"];

    $descanso_inicio_lunes = $user["descanso_inicio_lunes"];
    $descanso_inicio_martes = $user["descanso_inicio_martes"];
    $descanso_inicio_miercoles = $user["descanso_inicio_miercoles"];
    $descanso_inicio_jueves = $user["descanso_inicio_jueves"];
    $descanso_inicio_viernes = $user["descanso_inicio_viernes"];
    $descanso_inicio_sabado = $user["descanso_inicio_sabado"];
    $descanso_inicio_domigo = $user["descanso_inicio_domigo"];

    $descanso_fin_lunes = $user["descanso_fin_lunes"];
    $descanso_fin_martes = $user["descanso_fin_martes"];
    $descanso_fin_miercoles = $user["descanso_fin_miercoles"];
    $descanso_fin_jueves = $user["descanso_fin_jueves"];
    $descanso_fin_viernes = $user["descanso_fin_viernes"];
    $descanso_fin_sabado = $user["descanso_fin_sabado"];
    $descanso_fin_domingo = $user["descanso_fin_domingo"];
}else{


        $lunes = "";
        $martes = "";
        $miercoles = "";
        $jueves = "";
        $viernes = "";
        $sabado = "";
        $domingo = "";

        $inicio_lunes = "";
        $inicio_martes = "";
        $inicio_miercoles = "";
        $inicio_jueves = "";
        $inicio_viernes = "";
        $inicio_sabado = "";
        $inicio_domingo = "";

        $final_lunes = "";
        $final_martes = "";
        $final_miercoles = "";
        $final_jueves = "";
        $final_viernes = "";
        $final_sabado = "";
        $final_domingo = "";

        $descanso_inicio_lunes = "";
        $descanso_inicio_martes = "";
        $descanso_inicio_miercoles = "";
        $descanso_inicio_jueves = "";
        $descanso_inicio_viernes = "";
        $descanso_inicio_sabado = "";
        $descanso_inicio_domigo = "";

        $descanso_fin_lunes = "";
        $descanso_fin_martes = "";
        $descanso_fin_miercoles = "";
        $descanso_fin_jueves = "";
        $descanso_fin_viernes = "";
        $descanso_fin_sabado = "";
        $descanso_fin_domingo = "";



}



?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Perfil</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

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
                        
                        <li  class="active"><a href="horarios.php">Horarios</a></li>
                        <li><a href="horas.php">Horas</a></li>
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
            <form role="search" class="navbar-form-custom" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
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
                            <a>Horario</a>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>












        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">


                <div class="col-lg-5">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5 id="h5_new">Horario:</h5>
                        </div>
                        <div class="ibox-content">
                            
                                    <input type="hidden" name="hdn_id_user" id="hdn_id_user" value="<?php print $id_user; ?>" >


                                <div class="form-group row">

                                    <label class="col-lg-2 col-form-label">Lunes</label>

                                    <div class="col-lg-5">
                                        <input type="time" placeholder="Inicio" class="form-control" name="inicio_lunes" id="inicio_lunes" value='<?php print $inicio_lunes;?>'> 
                                        <span class="form-text m-b-none">Inicio</span>
                                    </div>
                                    <div class="col-lg-5">
                                        <input type="time" placeholder="Fin" class="form-control" name="fin_lunes" id="fin_lunes" value='<?php print $final_lunes;?>'> 
                                        <span class="form-text m-b-none">Fin</span>
                                    </div>

                                </div>

                                <div class="form-group row">

                                    <label class="col-lg-2 col-form-label">Martes</label>

                                    <div class="col-lg-5">
                                        <input type="time" placeholder="Inicio" class="form-control" name="inicio_martes" id="inicio_martes" value='<?php print $inicio_martes;?>'> 
                                        <span class="form-text m-b-none">Inicio</span>
                                    </div>
                                    <div class="col-lg-5">
                                        <input type="time" placeholder="Fin" class="form-control" name="fin_martes" id="fin_martes" value='<?php print $final_martes;?>'> 
                                        <span class="form-text m-b-none">Fin</span>
                                    </div>

                                </div>
                                <div class="form-group row">

                                    <label class="col-lg-2 col-form-label">Miércoles</label>

                                    <div class="col-lg-5">
                                        <input type="time" placeholder="Inicio" class="form-control" name="inicio_lunes" id="inicio_miercoles" value='<?php print $inicio_miercoles;?>'> 
                                        <span class="form-text m-b-none">Inicio</span>
                                    </div>
                                    <div class="col-lg-5">
                                        <input type="time" placeholder="Fin" class="form-control" name="fin_miercoles" id="fin_miercoles" value='<?php print $final_miercoles;?>'> 
                                        <span class="form-text m-b-none">Fin</span>
                                    </div>

                                </div>
                                <div class="form-group row">

                                    <label class="col-lg-2 col-form-label">Jueves</label>

                                    <div class="col-lg-5">
                                        <input type="time" placeholder="Inicio" class="form-control" name="inicio_jueves" id="inicio_jueves" value='<?php print $inicio_jueves;?>'> 
                                        <span class="form-text m-b-none">Inicio</span>
                                    </div>
                                    <div class="col-lg-5">
                                        <input type="time" placeholder="Fin" class="form-control" name="fin_jueves" id="fin_jueves" value='<?php print $final_jueves;?>'> 
                                        <span class="form-text m-b-none">Fin</span>
                                    </div>

                                </div>
                                <div class="form-group row">

                                    <label class="col-lg-2 col-form-label">Viernes</label>

                                    <div class="col-lg-5">
                                        <input type="time" placeholder="Inicio" class="form-control" name="inicio_viernes" id="inicio_viernes" value='<?php print $inicio_viernes;?>'> 
                                        <span class="form-text m-b-none">Inicio</span>
                                    </div>
                                    <div class="col-lg-5">
                                        <input type="time" placeholder="Fin" class="form-control" name="fin_viernes" id="fin_viernes" value='<?php print $final_viernes;?>'> 
                                        <span class="form-text m-b-none">Fin</span>
                                    </div>

                                </div>
                                <div class="form-group row">

                                    <label class="col-lg-2 col-form-label">Sábado</label>

                                    <div class="col-lg-5">
                                        <input type="time" placeholder="Inicio" class="form-control" name="inicio_sabado" id="inicio_sabado" value='<?php print $inicio_sabado;?>'> 
                                        <span class="form-text m-b-none">Inicio</span>
                                    </div>
                                    <div class="col-lg-5">
                                        <input type="time" placeholder="Fin" class="form-control" name="fin_sabado" id="fin_sabado" value='<?php print $final_sabado;?>'> 
                                        <span class="form-text m-b-none">Fin</span>
                                    </div>

                                </div>
                                <div class="form-group row">

                                    <label class="col-lg-2 col-form-label">Domingo</label>

                                    <div class="col-lg-5">
                                        <input type="time" placeholder="Inicio" class="form-control" name="fin_domingo" id="inicio_domingo" value='<?php print $fin_domingo;?>'> 
                                        <span class="form-text m-b-none">Inicio</span>
                                    </div>
                                    <div class="col-lg-5">
                                        <input type="time" placeholder="Fin" class="form-control" name="fin_lunes" id="fin_domingo" value='<?php print $final_domingo;?>'> 
                                        <span class="form-text m-b-none">Fin</span>
                                    </div>

                                </div>






                                <div class="form-group row">

                                    <h5 id="h5_new">Descansos</h5>

                                </div>









                                <div class="form-group row">

                                    <label class="col-lg-2 col-form-label">Lunes</label>

                                    <div class="col-lg-5">
                                        <input type="time" placeholder="Inicio" class="form-control" name="descanso_inicio_lunes" id="descanso_inicio_lunes" value='<?php print $descanso_inicio_lunes;?>'> 
                                        <span class="form-text m-b-none">Inicio</span>
                                    </div>
                                    <div class="col-lg-5">
                                        <input type="time" placeholder="Fin" class="form-control" name="descanso_fin_lunes" id="descanso_fin_lunes" value='<?php print $descanso_final_lunes;?>'> 
                                        <span class="form-text m-b-none">Fin</span>
                                    </div>

                                </div>

                                <div class="form-group row">

                                    <label class="col-lg-2 col-form-label">Martes</label>

                                    <div class="col-lg-5">
                                        <input type="time" placeholder="Inicio" class="form-control" name="descanso_inicio_martes" id="descanso_inicio_martes" value='<?php print $descanso_inicio_martes;?>'> 
                                        <span class="form-text m-b-none">Inicio</span>
                                    </div>
                                    <div class="col-lg-5">
                                        <input type="time" placeholder="Fin" class="form-control" name="descanso_fin_martes" id="descanso_fin_martes" value='<?php print $descanso_fin_martes;?>'> 
                                        <span class="form-text m-b-none">Fin</span>
                                    </div>

                                </div>
                                <div class="form-group row">

                                    <label class="col-lg-2 col-form-label">Miércoles</label>

                                    <div class="col-lg-5">
                                        <input type="time" placeholder="Inicio" class="form-control" name="descanso_inicio_lunes" id="descanso_inicio_miercoles" value='<?php print $descanso_inicio_miercoles;?>'> 
                                        <span class="form-text m-b-none">Inicio</span>
                                    </div>
                                    <div class="col-lg-5">
                                        <input type="time" placeholder="Fin" class="form-control" name="descanso_fin_miercoles" id="descanso_fin_miercoles" value='<?php print $descanso_fin_miercoles;?>'> 
                                        <span class="form-text m-b-none">Fin</span>
                                    </div>

                                </div>
                                <div class="form-group row">

                                    <label class="col-lg-2 col-form-label">Jueves</label>

                                    <div class="col-lg-5">
                                        <input type="time" placeholder="Inicio" class="form-control" name="descanso_inicio_jueves" id="descanso_inicio_jueves" value='<?php print $descanso_inicio_jueves;?>'> 
                                        <span class="form-text m-b-none">Inicio</span>
                                    </div>
                                    <div class="col-lg-5">
                                        <input type="time" placeholder="Fin" class="form-control" name="descanso_fin_jueves" id="descanso_fin_jueves" value='<?php print $descanso_fin_jueves;?>'> 
                                        <span class="form-text m-b-none">Fin</span>
                                    </div>

                                </div>
                                <div class="form-group row">

                                    <label class="col-lg-2 col-form-label">Viernes</label>

                                    <div class="col-lg-5">
                                        <input type="time" placeholder="Inicio" class="form-control" name="descanso_inicio_viernes" id="descanso_inicio_viernes" value='<?php print $descanso_inicio_viernes;?>'> 
                                        <span class="form-text m-b-none">Inicio</span>
                                    </div>
                                    <div class="col-lg-5">
                                        <input type="time" placeholder="Fin" class="form-control" name="descanso_fin_viernes" id="descanso_fin_viernes" value='<?php print $descanso_fin_viernes;?>'> 
                                        <span class="form-text m-b-none">Fin</span>
                                    </div>

                                </div>
                                <div class="form-group row">

                                    <label class="col-lg-2 col-form-label">Sábado</label>

                                    <div class="col-lg-5">
                                        <input type="time" placeholder="Inicio" class="form-control" name="descanso_inicio_sabado" id="descanso_inicio_sabado" value='<?php print $descanso_inicio_sabado;?>'> 
                                        <span class="form-text m-b-none">Inicio</span>
                                    </div>
                                    <div class="col-lg-5">
                                        <input type="time" placeholder="Fin" class="form-control" name="descanso_fin_sabado" id="descanso_fin_sabado" value='<?php print $descanso_fin_sabado;?>'> 
                                        <span class="form-text m-b-none">Fin</span>
                                    </div>

                                </div>
                                <div class="form-group row">

                                    <label class="col-lg-2 col-form-label">Domingo</label>

                                    <div class="col-lg-5">
                                        <input type="time" placeholder="Inicio" class="form-control" name="descanso_inicio_domigo" id="descanso_inicio_domigo" value='<?php print $descanso_inicio_domigo;?>'> 
                                        <span class="form-text m-b-none">Inicio</span>
                                    </div>
                                    <div class="col-lg-5">
                                        <input type="time" placeholder="Fin" class="form-control" name="descanso_fin_domingo" id="descanso_fin_domingo" value='<?php print $descanso_fin_domingo;?>'> 
                                        <span class="form-text m-b-none">Fin</span>
                                    </div>

                                </div>









                                <div class="form-group row">
                                    <div class="col-lg-offset-2 col-lg-10">

                                            <button class="btn btn-sm btn-primary float-right m-t-n-xs" onclick="javascript:perfil_save();"><strong>Guardar</strong></button>

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
                    console.log(data);
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
