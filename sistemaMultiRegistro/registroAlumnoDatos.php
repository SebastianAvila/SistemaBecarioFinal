<?php
include("../coneccionBaseDatos/coneccionEnvio.php");
if (isset($_POST['registraAlumno'])) {

    if (
        strlen($_POST['primerNomBeca']) >= 1 and strlen($_POST['segundoNomBeca']) >= 1 and strlen($_POST['apellidoPaterBeca']) >= 1
        and strlen($_POST['apellidoMaterBeca']) >= 1 and strlen($_POST['celular']) >= 1 and strlen($_POST['correoElec']) >= 1
    ) {

        $primerNomBeca = $_POST['primerNomBeca'];
        $segundoNomBeca = $_POST['segundoNomBeca'];
        $apellidoPaterBeca = $_POST['apellidoPaterBeca'];
        $apellidoMaterBeca = $_POST['apellidoMaterBeca'];
        $celular = $_POST['celular'];
        $correoElec = $_POST['correoElec'];
        date_default_timezone_set("America/Mexico_City");
        DateTimeInterface::RFC1123;
        $fechaRegistroAlumno = date(DATE_RFC1123);
        $id_unicoPro = $_POST['id_UnicoPro'];
        $clavePlantel = $_POST['clavePlantel'];
        $usuarioBecario = $_POST['usuarioBecario'];
        $passwordBecario = $_POST['passwordBecario'];

        $query = "SELECT * FROM  programas WHERE id_unicoPro='$id_unicoPro'"; ///Toma datos de los programas para
        $resulta = mysqli_query($coneccion, $query); ///tener las horas por cubrir y enviarlo a los datos de becario
        $row = mysqli_fetch_array($resulta);
        $horasCubrir = $row['horasCubrir'];
        $tipobecario = "INACTIVO";
        $fechaInicioBeca = $row['fechaInicioBeca'];
        $fechaFinBeca = $row['fechaFinBeca'];

        $NumAleFo = rand(9999, 99999);
        $id_UnicoAlum = "ALUM";
        $id_UnicoAlum .= $NumAleFo;

        $envioDatosAlumnos = "INSERT INTO alumnos(id_UnicoAlum,primerNomBeca,segundoNomBeca,apellidoPaterBeca
            ,apellidoMaterBeca,celular,correoElec,id_UnicoPro,clavePlantel,fechaRegistro)
             VALUE('$id_UnicoAlum','$primerNomBeca','$segundoNomBeca','$apellidoPaterBeca','$apellidoMaterBeca',
            '$celular','$correoElec','$id_unicoPro','$clavePlantel','$fechaRegistroAlumno') ";


        $envioQuery = mysqli_query($coneccion, $envioDatosAlumnos);
        $envioCuentaBecario = "INSERT INTO becariocuenta(id_UnicoAlum,correo_becario,pass_becario,horas_restantes,tipo,fechaInicio, fechaFinal) VALUES ('$id_UnicoAlum','$usuarioBecario','$passwordBecario','$horasCubrir','$tipobecario','$fechaInicioBeca', '$fechaFinBeca')";
        $envioCuentaQuery = mysqli_query($coneccion, $envioCuentaBecario);



        if ($envioQuery and $envioCuentaQuery) {
?>

            <h3 class="ok"> ¡Registro correcto! </h3>
        <?php
            echo "Funciona";
        } else {
        ?>

            <h3 class="ok"> ¡Registro Incorrecto! </h3>
        <?php
            echo " No Funciona";
        }
    } else {

        //verifica que los campos esten llenos de no estarlos manda el siguiente mensaje 
        //la clase bad es para el css manda un mensaje en rojo
        ?>
        <h3 class="bad">¡Rellene todos los campos! </h3>
<?php

    }
}





?>