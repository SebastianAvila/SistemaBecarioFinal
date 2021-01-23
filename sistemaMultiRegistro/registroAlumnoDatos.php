<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>

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
            $_SESSION['message']='Registro Correcto ';
            $_SESSION['message_type']='success';
       
        } else {
            $_SESSION['message']='Registro incorrecto ';
            $_SESSION['message_type']='danger';
        }


    } else {

        //verifica que los campos esten llenos de no estarlos manda el siguiente mensaje 
        
        $_SESSION['message']='Rellene todos los campos ';
        $_SESSION['message_type']='danger';
        
    }
}





?>