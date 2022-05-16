<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
<link rel="stylesheet" href="../css/autentificacionBecario.css?1.0">
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>



<?php

include("../coneccionBaseDatos/coneccionEnvio.php");
// UserInput Test
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

if (empty($_POST['be_usuario']) || empty($_POST['be_contra'])) {
    header("location:errorCamposVbecario.php");
} else {
    $becario_username = test_input($_POST['be_usuario']);
    $becario_password = test_input($_POST['be_contra']);


    $query = "SELECT * FROM becariocuenta";
    $resultados = mysqli_query($coneccion, $query);
    //Check
    if (!$coneccion) {
        die("Connection Failed : " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM btjx92rr0ncrcmyn4gzn.becariocuenta WHERE correo_becario='" . $becario_username . "' AND pass_becario='" . $becario_password . "'";
    $query = mysqli_query($coneccion, $sql);


    if (mysqli_num_rows($query) == 1) {
        $row = mysqli_fetch_array($query);
        $id_UnicoAlum = $row['id_UnicoAlum'];
        $horas = $row['horas_restantes'];
        $tipo = $row['tipo'];
        $sql2 = "SELECT * FROM btjx92rr0ncrcmyn4gzn.alumnos WHERE id_UnicoAlum='" . $id_UnicoAlum . "'";
        $query2 = mysqli_query($coneccion, $sql2);
        $row2 = mysqli_fetch_array($query2);

?>
        <h3 class="text-center">Bienvenido</h3>
        <h3 class="text-center">
            <?php
            echo $row2['primerNomBeca'] . " " . $row2['apellidoPaterBeca'] . " " . $row2['apellidoMaterBeca'];
            ?></h3><br>
        <h4 class="text-center">
            Horas por completar:
        </h4>
        <h3 class="text-center">
            <?php
            echo $horas; ?> </h3> <?php
                                if ($horas <= 0 and $tipo == "ACTIVO") {
                                ?>
            <br>

            </br>
            <h1>Informacion</h1>
            <h3> Este boton creara un PDF descargable en el cual se afirma que ya haz finalizado con las horas del servicio solicitado, es importante que conserves este documento para futuras solicitudes</h3>
            <a href="../login/becariofin.php?id_UnicoAlum=<?php echo $row['id_UnicoAlum']; ?>" target="c_blank">
                <input type="button" value="Crear carta de Finalizacion" class="btn btn-secondary"></a>
            <a href="../index.php"><input type="button" value="Cerrar Sesion" class="btn btn-secondary"></a>
        <?php
                                } else if ($horas > 0 and $tipo == "INACTIVO") {
        ?>
            <p>
            </p>

            <h1>Info</h1>
            <h3> Este boton creara un PDF descargable en el cual autorizas el inico de tu servicio solicitado, es importante que conserves este documento para futuras solicitudes</h3>
            <a href="../login/becarioinicio.php?id_UnicoAlum=<?php echo $row['id_UnicoAlum']; ?>" target="c_blank">
                <input type="button" value="Crear Carta de Inicio" class="btn btn-secondary btnB">
            </a>
            <a href="../index.php"><input type="button" value="Cerrar Sesion"></a>

        <?php
                                } else if ($horas <= 0 and $tipo = "INACTIVO") {
        ?>
            <h1>Haz finalizado con tus horas del servicio requerido</h1>
        <?php
                                }
                                if ($tipo == "ACTIVO" and $horas > 0) {
        ?> <div class="container p-4 card card-body divPrincipal">
                <p>
                <form action="../login/becariooperaciones.php?id_UnicoAlum=<?php echo $row['id_UnicoAlum']; ?>" method="POST">
                    <label for="H1">Hora De Entrada:</label>
                    <br>
                    <input type="number" id="H1" name="h1" min="1" max="24" placeholder="24max">

                    <input type="number" id="MN1" name="mn1" min="00" max="59">
                    <br>
                    <br>

                    <label for="H2">Hora De Salida:</label>
                    <br>
                    <input type="number" id="H2" name="h2" min="1" max="24" placeholder="24max">

                    <input type="number" id="MN2" name="mn2" min="00" max="59">
                    <br>
                    <br>

                    <input type="submit" name="envio" value="Enviar" class="btn btn-secondary">
                </form>
                </p>
                <br>
                <a href="../index.php"><input type="button" value="Cerrar Sesion" class="btn btn-secondary"></a>
            </div>
        <?php
                                }
        ?>



<?php
    } else {
        header("location:errorContraBecario.php");
    }

    mysqli_close($coneccion);
}
?>