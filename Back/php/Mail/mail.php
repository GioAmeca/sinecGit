
<?php
session_start();
   if ($_SESSION['activa']!='yes') {
      header('Location:../../index.php');
   }
//clase que contiene metodos para mandar notificacion  de creacion, edicion, y cierre de las acciones 
include_once('../Consulta/Rapido.php');


function NewActionMail($action,$open,$Due,$resposable,$Qopen,$Qclose,$comentari,$conexion){
 //treamos los correos de los usuarios
 // Varios destinatarios
 $para ="".correoUser($conexion,$resposable);
 $para.=",".correoUser($conexion,$Qopen);
 $para.=",".correoUser($conexion,$Qclose);
 // título
 $título = 'SINEC New Action Open';
 // nos traemos los datos de los involucrados en la accion 
 $res=whoCon($conexion,$resposable);
 $Qo=whoCon($conexion,$Qopen);
 $Qc=whoCon($conexion,$Qclose);
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
}

function CloseActionMail($action,$open,$Due,$resposable,$Qopen,$Qclose,$comentari,$conexion){
 //treamos los correos de los usuarios
 // Varios destinatarios
 $para ="".correoUser($conexion,$resposable);
 $para.=",".correoUser($conexion,$Qopen);
 $para.=",".correoUser($conexion,$Qclose);
 // título
 $título = 'SINEC Closed Action';
 // nos traemos los datos de los involucrados en la accion 
 $res=whoCon($conexion,$resposable);
 $Qo=whoCon($conexion,$Qopen);
 $Qc=whoCon($conexion,$Qclose);
 // mensaje
 $mensaje = '
 <html>
   <body>
   	<div style="background-color:  #F09A8C; width: 300px; border-radius: 5px; position: relative; left: 35%;"  >
	<p style="font-size: 30px; color:#D34C36; position: relative; left: 30%;" >Closed Action </p>
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
 //print($para. $título. $mensaje. $cabeceras);	
}
//funcion que manda una notificacion  cuando se modifica la accion 
function EditarActionMail($action,$open,$Due,$resposable,$Qopen,$Qclose,$comentari,$conexion){
 //treamos los correos de los usuarios
 // Varios destinatarios
 $para ="".correoUser($conexion,$resposable);
 $para.=",".correoUser($conexion,$Qopen);
 $para.=",".correoUser($conexion,$Qclose);
 // título
 $título = 'SINEC  Action Open Notify';
 // nos traemos los datos de los involucrados en la accion 
 $res=whoCon($conexion,$resposable);
 $Qo=whoCon($conexion,$Qopen);
 $Qc=whoCon($conexion,$Qclose);
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
 //print($para. $título. $mensaje. $cabeceras); 
}

?>
