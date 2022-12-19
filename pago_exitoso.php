<?php session_start();
error_reporting(E_ALL);

ini_set('display_errors', '1');

//$id_blog = $_GET['id'];



?>


<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head> 
    <!-- Site Title-->
    <title>IPsy Pago exitoso</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="images/new/logo-home-ipsy.png" type="image/x-icon">
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



      <!-- Doctors-->
      <section class="section section-breadcrumb">
        <div class="parallax-container breadcrumb-wrapper" data-parallax-img="images/headers/ipsyblog.jpg">
          <div class="parallax-content section-lg context-dark">
            <div class="shell context-dark">
              <h2> Pago Exitoso </h2>
              <div class="divider"></div>
            </div>
          </div>
        </div>
      </section>
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
          window.parent.habilitar_pago();
       });
 

</script>