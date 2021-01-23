<?php
 
 include("../coneccionBaseDatos/coneccionEnvio.php")
 // Coneccionn con la base de datos
 ?>
 
 
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
     <link rel="stylesheet" href="../css/crudCSS.css">
     <title>Administracion de Alumnos</title>
 </head>
 <body>
 <div class="ol-md-8 divCrud container p-4 card card-body">
     <h3>Sistema de administracion de becarios</h3>
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
                <th>Acciones</th>

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
                <i class="fas fa fa-marker"></i>

                </a>
                <a href="deleteAlumnos.php?id_UnicoAlum=<?php echo $row['id_UnicoAlum']; ?>" class="btn btn-danger">
                <i class="fas fa fa-trash-alt"></i>

                </a>
                </th>
                </td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
        <a href="../seleccionAdmin.html"> <input type="button" value="Regresar" class="button button2"></a>
        </div>
  </div>

     
 </body> 
 <!-- Scrips de boostrap NO ALTERAR SU POSICION -->
 <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/df8066961b.js" crossorigin="anonymous"></script>
 </html>