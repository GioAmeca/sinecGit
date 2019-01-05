<?php 
   
   if ($_SESSION['activa']!='yes') {
      header('Location:../../index.php');
   }
//funcion caduco. esta funcion recibe el id de una accion y verifica si esta accion esta vencida 
function caduco($cone,$id){                 
  try {
    $sql="UPDATE `produccion`.`acciones` SET `Estatus` = '2' WHERE `idAcciones` = ". $id.";";
    $modifica=$cone->query($sql);
  } catch (Exception $e) {
    echo "Error al actualizar". $e->getMessage();
  }
}

//funcio que trae datos de una accion para enviar correo 
function unaAccion($cone,$id){
  try {
    $sql="SELECT * FROM produccion.acciones where IdAcciones =".$id.";";
    $setencia1=$cone->query($sql);
  } catch (Exception $e) {
    print 'Error al consultar registro individual id:'.$id;
  }
  return $setencia1; 
 }      
 
//funcion que trae todos los nombres de los usuarios
function who($cone){ 
   try {
   	$sql="SELECT NumeroNomina, Nombre, Apellido FROM produccion.usuario;";
   	$conUser=$cone->query($sql);
   	print $sql;
   } catch (Exception $e) {
   	echo "Error al consultar los usuarios  ".$e->GetMessage();
   }
   return($conUser);
 }

 //funcion que trae el numero de nomina, nombre y apellido de los usuaraio para mostrar 
function whoCon($cone,$ide){ 
   try {
   	$sql="SELECT NumeroNomina, Nombre, Apellido FROM produccion.usuario where NumeroNomina ='".$ide."';";
   	$conUserID=$cone->query($sql);
   //	print $sql;
   } catch (Exception $e) {
   	echo "Error al consultar los usuarios  ".$e->GetMessage();
   }
   foreach ($conUserID as $key ) {
    $datos =$key[1] ." ".$key[2]."- ".$key[0];
    print $datos;
   }
   return($datos);
 }

  //funcion que trae el correo de un usuario con un ide
function correoUser($cone,$ide){ 
   try {
    $sql="SELECT Correo FROM produccion.usuario where NumeroNomina ='".$ide."';";
    $conUserID=$cone->query($sql);
   // print $sql;
   } catch (Exception $e) {
    echo "Error al consultar los usuarios  ".$e->GetMessage();
   }
   foreach ($conUserID as $key ) {
    $correo=$key[0];
   }
   return($correo);
 }


 
 ?>

