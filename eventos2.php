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
    <title>Eventos</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="images/favicon.png" type="image/x-icon">
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





      <!-- Breadcrumbs-->
      <section class="section section-breadcrumb">
        <div class="parallax-container breadcrumb-wrapper" data-parallax-img="images/bg-01.jpg">
          <div class="parallax-content section-lg context-dark">
            <div class="shell context-dark">
              <h2>Timetable</h2>
              <div class="divider"></div>
            </div>
          </div>
        </div>
        <ul class="breadcrumb-custom">
          <li><a href="./">Home</a></li>
          <li>Timetable
          </li>
        </ul>
      </section>
      <!-- DateTimeTable-->
      <section class="section section-lg bg-white">
        <div class="shell">
          <button class="button button-timeline button-sm button-primary" data-custom-toggle=".time-table-header" data-custom-toggle-disable-on-blur="true">Click and view TimeList</button>
          <div class="time-table-header">
            <ul class="timeline-list">
              <li class="active" data-event="event-all">All</li>
              <li data-event="event-5">Group Therapy</li>
              <li data-event="event-6">Family Therapy</li>
              <li data-event="event-1">Couples Therapy</li>
              <li data-event="event-2">Career Counseling</li>
              <li data-event="event-7">Stress Therapy</li>
              <li data-event="event-4">Child Counseling</li>
              <li data-event="event-3">Private Counseling</li>
              <li data-event="event-8">Mental Health</li>
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
            <div class="timeline text-left">
              <ul>
                <li><span>07:00</span></li>
                <li><span>07:30</span></li>
                <li><span>08:00</span></li>
                <li><span>08:30</span></li>
                <li><span>09:00</span></li>
                <li><span>09:30</span></li>
                <li><span>10:00</span></li>
                <li><span>10:30</span></li>
                <li><span>11:00</span></li>
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
              </ul>
            </div>
            <!-- .timeline-->
            <div class="events">
              <ul>
                <!-- Sunday-->
                <li class="events-group">
                  <div class="top-info"><span>Sunday</span></div>
                  <ul>
                    <li class="single-event" data-start="07:00" data-end="11:00" data-event="event-1"><a href="#0"><span class="event-name">Couples Therapy</span><span class="event-place">Room 16</span><span class="this-time"></span><span class="event-content">Dr. Rodney </span><span class="event-info">An F.A.C.C. is a Fellow of the American College of Cardiology. Based on their outstanding credentials, achievements, and community contribution to cardiovascular medicine, physicians who are elected to fellowship can use F.A.C.C., Fellow of the American College of Cardiology, as a professional designation.</span></a></li>



                    <li class='single-event' data-start='14:00:00' data-end='15:30' data-event='event-1'><a href='#0'><span class='event-name'><p>Charla Vladimir 4</p></span><span class='event-place'>Room 16</span><span class='this-time'></span><span class='event-content'> Nuevo </span><span class='event-info'><p>Descripción de charla Vladimir 4</p></span></a></li>


                    <li class="single-event" data-start="11:00" data-end="13:00" data-event="event-2"><a href="#0"><span class="event-name">Career Counseling</span><span class="event-place">Room 113</span><span class="this-time"></span><span class="event-content">Dr. Sam Smith</span><span class="event-info">Whether it is providing preventative care, delivering dental restorative procedures, eliminating pain or correcting dento-facial esthetics, often, in a single visit, the dentist can experience the satisfaction, privilege and joy of positively transforming a patient’s life by restoring oral health.</span></a></li>
                    <!--li class="single-event" data-start="13:00" data-end="15:00" data-event="event-3"><a href="#0"><span class="event-name">Private Counseling</span><span class="event-place">Room 25</span><span class="this-time"></span><span class="event-content">Dr. Amy Adams</span><span class="event-info">In the United States, four years of residency training after medical school are required, with the first year being an internship in surgery, internal medicine, pediatrics, or a general transition year. Optional fellowships in advanced topics may be pursued for several years after residency. Most currently practicing ophthalmologists train in medical residency programs accredited by the Accreditation Council for Graduate Medical Education or the American Osteopathic Association and are board-certified by the American Board of Private Counseling or the American Osteopathic Board of Private Counseling and Otolaryngology..</span></a></li-->
                    <li class="single-event" data-start="15:00" data-end="17:30" data-event="event-1"><a href="#0"><span class="event-name">Couples Therapy</span><span class="event-place">Room 16</span><span class="this-time"></span><span class="event-content">Dr. Rodney Stratton</span><span class="event-info">An F.A.C.C. is a Fellow of the American College of Cardiology. Based on their outstanding credentials, achievements, and community contribution to cardiovascular medicine, physicians who are elected to fellowship can use F.A.C.C., Fellow of the American College of Cardiology, as a professional designation.</span></a></li>
                    <li class="single-event" data-start="17:30" data-end="19:30" data-event="event-4"><a href="#0"><span class="event-name">Child Counseling</span><span class="event-place">Room 15</span><span class="this-time"></span><span class="event-content">Dr. Amy Adams</span><span class="event-info">Child Counseling is the branch of medicine dealing with the health and medical care of infants, children, and adolescents from birth up to the age of 18</span></a></li>
                  </ul>
                </li>
                <!-- Monday-->
                <li class="events-group">
                  <div class="top-info"><span>Monday</span></div>
                  <ul>
                    <li class="single-event" data-start="07:30" data-end="9:00" data-event="event-5"><a href="#0"><span class="event-name">Group Therapy</span><span class="event-place">Room 11</span><span class="this-time"></span><span class="event-content">Dr. Lillian Martinez</span><span class="event-info">A cardiologist is a doctor with special training and skill in finding, treating and preventing diseases of the heart and blood vessels. If your general medical doctor feels that you might have a significant heart or related condition, he or she will often call on a cardiologist for help. Symptoms like shortness of breath, chest pains, or dizzy spells often require special testing. Sometimes heart murmurs or ECG changes need the evaluation of a cardiologist. Cardiologists help victims of heart disease return to a full and useful life and also counsel patients about the risks and prevention of heart disease.</span></a></li>
                    <li class="single-event" data-start="09:00" data-end="10:30" data-event="event-1"><a href="#0"><span class="event-name">Couples Therapy</span><span class="event-place">Room 16</span><span class="this-time"></span><span class="event-content">Dr. Rodney Stratton</span><span class="event-info">An F.A.C.C. is a Fellow of the American College of Cardiology. Based on their outstanding credentials, achievements, and community contribution to cardiovascular medicine, physicians who are elected to fellowship can use F.A.C.C., Fellow of the American College of Cardiology, as a professional designation.</span></a></li>
                    <li class="single-event" data-start="10:30" data-end="12:00" data-event="event-4"><a href="#0"><span class="event-name">Child Counseling</span><span class="event-place">Room 15</span><span class="this-time"></span><span class="event-content">Dr. Amy Adams</span><span class="event-info">Child Counseling is the branch of medicine dealing with the health and medical care of infants, children, and adolescents from birth up to the age of 18</span></a></li>
                    <li class="single-event" data-start="12:00" data-end="14:00" data-event="event-6"><a href="#0"><span class="event-name">Family Therapy</span><span class="event-place">Room 113</span><span class="this-time"></span><span class="event-content">Dr. Rodney Stratton</span><span class="event-info">To determine if an individual is experiencing pulmonary problems, one of the first things that is typically done is pulmonary function tests.  This is a group of tests that requires you to blow into a small device called a spirometer.  

For some tests, you will have your normal breathing measured.  For others, you may be required to exhale forcefully, or to attempt to empty your lungs of air.  You may be given an inhaled medication after these tests, then perform the tests again to determine if the medication was effective.</span></a></li>
                    <li class="single-event" data-start="14:30" data-end="17:30" data-event="event-7"><a href="#0"><span class="event-name">Stress Therapy</span><span class="event-place">Room 32</span><span class="this-time"></span><span class="event-content">Dr. Jason Clark</span><span class="event-info">The branch of medicine that deals with the treatment of serious wounds and injuries. </span></a></li>
                    <li class="single-event" data-start="17:30" data-end="19:30" data-event="event-6"><a href="#0"><span class="event-name">Family Therapy</span><span class="event-place">Room 113</span><span class="this-time"></span><span class="event-content">Dr. Rodney Stratton</span><span class="event-info">To determine if an individual is experiencing pulmonary problems, one of the first things that is typically done is pulmonary function tests.  This is a group of tests that requires you to blow into a small device called a spirometer.  

For some tests, you will have your normal breathing measured.  For others, you may be required to exhale forcefully, or to attempt to empty your lungs of air.  You may be given an inhaled medication after these tests, then perform the tests again to determine if the medication was effective.</span></a></li>
                  </ul>
                </li>
                <!-- Tuesday-->
                <li class="events-group">
                  <div class="top-info"><span>Tuesday</span></div>
                  <ul>
                    <li class="single-event" data-start="07:00" data-end="9:30" data-event="event-5"><a href="#0"><span class="event-name">Group Therapy</span><span class="event-place">Room 11</span><span class="this-time"></span><span class="event-content">Dr. Lillian Martinez</span><span class="event-info">A cardiologist is a doctor with special training and skill in finding, treating and preventing diseases of the heart and blood vessels. If your general medical doctor feels that you might have a significant heart or related condition, he or she will often call on a cardiologist for help. Symptoms like shortness of breath, chest pains, or dizzy spells often require special testing. Sometimes heart murmurs or ECG changes need the evaluation of a cardiologist. Cardiologists help victims of heart disease return to a full and useful life and also counsel patients about the risks and prevention of heart disease.</span></a></li>
                    <li class="single-event" data-start="10:00" data-end="12:30" data-event="event-7"><a href="#0"><span class="event-name">Stress Therapy</span><span class="event-place">Room 32</span><span class="this-time"></span><span class="event-content">Dr. Jason Clark</span><span class="event-info">The branch of medicine that deals with the treatment of serious wounds and injuries. </span></a></li>
                    <li class="single-event" data-start="12:30" data-end="15:00" data-event="event-4"><a href="#0"><span class="event-name">Child Counseling</span><span class="event-place">Room 15</span><span class="this-time"></span><span class="event-content">Dr. Amy Adams</span><span class="event-info">Child Counseling is the branch of medicine dealing with the health and medical care of infants, children, and adolescents from birth up to the age of 18</span></a></li>
                    <li class="single-event" data-start="15:00" data-end="17:30" data-event="event-6"><a href="#0"><span class="event-name">Family Therapy</span><span class="event-place">Room 113</span><span class="this-time"></span><span class="event-content">Dr. Rodney Stratton</span><span class="event-info">To determine if an individual is experiencing pulmonary problems, one of the first things that is typically done is pulmonary function tests.  This is a group of tests that requires you to blow into a small device called a spirometer.  

For some tests, you will have your normal breathing measured.  For others, you may be required to exhale forcefully, or to attempt to empty your lungs of air.  You may be given an inhaled medication after these tests, then perform the tests again to determine if the medication was effective.</span></a></li>
                    <li class="single-event" data-start="17:30" data-end="19:30" data-event="event-3"><a href="#0"><span class="event-name">Private Counseling</span><span class="event-place">Room 25</span><span class="this-time"></span><span class="event-content">Dr. Amy Adams</span><span class="event-info">In the United States, four years of residency training after medical school are required, with the first year being an internship in surgery, internal medicine, pediatrics, or a general transition year. Optional fellowships in advanced topics may be pursued for several years after residency. Most currently practicing ophthalmologists train in medical residency programs accredited by the Accreditation Council for Graduate Medical Education or the American Osteopathic Association and are board-certified by the American Board of Private Counseling or the American Osteopathic Board of Private Counseling and Otolaryngology..</span></a></li>
                  </ul>
                </li>
                <!-- Wednesday-->
                <li class="events-group">
                  <div class="top-info"><span>Wednesday</span></div>
                  <ul>
                    <li class="single-event" data-start="7:00" data-end="12:00" data-event="event-3"><a href="#0"><span class="event-name">Private Counseling</span><span class="event-place">Room 25</span><span class="this-time"></span><span class="event-content">Dr. Amy Adams</span><span class="event-info">In the United States, four years of residency training after medical school are required, with the first year being an internship in surgery, internal medicine, pediatrics, or a general transition year. Optional fellowships in advanced topics may be pursued for several years after residency. Most currently practicing ophthalmologists train in medical residency programs accredited by the Accreditation Council for Graduate Medical Education or the American Osteopathic Association and are board-certified by the American Board of Private Counseling or the American Osteopathic Board of Private Counseling and Otolaryngology..</span></a></li>
                    <li class="single-event" data-start="12:00" data-end="14:00" data-event="event-6"><a href="#0"><span class="event-name">Family Therapy</span><span class="event-place">Room 113</span><span class="this-time"></span><span class="event-content">Dr. Rodney Stratton</span><span class="event-info">To determine if an individual is experiencing pulmonary problems, one of the first things that is typically done is pulmonary function tests.  This is a group of tests that requires you to blow into a small device called a spirometer.  

For some tests, you will have your normal breathing measured.  For others, you may be required to exhale forcefully, or to attempt to empty your lungs of air.  You may be given an inhaled medication after these tests, then perform the tests again to determine if the medication was effective.</span></a></li>
                    <li class="single-event" data-start="14:30" data-end="17:00" data-event="event-1"><a href="#0"><span class="event-name">Couples Therapy</span><span class="event-place">Room 16</span><span class="this-time"></span><span class="event-content">Dr. Rodney Stratton</span><span class="event-info">An F.A.C.C. is a Fellow of the American College of Cardiology. Based on their outstanding credentials, achievements, and community contribution to cardiovascular medicine, physicians who are elected to fellowship can use F.A.C.C., Fellow of the American College of Cardiology, as a professional designation.</span></a></li>
                    <li class="single-event" data-start="17:00" data-end="19:30" data-event="event-8"><a href="#0"><span class="event-name">Stress Therapy</span><span class="event-place">Room 15</span><span class="this-time"></span><span class="event-content">Dr. Jason Clark</span><span class="event-info">Diagnostic tests make it possible to identify the microorganism causing an infectious disease and to perform susceptibility testing to prescribe the most appropriate treatment. They also make it possible to detect non-infectious diseases. Such tests provide the basis for most medical decision-making, and yet they account for only 2% to 3% of healthcare spending worldwide. They play a decisive role in limiting healthcare costs since the appropriate diagnostic test is performed in a timely manner.</span></a></li>
                  </ul>
                </li>
                <!-- Thursday-->
                <li class="events-group">
                  <div class="top-info"><span>Thursday</span></div>
                  <ul>
                    <li class="single-event" data-start="07:30" data-end="09:30" data-event="event-2"><a href="#0"><span class="event-name">Dentistry</span><span class="event-place">Room 113</span><span class="this-time"></span><span class="event-content">Dr. Sam Smith</span><span class="event-info">Whether it is providing preventative care, delivering dental restorative procedures, eliminating pain or correcting dento-facial esthetics, often, in a single visit, the dentist can experience the satisfaction, privilege and joy of positively transforming a patient’s life by restoring oral health.</span></a></li>
                    <li class="single-event" data-start="09:30" data-end="13:00" data-event="event-4"><a href="#0"><span class="event-name">Child Counseling</span><span class="event-place">Room 15</span><span class="this-time"></span><span class="event-content">Dr. Amy Adams</span><span class="event-info">Child Counseling is the branch of medicine dealing with the health and medical care of infants, children, and adolescents from birth up to the age of 18</span></a></li>
                    <li class="single-event" data-start="13:00" data-end="15:30" data-event="event-7"><a href="#0"><span class="event-name">Stress Therapy</span><span class="event-place">Room 32</span><span class="this-time"></span><span class="event-content">Dr. Jason Clark</span><span class="event-info">The branch of medicine that deals with the treatment of serious wounds and injuries. </span></a></li>
                    <li class="single-event" data-start="15:30" data-end="17:30" data-event="event-4"><a href="#0"><span class="event-name">Child Counseling</span><span class="event-place">Room 15</span><span class="this-time"></span><span class="event-content">Dr. Amy Adams</span><span class="event-info">Child Counseling is the branch of medicine dealing with the health and medical care of infants, children, and adolescents from birth up to the age of 18</span></a></li>
                    <li class="single-event" data-start="17:30" data-end="19:30" data-event="event-3"><a href="#0"><span class="event-name">Private Counseling</span><span class="event-place">Room 25</span><span class="this-time"></span><span class="event-content">Dr. Amy Adams</span><span class="event-info">In the United States, four years of residency training after medical school are required, with the first year being an internship in surgery, internal medicine, pediatrics, or a general transition year. Optional fellowships in advanced topics may be pursued for several years after residency. Most currently practicing ophthalmologists train in medical residency programs accredited by the Accreditation Council for Graduate Medical Education or the American Osteopathic Association and are board-certified by the American Board of Private Counseling or the American Osteopathic Board of Private Counseling and Otolaryngology..</span></a></li>
                  </ul>
                </li>
                <!-- Friday-->
                <li class="events-group">
                  <div class="top-info"><span>Friday</span></div>
                  <ul>
                    <li class="single-event" data-start="07:00" data-end="10:30" data-event="event-7"><a href="#0"><span class="event-name">Stress Therapy</span><span class="event-place">Room 32</span><span class="this-time"></span><span class="event-content">Dr. Jason Clark</span><span class="event-info">The branch of medicine that deals with the treatment of serious wounds and injuries. </span></a></li>
                    <li class="single-event" data-start="10:30" data-end="13:30" data-event="event-8"><a href="#0"><span class="event-name">Mental Health</span><span class="event-place">Room 15</span><span class="this-time"></span><span class="event-content">Dr. Jason Clark</span><span class="event-info">Diagnostic tests make it possible to identify the microorganism causing an infectious disease and to perform susceptibility testing to prescribe the most appropriate treatment. They also make it possible to detect non-infectious diseases. Such tests provide the basis for most medical decision-making, and yet they account for only 2% to 3% of healthcare spending worldwide. They play a decisive role in limiting healthcare costs since the appropriate diagnostic test is performed in a timely manner.</span></a></li>
                    <li class="single-event" data-start="13:30" data-end="16:00" data-event="event-1"><a href="#0"><span class="event-name">Couples Therapy</span><span class="event-place">Room 16</span><span class="this-time"></span><span class="event-content">Dr. Rodney Stratton</span><span class="event-info">An F.A.C.C. is a Fellow of the American College of Cardiology. Based on their outstanding credentials, achievements, and community contribution to cardiovascular medicine, physicians who are elected to fellowship can use F.A.C.C., Fellow of the American College of Cardiology, as a professional designation.</span></a></li>
                    <li class="single-event" data-start="16:00" data-end="19:30" data-event="event-4"><a href="#0"><span class="event-name">Child Counseling</span><span class="event-place">Room 15</span><span class="this-time"></span><span class="event-content">Dr. Amy Adams</span><span class="event-info">Child Counseling is the branch of medicine dealing with the health and medical care of infants, children, and adolescents from birth up to the age of 18</span></a></li>
                  </ul>
                </li>
                <!--  Saturday-->
                <li class="events-group">
                  <div class="top-info"><span> Saturday</span></div>
                  <ul>
                    <li class="single-event" data-start="07:00" data-end="10:30" data-event="event-1"><a href="#0"><span class="event-name">Couples Therapy</span><span class="event-place">Room 16</span><span class="this-time"></span><span class="event-content">Dr. Rodney Stratton</span><span class="event-info">An F.A.C.C. is a Fellow of the American College of Cardiology. Based on their outstanding credentials, achievements, and community contribution to cardiovascular medicine, physicians who are elected to fellowship can use F.A.C.C., Fellow of the American College of Cardiology, as a professional designation.</span></a></li>
                    <li class="single-event" data-start="10:30" data-end="12:30" data-event="event-7"><a href="#0"><span class="event-name">Stress Therapy</span><span class="event-place">Room 32</span><span class="this-time"></span><span class="event-content">Dr. Jason Clark</span><span class="event-info">The branch of medicine that deals with the treatment of serious wounds and injuries. </span></a></li>
                    <li class="single-event" data-start="12:30" data-end="15:00" data-event="event-3"><a href="#0"><span class="event-name">Private Counseling</span><span class="event-place">Room 25</span><span class="this-time"></span><span class="event-content">Dr. Amy Adams</span><span class="event-info">In the United States, four years of residency training after medical school are required, with the first year being an internship in surgery, internal medicine, pediatrics, or a general transition year. Optional fellowships in advanced topics may be pursued for several years after residency. Most currently practicing ophthalmologists train in medical residency programs accredited by the Accreditation Council for Graduate Medical Education or the American Osteopathic Association and are board-certified by the American Board of Private Counseling or the American Osteopathic Board of Private Counseling and Otolaryngology..</span></a></li>
                    <li class="single-event" data-start="15:00" data-end="17:00" data-event="event-6"><a href="#0"><span class="event-name">Family Therapy</span><span class="event-place">Room 113</span><span class="this-time"></span><span class="event-content">Dr. Rodney Stratton</span><span class="event-info">To determine if an individual is experiencing pulmonary problems, one of the first things that is typically done is pulmonary function tests.  This is a group of tests that requires you to blow into a small device called a spirometer.  

For some tests, you will have your normal breathing measured.  For others, you may be required to exhale forcefully, or to attempt to empty your lungs of air.  You may be given an inhaled medication after these tests, then perform the tests again to determine if the medication was effective.</span></a></li>
                    <li class="single-event" data-start="17:00" data-end="19:30" data-event="event-8"><a href="#0"><span class="event-name">Stress Therapy</span><span class="event-place">Room 15</span><span class="this-time"></span><span class="event-content">Dr. Jason Clark</span><span class="event-info">Diagnostic tests make it possible to identify the microorganism causing an infectious disease and to perform susceptibility testing to prescribe the most appropriate treatment. They also make it possible to detect non-infectious diseases. Such tests provide the basis for most medical decision-making, and yet they account for only 2% to 3% of healthcare spending worldwide. They play a decisive role in limiting healthcare costs since the appropriate diagnostic test is performed in a timely manner.</span></a></li>
                  </ul>
                </li>
              </ul>
            </div>
            

            <div class="event-modal">
              <header class="header">
                <div class="content"><span class="event-name"></span><span class="event-place"></span><span class="event-date"></span><span class="event-content"></span></div>
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
                <h6 class="text-spacing-200 text-uppercase font-base">Contact us</h6>
                <div class="divider-modern"></div>
                <ul class="list list-md">
                  <li>
                    <div class="unit unit-spacing-xs unit-horizontal unit-custom">
                      <div class="unit-left"><span class="icon icon-md icon-primary mdi-phone icon-gradient"></span></div>
                      <div class="unit-body"><a class="link-gray-darker" href="tel:#">+1 (409) 987–5874</a></div>
                    </div>
                  </li>
                  <li>
                    <div class="unit unit-spacing-xs unit-horizontal unit-custom">
                      <div class="unit-left"><span class="icon icon-md icon-primary mdi-email-outline icon-gradient"></span></div>
                      <div class="unit-body" style="position: relative; top: 1px"><a class="link-gray-darker" href="mailto:#">info@demolink.org</a></div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <div class="cell-sm-3 cell-xs-5">
              <div class="preffix-xl-70" style="max-width: 274px">
                <h6 class="text-spacing-200 text-uppercase font-base">clinic address</h6>
                <div class="divider-modern"></div>
                <ul class="list list-md">
                  <li>
                    <div class="unit unit-spacing-xs unit-horizontal">
                      <div class="unit-left"><span class="icon icon-md-biger icon-primary mdi-map-marker icon-gradient"></span></div>
                      <div class="unit-body" style="position: relative; top: -4px;"><a class="link-default" href="#">2130 Fulton Street San Diego, CA 94117-1080 USA</a></div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <div class="cell-sm-4">
              <div class="preffix-xl-70" style="max-width: 433px">
                <h6 class="text-spacing-200 text-uppercase font-base">Our departments</h6>
                <div class="divider-modern"></div>
                <ul class="list-inline list-inline-lg">
                  <li>
                    <ul class="list list-marked list-marked-sm list-marked-primary" style="line-height: 1.2">
                      <li><a class="link-default" href="about.html">About Us</a></li>
                      <li><a class="link-default" href="services.html">Our Services</a></li>
                    </ul>
                  </li>
                  <li>
                    <ul class="list list-marked list-marked-sm list-marked-primary" style="line-height: 1.2">
                      <li><a class="link-default" href="our-doctors.html">Our Doctors</a></li>
                      <li><a class="link-default" href="timetable.html">Timetable</a></li>
                    </ul>
                  </li>
                  <li>
                    <ul class="list list-marked list-marked-sm list-marked-primary" style="line-height: 1.2">
                      <li><a class="link-default" href="#">Testimonials</a></li>
                      <li><a class="link-default" href="#">Blog</a></li>
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
                  <li><a class="icon icon-gray-darker fa-google-plus" href="#"></a></li>
                  <li><a class="icon icon-gray-darker fa-pinterest-p" href="#"></a></li>
                </ul>
              </div>
            </div>
            <div class="cell-xs-6 cell-sm-6 text-xs-left">
              <p class="copyright preffix-xl-70">Inside	&#169; <span class="copyright-year"></span>. <a href="privacy-policy.html">Privacy Policy</a>
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