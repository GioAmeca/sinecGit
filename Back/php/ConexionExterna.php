
<?php
$usuario='Piso';
$contraseña='Sinec802280';

try {
	$conex = new PDO('mysql:host=172.16.0.21:8889;dbname=sinectech', $usuario, $contraseña);
	print "Conexion realizada";
} catch (Exception $e) {
	print "Error al conectar  ";
	print "¡Error!: " . $e->getMessage() . "<br/>";
   // die();
}





?>
