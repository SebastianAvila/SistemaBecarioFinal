<?php
 
 include("../coneccionBaseDatos/coneccionEnvio.php")
 // Coneccionn con la base de datos
 ?>
 
 
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Administracion de Alumnos</title>
 </head>
 <body>
 <div class="col-md-8">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID de alumno</th>
                <th>Primer Nombre</th>
                <th>Segundo Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Celular</th>
                <th>Correo Electronico </th>
                <th>Servicio que proporciona a la UADY</th>
                <th>Platel de procedencia</th>
                <th>Fecha de registro del Alumno</th>

            </tr>
            </thead>
            <tbody>
<!-- //Muestra los datos en un formato html con los valores obtenidos en la consulta anterior  -->
            <?php
            $query = "SELECT * FROM alumnos";
            $resultados = mysqli_query($coneccion, $query);    

            while($row = mysqli_fetch_assoc($resultados)) { ?>
            <tr>
                <td><?php echo $row['id_UnicoAlum']; ?></td>
                <td><?php echo $row['primerNomBeca']; ?></td>
                <td><?php echo $row['segundoNomBeca']; ?></td>
                <td><?php echo $row['apellidoPaterBeca']; ?></td>
                <td><?php echo $row['apellidoMaterBeca']; ?></td>
                <td><?php echo $row['celular']; ?></td>
                <td><?php echo $row['correoElec']; ?></td>
                <td><?php echo $row['id_UnicoPro']; ?></td>
                <td><?php echo $row['clavePlantel']; ?></td>
                <td><?php echo $row['fechaRegistro']; ?></td>
                <th>
                <a href="editAlumnos.php?id_UnicoAlum=<?php echo $row['id_UnicoAlum']; ?>" class="btn btn-secondary">
                    Editar
                </a>
                <a href="deleteAlumnos.php?id_UnicoAlum=<?php echo $row['id_UnicoAlum']; ?>" class="btn btn-danger">
                    Eliminar
                </a>
                </th>
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