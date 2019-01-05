<?php 

//hay un error con la clase de conexion que al traerla aqui la clase de phpExcel falla
$usuario='root';
$contraseña='root';
try {
	$conexion = new PDO('mysql:host=127.0.0.1;dbname=produccion', $usuario, $contraseña);
	$r=$conexion->query("SELECT * FROM produccion.tiempomuertos where idTiempoMuertos=".$_GET['id'].";" );
} catch (Exception $e) {
     	print "Error al conectar  ";
	print "¡Error!: " . $e->getMessage();	
}

require '../exel/Classes/PHPExcel/IOFactory.php';
require '../exel/Classes/PHPExcel.php';
//estilos de las celdas


$objphpExcel= new PHPExcel();
 

$objphpleer= PHPExcel_IOFactory::createReader('Excel2007');
$objphpExcel=$objphpleer->load('formatoTime.xlsx');
$objphpExcel->setActiveSheetIndex(0);
date_default_timezone_set('UTC');
$hoy=date('Y-m-d');
$objphpExcel->getActiveSheet()->SetCellValue('A21','Date Generated: '.$hoy);
	foreach ($r as $key) {
	$objphpExcel->getActiveSheet()->SetCellValue('G2',$key[0]);
	$objphpExcel->getActiveSheet()->SetCellValue('B4',$key[1]);
    $objphpExcel->getActiveSheet()->SetCellValue('B5',$key[2]);
    $objphpExcel->getActiveSheet()->SetCellValue('B6',$key[3]);
    $objphpExcel->getActiveSheet()->SetCellValue('B7',$key[6]);
    $objphpExcel->getActiveSheet()->SetCellValue('B8',$key[4]);
    if ($key[5]==1) {
    	$t='Matutino';
    }
     if ($key[5]==2) {
    	$t='Vespertino';
    }
     if ($key[5]==3) {
    	$t='Nocturno';
    }
    $objphpExcel->getActiveSheet()->SetCellValue('B9',$t);
    $objphpExcel->getActiveSheet()->SetCellValue('B10',$key[12]);
    $objphpExcel->getActiveSheet()->SetCellValue('C12',$key[7]);
    $objphpExcel->getActiveSheet()->SetCellValue('C13',$key[8]);
    $objphpExcel->getActiveSheet()->SetCellValue('C14',$key[9]);
    $objphpExcel->getActiveSheet()->SetCellValue('C15',$key[10]);
    if ($key[11]==1) {
    	$i='si';
    }
    if ($key[11]==0) {
    	$i='no';
    }
    $objphpExcel->getActiveSheet()->SetCellValue('C16',$i);
    $objphpExcel->getActiveSheet()->SetCellValue('A18',$_GET['reportente']);
    $objphpExcel->getActiveSheet()->SetCellValue('A20',$_GET['responsable']);
     $objphpExcel->getActiveSheet()->SetCellValue('D4',$key[13]);
     $objphpExcel->getActiveSheet()->SetCellValue('D8',$key[14]);
     $objphpExcel->getActiveSheet()->SetCellValue('D12',$key[15]);
     $objphpExcel->getActiveSheet()->SetCellValue('D16',$key[16]);
     $objphpExcel->getActiveSheet()->SetCellValue('G19',$key[17]);

	}
header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header('Content-Disposition: attachment;filename="Requi.xlsx"');
header('Cache-Control: max-age=0');
 
$objphpWriter = PHPExcel_IOFactory::createWriter($objphpExcel, 'Excel2007');
$objphpWriter->save('php://output');

 ?>