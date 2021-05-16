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
  <link rel="icon" type="image/svg" sizes="16x16" href="https://image.flaticon.com/icons/svg/1033/1033018.svg">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>

  
</head>
<body>
  <?php
  include 'layouts/header.php'
  ?>
  <main role="main" class="container">
    <div class="my-3 p-3 bg-white rounded shadow-sm">
      <br><br>
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Usuarios</h4>
                <br>
                 <?php
                        $mysqli = new mysqli('localhost',"id10329761_alonso","123456","id10329761_invernadero") or die (mysqli_error($mysqli));
                    $result = $mysqli->query("SELECT * FROM usuarios") or die ($mysqli->error);
                    ?>
                <div class="table-responsive">
                  <table id="table" class="table table-bordered table-hover ">
                    <thead class="thead-dark">
                      <tr>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Correo</th>
                        <th>Tipo de usuario</th>
                        <th colspan="2"> Realizar </th>
                      </tr>
                    </thead>
                    <tbody>
                         <?php
                      while($row = $result->fetch_assoc()):?>
                      <tr>
                        <?php if( $access==1): ?>
                          <td><?php echo $row['nom'];?></td>
                          <td><?php echo $row['appa'];?></td>
                          <td><?php echo $row['apma'];?></td>
                          <td><?php echo $row['correoe'];?></td>
                          <?php if ($row['idrol']==1): ?>
                            <td>Lider de proyecto</td>
                          <?php elseif ($row['idrol']==2):?>
                            <td>Administrador</td>
                          <?php else: ?>
                            <td>Becario</td>
                          <?php endif;?>
                          <td><a href="controlusuarios.php?edit=<?php echo $row['idusuarios'];?>" class="btn btn-info"><i class="fas fa-pen-square"></i> Editar</a>
                          <?php if ($access!=$row['idusuarios']):?>
                            <a href="controladores/proceso.php?borrar=<?php echo $row['idusuarios'];?>" class="btn btn-danger">Eliminar</a></td>
                            <?php endif;?>
                          <?php elseif($access==2): ?>
                            <?php if($row['idrol']==3): ?>
                              <td><?php echo $row['nom'];?></td>
                              <td><?php echo $row['appa'];?></td>
                              <td><?php echo $row['apma'];?></td>
                              <td><?php echo $row['correoe'];?></td>
                              <td>Becario</td>
                              <td><a href="controlusuarios.php?edit=<?php echo $row['idusuarios'];?>" class="btn btn-info"><i class="fas fa-pen-square"></i> Editar</a>
                                <a href="controladores/proceso.php.php?borrar=<?php echo $row['idusuarios'];?>" class="btn btn-danger">Eliminar</a></td>
                              <?php endif;?>
                            <?php endif; ?>
                          </tr>
                          <?php endwhile; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="my-3 p-3 bg-white rounded shadow-sm">
        <br><br>

        <div class="card">
          <div class="card-body">
            <?php
            require 'controladores/proceso.php';
            echo $f;
            ?>
            <?php
            include 'controladores/proceso.php'
            ?>
            <?php if ($actualizar == true):?>
              <h2>Editar datos del usuario</h2>
            <?php else: ?>
              <h2>Registrar Usuario</h2>
            <?php endif; ?>
            <form action="controladores/proceso.php" class="mt-5 mb-5 login-input" method="post">
              <input type="hidden" name="idusuarios" value="<?php echo $idusuarios; ?>">
              <div class="form-group">
                <input type="text" autocomplete="off" onkeypress="return validar(event)" name="nom" class="form-control" value="<?php echo $nom;?>" placeholder="Nombre" required />
              </div>
              <div class="form-group">
                <input type="text"autocomplete="off" onkeypress="return validar(event)" name="appa" value="<?php echo $appa;?>" class="form-control" placeholder="Apellido Paterno" required/>
              </div>
              <div class="form-group">
                <input type="text" autocomplete="off" onkeypress="return validar(event)" name="apma" value="<?php echo $apma;?>" class="form-control" placeholder="Apellido Materno" required/>
              </div>
              <?php if($actualizar!=0):?>
                <div class="form-group">
                  <input type="hidden" name="idrol" onkeypress="return validar(event)" value="<?php echo $idrol;?>" class="form-control" placeholder="idrol" disable required/>
                </div>
              <?php else: ?>
                <div class="form-group">
                  <select class="form-control" name="idrol">
                    <?php if($access==1): ?>
                      <option value="0">Seleccione el rol</option>
                      <option value="2">Administrador</option>
                      <option value="3">Becario</option>
                    <?php elseif ($access==2):?>
                      <option value="0">Seleccione el rol</option>
                      <option value="3">Becario</option>
                    <?php endif; ?>
                  </select>
                </div>
              <?php endif; ?>
              <?php if ($actualizar == true):?>
                <div class="form-group">
                  <input type="hidden"   class="form-control" name="correoe" value="<?php echo $correoe;?>" placeholder="correo" required/>
                </div>
              <?php else: ?>
                <div class="form-group">
                  <input type="email" autocomplete="off" onkeypress="return validar(event)" class="form-control" name="correoe" value="<?php echo $correoe;?>" placeholder="correo" required />
                </div>
              <?php endif; ?>
              <div class="form-group">
                <input type="password" name="contra" class="form-control" value="<?php echo $contra;?>" placeholder="contraseña" required/>
              </div>
              <?php if ($actualizar == true):?>
                <button type="submit" class="btn btn-info" name="editar">Editar</button>
              <?php else: ?>
                <button type="submit" class="btn btn-info" name="Guardar" />Guardar</button>
              <?php endif; ?>
            </form>
          </div>
        </div>
      </div>
    </main>
    
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <script type="text/javascript">
function validar(e) {
  tecla = (document.all) ? e.keyCode : e.which;
  patron =/[\x5C'"]/;
  te = String.fromCharCode(tecla);
  return !patron.test(te);
}
</script>

<script type="text/javascript">
$(document).ready( function () {
    $('#table').DataTable();
} );
</script>

</body>
</html>
