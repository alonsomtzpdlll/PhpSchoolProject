<?php
error_reporting(0);
$mysqli = new mysqli('localhost',"id10329761_alonso","123456","id10329761_invernadero") or die (mysqli_error($mysqli));

$idusuarios=0;
$idrol =  '';
$nom = '';
$appa = '';
$apma = '';
$correoe = '';
$contra = '';
$actualizar = false;
$buscar = false;
$f='';

if(isset($_POST['Guardar'])){
  $idrol =  $_POST['idrol'];
  $nom = $_POST['nom'];
  $appa = $_POST['appa'];
  $apma = $_POST['apma'];
  $correoe = $_POST['correoe'];
  $contra = $_POST['contra'];
  
  
  $result=$mysqli->query("SELECT COUNT(*) as validar FROM usuarios WHERE correoe = '$correoe'");
  
  $array = mysqli_fetch_array($result);
if($array['validar']==0){
  $mysqli->query("INSERT INTO usuarios (idusuarios,idrol,nom,appa,apma,correoe,contra) VALUES(NULL,'$idrol','$nom','$appa','$apma','$correoe','$contra')") or die ($mysqli -> error);

  $_SESSION['message'] = "Se registro al usuario";
  $_SESSION['msg_type'] = "success";

    header("location: ..\controlusuarios.php");
    $f='<div class="alert alert-success">Usuario Agregado Correctamente</div>';
}else{
    header("location: ..\controlusuarios.php"); 
    $f='<div class="alert alert-success">Usuario No Agregado</div>';
}
  
}

if(isset($_GET['borrar'])){
  $idusuarios = $_GET['borrar'];
  $mysqli->query("DELETE FROM usuarios WHERE idusuarios=$idusuarios") or die ($mysqli->error());

  $_SESSION['message'] = "Se borro al usuario";
  $_SESSION['msg_type'] = "danger";

  header('location: ..\controlusuarios.php');
}

if(isset($_GET['edit'])){
  $idusuarios = $_GET['edit'];
  $actualizar = true;
  $result = $mysqli->query("SELECT * FROM usuarios WHERE idusuarios=$idusuarios") or die ($mysqli->error());
  if (mysqli_num_rows($result)==1){
    $row = $result->fetch_array();
    $idrol =  $row['idrol'];
    $nom = $row['nom'];
    $appa = $row['appa'];
    $apma = $row['apma'];
    $correoe = $row['correoe'];
    $contra = $row['contra'];
  }
}

if (isset($_POST['editar'])){
  $idusuarios = $_POST['idusuarios'];
  $idrol =  $_POST['idrol'];
  $nom = $_POST['nom'];
  $appa = $_POST['appa'];
  $apma = $_POST['apma'];
  $correoe = $_POST['correoe'];
  $contra = $_POST['contra'];

  $mysqli->query("UPDATE usuarios SET idrol='$idrol',nom='$nom',appa='$appa',apma='$apma',correoe='$correoe',contra='$contra' WHERE idusuarios=$idusuarios")or die ($mysqli->error);

  $_SESSION['message'] = "Se editaron correctamente los datos del usuario";
  $_SESSION['msg_type'] = "success";

    header("location: ..\controlusuarios.php");
}

?>
