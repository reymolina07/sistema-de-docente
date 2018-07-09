<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head><?php include("verificar.php") ?><title>Sistema de Inscripción para el Registro y Control de Estudiantes</title></head><body>
<table style="text-align: left; width: 100%;" border="0" cellpadding="2" cellspacing="2">

  <tbody>
    <tr style="font-weight: bold;" align="center">
      <td colspan="1" rowspan="1" style="vertical-align: top;"><br>
      <img src="imagenes/membrete.png" alt="Q" width="1067" height="133">      </td>
    </tr>
    <tr style="font-weight: bold;" align="center">
      <td colspan="1" rowspan="1" style="vertical-align: top;"><big><big style="color: rgb(0, 0, 153);">Sistema de Inscripción </big></big><br>
      <big><big style="color: rgb(0, 0, 153);"><big style="color: rgb(0, 0, 153);"> </big><small><big>para el Registro y
Control de Estudiantes</big></small></big></big><br>
      <big style="color: blue;"><big style="color: rgb(0, 0, 153);"><small></small></big></big></td>
    </tr>
    <tr>
      <td colspan="1" rowspan="1" style="vertical-align: top; text-align: center;"><big style="color: rgb(0, 0, 153);"><small>CENTRO ESCOLAR CANTON SAN SEBASTIAN ARRIBA </small></big></td>
    </tr>
  </tbody>
</table>

<div style="text-align: center; color: rgb(0, 0, 153);"><big>
<h4 style="background-color: rgb(198, 198, 214);">MODIFICAR DATOS DEL REPRESENTANTE</h4>
</big></div>

<div style="text-align: center;"><?php
   $cedrep = $_POST["cedrep"];
   $nomrep = $_POST["nomrep"];
   $aperep = $_POST["aperep"];
   $fecnacrep = $_POST["fecnacrep"];
   $telrep = $_POST["telrep"];
   $celrep = $_POST["celrep"]; 
   $correp = $_POST["correp"]; 
   $dirrep = $_POST["dirrep"]; 
   $suerep = $_POST["suerep"];  
   $prorep = $_POST["prorep"];
   $ocurep = $_POST["ocurep"];
   include("conectar.php");
   $link = conectarse();

   if ($cedrep=="")
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


    if ($nomrep=="")
    {
     echo "<div align=\"center\"><br><h2><font color='blue'>Error: Introduzca el nombre del representante</font></h2></div>";
     echo "<div align=\"center\"><font color='blue'><h2><a href='javascript:window.history.go(-1)' class='enlacenava'>Regresar</font></h2></a></div>";
     exit(); // Salir del programa...!
    }
        if ($aperep=="")
    {
     echo "<div align=\"center\"><br><h2><font color='blue'>Error: Introduzca el apellido del representante</font></h2></div>";
     echo "<div align=\"center\"><font color='blue'><h2><a href='javascript:window.history.go(-1)' class='enlacenava'>Regresar</font></h2></a></div>";
     exit(); // Salir del programa...!
    }
    if ($dirrep=="")
    {
     echo "<div align=\"center\"><br><h2><font color='blue'>Error: Introduzca la dirección del representante</font></h2></div>";
     echo "<div align=\"center\"><font color='blue'><h2><a href='javascript:window.history.go(-1)' class='enlacenava'>Regresar</font></h2></a></div>";
     exit(); // Salir del programa...!
    }
   if ($ocurep=="")
    {
     echo "<div align=\"center\"><br><h2><font color='blue'>Error: Introduzca la ocupación del representante</font></h2></div>";
     echo "<div align=\"center\"><font color='blue'><h2><a href='javascript:window.history.go(-1)' class='enlacenava'>Regresar</font></h2></a></div>";
     exit(); // Salir del programa...!
    }


      if ($fecnacrep=="")
    {
     echo "<div align=\"center\"><br><h2><font color='blue'>Error: Introduzca la fecha de nacimiento del representante</font></h2></div>";
     echo "<div align=\"center\"><font color='blue'><h2><a href='javascript:window.history.go(-1)' class='enlacenava'>Regresar</font></h2></a></div>";
     exit(); // Salir del programa...!
    }

 $buscar = mysql_query("select * from repre where cedularep = '$cedrep'");
 if(mysql_fetch_array($buscar))
  {
    mysql_query("UPDATE repre SET cedularep = '$cedrep', nombrerep = '$nomrep', apellidorep = '$aperep', direccionrep = '$dirrep', telefonorep='$telrep', celularrep='$celrep', correorep='$correp', profesionrep='$prorep', ocupacionrep='$ocurep',fechanacrep = '$fecnacrep', sueldorep = '$suerep' WHERE cedularep = '$cedrep'", $link);
                
    echo "<div align=\"center\"><br><h2>El registro del representante se modificó exitosamente:<h2></div>";
    echo "<div align=\"center\"><h3><font color=\"black\">Cedula: </font><font color=\"blue\">$cedrep</font></h3></div>";
    echo "<div align=\"center\"><h3><font color=\"black\">Nombres: </font><font color=\"blue\">$nomrep</font></h3></div>";
    echo "<div align=\"center\"><h3><font color=\"black\">Apellidos: </font><font color=\"blue\">$aperep</font></h3></div>";
    echo "<div align=\"center\"><h3><font color=\"black\">Dirección: </font><font color=\"blue\">$dirrep</font></h3></div>";
    echo "<div align=\"center\"><h3><font color=\"black\">Fecha de nacimiento: </font><font color=\"blue\">$fecnacrep</font></h3></div>";
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
