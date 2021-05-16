<?php

	$con = mysqli_connect('localhost','id10329761_alonso','123456','id10329761_invernadero')

	or die("Error al conectar con la base de datos");


//	$sql = "INSERT INTO `prueba` (`temperatura`, `humedad`, `humedadtierra`, `fecha`) VALUES ('".$_GET["temperatura"]."', '".$_GET["humedad"]."', '".$_GET["humedadtierra"]."', '".$_GET["fecha"]."');";

    $sql = "INSERT INTO `alerta` (`idalerta`,`descripcion`,`huminver`,`temp`,`tierra`,`fecha`,`hora`) VALUES (null,'humedadinvernadero<60',50, 65,68,'".$_GET["fecha"]."','".$_GET["hora"]."');";

	

	$resultado = mysqli_query($con, $sql) or die ("Error al ejecutar el query");



	mysqli_close($con);



    echo "Datos agregados";	
    
?>