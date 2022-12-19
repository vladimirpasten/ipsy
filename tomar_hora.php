<?php session_start();

$error=false;
if (isset($_GET["error"])){

  $error=true;
}

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
                    <li class="active"><a href="tomar_hora.php">Tomar hora</a></li>
                    <li><a href="blog.php">iPsy Blog</a></li>
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
        <ul class="breadcrumb-custom">
          <li><a href="./">Inicio</a></li>
          
          <li>Tomar hora
          </li>
        </ul>
      </section>
      <!-- Laboratory Analysis-->
      <!--section class="section section-lg bg-white text-left">
        <div class="shell">
          <div class="range range-60">
            <div class="cell-lg-8">
              <div class="range range-35" id="terapeutas"-->
                
      <section class="section section-lg bg-white text-center">
        <div class="shell">
          <div class="range range-xs-center range-60 range-lg-200">
            <div class="cell-xs-12">



<div class="block-center" style="max-width: 520px">                

                <h4 class="text-regular">Para tomar hora debes estar registrado en iPsy, sólo necesitas tu correo electrónico.</h4>
                <!--ul class="group group-sm group-middle group-center">
                  <li><a class="button button-social button-effect-ujarak button-ellipse-md button-facebook button-icon button-icon-left" href="#"><span class="icon icon-md-biger fa-facebook"></span><span class="button-text">Facebook</span></a></li>
                  <li><a class="button button-social button-effect-ujarak button-ellipse-md button-twitter button-icon button-icon-left" href="#"><span class="icon icon-md-biger fa-twitter"></span><span class="button-text">Twitter</span></a></li>
                  <li><a class="button button-social button-effect-ujarak button-ellipse-md button-google button-icon button-icon-left" href="#"><span class="icon icon-md-biger fa-google-plus"></span><span class="button-text">Google+</span></a></li>
                </ul>
                <div class="form-divider"><span class="small text-uppercase">or</span></div-->
                <!-- RD Mailform-->
                <form class="rd-mailform text-left" id="ingreso" name="ingreso" method="post" action="php/auten2.php">
                  <div class="form-wrap form-wrap-validation">
                    <label class="form-label" for="forms-login-name">Email</label>
                    <input class="form-input" id="forms-login-name" type="text" name="name" data-constraints="@Required">
                  </div>
                  <div class="form-wrap form-wrap-validation">
                    <label class="form-label" for="forms-login-password">Clave</label>
                    <input class="form-input" id="forms-login-password" type="password" name="password" data-constraints="@Required">
                  </div>
                  <button style="background-color: #01C4C7; border-radius:   10px;" class="button button-effect-ujarak button-block button-square button-primary" type="button" onclick="javascript:login();">Acceder</button>
                  <p>Regístrate <a href='signup-paciente.html'>Aquí</a>  </p>

                </form>
</div>

                <!--iframe src="app02/index.php" width="100%" height="1000px"></iframe-->

                <!--div class="cell-xs-5 cell-sm-33 cell-md-25">
                  
                  <div class="vip">
                    <div class="vip-image-block"><img src="images/diagnostics-01-268x216.jpg" alt="" width="268" height="216"/>
                    </div>
                    <div class="vip-content">
                      <h5><a href="doctor-profile.html">Dr. Julia Jameson</a></h5>
                      <div class="vip-cite"><span>Clinical Psychologist</span></div>
                      <div class="vip-divider"></div>
                      <div class="vip-link"><span class="icon icon-md icon-primary mdi-phone"></span><a href="tel:#">+1 (409) 987–5874</a></div>
                    </div>
                  </div>
                
                </div>
                <div class="cell-xs-5 cell-sm-33 cell-md-25">
                  <div class="vip">
                    <div class="vip-image-block"><img src="images/diagnostics-02-268x216.jpg" alt="" width="268" height="216"/>
                    </div>
                    <div class="vip-content">
                      <h5><a href="doctor-profile.html">Dr. Rodney Stratton</a></h5>
                      <div class="vip-cite"><span>Counseling Psychologist</span></div>
                      <div class="vip-divider"></div>
                      <div class="vip-link"><span class="icon icon-md icon-primary mdi-phone"></span><a href="tel:#">+1 (409) 987–5874</a></div>
                    </div>
                  </div>
                </div>
                <div class="cell-xs-5 cell-sm-33 cell-md-25">
                  <div class="vip">
                    <div class="vip-image-block"><img src="images/diagnostics-03-268x216.jpg" alt="" width="268" height="216"/>
                    </div>
                    <div class="vip-content">
                      <h5><a href="doctor-profile.html">Dr. Amy Adams</a></h5>
                      <div class="vip-cite"><span>Child Psychologist</span></div>
                      <div class="vip-divider"></div>
                      <div class="vip-link"><span class="icon icon-md icon-primary mdi-phone"></span><a href="tel:#">+1 (409) 987–5874</a></div>
                    </div>
                  </div>
                </div>
                <div class="cell-xs-5 cell-sm-33 cell-md-25">
                  <div class="vip">
                    <div class="vip-image-block"><img src="images/diagnostics-04-268x216.jpg" alt="" width="268" height="216"/>
                    </div>
                    <div class="vip-content">
                      <h5><a href="doctor-profile.html">Dr. Max Turner</a></h5>
                      <div class="vip-cite"><span>Behavioral Psychologist</span></div>
                      <div class="vip-divider"></div>
                      <div class="vip-link"><span class="icon icon-md icon-primary mdi-phone"></span><a href="tel:#">+1 (409) 987–5874</a></div>
                    </div>
                  </div>
                </div>
                <div class="cell-xs-5 cell-sm-33 cell-md-25">
                  <div class="vip">
                    <div class="vip-image-block"><img src="images/diagnostics-05-268x216.jpg" alt="" width="268" height="216"/>
                    </div>
                    <div class="vip-content">
                      <h5><a href="doctor-profile.html">Dr. Rebecca Kelly</a></h5>
                      <div class="vip-cite"><span>Neuropsychologist</span></div>
                      <div class="vip-divider"></div>
                      <div class="vip-link"><span class="icon icon-md icon-primary mdi-phone"></span><a href="tel:#">+1 (409) 987–5874</a></div>
                    </div>
                  </div>
                </div>
                <div class="cell-xs-5 cell-sm-33 cell-md-25">
                  <div class="vip">
                    <div class="vip-image-block"><img src="images/diagnostics-06-268x216.jpg" alt="" width="268" height="216"/>
                    </div>
                    <div class="vip-content">
                      <h5><a href="doctor-profile.html">Dr. Melissa Adams</a></h5>
                      <div class="vip-cite"><span>Health Psychologist</span></div>
                      <div class="vip-divider"></div>
                      <div class="vip-link"><span class="icon icon-md icon-primary mdi-phone"></span><a href="tel:#">+1 (409) 987–5874</a></div>
                    </div>
                  </div>
                </div>
                <div class="cell-xs-5 cell-sm-33 cell-md-25">
                  <div class="vip">
                    <div class="vip-image-block"><img src="images/diagnostics-07-268x216.jpg" alt="" width="268" height="216"/>
                    </div>
                    <div class="vip-content">
                      <h5><a href="doctor-profile.html">Dr. Lillian Martinez</a></h5>
                      <div class="vip-cite"><span>Psychotherapist</span></div>
                      <div class="vip-divider"></div>
                      <div class="vip-link"><span class="icon icon-md icon-primary mdi-phone"></span><a href="tel:#">+1 (409) 987–5874</a></div>
                    </div>
                  </div>
                </div>
                <div class="cell-xs-5 cell-sm-33 cell-md-25">
                  <div class="vip">
                    <div class="vip-image-block"><img src="images/diagnostics-08-268x216.jpg" alt="" width="268" height="216"/>
                    </div>
                    <div class="vip-content">
                      <h5><a href="doctor-profile.html">Dr. Jack Peterson</a></h5>
                      <div class="vip-cite"><span>Cognitive Psychologist</span></div>
                      <div class="vip-divider"></div>
                      <div class="vip-link"><span class="icon icon-md icon-primary mdi-phone"></span><a href="tel:#">+1 (409) 987–5874</a></div>
                    </div>
                  </div>
                </div-->
              
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


    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript-->
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>

    <script type="text/javascript">
      

    function login(){
        var mail = $("#forms-login-name").val();
        var clave = $("#forms-login-password").val();


        if (mail == "" || clave == ""){
            alert("Por favor, ingrese toda la información solicitada.");
            return;
        }

        window.location.href = "php/auten2.php?mail="+mail+"&clave="+clave;
        //$("#ingreso").submit();
    }






    </script>


  </body>
</html>