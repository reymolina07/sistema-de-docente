<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head>
<?php include("verificar.php") ?><title>Sistema de Inscripción para el Registro y Control de Estudiantes</title>
<style type="text/css">
<!--
.Estilo2 {font-size: 36px}
.Estilo3 {font-size: 18px}
-->
</style>
</head><body style="color: rgb(0, 0, 0);" alink="#ee0000" link="#0000ee" vlink="#551a8b">


<table style="text-align: left; width: 100%;" border="0" cellpadding="2" cellspacing="2">

  <tbody>
    <tr style="font-weight: bold;" align="center">
      <td colspan="1" rowspan="1" style="vertical-align: top;"><span class="Estilo10"><span class="Estilo4"><br>
        <img src="imagenes/membrete.png" alt="Q" width="1027" height="141">      </span></td>
    </tr>
    <tr style="font-weight: bold;" align="center">
      <td colspan="1" rowspan="1" style="vertical-align: top;"><span class="Estilo10"><span class="Estilo6"><br>
              <span class="Estilo3"><big><big style="color: rgb(0, 0, 153);"> <small><big>Registro y
                Control
                de Estudiantes</big></small></big></big></span></span><br>
      </span></td>
    </tr>
    <tr>
      <td colspan="1" rowspan="1" style="vertical-align: top; text-align: center;"><p class="Estilo3" style="color: #0033CC"><big style="color: rgb(0, 0, 153);"><small>Centro Escolar canton San Sebastian Arriba </small></big></p>
          <p style="color: #0033CC">&nbsp;</p></td>
    </tr>
  </tbody>
</table>

<div style="color: rgb(0, 0, 153);" align="left">
<div style="text-align: center;"><big>
<h4 style="background-color: rgb(198, 198, 214);">MODIFICAR CUENTA DE
USUARIO </h4>
</big></div>
</div>

<form action="modiusu.php" name="form1" method="post">
  <center>
  <fieldset style="border: 2px solid rgb(0, 0, 255); width: 100%;">&nbsp;
  <legend style="color: rgb(0, 0, 153); font-weight: bold; font-style: italic;" class="Estilo2"></legend><br>
  <table style="width: 1060px; height: 109px;" align="center" border="0" cellpadding="5" cellspacing="0">
    <tbody>
<?php include("conectar.php");
  $link = conectarse();
  $modusu = $_GET["modusu"];
  $sql = "SELECT * FROM user WHERE usuario='$modusu'";
  $resultado = mysql_query($sql, $link);
  $lleno = mysql_fetch_array($resultado);
  $nomusu= $lleno['nombre'];
  $apeusu= $lleno['apellido'];
  $clausu= $lleno['clave'];
  $tipusu= $lleno['tipo'];

?>

      <tr>
        <td style="vertical-align: top;">
        <table align="center" border="0" cellpadding="5" cellspacing="0">
          <tbody>
            <tr>

              <td style="color: rgb(0, 0, 153); font-weight: bold; font-style: italic; text-align: right;" width="150">
              <div style="text-align: center;"><small> </small> </div>
              <div style="text-align: center;" class="Estilo2"><small>NOMBRE<br>
              </small></div> 
              <small> </small></td>
            </tr>
          </tbody>

        </table>
        </td>
        <td style="color: rgb(0, 0, 153); font-weight: bold; font-style: italic; text-align: center;" width="150"> <small> </small>
        <div class="Estilo2"><small>APELLIDO <br>
        </small></div>
        <small> </small></td>
        <td colspan="1">

        <table style="width: 177px; height: 21px;" align="center" border="0" cellpadding="5" cellspacing="0">
          <tbody>
            <tr>
              <td style="color: rgb(0, 0, 153); font-weight: bold; font-style: italic; text-align: center;" width="150"> <small> </small>
              <div class="Estilo2"><small>USUARIO </small></div>
              <small> </small></td>
            </tr>

          </tbody>
        </table>
        </td>
        <td colspan="1" style="vertical-align: top;">
        <table style="width: 136px; height: 23px;" align="center" border="0" cellpadding="5" cellspacing="0">
<tbody><tr><td style="color: rgb(0, 0, 153); font-weight: bold; font-style: italic; text-align: center;" width="150"><small> </small>
        <div class="Estilo2"><small> CLAVE </small></div>

        <small> </small></td></tr></tbody>
        </table>

        </td>
        <td style="vertical-align: top;">
        <table style="width: 183px; height: 32px;" align="center" border="0" cellpadding="5" cellspacing="0">
<tbody><tr><td style="color: rgb(0, 0, 153); font-weight: bold; font-style: italic; text-align: center;" width="150"><small> </small>
        <div class="Estilo2"><small> CONFIRMAR CLAVE </small></div>
        <small> </small></td></tr></tbody>
        </table>

        </td>
        <td style="vertical-align: top;">
        <table style="width: 166px; height: 32px;" align="center" border="0" cellpadding="5" cellspacing="0">
<tbody><tr><td style="color: rgb(0, 0, 153); font-weight: bold; font-style: italic; text-align: center;" width="150">
        <div style="text-align: center;"><small> </small> </div>
        <div style="text-align: center;" class="Estilo2"><small> TIPO </small></div>
        <small> </small></td></tr></tbody>
        </table>

        </td>

      </tr>
      <tr>
        <td style="vertical-align: top; text-align: center;">
        <div style="text-align: center;"><label> <input name="nomb" id="nomb" title="NOMBRE" value="<?php echo $nomusu; ?>" size="20" maxlength="20" style="border: 1px solid rgb(0, 0, 255);"> </label></div>
 </td>
        <td style="vertical-align: top; text-align: center;"> <label> <input name="apel" id="apel" title="APELLIDO" value="<?php echo $apeusu; ?>" size="20" maxlength="20" style="border: 1px solid rgb(0, 0, 255);"> </label></td>
        <td style="vertical-align: top; text-align: center;"><label> <input name="usua" id="usua" title="USUARIO" value="<?php echo $modusu; ?>" size="10" maxlength="10" style="border: 1px solid rgb(0, 0, 255);" readonly> </label></td>
        <td style="vertical-align: top;">
        <div style="text-align: center;">
        </div>
 
        <div style="text-align: center;"><label> <input name="clave1" id="clave1" title="CLAVE" value="<?php echo $clausu;?>" size="8" maxlength="8" style="border: 1px solid rgb(0, 0, 255);" type="password"> </label> 
        </div>
</td>
        <td style="vertical-align: top;">
        <div style="text-align: center;">
        <div style="text-align: center;"> <label> <input name="clave2" id="clave2" title="CONFIRMAR CLAVE" value="<?php echo $clausu;?>" size="8" maxlength="8" style="border: 1px solid rgb(0, 0, 255);" type="password"> </label></div>
 </div>

        </td>

        <td style="vertical-align: top; text-align: center;">

 <SELECT NAME="tipo" id="tipo" SIZE=1 > 
<OPTION SELECTED="<?php echo $tipusu; ?>"><?php echo $tipusu; ?></OPTION>
<OPTION VALUE="ADMINISTRADOR">ADMINISTRADOR</OPTION>
<OPTION VALUE="BASICO">BASICO</OPTION>
</SELECT> 


        </td>

      </tr>
      
      
      
      <tr>
        <td colspan="6" rowspan="1" style="vertical-align: top; text-align: center;">El
tipo de usuario debe ser "administrador" o "basico", el cual diferencia los
privilegios de acceso de usuario. El administrador tiene acceso a todo el sistema.
El campo usuario es de solo lectura, ya que al modificar podria infringir la unicidad del indice, campo clave o primario.
<br>
        </td>
      </tr>
<tr>
        <td colspan="6" rowspan="1" style="vertical-align: top; text-align: right;">
        
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
