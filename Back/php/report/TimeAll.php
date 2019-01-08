<?php 
//hay un error con la clase de conexion que al traerla aqui la clase de phpExcel falla
if ($_GET['turno']=='4') {
	$t='1';
	$tu='2';
	$tur='3';
}
else{
	$t=$_GET['turno'];
	$tu=$_GET['turno'];
	$tur=$_GET['turno'];
}

$sql='SELECT * FROM produccion.tiempomuertos where Fecha between '.$_GET['from'].' and '.$_GET['to'].' and turno='.$t.' or turno='.$tu.' or turno='.$tur.' ;';
$usuario='root';
$contraseña='root';
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
$objphpExcel=$objphpleer->load('RquiAll.xlsx');
$objphpExcel->setActiveSheetIndex(0);

date_default_timezone_set('UTC');
$hoy=date('Y-m-d');
$objphpExcel->getActiveSheet()->SetCellValue('F3','Date Generated: '.$hoy);

  $linea=6;
foreach ($r as $key) {
	$objphpExcel->getActiveSheet()->SetCellValue('A'.$linea,$key[0]);
	$objphpExcel->getActiveSheet()->SetCellValue('B'.$linea,$key[1]);
	$objphpExcel->getActiveSheet()->SetCellValue('C'.$linea,$key[2]);
	$objphpExcel->getActiveSheet()->SetCellValue('D'.$linea,$key[3]);
	 if ($key[5]==1) {
    	$t='Matutino';
    }
     if ($key[5]==2) {
    	$t='Vespertino';
    }
     if ($key[5]==3) {
    	$t='Nocturno';
    }
	$objphpExcel->getActiveSheet()->SetCellValue('E'.$linea,$t);
	$objphpExcel->getActiveSheet()->SetCellValue('F'.$linea,$key[6]);
	$objphpExcel->getActiveSheet()->SetCellValue('G'.$linea,$key[10]);
	$objphpExcel->getActiveSheet()->SetCellValue('H'.$linea,$key[4]);
	$objphpExcel->getActiveSheet()->SetCellValue('I'.$linea,$key[12]);
	$objphpExcel->getActiveSheet()->SetCellValue('K'.$linea,$key[7]);
	$objphpExcel->getActiveSheet()->SetCellValue('L'.$linea,$key[8]);
	$objphpExcel->getActiveSheet()->SetCellValue('M'.$linea,$key[9]);
	$objphpExcel->getActiveSheet()->SetCellValue('N'.$linea,$key[11]);
	$objphpExcel->getActiveSheet()->SetCellValue('O'.$linea,$key[13]);
	$objphpExcel->getActiveSheet()->SetCellValue('P'.$linea,$key[14]);
	$objphpExcel->getActiveSheet()->SetCellValue('Q'.$linea,$key[15]);
	$objphpExcel->getActiveSheet()->SetCellValue('R'.$linea,$key[16]);
	$objphpExcel->getActiveSheet()->SetCellValue('S'.$linea,$key[17]);
	$res=whoCon($conexion,$key[18]);
	$objphpExcel->getActiveSheet()->SetCellValue('T'.$linea,$res);
	$res=whoCon($conexion,$key[20]);
	$objphpExcel->getActiveSheet()->SetCellValue('U'.$linea,$res);
	
	$linea++;
}

header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header('Content-Disposition: attachment;filename="RequiAll.xlsx"');
header('Cache-Control: max-age=0');
 
$objphpWriter = PHPExcel_IOFactory::createWriter($objphpExcel, 'Excel2007');
$objphpWriter->save('php://output');

function whoCon($cone,$ide){ 
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