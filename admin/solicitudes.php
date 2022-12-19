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

include "php/model/charlas.php";

$data_ = get_solicitudes("",$id_user);
$listUsers = $data_["array"];

$data_ = get_charlas_aprobadas("",$id_user);
$listCharlas = $data_["array"];

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Charlas</title>

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

                <li class="active">
                    <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Web</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        
                        <li><a href="perfil.php">Perfil</a></li>
                        <li><a href="blog.php">Blog</a></li>
                        <li><a href="charlas.php">Charlas</a></li>
                        <li  class="active"><a href="solicitudes.php">Solicitudes</a></li>
                        <!--li><a href="usuarios_aceptados.php">Aceptados</a></li-->
                        <!--li class="active"><a href="banner_izquierdo.html">Banner Derecho</a></li-->
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Atención</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        
                        <li  class="active"><a href="horarios.php">Horarios</a></li>
                        <li  ><a href="horas.php">Horas</a></li>
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
                            <a>Web</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Charlas</strong>
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
                        <h5>Charlas</h5>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        
                        <th>Título</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Autor</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>


                                    <?php foreach ($listUsers as $user){ 

                                        $id = $user["id"];
                                        $name = $user["titulo"];
                                        $fecha = $user["fecha"];
                                        $hora = $user["hora"];
                                        $autor = $user["nombre"];

                                        $array_fecha = explode("-", $fecha);
                                        $fecha = $array_fecha[2] . "-" . $array_fecha[1] . "-" . $array_fecha[0];  

                                        //$email = $user["email"];
                                        //$login = $user["login"];
                                        //$rut = $user["rut"];

                                        //$curriculum = $user["curriculum"];
                                        //$foto = $user["foto"];

                                        //$link_foto = "../uploads/fotos/". $foto;
                                        //$link_curriculum = "../uploads/curis/".$curriculum;

                                        //$link_accept = "javascript:user_accept($id);";
                                        $link_delete = "javascript:user_accept($id);";
                                        $link_edit = "javascript:user_deny( $id);";
                                        ?>
                                        <tr>
                                            <td><?php print $name; ?> </td>
                                            <td><?php print $fecha; ?> </td>
                                            <td><?php print $hora; ?> </td>
                                            
                                            <td><?php print $autor; ?> </td>
                                            
                                            <td>
                                                                                                
                                                <a href="<?php print $link_delete; ?>" text="Borrar artículo" alt="Borrar Artículo"><i class="fa fa-check text-navy"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <a href="<?php print $link_edit; ?>" alt="Editar artículo" text="Editar Artículo" ><i class="fa fa-close text-navy" ></i></a>
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













            <div class="row">



                <div class="col-lg-7">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Charlas Aprobadas</h5>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        
                        <th>Título</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Autor</th>
                        
                    </tr>
                    </thead>
                    <tbody>


                                    <?php foreach ($listCharlas as $user){ 

                                        $id = $user["id"];
                                        $name = $user["titulo"];
                                        $fecha = $user["fecha"];
                                        $hora = $user["hora"];
                                        $autor = $user["nombre"];

                                        $array_fecha = explode("-", $fecha);
                                        $fecha = $array_fecha[2] . "-" . $array_fecha[1] . "-" . $array_fecha[0];  

                                        //$email = $user["email"];
                                        //$login = $user["login"];
                                        //$rut = $user["rut"];

                                        //$curriculum = $user["curriculum"];
                                        //$foto = $user["foto"];

                                        //$link_foto = "../uploads/fotos/". $foto;
                                        //$link_curriculum = "../uploads/curis/".$curriculum;

                                        //$link_accept = "javascript:user_accept($id);";
                                        $link_delete = "javascript:user_accept($id);";
                                        $link_edit = "javascript:user_deny( $id);";
                                        ?>
                                        <tr>
                                            <td><?php print $name; ?> </td>
                                            <td><?php print $fecha; ?> </td>
                                            <td><?php print $hora; ?> </td>
                                            
                                            <td><?php print $autor; ?> </td>
                                            
                        
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

    <link href="js/upload/css/uploadfile.css" rel="stylesheet">
    <script src="js/upload/js/jquery.uploadfile.min.js"></script>  


    <!-- SUMMERNOTE -->
    <script src="js/plugins/summernote/summernote-bs4.js"></script>


</body>


<script type="text/javascript">






        $(document).ready(function(){


            
            $("#btn_quitar_imagen1").hide();
            $("#cropbox1").hide();
            $('.summernote').summernote();

              $('#file_upload1').uploadFile({

                  url: 'php/ajax/upload_imagen.php',

                 formData     : {
                        tipo : 'archivo',
                        ruta : 'uploads/img/'
                  },
                  fileName:'Filedata',
                  showProgress:true,
                  uploadStr:'Subir Archivo',
                  dragdropWidth:'300px',
                  showPreview:true,
                  dragDropStr:'Arrastre su archivo aquí',
                  maxFileSize:60000000,

                  onSuccess:function(files,data,xhr,pd)
                  {

                    var archivo = data;
                    //alert (   "<br/>Success for: "+JSON.stringify(data) + "**" + JSON.stringify(xhr));
                              //if (data == "OK"){
                                  //alert("Archivo cargado con éxito.");
                                $("#hdn_imagen1").val(data);

                                $("#cropbox1").attr("src","../uploads/fotos/blog/" + data);

                                $("#cropbox1").show();
                                $(".ajax-file-upload-preview").hide();
                                $("#btn_quitar_imagen1").show();

                                //alert("Archivo cargado con éxito, se reiniciará la página");
                                //location.reload();

                                  //alert(data);
                                  //location.href = "index_open.php";
                              //}
                              //else
                              //    alert("Hubo un error al intentar grabar la información, favor inténtelo más tarde.");
                  }
              });



              $.ajax ({
                    url:        'php/ajax/cargar_especialidades_user.php',  // URL a invocar asíncronamente 
                    type:         'post' ,   // Método utilizado para el requerimiento 
                    data: {'id' : $("#hdn_id_user").val()} ,       
                    // Información local a enviarse con el requerimiento 
                    // Que hacer en caso de ser exitoso el requerimiento 
                    success:  function(data)
                    {
                      
                      console.log(data);
                      $("#div_especialidades").html(data);
                      



                    },
                    // Que hacer en caso de que sea fallido el requerimiento 
                    error:  function(request, settings)
                    {
                      alert("error");
                      ret =  "error";
                    }       
                  });



              $.ajax ({
                    url:        'php/ajax/cargar_usuarios.php',  // URL a invocar asíncronamente 
                    type:         'post' ,   // Método utilizado para el requerimiento 
                    data: {'id' : $("#hdn_id_user").val()} ,       
                    // Información local a enviarse con el requerimiento 
                    // Que hacer en caso de ser exitoso el requerimiento 
                    success:  function(data)
                    {
                      
                      console.log(data);
                      $("#colaboradores").html(data);
                      



                    },
                    // Que hacer en caso de que sea fallido el requerimiento 
                    error:  function(request, settings)
                    {
                      alert("error");
                      ret =  "error";
                    }       
                  });

/*
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                "bSort": false,
                language: {
                    search: "Buscar:",
                    paginate: {
                        first:      "Primero",
                        previous:   "Anterior",
                        next:       "Siguiente",
                        last:       "Último"
                    },
                    "info":           " _START_ al _END_ de _TOTAL_ registros.",
                    "lengthMenu":     "Ver _MENU_ registros."
                },
                
                buttons: [
                    { extend: 'Copiar'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'noticias'},
                    {extend: 'pdf', title: 'noticicas'},

                    {extend: 'Imprimir',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });
*/

        });





        function user_accept(id_charla){


        if (confirm('¿Seguro desea aceptar su participación en esta charla?')){
            $.ajax ({
                  url:        'php/ajax/charla_accept.php',  // URL a invocar asíncronamente 
                  type:         'post' ,   // Método utilizado para el requerimiento 
                              
                  data:   {
                    'id': id_charla
                 
                  },
                  // Información local a enviarse con el requerimiento 
                  // Que hacer en caso de ser exitoso el requerimiento 
                  success:  function(data)
                  {
                    

                    if (data == "OK"){
                        alert("La charla fue aceptada con éxito.");
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





        function user_deny(id_charla){


        if (confirm('¿Seguro desea denegar su participación en esta charla?')){
            $.ajax ({
                  url:        'php/ajax/charla_deny.php',  // URL a invocar asíncronamente 
                  type:         'post' ,   // Método utilizado para el requerimiento 
                              
                  data:   {
                    'id': id_charla
                 
                  },
                  // Información local a enviarse con el requerimiento 
                  // Que hacer en caso de ser exitoso el requerimiento 
                  success:  function(data)
                  {
                    

                    if (data == "OK"){
                        alert("La charla fue denegada con éxito.");
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
