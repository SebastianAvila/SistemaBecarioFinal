
<?php 
// Funcio complementaria para poder obtener los datos, los cuales se envian por un script 
$conexion=mysqli_connect('localhost','root','','sistemabecario');
$id=$_POST['id'];

        $sql="SELECT id_unicoPro, tipoProgra, clavePlantel FROM programas WHERE clavePlantel='$id'";

	$result=mysqli_query($conexion,$sql);

	$cadena="<h3>Servicio que ofrecera a la Univercidad</h3>
			<select id='id_UnicoPro' name='id_UnicoPro'>";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<option value='.$ver[0].'>'.utf8_encode($ver[1]).'</option>';
	}

	echo  $cadena."</select>";
	

?>


