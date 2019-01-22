<?php 
session_start();
   if ($_SESSION['activa']!='yes') {
      header('Location:../../index.php');
   }
/*@Geovanny Salazar	
clase que tiene la funcion de registar en la base de datos un nuevo reporte de tiempos caidos 

*/
date_default_timezone_set('America/Mexico_City'); 
$hoy=date('Y-m-d');
$hora=date('H:i:s');
$hora1 = date_create($_GET['inicio']);
$hora2 = date_create($_GET['Fin']);
$interval  =date_diff($hora1, $hora2);
$tiempo=$interval->format('%H:%I:%S');
$A=0;
if ($_GET['intermitente']=='1') {
	$A=1;
}
	




require_once('../Conexion.php');
 try { 
 	$crear=$conexion->prepare("INSERT INTO `produccion`.`tiempomuertos` (`Proyecto`, `Linea`, `Equipo`, `Area`, `Turno`, `Fecha`, `Reportado`, `Iniciado`, `Fin`, `Minutos`, `Intermitente`, `Problema`, `Causa`, `AccionCorectiva`, `Comentario`, `Partes`, `NumeroParte`, `Reportante`, `Regitrado`, `Responsable`) VALUES (:Proyecto,:Linea,:Equipo,:Area,:Turno,:Fecha,:Reportado,:Iniciado,:Fin,:Minutos,:Intermitente,:Problema,:Causa,:AccionCorectiva,:Comentario,:Partes,:NumeroParte,:Reportante,:Regitrado,:Responsable);"); 
 	
 	$crear->bindParam(':Proyecto',$_GET['Proyecto']);
 	$crear->bindParam(':Linea',$_GET['Linea']); 
 	$crear->bindParam(':Equipo',$_GET['Equipo']); 
 	$crear->bindParam(':Area',$_GET['Area']); 
 	$crear->bindParam(':Turno',$_GET['turno']); 
 	$crear->bindParam(':Fecha',$_GET['Fecha']); 
 	$crear->bindParam(':Reportado',$hora); 
 	$crear->bindParam(':Iniciado',$_GET['inicio']); 
 	$crear->bindParam(':Fin',$_GET['Fin']); 
 	$crear->bindParam(':Minutos',$tiempo); 
 	$crear->bindParam(':Intermitente',$A); 
 	$crear->bindParam(':Problema',$_GET['problema']); 
 	$crear->bindParam(':Causa',$_GET['Causa']); 
 	$crear->bindParam(':AccionCorectiva',$_GET['accion']); 
 	$crear->bindParam(':Comentario',$_GET['comentario']); 
 	$crear->bindParam(':Partes',$_GET['partes']); 
 	$crear->bindParam(':NumeroParte',$_GET['numero']); 
 	$crear->bindParam(':Reportante',$_GET['usuario']); 
 	$crear->bindParam(':Regitrado',$hoy); 
 	$crear->bindParam(':Responsable',$_GET['responsable']);
    $crear->execute();
   header("Location:../../../Front/areas/Time.php?msg=TimeSave&id=".$_GET['id']."&B=".$_GET['B']);
 } catch (Exception $e) {
 	print 'Error al registar Tiempo caido'.$e;
 	header("Location:../../../Front/areas/Time.php?msg=TimeSaveError&id=".$_GET['id']."&B=".$_GET['B']);
 }

 ?>