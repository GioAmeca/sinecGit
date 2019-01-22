<?php 
$sql="SELECT * FROM produccion.peticion where Fechayhora between'".$_GET['de']."' and '".$_GET['a']."';";
$usuario='root';
$contraseña='root';
//print $sql;
try {
	$conexion = new PDO('mysql:host=127.0.0.1;dbname=produccion', $usuario, $contraseña);
	$r=$conexion->query($sql);
} catch (Exception $e) {
     	print "Error al conectar  ";
	print "¡Error!: " . $e->getMessage();	
}



require '../exel/Classes/PHPExcel/IOFactory.php';
$objphpExcel= new PHPExcel();
$objphpleer= PHPExcel_IOFactory::createReader('Excel2007');
$objphpExcel=$objphpleer->load('PEDIDOS.xlsx');
$objphpExcel->setActiveSheetIndex(0);

date_default_timezone_set('UTC');
$hoy=date('Y-m-d');
$objphpExcel->getActiveSheet()->SetCellValue('F3','Date Generated: '.$hoy);

  $linea=6;
foreach ($r as $key) {
	$objphpExcel->getActiveSheet()->SetCellValue('A'.$linea,$key[0]);//id
	$objphpExcel->getActiveSheet()->SetCellValue('B'.$linea,$key[1]);//parte
	$objphpExcel->getActiveSheet()->SetCellValue('C'.$linea,$key[7]);//lote viejo
	$res=whoCon($conexion,$key[2]);
	$objphpExcel->getActiveSheet()->SetCellValue('D'.$linea,$res);//QUIEN
	$objphpExcel->getActiveSheet()->SetCellValue('E'.$linea,$key[4]);//linea
	$objphpExcel->getActiveSheet()->SetCellValue('F'.$linea,$key[3]);//fecha
	$objphpExcel->getActiveSheet()->SetCellValue('G'.$linea,$key[5]);//proyecto
	$objphpExcel->getActiveSheet()->SetCellValue('H'.$linea,$key[6]);//estado
	$res=whoCon($conexion,$key[9]);
	$objphpExcel->getActiveSheet()->SetCellValue('I'.$linea,$res);//quien s
	$objphpExcel->getActiveSheet()->SetCellValue('K'.$linea,$key[10]);//lote surtido
	$objphpExcel->getActiveSheet()->SetCellValue('L'.$linea,$key[8]);//cantidad
	$objphpExcel->getActiveSheet()->SetCellValue('M'.$linea,$key[11]);//fecha
	$linea++;
}

header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header('Content-Disposition: attachment;filename="Pedidos.xlsx"');
header('Cache-Control: max-age=0');
 
$objphpWriter = PHPExcel_IOFactory::createWriter($objphpExcel, 'Excel2007');
$objphpWriter->save('php://output');

function whoCon($cone,$ide){ 
	$datos=1;
   try {
   	$sql="SELECT NumeroNomina, Nombre, Apellido FROM produccion.usuario where NumeroNomina ='".$ide."';";
   	$conUserID=$cone->query($sql);
   //	print $sql;
   } catch (Exception $e) {
   	echo "Error al consultar los usuarios  ".$e->GetMessage();
   }
   foreach ($conUserID as $key ) {
    $datos =$key[1] ." ".$key[2]."- ".$key[0];
   
   }
   return($datos);
 }
 ?>