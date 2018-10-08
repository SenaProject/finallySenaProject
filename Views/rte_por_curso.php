<?php


include  "../Controllers/rpt_plantilla.php";
require_once "../Models/leerreportes.php";

$cCabeza= new ReporteCursoAll();
$vCabeza=$cCabeza->fReporteCursoAll();
$cPersona= new ReporteCursoAll();


 $pdf = new PDF_Curso_all();
 $pdf->AliasNbPages();
 $pdf->AddPage();
foreach ($vCabeza as $vCabezaInt) {
  $pdf->SetFont('Arial','B',12);
  $pdf->SetFillColor(230,230,230);
  $pdf->Cell(30,8,utf8_decode('Año'),1,0,'C',1);
  $pdf->Cell(50,8,'Trimestre',1,0,'C',1);
  $pdf->Cell(40,8,'Ficha',1,1,'C',1);
  $pdf->SetFont('Arial','',10);
  $pdf->Cell(30,8,$vCabezaInt[1],1,0);
  $pdf->Cell(50,8,$vCabezaInt[3],1,0);
  $pdf->Cell(40,8,$vCabezaInt[4],1,1);
  $pdf->Cell(180,8,'',0,1);

  $pdf->SetFont('Arial','B',12);
  $pdf->SetFillColor(230,230,230);
  $pdf->Cell(120,8,'Aprendiz',1,1,'C',1);
  $pdf->SetFont('Arial','',10);

  $vPersona=$cPersona->fReporteCurso($vCabezaInt[0],$vCabezaInt[2],$vCabezaInt[4]);

foreach ($vPersona as $vAprendiz) {
  if ($vAprendiz[1] == 1) {
    $pdf->Cell(120,8,utf8_decode($vAprendiz[0]),1,1,'C');
} elseif ($vAprendiz[1] == 2) {

} else{

}

}
$pdf->Cell(180,8,'',0,1);
$pdf->SetFont('Arial','B',12);
$pdf->SetFillColor(230,230,230);
$pdf->Cell(120,8,'Instructor',1,1,'C',1);
$pdf->SetFont('Arial','',10);

foreach ($vPersona as $vInstructor) {
  if ($vInstructor[1] == 2) {
    $pdf->Cell(120,8,utf8_decode($vInstructor[0]),1,1,'C');
} elseif ($vInstructor[1] == 1) {

} else{

}

}


//   $pdf->SetFont('Arial','',10);
//   foreach ($vPersona as $vPersonaInt) {
//
//     if ($vPersonaInt[1] == 1) {
//       $vAprendiz = $vPersonaInt[0];
//
//   } elseif ($vPersonaInt[1] == 2) {
//     $vIstructor = $vPersonaInt[0];
//
//   }
//
//   }
// if ($vIstructor>$vAprendiz) {
//   $Recorrido = $vIstructor;
// } else {
//   $Recorrido = $vAprendiz;
// }
// $Control = 0;
// foreach ($Recorrido as $RecorridoInt) {
//   if ($RecorridoInt <= $vIstructor ) {
//     $pdf->Cell(80,8,$vAprendiz[$Control],1,0,'C');
//     $pdf->Cell(20,8,'',0,0,'C');
//     $pdf->Cell(80,8,$vIstructor[$Control],1,1,'C');
//   } else {
//     $pdf->Cell(80,8,$vAprendiz[$Control],1,1,'C');
//   }
//   $Control = $Control + 1;
//   $pdf->Cell(80,8,$Control,1,1,'C');
// }
//
//   $pdf->Cell(180,8,'',0,1);
// }



// $cReporte= new ReporteEvaluacion();
// $vReporte=$cReporte->fReporteEvaluacion($IdEvaluacion);
//

//
// $cNoApre= new ReporteEvaluacion();
// $vNoApre=$cNoApre->fReporteNoApren($IdEvaluacion);
//
//
// // Cebecera
//
//  $pdf->SetFillColor(230,230,230);
//  $pdf->SetFont('Arial','B',12);
//  $pdf->Cell(52,8,'Evaluacion No. :',1,0);
//  $pdf->SetFont('Arial','',10);
//  $pdf->Cell(52,8,$IdEvaluacion,1,1);
//  $pdf->SetFont('Arial','B',12);
//  $pdf->Cell(52,8,'Fecha Inicial :',1,0);
//  $pdf->SetFont('Arial','',10);
//  $pdf->Cell(52,8,$vEva[1],1,1);
//  $pdf->SetFont('Arial','B',12);
//  $pdf->Cell(52,8,'Fecha Final :',1,0);
//  $pdf->SetFont('Arial','',10);
//  $pdf->Cell(52,8,$vEva[2],1,1);
//  $pdf->SetFont('Arial','B',12);
//  $pdf->Cell(52,8,'Cantidad de aprendices: ',1,0);
//  $pdf->SetFont('Arial','',10);
//  $pdf->Cell(52,8,$vNoApre[0],1,1);
//  $pdf->Cell(50,8,'',0,1);
//
// // encabezado de consulta evaluacion

// $pdf->Cell(70,8,'Pregunta',1,0,'C',1);
// $pdf->Cell(27,8,'Calificacion',1,0,'C',1);
// $pdf->Cell(27,8,'Cantidad',1,1,'C',1);
//
// $pdf->SetFont('Arial','',10);
// foreach ($vReporte as $vReporteint){

//   $pdf->Cell(70,8,utf8_decode($vReporteint[1]),1,0);
//   $pdf->Cell(27,8,$vReporteint[2],1,0);
//   $pdf->Cell(27,8,$vReporteint[3],1,1);
  $pdf->Cell(180,8,'',0,1);
 }
 $pdf->OutPut();


 ?>
