<?php 
include_once('../Conexion.php');
$nomina=$_POST['Nomina'];
$pass=$_POST['Password'];
$sql=("SELECT noEmpleado, password, nombre,aPaterno, id_departamento  from sinectech.empleados where noEmpleado ='".$nomina."' and password='".$pass."' and status='1';");

try {
	$usuario=$conexion->query($sql);
} catch (Exception $e) {
print 'Error al verificar usuario';
}
    
  	$nomi='GeovannyIgnacioSalazarMedina05abril1995';
    $con='GeovannyIgnacioSalazarMedina05abril1995';
    $nombre='GeovannyIgnacioSalazarMedina05abril1995';
    $apellido='GeovannyIgnacioSalazarMedina05abril1995';
  foreach ($usuario as $key) {
  	$nomi=$key[0];
    $con=$key[1];
    $nombre=$key[2];
    $apellido=$key[3];
    $depa=$key[4];

  }
  if ($pass==$con && $nomina==$nomi) {
       $activaUser=$conexion->prepare("INSERT INTO `produccion`.`usuario` (`NumeroNomina`, `Contrasena`, `Departamento`, `Nombre`, `Apellido`, `Correo`) VALUES (:nomi, :Contra, :depa, :nomb, :apelli, :cor);");
       	$activaUser->bindParam(':nomi',$nomi);
       	$activaUser->bindParam(':Contra',$con);
       	$activaUser->bindParam(':depa',$depa);
       	$activaUser->bindParam(':nomb',$nombre);
       	$activaUser->bindParam(':apelli',$apellido);
       	$activaUser->bindParam(':cor',$_POST['correo']);
       	$activaUser->execute();


  //	header('Location:../../../index.php?msg=registrado');
  }
 
    //header('Location:../../../index.php?msg=noregistrado');
  

 ?>