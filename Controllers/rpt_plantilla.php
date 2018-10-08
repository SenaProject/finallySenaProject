<?php
  require "../tfpdf/tfpdf.php";

  class PDF_Evaluacion extends tfpdf{

    function header(){
      $this->image('image/ima_evaplus.jpg', 5,5,30);
      $this->SetFont('Arial','B',15);
      $this->Cell(30);
      $this->Cell(120,10,'Reporte de Evalucion',0,1,'C');
      $this->SetFont('Arial','B',10);
      $this->Cell(180,10,'Reporte General',0,0,'C');


      $this->ln(20);

    }
    function Footer(){
      $this->SetY(-15);
      $this->SetFont('Arial','B',8);
      $this->Cell(0,10,'Pagina No.'.$this->PageNo().'/{nb}',0,0,'C');
    }
  }

  class PDF_Persona extends tfpdf{

    function header(){
      $this->image('image/ima_evaplus.jpg', 5,5,30);
      $this->SetFont('Arial','B',15);
      $this->Cell(30);
      $this->Cell(120,10,'Reporte de Personas',0,1,'C');
      $this->SetFont('Arial','B',10);
      $this->Cell(180,10,'Reporte de Personas ingresada a EvaPlus ++ ',0,0,'C');


      $this->ln(56);

    }
    function Footer(){
      $this->SetY(-15);
      $this->SetFont('Arial','B',8);
      $this->Cell(0,10,'Pagina No.'.$this->PageNo().'/{nb}',0,0,'C');
    }
  }

  class PDF_Curso_all extends tfpdf{

    function header(){
      $this->image('image/ima_evaplus.jpg', 5,5,30);
      $this->SetFont('Arial','B',15);
      $this->Cell(30);
      $this->Cell(120,10,'Reporte de Curso',0,1,'C');
      $this->SetFont('Arial','B',10);
      $this->Cell(180,10,'Curso corresponde a la union del aprendiz con el Instructor.',0,0,'C');


      $this->ln(20);

    }
    function Footer(){
      $this->SetY(-15);
      $this->SetFont('Arial','B',8);
      $this->Cell(0,10,'Pagina No.'.$this->PageNo().'/{nb}',0,0,'C');
    }
  }


 ?>
