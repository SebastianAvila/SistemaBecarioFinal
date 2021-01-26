<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
<link rel="stylesheet" href="../css/cssUpdate.css">
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>

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
 <title>Sistema Becario</title>
<div class="container p-4 card card-body divPrincipal">
<!-- //Muestra los datos en un formato html con los valores obtenidos en la consulta anterior  -->
<form action="editPlantel.php?clavePlantel=<?php echo $_GET['clavePlantel']; ?>" method="POST">
<h4>ID unico</h4>                   
<h6>NO MODIFICABLE </h6>
    

<input type="text" class="form-control"  name="clavePlantel" id="clavePlantel" value="<?php echo $clavePlantel ?>" readonly>
<h3>Localidad</h3>
<input type="text" class="form-control"  name="localidad" id="localidad" value="<?php echo $localidad ?>">
<h3>Nombre Plantel</h3>
<input type="text"  class="form-control" name="nombrePlantel" id="nombrePlantel" value="<?php echo $nombre ?>">
<br>
<br>
<input type="submit" name="editarPlantel" value="Update" class="btn btn-success">
<br>
<br>
<a href="crudPlanteles.php"><input type="button" value="Cancelar" name="enviaAlumnos" class="btn btn-secondary" /></a>
</form>
</div>
                
                




