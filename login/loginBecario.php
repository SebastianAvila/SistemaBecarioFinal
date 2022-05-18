
<?php include('../layout/header.php'); ?>

<link rel="stylesheet" href="../css/loginAdmin.css">
<div class="container p-4 card card-body divPrincipal">

    <div class="container">

        <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">

            <div class="row">
                <img src="../imagenes/UADY_logo.png" alt="logoUady" style="width: 570px; height: 275px;">
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title text-center">Login Becario</div>
                </div>

                <div class="panel-body">

                    <form  action="autentificacion_becario.php" name="form" id="form" class="form-horizontal"  method="POST">
                        <?php if (isset($_SESSION['message'])) {   ?>
                            <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                                <?= $_SESSION['message']  ?>
                               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php session_destroy();
                        } ?>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="ad_usuario" type="text" class="form-control" name="be_usuario" value="" placeholder="User">
                        </div>

                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="ad_contra" type="password" class="form-control" name="be_contra" placeholder="Password">
                        </div>

                        <div class="form-group">
                            <!-- Button -->
                            <div class="col-sm-12 controls">
                                <button type="submit" href="#" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-log-in"></i> Log in</button>
                                <a href="../index.php"><input type="button" value="Regresar" class="btn btn-secondary pull-left">    </a>
                            </div>
                            
                            
                                
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>



</div>
<?php include('../layout/footer.php'); ?>