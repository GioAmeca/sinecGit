<?php
$pass=$_POST['pass'];

require_once "../Conexion.php";
$nomina=rand(19950405,20181231).'Geovanny';
try {
	$sql='SELECT * FROM produccion.usuario where credencial="'.$pass.'";';
//	print $sql;
$resultado=$conexion -> query($sql);
foreach ($resultado as $key ) {
	$id=$key[0];
	$nomina=$key[1];
	$cont=$key[2];
	
	$nombre=$key[4];
	$apellido=$key[5];
	$departamento=$key[3];
	$permiso=$key[7];
	$credencial=$key[8];
	}
} catch (Exception $e) {
	print'error al consultar';
	header('Location:../../../../../Front/areas/Msd/Msd.php?msg=errorConsulta');
}
if ($pass==$credencial ) {
	session_start();
	$_SESSION['activa']='yesAl';
	$_SESSION['nomina']=$nomina;
	$_SESSION['nombre']=$nombre;
	$_SESSION['Apellido']=$apellido;
	$_SESSION['Departamento']=$departamento;
	$_SESSION['permisos']=$permiso;
	print 'bien';

	if ($_POST['hacer']=='pedir' and $permiso=='Produccion' or $permiso=='Admin' and $_POST['hacer']=='pedir') {print $_POST['hacer'];
		header('Location:../Crear/NuevoPedido.php?parte='.$_POST['parte'].'&lote='.$_POST['lote'].'&linea='.$_POST['linea'].'&proyecto='.$_POST['proyecto'].'&agotado='.$_POST['agotado']);
	}
	if ($_POST['hacer']=='surtir' and $permiso=='Almacen' or $permiso=='Admin' and $_POST['hacer']=='surtir') {print $_POST['hacer'];
		header('Location:../Modificar/SurtirPedido.php?lote='.$_POST['lote'].'&cantidad='.$_POST['cantidad'].'&id='.$_POST['id'].'&parte='.$_POST['parte']);
	}
	if ($_POST['hacer']=='Registrar' and $permiso=='Almacen' or $permiso=='Admin' and $_POST['hacer']=='Registrar') {print $_POST['hacer'];
		header('Location:../Crear/NuevoComponente.php?idParte='.$_POST['idParte'].'&NivelMSD='.$_POST['NivelMSD'].'&Descripcion='.$_POST['Descripcion']);
	}
	if ($_POST['hacer']=='Cancelar') {
		header('Location:../Modificar/CancelarPedido.php?id='.$_POST['id'].'&nomina='.$nomina);
	}
	if ($_POST['hacer']=='Corto' and $permiso=='Almacen' or $permiso=='Admin' and $_POST['hacer']=='Corto') {
		header('Location:../Modificar/CortoPedido.php?id='.$_POST['id'].'&nomina='.$nomina);
	}
	if ($_POST['hacer']=='surtirSP' and $permiso=='Almacen' or $permiso=='Admin' and $_POST['hacer']=='surtirSP') {print $_POST['hacer'];
		header('Location:../Crear/NuevoPedidoSinPedir.php?parte='.$_POST['parte'].'&lote='.$_POST['lote'].'&linea='.$_POST['linea'].'&proyecto='.$_POST['proyecto'].'&Cantidad='.$_POST['Cantidad']);
	}
	print $_POST['hacer'];
}else{
    print 'mal';
	header('Location:../../../Front/areas/Msd/Msd.php?msg=usermal&Con=&id=&Estado=&por=');
}


//header('Location:../../../../../Front/areas/Msd/Msd.php?msg=usermal');

?>