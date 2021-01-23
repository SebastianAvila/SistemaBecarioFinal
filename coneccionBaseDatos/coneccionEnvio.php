<?php



$localhost = "localhost";
$root = "root";
$password = "";
$bd='sistemabecario';

$coneccion = mysqli_connect($localhost,$root,$password);
$query = mysqli_select_db($coneccion,$bd);




?> 