<?php include("verificar.php") ?>
<?php  include("conectar.php");
  $link = conectarse();
  $cedalu = $_POST["modalu"];

   if ($cedalu=="")
    {
     echo "<div align=\"center\"><br><h2><font color='blue'>Error: Introduzca la cedula escolar o normal del estudiante</font></h2></div>";
     echo "<div align=\"center\"><font color='blue'><h2><a href='javascript:window.history.go(-1)' class='enlacenava'>Regresar</font></h2></a></div>";
     exit(); // Salir del programa...!
    }

    $buscar = mysql_query("select * from alumno where cedulaalu = '$cedalu'");
     if(mysql_fetch_array($buscar))
     {

     }else{
     echo "<div align=\"center\"><br><h2><font color='blue'>Error: No encuentra la cedula que introdujo, intente de nuevo</font></h2></div>";
     echo "<div align=\"center\"><font color='blue'><h2><a href='javascript:window.history.go(-1)' class='enlacenava'>Regresar</font></h2></a></div>";
     exit();
    }

  $sql = "SELECT * FROM alumno WHERE cedulaalu='$cedalu'";
  $resultado = mysql_query($sql, $link);
  $lleno = mysql_fetch_array($resultado);
  $nomalu= $lleno['nombrealu'];
  $apealu= $lleno['apllidoalu'];
  $fecnacalu= $lleno['fechanacalu'];
  $lugnacalu= $lleno['lugnacalu']; 
  $sexalu= $lleno['sexoalu'];
  
  $nomalu= strtoupper($nomalu);
  $apealu= strtoupper($apealu);
  $cedalu= strtoupper($cedalu);
  $lugnacalu= strtoupper($lugnacalu); 
?>

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
<title>Sistema de Inscripción para el Registro y Control de Estudiantes</title></head><body style="color: rgb(0, 0, 0);" alink="#ee0000" link="#0000ee" vlink="#551a8b">
<table style="text-align: left; width: 100%;" border="0" cellpadding="2" cellspacing="2">

  <tbody>

    <tr style="font-weight: bold;" align="center">
      <td colspan="1" rowspan="1" style="vertical-align: top;"><img src="membrete1.png" alt="q" width="961" height="143"><br>
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
      <td colspan="1" rowspan="1" style="vertical-align: top; text-align: center;"><big style="color: rgb(0, 0, 153);"><small>Centro Escolar Canton San Sebastian Arriba - San Tiango Nonualco </small></big></td>
    </tr>
  </tbody>
</table>

<div style="color: rgb(0, 0, 153);" align="left">
<div style="text-align: center;"><big>
<h4 style="background-color: rgb(198, 198, 214);">MODIFICAR DATOS ESTUDIANTE<br>
 </h4>
</big></div>
</div>

<form action="modialu.php" name="form1" method="post">
  <center>
  <fieldset style="border: 2px solid rgb(0, 0, 255); width: 768px;"><legend style="color: rgb(0, 0, 153); font-weight: bold; font-style: italic;" class="Estilo2"></legend>
  
  <table style="width: 1115px; height: 195px; text-align: left; margin-left: auto; margin-right: auto;" border="0" cellpadding="5" cellspacing="0">

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
        <table style="width: 197px; height: 36px;" align="center" border="0" cellpadding="5" cellspacing="0">
          <tbody>
            <tr>
              <td style="color: rgb(0, 0, 153); font-weight: bold; font-style: italic; text-align: right;" width="150"><small>
              </small><div style="text-align: center;"><small><small>  </small></small></div>
              <div style="text-align: center;"><small>* CEDULA ESCOLAR</small><br>
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
        <div class="Estilo2"><small>* SEXO<br>
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
        <div style="text-align: center;"><label> 

<input name="cedalu" id="cedalu" title="CEDULA ESCOLAR" size="14" maxlength="14" style="border: 1px solid rgb(0, 0, 255);" value="<?php echo $cedalu; ?>" readonly="readonly" > </label></div>
 </td>
        <td style="vertical-align: top; text-align: center;"> <label> <input name="nomalu" id="nomalu" title="NOMBRE" size="30" maxlength="30" style="border: 1px solid rgb(0, 0, 255);" value="<?php echo $nomalu; ?>"onkeypress="return soloLetras(event)" > </label></td>
        <td style="vertical-align: top; text-align: center;"><label> <input name="apealu" id="apealu" title="APELLIDO" size="30" maxlength="30" style="border: 1px solid rgb(0, 0, 255);" value="<?php echo $apealu; ?>" onKeyPress="return soloLetras(event)"> </label></td>
        <td style="vertical-align: top;">
        <div>
        </div>
 
        <SELECT NAME="sexalu" id="sexalu" SIZE=1 > 
<OPTION VALUE="MASCULINO">MACULINO</OPTION>
<OPTION SELECTED="<?php echo $sexalu; ?>"><?php echo $sexalu; ?></OPTION>
<OPTION VALUE="FEMENINO">FEMENINO</OPTION>
</SELECT> 
</td>
        <td style="vertical-align: top; text-align: center;">
        <label> <input style="border: 1px solid rgb(0, 0, 255);" name="fecnacalu" id="fecnacalu" title="FECHA DE NACIMIENTO" size="10" maxlength="10" value="<?php echo $fecnacalu; ?>" onChange="FormatDateField(this)"> </label></td>

        
      </tr>

      
      
      
      <tr>
        <td style="vertical-align: top;">
        <table style="width: 229px; height: 32px;" align="center" border="0" cellpadding="5" cellspacing="0">
<tbody><tr><td style="color: rgb(0, 0, 153); font-weight: bold; font-style: italic; text-align: center;" width="150"><small> </small>
        <div class="Estilo2"><small>* LUGAR DE NACIMIENTO<br>
 </small></div>

        <small> </small></td></tr></tbody>
        </table>
        </td>
        <td colspan="4" rowspan="1" style="vertical-align: top;"><label> <input name="lugnacalu" id="lugnacalu" title="LUGAR DE NACIMIENTO" size="50" maxlength="50" style="border: 1px solid rgb(0, 0, 255);" value="<?php echo $lugnacalu; ?>" onKeyPress="return soloLetras(event)"> </label><label>  </label><br>
        </td>
      </tr>
<tr>
        <td colspan="5" rowspan="1" style="vertical-align: top; text-align: center;">El * indica que los campos deben ser introducidos de forma obligatoria.<br>
El
formato de los campos, cedula escolar debe ser "E10213189584", la fecha en formato "21/05/1995"<br>
        </td>
      </tr>
<tr>
        <td colspan="5" rowspan="1" style="vertical-align: top; text-align: right;">
        
        <div style="text-align: center;"><input value="Guardar" class="botones" type="submit"> <input name="Submit2" value="Recargar" type="reset"> <br>
        </div>


        

<div align="center"> <font color="blue"> </font>
<h3><font color="blue"><br>
<?php     
    $sql = "SELECT * FROM parametros WHERE id='1'";
    $resultado = mysql_query($sql, $link);
    $lleno = mysql_fetch_array($resultado);
    $menu= $lleno['menu'];
echo "<a href='$menu' class='enlacenava'>Menú principal</a> </font> </h3>";
?>

</div>

        </td>
        
        
        
        
        
      </tr>
    
    </tbody>
  
  </table>

  </fieldset>
</center>
</form>


</body></html>
