<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>


<?php

include("../coneccionBaseDatos/coneccionEnvio.php");
// Coneccionn con la base de datos



if(isset($_POST['registrarPlantel'])){
    if( strlen($_POST['nombrePlantel'])>=1 and strlen($_POST['clavePlantel'])>=1 and strlen($_POST['localidadPlantel'])>=1 ){

        date_default_timezone_set("America/Mexico_City");
        DateTimeInterface::RFC1123;
        $fechaRegistroPlantel = date(DATE_RFC1123);

        $nombrePlantel = $_POST['nombrePlantel'];
        $clavePlantel = $_POST['clavePlantel'];
        $localidadPlantel = $_POST['localidadPlantel'];
        

        $envioDatosPlanteles = "INSERT INTO planteles(clavePlantel,localidad,nombrePlantel,fechaRegistro) VALUES ('$clavePlantel','$localidadPlantel','$nombrePlantel','$fechaRegistroPlantel')";
        $envioQuery = mysqli_query($coneccion,$envioDatosPlanteles);

                    if ($envioQuery) {
                        $_SESSION['message']='Registro Correcto ';
                        $_SESSION['message_type']='success';
                    } else {
                        $_SESSION['message']='Registro incorrecto ';
                        $_SESSION['message_type']='danger';
                    }



















    }else {

        //verifica que los campos esten llenos de no estarlos manda el siguiente mensaje 
         
        $_SESSION['message']='Rellene todos los campos ';
        $_SESSION['message_type']='danger';
        

    }













}


?>