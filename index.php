<?php
    require_once 'controladores/log.php';
    echo $incorrecto;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Invernadero Proyecto</title>
    <link href="css/style.css" rel="stylesheet">
    <link rel="icon" type="image/svg" sizes="16x16" href="https://image.flaticon.com/icons/svg/1033/1033018.svg">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4d+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<?php
    include 'layouts/header.php'; 
?>
      <div class="row">
        <div class="col-md-4 mx-auto" >
            <div class="card mt-4 text-center">
                <div class="card-header">
                    <h1>Inicio de Sesion</h1>
                </div>
                <!-- podemos meter imagen aqui-->
                <!--  si cremos una carpeta del public llamada images-->
                <!--<img src="" class="" alt="logo mamalon"> -->
                <div class="card-body">
                  <form  autocomplete="off" class="col-md-6 offset-md-3" action="/controladores/log.php" method="post">
                      <div class="form-group">
                          <label for="exampleInputEmail1"><i class="fas fa-user-alt"></i>Correo</label>
                          <input autocomplete="off" type="email" class="form-control" name="correoe" placeholder="Email" >
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1"><i class="fas fa-key"></i>Password</label>
                          <input type="password" class="form-control" name="contra" placeholder="Password">
                      </div>
                      <button class="btn login-form__btn" type="submit" name="login" > <i class="fa fa-sign-in"></i> Iniciar Sesion</button>
                  </form>

                </div>
            </div>
        </div>
    </div>
</body>
</html>
