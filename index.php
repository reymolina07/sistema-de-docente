<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head>
<script language="JavaScript">
img1=new Image();
img1.src="imagenes/entrarn.png";
img2=new Image();
img2.src="imagenes/entrarf.png";
function Cambiaentrar(refer,nueva) {document[refer].src=eval(nueva+".src") };
  </script>
  
  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type"><title> Registro y Control de Estudiantes  ::.</title>
  <style type="text/css">
<!--
.Estilo1 {color: #000000}
.Estilo2 {font-size: 18px}
.Estilo4 {font-size: 18px; color: #FFFFFF; }
-->
  </style>
  </head><body style="background-attachment: fixed; background-image: url(imagenes/);">
<big> </big><big> </big><big> </big><big> </big><big> </big>
  <table width="99%" border="0" cellpadding="2" cellspacing="2" style="text-align: left; width: 100%;">
    <tr>
      <td bgcolor="#3366CC" style="vertical-align: middle; text-align: center;"><span class="Estilo4"><big><big><small>Sistema de Control de Docente y Alumnos </small></big></big></span></td>
    </tr>

  <tbody>
    <tr>
      <td style="vertical-align: top;">
      <div style="text-align: center; font-style: italic; font-weight: bold; color: white;">
        <div align="center">
          <p><big><big><img src="membrete1.png" alt="q" width="954" height="110"></big><big><big> d</big></big></big><img src="imagenes/1403204018.jpg" alt="qq" width="218" height="120"></p>
          <p><big><big><big>e Estudiantes<br>
          </big></big></big></p>
        </div>
      </div>
      <big> </big></td>
    </tr>
    </tbody>
</table>


<form method="post" action="control.php" name="form">
  <table width="91%" border="0" cellpadding="2" cellspacing="2" style="text-align: left; width: 100%; height: 234px;">


    <tbody><tr><td colspan="2" style="text-align: left;">

      <?php if (isset($_GET["errorusuario"]) && $_GET["errorusuario"]=="si"){?>

      <span style="color: RED;"><b></b>
      <center><b> <script language="JavaScript">
                      {
                     alert("¡Usuari@ o clave no válid@!");
                          } 
                    </script></b></center></span>

      <?php }

     else

      { ?>

       <center>

      <?php } ?>
    </center><br>
</td>
    </tr></tbody><tbody>
      <tr style="font-style: italic; font-weight: bold;" align="center">
        <td style="vertical-align: top;"><span class="Estilo1"><big><big>USUARIO<br>
        </big></big></span></td>
      </tr>
      <tr style="font-style: italic; font-weight: bold;" align="center">
        <td style="vertical-align: top;"><big><big>
          <input maxlength="12" tabindex="1" name="usuario"><br>
        </big></big></td>
      </tr>
      <tr style="font-style: italic; font-weight: bold;" align="center">
        <td style="vertical-align: top;"><span class="Estilo1"><big><big>CLAVE<br>
        </big></big></span></td>
      </tr>
      <tr style="font-style: italic; font-weight: bold;" align="center">
        <td style="vertical-align: top;"><big><big>
          <input maxlength="8" name="clave" type="password"><br>
        </big></big></td>
      </tr>
      <tr>
        <td bordercolor="#003366" style="vertical-align: top; text-align: center;">
<a onClick="document.form.submit()" onMouseOver="Cambiaentrar('enlace','img2')" onMouseOut="Cambiaentrar('enlace','img1')"><img src="imagenes/entrarn.png" name="enlace" width="70" height="38" border="0" style="width: 146px; height: 60px;"></a>
<br>        </td>
      </tr>
    </tbody>
  </table>
</form>

<div style="text-align: center;"><br>
</div>
<table width="96%" height="49" border="0" cellpadding="2" cellspacing="2" style="text-align: left; width: 100%; margin-left: auto; margin-right: auto; font-weight: bold; font-style: italic; color: white;">
  <tbody>
    <tr>
      <td bgcolor="#3366CC" style="vertical-align: middle; text-align: center;"><span class="Estilo2"><big><big><small>Centro Escolar Canton San Sebastian Arriba </small></big></big></span></td>
    </tr>
  </tbody>
</table>
<br>

<br>




</body></html>
