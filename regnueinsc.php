<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head><?php include("verificar.php") ?><title>Sistema de Inscripción para el Registro y Control de Estudiantes</title></head><body>
<table style="text-align: left; width: 100%;" border="0" cellpadding="2" cellspacing="2">

  <tbody>
    <tr style="font-weight: bold;" align="center">
      <td colspan="1" rowspan="1" style="vertical-align: top;"><img style="width: 974px; height: 50px;" alt="MPPE" title="Miniseterio del el salvador" src="membrete1.png"><br>
      </td>
    </tr>
    <tr style="font-weight: bold;" align="center">
      <td colspan="1" rowspan="1" style="vertical-align: top;"><big><big style="color: rgb(0, 0, 153);">Sistema de Inscripción </big></big><br>
      <big><big style="color: rgb(0, 0, 153);"><big style="color: rgb(0, 0, 153);"> </big><small><big>para el Registro y
Control
de Estudiantes</big></small></big></big><br>
      <big style="color: blue;"><big style="color: rgb(0, 0, 153);"><small></small></big></big></td>
    </tr>
    <tr>
      <td colspan="1" rowspan="1" style="vertical-align: top; text-align: center;"><big style="color: rgb(0, 0, 153);"><small>Centro Escolar Canton San Sebastian Arriba</small></big></td>
    </tr>
  </tbody>
</table>

<div style="text-align: center; color: rgb(0, 0, 153);"><big>
<h4 style="background-color: rgb(198, 198, 214);">PROCESO DE NUEVA INSCRIPCIÓN</h4>
</big></div>

<div style="text-align: center;"><?php
   $cedalu=$_POST['cedalu'];
   $cedmad=$_POST['cedmad'];
   $cedpad=$_POST['cedpad'];
   $cedrep=$_POST['cedrep'];
   $ceddoc=$_POST['ceddoc'];
   $fecins=$_POST['fecins'];
   $grains=$_POST['grains'];
   $secins=$_POST['secins'];
   $insori=$_POST['insori'];
   $obsori=$_POST['obsori'];

   include("conectar.php");
   $link = conectarse();
   $sql = "SELECT * FROM parametros WHERE id='1'";
   $resultado = mysql_query($sql, $link);
   $lleno = mysql_fetch_array($resultado);
   $anoesc= $lleno['anoescolar'];

   if ($grains=="")
    {
     echo "<div align=\"center\"><br><h2><font color='blue'>Error: Introduzca el grado que va a cursar el estudiante</font></h2></div>";
     echo "<div align=\"center\"><font color='blue'><h2><a href='javascript:window.history.go(-1)' class='enlacenava'>Regresar</font></h2></a></div>";
     exit(); // Salir del programa...!
    }


    if ($secins=="")
    {
     echo "<div align=\"center\"><br><h2><font color='blue'>Error: Introduzca la sección que va a cursar el estudiante</font></h2></div>";
     echo "<div align=\"center\"><font color='blue'><h2><a href='javascript:window.history.go(-1)' class='enlacenava'>Regresar</font></h2></a></div>";
     exit(); // Salir del programa...!
    }
   if ($insori=="")
    {
     echo "<div align=\"center\"><br><h2><font color='blue'>Error: Introduzca la institución de origen del estudiante</font></h2></div>";
     echo "<div align=\"center\"><font color='blue'><h2><a href='javascript:window.history.go(-1)' class='enlacenava'>Regresar</font></h2></a></div>";
     exit(); // Salir del programa...!
    }

 $buscar = mysql_query("select * from inscripcion where cedulaalu = '$cedalu' and anoescolar= '$anoesc'");
 if(mysql_fetch_array($buscar))
  {
     echo "<div align=\"center\"><br><h2><font color='blue'> Error: Ya el estudiante esta inscrito</font></h2></div>";
     echo "<div align=\"center\"><h2><font color=\"black\">Cedula: </font><font color=\"blue\">$cedalu</font></h2></div>";
    echo "<div align=\"center\"><h2><a href=\"javascript:window.history.go(-1)\" class=\"enlacenava\">Regresar</a></h2></div>";
     exit(); // Salir del programa...!
  }


 mysql_query("INSERT INTO inscripcion (cedulaalu, cedulapad, cedulamad, cedularep , ceduladoc, grado, seccion, fechains, plantelorigen, observacion,anoescolar) VALUES ('$cedalu','$cedpad','$cedmad','$cedrep','$ceddoc','$grains','$secins','$fecins','$insori','$obsins','$anoesc');", $link);

   $buscar = "select * from inscripcion where cedulaalu = '$cedalu' and anoescolar= '$anoesc'";
   $resultado = mysql_query($buscar, $link);
   $lleno = mysql_fetch_array($resultado);
   $numins= $lleno['nuemeroins'];
    echo "<div align=\"center\"><br><h2>La inscripcion del estudiante se registró exitosamente:<h2></div>";
    echo "<div align=\"center\"><h3><font color=\"black\">TOME NOTA DEL NUMERO DE INSCRIPCIÓN PARA IMPRIMIRLO</font></h3></div>";
    echo "<div align=\"center\"><h3><font color=\"black\">Numero de inscripcion: </font><font color=\"blue\">$numins</font></h3></div>";
    echo "<div align=\"center\"><h3><font color=\"black\">Cedula: </font><font color=\"blue\">$cedalu</font></h3></div>";
    echo "<div align=\"center\"><h3><font color=\"black\">Fecha de inscripción: </font><font color=\"blue\">$fecins</font></h3></div>";
    echo "<div align=\"center\"><h3><font color=\"black\">Grado: </font><font color=\"blue\">$grains</font></h3></div>";
    echo "<div align=\"center\"><h3><font color=\"black\">Sección: </font><font color=\"blue\">$secins</font></h3></div>";
    echo "<div align=\"center\"><h3><font color=\"black\">Institución de origen: </font><font color=\"blue\">$insori</font></h3></div>";

     $sql = "SELECT * FROM parametros WHERE id='1'";
    $resultado = mysql_query($sql, $link);
    $lleno = mysql_fetch_array($resultado);
    $menu= $lleno['menu'];
    echo "<div align=\"center\"><h3><font color=\"black\"><a href='$menu' class='enlacenava'>Menú principal</a>
<a href='impins.php'><input type='button' value='Imprimir'> </a>
</font></h2></div>";
 
  ?>
</body></html>
