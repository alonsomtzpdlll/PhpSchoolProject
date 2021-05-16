<?php
error_reporting(0);
if($access==0 or !isset($access)):
?>
  <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #e3f2fd;">
    <div class="container">
      <a class="navbar-brand mx-auto" href="/index.php"><img src="https://image.flaticon.com/icons/svg/528/528099.svg" width="40" height="40"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    </div>
  </nav>
<?php else:?>
  <nav class="navbar navbar-expand-lg navbar-light bg-light " style="background-color: #e3f2fd;">
    <div class="container">
      <a class="navbar-brand" href="..\welcome.php"><img src="https://image.flaticon.com/icons/svg/528/528099.svg" width="40" height="40"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ">
        <?php if($access<3):?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-users"></i> Usuarios
              </a>
                <div class="dropdown-menu dropdown-menu- animate slideIn" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="..\controlusuarios.php">Gestionar Usuarios</a>
              </li>
        <?php endif;?>
              <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   <i class="fas fa-table"></i> Bitacora
                  </a>
                    <div class="dropdown-menu dropdown-menu- animate slideIn" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="..\manuales.php"><i class="fas fa-tasks"></i> Observaciones</a>
                    <a class="dropdown-item" href="..\reportes.php"><i class="fas fa-file-invoice"></i> Reportes</a>
                    <a class="dropdown-item" href="..\plantas1.php"><i class="fas fa-leaf"></i> Plantas</a>
                    <a class="dropdown-item" href="..\fases1.php"><i class="fas fa-calendar-alt"></i> Fases</a>
                </div>
                  </li>


        </ul>

        <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php echo $us;?>
              </a>
                <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="..\editcuen.php"><i class="fas fa-user-edit"></i> Editar datos</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="controladores/logout.php"><i class="fas fa-sign-out-alt"></i> Cerrar Sesion</a>
                </div>
              </li>
            </ul>
      </div>
    </div>
  </nav>

<?php endif;?>
