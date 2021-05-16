<?php

	$con = mysqli_connect('localhost','id10329761_alonso','123456','id10329761_invernadero')

	or die("Error al conectar con la base de datos");

	
	$t=rand(20, 25);
	$h=rand(65, 70);
	$ti=rand(65, 70);
	
//	$sql = "INSERT INTO `prueba` (`temperatura`, `humedad`, `humedadtierra`, `fecha`) VALUES ('".$_GET["temperatura"]."', '".$_GET["humedad"]."', '".$_GET["humedadtierra"]."', '".$_GET["fecha"]."');";

    $sql = "INSERT INTO `registros` (`idregistro`,`temp`,`tierra`,`ph`,`nv`,`huminver`,`fecha`,`hora`) VALUES (null,'$t','$ti',null,null,'$h','".$_GET["fecha"]."','".$_GET["hora"]."');";

	

	$resultado = mysqli_query($con, $sql) or die ("Error al ejecutar el query");



	mysqli_close($con);



    echo "Datos agregados";	
    
?>