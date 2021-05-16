<?php

	$con = mysqli_connect('localhost','id10329761_alonso','123456','id10329761_invernadero')

	or die("Error al conectar con la base de datos");

	$t=rand(20,25);
	$h=rand(65,70);
	$ti=rand(65,70);
	

    $sql = "INSERT INTO `tiemporeal` (`huminver`,`temp`,`tierra`,`fecha`,`hora`) VALUES ('$h','$t','$ti','".$_GET["fecha"]."','".$_GET["hora"]."');";

	

	$resultado = mysqli_query($con, $sql) or die ("Error al ejecutar el query");



	mysqli_close($con);



    echo "Datos agregados";	
    
?>