<?php
$pass=$_POST['pass'];
$user=$_POST['user'];
require_once "../Conexion.php";
$nomina=rand(19950405,20181231).'Geovanny';
try {
	$sql='SELECT * FROM produccion.usuario where NumeroNomina= "'.$user.'" and Contrasena="'.$pass.'";';
	//print $sql;
$resultado=$conexion -> query($sql);
foreach ($resultado as $key ) {
	$id=$key[0];
	$nomina=$key[1];
	$cont=$key[2];
	$dep=$key[3];
	$nombre=$key[4];
	$apellido=$key[5];
	
	}
} catch (Exception $e) {
	header('Location:../../../index.php?msg=ErrorAlconsultar');
}
if ($user==$nomina and $pass==$cont) {
	session_start();
	$_SESSION['activa']='yes';
	$_SESSION['nomina']=$nomina;
	$_SESSION['nombre']=$nombre;
	$_SESSION['Apellido']=$apellido;
	print 'bien';
	header('Location:../../../Front/Data.php?'.$nomina);
}else{
    print 'mal';
	header('Location:../../../index.php?msg=datosMal');
}


?>