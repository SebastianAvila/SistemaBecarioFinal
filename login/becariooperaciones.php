<?php

include("../coneccionBaseDatos/coneccionEnvio.php");
// Coneccionn con la base de datos

if(isset($_POST['envio'])){
    $id_UnicoAlum = $_GET['id_UnicoAlum'];
    $query = "SELECT * FROM  becariocuenta WHERE id_UnicoAlum='$id_UnicoAlum'";
    $resulta = mysqli_query($coneccion, $query);
    $row = mysqli_fetch_array($resulta);
    
    $query2 = "SELECT * FROM  alumnos WHERE id_UnicoAlum='$id_UnicoAlum'";
    $resulta2 = mysqli_query($coneccion, $query2);
    $row2 = mysqli_fetch_array($resulta2);

    $horas = $row['horas_restantes'];
    $id_UnicoPro = $row2['id_UnicoPro'];

    $query3 = "SELECT * FROM  programas WHERE id_UnicoPro='$id_UnicoPro'";
    $resulta3 = mysqli_query($coneccion, $query3);
    $row3 = mysqli_fetch_array($resulta3);

    $horasReales = $row['horas_restantes'];
    $horastotales = $row3['horasCubrir'];
    $hEntrada = $_POST['h1'];
    $mEntrada = $_POST['mn1'];
    $hSalida = $_POST['h2'];
    $mSalida = $_POST['mn2'];
    echo $horastotales;
    if ($hEntrada > 0 and $hEntrada <= 24 and $mEntrada >= 0 and $mEntrada < 60 and $hSalida > 0 and $hSalida <= 24 and $mSalida >= 0 and $mSalida < 60)
    {

        $Entrada = $hEntrada+(round($mEntrada*(1+(2/3))))*.01;
        echo $Entrada;
        $Salida = $hSalida+(round($mSalida*((1)+(2/3))))*.01;
        echo $Salida;
        $horasResta = $Salida-$Entrada;
        echo $horasResta;
        $HorasInsertar = ($horasReales-$horasResta);
        if($horasResta >= 0)
        {
            ?>
            <h1>Se han enviado correctamente los datos</h1>
            Usted va a cumplir con
            <?php
            echo $horasResta;
            ?>
             horas de las  
            <?php 
            echo $horastotales;
            ?>
             totales por ende le quedan por cumplir:
            <?php
            echo round($HorasInsertar);
            ?>
             horas<p>
             <a href="../index.php" class="btn btn-secondary">Cerrar Sesion
            </p>
            <?php
            if($HorasInsertar >= 0)
            {
                $CuentaBecario ="UPDATE becariocuenta SET horas_restantes = '$HorasInsertar' WHERE id_UnicoAlum = '$id_UnicoAlum'"; 
                $CuentaQuery = mysqli_query($coneccion,$CuentaBecario);    
            }else{
                $CuentaBecario ="UPDATE becariocuenta SET horas_restantes = '0' WHERE id_UnicoAlum = '$id_UnicoAlum'"; 
                $CuentaQuery = mysqli_query($coneccion,$CuentaBecario);    
            }
        }
        else
        {
            ?>
            <h3>Su diferencia de horas es negativa </h3>
            <?php
            echo "El numero de entrada debe ser menor al de salida";
        }
    }
    else{
        ?>
        <h3>No se a puesto el formato de horas de manera correcta </h3>
        <?php
        echo "Puede ser porque puso un numero fuera del formato permito o no puso ningun numero en alguna entrada";
    }
}

?>