<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head>
<?php include("verificar.php") ?><title>Sistema de Inscripción para el Registro y Control de Estudiantes</title></head><body>
<table align="center" style="text-align: left; width: 866px; height: 236px;" border="0" cellpadding="2" cellspacing="2">

<?php $numins=$_POST['numins'];


  include("conectar.php");
   $link = conectarse();
   $sql = "SELECT * FROM alumno";
   $lleno = mysql_fetch_array($resultado);
   $resultado = mysql_query($sql, $link);
   $fecha= date("d/m/y"); 
  ?>
  <tbody
    <tr style="font-weight: bold;" align="center">
      <td colspan="1" rowspan="1" style="vertical-align: top;"><img style="width: 974px; height: 50px;" alt="MPPE" title="Miniseterio del Poder Popular para la Educación" src="membrete1.png"><br>
      </td>
    </tr>
    <tr style="font-weight: bold;" align="center">
      <td colspan="1" rowspan="1" style="vertical-align: top;"><big><big style="color: rgb(0, 0, 0);">Sistema de Inscripción </big></big><br>
      <big><big style="color: rgb(0, 0, 0);"><big style="color: rgb(0, 0, 0);"> </big><small><big>para el Registro y
Control
de Estudiantes</big></small></big></big><br>
      </td>
    </tr>
    <tr style="color: black;">
      <td colspan="1" rowspan="1" style="vertical-align: top; text-align: center;"><big><small>República
de el salvadora<br>
      </small></big><big><small>ministerio de eduacion</small></big><br>
      <big><small>centro escolar canton san sebastian arriba</small></big></td>
    </tr>

  </tbody>
</table>
<form action="regnueinsc.php" name="form1" method="post">  <fieldset style="border: 2px solid rgb(0, 0, 0); width: 800px;"><legend style="color: rgb(0, 0, 0); font-weight: bold; font-style: italic;" class="Estilo2"></legend>
  <div align="center"> </div>
  <small> </small><small> </small>
  <small>


        </small><small>

      </small><table style="width: 869px; height: 194px; text-align: left; margin-left: auto; margin-right: auto;" border="0" cellpadding="0" cellspacing="0">
    <tbody>
      <tr>
        <td colspan="3" height="20"><small> </small>
        <div align="center"><small style="color: black;">
        <h2>REPORTE GENERAL DE MADRES - PADRES Y/O REPRESENTANTES</h2><?php echo"<p>Generado $fecha"?>
        </small>

<table style="border: 1px solid rgb(0, 0, 0); width: 905px; height: 26px; text-align: left; margin-left: auto; margin-right: auto; font-style: italic; color: black;" border="1" cellpadding="3" cellspacing="0"><tbody align="center"><tr><td colspan="10" style="border: 1px solid black; width: 200px; background-color: rgb(253, 253, 253); vertical-align: middle; text-align: center;">Datos de las madres - padres y/o representantes<small>
              </small><div col="5" class="Estilo2" align="left"><small>


<?php echo"<tr>
<td align=\"center\"  bgcolor='#D1D1D1' width='200' style='border:1px solid black' >
<div align='center' class='Estilo2'>
<font color='black' >CEDULA</font></div></td>
<td align=\"center\"  bgcolor='#D1D1D1' width='200' style='border:1px solid black' >
<div align='center' class='Estilo2'>
<font color='black' >NOMBRES</font></div></td>
<td align=\"center\"  bgcolor='#D1D1D1' width='200' style='border:1px solid black' >
<div align='center' class='Estilo2'>
<font color='black' >APELLIDOS</font></div></td>
<td align=\"center\"  bgcolor='#D1D1D1' width='200' style='border:1px solid black' >
<div align='center' class='Estilo2'>
<font color='black' >TELEFONO</font></div></td>
<td align=\"center\"  bgcolor='#D1D1D1' width='200' style='border:1px solid black' >
<div align='center' class='Estilo2'>
<font color='black' >CELULAR</font></div></td>
<td align=\"center\"  bgcolor='#D1D1D1' width='200' style='border:1px solid black' >
<div align='center' class='Estilo2'>
<font color='black' >CORREO</font></div></td>
<td align=\"center\"  bgcolor='#D1D1D1' width='200' style='border:1px solid black' >
<div align='center' class='Estilo2'>
<font color='black' >PROFESION</font></div></td>
<td align=\"center\"  bgcolor='#D1D1D1' width='200' style='border:1px solid black' >
<div align='center' class='Estilo2'>
<font color='black' >OCUPACION</font></div></td>
<td align=\"center\"  bgcolor='#D1D1D1' width='200' style='border:1px solid black' >
<div align='center' class='Estilo2'>
<font color='black' >FECHA DE NAC.</font></div></td><td align=\"center\"  bgcolor='#D1D1D1' width='200' style='border:1px solid black' >
<div align='center' class='Estilo2'>
<font color='black' >SUELDO</font></div></td>";

     $sql = "SELECT * FROM repre order by cedularep";
     $resultado = mysql_query($sql, $link);

      while($lleno = mysql_fetch_array($resultado))
           {
             {
              printf("<tr> 
<td align=\"center\" width='200' style='border:1px solid black' ><div align='center' class='Estilo2'>%s</div></td>
<td align=\"center\" width='200' style='border:1px solid black' ><div align='center' class='Estilo2'>%s</div></td>
<td align=\"center\" width='200' style='border:1px solid black' ><div align='center' class='Estilo2'>%s</div></td>
<td align=\"center\" width='200' style='border:1px solid black' ><div align='center' class='Estilo2'>%s</div></td>
<td align=\"center\" width='200' style='border:1px solid black' ><div align='center' class='Estilo2'>%s</div></td>
<td align=\"center\" width='300' style='border:1px solid black' ><div align='center' class='Estilo2'>%s</div></td>
<td align=\"center\" width='200' style='border:1px solid black' ><div align='center' class='Estilo2'>%s</div></td>
<td align=\"center\" width='200' style='border:1px solid black' ><div align='center' class='Estilo2'>%s</div></td>
<td align=\"center\" width='200' style='border:1px solid black' ><div align='center' class='Estilo2'>%s</div></td>
<td align=\"center\" width='200' style='border:1px solid black' ><div align='center' class='Estilo2'>%s</div></td></tr>
",$lleno['cedularep'],$lleno["nombrerep"],$lleno["apellidorep"],$lleno["telefonorep"],$lleno["celularrep"],$lleno["correorep"],$lleno["profesionrep"],$lleno["ocupacionrep"],$lleno["fechanacrep"],$lleno["sueldorep"]);

                }
             }
    $sql = "SELECT * FROM parametros WHERE id='1'";
    $resultado = mysql_query($sql, $link);
    $lleno = mysql_fetch_array($resultado);
    $menu= $lleno['menu'];
    echo "
        </small></div><br>
</td></tr>
    </tbody>


  </table>
<font color='blue'> </font> <div style='text-align: center;'><font color='blue'><span style='color: black; font-weight: normal;'></span
><a href='$menu' class='enlacenava'><input name='Submit2' value='Menú principal' type='button'></a></font><input value='Imprimir' class='botones' onclick='window.print()' type='button'>";





             mysql_free_result($resultado);

 
     ?>
           
</div>

  <div align="center">
  <h3><small> </small></h3>
  </div>
</td></tr></tbody></table></fieldset></form>
</body></html>
