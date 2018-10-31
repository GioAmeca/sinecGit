
<?php
$usuario='root';
$contraseña='root';
try {
	$conexion = new PDO('mysql:host=127.0.0.1;dbname=produccion', $usuario, $contraseña);
} catch (Exception $e) {
	print "Error al conectar  ";
	print "¡Error!: " . $e->getMessage();
}
return $conexion;
?>
