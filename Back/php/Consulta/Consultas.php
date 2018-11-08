 <?php 
 $Con='0';
 if ($_GET!=null) {
   $Con=$_GET['Con'];
 }
 //consulta de las acciones en general
 function ConsultasAcciones($conexion){
 	global $Con;
  //consulta general
  if ($Con=='0') {
     try {
        $setencia=$conexion->query('SELECT * FROM produccion.acciones order by idAcciones desc ;'); 
     } catch (Exception $e) {
        print('Error en la consulta General');
     }
  }
  else{
     switch ($Con) {
       //consulta abierta pero atiempo
	     case '1':
		      try {
            $setencia=$conexion->query('SELECT * FROM produccion.acciones where Estatus=1 order by IdAcciones desc ;'); 
          } catch (Exception $e) {
              print('Error en la consulta General');
          }
		   break;
       //consulta abierta pero vencidas
	     case '2':
		     try {
           $setencia=$conexion->query('SELECT * FROM produccion.acciones where Estatus=2 order by IdAcciones desc ;'); 
         } catch (Exception $e) {
            print('Error en la consulta General');
         }
		   break;
       //consulta de cerradas
	     case '3':
		     try {
           $setencia=$conexion->query('SELECT * FROM produccion.acciones where Estatus=3 order by IdAcciones desc ;'); 
          } catch (Exception $e) {
              print('Error en la consulta General');
          }
		   break;
       // consulta con contenido de busqueda con cualquier cosa 
       case '4':  
         $busqueda=$_GET['busqueda'];
         $sql="SELECT * FROM produccion.acciones where Owner like '%".$busqueda."%' or Action like '%".$busqueda."%' or WhoClosedIt like '%".$busqueda."%' or WhoOpenIt like '%".$busqueda."%'  or Comments like '%".$busqueda."%' order by idAcciones desc ;";  
         //print$sql;    
         try {
           $setencia=$conexion->query($sql); 
         } catch (Exception $e) {
           print('Error en la consulta por Responsable');
         }  
     
       break;
        case '5':  
         $busqueda=$_GET['busqueda'];
         $sql="SELECT * FROM produccion.acciones where Owner like '%".$busqueda."%' or WhoClosedIt like '%".$busqueda."%' or WhoOpenIt like '%".$busqueda."%' order by idAcciones desc ;";  
         //print$sql;    
         try {
           $setencia=$conexion->query($sql); 
         } catch (Exception $e) {
           print('Error en la consulta por Responsable');
         }  
     
       break;
       default:
       break;
      }
  }
  return ($setencia);
  
 }
//funcion que hace la consulta de una sola accion  -esta funcion esta repetida en la clase de rapido.php-
 function ConsultaUnAccion($conexion){
 	$setencia1=null;
 	if ($_GET!=null) {
 		$id=$_GET['Ide'];
        try {
        	$sql="SELECT * FROM produccion.acciones where IdAcciones =".$id.";";
         	$setencia1=$conexion->query($sql);
         } catch (Exception $e) {
         	print 'Error al consultar registro individual id:'.$id;
         }
 	}
 	
         return $setencia1; 

  }     

 ?>