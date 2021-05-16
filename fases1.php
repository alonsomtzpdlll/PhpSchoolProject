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
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Invernadero Proyecto</title>
  <link href="css/style.css" rel="stylesheet">
  <link rel="icon" type="image/svg" sizes="16x16" href="https://image.flaticon.com/icons/svg/1033/1033018.svg">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
  <?php 
  include "layouts/header.php"
  ?>
  
  <main role="main" class="container">
    <div class="my-3 p-3 bg-white rounded shadow-sm">
      <br><br>
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Fases del estudio</h4>
                <br>
                <input class="form-control" id="myInput" type="text" placeholder="Buscar..">
                <br>
                <?php
                $mysqli = new mysqli('localhost',"id10329761_alonso","123456","id10329761_invernadero") or die (mysqli_error($mysqli));
                $result = $mysqli->query("SELECT * FROM fases") or die ($mysqli->error);
                ?>
                <div class="table-responsive">
                  <table id="example" class="table table-bordered table-hover">
                    <thead class="thead-dark">
                      <tr>
                        <th>Descripcion de la Fase</th>
                        <th>Fecha de Inicio</th>
                        <th>Fecha de termino</th>
                        <th colspan="2"> Realizar </th>
                      </tr>
                    </thead>
                    <tbody id="myTable">
                      <?php
                      while($row = $result->fetch_assoc()):?>
                      <tr>
                        <td><?php echo $row['fases'];?></td>
                        <td><?php echo $row['fechainicio'];?></td>
                        <td><?php echo $row['fechafinal'];?></td>
                        <td><a href="fases1.php?edit=<?php echo $row['idfases'];?>" class="btn btn-info">Editar Fase</a>
                          <a href="controladores/fasescrud.php?borrar=<?php echo $row['idfases'];?>" class="btn btn-danger">Eliminar Fase</a></td>
                        </tr>
                      <?php endwhile; ?>
                    </tbody>
                    <tfoot>
                      
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <br><br>
      </div>
    </div>
    <div class="my-3 p-3 bg-white rounded shadow-sm">
      <br>
      
      <div class="card">
        <div class="card-body">
          <?php require_once "controladores/fasescrud.php"?>
          <?php if ($actualizar == true):?>
            <h4 class="card-title">Editar Fecha de incio de la fase</h4>
          <?php else: ?>
            <h4 class="card-title">Registrar Nueva Fase</h4>
          <?php endif; ?>
          <form action="controladores/fasescrud.php" class="mt-5 mb-5 login-input" method="post">
            <input type="hidden" name="idfases" value="<?php echo $idfases; ?>">
            <div class="form-group">
              <input type="text" name="fases" autocomplete="off" onkeypress="return validar(event)" class="form-control" value="<?php echo $fases;?>" placeholder="Descripcion de la fase" required />
            </div>
            <div class="form-group">
              <div class="well">
                <div class="form-group">
                  <label>Fecha de inicio</label>
                  <input type="date" class="form-control" value="<?php echo $fechainicio;?>" name="fechainicio" placeholder="Date of Birth">
                </div>
              </div>
              <div class="well">
              </div>
            </div>
            <div class="form-group">
              <div class="well">
                <div class="form-group">
                  <label>Fecha de Final</label>
                  <input type="date" class="form-control"  value="<?php echo $fechafinal;?>" name="fechafinal" placeholder="Date of Birth">
                </div>
              </div>
              <div class="well">
              </div>
            </div>
            <?php if ($actualizar == true):?>
              <button type="submit" class="btn btn-info" name="editar">Editar</button>
            <?php else: ?>
              <button type="submit" class="btn btn-info" name="Guardar" />Guardar</button>
            <?php endif; ?>
          </form>
        </div>
      </div>
      
      <br>
    </div>
  </main>
     <script>
    $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
  </script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
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
</body>
</html>
