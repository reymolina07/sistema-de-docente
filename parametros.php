<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head><?php include("verificar.php") ?><title>Sistema de Inscripción para el Registro y Control de Estudiantes</title></head><body style="color: rgb(0, 0, 0);" alink="#ee0000" link="#0000ee" vlink="#551a8b">


<table style="text-align: left; width: 100%;" border="0" cellpadding="2" cellspacing="2">

  <tbody>
    <tr style="font-weight: bold;" align="center">
      <td colspan="1" rowspan="1" style="vertical-align: top;"><img src="membrete1.png" alt="q" width="942" height="119"><br>
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
<h4 style="background-color: rgb(198, 198, 214);">MODIFICAR AÑO ESCOLAR </h4>
</big></div>
</div>

<form action="gparametros.php" name="form1" method="post">
  <center>
  <fieldset style="border: 2px solid rgb(0, 0, 255); width: 100%;"><legend style="color: rgb(0, 0, 153); font-weight: bold; font-style: italic;" class="Estilo2"></legend><?php include("conectar.php");
  $link = conectarse();
  $sql = "SELECT * FROM parametros WHERE id='1'";
  $resultado = mysql_query($sql, $link);
  $lleno = mysql_fetch_array($resultado);
  $anoesc= $lleno['anoescolar'];

?>
  <table style="width: 1060px; height: 109px;" align="center" border="0" cellpadding="5" cellspacing="0">
    <tbody>


      <tr style="color: rgb(51, 51, 255); font-style: italic; font-weight: bold;">
        <td style="vertical-align: top;">
        <div style="text-align: center;"><small>AÑO ESCOLAR</small></div>
</td>
        
        
        
        
        

      </tr>
      <tr>
        <td style="vertical-align: top; text-align: center;">
        <div style="text-align: center;">
        <div style="text-align: center;"><input name="anoesc" id="anoesc" title="Año escolar en que cursarán los estudiantes" value="<?php echo $anoesc;?>" size="20" maxlength="4" style="border: 1px solid rgb(0, 0, 255);"> 
        </div>
</div>
 </td>
        
        
        
        

        
      </tr>
      
      
      
      <tr>
        <td colspan="1" rowspan="1" style="vertical-align: top; text-align: center;"><br>
        </td>
      </tr>
<tr>
        <td colspan="1" rowspan="1" style="vertical-align: top; text-align: right;">
        
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
<a href="menu.php" class="enlacenava">Menú principal</a> </font> </h3>
</div>




</body></html>




