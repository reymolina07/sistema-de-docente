<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head>
<?php include("verificar.php") ?>
  <title>Sistema de Inscripción para el Registro y Control de Estudiantes</title>

  
</head><body style="color: rgb(0, 0, 0);" alink="#ee0000" link="#0000ee" vlink="#551a8b">
<table style="text-align: left; width: 100%;" border="0" cellpadding="2" cellspacing="2">

  <tbody>
    <tr style="font-weight: bold;" align="center">
      <td colspan="1" rowspan="1" style="vertical-align: top;"><br>
        <img src="membrete1.png" alt="q" width="1003" height="131"></td>
    </tr>
    <tr style="font-weight: bold;" align="center">
      <td colspan="1" rowspan="1" style="vertical-align: top;"><big><big style="color: rgb(0, 0, 153);">Sistema de Inscripción </big></big><br>
      <big><big style="color: rgb(0, 0, 153);"><big style="color: rgb(0, 0, 153);"> </big><small><big>para el Registro y
Control
de Estudiantes</big></small></big></big><br>
      </td>
    </tr>
    <tr>
      <td colspan="1" rowspan="1" style="vertical-align: top; text-align: center;"><big style="color: rgb(0, 0, 153);"><small>Centro Escolar Canton San Sebastian Arriba - San Tiango Nonualco </small></big></td>
    </tr>
  </tbody>
</table>

<div style="color: rgb(0, 0, 153);" align="left">
<div style="text-align: center;"><big>
<h4 style="background-color: rgb(198, 198, 214);">IMPRIMIR LISTADO DE ALUMNOS POR GRADO Y SECCIÓN </h4>
</big></div>
</div>

<form action="impgrasec.php" name="form1" method="post">
  <center>
  <fieldset style="border: 2px solid rgb(0, 0, 255); width: 400px;"><legend style="color: rgb(0, 0, 153); font-weight: bold; font-style: italic;" class="Estilo2"></legend>
  <table style="width: 872px; height: 137px;" align="center" border="0" cellpadding="5" cellspacing="0">
    <tbody>
      <tr style="color: rgb(51, 51, 255); font-style: italic; font-weight: bold;">
        <td style="vertical-align: top; text-align: center;"> POR FAVOR
SELECCIONE EL FILTRO QUE DESEA REALIZAR<br>
        </td>
      </tr>
      <tr>
        <td style="vertical-align: top; text-align: center;">
        <div style="text-align: center;">
      <div style="text-align: center;">GRADO: <SELECT NAME="grado" id="grado" SIZE=1 > 
<OPTION VALUE="1">1</OPTION>
<OPTION VALUE="2">2</OPTION>
<OPTION VALUE="3">3</OPTION>
<OPTION VALUE="4">4</OPTION>
<OPTION VALUE="5">5</OPTION>
<OPTION VALUE="6">6</OPTION>
</SELECT> </div>

        <div style="text-align: center;">SECCIÓN: <SELECT NAME="seccion" id="seccion" SIZE=1 > 
<OPTION VALUE="A">A</OPTION>
<OPTION VALUE="B">B</OPTION>
<OPTION VALUE="C">C</OPTION>
<OPTION VALUE="D">D</OPTION>
<OPTION VALUE="E">E</OPTION>
<OPTION VALUE="F">F</OPTION>
<OPTION VALUE="G">G</OPTION>
<OPTION VALUE="H">H</OPTION>
</SELECT> </div>



      </div>

        </td>
      </tr>
      <tr>
        <td colspan="1" rowspan="1" style="vertical-align: top; text-align: center;"> <br>
        </td>
      </tr>
      <tr>
        <td colspan="1" rowspan="1" style="vertical-align: top; text-align: right;">
        <div style="text-align: center;"><input value="Generar" class="botones" type="submit"> <input name="Submit2" value="Limpiar" type="reset"> <br>
        </div>
        </td>
      </tr>
    </tbody>
  </table>
  </fieldset>
  </center>
</form>

<div align="center"> <font color="blue"> </font>
<h3><font color="blue"><br>
<?php     
include("conectar.php");
    $link = conectarse();
    $sql = "SELECT * FROM parametros WHERE id='1'";
    $resultado = mysql_query($sql, $link);
    $lleno = mysql_fetch_array($resultado);
    $menu= $lleno['menu'];
echo "<a href='$menu' class='enlacenava'>Menú principal</a> </font> </h3>";
?>
 </font> </h3>
</div>

</body></html>
