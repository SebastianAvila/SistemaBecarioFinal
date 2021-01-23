<?php
// Coneccionn con la base de datos
include("../coneccionBaseDatos/coneccionEnvio.php");


$localidad ='';
$nombre='';
// obtiene el id de la pagina central y realiza un select y los resguarda en sus respectivos variables 
if(isset($_GET['clavePlantel'])){
    $clavePlantel=$_GET['clavePlantel'];
    $query = "SELECT * FROM  planteles WHERE clavePlantel='$clavePlantel'";
    $resulta = mysqli_query($coneccion,$query);
    
    if (mysqli_num_rows($resulta) ==1 ) {
        $row = mysqli_fetch_array($resulta);
        $clavePlantel =$row['clavePlantel'];
        $localidad=$row['localidad'];
        $nombre=$row['nombrePlantel'];


    }
}


//Funcion para poder guardar los datos obtenidos de la edicion 
if (isset($_POST['editarPlantel'])) {
        $clavePlantel=$_POST['clavePlantel'];
        $localidad=$_POST['localidad'];
        $nombre=$_POST['nombrePlantel'];
// Hace un update principal a la tabla planteles con los datos obtenidos en el html por el metodo POST 
    $queryPlan = "UPDATE planteles SET localidad = '$localidad', nombrePlantel='$nombre'  WHERE clavePlantel='$clavePlantel'";    
    $resulPlan= mysqli_query($coneccion, $queryPlan);
   
    // en caso de fallar, lo notifica de lo contrario redirige a la pagina principal 
    if($resulPlan){
        header("Location:../crudDatos/crudPlanteles.php ");
    }else{
        ?> <h3>A ocurrido un error</h3> <?php
    }
    
  }

?>



<!-- //Muestra los datos en un formato html con los valores obtenidos en la consulta anterior  -->
<form action="editPlantel.php?clavePlantel=<?php echo $_GET['clavePlantel']; ?>" method="POST">

<input type="text" name="clavePlantel" id="clavePlantel" value="<?php echo $clavePlantel ?>" style="display: none;">
<h3>Localidad</h3>
<input type="text" name="localidad" id="localidad" value="<?php echo $localidad ?>">
<h3>Nombre Plantel</h3>
<input type="text" name="nombrePlantel" id="nombrePlantel" value="<?php echo $nombre ?>">


                
                

<button class="btn-success" name="editarPlantel">
  Update
</button>
</form>

