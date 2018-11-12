
<?php
session_start();
   if ($_SESSION['activa']!='yes') {
      header('Location:../../index.php');
   }
//clase que manda correo de notificacion a un usuario que se agrega por el usuario
include_once('../Consulta/Rapido.php');
include_once('../Consulta/Consultas.php');
include_once('../Conexion.php');
 
$con=$_POST['Con'];
$action=$_POST['Ide'];
$user=$_POST['notify'];
$setencia1= unaAccion($conexion,$action);
foreach ($setencia1 as $key) {
     $action=$key[1];
     $open=$key[2];
     $Due=$key[4];
     $res=$key[3];
     $Qo=$key[9];
     $Qc=$key[8];
     $comentari=$key[7];
}
 //treamos los correos de los usuarios
 // Varios destinatarios
 $para =correoUser($conexion,$user);
 // título
 $título = 'SINEC Action Open';
 // nos traemos los datos de los involucrados en la accion 
 $res=whoCon($conexion,$res);
 $Qo=whoCon($conexion,$Qo);
 $Qc=whoCon($conexion,$Qc);
 // mensaje
 $mensaje = '
  <html>
   <body>
   	<div style="background-color:  #3c8dbc; width: 300px; border-radius: 5px; position: relative; left: 35%;"  >
	<p style="font-size: 30px; color:#fff; position: relative; left: 20%;" >Open Action </p>
    </div>
  <table style="width:100%">
    <tr style="background-color: #3c8dbc; color: #fff;  border-style: 1px solid black;">
     <th>Action</th> 
     <th>Date Open</th>
     <th>Due Date</th>
     <th>Owner</th>
     <th>Who open</th>     
     <th>Who Close</th> 
     <th>Commentary</th>
    </tr>
    <tr>
     <th>'.$action.'</th> 
     <th>'.$open.'</th>
     <th>'.$Due.'</th>
     <th>'.$res.'</th>
     <th>'.$Qo.'</th>     
     <th>'.$Qc.'</th>
     <th>'.$comentari.'</th>

    </tr>
  </table>
 </body>
 </html>';
 // Para enviar un correo HTML, debe establecerse la cabecera Content-type
 $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
 $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 // Enviarlo
 mail($para,$título,$mensaje,$cabeceras);
// print($para. $título. $mensaje. $cabeceras);	

header('Location:../../../Front/areas/Open.php?Con='.$Con.'&Ide='.$Action.'&msg=Notify#ancla')
?>
