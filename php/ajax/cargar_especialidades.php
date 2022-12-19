 <?php  

session_start();
error_reporting(E_ALL);

ini_set('display_errors', '1');


 include "../model/connect.php";

  $sql = " SELECT `id`, `nombre`, `comentarios`, `activo` FROM `especialidades` WHERE 1 ";

  $array_ = array();
  $xml = "";
  $count = 0;
//  $result=mysql_query($sql, $conexion);  
//    while ($row=@mysql_fetch_array($result))
  $result = $mysqli->query($sql);
  $num = mysqli_num_rows($result);
  print "<label>Especialidades</label><br>";
  if ($num>0)
  while ($row = $result->fetch_assoc())

    {
      $id = $row["id"];
      $nombre = $row["nombre"];

    $array_[$count] = array("id" => $id,
                "nombre" => $nombre);



        print "<label for='esp_$id' ><input type='checkbox' id='esp_$id' name='esp' value='$id'>&nbsp;$nombre</label>&nbsp;&nbsp;&nbsp;&nbsp;";

    

    $count++;

    }

  include '../model/desconectar.php';
  //return array( "xml" => $xml , "array" => $array_ );

?>


