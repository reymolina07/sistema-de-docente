<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head><?php include("verificar.php") ?><title>Sistema de Inscripción para el Registro y Control de Estudiantes</title></head><body>
<table style="text-align: left; width: 100%;" border="0" cellpadding="2" cellspacing="2">

  <tbody>
    <tr style="font-weight: bold;" align="center">
      <td colspan="1" rowspan="1" style="vertical-align: top;"><img src="membrete1.png" alt="q" width="1200" height="170"><br>
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
<h4 style="background-color: rgb(198, 198, 214);">REGISTRAR NUEVO ESTUDIANTE</h4>
</big></div>

<div style="text-align: center;"><?php
   $cedalu = $_POST["cedalu"];
   $nomalu = $_POST["nomalu"];
   $apealu = $_POST["apealu"];
   $fecnacalu = $_POST["fecnacalu"];
   $lugnacalu = $_POST["lugnacalu"]; 
   $sexalu = $_POST["sexalu"];
   include("conectar.php");
   $link = conectarse();
   
   $cedalu=strtoupper($cedalu);
   $nomalu=strtoupper($nomalu);
   $apealu=strtoupper($apealu);
   $lugnacalu=strtoupper($lugnacalu);


   if ($cedalu=="")
    {
     echo "<div align=\"center\"><br><h2><font color='blue'>Error: Introduzca la cedula escolar o normal del estudiante</font></h2></div>";
     echo "<div align=\"center\"><font color='blue'><h2><a href='javascript:window.history.go(-1)' class='enlacenava'>Regresar</font></h2></a></div>";
     exit(); // Salir del programa...!
    }


      $cancar = strlen($cedalu);

     if ($cancar>12 or $cancar<9)
         {
          echo "<div align=\"center\"><br><h2><font color='blue'> El campo cedula no deben ser menor a 9. </font></h2></div><br>";

echo "<div align=\"center\"><br><h2><font color='blue'> O en su defecto colocar la cedula de identidad normal Ejemplo: E00000001</font></h2></div><br>";
          echo "<div align=\"center\"><h2><a href='javascript:window.history.go(-1)' class='enlacenava'>Regresar</a><h2></div>";
          exit(); // Salir del programa...!
         }



    if ($nomalu=="")
    {
     echo "<div align=\"center\"><br><h2><font color='blue'>Error: Introduzca el nombre del estudiante</font></h2></div>";
     echo "<div align=\"center\"><font color='blue'><h2><a href='javascript:window.history.go(-1)' class='enlacenava'>Regresar</font></h2></a></div>";
     exit(); // Salir del programa...!
    }
   if ($apealu=="")
    {
     echo "<div align=\"center\"><br><h2><font color='blue'>Error: Introduzca el apellido del estudiante</font></h2></div>";
     echo "<div align=\"center\"><font color='blue'><h2><a href='javascript:window.history.go(-1)' class='enlacenava'>Regresar</font></h2></a></div>";
     exit(); // Salir del programa...!
    }
    if ($fecnacalu=="")
    {
     echo "<div align=\"center\"><br><h2><font color='blue'>Error: Introduzca la fecha de nacimiento del estudiante</font></h2></div>";
     echo "<div align=\"center\"><font color='blue'><h2><a href='javascript:window.history.go(-1)' class='enlacenava'>Regresar</font></h2></a></div>";
     exit(); // Salir del programa...!
    }
   if ($lugnacalu=="")
    {
     echo "<div align=\"center\"><br><h2><font color='blue'>Error: Introduzca el lugar de nacimiento del estudiante</font></h2></div>";
     echo "<div align=\"center\"><font color='blue'><h2><a href='javascript:window.history.go(-1)' class='enlacenava'>Regresar</font></h2></a></div>";
     exit(); // Salir del programa...!
    }



   $iniced=$cedalu[0];

   if ($iniced=="V"  or $iniced=="E")
    {
     $buscar = mysql_query("select * from alumno where cedulaalu = '$cedalu'");
     if(mysql_fetch_array($buscar))
     {
     echo "<div align=\"center\"><br><h2><font color='blue'> Error: Ya existe un registro con el mismo numero de cedula</font></h2></div>";
     echo "<div align=\"center\"><h2><font color=\"black\">Cedula: </font><font color=\"blue\">$cedalu</font></h2></div>";
     echo "<div align=\"center\"><h2><a href=\"javascript:window.history.go(-1)\" class=\"enlacenava\">Regresar</a></h2></div>";
     exit(); // Salir del programa...!
     }

      mysql_query("INSERT INTO alumno (cedulaalu, nombrealu, apllidoalu, lugnacalu, fechanacalu, sexoalu) VALUES ('$cedalu','$nomalu','$apealu','$lugnacalu','$fecnacalu','$sexalu');", $link);
     echo "<div align=\"center\"><br><h2>El estudiante se registró exitosamente:<h2></div>";
    echo "<div align=\"center\"><h3><font color=\"black\">Cedula: </font><font color=\"blue\">$cedalu</font></h3></div>";
    echo "<div align=\"center\"><h3><font color=\"black\">Nombres: </font><font color=\"blue\">$nomalu</font></h3></div>";
    echo "<div align=\"center\"><h3><font color=\"black\">Apellidos: </font><font color=\"blue\">$apealu</font></h3></div>";
    echo "<div align=\"center\"><h3><font color=\"black\">Fecha de nacimiento: </font><font color=\"blue\">$fecnacalu</font></h3></div>";
    echo "<div align=\"center\"><h3><font color=\"black\">Lugar de nacimiento: </font><font color=\"blue\">$lugnacalu</font></h3></div>";
    echo "<div align=\"center\"><h3><font color=\"black\">Sexo: </font><font color=\"blue\">$sexalu</font></h2></div>";
    $sql = "SELECT * FROM parametros WHERE id='1'";
    $resultado = mysql_query($sql, $link);
    $lleno = mysql_fetch_array($resultado);
    $menu= $lleno['menu'];
    echo "<div align=\"center\"><h3><font color=\"black\"><a href='$menu' class='enlacenava'>Menú principal</a></font></h2></div>";
    echo "<div align=\"center\"><h3><font color=\"black\"><a href='regrep.php' class='enlacenava'>Registrar representante</a></font></h2></div>";
 
}else{
      echo "<div align=\"center\"><br><h2><font color='blue'>Error: La cedula escolar debe comenzar con  E,</font></h2></div>";
     echo "<div align=\"center\"><font color='blue'><h2><a href='javascript:window.history.go(-1)' class='enlacenava'>Regresar</font></h2></a></div>";
     exit(); // Salir del programa...!
    }

  ?></div>

<div align="center"> <font color="blue"> </font>
<h2><font color="blue">    
 </font> </h2>
</div>

</body></html>
