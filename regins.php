<html><head>

<?php include("verificar.php") ?>
<script>
function validarNro(e) {
var key;
if(window.event) // IE
	{
	key = e.keyCode;
	}
else if(e.which) // Netscape/Firefox/Opera
	{
	key = e.which;
	}

if (key < 48 || key > 57)
    {
    if(key == 46 || key == 8) // Detectar . (punto) y backspace (retroceso)
        { return true; }
    else 
        { return false; }
    }
return true;
}
</script>
<title>Sistema de Inscripción para el Registro y Control de Estudiantes</title>
<style type="text/css">
<!--
.Estilo1 {
	color: #0000CC;
	font-weight: bold;
}
.Estilo2 {font-weight: bold}
-->
</style>
</head><body style="color: rgb(0, 0, 0);" alink="#ee0000" link="#0000ee" vlink="#551a8b">
<table style="text-align: left; width: 100%;" border="0" cellpadding="2" cellspacing="2">

  <tbody>
    <tr style="font-weight: bold;" align="center">
      <td colspan="1" rowspan="1" style="vertical-align: top;"><img src="membrete1.png" alt="q" width="1072" height="142"><br>
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
      <td colspan="1" rowspan="1" style="vertical-align: top; text-align: center;"><span class="Estilo1"><big><big><small>Centro Escolar Canton San Sebastian Arriba </small></big></big></span></td>
    </tr>
  </tbody>
</table>

<div style="color: rgb(0, 0, 153);" align="left">
<div style="text-align: center;"><big>
<h4 style="background-color: rgb(198, 198, 214);">REGISTRAR INSCRIPCIÓN DEL ESTUDIANTE<br>
 </h4>
</big></div>
</div>

<form action="regnueins.php" name="form1" method="post">

  <center>
  <fieldset style="border: 2px solid rgb(0, 0, 255); width: 768px;"><legend style="color: rgb(0, 0, 153); font-weight: bold; font-style: italic;" class="Estilo2"></legend>
  
  <table style="width: 1092px; height: 153px; text-align: left; margin-left: auto; margin-right: auto;" border="0" cellpadding="5" cellspacing="0">

    <tbody>

      <tr>
        <td style="font-weight: bold; font-style: italic; color: rgb(51, 51, 255); text-align: center; vertical-align: middle;"><small>* CEDULA DEL ESTUDIANTE</small></td>
        <td style="width: 150px; color: rgb(51, 51, 255); font-weight: bold; font-style: italic; text-align: center; vertical-align: middle; white-space: nowrap;"><small>* CEDULA DE LA MADRE<br>
        </small></td>
        <td style="text-align: center;" colspan="1"><small><span style="color: rgb(51, 51, 255); font-weight: bold; font-style: italic;">* CEDULA DEL PADRE</span><br>
        </small></td>
        <td colspan="1" style="color: rgb(51, 51, 255); font-weight: bold; font-style: italic; text-align: center;"><small>* CEDULA DEL REPRESENTANTE</small></td><td style="text-align: center;"><small><span style="font-weight: bold; font-style: italic; color: rgb(51, 51, 255);">* CEDULA DEL DOCENTE</span><br>
        </small></td>
        

        
        

      </tr>
      <tr>

        <td style="vertical-align: top; text-align: center;">
        <label> 

<input name="cedalu" id="cedalu" title="CEDULA DEL ESTUDIANTE" size="14" maxlength="14" style="border: 1px solid rgb(0, 0, 255);" onKeyPress="javascript:return validarNro(event)"> </label>
 </td>
        <td style="vertical-align: top; text-align: center;"> <label> <input name="cedmad" id="cedmad" title="CEDULA DE LA MADRE" size="9" maxlength="9" style="border: 1px solid rgb(0, 0, 255);" onKeyPress="javascript:return validarNro(event)"> </label></td>
        <td style="vertical-align: top; text-align: center;"><label> <input name="cedpad" id="cedpad" title="CEDULA DEL PADRE" size="9" maxlength="9" style="border: 1px solid rgb(0, 0, 255);" onKeyPress="javascript:return validarNro(event)"> </label></td>
        <td style="vertical-align: top;">
        <div>
        </div>
 
        
        <div style="text-align: center;"><label> <input name="cedrep" id="cedrep" title="CEDULA DEL REPRESENTANTE" size="9" maxlength="9" style="border: 1px solid rgb(0, 0, 255);" onKeyPress="javascript:return validarNro(event)"> </label></div>


</td><td style="vertical-align: top; text-align: center;">
        <label> <input name="ceddoc" id="ceddoc" title="CEDULA DEL DOCENTE" size="9" maxlength="9" style="border: 1px solid rgb(0, 0, 255);" onKeyPress="javascript:return validarNro(event)"> </label></td>

        

        
      </tr>

      
      
      
      
      
      
<tr>
        <td colspan="5" rowspan="1" style="vertical-align: top; text-align: center;">El * indica que los campos deben introducirse de forma obligatoria.<br>
Por favor introduzca las cedulas registradas previamente.
        </td><td style="vertical-align: top;"><br>
        </td>

      </tr>
<tr>
        <td colspan="5" rowspan="1" style="vertical-align: top; text-align: right;">
        
        <div style="text-align: center;"><input value="Seguir" class="botones" type="submit"> <input name="Submit2" value="Limpiar" type="reset"> <br>
        </div>


        
        </td><td style="vertical-align: top;"><br>
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
