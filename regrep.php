<?php include("verificar.php") ?>
<html><head>
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

function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = [8,37,39,46];

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }

function FormatDateField(xField){  
    var theText = xField.value;  
    theText = theText.replace(/\//gi ,"");  
    if(!(theText.length == 8 || theText.length == 8)){  
      alert("Fecha inválida, debe ser en formato DD/MM/AAAA");  
      xField.focus();  
      return false;  
    }  
    theText = theText.substring(0,2) + "/" + theText.substring(2,4) + "/" + theText.substring(4,8);  
    xField.value = theText;      
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
      <td colspan="1" rowspan="1" style="vertical-align: top;"><img src="membrete1.png" alt="q" width="1094" height="135"><br>
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
      <td colspan="1" rowspan="1" style="vertical-align: top; text-align: center;"><div align="center"><span class="Estilo1"><big><big><small>Centro Escolar Canton Sam Sebastian Arriba </small></big></big></span></div></td>
    </tr>
  </tbody>
</table>

<div style="color: rgb(0, 0, 153);" align="left">
<div style="text-align: center;"><big>
<h4 style="background-color: rgb(198, 198, 214);">REGISTRAR NUEVO REPRESENTANTE<br>
 </h4>
</big></div>
</div>

<form action="regnuerep.php" name="form1" method="post">
  <center>
  <fieldset style="border: 2px solid rgb(0, 0, 255); width: 768px;"><legend style="color: rgb(0, 0, 153); font-weight: bold; font-style: italic;" class="Estilo2"></legend>
  
  <table style="width: 1100px; height: 273px; text-align: left; margin-left: auto; margin-right: auto;" border="0" cellpadding="5" cellspacing="0">

    <tbody>

      <tr>
        <td style="vertical-align: top;"><small>
        </small>
        <small>
          </small><small>
            </small><small>

              </small><small>
            </small><small>
          </small>
          <small>

        </small>
        <table style="width: 194px; height: 36px;" align="center" border="0" cellpadding="5" cellspacing="0">
          <tbody>
            <tr>
              <td style="color: rgb(0, 0, 153); font-weight: bold; font-style: italic; text-align: right;" width="150"><small>
              </small><div style="text-align: center;"><small><small>  </small></small></div>
              <div style="text-align: center;"><small>* CEDULA</small><br>
              <small><small>
              </small></small></div>
</td></tr>
            </tbody></table>
        <small>
        </small></td>
        <td style="color: rgb(0, 0, 153); font-weight: bold; font-style: italic; text-align: center;" width="150"> <small> </small>
        <div class="Estilo2"><small>* NOMBRES<br>
        </small></div>
        <small> </small></td>
        <td colspan="1">

        <table style="width: 177px; height: 21px;" align="center" border="0" cellpadding="5" cellspacing="0">
          <tbody>
            <tr>
              <td style="color: rgb(0, 0, 153); font-weight: bold; font-style: italic; text-align: center;" width="150"> <small> </small>
              <div class="Estilo2"><small>* APELLIDOS </small></div>
              <small> </small></td>
            </tr>

          </tbody>
        </table>
        </td>
        <td colspan="1" style="vertical-align: top;">
        <table style="width: 102px; height: 32px;" align="center" border="0" cellpadding="5" cellspacing="0">
<tbody><tr><td style="color: rgb(0, 0, 153); font-weight: bold; font-style: italic; text-align: center;" width="150"><small> </small>
        <div class="Estilo2"><small>E-MAIL<br>
  </small></div>

        <small> </small></td></tr></tbody>
        </table>

        </td>
        <td style="vertical-align: top;">
        <table style="width: 218px; height: 32px;" align="center" border="0" cellpadding="5" cellspacing="0">
<tbody><tr><td style="color: rgb(0, 0, 153); font-weight: bold; font-style: italic; text-align: center;" width="150"><small> </small>
        <div class="Estilo2"><small>* FECHA DE NACIMIENTO<br>
 </small></div>
        <small> </small></td></tr></tbody>
        </table>

        </td>
        

      </tr>
      <tr>

        <td style="vertical-align: top; text-align: center;">
        <div style="text-align: center;"><label> <input name="cedrep" id="cedrep" title="CEDULA" size="14" maxlength="14" style="border: 1px solid rgb(0, 0, 255);" onKeyPress="javascript:return validarNro(event)" > </label></div>
 </td>
        <td style="vertical-align: top; text-align: center;"> <label> <input name="nomrep" id="nomrep" title="NOMBRE" size="20" maxlength="20" style="border: 1px solid rgb(0, 0, 255);" onKeyPress="return soloLetras(event)" > </label></td>
        <td style="vertical-align: top; text-align: center;"><label> <input name="aperep" id="aperep" title="APELLIDO" size="20" maxlength="20" style="border: 1px solid rgb(0, 0, 255);" onKeyPress="return soloLetras(event)"> </label></td>
        <td style="vertical-align: top;">
        <div>
        </div>
 
        <input name="correp" id="correp" title="CORREO" size="30" maxlength="30" style="border: 1px solid rgb(0, 0, 255);">
</td>
        <td style="vertical-align: top; text-align: center;">
        <label> <input style="border: 1px solid rgb(0, 0, 255);" name="fecnacrep" id="fecnacrep" title="FECHA DE NACIMIENTO" size="10" maxlength="10"  onchange="FormatDateField(this)"> </label></td>

        
      </tr>

      
      
      
      <tr>
        <td style="vertical-align: top;">
        <table style="width: 229px; height: 32px;" align="center" border="0" cellpadding="5" cellspacing="0">
<tbody><tr><td style="color: rgb(0, 0, 153); font-weight: bold; font-style: italic; text-align: center;" width="150"><small> </small>
        <div class="Estilo2"><small>* DIRECCIÓN DE HABITACION<br>
 </small></div>

        <small> </small></td></tr></tbody>
        </table>
        </td>
        <td colspan="4" rowspan="1" style="vertical-align: top;"><label> <input name="dirrep" id="dirrep" title="DIRECCIÓN DE HABITACIÓN" size="120" maxlength="120" style="border: 1px solid rgb(0, 0, 255);"> </label>
        </td>
      </tr>
      <tr>
        <td style="vertical-align: top;">
        <table style="width: 177px; height: 21px;" align="center" border="0" cellpadding="5" cellspacing="0">
<tbody><tr><td style="color: rgb(0, 0, 153); font-weight: bold; font-style: italic; text-align: center;" width="150"> <small> </small>
              <div class="Estilo2"><small>SUELDO MENSUAL<br>
 </small></div>
              <small> </small></td></tr></tbody>
        </table>
        </td>
        <td style="vertical-align: top; text-align: center;">
        <table style="width: 177px; height: 21px;" align="center" border="0" cellpadding="5" cellspacing="0">
<tbody><tr><td style="color: rgb(0, 0, 153); font-weight: bold; font-style: italic; text-align: center;" width="150"> <small> </small>
              <div class="Estilo2"><small>PROFESIÓN<br>
 </small></div>
              <small> </small></td></tr></tbody>
        </table>
        </td>
        <td style="vertical-align: top;">
        <table style="width: 177px; height: 21px;" align="center" border="0" cellpadding="5" cellspacing="0">
<tbody><tr><td style="color: rgb(0, 0, 153); font-weight: bold; font-style: italic; text-align: center;" width="150"> <small> </small>
              <div class="Estilo2"><small>* DEDICACIÓN </small></div>
              <small> </small></td></tr></tbody>
        </table>
        </td>
        <td style="vertical-align: top;">
        <table style="width: 177px; height: 21px;" align="center" border="0" cellpadding="5" cellspacing="0">
<tbody><tr><td style="color: rgb(0, 0, 153); font-weight: bold; font-style: italic; text-align: center;" width="150"> <small> </small>
              <div class="Estilo2"><small>TELÉFONO LOCAL<br>
 </small></div>
              <small> </small></td></tr></tbody>
        </table>
        </td>
        <td style="vertical-align: top;">
        <table style="width: 177px; height: 21px;" align="center" border="0" cellpadding="5" cellspacing="0">
<tbody><tr><td style="color: rgb(0, 0, 153); font-weight: bold; font-style: italic; text-align: center;" width="150"> <small> </small>
              <div class="Estilo2"><small>TELÉFONO CELULAR<br>
 </small></div>
              <small> </small></td></tr></tbody>
        </table>
        </td>
      </tr>
      <tr>
        <td style="vertical-align: top; text-align: center;"><label> <input name="suerep" id="suerep" title="SUELDO APROXIMADO" size="5" maxlength="5" style="border: 1px solid rgb(0, 0, 255);" onKeyPress="javascript:return validarNro(event)" > </label></td>
        <td style="vertical-align: top;"><label> <input name="prorep" id="prorep" title="PROFESION" size="30" maxlength="30" style="border: 1px solid rgb(0, 0, 255);"  onkeypress="return soloLetras(event)"> </label></td>
        <td style="vertical-align: top;"><label> <input name="ocurep" id="ocurep" title="DEDICACIÓN U OCUPACIÓN" size="30" maxlength="30" style="border: 1px solid rgb(0, 0, 255);"  onkeypress="return soloLetras(event)"> </label></td>
        <td style="vertical-align: top; text-align: center;"><label> <input name="telrep" id="telrep" title="TELÉFONO LOCAL" size="11" maxlength="11" style="border: 1px solid rgb(0, 0, 255);" onKeyPress="javascript:return validarNro(event)" > </label></td>
        <td style="vertical-align: top; text-align: center;"><label> <input name="celrep" id="celrep" title="TELÉFONO CELULAR" size="11" maxlength="11" style="border: 1px solid rgb(0, 0, 255);"onkeypress="javascript:return validarNro(event)" > </label></td>
      </tr>
<tr>
        <td colspan="5" rowspan="1" style="vertical-align: top; text-align: center;">El * indica que los campos deben ser introducidos de forma obligatoria.<br>
El
formato de los campos, cedula&nbsp; debe ser "12345678", la fecha en formato "21/05/1995"<br>
        </td>
      </tr>
<tr>
        <td colspan="5" rowspan="1" style="vertical-align: top; text-align: right;">
        
        <div style="text-align: center;"><input value="Crear" class="botones" type="submit"> <input name="Submit2" value="Limpiar" type="reset"> <br>
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
</div>





</body></html>
