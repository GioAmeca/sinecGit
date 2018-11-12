<?php
session_start();
   if ($_SESSION['activa']!='yes') {
      header('Location:../../index.php');
   }
include_once('../Conexion.php');
include_once('../Mail/mail.php');
$Con=$_GET['Con'];
$hoy=date('Y-m-d');
try {
	$modifica=$conexion->prepare("UPDATE `produccion`.`acciones` SET `Owner` =:owner, `DueDate` =:due, `Comments` =:com, `FechaModificado`=:hoy WHERE `idAcciones` =:id ");

$modifica->bindParam(':owner',$_GET['responsable']);
$modifica->bindParam(':due',$_GET['Due']);
$modifica->bindParam(':com',$_GET['comentario']);
$modifica->bindParam(':id',$_GET['Ide']);
$modifica->bindParam(':hoy',$hoy);
$modifica->execute();
 
 $modifica=null;
 $modifica=$conexion->query("SELECT * FROM produccion.acciones where idAcciones='".$_GET['Ide']."';");
 foreach ($modifica as $key) {
 	$action=$key[1];
 	$open=$key[2];
 	$Due=$key[4];
 	$resposable=$key[3];
 	$Qopen=$key[9];
 	$Qclose=$key[8];
 	$comentari=$key[7];
 }
 EditarActionMail($action,$open,$Due,$resposable,$Qopen,$Qclose,$comentari,$conexion);
$ruta='Location:../../../Front/areas/Open.php?Con='.$Con.'&Ide='.$_GET['Ide'].'&msg=bienModificado#ancla';
//print $_GET['responsable'];
} catch (Exception $e) {
	echo "Error al actualizar". $e->getMessage();
	$ruta='Location:../../../Front/areas/Open.php?Con='.$Con.'&Ide='.$_GET['Ide'].'&msg=malModificado#ancla';
   }


 
header($ruta);
//exit;
  ?>