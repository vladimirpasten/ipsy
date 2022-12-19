<?php session_start();
error_reporting(E_ALL);

ini_set('display_errors', '1');

include "php/model/terapias.php";

$data_ = get_terapias();
$listUsers = $data_["array"];

//print_r($listUsers);

include "php/model/blog.php";

$data_ = get_blogs("", 4);
$listBlogs = $data_["array"];


?>


<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head> 
    <!-- Site Title-->
    <title>Home</title>
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
                <div class="rd-navbar-brand"><a class="brand-name" href="index.php"><img src="images/new/logo_ipsy.png" alt="" width="79" height="40"/></a></div>
              </div>
              <div class="rd-navbar-aside-right">
                <div class="rd-navbar-nav-wrap rd-navbar-nav-wrap-default">
                  <!-- RD Navbar Nav-->
                  <ul class="rd-navbar-nav">

                    <li  style="background-color: #01C4C7; border-radius:   10px;"> <a href="#" style="margin:5px 10px 5px 5px;color:white;" >Inscríbete</a> 
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
      <!-- Swiper-->
      <section class="swiper-main-wrap wow fadeIn">
        <div class="swiper-container swiper-slider" data-index-bullet="true" data-clickable="true" data-custom-pagination="#swiper-pagination-index" data-slide-effect="fade" data-autoplay="5000" data-simulate-touch="false">
          <div class="swiper-wrapper">

            <div class="swiper-slide" data-slide-bg="images/fondos/banner_ipsy_1slider1.jpg" >
              <div class="swiper-slide-caption">
                <div class="swiper-content-wrapper">
                  <div class="swiper-content section-lg">
                    <p class="heading-4 heading-divider-modern" data-caption-animate="fadeInUp" data-caption-delay="250" style="font-weight: 400;color:white;font-size: 18px;max-width:400px;">

                      IPsy es una red de psicólogos comprometidos con la salud mental.

                    </p>
                    <h1 data-caption-animate="fadeInUp"  style="color:white;" data-caption-delay="100">Bienvenido a IPSY</h1>  <a class="button button-gradient" href="our-doctors.php" data-caption-animate="fadeInUp" data-caption-delay="450"  style="color:white;">Buscar un psicólogo</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="swiper-slide" data-slide-bg="images/fondos/banner_ipsy_1slider2.jpg">
              <div class="swiper-slide-caption">
                <div class="swiper-content-wrapper">
                  <div class="swiper-content section-lg">
                    <p class="heading-4 heading-divider-modern" data-caption-animate="fadeInUp" data-caption-delay="250" style="font-weight: 400;color:white;font-size: 18px;max-width:400px;">
                      IPsy, Psicólogos a un click
                    </p>
                    <h1 data-caption-animate="fadeInUp"  style="color:white;" data-caption-delay="100">Salud Mental</h1> <a class="button button-gradient" href="our-doctors.php" data-caption-animate="fadeInUp" data-caption-delay="450"  style="color:white;">Buscar un psicólogo</a>
                  </div>
                </div>
              </div>
            </div>


            <div class="swiper-slide" data-slide-bg="images/fondos/banner_ipsy_1slider3.jpg">
              <div class="swiper-slide-caption">
                <div class="swiper-content-wrapper">
                  <div class="swiper-content section-lg">
                    <p class="heading-4 heading-divider-modern" data-caption-animate="fadeInUp" data-caption-delay="250" style="font-weight: 400;color:white;font-size: 18px;max-width:400px;">
                      Registrate, selecciona tu psicólogo, agenda tu hora y ¡ya!
                    </p>
                    <h1 data-caption-animate="fadeInUp"  style="color:white;" data-caption-delay="100">Terapeutas</h1> <a class="button button-gradient" href="our-doctors.php" data-caption-animate="fadeInUp" data-caption-delay="450"  style="color:white;">Buscar un psicólogo</a>
                  </div>
                </div>
              </div>
            </div>




            <div class="swiper-slide" data-slide-bg="images/fondos/DSCN26x97.JPG">
              <div class="swiper-slide-caption">
                <div class="swiper-content-wrapper">
                  <div class="swiper-content section-lg">
                    <p class="heading-4 heading-divider-modern" data-caption-animate="fadeInUp" data-caption-delay="250" style="font-weight: 400;color:white;font-size: 18px;max-width:400px;">
                      Atravesar crisis y dudas es normal, callarse y aguantar NO.
                    </p>
                    <h1 data-caption-animate="fadeInUp"  style="color:white;" data-caption-delay="100">Ipsy</h1> <a class="button button-gradient" href="our-doctors.php" data-caption-animate="fadeInUp" data-caption-delay="450"  style="color:white;">Buscar un psicólogo</a>
                  </div>
                </div>
              </div>
            </div>











          </div>
        </div>
<!-- RRSS -->
        <!--div class="swiper-main-list-wrap">
          <ul class="swiper-main-list">
            <li><a class="icon fa-facebook icon-white-lighter-block" href="#"></a></li>
            <li><a class="icon fa-twitter icon-white-lighter-block" href="#"></a></li>
            <li><a class="icon icon-xxs fa-google-plus icon-white-lighter-block" href="#"></a></li>
          </ul>
        </div-->

        <!--div class="swiper-pagination swiper-pagination-index" id="swiper-pagination-index"></div-->
      </section>
      <!-- Opening Hours-->
      <!--section class="section section-lg bg-white wow fadeIn">
        <div class="shell">
          <div class="range range-30">
            <div class="cell-sm-5 cell-lg-3 reveal-sm-flex">
              <div class="block-modern block-modern-1 wow fadeIn" data-wow-delay=".1s">
                <div class="block-modern-title">
                  <h4>Opening Hours</h4>
                </div>
                <div class="work-info">
                  <div>
                    <dl>
                      <dt>Weekdays</dt>
                      <dd>8.00 – 17.00</dd>
                    </dl>
                    <dl>
                      <dt>Saturday</dt>
                      <dd>9.30 – 17.30</dd>
                    </dl>
                    <dl>
                      <dt>Sunday</dt>
                      <dd>9.30 – 15.00</dd>
                    </dl>
                  </div>
                </div>
              </div>
            </div>
            <div class="cell-sm-5 cell-lg-3 reveal-sm-flex">
              <div class="block-modern block-modern-2 wow fadeIn" data-wow-delay=".3s">
                <div class="block-modern-title">
                  <h4>Doctors’ Timetable</h4>
                </div>
                <p>View a timetable showing when our doctors are usually available.</p><a class="button button-albus button-effect-ujarak" href="timetable.html"> View TimeTable</a>
              </div>
            </div>
            <div class="cell-lg-4 reveal-md-flex">
              <div class="block-modern block-modern-3 wow fadeIn" data-wow-delay=".5s">
                <div class="block-modern-title">
                  <h4>Make an Appointment</h4>
                </div>
                <form class="rd-mailform" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php">
                  <div class="range range-xs-center range-20 range-narrow">
                    <div class="cell-sm-5">
                      <div class="form-wrap form-wrap-validation">
                        <select class="form-input select-filter" data-style="modern" data-placeholder="Select Date" data-minimum-results-for-search="Infinity" data-constraints="@Required">
                          <option label="placeholder"></option>
                          <option value="2">May 1</option>
                          <option value="3">June 25</option>
                          <option value="4">July 17</option>
                          <option value="5">August 29</option>
                          <option value="6">September 3</option>
                        </select><span class="select-arrow"></span>
                      </div>
                    </div>
                    <div class="cell-sm-5">
                      <div class="form-wrap form-wrap-validation">
                        <label class="form-label" for="forms-phone">Phone</label>
                        <input class="form-input" id="forms-phone" type="text" name="phone" data-constraints="@Numeric @Required">
                      </div>
                    </div>
                    <div class="cell-sm-5">
                      <div class="form-wrap form-wrap-validation">
                        <label class="form-label" for="forms-email">E-mail</label>
                        <input class="form-input" id="forms-email" type="email" name="email" data-constraints="@Email @Required">
                      </div>
                    </div>
                    <div class="cell-sm-5">
                      <div class="form-button">
                        <button class="button button-effect-ujarak button-albus button-block button-square" type="submit">make an Appointment</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section-->
      <!-- About Clinic-->
      <section class="section section-lg bg-white wow fadeIn">
        <div class="shell">
          <div class="range range-md-middle range-30">
            <div class="cell-md-6 wow fadeIn" data-wow-delay=".3s"><img src="images/new/que-es-ipsy-foto-home.jpg" alt="" width="803" height="458"/>
            </div>
            <div class="cell-md-4">
              <h2 class="heading-with-aside-divider wow fadeInUp" data-wow-delay=".1s">¿Qué es IPsy?<span class="divider"></span></h2>
              <p class="wow fadeInUp" data-wow-delay=".3s" style="font-size:  18px;">iPsy es una red de psicólogos comprometidos con la salud mental, nuestra meta es
derribar las barreras entre la gente y su bienestar brindando un espacio seguro y
confiable donde podrás empezar tu proceso de sanación mental y emocional, nunca más
estarás sólo, ven! te esperamos.</p>
              <div class="range range-40 range-lg-50 range-lg">
                <div class="cell-xs-5">
                  <div class="icon-unit wow fadeInUp" data-wow-delay=".7s">
                    <div class="icon-unit-left"><img src="images/icon-01-22x39.png" alt="" width="22" height="39"/>
                    </div>
                    <div class="icon-unit-body">
                      <h5>Psicólogos calificados</h5>
                      <p>Todos los psicólogos que encuentras en IPsy han pasado por un riguroso examen de sus habilidades y competencias.</p>
                    </div>
                  </div>
                </div>
                <div class="cell-xs-5">
                  <div class="icon-unit wow fadeInUp" data-wow-delay=".75s">
                    <div class="icon-unit-left"><img src="images/icon-02-38x39.png" alt="" width="38" height="39"/>
                    </div>
                    <div class="icon-unit-body">
                      <h5>Terapias especializadas</h5>
                      <p>Podrás buscar según la especialidad que necesites o estés buscando.</p>
                    </div>
                  </div>
                </div>
                <div class="cell-xs-5">
                  <div class="icon-unit wow fadeInUp" data-wow-delay=".8s">
                    <div class="icon-unit-left"><img src="images/icon-03-38x41.png" alt="" width="38" height="41"/>
                    </div>
                    <div class="icon-unit-body">
                      <h5>Blog de Salud Mental</h5>
                      <p>Podrás revisar los artículos que subimos periódicamente que pueden ayudarte de diversas formas.</p>
                    </div>
                  </div>
                </div>
                <div class="cell-xs-5">
                  <div class="icon-unit wow fadeInUp" data-wow-delay=".85s">
                    <div class="icon-unit-left"><img src="images/icon-04-42x35.png" alt="" width="42" height="35"/>
                    </div>
                    <div class="icon-unit-body">
                      <h5>Psicólogos</h5>
                      <p>Expertos en los que puedes confiar.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Departaments-->
      <section class="section section-lg bg-white wow fadeIn">
        <div class="shell">
          <div class="range">
            <div class="cell-xs-10">
              <div class="box">
                <div class="box-left">
                  <h2>Especialidades</h2>
                </div>
                <div class="box-right">
                  <div class="owl-outer-navigation" id="owl-carousel-nav">
                    <div class="owl-arrow owl-arrow-prev fl-budicons-free-left161"></div>
                    <div class="owl-arrow owl-arrow-next fl-budicons-free-right163"></div>
                  </div><a class="button button-albus button-effect-ujarak" style="border-radius:   10px;" href="terapias.html"> Todas</a>
                </div>
              </div>
              <div class="divider-default"></div>
              <div id="terapias" class="owl-carousel" data-items="1" data-sm-items="2" data-md-items="3" data-lg-items="5" data-stage-padding="0" data-loop="true" data-margin="30" data-mouse-drag="false" data-nav-custom="#owl-carousel-nav" data-autoplay="true">

                <?php foreach ($listUsers as $user){


                ?>  

                <div class="item wow fadeInRight" data-wow-delay=".1s">
                  <a class="block-accent" href="#">
                    <div class="block-accent-inner">
                      <span class="icon icon-xl icon-shaft <?php print $user["codigo"];?> icon-gradient"></span>
                      <h4 class="block-accent-title"> <?php print $user["nombre"];?>  </h4>
                    </div>
                  </a>
                </div>

                <?php
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Our Doctors-->
      <section class="section section-lg bg-white wow fadeIn" id="ultimos_terapeutas">


      </section>
      <!-- About Clinic-->
      <!--section class="section section-lg bg-white wow fadeIn">
        <div class="shell">
          <div class="range range-md-middle range-30">
            <div class="cell-md-6 wow fadeIn" data-wow-delay=".3s"><img src="images/about-01-803x458.jpg" alt="" width="803" height="458"/>
            </div>
            <div class="cell-md-4">
              <h2 class="heading-with-aside-divider">Testimonials<span class="divider"></span></h2>
              <div class="owl-carousel" data-items="1" data-stage-padding="0" data-loop="false" data-autoplay="true" data-margin="30" data-mouse-drag="false" data-animation-in="fadeIn" data-dots-custom="#owl-pagination-custom">
                <div class="item">
                  <div class="quote-testimonial">
                    <p class="quote-testimonial-title">I went to this psychological clinic because of my shyness and social anxiety. My sessions were useful as I could talk about things that I couldn’t discuss with family, friends or almost anyone. Their assistance was of vital importance.</p>
                    <p class="quote-testimonial-cite">Sam Adams</p>
                  </div>
                </div>
                <div class="item">
                  <div class="quote-testimonial">
                    <p class="quote-testimonial-title">At first, I was a little hesitant to meet with a psychologist because of negative past experiences, but intelligence and compassion of your therapists made me trust them without hesitation. They did a great job and helped me a lot.</p>
                    <p class="quote-testimonial-cite">Jane Anderson</p>
                  </div>
                </div>
                <div class="item">
                  <div class="quote-testimonial">
                    <p class="quote-testimonial-title">Thank you! You helped me with my panic attacks and anxiety I had for a long time. Now I’m feeling alive again. I really appreciate what you have done! Without your support I may possibly have given up and maybe have lost my job.</p>
                    <p class="quote-testimonial-cite">Tom Brown</p>
                  </div>
                </div>
                <div class="item">
                  <div class="quote-testimonial">
                    <p class="quote-testimonial-title">We’ve had a lot of financial troubles over the years; loss of physical health, job and bankruptcy. Your coaching gave us hope and a new sense of vision so we can create our lives together. Thank you for everything you’ve done for us!</p>
                    <p class="quote-testimonial-cite">Emily Watson</p>
                  </div>
                </div>
              </div>
              <div id="owl-pagination-custom">
                <div class="owl-dot-custom wow fadeIn" data-wow-delay=".5s" data-owl-item="0"><img class="img-circle" src="images/testimonials-01-79x79.jpg" alt="" width="79" height="79"/>
                </div>
                <div class="owl-dot-custom wow fadeIn" data-wow-delay=".6s" data-owl-item="1"><img class="img-circle" src="images/testimonials-02-79x79.jpg" alt="" width="79" height="79"/>
                </div>
                <div class="owl-dot-custom wow fadeIn" data-wow-delay=".7s" data-owl-item="2"><img class="img-circle" src="images/testimonials-03-79x79.jpg" alt="" width="79" height="79"/>
                </div>
                <div class="owl-dot-custom wow fadeIn" data-wow-delay=".8s" data-owl-item="3"><img class="img-circle" src="images/testimonials-04-79x79.jpg" alt="" width="79" height="79"/>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section-->
      <!-- Latest News-->
      <section class="section section-lg bg-white wow fadeIn">
        <div class="shell">
          <div class="range">
            <div class="cell-xs-10">
              <div class="box">
                <div class="box-left">
                  <h2>Últimos posteos</h2>
                </div>
                <div class="box-right">
                  <div class="owl-outer-navigation" id="owl-carousel-nav-1">
                    <div class="owl-arrow owl-arrow-prev fl-budicons-free-left161"></div>
                    <div class="owl-arrow owl-arrow-next fl-budicons-free-right163"></div>
                  </div>
                </div>
              </div>
              <div class="divider-default"></div>

              <div class="owl-carousel" data-items="1" data-md-items="2" data-stage-padding="0" data-loop="true" data-autoplay="true" data-margin="30" data-mouse-drag="false" data-nav-custom="#owl-carousel-nav-1">
                
<?php

                $count = 0;
                foreach ($listBlogs as $blog) {
                  // code...
                    $id_b  = $blog["id"];
                    $titulo_b = $blog["titulo"];
                    $fecha_b = $blog["fecha"];
                    $texto_b = $blog["texto"];
                    $foto1_b = $blog["foto1"];

                    $foto2_b = $blog["foto2"];
                    $foto3_b = $blog["foto3"];

                    $texto2_b = strip_tags($texto_b)  ;//$texto_b; substr($texto_b, 0, 15) . "...";
                    $texto2_b = substr($texto2_b, 0, 100) . "...";

                    if ($count==0)
                    print "<div class='item wow fadeIn' data-wow-delay='.1s'>";
                    else
                    print "<div class='item'>";
                          
                    print "  <article class='post'>";
                    print "    <div class='post-header blog-container'><a href='blog-detail.php?id=$id_b'><img class='crop' src='uploads/fotos/blog/$foto1_b' alt='' /></a></div>";
                    print "    <div class='post-footer'>";
                    print "      <h4><a href='blog-detail.php?id=$id_b'>$titulo_b</a></h4>";
                    print "      <div class='post-meta'>";
                    //print "        <dl>";
                    //print "          <dt>Date</dt>";
                    //print "          <dd><a href='news-page.html'>";
                    //print "              <time datetime='2018-01-22'>January 22, 2018</time></a></dd>";
                    //print "        </dl>";
                    print "        <dl>";
                    print "          <dt><a href='blog-detail.php?id=$id_b'> Leer </a></dt>";
                    print "          <dd> $texto2_b </dd>";
                    print "        </dl>";
                    //print "        <dl>";
                    //print "          <dt>Comments</dt>";
                    //print "          <dd><a href='news-page.html'>2</a></dd>";
                    //print "        </dl>";
                    print "      </div>";
                    print "    </div>";
                    print "  </article>";
                    print "</div>";
                    
                    $count++;


                }



?>



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
  </body>
</html>

<script language="javascript">


       $(document).ready(function(){

        cargar_ultimos_terapeutas();
        cargar_terapias();
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
</script>