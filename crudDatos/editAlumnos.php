<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
<link rel="stylesheet" href="../css/cssUpdate.css">
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>


<?php
// Coneccionn con la base de datos
include("../coneccionBaseDatos/coneccionEnvio.php");




// obtiene el id de la pagina central y realiza un select y los resguarda en sus respectivos variables 
if (isset($_GET['id_UnicoAlum'])) {
    $id_UnicoAlum = $_GET['id_UnicoAlum'];
    $query = "SELECT * FROM  alumnos WHERE id_UnicoAlum='$id_UnicoAlum'";
    $resulta = mysqli_query($coneccion, $query);

    if (mysqli_num_rows($resulta) == 1) {
        $row = mysqli_fetch_array($resulta);
        $id_UnicoAlum = $row['id_UnicoAlum'];
        $primerNomBeca = $row['primerNomBeca'];
        $segundoNomBeca = $row['segundoNomBeca'];
        $apellidoPaterBeca = $row['apellidoPaterBeca'];
        $apellidoMaterBeca = $row['apellidoMaterBeca'];
        $celular = $row['celular'];
        $correoElec = $row['correoElec'];
        $id_UnicoPro = $row['id_UnicoPro'];
        $clavePlantel = $row['clavePlantel'];
        $fechaRegistro = $row['fechaRegistro'];
    }
}

//Funcion para poder guardar los datos obtenidos de la edicion 

if (isset($_POST['enviaAlumnos'])) {


    // obtiene los datos del html por el name 
    $id_UnicoAlum = $_POST['id_UnicoAlum'];
    $primerNomBeca = $_POST['primerNomBeca'];
    $segundoNomBeca = $_POST['segundoNomBeca'];
    $apellidoPaterBeca = $_POST['apellidoPaterBeca'];
    $apellidoMaterBeca = $_POST['apellidoMaterBeca'];
    $celular = $_POST['celular'];
    $correoElec = $_POST['correoElec'];
    $id_UnicoPro = $_POST['id_UnicoPro'];
    $clavePlantel = $_POST['clavePlantel'];
    $usuarioBecario = $_POST['usuarioBecario'];
    $passwordBecario = $_POST['passwordBecario'];

    // obtiene la hora del servidor 
    date_default_timezone_set("America/Mexico_City");
    DateTimeInterface::RFC1123;
    $fechaEdicionAlumno = date(DATE_RFC1123);
    // actualiza la tabla alumnos 
    $queryAlum = "UPDATE alumnos SET  id_UnicoAlum = '$id_UnicoAlum',primerNomBeca = '$primerNomBeca',segundoNomBeca = '$segundoNomBeca',apellidoPaterBeca = '$apellidoPaterBeca',
    apellidoMaterBeca = '$apellidoMaterBeca',celular = '$celular',correoElec = '$correoElec', id_UnicoPro = '$id_UnicoPro',clavePlantel = '$clavePlantel', fechaRegistro = '$fechaEdicionAlumno'
    WHERE id_UnicoAlum = '$id_UnicoAlum'";
// actualiza la tabla becario cuenta 
    $queryBecarioCuenta = "UPDATE becariocuenta SET correo_becario='$usuarioBecario', pass_becario='$passwordBecario' WHERE  id_UnicoAlum = '$id_UnicoAlum'";
// ejecuta los querys 
    $QueryBecario = mysqli_query($coneccion, $queryBecarioCuenta);
    $resuA = mysqli_query($coneccion, $queryAlum);

// en caso de fallar, lo notifica de lo contrario redirige a la pagina principal 
    if ($resuA and $QueryBecario) {
        header("Location:../crudDatos/crudAlumnos.php ");
    } else {
?> <h3>A ocurrido un error</h3> <?php
                            }
                        }?>

<div class="container p-4 card card-body divPrincipal">
<!-- //Muestra los datos en un formato html con los valores obtenidos en la consulta anterior  -->
<form action="editAlumnos.php?id_UnicoAlum=<?php echo $_GET['id_UnicoAlum']; ?>" method="POST">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <title>Sistema Becario</title>

    <h4>Datos becario</h4>
    <h4>ID unico</h4>                   
    <h6>NO MODIFICABLE </h6>
    
    <input type="text" class="form-control" name="id_UnicoAlum" id="id_UnicoAlum" value="<?php echo $id_UnicoAlum ?>" readonly >
    <h3>Primer Nombre</h3>
    <input type="text" class="form-control" name="primerNomBeca" id="primerNomBeca" placeholder="Obligatorio" value="<?php echo $primerNomBeca ?>">

    <h3>Segundo Nombre</h3>
    <input type="text" class="form-control" name="segundoNomBeca" id="segundoNomBeca" placeholder="Opcional*" value="<?php echo  $segundoNomBeca ?>">

    <h3>Primer Apellido</h3>
    <input type="text" class="form-control" name="apellidoPaterBeca" id="apellidoPaterBeca" placeholder="Obligatorio*" value="<?php echo  $apellidoPaterBeca ?>">

    <h3>Segundo Apellido</h3>
    <input type="text" class="form-control" name="apellidoMaterBeca" id="apellidoMaterBeca" placeholder="Obligatorii*" value="<?php echo  $apellidoMaterBeca ?>">

    <h3>Celular a 10 digitos</h3>
    <input type="text"  class="form-control" name="celular" id="celular" placeholder="Lada + 7 numeros restantes" value="<?php echo $celular ?>">

    <h3>Correo Electronico</h3>
    <input type="text" class="form-control" name="correoElec" id="correoElec" placeholder="corrre@jemplo.com" value="<?php echo  $correoElec ?>">

<!-- Query para poder mostrar su clave unica, almacenada en otra tabla  -->
    <?php
    $consultaCuenta = "SELECT * FROM becariocuenta WHERE id_UnicoAlum='$id_UnicoAlum' ";
    $consultaCuentaQuery = mysqli_query($coneccion, $consultaCuenta);
    if (mysqli_num_rows($consultaCuentaQuery) == 1) {
        $row = mysqli_fetch_array($consultaCuentaQuery);
        $correo_becario = $row['correo_becario'];
        $pass_becario = $row['pass_becario'];
    ?>
        <h3>usuario para su login </h3>
        <input type="text" class="form-control" name="usuarioBecario" id="usuarioBecario" placeholder=" datos+@gmail.mx" value="<?php echo  $correo_becario ?>">

        <h3>Password</h3>
        <input type="text"  class="form-control" name="passwordBecario" id="passwordBecario" value="<?php echo  $pass_becario ?>">
        <br><br>
    <?php
    }
    ?>

    <?php
// query para poder informarle al administrador sobre lo elejido anteriormente 
    $consultaPlantel = "SELECT nombrePlantel FROM planteles WHERE clavePlantel='$clavePlantel'";
    $consultaPlantelQuery = mysqli_query($coneccion, $consultaPlantel);
    if (mysqli_num_rows($consultaPlantelQuery) == 1) {
        $rowe = mysqli_fetch_array($consultaPlantelQuery);
        $nombrePlantel = $rowe['nombrePlantel'];
    }
    ?>

    <h3>Plantel elejido Anteriormente </h3>
    <p> <?php echo  $nombrePlantel ?> </p>

    <?php
// query para poder informarle al administrador sobre lo elejido anteriormente 
    $consultaPrograma = "SELECT tipoProgra FROM programas WHERE id_UnicoPro='$id_UnicoPro'";
    $consultaProgramaQuery = mysqli_query($coneccion, $consultaPrograma);
    if (mysqli_num_rows($consultaProgramaQuery) == 1) {
        $row = mysqli_fetch_array($consultaProgramaQuery);
        $tipoProgra = $row['tipoProgra'];
    }

    ?>


    <h3>Programa elejido Anteriormente: </h3>
    <p> <?php echo $tipoProgra ?></p>

    <!-- // query para poder informarle al administrador sobre lo elejido anteriormente  y pueda volver a elegir  -->
    <?php
    $link = mysqli_connect("localHost", "root", "");
    if ($link) {
        mysqli_select_db($link, "sistemabecario");
        mysqli_query($link, "SET NAMES 'utf0'");
    }
    ?>
    <h3>Plantel de procedencia</h3>
    <select name="clavePlantel" id="clavePlantel" require>
        <option value="">Planteles Disponibles</option>
        <?php
        $v = mysqli_query($link, "SELECT * FROM planteles");
        while ($planteles  = mysqli_fetch_row($v)) {
        ?>
            <option value="<?php echo $planteles[0] ?>"><?php echo $planteles[2] ?> </option>
        <?php } ?>
    </select>

<!-- Div utilizado por el scrip que acontinuacion se utilizara para poder detectar el cambio del primer select -->
    <div id="id_UnicoPro" name="id_UnicoPro "></div>

<br>
    <input type="submit" value="Update" name="enviaAlumnos" class="btn btn-success" />
    <br>
    <br>
    <a href="crudAlumnos.php"><input type="button" value="Cancelar"  class="btn btn-secondary" /></a>


</form>
</div>

<!--Scrip para poder refrescar el selecte  -->
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
            url: "obtieneDatos.php",
            data: "id=" + $('#clavePlantel').val(),
            success: function(r) {
                $('#id_UnicoPro').html(r);
            }
        });
    }
</script>