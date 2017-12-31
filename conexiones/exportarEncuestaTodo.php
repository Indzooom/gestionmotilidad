<?php

include ("conexion.php");

$conexion = new mysqli($host, $user, $pw, $dbb);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$sql = "SELECT * FROM encuesta";

$result = $conexion->query($sql);

if ($result->num_rows > 0) {     
    require_once 'Excel/PHPExcel.php';
   $objPHPExcel = new PHPExcel();
   
   //Informacion del excel
   $objPHPExcel->
    getProperties()
        ->setCreator("gutmedica.co")
        ->setLastModifiedBy("gutmedica.co")
        ->setTitle("Exportar Encuesta a Excel")
        ->setSubject("ResultadosEncuestas")
        ->setDescription("Documento generado con PHPExcel")
        ->setKeywords("gutmedica.co  con  phpexcel")
        ->setCategory("Consultorio");    

    $tituloReporte = "Encuesta Total";
    $titulosColumnas = array('ID', 'FECHA', 'NOMBRE', 'TELEFONO', 'PERSONA RECEPCION', 'PROFESIONAL', 'SERVICIO',
                        'TEIMPO-CITA', 'ATENCION TELEFONICA', 'CUMPLIMIENTO-CITA', 'ACTITUD-PERSONAL-RECEPCION',
                        'ATENCION-PROFESIONAL', 'INFORMACION', 'ATENCION-PERSONAL', 'ORDEN-ASEO', 'EXPERIENCIA-GLOBAL',
                        'RECOMENDACION', 'OBSERVACION');
    
    $objPHPExcel->setActiveSheetIndex(0)
    ->mergeCells('A1:D1');
 
    // Se agregan los titulos del reporte
    $objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1',$tituloReporte) // Titulo del reporte
    ->setCellValue('A3',  $titulosColumnas[0])  //Titulo de las columnas
    ->setCellValue('B3',  $titulosColumnas[1])
    ->setCellValue('C3',  $titulosColumnas[2])
    ->setCellValue('D3',  $titulosColumnas[3])
    ->setCellValue('E3',  $titulosColumnas[4])
    ->setCellValue('F3',  $titulosColumnas[5])
    ->setCellValue('G3',  $titulosColumnas[6])
    ->setCellValue('H3',  $titulosColumnas[7])
    ->setCellValue('I3',  $titulosColumnas[8])
    ->setCellValue('J3',  $titulosColumnas[9])
    ->setCellValue('K3',  $titulosColumnas[10])
    ->setCellValue('L3',  $titulosColumnas[11])
    ->setCellValue('M3',  $titulosColumnas[12])
    ->setCellValue('N3',  $titulosColumnas[13])
    ->setCellValue('O3',  $titulosColumnas[14])
    ->setCellValue('P3',  $titulosColumnas[15])
    ->setCellValue('Q3',  $titulosColumnas[16])
    ->setCellValue('R3',  $titulosColumnas[17]);

    $i = 4; //Numero de fila donde se va a comenzar a rellenar
    while ($row = $result->fetch_array(MYSQLI_NUM)) {
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$i, $row[0])
            ->setCellValue('B'.$i, $row[1])
            ->setCellValue('C'.$i, $row[2])
            ->setCellValue('D'.$i, $row[3])
            ->setCellValue('E'.$i, $row[4])
            ->setCellValue('F'.$i, $row[5])
            ->setCellValue('G'.$i, $row[6])
            ->setCellValue('H'.$i, $row[7])
            ->setCellValue('I'.$i, $row[8])
            ->setCellValue('J'.$i, $row[9])
            ->setCellValue('K'.$i, $row[10])
            ->setCellValue('L'.$i, $row[11])
            ->setCellValue('M'.$i, $row[12])
            ->setCellValue('N'.$i, $row[13])
            ->setCellValue('O'.$i, $row[14])
            ->setCellValue('P'.$i, $row[15])
            ->setCellValue('Q'.$i, $row[16])
            ->setCellValue('R'.$i, $row[17]);
        $i++;
    }

    $objPHPExcel->setActiveSheetIndex(0);
    

}

//Ancho columna
//$objPHPExcel->getActiveSheet()->getDefaultColumnDimension()->setWidth(22);
for($i = 'A'; $i <= 'R'; $i++){
    $objPHPExcel->setActiveSheetIndex(0)->getColumnDimension($i)->setAutoSize(TRUE);
}

//Letra
$objActSheet = $objPHPExcel->getActiveSheet(); 
$objStyleA5 = $objActSheet ->getStyle('A5');
$objFontA5 = $objStyleA5->getFont(); 
$objFontA5->setName('Arial'); 
$objFontA5->setSize(10); 

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="ResultadosEncuestas.xlsx"');
header('Cache-Control: max-age=0');

$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
$objWriter->save('php://output');
exit;
#mysql_close();

#$respuesta['res'] = $res;
#echo json_encode($respuesta);



?>