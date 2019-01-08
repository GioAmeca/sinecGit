<?php 

//hay un error con la clase de conexion que al traerla aqui la clase de phpExcel falla
$usuario='root';
$contraseña='root';
$de=$_GET['From'];//fecha de inicio de reporte
$a=$_GET['To'];//fecha de termino de reporte
try {
	$conexion = new PDO('mysql:host=127.0.0.1;dbname=produccion', $usuario, $contraseña);
	$r=$conexion->query("SELECT * FROM produccion.acciones where open between '".$de."' and '".$a."';" );
} catch (Exception $e) {
     	print "Error al conectar  ";
	print "¡Error!: " . $e->getMessage();	
}



//$r= null;
//$conexion=null;

require '../exel/Classes/PHPExcel/IOFactory.php';

//estilos de las celdas
$estilo = array( 
  'borders' => array(
    'outline' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN
    )
  )
);
$objphpExcel= new PHPExcel();
$objphpleer= PHPExcel_IOFactory::createReader('Excel2007');
$objphpExcel=$objphpleer->load('openactionMachote.xlsx');
$objphpExcel->setActiveSheetIndex(0);
date_default_timezone_set('UTC');
$hoy=date('Y-m-d');
$objphpExcel->getActiveSheet()->SetCellValue('C3','Date Generated: '.$hoy);
$objphpExcel->getActiveSheet()->SetCellValue('C2','Report from: '.$de.' => '.$a);
	$fila=6;
	foreach ($r as $key) {
		
	for ($i=0; $i <9 ; $i++) { 
			switch ($i) {
				case '0':
				    $objphpExcel->getActiveSheet()->SetCellValue('A'.$fila,$key[0]);
				    $objphpExcel->getActiveSheet()->getStyle('A'.$fila)->applyFromArray($estilo);
					break;
				case '1':
				    $objphpExcel->getActiveSheet()->SetCellValue('B'.$fila,$key[1]);
				    $objphpExcel->getActiveSheet()->getStyle('B'.$fila)->applyFromArray($estilo);
					break;
				case '2':
				    $objphpExcel->getActiveSheet()->SetCellValue('C'.$fila,$key[2]);
				    $objphpExcel->getActiveSheet()->getStyle('C'.$fila)->applyFromArray($estilo);
					break;
				case '3':
				    $res=whoCon($conexion,$key[3]);
				    $objphpExcel->getActiveSheet()->SetCellValue('D'.$fila,$res);
				    $objphpExcel->getActiveSheet()->getStyle('D'.$fila)->applyFromArray($estilo);
					break;
				case '4':
				    $objphpExcel->getActiveSheet()->SetCellValue('E'.$fila,$key[4]);
				    $objphpExcel->getActiveSheet()->getStyle('E'.$fila)->applyFromArray($estilo);
					break;
				case '5':
				    $objphpExcel->getActiveSheet()->SetCellValue('F'.$fila,$key[5]);
				    $objphpExcel->getActiveSheet()->getStyle('F'.$fila)->applyFromArray($estilo);
					break;
				case '6':
				if ($key[6]=='1') {
					$estado='Open';
				}
				if ($key[6]=='2') {
					$estado='Beaten';
				}
				if ($key[6]=='3') {
					$estado='Closed';
				}
				    $objphpExcel->getActiveSheet()->SetCellValue('G'.$fila,$estado);
				    $objphpExcel->getActiveSheet()->getStyle('G'.$fila)->applyFromArray($estilo);
					break;
				case '8':
				    $objphpExcel->getActiveSheet()->SetCellValue('H'.$fila,$key[7]);
				    $objphpExcel->getActiveSheet()->getStyle('H'.$fila)->applyFromArray($estilo);
					break;
			}
		}	
		$fila++;

	}


 



header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header('Content-Disposition: attachment;filename="reporte.xlsx"');
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