 <?php  

session_start();
error_reporting(E_ALL);

ini_set('display_errors', '1');

$logged = 0;
$name_user_logged = "";
$id_user = "";
$area = "";
$type_user = "";

if (isset($_SESSION['usuario'])){

    //if ($_SESSION['admin']=="1") {
        $name_user_logged = $_SESSION['usuario'];
        $id_user = $_SESSION['id'];
        $logged = 1;
        $area = $_SESSION['mail'];
        $type_user = $_SESSION['type_user'];
    //}
}


 include "../model/connect.php";

$id_user = $_POST['id'];

  $sql = " SELECT `id`, `nombre`, `comentarios`, `activo` FROM `especialidades` WHERE 1 ";

  $array_ = array();
  $xml = "";
  $count = 0;
//  $result=mysql_query($sql, $conexion);  
//    while ($row=@mysql_fetch_array($result))
  $result = $mysqli->query($sql);
  $num = mysqli_num_rows($result);
  print "<label  class='col-lg-2 col-form-label'>Especialidades</label><br><div>";
  if ($num>0)
  while ($row = $result->fetch_assoc())

    {
      $id = $row["id"];
      $nombre = $row["nombre"];

    $array_[$count] = array("id" => $id,
                "nombre" => $nombre);


    //ver si debe aparecer tickeada:
    $sql = " SELECT * FROM `psico_especialidades` WHERE id_psicologo = $id_user AND id_especialidad = $id; ";
        
    $result2 = $mysqli->query($sql);
    $num2 = mysqli_num_rows($result2);

    $checked = "";
    if ($num2>=1)
      $checked = " checked ";


        print "<label for='esp_$id' ><input class='espec' type='checkbox' $checked id='esp_$id' name='esp' value='$id'>&nbsp;$nombre</label>&nbsp;&nbsp;&nbsp;&nbsp;";

    

    $count++;

    }

print "</div>";
  include '../model/desconectar.php';
  //return array( "xml" => $xml , "array" => $array_ );

?>


