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
	$id           =$key[0];
	$nomina       =$key[1];
	$cont         =$key[2];
	
	$nombre       =$key[4];
	$apellido     =$key[5];
	$departamento =$key[3];
	
	}
} catch (Exception $e) {
	//header('Location:../../../login.php?msg=ErrorAlconsultar');
}
//print $user.$nomina;
if ($user==$nomina and $pass==$cont) {
	session_start();
	$_SESSION['activa']       ='yes';
	$_SESSION['nomina']       =$nomina;
	$_SESSION['nombre']       =$nombre;
	$_SESSION['Apellido']     =$apellido;
	$_SESSION['Departamento'] =$departamento;
	print 'bien';
	header('Location:../../../Front/Data.php?'.$nomina);
}else{
    print 'mal';
	header('Location:../../../login.php?msg=datosMal');
}


?>