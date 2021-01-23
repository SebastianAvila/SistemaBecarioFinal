<?php

include("../coneccionBaseDatos/coneccionEnvio.php");
    // UserInput Test
    function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
    } 

    if(empty($_POST['be_usuario']) || empty($_POST['be_contra']))
    {
        header("location:errorCamposVbecario.html");
    }
    else
    {
    $becario_username= test_input($_POST['be_usuario']);
    $becario_password= test_input($_POST['be_contra']);


    $query = "SELECT * FROM becariocuenta";
    $resultados = mysqli_query($coneccion, $query); 
    //Check
    if(!$coneccion )
    {
        die("Connection Failed : ".mysqli_connect_error());
    }

    $sql= "SELECT * FROM sistemabecario.becariocuenta WHERE correo_becario='".$becario_username."' AND pass_becario='".$becario_password."'";
    $query= mysqli_query($coneccion , $sql);


    if(mysqli_num_rows($query)==1)
    {
        $row = mysqli_fetch_array($query);
        $id_UnicoAlum = $row['id_UnicoAlum'];
        $horas = $row['horas_restantes'];
        $tipo = $row['tipo'];
        $sql2 = "SELECT * FROM sistemabecario.alumnos WHERE id_UnicoAlum='".$id_UnicoAlum."'";
        $query2 = mysqli_query($coneccion , $sql2);
        $row2 = mysqli_fetch_array($query2);
        //$CuentaBecario ="UPDATE becariocuenta SET tipo = 'INACTIVO', horas_restantes = '135' WHERE id_UnicoAlum = '$id_UnicoAlum'"; 
        //$CuentaQuery = mysqli_query($coneccion,$CuentaBecario);
        ?>
        Bienvenido 
        <?php
        echo $row2['primerNomBeca']. " ". $row2['apellidoPaterBeca'] ." ". $row2['apellidoMaterBeca'];
        ?>
        <strong>
            Horas por completar: 
        </strong>
        <?php
        echo $horas;
        if($horas<=0 and $tipo == "ACTIVO"){
            ?>
            <br>
            <a href="../login/becariofin.php?id_UnicoAlum=<?php echo $row['id_UnicoAlum']; ?>"target="c_blank" class="btn btn-secondary">
                    Crear Carta de Finalizacion
                </a>
            </br>
            <h1>Info</h1>
            Este boton creara un PDF descargable en el cual se afirma que ya haz finalizado con las horas del servicio solicitado
            <?php
        }
        else if($horas>0 and $tipo == "INACTIVO"){
            ?>
            <p>
            </p>
            <a href="../login/becarioinicio.php?id_UnicoAlum=<?php echo $row['id_UnicoAlum']; ?>" target="c_blank" class="btn btn-secondary">
                Crear Carta de Inicio
            </a>
            <h1>Info</h1>
            Este boton creara un PDF descargable en el cual autorizas el inico de tu servicio solicitado
            <?php
        }
        else if ($horas<=0 and$tipo = "INACTIVO")
        {
            ?>
            <h1>Haz finalizado con tus horas del servicio requerido</h1>
            <?php
        }
        if ($tipo == "ACTIVO" and $horas > 0){
            ?>
            <p>
            <form action="../login/becariooperaciones.php?id_UnicoAlum=<?php echo $row['id_UnicoAlum'];?>" method="POST">
            <label for="H1">Hora De Entrada:</label>
            <input type="number" id="H1" name="h1" min="1" max="24" placeholder="24max">
            <input type="number" id="MN1" name="mn1" min="00" max="59"> - 
            <label for="H2">Hora De Salida:</label>
            <input type="number" id="H2" name="h2" min="1" max="24" placeholder="24max">
            <input type="number" id="MN2" name="mn2" min="00" max="59">
            <input type="submit" name="envio" value="Enviar">
            </form>
            </p>
            <?php
        }
        ?>
        <p>
        </p>
        <a href="../index.html" class="btn btn-secondary">Cerrar Sesion
        <?php
    }
    else
    {
         header("location:errorContraBecario.html");
    }

    mysqli_close($coneccion );
    }
?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>