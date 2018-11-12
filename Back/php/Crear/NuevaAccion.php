<?php 
/*@Geovanny salazar
clase que recibe los datos de open action y los registra en la basde de  datos 
*/
session_start();
   if ($_SESSION['activa']!='yes') {
      header('Location:../../index.php');
   }
include_once('../Conexion.php');
include_once('../fechas.php');
include_once('../Mail/mail.php');


try {
	
	$crear=$conexion->prepare("INSERT INTO `produccion`.`acciones` (`Action`,`Open`,`Owner`,`DueDate`,`Estatus`,`Comments`,`WhoClosedIt`,`WhoOpenIt`) VALUES (:accion,:fechaA,:responsable,:fechaB,'1',:comentario,:quienC,:quienA);");
	$crear->bindParam(':accion',$_POST['Accion']);
	$crear->bindParam(':fechaA',$hoy);
	$crear->bindParam(':responsable',$_POST['responsable']);
	$crear->bindParam(':fechaB',$_POST['Due']);
	$crear->bindParam(':comentario',$_POST['Comentario']);
	$crear->bindParam(':quienC',$_POST['quienc']);
	$crear->bindParam(':quienA',$_POST['quienA']);
	
    $crear->execute();
    //funcion que manda correo a los involucrados en la accion
    NewActionMail($_POST['Accion'],$hoy,$_POST['Due'],$_POST['responsable'],$_POST['quienA'],$_POST['quienc'],$_POST['Comentario'],$conexion);
    $ruta='Location:../../../Front/areas/Open.php?Con=0&Ide=&msg=bien';
} catch (Exception $e) {
	print 'Error al crear una nueva accion'.$e->getMessage();
	$ruta='Location:../../../Front/areas/Open.php?Con=0&Ide=&msg=mal';
}

header($ruta);
 ?>