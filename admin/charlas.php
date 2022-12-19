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

$data_ = get_charlas("",$id_user);
$listUsers = $data_["array"];



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
                        <li class="active"><a href="charlas.php">Charlas</a></li>
                        <li><a href="solicitudes.php">Solicitudes</a></li>
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
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>


                                    <?php foreach ($listUsers as $user){ 

                                        $id = $user["id"];
                                        $name = $user["titulo"];
                                        $fecha = $user["fecha"];
                                        $hora = $user["hora"];

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
                                        $link_delete = "javascript:user_delete($id);";
                                        $link_edit = "javascript:user_edit( $id);";
                                        $link_view = "javascript:user_view( $id, '$name');";
                                        ?>
                                        <tr>
                                            <td><?php print $name; ?> </td>
                                            <td><?php print $fecha; ?> </td>
                                            <td><?php print $hora; ?> </td>
                                            
                                            <td>
                                                                                                
                                                <a href="<?php print $link_delete; ?>" text="Borrar artículo" alt="Borrar Artículo"><i class="fa fa-close text-navy"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <a href="<?php print $link_edit; ?>" alt="Editar artículo" text="Editar Artículo" ><i class="fa fa-edit text-navy" ></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <a href="<?php print $link_view; ?>" alt="Ver inscritos" text="Ver Inscritos" ><i class="fa fa-eye text-navy" ></i></a>
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











                <div class="col-lg-5">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5 id="h5_new">Nueva charla:</h5>
                        </div>
                        <div class="ibox-content">
                            
                                

                                <div class="form-group row"><label class="col-lg-2 col-form-label">Título</label>

                                    <input type="hidden" name="hdn_id_blog" id="hdn_id_blog" value="" >
                                    <input type="hidden" name="hdn_id_user" id="hdn_id_user" value="<?php print $id_user; ?>" >


                                    <!--div class="col-lg-10"-->
                                        <!--input type="text" placeholder="Título" class="form-control" name="titulo" id="titulo"--> 

                                        <textarea id="titulo" name="titulo"  class="form-control border-left m-t summernote" style="height: 200px"></textarea>

                                        
                                    <!--/div-->
                                </div>

                                <div class="form-group row"><label class="col-lg-2 col-form-label">Descripción</label>

                                    <!--div class="col-lg-10"-->
                                    <textarea id="texto" name="texto"  class="form-control border-left m-t summernote" style="height: 200px"></textarea>
                                        <span class="form-text m-b-none"></span>
                                    <!--/div-->
                                </div>

                                <div class="form-group row"><label class="col-lg-2 col-form-label">Imagen 1</label>

                                    <input type="hidden" name="hdn_imagen1" id="hdn_imagen1" value="" >
                                    <div class="col-lg-10">
                                                    
                                        
                                        <form id="form_imagen1">
                                            
                                            <div id='file_upload1'   
                                                 name='file_upload1'> Subir imagen</div>           
                                        </form>
                                    <div>
                                        <img  src="" id="cropbox1" class="img" style="width:400px;" /><br />
                                    </div>

                                    <button id="btn_quitar_imagen1" style="display:none;" class="btn btn-sm btn-primary m-t-n-xs" style="margin-left:100px;" onclick="javascript:quitar_imagen(1);"><strong>Quitar imagen</strong></button>


                                    </div>


                                </div>



                                <div class="form-group row"><label class="col-lg-2 col-form-label">Fecha</label>

                                    <!--div class="col-lg-10"-->
                                    <input id="fecha" name="fecha" type="date" class="form-control border-left m-t">

                                        <span class="form-text m-b-none"></span>
                                    <!--/div-->
                                </div>


                                <div class="form-group row"><label class="col-lg-2 col-form-label">Hora</label>

                                    <!--div class="col-lg-10"-->
                                    <input id="hora" name="hora" type="time" class="form-control border-left m-t">

                                        <span class="form-text m-b-none"></span>
                                    <!--/div-->
                                </div>

                                <div class="form-group row" id="div_especialidades">


                                </div>

                                <div class="form-group row" id="colaboradores">


                                </div>

                                <div class="form-group row"><label class="col-lg-4 col-form-label">Link de Pago</label>

                                        <textarea id="link_pago" name="link_pago"  class="form-control border-left m-t" style="height: 200px">  </textarea>

                                        
                                    <!--/div-->
                                </div>


                                <div class="form-group row">
                                    <div class="col-lg-offset-2 col-lg-10">

                                            <button class="btn btn-sm btn-primary float-right m-t-n-xs" onclick="javascript:new_save();"><strong>Guardar</strong></button>

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






        function user_delete(id){


        if (confirm('¿Seguro desea borrar esta charla?')){
            $.ajax ({
                  url:        'php/ajax/charla_delete.php',  // URL a invocar asíncronamente 
                  type:         'post' ,   // Método utilizado para el requerimiento 
                              
                  data:   {
                    'id': id
                 
                  },
                  // Información local a enviarse con el requerimiento 
                  // Que hacer en caso de ser exitoso el requerimiento 
                  success:  function(data)
                  {
                    

                    if (data == "OK"){
                        alert("La charla fue borrada con éxito.");
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







function new_save(){

          var totalesp = "";  
          var totalcolab = "";  

          $(".espec:checkbox:checked").each(function() {

            if (totalesp!="")
              totalesp +=  ",";
            totalesp += $(this).val();
          });

          var totalcolab = "";
          $(".colab:checkbox:checked").each(function() {

            if (totalcolab!="")
              totalcolab +=  ",";
            totalcolab += $(this).val();
          });

console.log(totalesp);
console.log(totalcolab);

        if ($("#titulo").val()==""){
            //toastr.warning('Error', 'Ingrese título.');
            alert("Por favor ingrese título.");
            return;
        }


        if ($("#texto").val()==""){
            //toastr.warning('Error', 'Ingrese texto'); 
            alert("Por favor ingrese texto.");
            return;
        }




        $.ajax ({
              url:        'php/ajax/charla_save.php',  
              type:         'post',    
              data: {
                'id': $("#hdn_id_blog").val(),
                'titulo': $("#titulo").val(),
                'texto': $("#texto").val(),
                'foto1': $("#hdn_imagen1").val(),
                'fecha': $("#fecha").val(),
                'hora': $("#hora").val(),
                'link_pago': $("#link_pago").val(),
                'espec':totalesp,
                'colab':totalcolab
                

            },
              success:  function(data)
              {
                var ret = data;
//alert(data);
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
    



        function user_edit(id){



        $.ajax ({
              url:        'php/ajax/charla_get.php',  // URL a invocar asíncronamente 
              type:         'post' ,   // Método utilizado para el requerimiento 
                          
              data:   {
                'id': id
             
              },
              // Información local a enviarse con el requerimiento 
              // Que hacer en caso de ser exitoso el requerimiento 
              success:  function(data)
              {

                  array_lis = data.split('|');

                    id = array_lis[0];
                    titulo = array_lis[1];
                    texto = array_lis[2];
                    foto1 = array_lis[6];
                    fecha = array_lis[3];
                    hora = array_lis[4];
                    hora_fin = array_lis[5];
                    link_pago = array_lis[7];

                        $("#hdn_id_blog").val(id);
                        $("#titulo").val(titulo);
                        $("#texto").val(texto);
                        $("#hdn_imagen1").val(foto1);
                        $("#fecha").val(foto2);
                        $("#hora").val(hora);
                        $("#hora_fin").val(hora_fin);

                        $("#link_pago").val(link_pago);
                        //$("#hdn_imagen3").val(foto3);

                    $( ".note-editable" ).each(function( index ) {
                      //console.log( index + ": " + $( this ).text() );
                      if (index==0)
                        $( this ).html(titulo);
                      else
                            $( this ).html(texto);
                    });



                    if (foto1!=""){

                        $("#cropbox1").show();
                        $("#cropbox1").attr("src","../uploads/fotos/blog/" + foto1);
                        $("#btn_quitar_imagen1").show();


                    }

                  
                    $("#h5_new").html("Editar:");


              },
              // Que hacer en caso de que sea fallido el requerimiento 
              error:  function(request, settings)
              {
                alert("error");
                ret =  "error";
              }       
            });


        }




function user_view( id, titulo){

    window.location.href= "charlas_view.php?id=" + id + "&titulo=" + titulo;

}

</script>




</html>
