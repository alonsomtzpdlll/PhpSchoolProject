<?php
error_reporting(0);
session_start();

$mail='';
$pass='';
$acess='';
$mysqli = new mysqli('localhost','id10329761_alonso','123456','id10329761_invernadero') or die (mysqli_error($mysqli));
$mail = $_POST['correoe'];
$pass = $_POST['contra'];


if(isset($_POST['login'])){
    $result = $mysqli->query("SELECT COUNT(*) as contar FROM usuarios WHERE correoe='$mail' AND contra='$pass'") or die ($mysqli->error());
$array = mysqli_fetch_array($result);
if($array['contar']>0){
  $result2 = $mysqli->query("SELECT * FROM usuarios WHERE correoe='$mail' AND contra='$pass'") or die ($mysqli->error());
  $row = $result2->fetch_array();
  $idrol =  $row['idrol'];
  $nom = $row['nom'];
  $appa = $row['appa'];
  $apma = $row['apma'];
  $correoe = $row['correoe'];
  $contra = $row['contra'];
  $_SESSION['username']=$nom;
  $_SESSION['id']=$idrol;
  $_SESSION['ap1']=$appa;
  $_SESSION['ap2']=$apma;
  $_SESSION['correoe']=$correoe;
  $_SESSION['contra']=$contra;
  header("location: ..\welcome.php");
  $array[]=0;
}elseif($array['contar']<1){
     header("location: ..\index.php");
     $array=0;
     $incorrecto='<div class="alert alert-danger">Datos incorrectos</div>';
}
}
if(isset($_POST['actualizar'])){
$var1 = $_POST['nombr'];
$var2 = $_POST['appat'];
$var3 = $_POST['apmat'];
$var5 = $_POST['email1'];
$var6 = $_POST['contra1'];

$mysqli->query("UPDATE usuarios SET nom='$var1',appa='$var2',apma='$var3',contra='$var6' WHERE correoe='$var5'")or die ($mysqli->error);

$_SESSION['message'] = "Se editaron correctamente los datos del usuario";
$_SESSION['msg_type'] = "success";

header('location: ..\welcome.php');

}
 $correcto='<div class="alert alert-success">Sesion correcta</div>';
 ?>
