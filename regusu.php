<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head><?php include("verificar.php") ?><title>Sistema de Inscripción para el Registro y Control de Estudiantes</title></head><body style="color: rgb(0, 0, 0);" alink="#ee0000" link="#0000ee" vlink="#551a8b">
<table style="text-align: left; width: 100%;" border="0" cellpadding="2" cellspacing="2">

  <tbody>
    <tr style="font-weight: bold;" align="center">
      <td colspan="1" rowspan="1" style="vertical-align: top;"><img src="membrete1.png" alt="q" width="1007" height="142"><br>
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
<h4 style="background-color: rgb(198, 198, 214);">CREAR CUENTA DE
USUARIO DEL SISTEMA<br>
 </h4>
</big></div>
</div>

<form action="regnueusu.php" name="form1" method="post">
  <center>
  <fieldset style="border: 2px solid rgb(0, 0, 255); width: 100%;">&nbsp;
  <legend style="color: rgb(0, 0, 153); font-weight: bold; font-style: italic;" class="Estilo2"></legend><br>
  <table style="width: 1060px; height: 109px;" align="center" border="0" cellpadding="5" cellspacing="0">
    <tbody>
      <tr>
        <td style="vertical-align: top;">
        <table align="center" border="0" cellpadding="5" cellspacing="0">
          <tbody>
            <tr>

              <td style="color: rgb(0, 0, 153); font-weight: bold; font-style: italic; text-align: right;" width="150">
              <div style="text-align: center;"><small> </small> </div>
              <div style="text-align: center;" class="Estilo2"><small>* NOMBRE<br>
              </small></div>
              <small> </small></td>
            </tr>
          </tbody>

        </table>
        </td>
        <td style="color: rgb(0, 0, 153); font-weight: bold; font-style: italic; text-align: center;" width="150"> <small> </small>
        <div class="Estilo2"><small>* APELLIDO<br>
        </small></div>
        <small> </small></td>
        <td colspan="1">

        <table style="width: 177px; height: 21px;" align="center" border="0" cellpadding="5" cellspacing="0">
          <tbody>
            <tr>
              <td style="color: rgb(0, 0, 153); font-weight: bold; font-style: italic; text-align: center;" width="150"> <small> </small>
              <div class="Estilo2"><small>* USUARIO </small></div>
              <small> </small></td>
            </tr>

          </tbody>
        </table>
        </td>
        <td colspan="1" style="vertical-align: top;">
        <table style="width: 136px; height: 23px;" align="center" border="0" cellpadding="5" cellspacing="0">
<tbody><tr><td style="color: rgb(0, 0, 153); font-weight: bold; font-style: italic; text-align: center;" width="150"><small> </small>
        <div class="Estilo2"><small>* CLAVE </small></div>

        <small> </small></td></tr></tbody>
        </table>

        </td>
        <td style="vertical-align: top;">
        <table style="width: 183px; height: 32px;" align="center" border="0" cellpadding="5" cellspacing="0">
<tbody><tr><td style="color: rgb(0, 0, 153); font-weight: bold; font-style: italic; text-align: center;" width="150"><small> </small>
        <div class="Estilo2"><small>* CONFIRMAR CLAVE </small></div>
        <small> </small></td></tr></tbody>
        </table>

        </td>
        <td style="vertical-align: top;">
        <table style="width: 166px; height: 32px;" align="center" border="0" cellpadding="5" cellspacing="0">
<tbody><tr><td style="color: rgb(0, 0, 153); font-weight: bold; font-style: italic; text-align: center;" width="150">
        <div style="text-align: center;"><small> </small> </div>
        <div style="text-align: center;" class="Estilo2"><small>* TIPO </small></div>
        <small> </small></td></tr></tbody>
        </table>

        </td>

      </tr>
      <tr>
        <td style="vertical-align: top; text-align: center;">
        <div style="text-align: center;"><label> <input name="nomb" id="nomb" title="NOMBRE" size="20" maxlength="20" style="border: 1px solid rgb(0, 0, 255);"> </label></div>
 </td>
        <td style="vertical-align: top; text-align: center;"> <label> <input name="apel" id="apel" title="APELLIDO" size="20" maxlength="20" style="border: 1px solid rgb(0, 0, 255);"> </label></td>
        <td style="vertical-align: top; text-align: center;"><label> <input name="usua" id="usua" title="USUARIO" size="20" maxlength="20" style="border: 1px solid rgb(0, 0, 255);"> </label></td>
        <td style="vertical-align: top;">
        <div style="text-align: center;">
        </div>
 
        <div style="text-align: center;"><label> <input name="clave1" id="clave1" title="CLAVE" size="8" maxlength="8" style="border: 1px solid rgb(0, 0, 255);" type="password"> </label> 
        </div>
</td>
        <td style="vertical-align: top;">
        <div style="text-align: center;">
        <div style="text-align: center;"> <label> <input name="clave2" id="clave2" title="CONFIRMAR CLAVE" size="8" maxlength="8" style="border: 1px solid rgb(0, 0, 255);" type="password"> </label></div>
 </div>

        </td>

        <td style="vertical-align: top; text-align: center;">
 <SELECT NAME="tipo" id="tipo" SIZE=1 > 
<OPTION VALUE="ADMINISTRADOR">ADMINISTRADOR</OPTION>
<OPTION VALUE="BASICO">BASICO</OPTION>
</SELECT> 
        </td>
      </tr>
      
      
      
      <tr>
        <td colspan="6" rowspan="1" style="vertical-align: top; text-align: center;">El * indica que los campos deben ser introducidos de forma obligatoria.<br>
El
tipo de usuario debe ser ADMINISTRADOR o BASICO, el cual diferencia los
privilegios de acceso de usuario. El ADMISTRADOR tiene acceso a todo.<br>
        </td>
      </tr>
<tr>
        <td colspan="6" rowspan="1" style="vertical-align: top; text-align: right;">
        
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
<a href="menu.php" class="enlacenava">Menú principal</a> </font> </h3>
</div>


</body></html>
