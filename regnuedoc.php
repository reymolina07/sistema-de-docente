<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head><?php include("verificar.php") ?><title>Sistema de Inscripción para el Registro y Control de Estudiantes</title></head><body>
<table style="text-align: left; width: 100%;" border="0" cellpadding="2" cellspacing="2">

  <tbody>
    <tr style="font-weight: bold;" align="center">
      <td colspan="1" rowspan="1" style="vertical-align: top;"><img src="membrete1.png" alt="q" width="994" height="115"><br>
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
      <td colspan="1" rowspan="1" style="vertical-align: top; text-align: center;"><big style="color: rgb(0, 0, 153);"><small>Centro Escolar Canton San Sebastian Arriba - San Tiango Nonualco </small></big></td>
    </tr>
  </tbody>
</table>

<div style="text-align: center; color: rgb(0, 0, 153);"><big>
<h4 style="background-color: rgb(198, 198, 214);">REGISTRAR NUEVO DOCENTE</h4>
</big></div>

<div style="text-align: center;"><?php
   $ceddoc = $_POST["ceddoc"];
   $nomdoc = $_POST["nomdoc"];
   $apedoc = $_POST["apedoc"];
   $teldoc = $_POST["teldoc"];
   $celdoc = $_POST["celdoc"]; 
   $cordoc = $_POST["cordoc"]; 
   $dirdoc = $_POST["dirdoc"]; 
   $prodoc = $_POST["prodoc"];
   $espdoc = $_POST["espdoc"];


  $nomdoc= strtoupper($nomdoc);
  $apedoc= strtoupper($apedoc);
  $dirdoc= strtoupper($dirdoc);
  $cordoc= strtolower($cordoc); 
  $espdoc= strtoupper($espdoc); 
  $prodoc= strtoupper($prodoc); 

   include("conectar.php");
   $link = conectarse();

   

if ($ceddoc=="")
    {
     echo "<div align=\"center\"><br><h2><font color='blue'>Error: Introduzca la cedula del docente</font></h2></div>";
     echo "<div align=\"center\"><font color='blue'><h2><a href='javascript:window.history.go(-1)' class='enlacenava'>Regresar</font></h2></a></div>";
     exit(); // Salir del programa...!
    }

   
function comprobar_cedula($ceddoc)
    {

    if (ereg("[0-9]{1,8}",$ceddoc))
       {
        return 1;
       }
     else
       {
       return 0;
       }
    }

 $swceddoc = comprobar_cedula($ceddoc);

   if ($swceddoc=="0")
      {
       echo "<br><h3><font color='blue'>Error: El numero telefonico local no debe ser mayor a 10 caracteres y en formato numerico!! </font><br></h3>";
       echo "<div align=\"center\"><h3><font color=\"black\">Telefono: </font><font color=\"blue\">$ceddoc</font></h3></div>";
       echo "<div align=\"center\"><h2><a href='javascript:window.history.go(-1)' class='enlacenava'>Regresar</a></h2></div>";
       exit();
      }

    if ($nomdoc=="")
    {
     echo "<div align=\"center\"><br><h2><font color='blue'>Error: Introduzca el nombre del docente</font></h2></div>";
     echo "<div align=\"center\"><font color='blue'><h2><a href='javascript:window.history.go(-1)' class='enlacenava'>Regresar</font></h2></a></div>";
     exit(); // Salir del programa...!
    }

   if ($apedoc=="")
    {
     echo "<div align=\"center\"><br><h2><font color='blue'>Error: Introduzca el apellido del docente</font></h2></div>";
     echo "<div align=\"center\"><font color='blue'><h2><a href='javascript:window.history.go(-1)' class='enlacenava'>Regresar</font></h2></a></div>";
     exit(); // Salir del programa...!
    }

   if ($dirdoc=="")
    {
     echo "<div align=\"center\"><br><h2><font color='blue'>Error: Introduzca la dirección de habitacion del docente</font></h2></div>";
     echo "<div align=\"center\"><font color='blue'><h2><a href='javascript:window.history.go(-1)' class='enlacenava'>Regresar</font></h2></a></div>";
     exit(); // Salir del programa...!
    }

   if ($espdoc=="")
    {
     echo "<div align=\"center\"><br><h2><font color='blue'>Error: Introduzca la especialidad del docente</font></h2></div>";
     echo "<div align=\"center\"><font color='blue'><h2><a href='javascript:window.history.go(-1)' class='enlacenava'>Regresar</font></h2></a></div>";
     exit(); // Salir del programa...!
    }

   if ($prodoc=="")
    {
     echo "<div align=\"center\"><br><h2><font color='blue'>Error: Introduzca la profesión del docente</font></h2></div>";
     echo "<div align=\"center\"><font color='blue'><h2><a href='javascript:window.history.go(-1)' class='enlacenava'>Regresar</font></h2></a></div>";
     exit(); // Salir del programa...!
    }

$swceddoc = comprobar_cedula($ceddoc);

   if ($swceddoc=="0")
      {
       echo "<br><h3><font color='blue'>Error: El numero telefonico local no debe ser mayor a 10 caracteres y en formato numerico!! </font><br></h3>";
       echo "<div align=\"center\"><h3><font color=\"black\">Telefono: </font><font color=\"blue\">$ceddoc</font></h3></div>";
       echo "<div align=\"center\"><h2><a href='javascript:window.history.go(-1)' class='enlacenava'>Regresar</a></h2></div>";
       exit();
      }

   


    $buscar = mysql_query("select * from docente where ceduladoc = '$ceddoc'");
    if(mysql_fetch_array($buscar))
      {
       echo "<div align=\"center\"><br><h2><font color='blue'> Error: Ya existe un registro con el mismo numero de cedula</font></h2></div>";
       echo "<div align=\"center\"><h2><font color=\"black\">Cedula: </font><font color=\"blue\">$ceddoc</font></h2></div>";
       echo "<div align=\"center\"><h2><a href=\"javascript:window.history.go(-1)\" class=\"enlacenava\">Regresar</a></h2></div>";
       exit(); // Salir del programa...!
     }

 mysql_query("INSERT INTO docente (ceduladoc, nombredoc, apellidodoc, direcciondoc, telefonodoc, celulardoc, correodoc, profesiondoc, especialidaddoc) VALUES ('$ceddoc','$nomdoc','$apedoc','$dirdoc','$teldoc','$celdoc','$cordoc','$prodoc','$espdoc');", $link);
     echo "<div align=\"center\"><br><h2>El docente se registró exitosamente:<h2></div>";
    echo "<div align=\"center\"><h3><font color=\"black\">Cedula: </font><font color=\"blue\">$ceddoc</font></h3></div>";
    echo "<div align=\"center\"><h3><font color=\"black\">Nombres: </font><font color=\"blue\">$nomdoc</font></h3></div>";
echo "<div align=\"center\"><h3><font color=\"black\">Apellidos: </font><font color=\"blue\">$apedoc</font></h3></div>";
echo "<div align=\"center\"><h3><font color=\"black\">Profesión: </font><font color=\"blue\">$prodoc</font></h3></div>";
echo "<div align=\"center\"><h3><font color=\"black\">Especialidad: </font><font color=\"blue\">$espdoc</font></h3></div>";
echo "<div align=\"center\"><h3><font color=\"black\">Direccion: </font><font color=\"blue\">$dirdoc</font></h3></div>";

   $sql = "SELECT * FROM parametros WHERE id='1'";
    $resultado = mysql_query($sql, $link);
    $lleno = mysql_fetch_array($resultado);
    $menu= $lleno['menu'];
    echo "<div align=\"center\"><h3><font color=\"black\"><a href='$menu' class='enlacenava'>Menú principal</a></font></h2></div>";




 
 
  ?></div>

</body></html>
