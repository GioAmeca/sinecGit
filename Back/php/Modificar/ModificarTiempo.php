<?php 
session_start(); 
if ($_SESSION['activa']!='yes') {
	header('Location:../../../index.php');
}
include_once('../Conexion.php');
$hora1 = date_create($_POST['inicio']);
$hora2 = date_create($_POST['Fin']);
$interval  =date_diff($hora1, $hora2);
$tiempo=$interval->format('%H:%I:%S');
$aceptado='0';
date_default_timezone_set('America/Mexico_City');
$fechaA='0000-00-00 00:00:00';
$fechaB=date('Y/m/d H:i:s');
try {

$modifica=$conexion->prepare("UPDATE `produccion`.`tiempomuertos` SET `Fecha` = :Fecha, `Iniciado` = :Inicio, `Fin` = :Fin, `Minutos` = :Tiempo, `Intermitente` = :I, `Problema` = :Problema, `Causa` = :Causa, `AccionCorectiva` = :Accion, `Comentario` =:Comentario, `Partes` = :partes, `NumeroParte` =:Numero, `Responsable` = :Responsable, `Aceptado` = :Aceptado, `FechaAceptado` = :FechaAceptado, `FechaModificado` = :FechaModificado WHERE (`idTiempoMuertos` = :id)");
$modifica->bindParam(':Fecha',$_POST['Fecha']);
$modifica->bindParam(':Inicio',$_POST['inicio']);
$modifica->bindParam(':Fin',$_POST['Fin']);
$modifica->bindParam(':Tiempo',$tiempo);
$modifica->bindParam(':I',$_POST['intermitente']);
$modifica->bindParam(':Problema',$_POST['problema']);
$modifica->bindParam(':Causa',$_POST['Causa']);
$modifica->bindParam(':Accion',$_POST['accion']);
$modifica->bindParam(':Comentario',$_POST['comentario']);
$modifica->bindParam(':partes',$_POST['partes']);
$modifica->bindParam(':Numero',$_POST['numero']);
$modifica->bindParam(':Responsable',$_POST['responsable']);
$modifica->bindParam(':Aceptado',$aceptado);
$modifica->bindParam(':FechaAceptado',$fechaA);
$modifica->bindParam(':FechaModificado',$fechaB);
$modifica->bindParam(':id',$_POST['id']);

$modifica->execute();
$ruta="Location:../../../Front/areas/Time.php?msg=BienEditada&id=".$_POST['id']."#ancla1";
} catch (Exception $e) {
	print "error al actualizar";
	$ruta="Location:../../../Front/areas/Time.php?msg=MalEditada&id=".$_POST['id']."#ancla1";
}
header($ruta);
?>
 