<?php 
require_once "controladores/log.php";
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
        <link rel="icon" type="image/png" sizes="16x16" href="images/carnivorous-plant.png">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link href="css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>

</head>
<?php 
include "layouts/header.php";
?>

<body>
<main role="main" class="container">
  <div id="accordion">
      <div class="my-3 p-3 bg-white rounded shadow-sm">
        <div class="card">
          <div class="card-header">
            <a class="card-link" data-toggle="collapse" href="#collapseOne">
              Reportes por dia:
            </a>
          </div>
          <div id="collapseOne" class="collapse show" data-parent="#accordion">
            <div class="card-body">
              <form class="" action="" method="post">
                <br><div class="well">
                  <div class="form-group">
                    <label>Fecha</label>
                    <input type="date" class="form-control" name="fechainicio" placeholder="Date of Birth">
                  </div>
                </div>
                <button type="submit" class="btn btn-success" name="busq" />Buscar</button>
              </form>

              <?php
              $var=$_POST['fechainicio'];
              $mysqli = new mysqli('localhost',"id10329761_alonso","123456","id10329761_invernadero") or die (mysqli_error($mysqli));
              if(isset($_POST['busq'])){
                if(!empty($var)){
                  $result = $mysqli->query("SELECT AVG(huminc) as Promedio_humedad ,AVG(tempc) as Promedio_Temperatura ,AVG(tierrac) as Promedio_humedadTierra, AVG(phc) as Promedio_pH,AVG(nvc) as Promedio_NivelVitaminico,Fecha FROM copiaestudio WHERE Fecha='$var'") or die ($mysqli->error);
                  header("location: index.php");
                }
                }
                ?>

              <br>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Resultado:</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                      <td>
                          <?php
                        while($row = $result->fetch_assoc()):
                        ?>
                        <br>
                        <label>Fecha: <?php echo $row['Fecha'];?></label>
                        <br>
                        <label >Promedio de Temperatura:   </label>
                        <div class="progress">
                          <div class="progress-bar bg-success" role="progressbar" style="width:<?php echo $row['Promedio_Temperatura'];?>%;" aria-valuenow="<?php echo $row['Promedio_Temperatura'];?>" aria-valuemin="0" aria-valuemax="100"><?php echo $row['Promedio_Temperatura'];?></div>
                        </div>
                        <label >Promedio de Humedad:   </label>
                        <div class="progress">
                          <div class="progress-bar bg-success" role="progressbar" style="width:<?php echo $row['Promedio_humedad'];?>%;" aria-valuenow="<?php echo $row['Promedio_humedad'];?>" aria-valuemin="0" aria-valuemax="100"><?php echo $row['Promedio_humedad'];?></div>
                        </div>
                        <label >Promedio del PH </label>
                        <div class="progress">
                          <div class="progress-bar bg-success" role="progressbar" style="width:<?php echo $row['Promedio_pH'];?>%;" aria-valuenow="<?php echo $row['Promedio_pH'];?>" aria-valuemin="0" aria-valuemax="100"><?php echo $row['Promedio_pH'];?></div>
                        </div>
                        <label >Promedio del Nivel Vitaminico </label>
                        <div class="progress">
                          <div class="progress-bar bg-success" role="progressbar" style="width:<?php echo $row['Promedio_NivelVitaminico'];?>%;" aria-valuenow="<?php echo $row['Promedio_NivelVitaminico'];?>" aria-valuemin="0" aria-valuemax="100"><?php echo $row['Promedio_NivelVitaminico'];?></div>
                        </div>
                        <label >Promedio de la la humedad de la tierra </label>
                        <div class="progress">
                          <div class="progress-bar bg-success" role="progressbar" style="width:<?php echo $row['Promedio_humedadTierra'];?>%;" aria-valuenow="<?php echo $row['Promedio_humedadTierra'];?>" aria-valuemin="0" aria-valuemax="100"><?php echo $row['Promedio_humedadTierra'];?></div>
                        </div>
                        <?php endwhile;?>
                        </td>
                    </tr>
                  </tbody>
                </table>
                 <?php
              $var=$_POST['fechainicio'];
              $mysqli = new mysqli('localhost',"id10329761_alonso","123456","id10329761_invernadero") or die (mysqli_error($mysqli));
              if(isset($_POST['busq'])){
                if(!empty($var)){
                  $result = $mysqli->query("SELECT * FROM registros WHERE Fecha='$var'") or die ($mysqli->error);
                  header("location: index.php");
                }
                }
                ?>
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Temperatura</th>
                        <th scope="col">Humedad de la tierra</th>
                        <th scope="col">Humedad del invernadero</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">hora</th>
                      </tr>
                    </thead>
                    <tbody>
                         <?php
                        while($row = $result->fetch_assoc()):
                        ?>
                      <tr>
                        <td><?php echo $row['temp']?></td>
                        <td><?php echo $row['tierra']?></td>
                        <td><?php echo $row['huminver']?></td>
                        <td><?php echo $row['fecha']?></td>
                        <td><?php echo $row['hora']?></td>
                      </tr>
                      <?php endwhile;?>
                    </tbody>
                  </table>
                   <?php
              $var=$_POST['fechainicio'];
              $mysqli = new mysqli('localhost',"id10329761_alonso","123456","id10329761_invernadero") or die (mysqli_error($mysqli));
              if(isset($_POST['busq'])){
                if(!empty($var)){
                  $result = $mysqli->query("SELECT * FROM registros WHERE Fecha='$var'") or die ($mysqli->error);
                  header("location: index.php");
                  $js = [];
                  $js2= [];
                  $js3=[];
                  $js4=[];
                  if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()){
                              extract($row);
                              $js[]=$hora;
                              $js2[]=(float)$huminver;
                              $js3[]=(float)$temp;
                              $js4[]=(float)$tierra;
                          }
                      }
                }
                }
                ?>
                    <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
                      <div class="carousel-inner">
                        <div class="carousel-item active" data-interval="false">
                          <canvas id="myChart" ></canvas>
                        </div>
                        <div class="carousel-item" data-interval="false">
                          <canvas id="myChart1" ></canvas>
                        </div>
                        <div class="carousel-item" data-interval="false">
                         <canvas id="myChart2" ></canvas>
                        </div>
                      </div>
                      <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                     </div>
              </div>
            </div>
          </div>
        </div>

    <div class="my-3 p-3 bg-white rounded shadow-sm">
          <div class="card">
            <div class="card-header">
              <a class="card-link" data-toggle="collapse" href="#collapseTwo">
                Reporte por Semana:
              </a>
            </div>
            <div id="collapseTwo" class="collapse show" data-parent="#accordion">
              <div class="card-body">
                <form class="" action="" method="post">
                  <br>
                  <select class="form-control" name="sm">
                    <option value="1">Esta semana</option>
                    <option value="2">Semana Anterior</option>
                    <option value="3">2 Semanas Antes</option>
                    <option value="4">3 Semanas antes</option>
                  </select>
                  <br>
                  <button type="submit" class="btn btn-success" name="busqs" />Buscar</button>
                </form>

                <?php
                $var1=$_POST['sm'];
                $mysqli = new mysqli('localhost',"id10329761_alonso","123456","id10329761_invernadero") or die (mysqli_error($mysqli));
                if(isset($_POST['busqs'])){
                  if($var1==1){
                    $result = $mysqli->query("SELECT AVG(huminc) as Promedio_humedad ,AVG(tempc) as Promedio_Temperatura ,AVG(tierrac) as Promedio_humedadTierra, AVG(phc) as Promedio_pH,AVG(nvc) as Promedio_NivelVitaminico,Fecha FROM copiaestudio WHERE YEARWEEK(Fecha) = YEARWEEK(CURDATE())") or die ($mysqli->error);
                    header("location: index.php");
                  }
                  elseif($var1==2){
                    $result = $mysqli->query("SELECT AVG(huminc) as Promedio_humedad ,AVG(tempc) as Promedio_Temperatura ,AVG(tierrac) as Promedio_humedadTierra, AVG(phc) as Promedio_pH,AVG(nvc) as Promedio_NivelVitaminico,Fecha FROM copiaestudio WHERE Fecha >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY AND Fecha < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY;") or die ($mysqli->error);
                    header("location: index.php");
                  }elseif($var2==3){
                    $result = $mysqli->query("SELECT AVG(huminc) as Promedio_humedad ,AVG(tempc) as Promedio_Temperatura ,AVG(tierrac) as Promedio_humedadTierra, AVG(phc) as Promedio_pH,AVG(nvc) as Promedio_NivelVitaminico,Fecha FROM copiaestudio WHERE Fecha BETWEEN date_sub(now(),INTERVAL 2 WEEK) and now();") or die ($mysqli->error);
                    header("location: index.php");
                  }elseif ($var2==4) {
                    $result = $mysqli->query("SELECT AVG(huminc) as Promedio_humedad ,AVG(tempc) as Promedio_Temperatura ,AVG(tierrac) as Promedio_humedadTierra, AVG(phc) as Promedio_pH,AVG(nvc) as Promedio_NivelVitaminico,Fecha FROM copiaestudio WHERE Fecha BETWEEN date_sub(now(),INTERVAL 3 WEEK) and now();") or die ($mysqli->error);
                    header("location: index.php");
                  }
                }
                ?>
                <br>
                <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Resultado:</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                      <td>
                           <?php
                        while($row = $result->fetch_assoc()):
                        ?>
                        <br>                        
                        <label >Promedio de Temperatura:   </label>
                        <div class="progress">
                          <div class="progress-bar bg-success" role="progressbar" style="width:<?php echo $row['Promedio_Temperatura'];?>%;" aria-valuenow="<?php echo $row['Promedio_Temperatura'];?>" aria-valuemin="0" aria-valuemax="100"><?php echo $row['Promedio_Temperatura'];?></div>
                        </div>
                        <label >Promedio de Humedad:   </label>
                        <div class="progress">
                          <div class="progress-bar bg-success" role="progressbar" style="width:<?php echo $row['Promedio_humedad'];?>%;" aria-valuenow="<?php echo $row['Promedio_humedad'];?>" aria-valuemin="0" aria-valuemax="100"><?php echo $row['Promedio_humedad'];?></div>
                        </div>
                        <label >Promedio del PH </label>
                        <div class="progress">
                          <div class="progress-bar bg-success" role="progressbar" style="width:<?php echo $row['Promedio_pH'];?>%;" aria-valuenow="<?php echo $row['Promedio_pH'];?>" aria-valuemin="0" aria-valuemax="100"><?php echo $row['Promedio_pH'];?></div>
                        </div>
                        <label >Promedio del Nivel Vitaminico </label>
                        <div class="progress">
                          <div class="progress-bar bg-success" role="progressbar" style="width:<?php echo $row['Promedio_NivelVitaminico'];?>%;" aria-valuenow="<?php echo $row['Promedio_NivelVitaminico'];?>" aria-valuemin="0" aria-valuemax="100"><?php echo $row['Promedio_NivelVitaminico'];?></div>
                        </div>
                        <label >Promedio de la la humedad de la tierra </label>
                        <div class="progress">
                          <div class="progress-bar bg-success" role="progressbar" style="width:<?php echo $row['Promedio_humedadTierra'];?>%;" aria-valuenow="<?php echo $row['Promedio_humedadTierra'];?>" aria-valuemin="0" aria-valuemax="100"><?php echo $row['Promedio_humedadTierra'];?></div>
                        </div>
                        <?php endwhile;?>
                        </td>
                    </tr>
                  </tbody>
                </table>
                   <?php
                $var1=$_POST['sm'];
                $mysqli = new mysqli('localhost',"id10329761_alonso","123456","id10329761_invernadero") or die (mysqli_error($mysqli));
                if(isset($_POST['busqs'])){
                  if($var1==1){
                    $result = $mysqli->query("SELECT * FROM registros WHERE YEARWEEK(fecha) = YEARWEEK(CURDATE())") or die ($mysqli->error);
                    header("location: index.php");
                  }
                  elseif($var1==2){
                    $result = $mysqli->query("SELECT * FROM registros WHERE Fecha >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY AND Fecha < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY;") or die ($mysqli->error);
                    header("location: index.php");
                  }elseif($var2==3){
                    $result = $mysqli->query("SELECT * FROM registros WHERE Fecha BETWEEN date_sub(now(),INTERVAL 2 WEEK) and now();") or die ($mysqli->error);
                    header("location: index.php");
                  }elseif ($var2==4) {
                    $result = $mysqli->query("SELECT * FROM registros WHERE Fecha BETWEEN date_sub(now(),INTERVAL 3 WEEK) and now();") or die ($mysqli->error);
                    header("location: index.php");
                  }
                }
                ?>
                  <table id="example" class="table">
                    <thead>
                      <tr>
                        <th scope="col">Temperatura</th>
                        <th scope="col">Humedad de la tierra</th>
                        <th scope="col">Humedad del invernadero</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">hora</th>
                      </tr>
                    </thead>
                    <tbody>
                         <?php
                        while($row = $result->fetch_assoc()):
                        ?>
                      <tr>
                        <td><?php echo $row['temp']?></td>
                        <td><?php echo $row['tierra']?></td>
                        <td><?php echo $row['huminver']?></td>
                        <td><?php echo $row['fecha']?></td>
                        <td><?php echo $row['hora']?></td>
                      </tr>
                      <?php endwhile;?>
                    </tbody>
                  </table>
                   <?php
                    $var1=$_POST['sm'];
                    $mysqli = new mysqli('localhost',"id10329761_alonso","123456","id10329761_invernadero") or die (mysqli_error($mysqli));
                if(isset($_POST['busqs'])){
                  if($var1==1){
                    $result = $mysqli->query("SELECT * FROM registros WHERE YEARWEEK(fecha) = YEARWEEK(CURDATE())") or die ($mysqli->error);
                    header("location: index.php");
                    $js = [];
                  $js2= [];
                  $js3=[];
                  $js4=[];
                  if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()){
                              extract($row);
                              $js[]=$hora;
                              $js2[]=(float)$huminver;
                              $js3[]=(float)$temp;
                              $js4[]=(float)$tierra;
                          }
                      }
                  }
                  elseif($var1==2){
                    $result = $mysqli->query("SELECT * FROM registros WHERE Fecha >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY AND Fecha < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY;") or die ($mysqli->error);
                    header("location: index.php");
                    $js = [];
                  $js2= [];
                  $js3=[];
                  $js4=[];
                  if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()){
                              extract($row);
                              $js[]=$fecha;
                              $js2[]=(float)$huminver;
                              $js3[]=(float)$temp;
                              $js4[]=(float)$tierra;
                          }
                      } 
                  }elseif($var2==3){
                    $result = $mysqli->query("SELECT * FROM registros WHERE Fecha BETWEEN date_sub(now(),INTERVAL 2 WEEK) and now();") or die ($mysqli->error);
                    header("location: index.php");
                    $js = [];
                  $js2= [];
                  $js3=[];
                  $js4=[];
                  if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()){
                              extract($row);
                              $js[]=$fecha;
                              $js2[]=(float)$huminver;
                              $js3[]=(float)$temp;
                              $js4[]=(float)$tierra;
                          }
                      }
                  }elseif ($var2==4) {
                    $result = $mysqli->query("SELECT * FROM registros WHERE Fecha BETWEEN date_sub(now(),INTERVAL 3 WEEK) and now();") or die ($mysqli->error);
                    header("location: index.php");$js = [];
                  $js2= [];
                  $js3=[];
                  $js4=[];
                  if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()){
                              extract($row);
                              $js[]=$fecha;
                              $js2[]=(float)$huminver;
                              $js3[]=(float)$temp;
                              $js4[]=(float)$tierra;
                          }
                      } 
                  }
                }
                ?>
                    <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
                      <div class="carousel-inner">
                        <div class="carousel-item active" data-interval="false">
                          <canvas id="myChart" ></canvas>
                        </div>
                        <div class="carousel-item" data-interval="false">
                          <canvas id="myChart1" ></canvas>
                        </div>
                        <div class="carousel-item" data-interval="false">
                         <canvas id="myChart2" ></canvas>
                        </div>
                      </div>
                      <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                </div>
              </div>
            </div>
          </div>

          <div class="my-3 p-3 bg-white rounded shadow-sm">
            <div class="card">
              <div class="card-header">
                <a class="card-link" data-toggle="collapse" href="#collapseT">
                  Reporte por Mes:
                </a>
              </div>
              <div id="collapseT" class="collapse show" data-parent="#accordion">
                <div class="card-body">
                  <form class="" action="" method="post">
                    <br>
                    <div class="form-group">
                        <span>
                            <label for="month">Month:</label>
                            <select class="custom-select" id="month" name="ms">
                              <option value="1"selected>Enero</option>
                              <option value="2">Febrero</option>
                              <option value="3">Marzo</option>
                              <option value="4">Abril</option>
                              <option value="5">Mayo</option>
                              <option value="6">Junio</option>
                              <option value="7">Julio</option>
                              <option value="8">Agosto</option>
                              <option value="9">Septiembrer</option>
                              <option value="10">Octubre</option>
                              <option value="11">Noviembre</option>
                              <option value="12">Diciembre</option>
                            </select>
                          </span>
                    </div>
                    <div class="form-group">
                        <span>
                            <label for="month1">Año:</label>
                            <select id="month1" class="custom-select" name="anio">
                              <option value="2019"selected>2019</option>
                              <option value="2020">2020</option>
                              <option value="2021">2021</option>
                            </select>
                          </span>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success" name="busqm" />Buscar</button>
                  </form>

                  <?php
                  $var2=$_POST['ms'];
                  $var3=$_POST['anio'];
                  $mysqli = new mysqli('localhost',"id10329761_alonso","123456","id10329761_invernadero") or die (mysqli_error($mysqli));
                  if(isset($_POST['busqm'])){
                    if($var2!=0 and $var3!=0){
                      $result = $mysqli->query("SELECT AVG(huminc) as Promedio_humedad ,AVG(tempc) as Promedio_Temperatura ,AVG(tierrac) as Promedio_humedadTierra, AVG(phc) as Promedio_pH,AVG(nvc) as Promedio_NivelVitaminico,Fecha FROM copiaestudio WHERE MONTH(Fecha) = '$var2' AND YEAR(Fecha)= '$var3' ") or die ($mysqli->error);
                      header("location: index.php");
                    }
                      
                  }?>

                  <br>
                <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Resultado:</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                      <td>
                        <?php while($row = $result->fetch_assoc()):?>
                        <label >Promedio de Temperatura:   </label>
                        <div class="progress">
                          <div class="progress-bar bg-success" role="progressbar" style="width:<?php echo $row['Promedio_Temperatura'];?>%;" aria-valuenow="<?php echo $row['Promedio_Temperatura'];?>" aria-valuemin="0" aria-valuemax="100"><?php echo $row['Promedio_Temperatura'];?></div>
                        </div>
                        <label >Promedio de Humedad:   </label>
                        <div class="progress">
                          <div class="progress-bar bg-success" role="progressbar" style="width:<?php echo $row['Promedio_humedad'];?>%;" aria-valuenow="<?php echo $row['Promedio_humedad'];?>" aria-valuemin="0" aria-valuemax="100"><?php echo $row['Promedio_humedad'];?></div>
                        </div>
                        <label >Promedio del PH </label>
                        <div class="progress">
                          <div class="progress-bar bg-success" role="progressbar" style="width:<?php echo $row['Promedio_pH'];?>%;" aria-valuenow="<?php echo $row['Promedio_pH'];?>" aria-valuemin="0" aria-valuemax="100"><?php echo $row['Promedio_pH'];?></div>
                        </div>
                        <label >Promedio del Nivel Vitaminico </label>
                        <div class="progress">
                          <div class="progress-bar bg-success" role="progressbar" style="width:<?php echo $row['Promedio_NivelVitaminico'];?>%;" aria-valuenow="<?php echo $row['Promedio_NivelVitaminico'];?>" aria-valuemin="0" aria-valuemax="100"><?php echo $row['Promedio_NivelVitaminico'];?></div>
                        </div>
                        <label >Promedio de la la humedad de la tierra </label>
                        <div class="progress">
                          <div class="progress-bar bg-success" role="progressbar" style="width:<?php echo $row['Promedio_humedadTierra'];?>%;" aria-valuenow="<?php echo $row['Promedio_humedadTierra'];?>" aria-valuemin="0" aria-valuemax="100"><?php echo $row['Promedio_humedadTierra'];?></div>
                        </div>
                         <?php endwhile;?>
                        </td>
                    </tr>
                  </tbody>
                </table>
                  <?php
              $mysqli = new mysqli('localhost',"id10329761_alonso","123456","id10329761_invernadero") or die (mysqli_error($mysqli));
              if(isset($_POST['busqm'])){
                 $var2=$_POST['ms'];
                  $var3=$_POST['anio'];
                if($var2!=0 and $var3!=0){
                  $result = $mysqli->query("SELECT * FROM registros WHERE MONTH(fecha) = '$var2' AND YEAR(fecha)= '$var3'") or die ($mysqli->error);
                  header("location: index.php");
                  $js = [];
                  $js2= [];
                  $js3=[];
                  $js4=[];
                  if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()){
                              extract($row);
                              $js[]=$fecha;
                              $js2[]=(float)$huminver;
                              $js3[]=(float)$temp;
                              $js4[]=(float)$tierra;
                          }
                      }
                    }
                }
                ?>
                        <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
                          <div class="carousel-inner">
                            <div class="carousel-item active" data-interval="false">
                              <canvas id="myChart" ></canvas>
                            </div>
                            <div class="carousel-item" data-interval="false">
                              <canvas id="myChart1" ></canvas>
                            </div>
                            <div class="carousel-item" data-interval="false">
                             <canvas id="myChart2" ></canvas>
                            </div>
                          </div>
                          <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                          </a>
                        </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </main>
          
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <script type="text/javascript" href="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
    <script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
  });
  </script>
    <script>
                  var ctx= document.getElementById("myChart").getContext("2d");
                  var myChart= new Chart(ctx,{
                      type:"line",
                      data:{
                          labels:<?php echo json_encode($js);?>,
                          datasets:[{
                                  label:'Humedad del Invernadero',
                                  data:<?php echo json_encode($js2); ?>,
                                  backgroundColor:[
                                      'rgb(66, 134, 244,0.5)',
                                      'rgb(74, 135, 72,0.5)',
                                      'rgb(229, 89, 50,0.5)'
                                  ]
                          }]
                      },
                      options:{
                          scales:{
                              yAxes:[{
                                      ticks:{
                                          beginAtZero:true
                                      }
                              }]
                          }
                      }
                  });
              </script>
              <script>
                      var ctx= document.getElementById("myChart1").getContext("2d");
                      var myChart= new Chart(ctx,{
                          type:"line",
                          data:{
                              labels:<?php echo json_encode($js); ?>,
                              datasets:[{
                                      label:'Temperatura',
                                      data:<?php echo json_encode($js3); ?>,
                                      backgroundColor:[
                                          'rgb(229, 89, 50,0.5)',
                                          'rgb(74, 135, 72,0.5)',
                                          'rgb(229, 89, 50,0.5)'
                                      ]
                              }]
                          },
                          options:{
                              scales:{
                                  yAxes:[{
                                          ticks:{
                                              beginAtZero:true
                                          }
                                  }]
                              }
                          }
                      });
                  </script>
                  <script>
                      var ctx= document.getElementById("myChart2").getContext("2d");
                      var myChart= new Chart(ctx,{
                          type:"line",
                          data:{
                              labels:<?php echo json_encode($js); ?>,
                              datasets:[{
                                      label:'Humedad de la tierra',
                                      data:<?php echo json_encode($js4); ?>,
                                      backgroundColor:[
                                          'rgb(74, 135, 72,0.5)',
                                          'rgb(74, 135, 72,0.5)',
                                          'rgb(229, 89, 50,0.5)'
                                      ]
                              }]
                          },
                          options:{
                              scales:{
                                  yAxes:[{
                                          ticks:{
                                              beginAtZero:true
                                          }
                                  }]
                              }
                          }
                      });
                  </script>
</html>
