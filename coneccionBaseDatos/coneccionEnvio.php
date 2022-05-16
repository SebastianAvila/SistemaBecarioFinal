<?php



session_start();


$localhost = "btjx92rr0ncrcmyn4gzn-mysql.services.clever-cloud.com";
$root = "uwawyqnvtspd2orn";
$password = "07tWEuA1Fuojg9CcST62";
$bd='btjx92rr0ncrcmyn4gzn';

$coneccion = mysqli_connect($localhost,$root,$password);
$query = mysqli_select_db($coneccion,$bd);




?> 