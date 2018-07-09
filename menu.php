<?php include("verificar.php") ?>
<html><head>

  <title>.:: Sistema de Inscripción para el Registro y Control de
Estudiantes y maestros</title>

  
  
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
.Estilo6 {font-size: 24px}
.Estilo10 {color: #0033CC}
-->
  </style>
  </head><body>
  <table style="text-align: left; width: 100%;" border="0" cellpadding="2" cellspacing="2">

  <tbody>
    <tr style="font-weight: bold;" align="center">
      <td colspan="1" rowspan="1" style="vertical-align: top;"><span class="Estilo10"><span class="Estilo4"><br>
          
          <img src="membrete1.png" alt="q" width="1104" height="115">
       
      </span></td>
    </tr>
    <tr style="font-weight: bold;" align="center">
      <td colspan="1" rowspan="1" style="vertical-align: top;"><span class="Estilo10"><span class="Estilo6"><br>
          <big><big style="color: rgb(0, 0, 153);"> <small><big>Registro y
Control
de Estudiantes</big></small></big></big></span><br>
      </span></td>
    </tr>
    <tr>
      <td colspan="1" rowspan="1" style="vertical-align: top; text-align: center;"><p class="Estilo6" style="color: #0033CC"><big style="color: rgb(0, 0, 153);"><small>Centro Escolar canton San Sebastian Arriba </small></big></p>
      <p style="color: #0033CC">&nbsp;</p></td>
    </tr>
  </tbody>
</table>

  <div align="center">
  <table style="text-align: left; width: 100%; height: 37px; font-weight: bold; margin-left: auto; margin-right: auto;" border="1" cellpadding="2" cellspacing="2">
    
    <tbody>
      <tr>
        <td style="vertical-align: top; background-color: rgb(198, 198, 214); text-align: center;"><big style="color: rgb(0, 0, 153);">
          <p align="center">MENÚ PRINCIPAL<br>
        </p>        </tr>
    </tbody>
  </table>
  <table style="text-align: left; width: 1057px; height: 67px; margin-left: auto; margin-right: auto;" border="1" cellpadding="2" cellspacing="2">
    
    <tbody>
      <tr style="font-weight: bold; color: white;">
        <td colspan="3" rowspan="1" style="vertical-align: top; color: white; background-color: rgb(142, 142, 153); text-align: center;"><big><span style="font-style: italic;">ESTUDIANTE</span><br>
        </big></td>
        <td colspan="3" rowspan="1" style="vertical-align: top; color: white; background-color: rgb(142, 142, 153); text-align: center; font-style: italic;">MADRE
          - PADRE - REPRESENTANTE<br>        </td>
        <td colspan="3" rowspan="1" style="vertical-align: top; color: white; background-color: rgb(142, 142, 153); text-align: center; font-style: italic;">DOCENTE<br>        </td>
      </tr>
      <tr>
        <td width="135" style="vertical-align: middle; text-align: center;"><a href="regalu.php">
        <input value="REGISTRAR" name="rees" type="button"></a></td>
        <td width="147" style="vertical-align: top; text-align: center;"><a href="conalu.php">
        <input value="CONSULTAR" name="coes" type="button"></a></td>
        <td width="1" style="vertical-align: top; text-align: center;">&nbsp;</td>
        <td width="197" style="vertical-align: top; text-align: center;"><a href="regrep.php">
          <input value="REGISTRAR" name="rees" type="button"></a><br>        </td>
        <td width="217" style="vertical-align: top; text-align: center;"><a href="conrep.php">
          <input value="CONSULTAR" name="coes" type="button"></a><br>        </td>
        <td width="1" style="vertical-align: top; text-align: center;"><a href="reprep.php"></a></td>
        <td width="133" style="vertical-align: top; text-align: center;"><a href="regdoc.php">
          <input value="REGISTRAR" name="rees" type="button"></a><br>        </td>
        <td width="149" style="vertical-align: top; text-align: center;"><a href="condoc.php">
          <input value="CONSULTAR" name="coes" type="button"></a><br>        </td>
        <td width="1" style="vertical-align: top; text-align: center;"><a href="repdoc.php"></a></td>
      </tr>
      <tr>
        <td colspan="3" rowspan="1" style="vertical-align: top; text-align: center;"><a href="busalu.php"><input value="BUSCAR" name="bues" type="button"></a></td>
        <td colspan="3" rowspan="1" style="vertical-align: top; text-align: center;"><a href="busrep.php"><input value="BUSCAR" name="burep" type="button"></a></td>
        <td colspan="3" rowspan="1" style="vertical-align: top; text-align: center;"><a href="busdoc.php"><input value="BUSCAR" name="budo" type="button"></a></td>
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
        <td width="84" style="vertical-align: middle; text-align: center;"><a href="regins.php">
        <input value="REGISTRAR" name="rees" type="button"></a></td>
        <td width="88" style="vertical-align: top;"><a href="conins.php">
        <input value="CONSULTAR" name="coin" type="button"></a></td>
        <td width="1" style="vertical-align: top; text-align: center;">&nbsp;</td>
        <td width="124" style="vertical-align: top; text-align: center;"><a href="impins.php">
        <input value="IMPRIMIR" name="coes" type="button"></a></td>
      </tr>
      <tr>
        <td colspan="2" rowspan="1" style="vertical-align: top; text-align: center;"><a href="busins.php"><input value="BUSCAR" name="buin" type="button"></a></td>
        <td colspan="2" rowspan="1" style="vertical-align: top; text-align: center;"><a href="impinsfil.php"><input value="REPORTE FILTRADO" name="rees" type="button"></a></td>
      </tr>
      <tr align="center">
        <td colspan="4" rowspan="1" style="vertical-align: top;">&nbsp;</td>
      </tr>
    </tbody>
  </table>
  </p>
    
  </div>
  <p align="center"><big><span style="font-style: italic;"></span></big>
  <div align="center">
  <table style="text-align: left; width: 731px; margin-left: auto; margin-right: auto; height: 75px;" border="1" cellpadding="2" cellspacing="2">
    <tbody>
      <tr style="font-weight: bold; color: white;">
        <td colspan="2" rowspan="1" style="vertical-align: top; background-color: rgb(142, 142, 153); text-align: center; font-weight: bold; font-style: italic;"><big>CUENTAS
          DE USUARIO<br>
        </big></td>
        <td colspan="2" rowspan="1" style="vertical-align: top; text-align: center; font-weight: bold; font-style: italic; background-color: rgb(142, 142, 153);">BASE
          DE DATOS<br>        </td>
      </tr>
      <tr>
        <td style="vertical-align: middle; text-align: center;"><a href="regusu.php"><input value="REGISTRAR" name="rees" type="button"></a></td>
        <td style="vertical-align: top; text-align: center;"><a href="conusu.php"><input value="CONSULTAR" name="coes" type="button"></a></td>
        <td style="vertical-align: top; text-align: center;"><a href="respaldar.php"><input value="RESPALDAR" name="rees" type="button"></a><br>        </td>
        <td style="vertical-align: top; text-align: center;"><a href="restaurar.php"><input value="RESTAURAR" name="coes" type="button"></a><br>        </td>
      </tr>
    </tbody>
  </table>
  </p>
    
  </div>
  <div style="text-align: center;">
    <div align="center"><a href="parametros.php">
    <input value="AÑO ESCOLAR" name="rees" type="button">
      </a>
    </div>
  </div>

<p align="center">
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
