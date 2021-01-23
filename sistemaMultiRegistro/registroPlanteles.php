<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
  <link rel="stylesheet" href="../css/barraLateral.css?1.0" />
  <link rel="stylesheet" href="../css/registroCss.css?1.0">
  <title>Registro de Planteles</title>
</head>

<body>
  <div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Menu de Administrador</div>
      <div class="list-group list-group-flush">
        <a href="registroAlumnos.php" class="list-group-item list-group-item-action bg-light">Registro Alumnos</a>
        <a href="registroPrograma.php" class="list-group-item list-group-item-action bg-light">Registro Programas</a>
        <a href="registroPlanteles.php" class="list-group-item list-group-item-action bg-light">Registro Planteles</a>
        <a href="../seleccionAdmin.html" class="list-group-item list-group-item-action bg-light">Regresar al menu </a>
        <a href="../index.html" class="list-group-item list-group-item-action bg-light">Cerrar Sesion</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn" id="menu-toggle"><img src="../imagenes/img_422593.png" alt="" class=" imgBarra"></button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <h1>Registro de Planteles </h1>

          </ul>
        </div>
      </nav>
      <form action="" method="post">

        <h3>Registrar Planteles </h3>

        <h4>Nombre del plantel </h4>
        <input type="text"  class="form-control" name="nombrePlantel" id="nombrePlantel">

        <h4>Clave del plantel</h4>
        <input type="text" class="form-control" name="clavePlantel" id="clavePlantel">

        <h4>Ubicacion del plantel</h4>
        <input type="text"  class="form-control" name="localidadPlantel" id="localidadPlantel">
        <br>
        <input type="submit" value="Registrar" name="registrarPlantel" class="btn btn-success btn-block">

      </form>


    </div>
    <!-- /#page-content-wrapper -->
  </div>
  <!-- //Muestra los datos en un formato html  -->

  </div>

  </div>
</body>
<!-- Scrips para la correcta funcion del sideBard -->
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>

<!-- Menu Toggle Script -->
<script>
  $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });
</script>

</html>

<?php

include("registroDatosPlanteles.php");
?>