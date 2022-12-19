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

$sql = " SELECT `id`, `nombre`, `rut`, `fecha_nacimiento`, `login`, `mail`, `password`, `fono`, `observaciones`, `url_foto`, `url_curi`, `url_doc`, `aceptado`, `admin`, `activo`, link_pago FROM `medicos` WHERE id != $id_user AND activo = 1; ";

  $array_ = array();
  $xml = "";
  $count = 0;
//  $result=mysql_query($sql, $conexion);  
//    while ($row=@mysql_fetch_array($result))
  $result = $mysqli->query($sql);
  $num = mysqli_num_rows($result);
  print "<label  class='col-lg-2 col-form-label'>Colaboradores</label><br><div>";
  if ($num>0)
  while ($row = $result->fetch_assoc())

    {
      $id = $row["id"];
      $nombre = $row["nombre"];

    $array_[$count] = array("id" => $id,
                "nombre" => $nombre);


    print "<label for='esp_$id' ><input class='colab' type='checkbox' id='col_$id' name='col' value='$id'>&nbsp;$nombre</label>&nbsp;&nbsp;&nbsp;&nbsp;";

    

    $count++;

    }

print "</div>";
  include '../model/desconectar.php';
  //return array( "xml" => $xml , "array" => $array_ );

?>


