 <?php  include "../model/connect.php";

  $sql = " SELECT `id`, `nombre`, `rut`, `fecha_nacimiento`, `login`, `mail`, `password`, `fono`, `aceptado`, `admin`, `activo`, observaciones, url_foto FROM `medicos` WHERE aceptado = 1 and activo = 1 and admin = 0 ORDER BY id DESC LIMIT 5; ";

  $array_ = array();
  $xml = "";
  $count = 0;
//  $result=mysql_query($sql, $conexion);  
//    while ($row=@mysql_fetch_array($result))
  $result = $mysqli->query($sql);
  $num = mysqli_num_rows($result);
  if ($num>0)
  while ($row = $result->fetch_assoc())

    {
      $id = $row["id"];
      $nombre = $row["nombre"];
      $fecha_nacimiento = $row["fecha_nacimiento"];
      $login = $row["login"];
      
      $email = $row["mail"];

      $fono = $row["fono"];
      $admin = $row["admin"];
      $rut = $row["rut"];

      $foto = $row["url_foto"];
      $observaciones = $row["observaciones"];

    $array_[$count] = array("id" => $id,
                "nombre" => $nombre,
                "fecha_nacimiento" => $fecha_nacimiento,
                "email" => $email,
                "login" => $login,

                "admin" => $admin,
                "rut" => $rut,
                
                "fono" => $fono,

                "curriculum" => "",
                "foto" => $foto,
                "resumen" => $observaciones


    );

    $count++;

    }

  include '../model/desconectar.php';
  //return array( "xml" => $xml , "array" => $array_ );

?>
        <div class="shell">


          <div class="range">
            <div class="cell-xs-10">
              <div class="box">
                <div class="box-left">
                  <h2>Últimos Psicólogos inscritos</h2>
                </div>
                <div class="box-right"><a class="button button-albus button-effect-ujarak" href="our-doctors.html" style=" border-radius:   10px;"> Ver Todos</a></div>
              </div>
              <div class="divider-default"></div>
<?php

                      $ter = $array_[0];

                      $fono = $ter["fono"];
                      //$area = $user["area"];
                      $foto = $ter["foto"];
                                        
                      if ($foto == ""){
                        $foto = "images/no_pic.png";
                      }else {
                        // code...
                        $foto = "uploads/fotos/" . $foto;
                      }                  

                      $resumen = $ter["resumen"];


?>


              <div class="range range-30">
                
                <div class="cell-sm-10 cell-lg-4 reveal-lg-flex">
                  <div class="block-disclosure block-disclosure-xl wow fadeIn" data-wow-delay=".6s">
                    
                    <div class="block-disclosure-left"><img src="<?php print $foto;?>" alt="" width="262" height="440"/>
                    </div>
                    <div class="block-disclosure-body">
                      <!--p class="block-disclosure-cite">Founder, Senior Psychologist</p-->
                      <h5 class="block-disclosure-title"><a href="doctor-profile.html"><?php print $ter["nombre"];?></a></h5>
                      <!--p class="block-disclosure-info">20 years of experience</p-->
                      <div class="block-disclosure-divider"></div>
                      <div class="block-disclosure-link"><?php print "";?></div>
                      <div class="block-disclosure-quote">
                        <svg width="66px" height="47px">
                          <defs>
                            <filter>
                              <feflood flood-color="rgb(202, 214, 227)" flood-opacity="1" result="floodOut"></feflood>
                            </filter>
                          </defs>
                          <g>
                            <path fill-rule="evenodd" d="M30.178,32.626 C30.178,36.717 28.692,40.139 25.720,42.891 C22.753,45.634 19.242,47.011 15.191,47.011 C11.146,47.011 7.601,45.634 4.558,42.891 C1.521,40.139 0.006,36.842 0.006,33.012 C0.006,29.171 1.829,24.504 5.472,19.002 L17.623,0.013 L29.371,0.013 L21.875,19.967 C27.410,22.392 30.178,26.616 30.178,32.626 ZM65.989,32.626 C65.989,36.717 64.503,40.139 61.531,42.891 C58.564,45.634 55.053,47.011 51.000,47.011 C46.951,47.011 43.407,45.634 40.369,42.891 C37.332,40.139 35.812,36.842 35.812,33.012 C35.812,29.171 37.641,24.504 41.281,19.002 L53.434,0.013 L65.174,0.013 L57.686,19.967 C63.218,22.392 65.989,26.616 65.989,32.626 Z"></path>
                          </g>
                        </svg>
                        <p><?php print $resumen;?></p>
                      </div>
                    </div>
                  </div>
                </div>
                
<?php  


                      $ter1 = $array_[1];
                      $ter2 = $array_[2];
                      $ter3 = $array_[3];
                      $ter4 = $array_[4];

                      $nombre1=$ter1["nombre"];
                      $nombre2=$ter2["nombre"];
                      $nombre3=$ter3["nombre"];
                      $nombre4=$ter4["nombre"];


                      $fono1 = $ter1["fono"];
                      $foto1 = $ter1["foto"];
                                        
                      if ($foto1 == ""){
                        $foto1 = "images/no_pic.png";
                      }else {
                        // code...
                        $foto1 = "uploads/fotos/" . $foto1;
                      }                  

                      $resumen1 = $ter1["resumen"];


                      $fono2 = $ter2["fono"];
                      $foto2 = $ter2["foto"];
                                        
                      if ($foto2 == ""){
                        $foto2 = "images/no_pic.png";
                      }else {
                        // code...
                        $foto2 = "uploads/fotos/" . $foto2;
                      }                  
                      $resumen2 = $ter2["resumen"];


                      $fono3 = $ter3["fono"];
                      $foto3 = $ter3["foto"];
                                        
                      if ($foto3 == ""){
                        $foto3 = "images/no_pic.png";
                      }else {
                        // code...
                        $foto3 = "uploads/fotos/" . $foto3;
                      }                  
                      $resumen3 = $ter3["resumen"];


                      $fono4 = $ter4["fono"];
                      $foto4 = $ter4["foto"];
                                        
                      if ($foto4 == ""){
                        $foto4 = "images/no_pic.png";
                      }else {
                        // code...
                        $foto4 = "uploads/fotos/" . $foto4;
                      }                  
                      $resumen4 = $ter4["resumen"];




?>

                <div class="cell-sm-5 cell-lg-3">
                  <div class="block-disclosure wow fadeIn" data-wow-delay=".1s">
                    <div class="block-disclosure-left"><img src="<?php print $foto1;?>" alt="" width="151" height="203"/>
                    </div>
                    <div class="block-disclosure-body">
                      <!--p class="block-disclosure-cite">Clinical Psychologist</p-->
                      <h5 class="block-disclosure-title"><a href="doctor-profile.html"><?php print $nombre1;?></a></h5>
                      <!--p class="block-disclosure-info">9 years of experience</p-->
                      <div class="block-disclosure-divider"></div>
                      <div class="block-disclosure-link"><?php print $resumen1;?></div>
                    </div>
                  </div>


                  <div class="block-disclosure wow fadeIn" data-wow-delay=".2s">
                    <div class="block-disclosure-left"><img src="<?php print $foto2;?>" alt="" width="151" height="203"/>
                    </div>
                    <div class="block-disclosure-body">
                      <!--p class="block-disclosure-cite">Counseling Psychologist</p-->
                      <h5 class="block-disclosure-title"><a href="doctor-profile.html"><?php print $nombre2;?></a></h5>
                      <!--p class="block-disclosure-info">16 years of experience</p-->
                      <div class="block-disclosure-divider"></div>
                      <div class="block-disclosure-link"><?php print $resumen2;?></div>
                    </div>
                  </div>
                </div>
                <div class="cell-sm-5 cell-lg-3">
                  <div class="block-disclosure wow fadeIn" data-wow-delay=".3s">
                    <div class="block-disclosure-left"><img src="<?php print $foto3;?>" alt="" width="151" height="203"/>
                    </div>
                    <div class="block-disclosure-body">
                      <!--p class="block-disclosure-cite">Counseling Psychologist</p-->
                      <h5 class="block-disclosure-title"><a href="doctor-profile.html"><?php print $nombre3;?></a></h5>
                      <!--p class="block-disclosure-info">10 years of experience</p-->
                      <div class="block-disclosure-divider"></div>
                      <div class="block-disclosure-link"><?php print $resumen3;?></div>
                    </div>
                  </div>
                  <div class="block-disclosure wow fadeIn" data-wow-delay=".4s">
                    <div class="block-disclosure-left"><img src="<?php print $foto4;?>" alt="" width="151" height="203"/>
                    </div>
                    <div class="block-disclosure-body">
                      <!--p class="block-disclosure-cite">Child Psychologist</p-->
                      <h5 class="block-disclosure-title"><a href="doctor-profile.html"><?php print $nombre4;?></a></h5>
                      <!--p class="block-disclosure-info">6 years of experience</p-->
                      <div class="block-disclosure-divider"></div>
                      <div class="block-disclosure-link"><?php print $resumen4;?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
