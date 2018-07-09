<?php
require('fpdf.php');
class PDF extends FPDF {
   //Cabecera de página
   function Header(){
	$this->Cell(1,10);
	$this->Image('membrete.jpg',15,10,185);
	$this->Ln();

	

	$this->Cell(65,70);
	$this->Write(4,'GENERADO EL $fecha');
	$this->Ln();
	$this->Ln();
	$this->Cell(41,70);
	$this->SetFont('times','B',12);
	$this->Write(4,'REPORTE GENERAL DE ESTUDIANTES REGISTRADOS');
        }
 }
$pdf->Output(); 
?> 
