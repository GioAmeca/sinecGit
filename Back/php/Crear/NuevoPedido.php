<?php 
session_start();
   require '../Conexion.php';
   date_default_timezone_set('America/Mexico_City');
   $hoy=date('Y/m/d H:i:s');
   $Estado='1'; 

   try {
   	$pedido=$conexion->prepare("INSERT INTO `produccion`.`peticion` (`Pieza`, `Quien`, `Fechayhora`, `Linea`, `Proyecto`, `Estado`, `Loteviejo`) VALUES (:Pieza, :Quien, :Fechayhora, :Linea, :Proyecto, :Estado, :Lote);");
   	$pedido->bindParam(':Pieza',$_GET['parte']);
   	$pedido->bindParam(':Quien',$_SESSION['nomina']);
   	$pedido->bindParam(':Fechayhora',$hoy);
   	$pedido->bindParam(':Linea',$_GET['linea']);
   	$pedido->bindParam(':Proyecto',$_GET['proyecto']);
   	$pedido->bindParam(':Estado',$Estado);
    $pedido->bindParam(':Lote',$_GET['lote']);
   	$pedido->execute();
   } catch (Exception $e) {
   	print ("Error al guardar pedido".$e);
   header("Location:../../../Front/areas/Msd/Msd.php?msg=Pedidomal&id=&Con=&Estado=&por=");
     }
    if ($_GET['agotado']=='0') {
       try {
      //me traigo la informacion del lote viejo
      $lote=$conexion->query("SELECT * FROM produccion.lotes where idLote='".$_GET['lote']."';");
      foreach ($lote as $key) {}//guardo los datos en el vector $key
      //calculo la diferencia entre tiempo
       $datetime1 = new DateTime($key[4]);//defino fecha 1
       $datetime2 = new DateTime($hoy);   //define fecha 2
       $interval = $datetime1->diff($datetime2);
       $Ms=($interval->format('%M'));
       $D=($interval->format('%D'));
       $H=($interval->format('%H'));
       $M=($interval->format('%I'));
       $S=($interval->format('%S'));//se determina el intervalo
       //se suma el intervalo con el tiempo ya abierto
       $suma=$key[5];
       $suma +=$Ms*43200;
       $suma +=$D*1440;
       $suma +=$H*60;
       $suma +=$M;
       $suma +=$S/60;
       $suma=round($suma,2);
       print $suma;
                                              //60 minutos en una hora
                                              //1440 minutos en un dia
                                              //43200 minutos en un mes(30 dias)
                //cierro el lote viejo                              
       $lote=$conexion->query("UPDATE `produccion`.`lotes` SET `Cerrado` = '".$hoy."', `Tiempo` = '".$suma."', `Estado` = '1' WHERE (`idLote` = '".$_GET['lote']."');
");
     } catch (Exception $e) {
      header("Location:../../../Front/areas/Msd/Msd.php?msg=Lotemal&id=&Con=&Estado=&por=");
       
     } 
     } 
    if ($_GET['agotado']==1) {
      try {
        $eliminar=$conexion->query("DELETE FROM `produccion`.`lotes` WHERE (`idLote` = '".$_GET['lote']."');
");
      } catch (Exception $e) {
        print"error al eliminar lote";
      }
    }
  
    header("Location:../../../Front/areas/Msd/Msd.php?msg=Pedidobien&Con=&id=&Estado=&por=");
 ?>