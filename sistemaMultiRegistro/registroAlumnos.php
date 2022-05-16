
<?php
include("registroAlumnoDatos.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
  <link rel="stylesheet" href="../css/barraLateral.css?1.0" />
  <link rel="stylesheet" href="../css/registroCss.css?1.0">
  <title>Registro de Becarios</title>
</head>

<body>

  <div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper"  ">
      <div class="sidebar-heading">Menu de Administrador</div>
      <div class="list-group list-group-flush">
        <a href="registroAlumnos.php" class="list-group-item list-group-item-action bg-light">Registro Alumnos</a>
        <a href="registroPrograma.php" class="list-group-item list-group-item-action bg-light">Registro Programas</a>
        <a href="registroPlanteles.php" class="list-group-item list-group-item-action bg-light">Registro Planteles</a>
        <a href="../seleccionAdmin.php" class="list-group-item list-group-item-action bg-light">Regresar al menu </a>
        <a href="../index.php" class="list-group-item list-group-item-action bg-light">Cerrar Sesion</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom" >
        <button class="btn" id="menu-toggle"><img src="../imagenes/img_422593.png" alt="" class=" imgBarra"></button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <h1>Registro de Becarios </h1>

          </ul>
        </div>
      </nav>
      <form action="" method="post">
        <h2>Datos becario</h2>
        
          <?php if(isset($_SESSION['message'])){   ?>
          <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
          <?= $_SESSION['message']  ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>          
          </div>
          <?php session_destroy(); } ?> 

        <h3>Primer Nombre</h3>
        <input type="text" class="form-control "name="primerNomBeca" id="primerNomBeca" placeholder="Obligatorio*">

        <h3>Segundo Nombre</h3>
        <input type="text" class="form-control " name="segundoNomBeca" id="segundoNomBeca" placeholder="Opcional*">

        <h3>Primer Apellido</h3>
        <input type="text" class="form-control "name="apellidoPaterBeca" id="apellidoPaterBeca" placeholder="Obligatorio*">

        <h3>Segundo Apellido</h3>
        <input type="text" class="form-control "name="apellidoMaterBeca" id="apellidoMaterBeca" placeholder="Obligatorio*">

        <h3>Celular a 10 digitos</h3>
        <input type="text" class="form-control "name="celular" id="celular" placeholder="Lada + 7 numeros restantes">

        <h3>Correo Electronico</h3>
        <input type="text" class="form-control "name="correoElec" id="correoElec" placeholder="correo@gmail.com">

        <h3>usuario para su login </h3>
        <input type="text" class="form-control "name="usuarioBecario" id="usuarioBecario" placeholder=" datos+@becario.uady.mx">

        <h3>Password</h3>
        <input type="password" class="form-control " name="passwordBecario" id="passwordBecario">
        <br><br>


        <!-- consulta para poder obtener datos de una tabla e imprimirlos en el select  -->
        <?php
        $link = mysqli_connect("localHost", "root", "");
        if ($link) {
          mysqli_select_db($link, "sistemabecario");
        }
        ?>
        <h3>Plantel de procedencia</h3>
        <select name="clavePlantel" id="clavePlantel" require  >
          <option value="">Planteles Disponibles</option>
          <?php
          $v = mysqli_query($link, "SELECT * FROM planteles");
          while ($planteles  = mysqli_fetch_row($v)) {
          ?>
            <option value="<?php echo $planteles[0] ?>"><?php echo $planteles[2] ?> </option>
          <?php } ?>
        </select>

        <div id="id_UnicoPro" name="id_UnicoPro"></div>

        <br>
        <input type="submit" value="Registrar" name="registraAlumno" class="btn btn-success btn-block">

      </form>

    </div>
    <!-- /#page-content-wrapper -->
  </div>
  <div>




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
<!-- Script para poder obtener datos de una tabla e imprimirlos en el select  -->
<script type="text/javascript">
  $(document).ready(function() {
    $('#clavePlantel').val(1);
    recargarLista();

    $('#clavePlantel').change(function() {
      recargarLista();
    });
  })
</script>
<script type="text/javascript">
  function recargarLista() {
    $.ajax({
      type: "POST",
      url: "datos.php",
      data: "id=" + $('#clavePlantel').val(),
      success: function(r) {
        $('#id_UnicoPro').html(r);
      }
    });
  }
</script>

