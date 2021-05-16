<?php
//session_start();
error_reporting(0);
$mysqli = new mysqli('localhost',"id10329761_alonso","123456","id10329761_invernadero") or die (mysqli_error($mysqli));

$idfases=0;
$fases =  '';
$fechainicio = '';
$fechafinal = '';
$actualizar = false;

if(isset($_POST['Guardar'])){

  $fases = $_POST['fases'];
  $fechainicio = $_POST['fechainicio'];
  $fechafinal = $_POST['fechafinal'];

  $mysqli->query("INSERT INTO fases (idfases,fases,fechainicio,fechafinal) VALUES(NULL,'$fases','$fechainicio','$fechafinal')") or die ($mysqli -> error);

  $_SESSION['message'] = "Se registro al usuario";
  $_SESSION['msg_type'] = "success";

  header('location: ..\fases1.php');
}

if(isset($_GET['borrar'])){
  $idfases = $_GET['borrar'];
  $mysqli->query("DELETE FROM fases WHERE idfases=$idfases") or die ($mysqli->error());

  $_SESSION['message'] = "Se borro al usuario";
  $_SESSION['msg_type'] = "danger";

  header('location: ..\fases1.php');
}

if(isset($_GET['edit'])){
  $idfases = $_GET['edit'];
  $actualizar = true;
  $result = $mysqli->query("SELECT * FROM fases WHERE idfases=$idfases") or die ($mysqli->error());
  if (mysqli_num_rows($result)==1){
    $row = $result->fetch_array();
    $fases =  $row['fases'];
    $fechainicio = $row['fechainicio'];
    $fechafinal = $row['fechafinal'];
  }
}

if (isset($_POST['editar'])){
  $idfases = $_POST['idfases'];
  $fases =  $_POST['fases'];
  $fechainicio = $_POST['fechainicio'];
  $fechafinal = $_POST['fechafinal'];

  $mysqli->query("UPDATE fases SET fases='$fases',fechainicio='$fechainicio',fechafinal='$fechafinal' WHERE idfases=$idfases")or die ($mysqli->error);

  $_SESSION['message'] = "Se editaron correctamente los datos del usuario";
  $_SESSION['msg_type'] = "success";

  header('location: ..\fases1.php');
}

?>
