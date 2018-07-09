<?php
require('fpdf.php');
class PDF extends FPDF {
   //Cabecera de página
      function Footer(){
        $this->SetY(-10);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

