<?php
//funcion que realiza la consulta a la tabla de tiempos caidos 
 function ConsultaTiempos($conexion){
    $sql="SELECT * FROM produccion.tiempomuertos;";
    try {
 	   $setencia=$conexion->query($sql);
    } catch (Exception $e) {
	print 'Error al consultar tiempos caidos'. $e;
    }
return ($setencia);
}
  ?>