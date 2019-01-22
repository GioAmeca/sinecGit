<?php 
session_start();
   require '../Conexion.php';
  date_default_timezone_set('America/Mexico_City');
   $hoy=date('Y/m/d H:i:s');
   $fecha= new DateTime($hoy);
$fecha->add(new DateInterval('PT5M'));
$hoy=$date->format('Y-m-d H:i:s');
   $Estado='1'; 

   try { 


   	$pedido=$conexion->prepare("INSERT INTO `produccion`.`peticion` (`Pieza`, `Quien`, `Linea`, `Proyecto`, `Estado`, `Loteviejo`, `Cantidad`, `QuienSurte`, `LoteNuevo`, `FechayhoraS`) VALUES (:Pieza, 'SinPedir', :Linea, :Proyecto, '2', 'Sin Pedir', :Cantidad, :Quien, :Lote, :Fechayhora)");
   	$pedido->bindParam(':Pieza',$_GET['parte']);
    $pedido->bindParam(':Cantidad',$_GET['Cantidad']);
   	$pedido->bindParam(':Quien',$_SESSION['nomina']);
   	$pedido->bindParam(':Fechayhora',$hoy);
   	$pedido->bindParam(':Linea',$_GET['linea']);
   	$pedido->bindParam(':Proyecto',$_GET['proyecto']);
    $pedido->bindParam(':Lote',$_GET['lote']);
   	$pedido->execute();
   } catch (Exception $e) {
   	print ("Error al guardar pedido".$e);
   header("Location:../../../Front/areas/Msd/Msd.php?msg=Pedidomal&id=&Con=&Estado=&por=");
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

  $sql=("INSERT INTO `produccion`.`lotes` (`idLote`, `NivelMSD`, `Descripcion`, `Abieto`, `Tiempo`, `Estado`, `Parte`) VALUES ('".$_GET['lote']."', '".$key[1]."', '".$key[2]."', '".$hoy."','0', '2', '".$key[0]."');");
  print $sql;
  $aux=$conexion->query($sql);
   header('Location:../../../Front/areas/Msd/Msd.php?msg=BinSurtido&Con=&id=&Estado=&por=#surti');
} catch (Exception $e) {
  print "¡Error!: " . $e->getMessage();
  header('Location:../../../Front/areas/Msd/Msd.php?msg=MalSurtido&Con=&id=&Estado=&por=#surti');
}
}
    
  
    header("Location:../../../Front/areas/Msd/Msd.php?msg=Pedidobien&Con=&id=&Estado=&por=");
 ?>