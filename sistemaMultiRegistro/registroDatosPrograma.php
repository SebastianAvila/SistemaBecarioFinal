<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>

<?php
include("../coneccionBaseDatos/coneccionEnvio.php");

if(isset($_POST['enviaPrograma'])){
    if(strlen($_POST['clavePlantel']) >=1 and  strlen($_POST['horasCubrir']) >=1 ){

        $tipoProgra = $_POST['tipoProgra'];
        $fechaInicioBeca = $_POST['fechaInicioBeca'];
        $fechaFinBeca = $_POST['fechaFinBeca'];
        $horasCubrir = $_POST['horasCubrir'];
        $clavePlantel = $_POST['clavePlantel'];

    
        $fechaRegistroPrograma = date('18-05-22');

        $NumAleFo = rand(9999, 99999);
        $id_UnicoPro = "PRO";
        $id_UnicoPro .= $NumAleFo;
        
// en caso de fallar, lo notifica de lo contrario redirige a la pagina principal 
        $envioDatosProgramas = "  INSERT INTO programas(id_UnicoPro,tipoProgra,horasCubrir,fechaInicioBeca,fechaFinBeca,clavePlantel,fechaRegistro	) values ('$id_UnicoPro','$tipoProgra','$horasCubrir', '$fechaInicioBeca','$fechaFinBeca','$clavePlantel','$fechaRegistroPrograma')";
        $envioQueryProgramas = mysqli_query($coneccion,$envioDatosProgramas);

                    if ($envioQueryProgramas) {
                        
                        $_SESSION['message']='Registro Correcto ';
                        $_SESSION['message_type']='success';
                    } else {
                        $_SESSION['message']='Registro incorrecto ';
                        $_SESSION['message_type']='danger';
                    }
    }else {

        //verifica que los campos esten llenos de no estarlos manda el siguiente mensaje 
        //la clase bad es para el css manda un mensaje en rojo
        
        $_SESSION['message']='Rellene todos los campos ';
        $_SESSION['message_type']='danger';

    }













}











?>