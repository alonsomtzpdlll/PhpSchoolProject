<?php
//session_start();
error_reporting(0);
$mysqli = new mysqli('localhost',"id10329761_alonso","123456","id10329761_invernadero") or die (mysqli_error($mysqli));

$idplanta=0;
$planta = '';
$actualizar = false;

if(isset($_POST['Guardar'])){

  $planta = $_POST['planta'];
  $n = $mysqli->query("SELECT max(iddplanta) FROM dplanta");
  $n1=$n+1;
  $mysqli->query("INSERT INTO dplanta (iddplanta,planta,especie) VALUES('$n1','$planta','venus')") or die ($mysqli -> error);

  $_SESSION['message'] = "Se registro al usuario";
  $_SESSION['msg_type'] = "success";

    header("location: ..\plantas1.php");

}

if(isset($_GET['borrar'])){
  $idplanta = $_GET['borrar'];
  $mysqli->query("DELETE FROM dplanta WHERE iddplanta=$idplanta") or die ($mysqli->error());

  $_SESSION['message'] = "Se borro al usuario";
  $_SESSION['msg_type'] = "danger";


    header("location: ..\plantas1.php");
    
}

if(isset($_GET['edit'])){
  $idplanta = $_GET['edit'];
  $actualizar = true;
  $result = $mysqli->query("SELECT * FROM dplanta WHERE iddplanta=$idplanta") or die ($mysqli->error());
  if (mysqli_num_rows($result)==1){
    $row = $result->fetch_array();
    $planta =  $row['planta'];
  }
}

if (isset($_POST['editar'])){
  $idplanta = $_POST['idplanta'];
  $planta =  $_POST['planta'];

  $mysqli->query("UPDATE dplanta SET planta='$planta' WHERE iddplanta=$idplanta")or die ($mysqli->error);

  $_SESSION['message'] = "Se editaron correctamente los datos del usuario";
  $_SESSION['msg_type'] = "success";


    header("location: ..\plantas1.php");
    
}

?>
