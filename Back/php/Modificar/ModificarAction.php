<?php
include_once('../Conexion.php');
$Con=$_GET['Con'];
try {
	$modifica=$conexion->prepare("UPDATE `produccion`.`acciones` SET `Owner` =:owner, `DueDate` =:due, `Comments` =:com WHERE `idAcciones` =:id ");

$modifica->bindParam(':owner',$_GET['responsable']);
$modifica->bindParam(':due',$_GET['Due']);
$modifica->bindParam(':com',$_GET['comentario']);
$modifica->bindParam(':id',$_GET['Ide']);
$modifica->execute();
$ruta='Location:../../../Front/areas/Open.php?Con='.$Con.'&Ide='.$_GET['Ide'].'&msg=bienModificado#ancla';
print $_GET['responsable'];
} catch (Exception $e) {
	echo "Error al actualizar". $e->getMessage();
	$ruta='Location:../../../Front/areas/Open.php?Con='.$Con.'&Ide='.$_GET['Ide'].'&msg=malModificado#ancla';
   }


 
header($ruta);
//exit;
  ?>