<?php 
// delete simple con un where basado en el id obtenido en el crud principal
include("../coneccionBaseDatos/coneccionEnvio.php");

if(isset($_GET['id_UnicoAlum'])){

$id_UnicoAlum = $_GET['id_UnicoAlum'];
$queryDelete="DELETE FROM ALUMNOS WHERE id_UnicoAlum='$id_UnicoAlum'";
$resultado =mysqli_query ($coneccion, $queryDelete);

$queryDeleteCuenta ="DELETE FROM becariocuenta WHERE id_UnicoAlum='$id_UnicoAlum'";
$resultadoDelete =mysqli_query ($coneccion, $queryDeleteCuenta);
 if($resultado and $resultadoDelete){
 header("Location:../crudDatos/crudAlumnos.php");
 }else{
    ?> <h3>A ocurrido un error</h3> <?php
 }




}
?>