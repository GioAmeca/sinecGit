<?php 
session_start(); 
if ($_SESSION['activa']!='yes') {
	header('Location:../../../index.php');
}
include_once('../Conexion.php'); 
date_default_timezone_set('America/Mexico_City');
$sql=("UPDATE `produccion`.`tiempomuertos` SET `Aceptado` = '1', `FechaAceptado` = '".date('Y/m/d H:i:s')."' WHERE (`idTiempoMuertos` = '".$_POST['id']."');
");

if ($_SESSION['nomina']==$_POST['res']) {
	try {
		$bien=$conexion->query($sql);
		$ruta="Location:../../../Front/areas/Time.php?msg=bienAceptada&B=".$_POST['B']."&id=".$_POST['id']."#ancla1";
	} catch (Exception $e) {
		print "Error al ejecutar el query";
		$ruta="Location:../../../Front/areas/Time.php?msg=malAceptada&B=".$_POST['B']."#tabla";
	}
	
}
header($ruta);

 ?>