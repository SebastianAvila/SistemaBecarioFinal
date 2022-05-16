<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
<link rel="stylesheet" href="../css/cssUpdate.css">
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>

<?php
// Coneccionn con la base de datos
include("../coneccionBaseDatos/coneccionEnvio.php");


$tipoProgra='';
$horasCubrir='';
$fechaInicioBeca='';
$fechaFinBeca='';
$clavePlantel='';
$fechaRegistro ='';


// obtiene el id de la pagina central y realiza un select y los resguarda en sus respectivos variables 
if(isset($_GET['id_UnicoPro'])){
    $id_UnicoPro=$_GET['id_UnicoPro'];
    $query = "SELECT * FROM  programas WHERE id_UnicoPro='$id_UnicoPro'";
    $resulta = mysqli_query($coneccion,$query);
    
    if (mysqli_num_rows($resulta) ==1 ) {
        $row = mysqli_fetch_array($resulta);
        $id_UnicoPro =$row['id_UnicoPro'];
        $tipoProgra=$row['tipoProgra'];
        $horasCubrir=$row['horasCubrir'];
        $fechaInicioBeca=$row['fechaInicioBeca'];
        $fechaFinBeca=$row['fechaFinBeca'];
        $clavePlantel=$row['clavePlantel'];
        $fechaRegistro =$row['fechaRegistro'];  

    }
   
       


}


//Funcion para poder guardar los datos obtenidos de la edicion 
if (isset($_POST['enviaPrograma'])) {
    
    
    $id_UnicoPro =$_POST['id_UnicoPro'];
    $tipoProgra=$_POST['tipoProgra'];
    $horasCubrir=$_POST['horasCubrir'];
    $fechaInicioBeca=$_POST['fechaInicioBeca'];
    $fechaFinBeca=$_POST['fechaFinBeca'];
    $clavePlantel=$_POST['clavePlantel'];
    $fechaRegistro =$_POST['fechaRegistro'];

    
    // Realiaza el update para la tabla programas 
    $queryProgra="UPDATE  programas SET id_Unicopro='$id_UnicoPro', tipoProgra='$tipoProgra', horasCubrir='$horasCubrir', fechaInicioBeca='$fechaInicioBeca', fechaFinBeca='$fechaFinBeca', 
    clavePlantel='$clavePlantel', fechaRegistro=''$fechaRegistro WHERE id_UnicoPro='$id_UnicoPro'";
    //ejecuta el query
    $resulProg= mysqli_query($coneccion, $queryProgra);
   
    // en caso de fallar, lo notifica de lo contrario redirige a la pagina principal 
    if($resulProg){
        header("Location:../crudDatos/crudProgramas.php ");
    }else{
      ?> <h3>A ocurrido un error</h3> <?php
    }
    
  }

?>
 <title>Sistema Becario</title>
<div class="container p-4 card card-body divPrincipal">
<!-- //Muestra los datos en un formato html con los valores obtenidos en la consulta anterior  -->
<form action="editProgramas.php?id_UnicoPro=<?php echo $_GET['id_UnicoPro']; ?>" method="POST">

    <div>
    <h4>ID unico</h4>                   
    <h6>NO MODIFICABLE </h6>
    
        <input type="text" name="id_UnicoPro" id="id_UnicoPro" style="display: none;" value="<?php echo $id_UnicoPro ?>" readonly>
    
      <h3>Programas </h3>
      <h4>Tipo de Programa</h4>
      <select name="tipoProgra" id="" require>
        <option value="<?php echo $tipoProgra?>"> <?php echo $tipoProgra ?>-Seleccionado Anteriormente</option>
        <option name="tipoProgra" value="Practicas Profesionales">Practicas Profesionales</option>
        <option name="tipoProgra" value="Servicio Social "> Servicio Social</option>
        <option name="tipoProgra" value="Residencia "> Residencia</option>
      </select>
      
      <h4>Fecha de incio del servicio del becario</h4>
      <input type="date" name="fechaInicioBeca" id="fechaInicioBeca" value="<?php echo $fechaInicioBeca ?>">
      <h4>Fecha limite del servicio del becario</h4>
      <input type="date" name="fechaFinBeca" id="fechaFinBeca" value="<?php echo  $fechaFinBeca?>">
      <h4>Horas por cubrir</h4>
      <input type="text"  class="form-control"  name="horasCubrir" id="horasCubir" value="<?php echo $horasCubrir ?>">
      <h4>Seleccione de que plantel es este Programa</h4>

            <?php
            $link = mysqli_connect("localHost", "root", "");
            if ($link) {
            mysqli_select_db($link, "sistemabecario");
           
            }

            ?>
                <?php 
                // Muestra lo elejido anteriormente antes del update 
                $consulta= "SELECT nombrePlantel FROM planteles WHERE clavePlantel='$clavePlantel'";

                $resu = mysqli_query($coneccion,$consulta);

                while($row = mysqli_fetch_array($resu)){
                    ?> <p> Plantel Elejido Anteriormente  : <?php echo $row['nombrePlantel'] ?></p> <?php 

                }
                ?>


          <select name="clavePlantel" id="" require value="<?php echo $clavePlantel?>">
        <option value="">Planteles Disponibles</option>
      
         <?php

        $v = mysqli_query($link, "SELECT * FROM planteles");
        while ($planteles  = mysqli_fetch_row($v)) {
        ?>
        
          <option value="<?php echo $planteles[0] ?>"><?php echo $planteles[2] ?> </option>
        <?php } ?>
      </select>

  

          <br><br>
      <input type="submit" value="Update" name="enviaPrograma" class="btn btn-success"/>
      <br>
      <br>
      <a href="crudProgramas.php"><input type="button" value="Cancelar"  class="btn btn-secondary" /></a>

    </div>
</form>
</div>
 