<?php

    $response = array();
    $user = $_POST['Usuario'];

	$con = mysqli_connect('localhost','id10329761_alonso','123456','id10329761_invernadero')

	or die("Error al conectar con la base de datos");

    $result = mysqli_query("SELECT usuarios.correoe from usuarios where usuarios.correoe = '{$user}'") or die (mysql_error());

    if(mysql_num_rows($result) > 0){

        $response["success"] = 1;

        echo json_encode($response);
    }else{
        $response["success"] = 0;

        echo json_encode($response);

    }

	mysqli_close($con);



    echo "Datos agregados";	
    
?>