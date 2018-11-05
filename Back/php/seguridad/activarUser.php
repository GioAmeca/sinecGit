<?php 
include_once('../Conexion.php');
$nomina=$_POST['Nomina'];
$pass=$_POST['Password'];
$bandera='0';
$usuario;
$sql=("SELECT noEmpleado, password, nombre, aPaterno, id_departamento  from sinectech.empleados where noEmpleado ='".$nomina."' and password='".$pass."' and status='1';");
//verificar que el usuario no esta activado
$sql2=("SELECT true FROM produccion.usuario where NumeroNomina='".$nomina."';:");
try {
	$usuario=$conexion->query($sql2);
	//optengo el valor de la consulta 
	foreach ($usuario as $key) {
	     $bandera=$key[0];
    }
} 
catch (Exception $e) {
	print 'Error al verificar usuario';
}
// si es bandera es 1 indica que el usuario esta activado si es 0 indica que no esta activado 
if($bandera=='1'){
    header('Location:../../../index.php?msg=yaRegitrado');
}
else{
	$usuario=null;
     //consulto que el usuario exista en recursos humanos 
     try {
     	
	     $usuario=$conexion->query($sql);
     } 
     catch (Exception $e) {
	     print'Error al consultar en recursos humanos'; 
     }
  	 $nomi=rand(19950405,20181231).'Geovanny';
     $con=rand(19950405,20181231).'Geovanny';
     $nombre=rand(19950405,20181231).'Geovanny';
     $apellido=rand(19950405,20181231).'Geovanny';
     foreach($usuario as $key) {
  	     $nomi=$key[0];
         $con=$key[1];
         $nombre=$key[2];
         $apellido=$key[3];
         $depa=$key[4];
     }
     //verifica que las contraceñas del usuario sean las correctas
     if ($pass==$con && $nomina==$nomi) {
     	// si las contraseñas son las correctas inserta el nuevo usuario
          $activaUser=$conexion->prepare("INSERT INTO `produccion`.`usuario` (`NumeroNomina`, `Contrasena`, `Departamento`, `Nombre`, `Apellido`, `Correo`) VALUES (:nomi, :Contra, :depa, :nomb, :apelli, :cor);");
       	    $activaUser->bindParam(':nomi',$nomi);
        	$activaUser->bindParam(':Contra',$con);
        	$activaUser->bindParam(':depa',$depa);
       	    $activaUser->bindParam(':nomb',$nombre);
         	$activaUser->bindParam(':apelli',$apellido);
        	$activaUser->bindParam(':cor',$_POST['correo']);
       	    $activaUser->execute();
       	    session_start();
	        $_SESSION['nomina']=$nomina;
  	     header('Location:../../../Front/adm/NewPass.php?msg=registrado');
     }
     else{
      header('Location:../../../index.php?msg=noregistrado');
     } 
 }
?>

