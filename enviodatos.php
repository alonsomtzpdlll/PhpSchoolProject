<?php
    // iot.php
    // Importamos la configuración
    $dbhost = "localhost";
    $dbuser = "id10329761_alonso";
    $dbpass = "proyecto";
    $dbname = "id10329761_invernadero";
    $valor3 = null;
    // Conexión con la base de datos
    $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    // Leemos los valores que nos llegan por GET
    $valor = mysqli_real_escape_string($con, $_GET['valor']);
    $valor1 = mysqli_real_escape_string($con, $_GET['valor1']);
    // Esta es la instrucción para insertar los valores
    $query = "INSERT INTO registros VALUES('".$valo3."',".$valor1.",".$valor.",".$valor3.",".$valor3.".',".$valor1.")";
    // Ejecutamos la instrucción
    mysqli_query($con, $query);
    mysqli_close($con);
?>