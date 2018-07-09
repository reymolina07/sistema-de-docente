<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head>
<?php include("verificar.php") ?><title>Sistema de Inscripción para el Registro y Control de Estudiantes</title></head><body style="color: rgb(0, 0, 0);" alink="#ee0000" link="#0000ee" vlink="#551a8b">
<table style="text-align: left; width: 100%;" border="0" cellpadding="2" cellspacing="2">

  <tbody>
    <tr style="font-weight: bold;" align="center">
      <td colspan="1" rowspan="1" style="vertical-align: top;"><img src="membrete1.png" alt="q" width="968" height="141"><br>      </td>
    </tr>
    <tr style="font-weight: bold;" align="center">
      <td colspan="1" rowspan="1" style="vertical-align: top;"><big><big style="color: rgb(0, 0, 153);">Sistema de Inscripción </big></big><br>
      <big><big style="color: rgb(0, 0, 153);"><big style="color: rgb(0, 0, 153);"> </big><small><big>para el Registro y
Control
de Estudiantes</big></small></big></big><br>      </td>
    </tr>
    <tr>
      <td colspan="1" rowspan="1" style="vertical-align: top; text-align: center;"><big style="color: rgb(0, 0, 153);"><small>Centro Escolar Canton San Sebastian Arriba - San Tiango Nonualco </small></big></td>
    </tr>
  </tbody>
</table>

<div style="color: rgb(0, 0, 153);" align="left">
<div style="text-align: center;"><big>
<h4 style="background-color: rgb(198, 198, 214);">MODIFICAR DATOS DEL DOCENTE<br>
 </h4>
</big></div>
</div>

<form action="modidoc.php" name="form1" method="post">
<?php include("conectar.php");
  $link = conectarse();
  $ceddoc = $_GET["moddoc"];
  $sql = "SELECT * FROM docente WHERE ceduladoc='$ceddoc'";
  $resultado = mysql_query($sql, $link);
  $lleno = mysql_fetch_array($resultado);
  $nomdoc= $lleno['nombredoc'];
  $apedoc= $lleno['apellidodoc'];
  $dirdoc= $lleno['direcciondoc'];
  $teldoc= $lleno['telefonodoc']; 
  $celdoc= $lleno['celulardoc'];
  $cordoc= $lleno['correodoc'];
  $prodoc= $lleno['profesiondoc'];
  $espdoc= $lleno['especialidaddoc'];


  $nomdoc= strtoupper($nomdoc);
  $apedoc= strtoupper($apedoc);
  $dirdoc= strtoupper($dirdoc);
  $cordoc= strtolower($cordoc); 
  $espdoc= strtoupper($espdoc); 
  $prodoc= strtoupper($prodoc); 


?>
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
        
        

      </tr>
      <tr>

        <td style="vertical-align: top; text-align: center;">
        <div style="text-align: center;"><label> <input name="ceddoc" id="ceddoc" title="CEDULA" size="14" maxlength="14" style="border: 1px solid rgb(0, 0, 255);" value="<?php echo $ceddoc;?>" readonly="readonly"> </label></div>
 </td>
        <td style="vertical-align: top; text-align: center;"> <label> <input name="nomdoc" id="nomdoc" title="NOMBRE" size="30" maxlength="30" style="border: 1px solid rgb(0, 0, 255);" value="<?php echo $nomdoc;?>"> </label></td>
        <td style="vertical-align: top; text-align: center;"><label> <input name="apedoc" id="apedoc" title="APELLIDO" size="30" maxlength="30" style="border: 1px solid rgb(0, 0, 255);" value="<?php echo $apedoc;?>"> </label></td>
        <td style="vertical-align: top;">
        <div>
        </div>
 
        <input name="cordoc" id="cordoc" title="CORREO" size="30" maxlength="30" style="border: 1px solid rgb(0, 0, 255);" value="<?php echo $cordoc;?>">
</td>
        

        
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
        <td colspan="3" rowspan="1" style="vertical-align: top;"><label> <input name="dirdoc" id="dirdoc" title="DIRECCIÓN DE HABITACIÓN" size="120" maxlength="120" style="border: 1px solid rgb(0, 0, 255);" value="<?php echo $dirdoc;?>"> </label>
        </td>
      </tr>
      <tr>
        <td style="vertical-align: top;">
        <table style="width: 177px; height: 21px;" align="center" border="0" cellpadding="5" cellspacing="0">
<tbody><tr><td style="color: rgb(0, 0, 153); font-weight: bold; font-style: italic; text-align: center;" width="150"> <small> </small>
              <div class="Estilo2"><small>* PROFESION<br>
 </small></div>
              <small> </small></td></tr></tbody>
        </table>
        </td>
        <td style="vertical-align: top; text-align: center;">
        <table style="width: 177px; height: 21px;" align="center" border="0" cellpadding="5" cellspacing="0">
<tbody><tr><td style="color: rgb(0, 0, 153); font-weight: bold; font-style: italic; text-align: center;" width="150"> <small> </small>
              <div class="Estilo2"><small>* ESPECIALIDAD<br>
 </small></div>
              <small> </small></td></tr></tbody>
        </table>
        </td>
        <td style="vertical-align: top;">
        <table style="width: 177px; height: 21px;" align="center" border="0" cellpadding="5" cellspacing="0">
<tbody><tr><td style="color: rgb(0, 0, 153); font-weight: bold; font-style: italic; text-align: center;" width="150"> <small> </small>
              <div class="Estilo2"><small>TELEFONO LOCAL<br>
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

        <td style="vertical-align: top;"><label> <input name="prodoc" id="proesp" title="PROFESION" size="30" maxlength="30" style="border: 1px solid rgb(0, 0, 255);" value="<?php echo $prodoc;?>"> </label></td>
        <td style="vertical-align: top;"><label> <input name="espdoc" id="espdoc" title="DEDICACIÓN U OCUPACIÓN" size="30" maxlength="30" style="border: 1px solid rgb(0, 0, 255);" value="<?php echo $espdoc;?>"> </label></td>
        <td style="vertical-align: top; text-align: center;"><label> <input name="teldoc" id="teldoc" title="TELÉFONO LOCAL" size="11" maxlength="11" style="border: 1px solid rgb(0, 0, 255);" value="<?php echo $teldoc;?>"> </label></td>
        <td style="vertical-align: top; text-align: center;"><label> <input name="celdoc" id="celdoc" title="TELÉFONO CELULAR" size="11" maxlength="11" style="border: 1px solid rgb(0, 0, 255);" value="<?php echo $celdoc;?>"> </label></td>
      </tr>
<tr>
        <td colspan="5" rowspan="1" style="vertical-align: top; text-align: center;">El * indica que los campos deben ser introducidos de forma obligatoria.<br>
El
formato de los campos, cedula&nbsp; debe ser "123456789" DEBEN SER 9 DIGITOS, la fecha en formato "21/05/1995"<br>
        </td>
      </tr>
<tr>
        <td colspan="5" rowspan="1" style="vertical-align: top; text-align: right;">
        
        <div style="text-align: center;"><input value="Guardar" class="botones" type="submit"> <input name="Submit2" value="Recargar" type="reset"> <br>
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
    $sql = "SELECT * FROM parametros WHERE id='1'";
    $resultado = mysql_query($sql, $link);
    $lleno = mysql_fetch_array($resultado);
    $menu= $lleno['menu'];
echo "<a href='$menu' class='enlacenava'>Menú principal</a> </font> </h3>";
?>

</div>






</body></html>
