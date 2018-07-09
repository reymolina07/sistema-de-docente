<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head>
<?php include("verificar.php") ?>
  <title>Sistema de Inscripción para el Registro y Control de
Estudiantes</title>

  
</head><body style="color: rgb(0, 0, 0);" alink="#ee0000" link="#0000ee" vlink="#551a8b">
<table style="text-align: left; width: 100%;" border="0" cellpadding="2" cellspacing="2">

  <tbody>
    <tr style="font-weight: bold;" align="center">
      <td colspan="1" rowspan="1" style="vertical-align: top;"><img src="membrete1.png" alt="Q" width="997" height="137"><br>
      </td>
    </tr>
    <tr style="font-weight: bold;" align="center">
      <td colspan="1" rowspan="1" style="vertical-align: top;"><big><big style="color: rgb(0, 0, 153);">Sistema de Inscripción </big></big><br>
      <big><big style="color: rgb(0, 0, 153);"><big style="color: rgb(0, 0, 153);"> </big><small><big>para el Registro y
Control
de Estudiantes</big></small></big></big><br>
      </td>
    </tr>
    <tr>
      <td colspan="1" rowspan="1" style="vertical-align: top; text-align: center;"><big style="color: rgb(0, 0, 153);"><small>Centro Escolar Canton San Sebastian Arriba  </small></big></td>
    </tr>
  </tbody>
</table>

<div style="color: rgb(0, 0, 153);" align="left">
<div style="text-align: center;"><big>
<h4 style="background-color: rgb(198, 198, 214);">IMPRIMIR INSCRIPCION </h4>
</big></div>
</div>

<form action="impinscrip.php" name="form1" method="post">
  <center>
  <fieldset style="border: 2px solid rgb(0, 0, 255); width: 400px;"><legend style="color: rgb(0, 0, 153); font-weight: bold; font-style: italic;" class="Estilo2"></legend>
  <table style="width: 872px; height: 137px;" align="center" border="0" cellpadding="5" cellspacing="0">
    <tbody>
      <tr style="color: rgb(51, 51, 255); font-style: italic; font-weight: bold;">
        <td style="vertical-align: top; text-align: center;"> POR FAVOR
INTRODUZCA EL NUMERO DE INSCRIPCIÓN<br>
        </td>
      </tr>
      <tr>
        <td style="vertical-align: top; text-align: center;">
        <div style="text-align: center;">
        <div style="text-align: center;"><input name="numins" id="numins" title="Introduzca el numero de incripción del estudiante" size="14" maxlength="14" style="border: 1px solid rgb(0, 0, 255);"> </div>
        </div>
        </td>
      </tr>
      <tr>
        <td colspan="1" rowspan="1" style="vertical-align: top; text-align: center;"> <br>
        </td>
      </tr>
      <tr>
        <td colspan="1" rowspan="1" style="vertical-align: top; text-align: right;">
        <div style="text-align: center;"><input value="Buscar" class="botones" type="submit"> <input name="Submit2" value="Limpiar" type="reset"> <br>
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
