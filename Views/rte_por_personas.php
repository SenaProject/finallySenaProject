<?php


include  "../Controllers/rpt_plantilla.php";
require_once "../Models/leerreportes.php";
require_once "../Models/leer.php";



$cReporte= new ReportePersona();
$vReporte=$cReporte->fReportePersona();

// $cFichas= new ReporteFichas();

$cRol= new ConsultaPersona();
$cFicha= new ReporteFichas();


 $pdf = new PDF_Persona();
 $pdf->AliasNbPages();
 $pdf->AddPage();

// Cebecera

 $pdf->SetFillColor(230,230,230);
 $pdf->SetFont('Arial','B',12);

// encabezado de consulta evaluacion
foreach ($vReporte as $vReporteint){
      $pdf->SetFont('Arial','',10);
      $pdf->SetTextColor(247,14,7);
      $pdf->Cell(190,2,'-----------------------------------------------------------------------------------------------------------------------------------------------------------------',1,1,'C');

      $pdf->SetTextColor(0,0,0);
      $pdf->SetFont('Arial','B',12);
      $pdf->SetFillColor(232,232,232);
      $pdf->Cell(190,8,'Nombre Completo:',1,1,'C',1);
      $pdf->SetFont('Arial','',10);
      $pdf->Cell(190,8,utf8_decode($vReporteint[5]),1,1);

      $pdf->SetFont('Arial','B',12);
      $pdf->SetFillColor(232,232,232);
      $pdf->Cell(36,8,'Tipo Doc.:',1,0,'C',1);
      $pdf->Cell(40,8,'No. Doc.:',1,0,'C',1);
      $pdf->Cell(57,8,'Primer Apellido',1,0,'C',1);
      $pdf->Cell(57,8,'Segundo Apellido',1,1,'C',1);

      $pdf->SetFont('Arial','',10);
      $pdf->Cell(36,8,utf8_decode($vReporteint[10]),1,0);
      $pdf->Cell(40,8,$vReporteint[0],1,0);
      $pdf->Cell(57,8,utf8_decode($vReporteint[1]),1,0);
      $pdf->Cell(57,8,utf8_decode($vReporteint[2]),1,1);

      $pdf->SetFont('Arial','B',12);
      $pdf->SetFillColor(232,232,232);
      $pdf->Cell(65,8,'Primer Nombre',1,0,'C',1);
      $pdf->Cell(65,8,'Segundo Nombre',1,0,'C',1);
      $pdf->Cell(60,8,'Fecha de Nacimiento',1,1,'C',1);

      $pdf->SetFont('Arial','',10);
      $pdf->Cell(65,8,utf8_decode($vReporteint[3]),1,0);
      $pdf->Cell(65,8,utf8_decode($vReporteint[4]),1,0);
      $pdf->Cell(60,8,utf8_decode($vReporteint[6]),1,1);

      $pdf->SetFont('Arial','B',12);
      $pdf->SetFillColor(232,232,232);
      $pdf->Cell(120,8,'Direccion',1,0,'C',1);
      $pdf->Cell(70,8,'Telefono',1,1,'C',1);

      $pdf->SetFont('Arial','',10);
      $pdf->Cell(120,8,utf8_decode($vReporteint[7]),1,0);
      $pdf->Cell(70,8,utf8_decode($vReporteint[8]),1,1);


      $pdf->SetFont('Arial','B',12);
      $pdf->SetFillColor(232,232,232);
      $pdf->Cell(190,8,'Correo Electronico @',1,1,'C',1);

      $pdf->SetFont('Arial','',10);
      $pdf->Cell(190,8,utf8_decode($vReporteint[9]),1,1);

      $pdf->SetFont('Arial','B',12);
      $pdf->SetFillColor(232,232,232);
      $pdf->Cell(95,8,'Fichas',1,0,'C',1);
      $pdf->Cell(95,8,'Roles',1,1,'C',1);

      $pdf->SetFont('Arial','',10);
      $vFicha=$cFicha->fReporteFichas($vReporteint[0]);
      $DFicha = '';
      foreach ($vFicha as $vFichaInt){
        $vFichaInt[0];
        $DFicha = $vFichaInt[0].", ".$DFicha;
      }
      $pdf->Cell(95,8,$DFicha,1,0);
      $vRol=$cRol->TraePersRol($vReporteint[0]);
      $DRol = '';
      foreach ($vRol as $vRolInt) {
        $vRolInt[0];
        $DRol = $vRolInt[2].", ".$DRol;
      }
      $pdf->Cell(95,8,$DRol,1,1);
}
 $pdf->OutPut();


 ?>
