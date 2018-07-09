<?php include("verificar.php") ?>
<html><head>
<title>Sistema de Inscripción para el Registro y Control de Estudiantes</title></head><body>
<table style="text-align: left; width: 100%;" border="0" cellpadding="2" cellspacing="2">

  <tbody>
    <tr style="font-weight: bold;" align="center">
      <td colspan="1" rowspan="1" style="vertical-align: top;"><img src="imagenes/membrete.png" alt="r" width="1087" height="132"><br>
      </td>
    </tr>
    <tr style="font-weight: bold;" align="center">
      <td colspan="1" rowspan="1" style="vertical-align: top;"><big><big style="color: rgb(0, 0, 153);">Sistema de Inscripción </big></big><br>
      <big><big style="color: rgb(0, 0, 153);"><big style="color: rgb(0, 0, 153);"> </big><small><big>para el Registro y
Control de Estudiantes</big></small></big></big><br>
      <big style="color: blue;"><big style="color: rgb(0, 0, 153);"><small></small></big></big></td>
    </tr>
    <tr>
      <td colspan="1" rowspan="1" style="vertical-align: top; text-align: center;"><big style="color: rgb(0, 0, 153);"><small>Centro Escolar Canton San Sebastian Arriba </small></big></td>
    </tr>
  </tbody>
</table>

<div style="text-align: center; color: rgb(0, 0, 153);"><big>
<h4 style="background-color: rgb(198, 198, 214);">MODIFICAR DATOS DEL ESTUDIANTE</h4>
</big></div>

<div style="text-align: center;"><?php
   $cedalu = $_POST["cedalu"];
   $nomalu = $_POST["nomalu"];
   $apealu = $_POST["apealu"];
   $lugnacalu = $_POST["lugnacalu"];
   $fecnacalu = $_POST["fecnacalu"]; 
   $sexalu = $_POST["sexalu"];
   include("conectar.php");
   $link = conectarse();

   if ($cedalu=="")
    {
     echo "<div align=\"center\"><br><h2><font color='blue'>Error: Introduzca la cedula escolar</font></h2></div>";
     echo "<div align=\"center\"><font color='blue'><h2><a href='javascript:window.history.go(-1)' class='enlacenava'>Regresar</font></h2></a></div>";
     exit(); // Salir del programa...!
    }

   $cancar = strlen($cedalu);

     if ($cancar>14)
         {
          echo "<div align=\"center\"><br><h2><font color='blue'>Error: El campo cedula no debe ser mayor a 14 caracteres</font></h2></div><br>";
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
    if ($lugnacalu=="")
    {
     echo "<div align=\"center\"><br><h2><font color='blue'>Error: Introduzca el lugar de nacimiento del estudiante</font></h2></div>";
     echo "<div align=\"center\"><font color='blue'><h2><a href='javascript:window.history.go(-1)' class='enlacenava'>Regresar</font></h2></a></div>";
     exit(); // Salir del programa...!
    }
   if ($sexalu=="")
    {
     echo "<div align=\"center\"><br><h2><font color='blue'>Error: Introduzca el sexo del estudiante</font></h2></div>";
     echo "<div align=\"center\"><font color='blue'><h2><a href='javascript:window.history.go(-1)' class='enlacenava'>Regresar</font></h2></a></div>";
     exit(); // Salir del programa...!
    }


      if ($fecnacalu=="")
    {
     echo "<div align=\"center\"><br><h2><font color='blue'>Error: Introduzca la fecha de nacimiento del estudiante</font></h2></div>";
     echo "<div align=\"center\"><font color='blue'><h2><a href='javascript:window.history.go(-1)' class='enlacenava'>Regresar</font></h2></a></div>";
     exit(); // Salir del programa...!
    }

 $buscar = mysql_query("select * from alumno where cedulaalu = '$cedalu'");
 if(mysql_fetch_array($buscar))
  {
    mysql_query("UPDATE alumno SET cedulaalu = '$cedalu', nombrealu = '$nomalu', apllidoalu = '$apealu', lugnacalu = '$lugnacalu',fechanacalu = '$fecnacalu', sexoalu = '$sexalu' WHERE cedulaalu = '$cedalu'", $link);
                
    echo "<div align=\"center\"><br><h2>El registro del estudiante se modificó exitosamente:<h2></div>";
    echo "<div align=\"center\"><h3><font color=\"black\">Cedula: </font><font color=\"blue\">$cedalu</font></h3></div>";
    echo "<div align=\"center\"><h3><font color=\"black\">Nombres: </font><font color=\"blue\">$nomalu</font></h3></div>";
    echo "<div align=\"center\"><h3><font color=\"black\">Apellidos: </font><font color=\"blue\">$apealu</font></h3></div>";
    echo "<div align=\"center\"><h3><font color=\"black\">Lugar de nacimiento: </font><font color=\"blue\">$lugnacalu</font></h3></div>";
    echo "<div align=\"center\"><h3><font color=\"black\">Fecha de nacimiento: </font><font color=\"blue\">$fecnacalu</font></h3></div>";
    echo "<div align=\"center\"><h3><font color=\"black\">Sexo: </font><font color=\"blue\">$sexalu</font></h3></div>";
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

 
 
 
  ?>

</body></html>
