<?php 
include("../Conexion.php");
try {
     $aux=$conexion->query("UPDATE `produccion`.`peticion` SET `Estado` = '3', `QuienSurte` = '".$_GET['nomina']."' WHERE (`idPeticion` = '".$_GET['id']."');");
	 header("Location:../../../Front/areas/Msd/Msd.php?id=".$_GET['id']."&Con=&msg=BienCorto&Estado=3&por=");
} catch (Exception $e) {
	print "Error al Cancelar".$e;
	header("Location:../../../Front/areas/Msd/Msd.php?id=".$_GET['id']."&Con=&msg=MalCorto&Estado=3&por=");

}

 ?>