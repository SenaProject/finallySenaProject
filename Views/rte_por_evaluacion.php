<?php


include  "../Controllers/rpt_plantilla.php";
require_once "../Models/leerreportes.php";
$IdEvaluacion = $_POST['SelectEvaluacion'];
$cReporte= new ReporteEvaluacion();
$vReporte=$cReporte->fReporteEvaluacion($IdEvaluacion);

$cEva= new ReporteEvaluacion();
$vEva=$cEva->fReporteEvaluacionM($IdEvaluacion);

$cNoApre= new ReporteEvaluacion();
$vNoApre=$cNoApre->fReporteNoApren($IdEvaluacion);

 $pdf = new PDF();
 $pdf->AliasNbPages();
 $pdf->AddPage();
// Cebecera
 $pdf->SetFillColor(230,230,230);
 $pdf->SetFont('Arial','B',12);
 $pdf->Cell(50,8,'Evaluacion No. :',1,0);
 $pdf->Cell(50,8,$IdEvaluacion,1,1);
 $pdf->Cell(50,8,'Fecha Inicial :',1,0);
 $pdf->Cell(50,8,$vEva[1],1,1);
 $pdf->Cell(50,8,'Fecha Final :',1,0);
 $pdf->Cell(50,8,$vEva[2],1,1);
 $pdf->Cell(52,8,'Cantidad de aprendices: ',1,0);
 $pdf->Cell(48,8,$vNoApre[0],1,1);
 $pdf->Cell(50,8,'',0,1);
// encabezado de mysql_tablename

$pdf->Cell(70,8,'Instructor',1,0);
$pdf->Cell(70,8,'Pregunta',1,0);
$pdf->Cell(27,8,'Calificacion',1,0);
$pdf->Cell(27,8,'Cantidad',1,1);

foreach ($vReporte as $vReporteint){
  $pdf->Cell(70,8,$vReporteint[0],1,0);
  $pdf->Cell(70,8,$vReporteint[1],1,0);
  $pdf->Cell(27,8,$vReporteint[2],1,0);
  $pdf->Cell(27,8,$vReporteint[3],1,1);
}
 $pdf->OutPut();


 ?>
