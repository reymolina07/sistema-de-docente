<?php
require('fpdf/fpdf.php');
require('conexion.php');
include_once('queryins.php');


class PDF extends FPDF
{
  var $widths;
  var $aligns;

   function SetWidths($w){
	//Set the array of column widths
	$this->widths=$w;
   }

   function SetAligns($a){
	//Set the array of column alignments
	$this->aligns=$a;
   }

   function Row($data){
	//Calculate the height of the row
	$nb=0;
	for($i=0;$i<count($data);$i++)
		$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
	$h=5*$nb;
	//Issue a page break first if needed
	$this->CheckPageBreak($h);
	//Draw the cells of the row
	for($i=0;$i<count($data);$i++)
	{
		$w=$this->widths[$i];
		$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
		//Save the current position
		$x=$this->GetX();
		$y=$this->GetY();
		//Draw the border
		
		$this->Rect($x,$y,$w,$h);

		$this->MultiCell($w,5,$data[$i],0,$a,'true');
		//Put the position to the right of the cell
		$this->SetXY($x+$w,$y);
	}
	//Go to the next line
	$this->Ln($h);
}

   function CheckPageBreak($h){
	//If the height h would cause an overflow, add a new page immediately
	if($this->GetY()+$h>$this->PageBreakTrigger)
		$this->AddPage($this->CurOrientation);
   }

function NbLines($w,$txt)
{
	//Computes the number of lines a MultiCell of width w will take
	$cw=&$this->CurrentFont['cw'];
	if($w==0)
		$w=$this->w-$this->rMargin-$this->x;
	$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
	$s=str_replace("\r",'',$txt);
	$nb=strlen($s);
	if($nb>0 and $s[$nb-1]=="\n")
		$nb--;
	$sep=-1;
	$i=0;
	$j=0;
	$l=0;
	$nl=1;
	while($i<$nb)
	{
		$c=$s[$i];
		if($c=="\n")
		{
			$i++;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
			continue;
		}
		if($c==' ')
			$sep=$i;
		$l+=$cw[$c];
		if($l>$wmax)
		{
			if($sep==-1)
			{
				if($i==$j)
					$i++;
			}
			else
				$i=$sep+1;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
		}
		else
			$i++;
	}
	return $nl;
}
function Footer(){
        $week_days = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado");
        $monts = array("","Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $week_days_now = date("w");
        $day_now = date("d");
        $mont_now = date("n");    
        $year_now = date("Y");
        $hora = date("H:i:s");
        $date = $week_days[$week_days_now].",  ".$day_now . "  " ." de ".$monts[$mont_now]." de ".$year_now." - ".$hora;
        // Posición: a 1,5 cm del final
        $this->SetY(-12);
        // Arial italic 8
        $this->SetFont('Arial','I',6);
        // Número de página
        $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}'.'               '.$date,0,0,'C');
    } 
function Header()
{
        $week_days = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado");
        $monts = array("","Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $week_days_now = date("w");
        $day_now = date("d");
        $mont_now = date("n");    
        $year_now = date("Y");
        $hora = date("H:i:s");
        $date = $week_days[$week_days_now].",  ".$day_now . "  " ." de ".$monts[$mont_now]." de ".$year_now." - ".$hora;


       
        $this->Cell(254,4, 'REPORTE GENERAL DE ESTUDIANTES INSCRITOS',0,1,'C'); 
        $this->SetFont('Arial','',10);	
      //  $this->Cell(197,4,"Generado el ".date("j-m-y"),0,0,'C');
        $this->Cell(254,4,"Generado el ".$date,0,0,'C');

        $this->Ln();
}


    

 function cabeceraHorizontal($cabecera)
    {
        $this->SetXY(10, 50);
        $this->SetFont('Arial','B',10);
        $this->SetFillColor(229, 229, 229);//Fondo azul de celda
        $this->SetTextColor(0, 0, 0); //Letra color blanco
        $ejeX = 10;


        $this->RoundedRect($ejeX, 50, 15, 7, 2, 'FD');
        $this->CellFitSpace(15,7, 'N. I.',0, 0 , 'C');
        $ejeX = $ejeX + 15;

        $this->RoundedRect($ejeX, 50, 24, 7, 2, 'FD');
        $this->CellFitSpace(24,7, 'CEDULA EST.',0, 0 , 'C');
        $ejeX = $ejeX + 24;

        $this->RoundedRect($ejeX, 50, 34, 7, 2, 'FD');
        $this->CellFitSpace(34,7, 'NOMBRES EST.',0, 0 , 'C');
        $ejeX = $ejeX + 34;

        $this->RoundedRect($ejeX, 50, 34, 7, 2, 'FD');
        $this->CellFitSpace(34,7, 'APELLIDOS EST.',0, 0 , 'C');
        $ejeX = $ejeX + 34;

        $this->RoundedRect($ejeX, 50, 24, 7, 2, 'FD');
        $this->CellFitSpace(24,7, 'CEDULA REP.',0, 0 , 'C');
        $ejeX = $ejeX + 24;

        $this->RoundedRect($ejeX, 50, 34, 7, 2, 'FD');
        $this->CellFitSpace(34,7, 'NOMBRES REP.',0, 0 , 'C');
        $ejeX = $ejeX + 34;

        $this->RoundedRect($ejeX, 50, 34, 7, 2, 'FD');
        $this->CellFitSpace(34,7, 'APELLIDOS REP.',0, 0 , 'C');
        $ejeX = $ejeX + 34;

        $this->RoundedRect($ejeX, 50, 30, 7, 2, 'FD');
        $this->CellFitSpace(30,7, 'GRADO/SECCION',0, 0 , 'C');
        $ejeX = $ejeX + 30;

        $this->RoundedRect($ejeX, 50, 25, 7, 2, 'FD');
        $this->CellFitSpace(25,7, 'FECHA INS.',0, 0 , 'C');


    }
 
    function datosHorizontal($datos)
    {
        $this->SetXY(10,57);
        $this->SetFont('Arial','',8);
        $this->SetFillColor(235, 235, 235); //Gris tenue de cada fila
        $this->SetTextColor(3, 3, 3); //Color del texto: Negro
        $bandera = false; //Para alternar el relleno
        $ejeY = 57; //Aquí se encuentra la primer CellFitSpace e irá incrementando
        $letra = 'D'; //'D' Dibuja borde de cada CellFitSpace -- 'FD' Dibuja borde y rellena
        $cont=1;
        foreach($datos as $fila)
        {
            //Por cada 3 CellFitSpace se crea un RoundedRect encimado
            //El parámetro $letra de RoundedRect cambiará en cada iteración
            //para colocar FD y D, la primera iteración es D
            //Solo la celda de enmedio llevará bordes, izquierda y derecha
            //Las celdas laterales colocarlas sin borde
            $this->RoundedRect(10, $ejeY, 254, 5, 2, $letra);
            $this->CellFitSpace(15,5, utf8_decode($fila['numeroins']),'R', 0 , 'C' );
            $this->CellFitSpace(24,5, utf8_decode($fila['cedulaalu']),'R', 0 , 'C' );
	    $this->CellFitSpace(34,5, utf8_decode($fila['nombrealu']),'R', 0 , 'C' );
	    $this->CellFitSpace(34,5, utf8_decode($fila['apllidoalu']),'R', 0 , 'C' );
	    $this->CellFitSpace(24,5, utf8_decode($fila['cedularep']),'R', 0 , 'C' );
	    $this->CellFitSpace(34,5, utf8_decode($fila['nombrerep']),'R', 0 , 'C' );
            $this->CellFitSpace(34,5, utf8_decode($fila['apellidorep']),'R', 0 , 'C' );
            $this->CellFitSpace(30,5, utf8_decode($fila['grado']),'R', 0 , 'C' );
            $this->CellFitSpace(25,5, utf8_decode($fila['fechains']),'0', 0 , 'C');
 
            $this->Ln();
            //Condición ternaria que cambia el valor de $letra
            ($letra == 'D') ? $letra = 'FD' : $letra = 'D';
            //Aumenta la siguiente posición de Y (recordar que X es fijo)
            //Se suma 7 porque cada celda tiene esa altura
            $ejeY = $ejeY + 5;
            $cont=$cont+1;
        }
    }
 
    function tablaHorizontal($cabeceraHorizontal, $datosHorizontal)
    {
        $this->cabeceraHorizontal($cabeceraHorizontal);
        $this->datosHorizontal($datosHorizontal);
    }
 
    //**************************************************************************************************************
    function CellFit($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='', $scale=false, $force=true)
    {
        //Get string width
        $str_width=$this->GetStringWidth($txt);
 
        //Calculate ratio to fit cell
        if($w==0)
            $w = $this->w-$this->rMargin-$this->x;
        $ratio = ($w-$this->cMargin*2)/$str_width;
 
        $fit = ($ratio < 1 || ($ratio > 1 && $force));
        if ($fit)
        {
            if ($scale)
            {
                //Calculate horizontal scaling
                $horiz_scale=$ratio*100.0;
                //Set horizontal scaling
                $this->_out(sprintf('BT %.2F Tz ET',$horiz_scale));
            }
            else
            {
                //Calculate character spacing in points
                $char_space=($w-$this->cMargin*2-$str_width)/max($this->MBGetStringLength($txt)-1,1)*$this->k;
                //Set character spacing
                $this->_out(sprintf('BT %.2F Tc ET',$char_space));
            }
            //Override user alignment (since text will fill up cell)
            $align='';
        }
 
        //Pass on to Cell method
        $this->Cell($w,$h,$txt,$border,$ln,$align,$fill,$link);
 
        //Reset character spacing/horizontal scaling
        if ($fit)
            $this->_out('BT '.($scale ? '100 Tz' : '0 Tc').' ET');
    }
 
    function CellFitSpace($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
    {
        $this->CellFit($w,$h,$txt,$border,$ln,$align,$fill,$link,false,false);
    }
 
    //Patch to also work with CJK double-byte text
    function MBGetStringLength($s)
    {
        if($this->CurrentFont['type']=='Type0')
        {
            $len = 0;
            $nbbytes = strlen($s);
            for ($i = 0; $i < $nbbytes; $i++)
            {
                if (ord($s[$i])<128)
                    $len++;
                else
                {
                    $len++;
                    $i++;
                }
            }
            return $len;
        }
        else
            return strlen($s);
    }
//**********************************************************************************************
 
 function RoundedRect($x, $y, $w, $h, $r, $style = '', $angle = '1234')
    {
        $k = $this->k;
        $hp = $this->h;
        if($style=='F')
            $op='f';
        elseif($style=='FD' or $style=='DF')
            $op='B';
        else
            $op='S';
        $MyArc = 4/3 * (sqrt(2) - 1);
        $this->_out(sprintf('%.2f %.2f m', ($x+$r)*$k, ($hp-$y)*$k ));
 
        $xc = $x+$w-$r;
        $yc = $y+$r;
        $this->_out(sprintf('%.2f %.2f l', $xc*$k, ($hp-$y)*$k ));
        if (strpos($angle, '2')===false)
            $this->_out(sprintf('%.2f %.2f l', ($x+$w)*$k, ($hp-$y)*$k ));
        else
            $this->_Arc($xc + $r*$MyArc, $yc - $r, $xc + $r, $yc - $r*$MyArc, $xc + $r, $yc);
 
        $xc = $x+$w-$r;
        $yc = $y+$h-$r;
        $this->_out(sprintf('%.2f %.2f l', ($x+$w)*$k, ($hp-$yc)*$k));
        if (strpos($angle, '3')===false)
            $this->_out(sprintf('%.2f %.2f l', ($x+$w)*$k, ($hp-($y+$h))*$k));
        else
            $this->_Arc($xc + $r, $yc + $r*$MyArc, $xc + $r*$MyArc, $yc + $r, $xc, $yc + $r);
 
        $xc = $x+$r;
        $yc = $y+$h-$r;
        $this->_out(sprintf('%.2f %.2f l', $xc*$k, ($hp-($y+$h))*$k));
        if (strpos($angle, '4')===false)
            $this->_out(sprintf('%.2f %.2f l', ($x)*$k, ($hp-($y+$h))*$k));
        else
            $this->_Arc($xc - $r*$MyArc, $yc + $r, $xc - $r, $yc + $r*$MyArc, $xc - $r, $yc);
 
        $xc = $x+$r ;
        $yc = $y+$r;
        $this->_out(sprintf('%.2f %.2f l', ($x)*$k, ($hp-$yc)*$k ));
        if (strpos($angle, '1')===false)
        {
            $this->_out(sprintf('%.2f %.2f l', ($x)*$k, ($hp-$y)*$k ));
            $this->_out(sprintf('%.2f %.2f l', ($x+$r)*$k, ($hp-$y)*$k ));
        }
        else
            $this->_Arc($xc - $r, $yc - $r*$MyArc, $xc - $r*$MyArc, $yc - $r, $xc, $yc - $r);
        $this->_out($op);
    }
 
    function _Arc($x1, $y1, $x2, $y2, $x3, $y3)
    {
        $h = $this->h;
        $this->_out(sprintf('%.2f %.2f %.2f %.2f %.2f %.2f c ', $x1*$this->k, ($h-$y1)*$this->k,
            $x2*$this->k, ($h-$y2)*$this->k, $x3*$this->k, ($h-$y3)*$this->k));
    }

}


        $pdf=new PDF('L','mm','Letter');
	$pdf->Open();
	$pdf->AddPage();
	$pdf->SetMargins(10,10,10);
    // Salto de línea
    $pdf->Ln(10);
    
 
$seleccion = new myDBC();
 
$datosReporte = $seleccion->seleccionar_datos();

$miCabecera = array( 'N°','CEDULA ESCOLAR', 'NOMBRES', 'APELLIDOS','SEXO', 'F. DE NAC.');
$pdf->tablaHorizontal($miCabecera, $datosReporte);



$pdf->Output(); 
?> 
