<?php 
require "controladores/log.php";
//session_start();
if(!isset($_SESSION['username'])){
  header("Location: index.php");
}
$us=$_SESSION['username'];
$access=$_SESSION['id'];
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
</head>
<?php
    include 'layouts/header.php'; 
?>

<body>
  <main role="main" class="container">
            <div class="my-3 p-3 bg-white rounded shadow-sm">
              <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Bienvenido: <?php echo $us; ?> </h4>
                          <?php
                $mysqli = new mysqli('localhost',"id10329761_alonso","123456","id10329761_invernadero") or die (mysqli_error($mysqli));
                $result = $mysqli->query("SELECT * FROM tiemporeal WHERE fecha = ( SELECT MAX(fecha) FROM tiemporeal ) AND hora = ( SELECT MAX(hora) FROM tiemporeal )") or die ($mysqli->error);
                  ?>
                  <hr>
                  <h6>Invernadero en tiempo real:</h6>
                  <hr>
                  <div class="table-responsive">
                    <table id="table1" class="table table-bordered table-hover">
                      <thead class="thead-dark">
                        <tr>
                          <th>Nivel de humedad de la tierra</th>
                          <th>Humedad del Invernadero</th>
                          <th>Temperatura</th>
                          <th>Fecha</th>
                          <th>Hora</th>
                        </tr>
                      </thead>
                      <tbody id="myTable">
                        <?php
                        while($row = $result->fetch_assoc()):?>
                        <tr>
                          <td><?php echo $row['tierra'];?></td>
                          <td><?php echo $row['huminver'];?></td>
                          <td><?php echo $row['temp'];?></td>
                          <td><?php echo $row['fecha'];?></td>
                          <td><?php echo $row['hora'];?></td>
                        </tr>
                      <?php endwhile; ?>
                    </tbody>
                  </table>
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
