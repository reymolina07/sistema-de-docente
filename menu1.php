<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head>
<?php include("verificar.php") ?><title>Sistema de Inscripción para el Registro y Control de Estudiantes</title>


  

  
  
  <script language="JavaScript">
  function cerrar()  {
       if(confirm("¿Desea cerrar la sesión?")){
          window.close("menu.php");
          window.open("cerrarsesion.php");}
   }
 </script>
  
  <script language="javascript">
mydate = new Date();
myday = mydate.getDay();
mymonth = mydate.getMonth();
myweekday= mydate.getDate();
weekday= myweekday;

if(myday == 0)
day = " Domingo "

else if(myday == 1)
day = " Lunes "

else if(myday == 2)
day = " Martes "

else if(myday == 3)
day = " Miércoles "

else if(myday == 4)
day = " Jueves "

else if(myday == 5)
day = " Viernes "

else if(myday == 6)
day = " Sábado "

if(mymonth == 0)
month = "Enero "

else if(mymonth ==1)
month = "Febrero "

else if(mymonth ==2)
month = "Marzo "

else if(mymonth ==3)
month = "Abril "

else if(mymonth ==4)
month = "Mayo "

else if(mymonth ==5)
month = "Junio "

else if(mymonth ==6)
month = "Julio "

else if(mymonth ==7)
month = "Agosto "

else if(mymonth ==8)
month = "Setiembre "

else if(mymonth ==9)
month = "Octubre "

else if(mymonth ==10)
month = "Noviembre "

else if(mymonth ==11)
month = "Diciembre "
  </script>
  <style type="text/css">
<!--
.Estilo1 {
	color: #000099;
	font-size: 18px;
}
.Estilo3 {font-size: 18px}
-->
  </style>
  </head><body>
<table style="text-align: left; width: 100%;" border="0" cellpadding="2" cellspacing="2">

  <tbody>
    <tr style="font-weight: bold;" align="center">
      <td colspan="1" rowspan="1" style="vertical-align: top;"><img src="membrete1.png" alt="Q" width="1000" height="152"><br>
      </td>
    </tr>
    <tr style="font-weight: bold;" align="center">
      <td colspan="1" rowspan="1" style="vertical-align: top;"><span class="Estilo3"><big><big style="color: rgb(0, 0, 153);">Sistema de Inscripción </big></big><br>
          <big><big style="color: rgb(0, 0, 153);"> <small><big>para el Registro y
Control
de Estudiantes</big></small></big></big></span><br>      </td>
    </tr>
    <tr>
      <td colspan="1" rowspan="1" style="vertical-align: top; text-align: center;"><span class="Estilo1">Centro Escolar Canton San Sebastian Arriba </span></td>
    </tr>
  </tbody>
</table>

<div align="center">
  <table style="text-align: left; width: 100%; height: 37px; font-weight: bold; margin-left: auto; margin-right: auto;" border="1" cellpadding="2" cellspacing="2">
    
    <tbody>
      <tr>
        <td style="vertical-align: top; background-color: rgb(198, 198, 214); text-align: center;"><big style="color: rgb(0, 0, 153);">MENÚ PRINCIPAL<br>
        <script>document.write(""+ day);document.write(myweekday+" de "+month+"");</script></big></td>
      </tr>
    </tbody>
  </table>
  <table style="text-align: left; width: 1056px; height: 67px; margin-left: auto; margin-right: auto;" border="1" cellpadding="2" cellspacing="2">
    
    <tbody>
      <tr style="font-weight: bold; color: white;">
        <td colspan="3" rowspan="1" style="vertical-align: top; color: white; background-color: rgb(142, 142, 153); text-align: center;"><big><span style="font-style: italic;">ESTUDIANTE</span><br>
        </big></td>
        <td colspan="3" rowspan="1" style="vertical-align: top; color: white; background-color: rgb(142, 142, 153); text-align: center; font-style: italic;">MADRE
          - PADRE - REPRESENTANTE<br>        </td>
        <td colspan="3" rowspan="1" style="vertical-align: top; color: white; background-color: rgb(142, 142, 153); text-align: center; font-style: italic;">DOCENTE<br>        </td>
      </tr>
      <tr>
        <td width="135" style="vertical-align: middle; text-align: center;"><a href="regalu.php"><input value="REGISTRAR" name="rees" type="button"></a></td>
        <td width="146" style="vertical-align: top; text-align: center;"><a href="conalu.php">
        <input value="CONSULTAR" name="coes" type="button"></a></td>
        <td width="1" style="vertical-align: top; text-align: center;"><a href="repalu.php"></a></td>
        <td width="197" style="vertical-align: top; text-align: center;"><a href="regrep.php">
        <input value="REGISTRAR" name="rees" type="button"></a><br>        </td>
        <td width="218" style="vertical-align: top; text-align: center;"><a href="conrep.php">
        <input value="CONSULTAR" name="coes" type="button"></a><br>        </td>
        <td width="1" style="vertical-align: top; text-align: center;"><a href="reprep.php"></a></td>
        <td width="133" style="vertical-align: top; text-align: center;"><a href="regdoc.php">
        <input value="REGISTRAR" name="rees" type="button"></a><br>        </td>
        <td width="148" style="vertical-align: top; text-align: center;"><a href="condoc.php">
        <input value="CONSULTAR" name="coes" type="button"></a><br>        </td>
        <td width="1" style="vertical-align: top; text-align: center;"><a href="repdoc.php"></a></td>
      </tr>
    </tbody>
  </table>
</div>
<p align="center"><big><span style="font-style: italic;"></span></big>
<div align="center">
  <table style="text-align: left; width: 333px; margin-left: auto; margin-right: auto; height: 66px;" border="1" cellpadding="2" cellspacing="2">
    <tbody>
      <tr style="font-weight: bold; color: white;">
        <td colspan="4" rowspan="1" style="vertical-align: top; text-align: center; background-color: rgb(142, 142, 153);"><big><span style="font-style: italic;">INSCRIPCIÓN</span><br>
        </big></td>
      </tr>
      <tr>
        <td style="vertical-align: middle; text-align: center;"><a href="regins.php"><input value="REGISTRAR" name="rees" type="button"></a></td>
        <td style="vertical-align: top;"><a href="conins.php"><input value="CONSULTAR" name="coin" type="button"></a></td>
  <td style="vertical-align: top; text-align: center;"><a href="repins.php"></a></td>
        <td style="vertical-align: top; text-align: center;"><a href="impins.php"><input value="IMPRIMIR" name="coes" type="button"></a></td>
      </tr>
    </tbody>
  </table>
  </p>
  
  
  
</div>
<p><big><span style="font-style: italic;"></span></big><br>
</p><p align="center">
<div align="center">
  <table style="text-align: left; width: 333px; margin-left: auto; margin-right: auto; height: 36px;" border="1" cellpadding="2" cellspacing="2">
    <tbody>
      <tr style="font-weight: bold; color: white;">
        <td colspan="1" rowspan="1" style="vertical-align: top; text-align: center; background-color: rgb(198, 198, 214);"><input onClick="cerrar()" value="CERRAR SESIÓN DE USUARIO" name="salir" type="button"></td>
  <!--
    </tr--> </tr>
    </tbody>
  </table>
  </p>
  
  
  
</div>
  </body></html>
