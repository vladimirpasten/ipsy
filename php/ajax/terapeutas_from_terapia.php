 <?php  

 include "../model/connect.php";


 $id_terapia = $_POST["id_terapia"];
 $sql = "";
 $sql2 = "";

 if ($id_terapia !="" && $id_terapia != "0"){

    $sql .= " INNER JOIN psico_especialidades pse ON pse.id_psicologo = m.id ";
    $sql2 = " AND pse.id_especialidad = $id_terapia ";

 }

  $sql = " SELECT m.id, m.nombre, m.rut, m.fecha_nacimiento, m.login, m.mail, m.password, m.fono, m.aceptado, m.admin, m.activo, m.observaciones, m.url_foto FROM `medicos` as m  $sql WHERE aceptado = 1 and activo = 1 and admin = 0 $sql2 ORDER BY id DESC LIMIT 5; ";

  $array_ = array();
  $xml = "";
  $count = 0;
//  $result=mysql_query($sql, $conexion);  
//    while ($row=@mysql_fetch_array($result))
  $result = $mysqli->query($sql);
  $num = mysqli_num_rows($result);

  $txt = "";

  $txt .= "<option selected value='0'>Seleccione</option>";
  if ($num>0)
  while ($row = $result->fetch_assoc())

    {
      $id = $row["id"];
      $nombre = $row["nombre"];

      $txt .= "<option value='$id'> $nombre </option> ";

    $count++;

    }

  include '../model/desconectar.php';
  print $txt;
  //return array( "xml" => $xml , "array" => $array_ );

?>