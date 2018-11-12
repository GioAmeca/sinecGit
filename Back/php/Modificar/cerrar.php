<?php
session_start();
   if ($_SESSION['activa']!='yes') {
      header('Location:../../index.php');
   }
include_once('../Conexion.php');
include_once('../fechas.php');
include_once('../Consulta/Rapido.php');
include_once('../Mail/mail.php');
if ($_POST['quien']==$_POST['quienc']) {
	//print'si se puede';


	try {
	$sql="UPDATE `produccion`.`acciones` SET `Closed` = '".$hoy."', `Estatus` = '3' WHERE `idAcciones` = ". $_POST['id'].";";
	

	$modifica=$conexion->query($sql);
 //print $sql;

} catch (Exception $e) {
	echo "Error al actualizar". $e->getMessage();
   }

  	 $ruta='Location:../../../Front/areas/Open.php?Con=3&Ide=&msg=bienClose';
  	 //Enviar el correo de confirmacion
  	 //traer la informacion de la accion
     $setencia1=unaAccion($conexion,$_POST['id']);
     foreach ($setencia1 as $key) {
     	$action=$key[1];
     	$open=$key[2];
     	$Due=$key[4];
     	$resposable=$key[3];
     	$Qopen=$key[9];
     	$Qclose=$key[8];
     	$comentari=$key[7];
     	
     }
  	 CloseActionMail($action,$open,$Due,$resposable,$Qopen,$Qclose,$comentari,$conexion);
}
else{
	//print 'no se puede';
	 $ruta='Location:../../../Front/areas/Open.php?Con=0&Ide=&msg=malClose';

}

 
header($ruta);
//exit;

  ?>
