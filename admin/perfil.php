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

$data_ = get_user($id_user);
$listUsers = $data_["array"];

$user = $listUsers[0];

$nombre = $user["nombre"];
$fecha_nacimiento = $user["fecha_nacimiento"];
$email = $user["email"];
$login = $user["login"];

$fono = $user["fono"];


$foto = $user["foto"];
$resumen = $user["resumen"];

$link_pago = $user["link_pago"];

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

                <li class="active">
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

                <li>
                    <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Atención</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        
                        <li  class="active"><a href="horarios.php">Horarios</a></li>
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
                            <strong>Blog</strong>
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
                            <h5 id="h5_new">Datos:</h5>
                        </div>
                        <div class="ibox-content">
                            

                                <div class="form-group row"><label class="col-lg-2 col-form-label">Nombre</label>

                                    <input type="hidden" name="hdn_id_user" id="hdn_id_user" value="<?php print $id_user; ?>" >

                                    <div class="col-lg-10"><input type="text" placeholder="Nombre y Apellido" class="form-control" name="nombre" id="nombre" value='<?php print $nombre;?>'> <span class="form-text m-b-none">Escriba su nombre.</span>
                                    </div>
                                </div>

                                <!--div class="form-group row"><label class="col-lg-2 col-form-label">Rut</label>

                                    <div class="col-lg-10"><input type="text" placeholder="rut" class="form-control" name="rut" id="rut"></div>
                                </div-->
                                <div class="form-group row"><label class="col-lg-2 col-form-label">Teléfono</label>

                                    <div class="col-lg-10"><input type="text" placeholder="Teléfono" class="form-control" name="fono" id="fono" value='<?php print $fono;?>'></div>
                                </div>


                                <div class="form-group row"><label class="col-lg-2 col-form-label">Email</label>

                                    <div class="col-lg-10"><input type="email" placeholder="Email" class="form-control" name="email" id="email" value='<?php print $email;?>'> <span class="form-text m-b-none">Escriba su email.</span>
                                    </div>
                                </div>
                                <div class="form-group row"><label class="col-lg-2 col-form-label">Imagen</label>

                                    <input type="hidden" name="hdn_imagen" id="hdn_imagen" value="" >
                                    <div class="col-lg-10">
                                                    
                                        
                                        <form id="form_imagen">
                                            
                                            <div id='file_upload'   
                                                 name='file_upload'> Subir imagen</div>           
                                        </form>
                                    <div>
                                        <img  src="" id="cropbox1" class="img" style="width:400px;" /><br />
                                    </div>

                                    <button id="btn_quitar_imagen1" style="display:none;" class="btn btn-sm btn-primary m-t-n-xs" style="margin-left:100px;" onclick="javascript:quitar_imagen(1);"><strong>Quitar imagen</strong></button>


                                    </div>


                                </div>

                                <div class="form-group row" id="div_especialidades">


                                </div>



                                <div class="form-group row"><label class="col-lg-2 col-form-label">Password</label>

                                    <div class="col-lg-10"><input type="password" placeholder="Password" class="form-control" name="password" id="password"></div>
                                </div>

                                <div class="form-group row"><label class="col-lg-2 col-form-label">Repita Password</label>

                                    <div class="col-lg-10"><input type="password" placeholder="Password" class="form-control" name="password2" id="password2"></div>
                                </div>





                                <div class="form-group row"><label class="col-lg-2 col-form-label">Resumen</label>

                                        <textarea id="resumen" name="resumen"  class="form-control border-left m-t summernote" style="height: 200px"><?php print $resumen;?></textarea>

                                        
                                    <!--/div-->
                                </div>


                                <div class="form-group row"><label class="col-lg-4 col-form-label">Link de Pago</label>

                                        <textarea id="link_pago" name="link_pago"  class="form-control border-left m-t" style="height: 200px"><?php print $link_pago;?></textarea>

                                        
                                    <!--/div-->
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

            $('.summernote').summernote();


            $("#btn_quitar_imagen1").hide();

            
            $("#cropbox1").hide();

<?php



if ($foto!=""){

    print "$('#hdn_imagen').val('".trim($foto)."');";

    print "$('#cropbox1').attr('src','../uploads/fotos/".trim($foto)."');";

    print "$('#cropbox1').show();";

    print "$('#btn_quitar_imagen1').show();";

}

?>


            



              $('#file_upload').uploadFile({

                  url: 'php/ajax/upload_imagen_usuario.php',

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
                                $("#hdn_imagen").val(data);

                                $("#cropbox1").attr("src","../uploads/fotos/" + data);

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








        });








function perfil_save(){


        var total = "";
          
          $("input:checkbox:checked").each(function() {
            if (total!="")
              total +=  ",";
            total += $(this).val();
          });


        if ($("#password").val() != $("#password2").val()){
            alert("Las claves ingresadas no coinciden, por favor ingréselas nuevamente.");
            return;

        }


        $.ajax ({
              url:        'php/ajax/perfil_save.php',  
              type:         'post',    
              data: {
                'id' : $("#hdn_id_user").val(),
                'nombre': $("#nombre").val(),
                'email': $("#email").val(),
                'texto': $("#resumen").val(),
                'foto': $("#hdn_imagen").val(),
                'clave': $("#password").val(),
                'fono': $("#fono").val(),
                      
                'especialidades' : total,
                'link_pago' : $("#link_pago").val()



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
                    alert("Hubo un error al intentar grabar la información, favor inténtelo más tarde.");
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
