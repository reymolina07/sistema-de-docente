<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head><?php include("verificar.php") ?><title>Sistema de Inscripción para el Registro y Control de Estudiantes</title>
<style type="text/css">
<!--
.Estilo1 {color: #000099}
-->
</style>
</head><body>
<table style="text-align: left; width: 100%;" border="0" cellpadding="2" cellspacing="2">

  <tbody>
    <tr style="font-weight: bold;" align="center">
      <td colspan="1" rowspan="1" style="vertical-align: top;"><img src="membrete1.png" alt="Q" width="1017" height="122"><br>
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
      <td colspan="1" rowspan="1" style="vertical-align: top; text-align: center;"><span class="Estilo1">Centro Escolar Canton San Sebastian Arriba </span></td>
    </tr>
  </tbody>
</table>

<div style="text-align: center; color: rgb(0, 0, 153);"><big>
<h4 style="background-color: rgb(198, 198, 214);">MODIFICAR AÑO ESCOLAR</h4>
</big></div>

<div style="text-align: center;"><?php
   $anoesc = $_POST["anoesc"];
   include("conectar.php");
   $link = conectarse();

   if ($anoesc=="")
    {
     echo "<div align=\"center\"><br><h2><font color='blue'>Error: Introduzca el año escolar</font></h2></div>";
     echo "<div align=\"center\"><font color='blue'><h2><a href='javascript:window.history.go(-1)' class='enlacenava'>Regresar</font></h2></a></div>";
     exit(); // Salir del programa...!
    }


 $buscar = mysql_query("select * from parametros where id = '1'");
 if(mysql_fetch_array($buscar))
  {
    mysql_query("UPDATE parametros SET id = '1', anoescolar = '$anoesc'", $link);
                
    echo "<div align=\"center\"><br><h2>El año escolar se modificó exitosamente:<h2></div>";
    echo "<div align=\"center\"><h2><font color=\"black\">Nuevo año escolar: </font><font color=\"blue\">$anoesc</font></h2></div>";
  
  }

 
 
 
  ?></div>

<div align="center"> <font color="blue"> </font>
<h2><font color="blue"><a href="menu.php" class="enlacenava">Menú
principal</a> </font> </h2>
</div>

</body></html>
