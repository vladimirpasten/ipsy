<?php session_start();

$logged = 0;
$name_user_logged = "";
$id_user = "";
$area = "";
$admin = "";

if (isset($_SESSION['usuario'])){

    //if ($_SESSION['admin']=="1") {
        $name_user_logged = $_SESSION['usuario'];
        $id_user = $_SESSION['id'];
        $logged = 1;
        $area = $_SESSION['mail'];
        $admin = $_SESSION['admin'];
    //}
}

if ($logged == 0){
    ;//header('Location: login.html');
}

$section = "users";
$list = array();

include "php/model/users.php";

$data_ = get_pacientes_terapeuta($id_user);
$listUsers = $data_["array"];



?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Pacientes</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

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
                <?php if ($admin=="1"){

                ?>    

                <li>
                    <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Usuarios</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        
                        <li><a href="usuarios_pendientes.php">Pendientes</a></li>
                        <li><a href="usuarios_aceptados.php">Aceptados</a></li>
                        <li class="active"><a href="pacientes.php">Pacientes</a></li>

                        <!--li class="active"><a href="banner_izquierdo.html">Banner Derecho</a></li-->
                    </ul>
                </li>

            <?php } ?>
                <li>
                    <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Web</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        
                        <li><a href="perfil.php">Perfil</a></li>
                        <li><a href="blog.php">Blog</a></li>
                        <li><a href="charlas.php">Charlas</a></li>
                        <li><a href="solicitudes.php">Solicitudes</a></li>
                        <!--li><a href="usuarios_aceptados.php">Aceptados</a></li-->
                        <!--li class="active"><a href="banner_izquierdo.html">Banner Derecho</a></li-->
                    </ul>
                </li>


                <li   class="active">
                    <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Atención</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        
                        <li><a href="horarios.php">Horarios</a></li>
                        <li><a href="horas.php">Horas</a></li>
                        <li   class="active"><a href="fichas.php">Fichas</a></li>
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
                            <a>Usuarios</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Pacientes</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>












        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">



                <div class="col-lg-7">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Contactos</h5>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nombre</th>
                        <th>Rut</th>
                        <th>Email</th>
                        

                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>


                                    <?php foreach ($listUsers as $user){ 

                                        $id = $user["id"];
                                        $name = $user["nombre"];
                                        $fecha_nacimiento = $user["fecha_nacimiento"];
                                        $email = $user["email"];
                                        $login = $user["login"];
                                        $rut = $user["rut"];

                                        $curriculum = $user["curriculum"];
                                        $foto = $user["foto"];

                                        $link_foto = "../uploads/fotos/". $foto;

                                        $params = "?id_paciente=" . $id . "&nombre_paciente=" . $name;

                                        ?>
                                        <tr>
                                            <td><img src='<?php print $link_foto;?>' alt='' style='max-width: 68px;max-height: 160px;'/>   </td>
                                            <td><?php print $name; ?> </td>
                                            <td><?php print $rut; ?> </td>
                                            <td><?php print $email; ?> </td>
                                            
                                            <td>
                                                <a href="ver_ficha_2.php<?php print $params ?>" alt="Ver Ficha" text="Ver Ficha"><i class="fa fa-eye text-navy"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;                                                
                                            </td>

                                        </tr>
                                    <?php } ?>




                    </tbody>
                    <!--tfoot>
                    <tr>
                        <th>Foto</th>
                        <th>Nombre</th>
                        <th>Rut</th>
                        <th>Email</th>
                        <th>Curriculum</th>

                        <th>Acciones</th>
                    </tr>
                    </tfoot-->
                    </table>
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

    <!-- Flot -->
    <script src="js/plugins/flot/jquery.flot.js"></script>
    <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="js/plugins/flot/jquery.flot.time.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- Flot demo data -->
    <script src="js/demo/flot-demo.js"></script>

</body>


<script type="text/javascript">

        function user_accept(id){


        if (confirm('¿Seguro desea aceptar a este usuario?')){
            $.ajax ({
                  url:        'php/ajax/user_accept.php',  // URL a invocar asíncronamente 
                  type:         'post' ,   // Método utilizado para el requerimiento 
                              
                  data:   {
                    'id': id
                 
                  },
                  // Información local a enviarse con el requerimiento 
                  // Que hacer en caso de ser exitoso el requerimiento 
                  success:  function(data)
                  {
                    

                    if (data == "OK"){
                        alert("El usuario fue aceptado con éxito.");

                        //toastr.success('OK', 'Información grabada con éxito');    
                        setTimeout(function() {

                           location.reload();                  
                        }, 1300);

                    }
                    else{
                        alert("Error:" + data);
                        /*
                            toastr.options = {
                                closeButton: true,
                                progressBar: true,
                                showMethod: 'slideDown',
                                timeOut: 4000
                            };
                            toastr.error('Error', 'Hubo un error al intentar eliminar la información, favor inténtelo más tarde' + data);
                        */
                        


                    }
                    
                  },
                  // Que hacer en caso de que sea fallido el requerimiento 
                  error:  function(request, settings)
                  {
                    alert("error");
                    ret =  "error";
                  }       
                });
        }



        }



        function user_delete(id){


        if (confirm('¿Seguro desea borrar este usuario?')){
            $.ajax ({
                  url:        'php/ajax/user_delete.php',  // URL a invocar asíncronamente 
                  type:         'post' ,   // Método utilizado para el requerimiento 
                              
                  data:   {
                    'id': id
                 
                  },
                  // Información local a enviarse con el requerimiento 
                  // Que hacer en caso de ser exitoso el requerimiento 
                  success:  function(data)
                  {
                    

                    if (data == "OK"){
                        alert("El usuario fue borrado con éxito.");
                        //toastr.success('OK', 'Información grabada con éxito');    
                        setTimeout(function() {

                           location.reload();                  
                        }, 1300);

                    }
                    else{

                            alert("Error:" + data);

                            /*toastr.options = {
                                closeButton: true,
                                progressBar: true,
                                showMethod: 'slideDown',
                                timeOut: 4000
                            };
                            */
                            //toastr.error('Error', 'Hubo un error al intentar eliminar la información, favor inténtelo más tarde' + data);

                        


                    }
                    
                  },
                  // Que hacer en caso de que sea fallido el requerimiento 
                  error:  function(request, settings)
                  {
                    alert("error");
                    ret =  "error";
                  }       
                });
        }



        }
    


</script>




</html>
