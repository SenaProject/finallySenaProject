<?php
  require "../tfpdf/tfpdf.php";

  class PDF extends tfpdf{

    function header(){
      $this->image('image/ima_evaplus.jpg', 5,5,30);
      $this->SetFont('Arial','B',15);
      $this->Cell(30);
      $this->Cell(120,10,'Reporte de Evalucion',0,0,'C');

      $this->ln(20);
      
    }
    function Footer(){
      $this->SetY(-15);
      $this->SetFont('Arial','B',8);
      $this->Cell(0,10,'Pagina No.'.$this->PageNo().'/{nb}',0,0,'C');
    }
  }

 ?>
