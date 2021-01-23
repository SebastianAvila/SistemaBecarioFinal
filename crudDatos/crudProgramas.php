<?php
 
 include("../coneccionBaseDatos/coneccionEnvio.php")
 
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion Programas</title>
</head>
<body>
<div class="col-md-8">
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
                  Editar
                </a>
                <a href="deleteProgramas.php?id_UnicoPro=<?php echo $row['id_UnicoPro']; ?>" class="btn btn-danger">
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