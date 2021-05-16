<?php
error_reporting(0);
$mysqli = new mysqli('localhost',"id10329761_alonso","123456","id10329761_invernadero") or die (mysqli_error($mysqli));

$iddplanta=0;
$observacion ='' ;
$ntrampas = 0;
$crecimientoa =0;
$crecimientol = 0;
$huminver =0;
$temp =0;
$huminver=0;
$tierra=0;
$ph = 0;
$nv =0;
$actualizar = 0;
$buscar = false;

if(isset($_POST['Guardar'])){
  $ns=$_POST['iddplanta'];
  $iddplanta = (int)$ns;
  $observacion = $_POST['observacion'];
  $ntrampas = $_POST['ntrampas'];
  $crecimientoa = $_POST['crecimientoa'];
  $crecimientol = $_POST['crecimientol'];
  $huminver = $_POST['huminver'];
  $temp = $_POST['temp'];
  $huminver=$_POST['huminver'];
  $tierra=$_POST['tierra'];
  $ns2= $_POST['ph'];
  $ph =(float)$ns2;
  $ns3=$_POST['nv'];
  $nv = (float)$ns3;
  date_default_timezone_set('america/mexico_city');
  $hoy = date("Y-m-d");
  $hr=date("H:i:s");
  
  $mysqli->query("INSERT INTO observacion (idobservacion,iddplanta,observacion,ntrampas,crecimientoa,crecimientol,huminver,temp,tierra,ph,nv,fecha,hora) VALUES(NULL,$ns,'$observacion','$ntrampas','$crecimientoa','$crecimientol','$huminver','$temp','$tierra','$ph','$nv','$hoy','$hr')") or die ($mysqli -> error);
  
  $_SESSION['message'] = "Se registro al usuario";
  $_SESSION['msg_type'] = "success";
  header('location: ..\manuales.php');
}

if(isset($_GET['edit'])){
  $idobservacion = $_GET['edit'];
  $actualizar = 1;
  $result = $mysqli->query("SELECT * FROM observacion WHERE idobservacion=$idobservacion") or die ($mysqli->error());
  if (mysqli_num_rows($result)==1){
    $row = $result->fetch_array();
    $iddplanta = $row['iddplanta'];
    $observacion = $row['observacion'];
    $ntrampas = $row['ntrampas'];
    $crecimientoa = $row['crecimientoa'];
    $crecimientol = $row['crecimientol'];
    $huminver = $row['huminver'];
    $temp = $row['temp'];
    $huminver=$row['huminver'];
    $tierra=$row['tierra'];
    $ph =$row['ph'];
    $nv = $row['nv'];;
  }
}
if(isset($_GET['edit1'])){
  $idobservacion = $_GET['edit1'];
  $actualizar = 2;
  $result = $mysqli->query("SELECT * FROM observacion WHERE idobservacion=$idobservacion") or die ($mysqli->error());
  if (mysqli_num_rows($result)==1){
    $row = $result->fetch_array();
    $iddplanta = $row['iddplanta'];
    $observacion = $row['observacion'];
    $ntrampas = $row['ntrampas'];
    $crecimientoa = $row['crecimientoa'];
    $crecimientol = $row['crecimientol'];
    $huminver = $row['huminver'];
    $temp = $row['temp'];
    $huminver=$row['huminver'];
    $tierra=$row['tierra'];
    $ph =$row['ph'];
    $nv = $row['nv'];;
  }
}

if(isset($_GET['edit2'])){
  $idobservacion = $_GET['edit2'];
  $actualizar = 3;
  $result = $mysqli->query("SELECT * FROM observacion WHERE idobservacion=$idobservacion") or die ($mysqli->error());
  if (mysqli_num_rows($result)==1){
    $row = $result->fetch_array();
    $iddplanta = $row['iddplanta'];
    $observacion = $row['observacion'];
    $ntrampas = $row['ntrampas'];
    $crecimientoa = $row['crecimientoa'];
    $crecimientol = $row['crecimientol'];
    $huminver = $row['huminver'];
    $temp = $row['temp'];
    $huminver=$row['huminver'];
    $tierra=$row['tierra'];
    $ph =$row['ph'];
    $nv = $row['nv'];;
  }
}

if(isset($_GET['edit3'])){
  $idobservacion = $_GET['edit3'];
  $actualizar = 4;
  $result = $mysqli->query("SELECT * FROM observacion WHERE idobservacion=$idobservacion") or die ($mysqli->error());
  if (mysqli_num_rows($result)==1){
    $row = $result->fetch_array();
    $iddplanta = $row['iddplanta'];
    $observacion = $row['observacion'];
    $ntrampas = $row['ntrampas'];
    $crecimientoa = $row['crecimientoa'];
    $crecimientol = $row['crecimientol'];
    $huminver = $row['huminver'];
    $temp = $row['temp'];
    $huminver=$row['huminver'];
    $tierra=$row['tierra'];
    $ph =$row['ph'];
    $nv = $row['nv'];;
  }
}

if(isset($_GET['edit4'])){
  $idobservacion = $_GET['edit4'];
  $actualizar = 5;
  $result = $mysqli->query("SELECT * FROM observacion WHERE idobservacion=$idobservacion") or die ($mysqli->error());
  if (mysqli_num_rows($result)==1){
    $row = $result->fetch_array();
    $iddplanta = $row['iddplanta'];
    $observacion = $row['observacion'];
    $ntrampas = $row['ntrampas'];
    $crecimientoa = $row['crecimientoa'];
    $crecimientol = $row['crecimientol'];
    $huminver = $row['huminver'];
    $temp = $row['temp'];
    $huminver=$row['huminver'];
    $tierra=$row['tierra'];
    $ph =$row['ph'];
    $nv = $row['nv'];;
  }
}

if(isset($_GET['edit5'])){
  $idobservacion = $_GET['edit5'];
  $actualizar = 6;
  $result = $mysqli->query("SELECT * FROM observacion WHERE idobservacion=$idobservacion") or die ($mysqli->error());
  if (mysqli_num_rows($result)==1){
    $row = $result->fetch_array();
    $iddplanta = $row['iddplanta'];
    $observacion = $row['observacion'];
    $ntrampas = $row['ntrampas'];
    $crecimientoa = $row['crecimientoa'];
    $crecimientol = $row['crecimientol'];
    $huminver = $row['huminver'];
    $temp = $row['temp'];
    $huminver=$row['huminver'];
    $tierra=$row['tierra'];
    $ph =$row['ph'];
    $nv = $row['nv'];;
  }
}


if (isset($_POST['editar'])){
  $idobservacion = $_POST['idobservacion'];
  $observacion = $_POST['observacion'];
  $ntrampas = $_POST['ntrampas'];
  $crecimientoa = $_POST['crecimientoa'];
  $crecimientol = $_POST['crecimientol'];
  $ns2= $_POST['ph'];
  $ph =(float)$ns2;
  $ns3=$_POST['nv'];
  $nv = (float)$ns3;

  if($observacion!=''){
  $mysqli->query("UPDATE observacion SET observacion='$observacion' WHERE idobservacion=$idobservacion")or die ($mysqli->error);
  }
  if($ntrampas!=''){
  $mysqli->query("UPDATE observacion SET ntrampas='$ntrampas' WHERE idobservacion=$idobservacion")or die ($mysqli->error);
  }
  if($crecimientoa!=''){
  $mysqli->query("UPDATE observacion SET crecimientoa='$crecimientoa' WHERE idobservacion=$idobservacion")or die ($mysqli->error);
  }
  if($crecimientol!=''){
  $mysqli->query("UPDATE observacion SET crecimientol='$crecimientol' WHERE idobservacion=$idobservacion")or die ($mysqli->error);
  }
  if($ph!=''){
  $mysqli->query("UPDATE observacion SET ph='$ph' WHERE idobservacion=$idobservacion")or die ($mysqli->error);
  }
  if($nv!=''){
  $mysqli->query("UPDATE observacion SET nv='$nv' WHERE idobservacion=$idobservacion")or die ($mysqli->error);
  }

  $_SESSION['message'] = "Se editaron correctamente los datos del usuario";
  $_SESSION['msg_type'] = "success";

  header('location: ..\manuales.php');
}

?>
