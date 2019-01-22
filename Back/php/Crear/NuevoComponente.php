<?php  
     require '../Conexion.php';
     

     try {
     	$com=$conexion->prepare("INSERT INTO `produccion`.`parte` (`idParte`, `NivelMSD`, `Descripcion`) VALUES (:idParte, :NivelMSD, :Descripcion);");

     	$com->bindParam(':idParte',$_GET['idParte']);
     	$com->bindParam(':NivelMSD',$_GET['NivelMSD']);
     	$com->bindParam(':Descripcion',$_GET['Descripcion']);
     	$com->execute(); header("Location:../../../Front/areas/Msd/Msd.php?msg=Componentebien&Con=&Estado=&por=&id=");
     } catch (Exception $e) {
     	print 'Error al registar Componente '.$e;
     header("Location:../../../Front/areas/Msd/Msd.php?msg=Componentemal&Con=&Estado=&por=&id=");
     }
  //        header("Location:../../../Front/areas/Msd/Msd.php?msg=Componentemal&Con=&id=");
   
 ?>