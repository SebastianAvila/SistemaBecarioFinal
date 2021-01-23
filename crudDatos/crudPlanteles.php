 <?php
 
 include("../coneccionBaseDatos/coneccionEnvio.php")
 // Coneccionn con la base de datos
 ?>
 
 <!-- //Muestra los datos en un formato html con los valores obtenidos en la consulta anterior  -->
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Administracion de Planteles</title>
 </head>
 <body>
 <div class="col-md-8">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Clave</th>
                <th>localidad</th>
                <th>Nombre</th>
                <th>Fecha de Registro</th>
            </tr>
            </thead>
            <tbody>

            <?php
            $query = "SELECT * FROM planteles";
            $resultados = mysqli_query($coneccion, $query);    

            while($row = mysqli_fetch_assoc($resultados)) { ?>
            <tr>
                <td><?php echo $row['clavePlantel']; ?></td>
                <td><?php echo $row['localidad']; ?></td>
                <td><?php echo $row['nombrePlantel']; ?></td>
                <td><?php echo $row['fechaRegistro']; ?></td>
                <td>
                <a href="editPlantel.php?clavePlantel=<?php echo $row['clavePlantel']; ?>" class="btn btn-secondary">
                  Editar
                </a>
                <a href="deletePlantel.php?clavePlantel=<?php echo $row['clavePlantel']; ?>" class="btn btn-danger">
                    Eliminar
                </a>
                </td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
        <a href="../seleccionAdmin.html"> <input type="button" value="Regresar"></a>
        </div>
  </div>

     
 </body> 
 </html>