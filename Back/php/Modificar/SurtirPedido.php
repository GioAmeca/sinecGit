<?php 
include ('../Conexion.php');
session_start();
date_default_timezone_set('America/Mexico_City');
   $hoy=date('Y/m/d H:i:s');
   $fecha= new DateTime($hoy);
$fecha->add(new DateInterval('PT5M'));
$hoy=$date->format('Y-m-d H:i:s');
   $Estado='2';
try {
	$aux=$conexion->prepare("UPDATE `produccion`.`peticion` SET `Cantidad` = :Cantidad, `Estado` = :Estado, `QuienSurte` = :QuienSurte, `LoteNuevo` = :Lote, `FechayhoraS` = :FechayhoraS WHERE (`idPeticion` = :id);");
	
	
	$aux->bindParam(':Cantidad',$_GET['cantidad']);
	$aux->bindParam(':Estado',$Estado);
	$aux->bindParam(':QuienSurte',$_SESSION['nomina']);
	$aux->bindParam(':Lote',$_GET['lote']);
	$aux->bindParam(':FechayhoraS',$hoy);
	$aux->bindParam(':id',$_GET['id']);
    $aux->execute();


  
} catch (Exception $e) {
	print "¡Error!: " . $e->getMessage();
	header('Location:../../../Front/areas/Msd/Msd.php?msg=MalSurtido&Con=&id=&por=#surti');
}

  //verificar si el lote esta dado de alta o hay que iniciarlo 
  try {
  	$aux2=$conexion->query("SELECT true FROM produccion.lotes where idLote='".$_GET['lote']."';");
  	foreach ($aux2 as $res) {}
  } catch (Exception $e) {
  	print "error al consultar".$e->getMessage();
  }
if($res[0]==1){
	try {
		$aux2=$conexion->query("UPDATE `produccion`.`lotes` SET `Abieto` = '".$hoy."', `Estado` = '2' WHERE (`idLote` = '".$_GET['lote']."');");
		header('Location:../../../Front/areas/Msd/Msd.php?msg=BinSurtido&Con=&id=&Estado=&por=#surti');
	} catch (Exception $e) {
		header('Location:../../../Front/areas/Msd/Msd.php?msg=MalSurtido&Con=&id=&Estado=&por=#surti');
	}
}
else{
try {

	//optengo los valores del componente para agragarlos al lote
	$sql=("SELECT * FROM produccion.parte where idParte='".$_GET['parte']."';");
	print $sql;
	$aux=$conexion->query($sql);
	foreach ($aux as $key) {}

	$sql=("INSERT INTO `produccion`.`lotes` (`idLote`, `NivelMSD`, `Descripcion`, `Abieto`, `Estado`, `Parte`) VALUES ('".$_GET['lote']."', '".$key[1]."', '".$key[2]."', '".$hoy."', '2', '".$key[0]."');");
	print $sql;
	$aux=$conexion->query($sql);
	 header('Location:../../../Front/areas/Msd/Msd.php?msg=BinSurtido&Con=&id=&Estado=&por=#surti');
} catch (Exception $e) {
	print "¡Error!: " . $e->getMessage();
	header('Location:../../../Front/areas/Msd/Msd.php?msg=MalSurtido&Con=&id=&Estado=&por=#surti');
}
}
 ?>