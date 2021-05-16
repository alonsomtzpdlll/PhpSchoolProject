<?php 
require "controladores/log.php";
session_start();
if(!isset($_SESSION['username'])){
  header("Location: index.php");
}else{
$us=$_SESSION['username'];
$access=$_SESSION['id'];
}

?>
<!DOCTYPE html>
<html lang="en">

                    <head>
                            <meta charset="utf-8">
                            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                            <meta name="viewport" content="width=device-width,initial-scale=1">
                            <title>Invernadero Proyecto</title>
                            <!-- Favicon icon -->
                            <link href="css/style.css" rel="stylesheet">
                            <link rel="icon" type="image/svg" sizes="16x16" href="https://image.flaticon.com/icons/svg/1033/1033018.svg">
                            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
                            <link href="style.css" rel="stylesheet">
                            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
                            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
                    </head>

                    <?php
                    require_once "controladores/log.php";
                    //session_start();
                    $us=$_SESSION['username'];
                    $access=$_SESSION['id'];
                    if(!isset($us)){
                      if($access>1){
                      header("location: login.php");
                      }
                    }

                    $appp=$_SESSION['ap1'];
                    $app=$_SESSION['ap2'];
                    $mals=$_SESSION['correoe'];
                    $psa=$_SESSION['contra'];
                    ?>

                    <?php
                    include 'layouts/header.php';
                    ?>
                    <body>
                      <main role="main" class="container">
                                <div class="my-3 p-3 bg-white rounded shadow-sm">
                                  <div class="container-fluid">

                                              <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title">Datos de la cuenta</h4>
                                                    <br>
                                                    <div class="form-validation">
                                                        <form class="form-valide" action="controladores/log.php" method="post">
                                                          <div class="form-group">
                                                          <input type="text" name="nomb" class="form-control" value="<?php echo $us;?>" placeholder="Nombre" required />
                                                          </div>
                                                          <div class="form-group">
                                                          <input type="text" name="appat" value="<?php echo $appp;?>" class="form-control" placeholder="Apellido Paterno" required/>
                                                          </div>
                                                          <div class="form-group">
                                                          <input type="text" name="apmat" value="<?php echo $app;?>" class="form-control" placeholder="Apellido Materno" required/>
                                                          </div>
                                                          <?php if($access==1):?>
                                                          <div class="form-group">
                                                          <input type="text" name="idrol1" value="Lider de proyecto" class="form-control" placeholder="idrol" required disabled/>
                                                          </div>
                                                          <?php elseif($access==2):?>
                                                          <div class="form-group">
                                                          <input type="text" name="idrol1" value="Administrador" class="form-control" placeholder="idrol" required disabled/>
                                                          </div>
                                                          <?php elseif($access==3):?>
                                                          <div class="form-group">
                                                          <input type="text" name="idrol1" value="Becario" class="form-control" placeholder="idrol" required disabled/>
                                                          </div>
                                                          <?php endif;?>
                                                          <div class="form-group">
                                                          <input type="email1"  class="form-control" name="correoe" value="<?php echo $mals;?>" placeholder="correo" disabled/>
                                                          </div>
                                                          <div class="form-group">
                                                          <input type="password" name="contra1" class="form-control" value="<?php echo $psa;?>" placeholder="contraseña" required/>
                                                          </div>
                                                            <div class="form-group row">
                                                                <div class="col-lg-8 ml-auto">
                                                                    <button type="submit" class="btn btn-primary" name="actualizar">Guardar</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                </div>
                              </main>

                                  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                                  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
                                  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

                    </body>

                    </html>
