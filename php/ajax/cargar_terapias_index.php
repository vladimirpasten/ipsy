 <?php  include "../model/connect.php";

  $sql = " SELECT `id`, `nombre`, `codigo`, `observaciones`, `activo` FROM `terapias` WHERE activo = 1; ";

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
      $codigo = $row["codigo"];
      $observaciones = $row["observaciones"];

    $array_[$count] = array("id" => $id,
                "nombre" => $nombre,
                "codigo" => $codigo,
                "observaciones" => $observaciones
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
                  <h2>Últimos Terapeutas inscritos</h2>
                </div>
                <div class="box-right"><a class="button button-albus button-effect-ujarak" href="our-doctors.html"> Ver Todos</a></div>
              </div>
              <div class="divider-default"></div>
<?php

          foreach ($array_ as $ter){ 

                      

                      $nombre = $ter["nombre"];
                      $codigo = $ter["codigo"];
                                        

?>


                <div class="item wow fadeInRight" data-wow-delay=".3s"><a class="block-accent" href="#">
                    <div class="block-accent-inner"><span class="icon icon-xl icon-shaft <?php print $codigo; ?> icon-gradient"></span>
                      <h4 class="block-accent-title"><?php print $nombre; ?> </h4>
                    </div></a></div>

                
<?php  


        }



?>

