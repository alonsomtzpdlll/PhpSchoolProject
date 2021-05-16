<?php
require_once "controladores/log.php";
session_start();
$us=$_SESSION['username'];
$access=$_SESSION['id'];
if(!isset($us)){
  header("location: index.php");
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
  <link rel="icon" type="image/png" sizes="16x16" href="images/carnivorous-plant.png">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<?php
    include 'layouts/header.php'; 
?>
  <main role="main" class="container">

    <div class="my-3 p-3 bg-white rounded shadow-sm">
      <br><br>
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Reportes</h4>
                <br>
                <input class="form-control" id="myInput" type="text" placeholder="Buscar..">
                <br>
                <?php
                $mysqli = new mysqli('localhost',"id10329761_alonso","123456","id10329761_invernadero") or die (mysqli_error($mysqli));
                $result = $mysqli->query("SELECT observacion.iddplanta,observacion.ntrampas,observacion.crecimientoa,observacion.crecimientol,observacion.huminver,observacion.temp,observacion.tierra,observacion.ph,observacion.nv,observacion.fecha,observacion.hora,observacion.observacion,observacion.idobservacion,dplanta.iddplanta,dplanta.planta FROM observacion
                  INNER JOIN dplanta on dplanta.iddplanta = observacion.iddplanta") or die ($mysqli->error);
                  ?>
                  <div class="table-responsive">
                    <table id="table1" class="table table-bordered table-hover">
                      <thead class="thead-dark">
                        <tr>
                          <th>Planta</th>
                          <th>observacion</th>
                          <th>No. de trampas</th>
                          <th>Crecimiento (Alto)</th>
                          <th>Crecimiento (Ancho)</th>
                          <th>Humedad del Invernadero</th>
                          <th>Temperatura</th>
                          <th>Ph</th>
                          <th>Niv. Vitaminico</th>
                          <th>Fecha</th>
                          <th>Hora</th>
                          <th colspan="2"> Realizar </th>
                        </tr>
                      </thead>
                      <tbody id="myTable">
                        <?php
                        while($row = $result->fetch_assoc()):?>
                        <tr>
                          <td><?php echo $row['planta'];?></td>
                          <td><?php echo $row['observacion'];?></td>
                          <td><?php echo $row['ntrampas'];?></td>
                          <td><?php echo $row['crecimientoa'];?></td>
                          <td><?php echo $row['crecimientol'];?></td>
                          <td><?php echo $row['huminver'];?></td>
                          <td><?php echo $row['temp'];?></td>
                          <td><?php echo $row['ph'];?></td>
                          <td><?php echo $row['nv'];?></td>
                          <td><?php echo $row['fecha'];?></td>
                          <td><?php echo $row['hora'];?></td>
                          <td>
                            <div class="btn-group">
                              <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Opciones
                              </button>
                              <div class="dropdown-menu" >
                                <?php if ($row['observacion']==''):?>
                                  <a href="manuales.php?edit=<?php echo $row['idobservacion'];?>" class="dropdown-item"><i class="fas fa-pen-square"></i> Ingresar observacion</a>
                                <?php endif;?>
                                <?php if ($row['nv']==''):?>
                                  <a href="manuales.php?edit1=<?php echo $row['idobservacion'];?>" class="dropdown-item"><i class="fas fa-pen-square"></i> Ingresar Nivel Vitaminico</a>
                                <?php endif;?>
                                <?php if ($row['crecimientoa']==''):?>
                                  <a href="manuales.php?edit2=<?php echo $row['idobservacion'];?>" class="dropdown-item"><i class="fas fa-pen-square"></i> Crecimiento alto</a>
                                <?php endif;?>
                                <?php if ($row['crecimientol']==''):?>
                                  <a href="manuales.php?edit3=<?php echo $row['idobservacion'];?>" class="dropdown-item"><i class="fas fa-pen-square"></i> Crecimiento Ancho</a>
                                <?php endif;?>
                                <?php if ($row['ph']==''):?>
                                  <a href="manuales.php?edit4=<?php echo $row['idobservacion'];?>" class="dropdown-item"><i class="fas fa-pen-square"></i> PH</a>
                                <?php endif;?>
                                <?php if ($row['ntrampas']==''):?>
                                  <a href="manuales.php?edit5=<?php echo $row['idobservacion'];?>" class="dropdown-item"><i class="fas fa-pen-square"></i> No. trampas</a>
                                <?php endif;?>
                              </div>
                            </div>
                          </td>
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
    <div id="accordion">
      <div class="my-3 p-3 bg-white rounded shadow-sm">
        <div class="card">
          <div class="card-header">
            <?php 
            require_once "controladores/manualescrud.php";
            ?>
            <?php if($actualizar==0):?>
            <a class="card-link" data-toggle="collapse" href="#collapseOne">
              Registrar Observacion (Particular)
            </a>
            <?php elseif($actualizar==1):?>
            <a class="card-link" data-toggle="collapse" href="#collapseOne">
              Registrar Observacion
            </a>
          <?php elseif($actualizar==2):?>
            <a class="card-link" data-toggle="collapse" href="#collapseOne">
              Registrar Nivel Vitaminico
            </a>
          <?php elseif($actualizar==3):?>
            <a class="card-link" data-toggle="collapse" href="#collapseOne">
              Registrar Crecimiento Alto
            </a>
          <?php elseif($actualizar==4):?>
            <a class="card-link" data-toggle="collapse" href="#collapseOne">
              Registrar Crecimiento Largo
            </a>
          <?php elseif($actualizar==5):?>
            <a class="card-link" data-toggle="collapse" href="#collapseOne">
              PH
            </a>
          <?php elseif($actualizar==6):?>
            <a class="card-link" data-toggle="collapse" href="#collapseOne">
              Numero de Trampas
            </a>
          <?php endif;?>
        </div>
        <div id="collapseOne" class="collapse show" data-parent="#accordion">
          <div class="card-body">
            <form action="/controladores/manualescrud.php" class="mt-5 mb-5 login-input" method="post">
              <?php
              $mysqli = new mysqli('localhost',"id10329761_alonso","123456","id10329761_invernadero") or die (mysqli_error($mysqli));
              $result = $mysqli->query("SELECT * FROM dplanta") or die ($mysqli->error);
              ?>
              <?php if($actualizar==0): ?>
              <div class="form-group">
                <select class="custom-select" name="iddplanta">
                  <option selected>Seleccione la planta</option>
                  <?php
                  while($row = $result->fetch_assoc()):
                    ?>
                    <option value="<?php echo $row['iddplanta'];?>"><?php echo $row['planta'];?></option>
                  <?php endwhile;?>
                </select>
              </div>
              <?php endif;?>
              <div class="form-group">
                  <label>Observacion</label>
                <div class="input-group">
                  <textarea maxlength="50" name="observacion" value="<?php echo $observacion;?>" <?php if($actualizar==1 or $actualizar==0 ):?> <?php else:?> disabled <?php endif;?> onkeypress="return validar(event)" class="form-control" placeholder="Ingrese su observacion" aria-label="With textarea"></textarea>
                </div>
              </div>
              <div class="form-group">
                  <label>Numero de trampas</label>
                <input type="number" maxlength="2" name="ntrampas"  value="<?php echo $ntrampas;?>" <?php if($actualizar==6 or $actualizar==0 ):?> <?php else:?> disabled <?php endif;?> class="form-control" onkeypress="return validar(event)" placeholder="Numero de trampas" required max="9999" min="0" onKeyDown="if(this.value.length==2 && event.keyCode>47 && event.keyCode < 58)return false;"/>
              </div>
              <div class="form-group">
                  <label>Crecimiento a lo ancho (cm)</label>
                <input type="number" maxlength="2" name="crecimientoa"  value="<?php echo $crecimientoa;?>" <?php if($actualizar==3 or $actualizar==0 ):?> <?php else:?> disabled <?php endif;?>class="form-control" onkeypress="return validar(event)" placeholder="Crecimiento (Ancho)" required max="9999" min="0" onKeyDown="if(this.value.length==2 && event.keyCode>47 && event.keyCode < 58)return false;"/>
              </div>
              <div class="form-group">
                  <label>Crecimiento a lo largo en (cm)</label>
                <input type="number" maxlength="2" name="crecimientol" value="<?php echo $crecimientol;?>" <?php if($actualizar==4 or $actualizar==0 ):?> <?php else:?> disabled <?php endif;?> class="form-control" onkeypress="return validar(event)" placeholder="Crecimiento (Alto)" required max="9999" min="0" onKeyDown="if(this.value.length==2 && event.keyCode>47 && event.keyCode < 58)return false;"/>
              </div>
              <div class="form-group">
                  <label>Humedad del invernadero</label>
                <input type="number" maxlength="2" name="huminver" value="<?php echo $huminver;?>" <?php if($actualizar!=0):?> disabled <?php endif;?> class="form-control" onkeypress="return validar(event)" placeholder="Humedad del invernadero" required max="9999" min="0" onKeyDown="if(this.value.length==2 && event.keyCode>47 && event.keyCode < 58)return false;"/>
              </div>
              <div class="form-group">
                  <label>Temperatura</label>
                <input type="number" maxlength="2" name="temp" value="<?php echo $temp;?>" <?php if($actualizar!=0):?> disabled <?php endif;?> class="form-control" onkeypress="return validar(event)" placeholder="Temperatura" required max="9999" min="0" onKeyDown="if(this.value.length==2 && event.keyCode>47 && event.keyCode < 58)return false;"/>
              </div>
              <div class="form-group">
                  <label>Humedad de la tierra</label>
                <input type="number" maxlength="2" name="tierra" value="<?php echo $tierra;?>" <?php if($actualizar!=0):?> disabled <?php endif;?> class="form-control" onkeypress="return validar(event)" placeholder="Humedad de la tierra" required max="9999" min="0" onKeyDown="if(this.value.length==2 && event.keyCode>47 && event.keyCode < 58)return false;"/>
              </div>
              <div class="form-group">
                  <label>PH</label>
                <input type="number" maxlength="2" name="ph" value="<?php echo $ph;?>" <?php if($actualizar==5 or $actualizar==0 ):?> <?php else:?> disabled <?php endif;?>class="form-control" onkeypress="return validar(event)" placeholder="ph" required/>
              </div>
              <div class="form-group">
                  <label>Nivel Vitaminico</label>
                <input type="number" maxlength="2" name="nv" value="<?php echo $nv;?>" <?php if($actualizar==2 or $actualizar==0 ):?> <?php else:?> disabled <?php endif;?> class="form-control" onkeypress="return validar(event)" placeholder="Nivel vitaminico" required max="9999" min="0" onKeyDown="if(this.value.length==2 && event.keyCode>47 && event.keyCode < 58)return false;"/>
              </div>
              <?php if($actualizar!=0): ?>
              <div class="form-group">
                <input type="hidden" name="idobservacion" value="<?php echo $idobservacion; ?>">
              </div>
              <button type="submit" class="btn btn-info" name="editar">Editar</button>
              <?php else: ?>
              <button type="submit" class="btn btn-info" name="Guardar" />Guardar</button>
              <?php endif;?>
            </form>
          </div>
        </div>
      </div>
    </div>
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
<script type="text/javascript">
function validar(e) {
  tecla = (document.all) ? e.keyCode : e.which;
  patron =/[\x5C'"]/;
  te = String.fromCharCode(tecla);
  return !patron.test(te);
}
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
