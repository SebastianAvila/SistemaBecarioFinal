<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/loginAdmin.css">
    <title>Sistema Becario</title>
</head>
<body>
    <div class="container p-4 card card-body divPrincipal"> 
    <form action="autentificacion_becario.php" action="../sistemabecario/crearbecario.php" method="POST">
        <h1 class="text-center">Becarios</h1><br>
        <img src="../Imagenes/UADY_logo.png" class="img-fluid imgAdmin"/>
        <h3 class="text-center">Usuario:</h3>
        <input type="text" class="form-control " name="be_usuario" placeholder="&#128272; Usuario"  ><br>
        <h3 class="text-center">Contraseña:</h3>
        <input type="password" class="form-control" name="be_contra" placeholder=" &#128273; Contraseña"       &#128273;><br>
        <br> 
        <input type="submit"  class="btn btn-success btn-block" value="Iniciar Sesion"> <br>

        <a href="../index.php"> Regresar al inicio</a>
    </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    
</body>
</html>