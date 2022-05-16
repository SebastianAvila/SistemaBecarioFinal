<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>


<?php


include("../coneccionBaseDatos/coneccionEnvio.php");
    


    // UserInput Test
    function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
    } 

    if(empty($_POST['ad_usuario']) || empty($_POST['ad_contra']))
    {

        
        $_SESSION['message']='Campos vacios ';
        $_SESSION['message_type']='danger';
    
    }
    else
    {
    $admin_username= test_input($_POST['ad_usuario']);
    $admin_password= test_input($_POST['ad_contra']);


    
    //Check
    if(!$coneccion )
    {
        die("Connection Failed : ".mysqli_connect_error());
    }

    $sql= "SELECT * FROM sistemabecario.admin WHERE user='".$admin_username."' AND pass='".$admin_password."'";
    $query= mysqli_query($coneccion , $sql);



    if(mysqli_num_rows($query)==1)
    {
        header("location:../seleccionAdmin.php");
        
    }
    else
    {
        
        $_SESSION['message']='Usuario Y contraseña incorrectos ';
        $_SESSION['message_type']='danger';
    }

    mysqli_close($coneccion );

    }
?>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>