<?php
//funcion que realiza la consulta a la tabla de tiempos caidos
 function ConsultaTiempos($conexion){
 	$B='0'; 
    $sql="SELECT  * FROM produccion.tiempomuertos order by idTiempoMuertos desc;";
 	if ($_GET!=null) {
 		$B=$_GET['B'];
 	}
    switch ($B) {
    	case '0':
    		$sql="SELECT  * FROM produccion.tiempomuertos order by idTiempoMuertos desc;";
    		break;
    		case '1':
    		$sql="SELECT  * FROM produccion.tiempomuertos order by idTiempoMuertos desc;";
    		break;
    		case '2':
    		$sql="SELECT * FROM produccion.tiempomuertos order by Proyecto asc;";
    		break;
    		case '3':
    		$sql="SELECT * FROM produccion.tiempomuertos order by Linea asc;";
    		break;
    		case '4':
    		$sql="SELECT * FROM produccion.tiempomuertos order by Equipo asc;";
    		break;
    		case '5':
    		$sql="SELECT * FROM produccion.tiempomuertos order by Turno asc;";
    		break;
    		case '6':
    		$sql="SELECT * FROM produccion.tiempomuertos order by Fecha desc;";
    		break;
    		case '7':
    		$sql="SELECT * FROM produccion.tiempomuertos order by Minutos desc;";
    		break;
    		case '8':
    		$sql="SELECT * FROM produccion.tiempomuertos order by Area asc;";
    		break;
    		case '9':
    		$sql="SELECT * FROM produccion.tiempomuertos order by Problema asc;";
    		break;
    		case '10':
    		$sql="SELECT * FROM produccion.tiempomuertos order by Aceptado asc;";
    		break;
    	
    	default:
    		# code...
    		break;
    }

    try {
 	   $setencia=$conexion->query($sql);
    } catch (Exception $e) {
	print 'Error al consultar tiempos caidos'. $e;
    }
return ($setencia);
}
//funcion que realiza la consulta de un tiempo muerto en especifico
function ConsultaTiempoIndividual($conexion){
	if ($_GET!=null) {
	$id=$_GET['id'];
	$sql="SELECT * FROM produccion.tiempomuertos where idTiempoMuertos=".$id.";";
	try {
		$setencia1=$conexion->query($sql);
	} catch (Exception $e) {
		print 'Error al ejecutar la consulta del tiempo muerto';
	}
	return $setencia1;}
} 

  ?>
