<?php
 
 include("../coneccionBaseDatos/coneccionEnvio.php")
 
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/crudCSS.css">
    <title>Administracion Programas</title>
</head>
<body>
<div class="ol-md-8 divCrud container p-4 card card-body">
    <h2>Sistema de administracion de ventanas </h2>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del programa</th>
                <th>Horas a cubrir del programa</th>
                <th>Fecha de inicio del programa</th>
                <th>Fecha de Fin del programa</th>
                <th>Clave del Plantel</th>
                <th>Fecha de registro del Programa</th>
                <th>Acciones</th>

            </tr>
            </thead>
            <tbody>

            <?php
            $query = "SELECT * FROM programas";
            $resultados = mysqli_query($coneccion, $query);    

            while($row = mysqli_fetch_assoc($resultados)) { ?>
            <tr>
                <td><?php echo $row['id_UnicoPro']; ?></td>
                <td><?php echo $row['tipoProgra']; ?></td>
                <td><?php echo $row['horasCubrir']; ?></td>
                <td><?php echo $row['fechaInicioBeca']; ?></td>
                <td><?php echo $row['fechaFinBeca']; ?></td>
                <td><?php echo $row['clavePlantel']; ?></td>
                <td><?php echo $row['fechaRegistro']; ?></td>
                <td>
                <a href="editProgramas.php?id_UnicoPro=<?php echo $row['id_UnicoPro']; ?>" class="btn btn-secondary">
                <i class="fas fa fa-marker"></i>
                  
                </a>
                <a href="deleteProgramas.php?id_UnicoPro=<?php echo $row['id_UnicoPro']; ?>" class="btn btn-danger">
                <i class="fas fa fa-trash-alt"></i>
                    
                </a>
                </td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
        <a href="../seleccionAdmin.php"> <input type="button" value="Regresar" class="button button2"></a>
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