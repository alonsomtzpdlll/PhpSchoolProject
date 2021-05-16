<?php

	$con = mysqli_connect('localhost','id10329761_root','123456','id10329761_prueba')

	or die("Error al conectar con la base de datos");

	
//	$sql = "INSERT INTO `prueba` (`temperatura`, `humedad`, `humedadtierra`, `fecha`) VALUES ('".$_GET["temperatura"]."', '".$_GET["humedad"]."', '".$_GET["humedadtierra"]."', '".$_GET["fecha"]."');";

    $sql = "INSERT INTO `prueba` (`valores`) VALUES ('".$_GET["valor"]."');";

	

	$resultado = mysqli_query($con, $sql) or die ("Error al ejecutar el query");



	mysqli_close($con);



    echo "Datos agregados";	
    
?>