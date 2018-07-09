<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head><?php include("verificar.php") ?><title>Sistema de Inscripción para el Registro y Control de Estudiantes</title></head><body>
<table style="text-align: left; width: 100%;" border="0" cellpadding="2" cellspacing="2">

  <tbody>
    <tr style="font-weight: bold;" align="center">
      <td colspan="1" rowspan="1" style="vertical-align: top;"><img src="membrete1.png" alt="q" width="1009" height="157"><br>
      </td>
    </tr>
    <tr style="font-weight: bold;" align="center">
      <td colspan="1" rowspan="1" style="vertical-align: top;"><big><big style="color: rgb(0, 0, 153);">Sistema de Inscripción </big></big><br>
      <big><big style="color: rgb(0, 0, 153);"><big style="color: rgb(0, 0, 153);"> </big><small><big>para el Registro y
Control de Estudiantes</big></small></big></big><br>
      <big style="color: blue;"><big style="color: rgb(0, 0, 153);"><small></small></big></big></td>
    </tr>
    <tr>
      <td colspan="1" rowspan="1" style="vertical-align: top; text-align: center;"><big style="color: rgb(0, 0, 153);"><small>Centro Escolar Canton San Sebastian Arriba - San Tiango Nonualco </small></big></td>
    </tr>
  </tbody>
</table>

<div style="text-align: center; color: rgb(0, 0, 153);"><big>
<h4 style="background-color: rgb(198, 198, 214);">MODIFICAR DATOS DEL DOCENTE</h4>
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

  $nomrep= strtoupper($nomrep);
  $aperep= strtoupper($aperep);
  $dirrep= strtoupper($dirrep);
  $correp= strtolower($correp); 
  $ocurep= strtoupper($ocurep); 
  $prorep= strtoupper($prorep); 

   include("conectar.php");
   $link = conectarse();

   if ($ceddoc=="")
    {
     echo "<div align=\"center\"><br><h2><font color='blue'>Error: Introduzca la cedula</font></h2></div>";
     echo "<div align=\"center\"><font color='blue'><h2><a href='javascript:window.history.go(-1)' class='enlacenava'>Regresar</font></h2></a></div>";
     exit(); // Salir del programa...!
    }

   $cancar = strlen($ceddoc);

     if ($cancar>9)
         {
          echo "<div align=\"center\"><br><h2><font color='blue'>Error: El campo cedula no debe ser mayor a 9 caracteres</font></h2></div><br>";
          echo "<div align=\"center\"><h2><a href='javascript:window.history.go(-1)' class='enlacenava'>Regresar</a><h2></div>";
          exit(); // Salir del programa...!
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
     echo "<div align=\"center\"><br><h2><font color='blue'>Error: Introduzca la dirección del docente</font></h2></div>";
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
     echo "<div align=\"center\"><br><h2><font color='blue'>Error: Introduzca la profesón del docente</font></h2></div>";
     echo "<div align=\"center\"><font color='blue'><h2><a href='javascript:window.history.go(-1)' class='enlacenava'>Regresar</font></h2></a></div>";
     exit(); // Salir del programa...!
    }

     

 $buscar = mysql_query("select * from docente where ceduladoc = '$ceddoc'");
 if(mysql_fetch_array($buscar))
  {
    mysql_query("UPDATE docente SET ceduladoc = '$ceddoc', nombredoc = '$nomdoc', apellidodoc = '$apedoc', direcciondoc = '$dirdoc', telefonodoc='$teldoc', celulardoc='$celdoc', correodoc='$cordoc', profesiondoc='$prodoc', especialidaddoc='$espdoc' WHERE ceduladoc = '$ceddoc'", $link);
                
    echo "<div align=\"center\"><br><h2>El registro del docente se modificó exitosamente:<h2></div>";
    echo "<div align=\"center\"><h3><font color=\"black\">Cedula: </font><font color=\"blue\">$ceddoc</font></h3></div>";
    echo "<div align=\"center\"><h3><font color=\"black\">Nombres: </font><font color=\"blue\">$nomdoc</font></h3></div>";
    echo "<div align=\"center\"><h3><font color=\"black\">Apellidos: </font><font color=\"blue\">$apedoc</font></h3></div>";
    echo "<div align=\"center\"><h3><font color=\"black\">Dirección: </font><font color=\"blue\">$dirdoc</font></h3></div>";
    echo "<div align=\"center\"><h3><font color=\"black\">Profesión: </font><font color=\"blue\">$prodoc</font></h3></div>";
    echo "<div align=\"center\"><h3><font color=\"black\">Especialidad: </font><font color=\"blue\">$espdoc</font></h3></div>";
    $sql = "SELECT * FROM parametros WHERE id='1'";
            $resultado = mysql_query($sql, $link);
            $lleno = mysql_fetch_array($resultado);
            $menu= $lleno['menu'];
            echo "
        </tbody>
      </table>
      </td>
    </tr>
    <tr>
      <td colspan='3'>
      <div align='center'> <font color='blue'> </font>

      <h3><font color='blue'><br>
            <a href='$menu' class='enlacenava'>Menú principal</a> </font>
</h3>

      </td>
    </tr>
  </tbody>
";
  
  }

  
 
  ?></div>

<div align="center"> <font color="blue"> </font>
<h2><font color="blue"> </font> </h2>
</div>

</body></html>
