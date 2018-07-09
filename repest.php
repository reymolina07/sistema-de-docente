<?php
include('fpdf/fpdf.php');
include('conectarse.php');
require('conexion.php');
include_once('querygrasec.php');
include_once('queryrepest.php');
        $link = conectarse();
        $sql = "SELECT * FROM parametros";
        $resultado = mysql_query($sql, $link);
        $lleno = mysql_fetch_array($resultado);
        $anoesc = $lleno['anoescolar'];
/*
   $sql = "SELECT * FROM inscripcion WHERE nuemeroins='$numins'";
   $resultado = mysql_query($sql, $link);
   $lleno = mysql_fetch_array($resultado);

   $cedalu= $lleno['cedulaalu'];
   $cedpad= $lleno['cedulapad'];
   $cedmad= $lleno['cedulamad'];
   $cedrep= $lleno['cedularep']; 
   $ceddoc= $lleno['ceduladoc'];
   $grado= $lleno['grado'];
   $seccion= $lleno['seccion'];
   $fecins= $lleno['fechains'];
   $plaori= $lleno['plantelorigen'];
   $obsins= $lleno['observacion'];
   $anoesc= $lleno['anoescolar'];
  */ 

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
        // PosiciÃ³n: a 1,5 cm del final
        $this->SetY(-12);
        // Arial italic 8
        $this->SetFont('Arial','I',6);
        // NÃºmero de pÃ¡gina
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


        $this->Cell(197,4, 'REPORTE ESTADISTICO',0,1,'C'); 
        $this->SetFont('Arial','',10);	
        $this->Cell(197,4,"Generado el ".$date,0,0,'C'); $this->Ln();
        $this->SetFont('Arial','',11);
        $this->grasecanodoc();
        $this->Ln();
}


    function grasecanodoc()
{ 
        $link = conectarse();
                
   
       $sql = "SELECT * FROM parametros";
       $resultado = mysql_query($sql, $link);
       $lleno = mysql_fetch_array($resultado);
       $anoesc = $lleno['anoescolar'];

   $sql = "SELECT * FROM inscripcion WHERE nuemeroins='$numins'";
   $resultado = mysql_query($sql, $link);
   $lleno = mysql_fetch_array($resultado);

   $cedalu= $lleno['cedulaalu'];
   $cedpad= $lleno['cedulapad'];
   $cedmad= $lleno['cedulamad'];
   $cedrep= $lleno['cedularep']; 
   $ceddoc= $lleno['ceduladoc'];
   $grado= $lleno['grado'];
   $seccion= $lleno['seccion'];
   $fecins= $lleno['fechains'];
   $plaori= $lleno['plantelorigen'];
   $obsins= $lleno['observacion'];
   $anoesc= $lleno['anoescolar'];
        
        $sql = "SELECT * FROM parametros";
        $resultado = mysql_query($sql, $link);
        $lleno = mysql_fetch_array($resultado);
        $anoesc = $lleno['anoescolar'];
       
        $this->SetFont('Arial','',11);
        $this->Cell(197,7,"Ano escolar: ".$anoesc,0,0,'C');
        $this->Ln();
}


 function cabeceraHorizontal($cabecera)
    {
        //ENCABEZADO DE LOS DATOS DEL ESTUDIANTE
        $this->SetXY(10, 57);
        $this->SetFont('Arial','B',10);
        $this->SetFillColor(229, 229, 229);//Fondo azul de celda
        $this->SetTextColor(0, 0, 0); //Letra color blanco
        $ejeX = 10;
        $this->RoundedRect($ejeX, 57, 197, 7, 2, 'FD');
        $this->Cell (197,7, 'NOMINA ESTADISTICA DEL PLANTEL',0, 0 , 'C');

}
    function datosHorizontal($datos){
        $this->SetFont('Arial','',8);
        $this->SetFillColor(235, 235, 235); //Gris tenue de cada fila
        $this->SetTextColor(3, 3, 3); //Color del texto: Negro
        $bandera = false; //Para alternar el relleno
        $ejeY = 64; //AquÃ­ se encuentra la primer CellFitSpace e irÃ¡ incrementando
        $letra = 'D'; //'D' Dibuja borde de cada CellFitSpace -- 'FD' Dibuja borde y rellena
        $link = conectarse();
        $sql = "SELECT * FROM parametros";
        $resultado = mysql_query($sql, $link);
        $lleno = mysql_fetch_array($resultado);
        $anoesc = $lleno['anoescolar'];


//*****************************************
  //sumatoria del grado 1 seccion a
        $ejeX=10;
        $grado = '1';
        $seccion = 'A';
        $confem=0;
        $conmas=0;
        $this->SetXY($ejeX,$ejeY);        
        //desde aqui el encabezado de los grados
        $this->SetFont('Arial','I',10);
        $this->RoundedRect($ejeX, $ejeY, 41, 7, 2, 'D');
        $this->CellFitSpace(41,7, 'GRADO',0, 0 , 'C');
        $ejeX = $ejeX + 41;

        $this->RoundedRect($ejeX, $ejeY, 41, 7, 2, 'D');
        $this->CellFitSpace(41,7, 'SECCION ',0, 0 , 'C');
        $ejeX = $ejeX + 41;

        $this->RoundedRect($ejeX, $ejeY, 41, 7, 2, 'D');
        $this->CellFitSpace(41,7, 'MASCULINOS',0, 0 , 'C');
        $ejeX = $ejeX + 41;

        $this->RoundedRect($ejeX, $ejeY, 41, 7, 2, 'D');
        $this->CellFitSpace(41,7, 'FEMENINOS',0, 0 , 'C');
        $ejeX = $ejeX + 41;

        $this->RoundedRect($ejeX, $ejeY, 33, 7, 2, 'D');
        $this->CellFitSpace(33,7, 'TOTAL',0, 0 , 'C');
        $ejeY=$ejeY+7;
        $this->SetXY(10,$ejeY);
        $this->SetFont('Arial','',8);
       // hasta aqui el encabezado del grado



       foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='FEMENINO'){
                   $confem=$confem+1; 
                 }
               }
            }
          }
        }
     foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='MASCULINO'){
                   $conmas=$conmas+1; 
                 }
               }
            }
          }
        }
           //imprimo los totales que tengo del grado 1 seccion a
	    $total1a=$conmas+$confem;    //sumar los contadores de masculino y femenino
          if ($total1a<>0) {            //aca comparo el total, si es 0 no me lo imprime en el reporte, ya que serian muchas secciones sin informacion util
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(41,5, $grado,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $seccion,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $confem,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $conmas,'R', 0 , 'C' );
	    $this->CellFitSpace(33,5, $total1a ,'0', 0 , 'C' );
            $ejeY=$ejeY+5;}

  //sumatoria del grado 1 seccion b
        $this->SetXY(10,$ejeY);
        $grado = '1';
        $seccion = 'B';
        $confem=0;
        $conmas=0;
       foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='FEMENINO'){
                   $confem=$confem+1; 
                 }
               }
            }
          }
        }
     foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='MASCULINO'){
                   $conmas=$conmas+1; 
                 }
               }
            }
          }
        }
           //imprimo los totales que tengo del grado 1 seccion a

	    $total1b=$conmas+$confem;
        if ($total1b<>0) {
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(41,5, $grado,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $seccion,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $confem,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $conmas,'R', 0 , 'C' );
	    $this->CellFitSpace(33,5, $total1b ,'0', 0 , 'C' );
            $ejeY=$ejeY+5;
        }
//sumatoria del grado 1 seccion c
        $this->SetXY(10,$ejeY);
        $grado = '1';
        $seccion = 'C';
        $confem=0;
        $conmas=0;
       foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='FEMENINO'){
                   $confem=$confem+1; 
                 }
               }
            }
          }
        }
     foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='MASCULINO'){
                   $conmas=$conmas+1; 
                 }
               }
            }
          }
        }
           //imprimo los totales que tengo del grado 1 seccion a
	    $total1c=$conmas+$confem;
        if ($total1c<>0) {
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(41,5, $grado,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $seccion,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $confem,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $conmas,'R', 0 , 'C' );
	    $this->CellFitSpace(33,5, $total1c ,'0', 0 , 'C' );
            $ejeY=$ejeY+5;
        }
  //sumatoria del grado 1 seccion D
        $this->SetXY(10,$ejeY);
        $grado = '1';
        $seccion = 'D';
        $confem=0;
        $conmas=0;
       foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='FEMENINO'){
                   $confem=$confem+1; 
                 }
               }
            }
          }
        }
     foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='MASCULINO'){
                   $conmas=$conmas+1; 
                 }
               }
            }
          }
        }
           //imprimo los totales que tengo del grado 1 seccion d
	    $total1d=$conmas+$confem;
         if ($total1d<>0) {
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(41,5, $grado,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $seccion,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $confem,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $conmas,'R', 0 , 'C' );
	    $this->CellFitSpace(33,5, $total1d ,'0', 0 , 'C' );
            $ejeY=$ejeY+5;}
 //sumatoria del grado 1 seccion E
        $this->SetXY(10,$ejeY);
        $grado = '1';
        $seccion = 'E';
        $confem=0;
        $conmas=0;
       foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='FEMENINO'){
                   $confem=$confem+1; 
                 }
               }
            }
          }
        }
     foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='MASCULINO'){
                   $conmas=$conmas+1; 
                 }
               }
            }
          }
        }
           //imprimo los totales que tengo del grado 1 seccion a
	    $total1e=$conmas+$confem;
        if ($total1e<>0) {
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(41,5, $grado,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $seccion,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $confem,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $conmas,'R', 0 , 'C' );
	    $this->CellFitSpace(33,5, $total1e,'0', 0 , 'C' );
            $ejeY=$ejeY+5;
        }
 //sumatoria del grado 1 seccion F
        $this->SetXY(10,$ejeY);
        $grado = '1';
        $seccion = 'F';
        $confem=0;
        $conmas=0;
       foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='FEMENINO'){
                   $confem=$confem+1; 
                 }
               }
            }
          }
        }
     foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='MASCULINO'){
                   $conmas=$conmas+1; 
                 }
               }
            }
          }
        }
           //imprimo los totales que tengo del grado 1 seccion a
	    $total1f=$conmas+$confem;
        if ($total1f<>0) {
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(41,5, $grado,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $seccion,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $confem,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $conmas,'R', 0 , 'C' );
	    $this->CellFitSpace(33,5, $total1f ,'0', 0 , 'C' );
            $ejeY=$ejeY+5;
        }
 //sumatoria del grado 1 seccion G
        $this->SetXY(10,$ejeY);
        $grado = '1';
        $seccion = 'G';
        $confem=0;
        $conmas=0;
       foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='FEMENINO'){
                   $confem=$confem+1; 
                 }
               }
            }
          }
        }
     foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='MASCULINO'){
                   $conmas=$conmas+1; 
                 }
               }
            }
          }
        }
           //imprimo los totales que tengo del grado 1 seccion a
	    $total1g=$conmas+$confem;
        if ($total1g<>0) {
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(41,5, $grado,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $seccion,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $confem,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $conmas,'R', 0 , 'C' );
	    $this->CellFitSpace(33,5, $total1g ,'0', 0 , 'C' );
            $ejeY=$ejeY+5;
        }
 //sumatoria del grado 1 seccion H
        $this->SetXY(10,$ejeY);
        $grado = '1';
        $seccion = 'H';
        $confem=0;
        $conmas=0;
       foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='FEMENINO'){
                   $confem=$confem+1; 
                 }
               }
            }
          }
        }
     foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='MASCULINO'){
                   $conmas=$conmas+1; 
                 }
               }
            }
          }
        }
           //imprimo los totales que tengo del grado 1 seccion a
	    $total1h=$conmas+$confem;
        if ($total1h<>0) { 
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(41,5, $grado,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $seccion,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $confem,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $conmas,'R', 0 , 'C' );
	    $this->CellFitSpace(33,5, $total1h ,'0', 0 , 'C' );
            $ejeY=$ejeY+5;
        }
       $total1=$total1a+$total1b+$total1c+$total1d+$total1e+$total1f+$total1g+$total1h;
     if ($total1a<>0) { 
       $this->SetXY(141,$ejeY);
       $this->SetFont('Arial','IB',10);
       $this->RoundedRect(174, $ejeY, 33, 5, 2, $letra);
       $this->CellFitSpace(33,5,'Total Primer Grado: ','0', 0 , 'C' );
       $this->CellFitSpace(33,5,$total1 ,'0', 0 , 'C' );
       $ejeY=$ejeY+5;
     }
/***************************************/

// repetimos la rutina con segundo grado... para totalizar los  alumnos

//*****************************************
  //sumatoria del grado 2 seccion a
        $this->SetFont('Arial','',10);
        $this->SetXY(10,$ejeY); 
        $grado = '2';
        $seccion = 'A';
        $confem=0;
        $conmas=0;
       foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='FEMENINO'){
                   $confem=$confem+1; 
                 }
               }
            }
          }
        }
     foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='MASCULINO'){
                   $conmas=$conmas+1; 
                 }
               }
            }
          }
        }
           //imprimo los totales que tengo del grado 2 seccion a
	    $total2a=$conmas+$confem;    //sumar los contadores de masculino y femenino
          if ($total2a<>0) {           //aca comparo el total, si es 0 no me lo imprime en el reporte, ya que serian muchas secciones sin informacion util
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(41,5, $grado,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $seccion,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $confem,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $conmas,'R', 0 , 'C' );
	    $this->CellFitSpace(33,5, $total2a ,'0', 0 , 'C' );
            $ejeY=$ejeY+5;}

  //sumatoria del grado 2 seccion b
        $this->SetXY(10,$ejeY);
        $grado = '2';
        $seccion = 'B';
        $confem=0;
        $conmas=0;
       foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='FEMENINO'){
                   $confem=$confem+1; 
                 }
               }
            }
          }
        }
     foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='MASCULINO'){
                   $conmas=$conmas+1; 
                 }
               }
            }
          }
        }
           //imprimo los totales que tengo del grado 2 seccion b

	    $total2b=$conmas+$confem;
        if ($total2b<>0) {
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(41,5, $grado,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $seccion,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $confem,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $conmas,'R', 0 , 'C' );
	    $this->CellFitSpace(33,5, $total2b ,'0', 0 , 'C' );
            $ejeY=$ejeY+5;
        }
//sumatoria del grado 2 seccion c
        $this->SetXY(10,$ejeY);
        $grado = '2';
        $seccion = 'C';
        $confem=0;
        $conmas=0;
       foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='FEMENINO'){
                   $confem=$confem+1; 
                 }
               }
            }
          }
        }
     foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='MASCULINO'){
                   $conmas=$conmas+1; 
                 }
               }
            }
          }
        }
           //imprimo los totales que tengo del grado 2 seccion c
	    $total2c=$conmas+$confem;
        if ($total2c<>0) {
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(41,5, $grado,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $seccion,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $confem,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $conmas,'R', 0 , 'C' );
	    $this->CellFitSpace(33,5, $total2c ,'0', 0 , 'C' );
            $ejeY=$ejeY+5;
        }
  //sumatoria del grado 2 seccion D
        $this->SetXY(10,$ejeY);
        $grado = '2';
        $seccion = 'D';
        $confem=0;
        $conmas=0;
       foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='FEMENINO'){
                   $confem=$confem+1; 
                 }
               }
            }
          }
        }
     foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='MASCULINO'){
                   $conmas=$conmas+1; 
                 }
               }
            }
          }
        }
           //imprimo los totales que tengo del grado 1 seccion a
	    $total2d=$conmas+$confem;
         if ($total2d<>0) {
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(41,5, $grado,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $seccion,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $confem,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $conmas,'R', 0 , 'C' );
	    $this->CellFitSpace(33,5, $total2d ,'0', 0 , 'C' );
            $ejeY=$ejeY+5;
         }
 //sumatoria del grado 2 seccion E
        $this->SetXY(10,$ejeY);
        $grado = '2';
        $seccion = 'E';
        $confem=0;
        $conmas=0;
       foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='FEMENINO'){
                   $confem=$confem+1; 
                 }
               }
            }
          }
        }
     foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='MASCULINO'){
                   $conmas=$conmas+1; 
                 }
               }
            }
          }
        }
           //imprimo los totales que tengo del grado 1 seccion a
	    $total2e=$conmas+$confem;
        if ($total2e<>0) {
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(41,5, $grado,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $seccion,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $confem,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $conmas,'R', 0 , 'C' );
	    $this->CellFitSpace(33,5, $total2e,'0', 0 , 'C' );
            $ejeY=$ejeY+5;
        }
 //sumatoria del grado 2 seccion F
        $this->SetXY(10,$ejeY);
        $grado = '2';
        $seccion = 'F';
        $confem=0;
        $conmas=0;
       foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='FEMENINO'){
                   $confem=$confem+1; 
                 }
               }
            }
          }
        }
     foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='MASCULINO'){
                   $conmas=$conmas+1; 
                 }
               }
            }
          }
        }
           //imprimo los totales que tengo del grado 1 seccion a
	    $total2f=$conmas+$confem;
        if ($total2f<>0) {
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(41,5, $grado,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $seccion,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $confem,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $conmas,'R', 0 , 'C' );
	    $this->CellFitSpace(33,5, $total2f ,'0', 0 , 'C' );
            $ejeY=$ejeY+5;
        }
 //sumatoria del grado 2 seccion G
        $this->SetXY(10,$ejeY);
        $grado = '2';
        $seccion = 'G';
        $confem=0;
        $conmas=0;
       foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='FEMENINO'){
                   $confem=$confem+1; 
                 }
               }
            }
          }
        }
     foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='MASCULINO'){
                   $conmas=$conmas+1; 
                 }
               }
            }
          }
        }
           //imprimo los totales que tengo del grado 1 seccion a
	    $total2g=$conmas+$confem;
        if ($total2g<>0) {
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(41,5, $grado,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $seccion,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $confem,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $conmas,'R', 0 , 'C' );
	    $this->CellFitSpace(33,5, $total2g ,'0', 0 , 'C' );
            $ejeY=$ejeY+5;
        }
 //sumatoria del grado 2 seccion H
        $this->SetXY(10,$ejeY);
        $grado = '2';
        $seccion = 'H';
        $confem=0;
        $conmas=0;
       foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='FEMENINO'){
                   $confem=$confem+1; 
                 }
               }
            }
          }
        }
     foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='MASCULINO'){
                   $conmas=$conmas+1; 
                 }
               }
            }
          }
        }
           //imprimo los totales que tengo del grado 1 seccion a
	    $total2h=$conmas+$confem;
        if ($total2h<>0) { 
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(41,5, $grado,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $seccion,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $confem,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $conmas,'R', 0 , 'C' );
	    $this->CellFitSpace(33,5, $total2h ,'0', 0 , 'C' );
            $ejeY=$ejeY+5;
        }
       $total2=$total2a+$total2b+$total2c+$total2d+$total2e+$total2f+$total2g+$total2h;
     if ($total2<>0) { 
       $this->SetXY(141,$ejeY);
       $this->SetFont('Arial','IB',10);
       $this->RoundedRect(174, $ejeY, 33, 5, 2, $letra);
       $this->CellFitSpace(33,5,'Total Segundo Grado: ','0', 0 , 'C' );
       $this->CellFitSpace(33,5,$total2 ,'0', 0 , 'C' );
       $ejeY=$ejeY+5;
     }
/***************************************/
// tercer grado
//*****************************************
  //sumatoria del grado 3 seccion a
        $this->SetFont('Arial','',10);
        $ejeX=10;
        $grado = '3';
        $seccion = 'A';
        $confem=0;
        $conmas=0;
        $this->SetXY($ejeX,$ejeY);        
        foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='FEMENINO'){
                   $confem=$confem+1; 
                 }
               }
            }
          }
        }
     foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='MASCULINO'){
                   $conmas=$conmas+1; 
                 }
               }
            }
          }
        }
           //imprimo los totales que tengo del grado 3 seccion a
	    $total3a=$conmas+$confem;    //sumar los contadores de masculino y femenino
          if ($total3a<>0) {           //aca comparo el total, si es 0 no me lo imprime en el reporte, ya que serian muchas secciones sin informacion util
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(41,5, $grado,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $seccion,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $confem,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $conmas,'R', 0 , 'C' );
	    $this->CellFitSpace(33,5, $total3a ,'0', 0 , 'C' );
            $ejeY=$ejeY+5;}

  //sumatoria del grado 3 seccion b
        $this->SetXY(10,$ejeY);
        $grado = '3';
        $seccion = 'B';
        $confem=0;
        $conmas=0;
       foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='FEMENINO'){
                   $confem=$confem+1; 
                 }
               }
            }
          }
        }
     foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='MASCULINO'){
                   $conmas=$conmas+1; 
                 }
               }
            }
          }
        }
           //imprimo los totales que tengo del grado 3 seccion b

	    $total3b=$conmas+$confem;
        if ($total3b<>0) {
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(41,5, $grado,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $seccion,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $confem,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $conmas,'R', 0 , 'C' );
	    $this->CellFitSpace(33,5, $total3b ,'0', 0 , 'C' );
            $ejeY=$ejeY+5;
        }
//sumatoria del grado 3 seccion c
        $this->SetXY(10,$ejeY);
        $grado = '3';
        $seccion = 'C';
        $confem=0;
        $conmas=0;
       foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='FEMENINO'){
                   $confem=$confem+1; 
                 }
               }
            }
          }
        }
     foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='MASCULINO'){
                   $conmas=$conmas+1; 
                 }
               }
            }
          }
        }
           //imprimo los totales que tengo del grado 3 seccion c
	    $total3c=$conmas+$confem;
        if ($total3c<>0) {
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(41,5, $grado,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $seccion,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $confem,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $conmas,'R', 0 , 'C' );
	    $this->CellFitSpace(33,5, $total3c ,'0', 0 , 'C' );
            $ejeY=$ejeY+5;
        }
  //sumatoria del grado 3 seccion D
        $this->SetXY(10,$ejeY);
        $grado = '3';
        $seccion = 'D';
        $confem=0;
        $conmas=0;
       foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='FEMENINO'){
                   $confem=$confem+1; 
                 }
               }
            }
          }
        }
     foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='MASCULINO'){
                   $conmas=$conmas+1; 
                 }
               }
            }
          }
        }
           //imprimo los totales que tengo del grado 1 seccion a
	    $total3d=$conmas+$confem;
         if ($total3d<>0) {
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(41,5, $grado,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $seccion,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $confem,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $conmas,'R', 0 , 'C' );
	    $this->CellFitSpace(33,5, $total3d ,'0', 0 , 'C' );
            $ejeY=$ejeY+5;
         }
 //sumatoria del grado 3 seccion E
        $this->SetXY(10,$ejeY);
        $grado = '3';
        $seccion = 'E';
        $confem=0;
        $conmas=0;
       foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='FEMENINO'){
                   $confem=$confem+1; 
                 }
               }
            }
          }
        }
     foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='MASCULINO'){
                   $conmas=$conmas+1; 
                 }
               }
            }
          }
        }
           //imprimo los totales que tengo del grado 1 seccion a
	    $total3e=$conmas+$confem;
        if ($total3e<>0) {
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(41,5, $grado,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $seccion,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $confem,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $conmas,'R', 0 , 'C' );
	    $this->CellFitSpace(33,5, $total3e,'0', 0 , 'C' );
            $ejeY=$ejeY+5;
        }
 //sumatoria del grado 3 seccion F
        $this->SetXY(10,$ejeY);
        $grado = '3';
        $seccion = 'F';
        $confem=0;
        $conmas=0;
       foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='FEMENINO'){
                   $confem=$confem+1; 
                 }
               }
            }
          }
        }
     foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='MASCULINO'){
                   $conmas=$conmas+1; 
                 }
               }
            }
          }
        }
           //imprimo los totales que tengo del grado 1 seccion a
	    $total3f=$conmas+$confem;
        if ($total3f<>0) {
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(41,5, $grado,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $seccion,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $confem,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $conmas,'R', 0 , 'C' );
	    $this->CellFitSpace(33,5, $total3f ,'0', 0 , 'C' );
            $ejeY=$ejeY+5;
        }
 //sumatoria del grado 3 seccion G
        $this->SetXY(10,$ejeY);
        $grado = '3';
        $seccion = 'G';
        $confem=0;
        $conmas=0;
       foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='FEMENINO'){
                   $confem=$confem+1; 
                 }
               }
            }
          }
        }
     foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='MASCULINO'){
                   $conmas=$conmas+1; 
                 }
               }
            }
          }
        }
           //imprimo los totales que tengo del grado 1 seccion a
	    $total3g=$conmas+$confem;
        if ($total3g<>0) {
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(41,5, $grado,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $seccion,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $confem,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $conmas,'R', 0 , 'C' );
	    $this->CellFitSpace(33,5, $total3g ,'0', 0 , 'C' );
            $ejeY=$ejeY+5;
        }
 //sumatoria del grado 3 seccion H
        $this->SetXY(10,$ejeY);
        $grado = '3';
        $seccion = 'H';
        $confem=0;
        $conmas=0;
       foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='FEMENINO'){
                   $confem=$confem+1; 
                 }
               }
            }
          }
        }
     foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='MASCULINO'){
                   $conmas=$conmas+1; 
                 }
               }
            }
          }
        }
           //imprimo los totales que tengo del grado 1 seccion a
	    $total3h=$conmas+$confem;
        if ($total3h<>0) { 
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(41,5, $grado,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $seccion,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $confem,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $conmas,'R', 0 , 'C' );
	    $this->CellFitSpace(33,5, $total3h ,'0', 0 , 'C' );
            $ejeY=$ejeY+5;
        }
       $total3=$total3a+$total3b+$total3c+$total3d+$total3e+$total3f+$total3g+$total3h;
     if ($total3<>0) { 
       $this->SetFont('Arial','IB',10);
       $this->SetXY(141,$ejeY);
       $this->RoundedRect(174, $ejeY, 33, 5, 2, $letra);
       $this->CellFitSpace(33,5,'Total Tercer Grado: ','0', 0 , 'C' );
       $this->CellFitSpace(33,5,$total3 ,'0', 0 , 'C' );
       $ejeY=$ejeY+5;
     }
/***************************************/
// cuarto grado
//*****************************************
  //sumatoria del grado 4 seccion a
        $this->SetFont('Arial','',10);
        $this->SetXY(10,$ejeY);
        $grado = '4';
        $seccion = 'A';
        $confem=0;
        $conmas=0;

        $ejeX = 10;

       foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='FEMENINO'){
                   $confem=$confem+1; 
                 }
               }
            }
          }
        }
     foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='MASCULINO'){
                   $conmas=$conmas+1; 
                 }
               }
            }
          }
        }
           //imprimo los totales que tengo del grado 4 seccion a
	    $total4a=$conmas+$confem;    //sumar los contadores de masculino y femenino
          if ($total4a<>0) {           //aca comparo el total, si es 0 no me lo imprime en el reporte, ya que serian muchas secciones sin informacion util
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(41,5, $grado,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $seccion,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $confem,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $conmas,'R', 0 , 'C' );
	    $this->CellFitSpace(33,5, $total4a ,'0', 0 , 'C' );
            $ejeY=$ejeY+5;}

  //sumatoria del grado 4 seccion b
        $this->SetXY(10,$ejeY);
        $grado = '4';
        $seccion = 'B';
        $confem=0;
        $conmas=0;
       foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='FEMENINO'){
                   $confem=$confem+1; 
                 }
               }
            }
          }
        }
     foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='MASCULINO'){
                   $conmas=$conmas+1; 
                 }
               }
            }
          }
        }
           //imprimo los totales que tengo del grado 4 seccion b

	    $total4b=$conmas+$confem;
        if ($total4b<>0) {
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(41,5, $grado,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $seccion,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $confem,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $conmas,'R', 0 , 'C' );
	    $this->CellFitSpace(33,5, $total4b ,'0', 0 , 'C' );
            $ejeY=$ejeY+5;
        }
//sumatoria del grado 4 seccion c
        $this->SetXY(10,$ejeY);
        $grado = '4';
        $seccion = 'C';
        $confem=0;
        $conmas=0;
       foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='FEMENINO'){
                   $confem=$confem+1; 
                 }
               }
            }
          }
        }
     foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='MASCULINO'){
                   $conmas=$conmas+1; 
                 }
               }
            }
          }
        }
           //imprimo los totales que tengo del grado 4 seccion c
	    $total4c=$conmas+$confem;
        if ($total4c<>0) {
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(41,5, $grado,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $seccion,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $confem,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $conmas,'R', 0 , 'C' );
	    $this->CellFitSpace(33,5, $total4c ,'0', 0 , 'C' );
            $ejeY=$ejeY+5;
        }
  //sumatoria del grado 4 seccion D
        $this->SetXY(10,$ejeY);
        $grado = '4';
        $seccion = 'D';
        $confem=0;
        $conmas=0;
       foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='FEMENINO'){
                   $confem=$confem+1; 
                 }
               }
            }
          }
        }
     foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='MASCULINO'){
                   $conmas=$conmas+1; 
                 }
               }
            }
          }
        }
           //imprimo los totales que tengo del grado 1 seccion a
	    $total4d=$conmas+$confem;
         if ($total4d<>0) {
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(41,5, $grado,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $seccion,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $confem,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $conmas,'R', 0 , 'C' );
	    $this->CellFitSpace(33,5, $total4d ,'0', 0 , 'C' );
            $ejeY=$ejeY+5;
         }
 //sumatoria del grado 4 seccion E
        $this->SetXY(10,$ejeY);
        $grado = '4';
        $seccion = 'E';
        $confem=0;
        $conmas=0;
       foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='FEMENINO'){
                   $confem=$confem+1; 
                 }
               }
            }
          }
        }
     foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='MASCULINO'){
                   $conmas=$conmas+1; 
                 }
               }
            }
          }
        }
           //imprimo los totales que tengo del grado 4 seccion e
	    $total4e=$conmas+$confem;
        if ($total4e<>0) {
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(41,5, $grado,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $seccion,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $confem,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $conmas,'R', 0 , 'C' );
	    $this->CellFitSpace(33,5, $total4e,'0', 0 , 'C' );
            $ejeY=$ejeY+5;
        }
 //sumatoria del grado 4 seccion F
        $this->SetXY(10,$ejeY);
        $grado = '4';
        $seccion = 'F';
        $confem=0;
        $conmas=0;
       foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='FEMENINO'){
                   $confem=$confem+1; 
                 }
               }
            }
          }
        }
     foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='MASCULINO'){
                   $conmas=$conmas+1; 
                 }
               }
            }
          }
        }
           //imprimo los totales que tengo del grado 4 seccion f
	    $total4f=$conmas+$confem;
        if ($total4f<>0) {
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(41,5, $grado,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $seccion,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $confem,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $conmas,'R', 0 , 'C' );
	    $this->CellFitSpace(33,5, $total4f ,'0', 0 , 'C' );
            $ejeY=$ejeY+5;
        }
 //sumatoria del grado 4 seccion G
        $this->SetXY(10,$ejeY);
        $grado = '4';
        $seccion = 'G';
        $confem=0;
        $conmas=0;
       foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='FEMENINO'){
                   $confem=$confem+1; 
                 }
               }
            }
          }
        }
     foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='MASCULINO'){
                   $conmas=$conmas+1; 
                 }
               }
            }
          }
        }
           //imprimo los totales que tengo del grado 4 seccion g
	    $total4g=$conmas+$confem;
        if ($total4g<>0) {
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(41,5, $grado,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $seccion,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $confem,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $conmas,'R', 0 , 'C' );
	    $this->CellFitSpace(33,5, $total4g ,'0', 0 , 'C' );
            $ejeY=$ejeY+5;
        }
 //sumatoria del grado 4 seccion H
        $this->SetXY(10,$ejeY);
        $grado = '4';
        $seccion = 'H';
        $confem=0;
        $conmas=0;
       foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='FEMENINO'){
                   $confem=$confem+1; 
                 }
               }
            }
          }
        }
     foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='MASCULINO'){
                   $conmas=$conmas+1; 
                 }
               }
            }
          }
        }
           //imprimo los totales que tengo del grado 4 seccion h
	    $total4h=$conmas+$confem;
        if ($total4h<>0) { 
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(41,5, $grado,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $seccion,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $confem,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $conmas,'R', 0 , 'C' );
	    $this->CellFitSpace(33,5, $total4h ,'0', 0 , 'C' );
            $ejeY=$ejeY+5;
        }
       $total4=$total4a+$total4b+$total4c+$total4d+$total4e+$total4f+$total4g+$total4h;
     if ($total4<>0) { 
       $this->SetXY(141,$ejeY);
       $this->SetFont('Arial','IB',10);
       $this->RoundedRect(174, $ejeY, 33, 5, 2, $letra);
       $this->CellFitSpace(33,5,'Total Cuarto Grado: ','0', 0 , 'C' );
       $this->CellFitSpace(33,5,$total4 ,'0', 0 , 'C' );
       $ejeY=$ejeY+5;
     }
/***************************************/
// quinto grado
//*****************************************
  //sumatoria del grado 5 seccion a
       $this->SetFont('Arial','',10);
        $this->SetXY(10,$ejeY);
        $grado = '5';
        $seccion = 'A';
        $confem=0;
        $conmas=0;

        $ejeX = 10;

       foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='FEMENINO'){
                   $confem=$confem+1; 
                 }
               }
            }
          }
        }
     foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='MASCULINO'){
                   $conmas=$conmas+1; 
                 }
               }
            }
          }
        }
           //imprimo los totales que tengo del grado 5 seccion a
	    $total5a=$conmas+$confem;    //sumar los contadores de masculino y femenino
          if ($total5a<>0) {           //aca comparo el total, si es 0 no me lo imprime en el reporte, ya que serian muchas secciones sin informacion util
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(41,5, $grado,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $seccion,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $confem,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $conmas,'R', 0 , 'C' );
	    $this->CellFitSpace(33,5, $total5a ,'0', 0 , 'C' );
            $ejeY=$ejeY+5;}

  //sumatoria del grado 5 seccion b
        $this->SetXY(10,$ejeY);
        $grado = '5';
        $seccion = 'B';
        $confem=0;
        $conmas=0;
       foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='FEMENINO'){
                   $confem=$confem+1; 
                 }
               }
            }
          }
        }
     foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='MASCULINO'){
                   $conmas=$conmas+1; 
                 }
               }
            }
          }
        }
           //imprimo los totales que tengo del grado 5 seccion b

	    $total5b=$conmas+$confem;
        if ($total5b<>0) {
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(41,5, $grado,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $seccion,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $confem,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $conmas,'R', 0 , 'C' );
	    $this->CellFitSpace(33,5, $total5b ,'0', 0 , 'C' );
            $ejeY=$ejeY+5;
        }
//sumatoria del grado 5 seccion c
        $this->SetXY(10,$ejeY);
        $grado = '5';
        $seccion = 'C';
        $confem=0;
        $conmas=0;
       foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='FEMENINO'){
                   $confem=$confem+1; 
                 }
               }
            }
          }
        }
     foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='MASCULINO'){
                   $conmas=$conmas+1; 
                 }
               }
            }
          }
        }
           //imprimo los totales que tengo del grado 5 seccion c
	    $total5c=$conmas+$confem;
        if ($total5c<>0) {
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(41,5, $grado,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $seccion,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $confem,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $conmas,'R', 0 , 'C' );
	    $this->CellFitSpace(33,5, $total5c ,'0', 0 , 'C' );
            $ejeY=$ejeY+5;
        }
  //sumatoria del grado 5 seccion D
        $this->SetXY(10,$ejeY);
        $grado = '5';
        $seccion = 'D';
        $confem=0;
        $conmas=0;
       foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='FEMENINO'){
                   $confem=$confem+1; 
                 }
               }
            }
          }
        }
     foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='MASCULINO'){
                   $conmas=$conmas+1; 
                 }
               }
            }
          }
        }
           //imprimo los totales que tengo del grado 1 seccion a
	    $total5d=$conmas+$confem;
         if ($total5d<>0) {
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(41,5, $grado,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $seccion,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $confem,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $conmas,'R', 0 , 'C' );
	    $this->CellFitSpace(33,5, $total5d ,'0', 0 , 'C' );
            $ejeY=$ejeY+5;
         }
 //sumatoria del grado 5 seccion E
        $this->SetXY(10,$ejeY);
        $grado = '5';
        $seccion = 'E';
        $confem=0;
        $conmas=0;
       foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='FEMENINO'){
                   $confem=$confem+1; 
                 }
               }
            }
          }
        }
     foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='MASCULINO'){
                   $conmas=$conmas+1; 
                 }
               }
            }
          }
        }
           //imprimo los totales que tengo del grado 5 seccion e
	    $total5e=$conmas+$confem;
        if ($total5e<>0) {
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(41,5, $grado,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $seccion,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $confem,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $conmas,'R', 0 , 'C' );
	    $this->CellFitSpace(33,5, $total5e,'0', 0 , 'C' );
            $ejeY=$ejeY+5;
        }
 //sumatoria del grado 5 seccion F
        $this->SetXY(10,$ejeY);
        $grado = '5';
        $seccion = 'F';
        $confem=0;
        $conmas=0;
       foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='FEMENINO'){
                   $confem=$confem+1; 
                 }
               }
            }
          }
        }
     foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='MASCULINO'){
                   $conmas=$conmas+1; 
                 }
               }
            }
          }
        }
           //imprimo los totales que tengo del grado 5 seccion f
	    $total5f=$conmas+$confem;
        if ($total5f<>0) {
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(41,5, $grado,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $seccion,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $confem,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $conmas,'R', 0 , 'C' );
	    $this->CellFitSpace(33,5, $total5f ,'0', 0 , 'C' );
            $ejeY=$ejeY+5;
        }
 //sumatoria del grado 5 seccion G
        $this->SetXY(10,$ejeY);
        $grado = '5';
        $seccion = 'G';
        $confem=0;
        $conmas=0;
       foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='FEMENINO'){
                   $confem=$confem+1; 
                 }
               }
            }
          }
        }
     foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='MASCULINO'){
                   $conmas=$conmas+1; 
                 }
               }
            }
          }
        }
           //imprimo los totales que tengo del grado 5 seccion g
	    $total5g=$conmas+$confem;
        if ($total5g<>0) {
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(41,5, $grado,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $seccion,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $confem,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $conmas,'R', 0 , 'C' );
	    $this->CellFitSpace(33,5, $total5g ,'0', 0 , 'C' );
            $ejeY=$ejeY+5;
        }
 //sumatoria del grado 5 seccion H
        $this->SetXY(10,$ejeY);
        $grado = '5';
        $seccion = 'H';
        $confem=0;
        $conmas=0;
       foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='FEMENINO'){
                   $confem=$confem+1; 
                 }
               }
            }
          }
        }
     foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='MASCULINO'){
                   $conmas=$conmas+1; 
                 }
               }
            }
          }
        }
           //imprimo los totales que tengo del grado 5 seccion h
	    $total5h=$conmas+$confem;
        if ($total5h<>0) { 
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(41,5, $grado,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $seccion,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $confem,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $conmas,'R', 0 , 'C' );
	    $this->CellFitSpace(33,5, $total5h ,'0', 0 , 'C' );
            $ejeY=$ejeY+5;
        }
       $total5=$total5a+$total5b+$total5c+$total5d+$total5e+$total5f+$total5g+$total5h;
     if ($total5<>0) { 
       $this->SetXY(141,$ejeY);
       $this->SetFont('Arial','IB',10);
       $this->RoundedRect(174, $ejeY, 33, 5, 2, $letra);
       $this->CellFitSpace(33,5,'Total Quinto Grado: ','0', 0 , 'C' );
       $this->CellFitSpace(33,5,$total5 ,'0', 0 , 'C' );
       $ejeY=$ejeY+5;
     }
/***************************************/
// Sexo grado grado ****************************************
//*****************************************
  //sumatoria del grado 6 seccion a
        $this->SetFont('Arial','',10);
        $this->SetXY(10,$ejeY);
        $grado = '6';
        $seccion = 'A';
        $confem=0;
        $conmas=0;

        $ejeX = 10;

       foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='FEMENINO'){
                   $confem=$confem+1; 
                 }
               }
            }
          }
        }
     foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='MASCULINO'){
                   $conmas=$conmas+1; 
                 }
               }
            }
          }
        }
           //imprimo los totales que tengo del grado 6 seccion a
	    $total6a=$conmas+$confem;    //sumar los contadores de masculino y femenino
          if ($total6a<>0) {           //aca comparo el total, si es 0 no me lo imprime en el reporte, ya que serian muchas secciones sin informacion util
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(41,5, $grado,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $seccion,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $confem,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $conmas,'R', 0 , 'C' );
	    $this->CellFitSpace(33,5, $total6a ,'0', 0 , 'C' );
            $ejeY=$ejeY+5;}

  //sumatoria del grado 6 seccion b
        $this->SetXY(10,$ejeY);
        $grado = '6';
        $seccion = 'B';
        $confem=0;
        $conmas=0;
       foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='FEMENINO'){
                   $confem=$confem+1; 
                 }
               }
            }
          }
        }
     foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='MASCULINO'){
                   $conmas=$conmas+1; 
                 }
               }
            }
          }
        }
           //imprimo los totales que tengo del grado 6 seccion b

	    $total6b=$conmas+$confem;
        if ($total6b<>0) {
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(41,5, $grado,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $seccion,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $confem,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $conmas,'R', 0 , 'C' );
	    $this->CellFitSpace(33,5, $total6b ,'0', 0 , 'C' );
            $ejeY=$ejeY+5;
        }
//sumatoria del grado 6 seccion c
        $this->SetXY(10,$ejeY);
        $grado = '6';
        $seccion = 'C';
        $confem=0;
        $conmas=0;
       foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='FEMENINO'){
                   $confem=$confem+1; 
                 }
               }
            }
          }
        }
     foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='MASCULINO'){
                   $conmas=$conmas+1; 
                 }
               }
            }
          }
        }
           //imprimo los totales que tengo del grado 6 seccion c
	    $total6c=$conmas+$confem;
        if ($total6c<>0) {
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(41,5, $grado,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $seccion,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $confem,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $conmas,'R', 0 , 'C' );
	    $this->CellFitSpace(33,5, $total6c ,'0', 0 , 'C' );
            $ejeY=$ejeY+5;
        }
  //sumatoria del grado 6 seccion D
        $this->SetXY(10,$ejeY);
        $grado = '6';
        $seccion = 'D';
        $confem=0;
        $conmas=0;
       foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='FEMENINO'){
                   $confem=$confem+1; 
                 }
               }
            }
          }
        }
     foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='MASCULINO'){
                   $conmas=$conmas+1; 
                 }
               }
            }
          }
        }
           //imprimo los totales que tengo del grado 1 seccion a
	    $total6d=$conmas+$confem;
         if ($total6d<>0) {
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(41,5, $grado,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $seccion,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $confem,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $conmas,'R', 0 , 'C' );
	    $this->CellFitSpace(33,5, $total6d ,'0', 0 , 'C' );
            $ejeY=$ejeY+5;
         }
 //sumatoria del grado 6 seccion E
        $this->SetXY(10,$ejeY);
        $grado = '6';
        $seccion = 'E';
        $confem=0;
        $conmas=0;
       foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='FEMENINO'){
                   $confem=$confem+1; 
                 }
               }
            }
          }
        }
     foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='MASCULINO'){
                   $conmas=$conmas+1; 
                 }
               }
            }
          }
        }
           //imprimo los totales que tengo del grado 6 seccion e
	    $total6e=$conmas+$confem;
        if ($total6e<>0) {
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(41,5, $grado,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $seccion,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $confem,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $conmas,'R', 0 , 'C' );
	    $this->CellFitSpace(33,5, $total6e,'0', 0 , 'C' );
            $ejeY=$ejeY+5;
        }
 //sumatoria del grado 6 seccion F
        $this->SetXY(10,$ejeY);
        $grado = '6';
        $seccion = 'F';
        $confem=0;
        $conmas=0;
       foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='FEMENINO'){
                   $confem=$confem+1; 
                 }
               }
            }
          }
        }
     foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='MASCULINO'){
                   $conmas=$conmas+1; 
                 }
               }
            }
          }
        }
           //imprimo los totales que tengo del grado 6 seccion f
	    $total6f=$conmas+$confem;
        if ($total6f<>0) {
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(41,5, $grado,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $seccion,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $confem,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $conmas,'R', 0 , 'C' );
	    $this->CellFitSpace(33,5, $total6f ,'0', 0 , 'C' );
            $ejeY=$ejeY+5;
        }
 //sumatoria del grado 6 seccion G
        $this->SetXY(10,$ejeY);
        $grado = '6';
        $seccion = 'G';
        $confem=0;
        $conmas=0;
       foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='FEMENINO'){
                   $confem=$confem+1; 
                 }
               }
            }
          }
        }
     foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='MASCULINO'){
                   $conmas=$conmas+1; 
                 }
               }
            }
          }
        }
           //imprimo los totales que tengo del grado 6 seccion g
	    $total6g=$conmas+$confem;
        if ($total6g<>0) {
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(41,5, $grado,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $seccion,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $confem,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $conmas,'R', 0 , 'C' );
	    $this->CellFitSpace(33,5, $total6g ,'0', 0 , 'C' );
            $ejeY=$ejeY+5;
        }
 //sumatoria del grado 6 seccion H
        $this->SetXY(10,$ejeY);
        $grado = '6';
        $seccion = 'H';
        $confem=0;
        $conmas=0;
       foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='FEMENINO'){
                   $confem=$confem+1; 
                 }
               }
            }
          }
        }
     foreach($datos as $fila){
          if($fila['grado']==$grado){
            if($fila['seccion']==$seccion){
               if($fila['anoescolar']==$anoesc){
                 if($fila['sexoalu']=='MASCULINO'){
                   $conmas=$conmas+1; 
                 }
               }
            }
          }
        }
           //imprimo los totales que tengo del grado 6 seccion h
	    $total6h=$conmas+$confem;
        if ($total6h<>0) { 
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(41,5, $grado,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $seccion,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $confem,'R', 0 , 'C' );
	    $this->CellFitSpace(41,5, $conmas,'R', 0 , 'C' );
	    $this->CellFitSpace(33,5, $total6h ,'0', 0 , 'C' );
            $ejeY=$ejeY+5;
        }
       $total6=$total6a+$total6b+$total6c+$total6d+$total6e+$total6f+$total6g+$total6h;
     if ($total6<>0) { 
       $this->SetXY(141,$ejeY);
       $this->SetFont('Arial','IB',10);
       $this->RoundedRect(174, $ejeY, 33, 5, 2, $letra);
       $this->CellFitSpace(33,5,'Total Sexto Grado: ','0', 0 , 'C' );
       $this->CellFitSpace(33,5,$total6 ,'0', 0 , 'C' );
       $ejeY=$ejeY+5;
     }
       $totalge=$total1+$total2+$total3+$total4+$total5+$total6;
       $this->SetFont('Arial','IB',10);
       $this->SetXY(141,$ejeY);
       $this->RoundedRect(174, $ejeY, 33, 5, 2, $letra);
       $this->CellFitSpace(33,5,'Total Estudiantes: ','0', 0 , 'C' );
       $this->CellFitSpace(33,5,$totalge ,'0', 0 , 'C' );
       $ejeY=$ejeY+10;

/*************************************/
        $ejeX=10;
        $sql = " select count(distinct ceduladoc)
  from inscripcion where anoescolar='$anoesc'";
        $resultado = mysql_query($sql, $link);
        $lleno = mysql_fetch_array($resultado);

        $this->SetXY($ejeX,$ejeY);

//*****************

//********



        $this->SetXY($ejeX,$ejeY);        
        $this->SetFont('Arial','I',10);

        $this->RoundedRect($ejeX, $ejeY, 98, 7, 2, 'D');
        $this->CellFitSpace(98,7, 'TOTAL DOCENTES',0, 0 , 'C');
        $ejeX = $ejeX + 98;

        $this->RoundedRect($ejeX, $ejeY, 98, 7, 2, 'D');
        $this->CellFitSpace(98,7, 'TOTAL REPRESENTANTES ',0, 0 , 'C');
        $ejeX = 10;
        $ejeY=$ejeY+7;
        $this->SetXY($ejeX,$ejeY);  
        $this->RoundedRect($ejeX, $ejeY, 98, 7, 2, 'D');
        $this->CellFitSpace(98,7, $lleno[0],0, 0 , 'C');
        $ejeX = $ejeX + 98;

        $sql = " select count(distinct cedularep)
  from inscripcion where anoescolar='$anoesc'";
        $resultado = mysql_query($sql, $link);
        $lleno = mysql_fetch_array($resultado);


        $this->RoundedRect($ejeX, $ejeY, 98, 7, 2, 'D');
        $this->CellFitSpace(98,7, $lleno[0],0, 0 , 'C');


       // hasta aqui el encabezado del grado






}   //hasta aca llega la funcion
    
 
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


        $pdf=new PDF('P','mm','Letter');
	$pdf->Open();
	$pdf->AddPage();
	$pdf->SetMargins(10,10,10);
    // Salto de lÃ­nea
    $pdf->Ln(10);
       

 
$seleccion = new myDBC();
 
$datosReporte = $seleccion->seleccionar_datos();

$miCabecera = array( 'N°','CEDULA ESCOLAR', 'NOMBRES', 'APELLIDOS','SEXO', 'F. DE NAC.');
$pdf->tablaHorizontal($miCabecera, $datosReporte);



$pdf->Output(); 
?> 
