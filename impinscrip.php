<?php
include('fpdf/fpdf.php');
include('conectarse.php');
require('conexion.php');
include_once('querygrasec.php');

        $link = conectarse();
        $numins = $_POST["numins"];
         
   
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
    if ($cedalu=="") 
        {
        echo "<div align='center'><font color='blue'><h2>El numero de inscripcion $numins no esta registrado</h2><br></font></div>";
        echo "<div align='center'><font color='blue'>
        <h4><a href='impins.php'>Regresar</a></h4>
        </font></div>";
	        exit();
        }

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


        $this->SetFont('Arial','B',10);	
	$this->Cell(210,12,'',0,1,'C');
	$this->Image('membrete1.png',10,-3,195);
	$this->Cell(197,4,'REPUBLICA DE EL SALVADOR',0,1,'C');
	$this->Cell(197,4,'MINISTERIO DE EDUACION',0,1,'C');
        $this->Cell(197,4,'CENTRO ESCOLA CANTON SAN SEBASTIAN ARRIBA',0,1,'C');
	$this->Cell(197,4,'MUNICIPIO SANTIAGO NONUALCO - LA PAZ',0,1,'C');$this->Ln();
        $this->SetFont('Arial','B',12);
        $this->Cell(197,4, 'REPORTE GENERAL DE ESTUDIANTES INSCRITOS',0,1,'C'); 
        $this->SetFont('Arial','',10);	
        $this->Cell(197,4,"Generado el ".$date,0,0,'C'); $this->Ln();
        $this->SetFont('Arial','',11);
        $this->grasecanodoc();
        $this->Ln();
}


    function grasecanodoc()
{ 
        $link = conectarse();
        $numins = $_POST["numins"];
         
   
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
        $this->Cell(50,7,"Nro. de inscripcion: ".$numins,0,0,'C');
        $this->Cell(35,7,"Grado-Seccion: ".$grado."-".$seccion,0,0,'C');
        $this->Cell(50,7,"Ano escolar: ".$anoesc,0,0,'C');
        $this->Cell(55,7,"Fecha de Inscripcion: ".$fecins,0,0,'C');
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
        $this->Cell (197,7, 'DATOS DEL ESTUDIANTE',0, 0 , 'C');
        $this->Ln();
        $this->SetFont('Arial','',10);
        $this->RoundedRect($ejeX, 64, 35, 7, 2, 'D');
        $this->CellFitSpace(35,7, 'CEDULA ESCOLAR',0, 0 , 'C');
        $ejeX = $ejeX + 35;

        $this->RoundedRect($ejeX, 64, 49, 7, 2, 'D');
        $this->CellFitSpace(49,7, 'NOMBRES ',0, 0 , 'C');
        $ejeX = $ejeX + 49;

        $this->RoundedRect($ejeX, 64, 49, 7, 2, 'D');
        $this->CellFitSpace(49,7, 'APELLIDOS',0, 0 , 'C');
        $ejeX = $ejeX + 49;

        $this->RoundedRect($ejeX, 64, 34, 7, 2, 'D');
        $this->CellFitSpace(34,7, 'FECHA DE NAC.',0, 0 , 'C');
        $ejeX = $ejeX + 34;

        $this->RoundedRect($ejeX, 64, 30, 7, 2, 'D');
        $this->CellFitSpace(30,7, 'SEXO',0, 0 , 'C');
//ENCABEZADO DE LOS DATOS DE LA MADRE
        $this->SetXY(10, 76);
        $ejeX = 10;
        $this->SetFont('Arial','B',10);
        $this->RoundedRect($ejeX, 76, 197, 7, 2, 'FD');
        $this->Cell (197,7, 'DATOS DE LA MADRE',0, 0 , 'C');
        $this->Ln();
        $this->SetFont('Arial','',10);
        $this->RoundedRect($ejeX, 83, 35, 7, 2, 'D');
        $this->CellFitSpace(35,7, 'CEDULA',0, 0 , 'C');
        $ejeX = $ejeX + 35;

        $this->RoundedRect($ejeX, 83, 49, 7, 2, 'D');
        $this->CellFitSpace(49,7, 'NOMBRES ',0, 0 , 'C');
        $ejeX = $ejeX + 49;

        $this->RoundedRect($ejeX, 83, 49, 7, 2, 'D');
        $this->CellFitSpace(49,7, 'APELLIDOS',0, 0 , 'C');
        $ejeX = $ejeX + 49;

        $this->RoundedRect($ejeX, 83, 34, 7, 2, 'D');
        $this->CellFitSpace(34,7, 'TELEFONO L.',0, 0 , 'C');
        $ejeX = $ejeX + 34;

        $this->RoundedRect($ejeX, 83, 30, 7, 2, 'D');
        $this->CellFitSpace(30,7, 'CELULAR',0, 0 , 'C');
//ENCABEZADO DE LOS DATOS DE LA PADRE
        $this->SetXY(10, 95);
        $ejeX = 10;
        $this->SetFont('Arial','B',10);
        $this->RoundedRect($ejeX, 95, 197, 7, 2, 'FD');
        $this->Cell (197,7, 'DATOS DEL PADRE',0, 0 , 'C');
        $this->Ln();
        $this->SetFont('Arial','',10);
        $this->RoundedRect($ejeX, 102, 35, 7, 2, 'D');
        $this->CellFitSpace(35,7, 'CEDULA',0, 0 , 'C');
        $ejeX = $ejeX + 35;

        $this->RoundedRect($ejeX, 102, 49, 7, 2, 'D');
        $this->CellFitSpace(49,7, 'NOMBRES ',0, 0 , 'C');
        $ejeX = $ejeX + 49;

        $this->RoundedRect($ejeX, 102, 49, 7, 2, 'D');
        $this->CellFitSpace(49,7, 'APELLIDOS',0, 0 , 'C');
        $ejeX = $ejeX + 49;

        $this->RoundedRect($ejeX, 102, 34, 7, 2, 'D');
        $this->CellFitSpace(34,7, 'TELEFONO L.',0, 0 , 'C');
        $ejeX = $ejeX + 34;

        $this->RoundedRect($ejeX, 102, 30, 7, 2, 'D');
        $this->CellFitSpace(30,7, 'CELULAR',0, 0 , 'C');
//ENCABEZADO DE LOS DATOS DEL REPRESENTANTE
        $this->SetXY(10, 114);
        $ejeX = 10;
        $this->SetFont('Arial','B',10);
        $this->RoundedRect($ejeX, 114, 197, 7, 2, 'FD');
        $this->Cell (197,7, 'DATOS DEL REPRESENTANTE',0, 0 , 'C');
        $this->Ln();
        $this->SetFont('Arial','',10);
        $this->RoundedRect($ejeX, 121, 35, 7, 2, 'D');
        $this->CellFitSpace(35,7, 'CEDULA',0, 0 , 'C');
        $ejeX = $ejeX + 35;

        $this->RoundedRect($ejeX, 121, 49, 7, 2, 'D');
        $this->CellFitSpace(49,7, 'NOMBRES ',0, 0 , 'C');
        $ejeX = $ejeX + 49;

        $this->RoundedRect($ejeX, 121, 49, 7, 2, 'D');
        $this->CellFitSpace(49,7, 'APELLIDOS',0, 0 , 'C');
        $ejeX = $ejeX + 49;

        $this->RoundedRect($ejeX, 121, 34, 7, 2, 'D');
        $this->CellFitSpace(34,7, 'TELEFONO L.',0, 0 , 'C');
        $ejeX = $ejeX + 34;

        $this->RoundedRect($ejeX, 121, 30, 7, 2, 'D');
        $this->CellFitSpace(30,7, 'CELULAR',0, 0 , 'C');
//ENCABEZADO DE LOS DATOS DEL DOCENTE
        $this->SetXY(10, 133);
        $ejeX = 10;
        $this->SetFont('Arial','B',10);

        $this->RoundedRect($ejeX, 133, 197, 7, 2, 'FD');
        $this->Cell (197,7, 'DATOS DEL DOCENTE',0, 0 , 'C');
        $this->Ln();
        $this->SetFont('Arial','',10);
        $this->RoundedRect($ejeX, 140, 35, 7, 2, 'D');
        $this->CellFitSpace(35,7, 'CEDULA',0, 0 , 'C');
        $ejeX = $ejeX + 35;

        $this->RoundedRect($ejeX, 140, 49, 7, 2, 'D');
        $this->CellFitSpace(49,7, 'NOMBRES ',0, 0 , 'C');
        $ejeX = $ejeX + 49;

        $this->RoundedRect($ejeX, 140, 49, 7, 2, 'D');
        $this->CellFitSpace(49,7, 'APELLIDOS',0, 0 , 'C');
        $ejeX = $ejeX + 49;

        $this->RoundedRect($ejeX, 140, 34, 7, 2, 'D');
        $this->CellFitSpace(34,7, 'TELEFONO L.',0, 0 , 'C');
        $ejeX = $ejeX + 34;

        $this->RoundedRect($ejeX, 140, 30, 7, 2, 'D');
        $this->CellFitSpace(30,7, 'CELULAR',0, 0 , 'C');
        $ejeX = $ejeX + 40;
        
        $this->Ln();
        $this->SetXY(10, 153);
        $ejeX = 10;
        $this->SetFont('Arial','B',10);
        $this->RoundedRect($ejeX, 153, 197, 7, 2, 'FD');
        $this->Cell (197,7, 'PLANTEL DE ORIGEN',0, 0 , 'C');
  
        $this->Ln();

        $this->SetXY(10, 166);
        $ejeX = 10;
        $this->SetFont('Arial','B',10);
        $this->RoundedRect($ejeX, 166, 197, 7, 2, 'FD');
        $this->Cell (197,7, 'OBSERVACION',0, 0 , 'C');
  
        $this->Ln();

        $this->SetXY(10, 179);
        $ejeX = 10;
        $this->SetFont('Arial','B',10);
        $this->RoundedRect($ejeX, 179, 197, 7, 2, 'FD');
        $this->Cell (197,7, 'DOCUMENTACION A ENTREGAR (FOTOCOPIAS)',0, 0 , 'C');
        $this->SetFont('Arial','I',8);
        $this->SetXY(10, 190);
        $this->Cell (197,7, 'Cedula:____    Partida de nacimiento:____    Constancia de calificaciones:____    Fotografia:____    Cedula del representante:____',0, 0 , 'C');
        $this->SetXY(10, 220);
        $this->Cell (197,7, '__________________________________                                             __________________________________',0, 0 , 'C');
        $this->SetXY(10, 227); 
        $this->Cell (197,7, '                        FIRMA DEL REPRESENTANTE                                    FIRMA DEL FUNCIONARIO QUE REALIZO LA INSCRIPCION',0, 0 , 'C');
        $this->SetXY(10, 234);        
$this->Cell (197,7, '                                                                                                        SELLO DE LA INSTITUCION',0, 0 , 'C');
    }
 
    function datosHorizontal($datos)
    {
        $this->SetXY(10,71);
        $this->SetFont('Arial','',8);
        $this->SetFillColor(235, 235, 235); //Gris tenue de cada fila
        $this->SetTextColor(3, 3, 3); //Color del texto: Negro
        $bandera = false; //Para alternar el relleno
        $ejeY = 71; //AquÃ­ se encuentra la primer CellFitSpace e irÃ¡ incrementando
        $letra = 'D'; //'D' Dibuja borde de cada CellFitSpace -- 'FD' Dibuja borde y rellena
        $cont=1;
        $link = conectarse();
        $numins = $_POST["numins"];
       //filtrar datos de la tabla inscripcion  para luego buscar los datos del alumno, madre, padre, representante y docente
 
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
       
       // buscar los datos del alumno
       $sql = "SELECT * FROM alumno where cedulaalu='$cedalu'";
       $resultado = mysql_query($sql, $link);
       $lleno = mysql_fetch_array($resultado);
       // sacar los datos del estudiante las celdas con las variables ya cargadas
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(35,5, $lleno['cedulaalu'],'R', 0 , 'C' );
	    $this->CellFitSpace(49,5, $lleno['nombrealu'],'R', 0 , 'C' );
	    $this->CellFitSpace(49,5, $lleno['apllidoalu'],'R', 0 , 'C' );
	    $this->CellFitSpace(34,5, $lleno['fechanacalu'],'R', 0 , 'C' );
	    $this->CellFitSpace(30,5, $lleno['sexoalu'],'0', 0 , 'C' );
            $ejeY=$ejeY+19;
       //buscar los datos de la madre
      $this->SetXY(10,$ejeY);
      $sql = "SELECT * FROM repre where cedularep='$cedmad'";
      $resultado = mysql_query($sql, $link);
      $lleno = mysql_fetch_array($resultado);


       // sacar los datos de la madre las celdas con las variables ya cargadas
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(35,5, $lleno['cedularep'],'R', 0 , 'C' );
	    $this->CellFitSpace(49,5, $lleno['nombrerep'],'R', 0 , 'C' );
	    $this->CellFitSpace(49,5, $lleno['apellidorep'],'R', 0 , 'C' );
	    $this->CellFitSpace(34,5, $lleno['telefonorep'],'R', 0 , 'C' );
	    $this->CellFitSpace(30,5, $lleno['celularrep'],'0', 0 , 'C' );
            $ejeY=$ejeY+19;
      //buscar datos del padre
      $this->SetXY(10,$ejeY);
      $sql = "SELECT * FROM repre where cedularep='$cedpad'";
      $resultado = mysql_query($sql, $link);
      $lleno = mysql_fetch_array($resultado);       
      // sacar los datos de la madre las celdas con las variables ya cargadas
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(35,5, $lleno['cedularep'],'R', 0 , 'C' );
	    $this->CellFitSpace(49,5, $lleno['nombrerep'],'R', 0 , 'C' );
	    $this->CellFitSpace(49,5, $lleno['apellidorep'],'R', 0 , 'C' );
	    $this->CellFitSpace(34,5, $lleno['telefonorep'],'R', 0 , 'C' );
	    $this->CellFitSpace(30,5, $lleno['celularrep'],'0', 0 , 'C' );
            $ejeY=$ejeY+19;
      //buscar datos del representante
      $this->SetXY(10,$ejeY);
      $sql = "SELECT * FROM repre where cedularep='$cedrep'";
      $resultado = mysql_query($sql, $link);
      $lleno = mysql_fetch_array($resultado);       
      // sacar los datos de la madre las celdas con las variables ya cargadas
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(35,5, $lleno['cedularep'],'R', 0 , 'C' );
	    $this->CellFitSpace(49,5, $lleno['nombrerep'],'R', 0 , 'C' );
	    $this->CellFitSpace(49,5, $lleno['apellidorep'],'R', 0 , 'C' );
	    $this->CellFitSpace(34,5, $lleno['telefonorep'],'R', 0 , 'C' );
	    $this->CellFitSpace(30,5, $lleno['celularrep'],'0', 0 , 'C' );
            $ejeY=$ejeY+19;
      //bsucar los datos del docente
      $this->SetXY(10,$ejeY);
      $sql = "SELECT * FROM docente where ceduladoc='$ceddoc'";
      $resultado = mysql_query($sql, $link);
      $lleno = mysql_fetch_array($resultado);       
      // sacar los datos de la madre las celdas con las variables ya cargadas
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(35,5, $lleno['ceduladoc'],'R', 0 , 'C' );
	    $this->CellFitSpace(49,5, $lleno['nombredoc'],'R', 0 , 'C' );
	    $this->CellFitSpace(49,5, $lleno['apellidodoc'],'R', 0 , 'C' );
	    $this->CellFitSpace(34,5, $lleno['telefonodoc'],'R', 0 , 'C' );
	    $this->CellFitSpace(30,5, $lleno['celulardoc'],'0', 0 , 'C' );
   // sacar los datos de la inscripcion en las celdas con las variables ya cargadas
            $ejeY=$ejeY+13;
            $this->SetXY(10,$ejeY);
   // sacar los datos de la madre las celdas con las variables ya cargadas
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(197,5, $plaori,'0', 0 , 'C' );
	    $ejeY=$ejeY+13;
            $this->SetXY(10,$ejeY);
   // sacar los datos de la madre las celdas con las variables ya cargadas
            $this->RoundedRect(10, $ejeY, 197, 5, 2, $letra);
            $this->CellFitSpace(197,5, $obsins,'0', 0 , 'C' );
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
