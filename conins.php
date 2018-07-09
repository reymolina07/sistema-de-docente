
<?php include("verificar.php") ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head>


  <title>Sistema de Inscripción para el Registro y Control de
Estudiantes</title>

  
  <style type="text/css">
<!--
.Estilo1 {
	color: #0000CC;
	font-weight: bold;
}
-->
  </style>
  </head><body>
<table style="text-align: left; width: 100%;" border="0" cellpadding="2" cellspacing="2">

  <tbody>
    <tr style="font-weight: bold;" align="center">
      <td colspan="1" rowspan="1" style="vertical-align: top;"><img src="membrete1.png" alt="q" width="1048" height="144"><br>
      </td>
    </tr>
    <tr style="font-weight: bold;" align="center">
      <td colspan="1" rowspan="1" style="vertical-align: top;"><big><big style="color: rgb(0, 0, 153);">Sistema de Inscripción </big></big><br>
      <big><big style="color: rgb(0, 0, 153);"><big style="color: rgb(0, 0, 153);"> </big><small><big>para el Registro y
Control
de Estudiantes</big></small></big></big><br></td>
    </tr>
    <tr>
      <td colspan="1" rowspan="1" style="vertical-align: top; text-align: center;"><span class="Estilo1"><big><big><small>Centro Escolar Canton San Sebastian Arriba </small></big></big></span></td>
    </tr>
  </tbody>
</table>

<div align="center"> </div>

<small> </small><small> </small>
<table style="width: 100%; height: 10px; text-align: left; margin-left: auto; margin-right: auto;" border="0" cellpadding="0" cellspacing="0">

  <tbody>
    <tr>
      <td colspan="3" height="20"><small> </small>
      <div align="center"><small style="color: rgb(0, 0, 153);">
      <h2>Incripciones registradas en el Sistema</h2>
      </small>
      <div style="text-align: left;"><br>
      </div>
      <div style="text-align: left;"><br>
      </div>
      </div>
      <small> </small></td>
    </tr>
    <tr style="color: rgb(0, 0, 153); font-weight: bold;">
      <td colspan="3" style="text-align: center; background-color: rgb(204, 204, 204);">CONSULTA DE INSCRIPCIONES REGISTRADAS</td>
    </tr>
    <tr>
      <td><?php include("conectar.php");
     $link = conectarse();
     $sql = "SELECT * FROM inscripcion";
     $resultado = mysql_query($sql, $link);
     if(!(mysql_fetch_array($resultado)))
        {
        echo "<div align='center'><font color='blue'><h2>No existen inscripciones realizadas</h2><br></font></div>";
        echo "<div align='center'><font color='blue'>
        <h4><a href=''menu.php' class='enlacenava'>Menú principal</a></h4>
        </font></div>";
        exit(); 
        }
    ?>
      <br>
      <table whidth=100% style="border: 1px solid rgb(0, 0, 255);" align="center" border="1" cellpadding="3" cellspacing="0">
        <tbody align="center" whidth=100%>
<?php echo"<tr>

<td align=\"center\"  bgcolor='blue' width='200' style='border:1px solid blue' >
<div align='center' class='Estilo2'>
<strong><font color='white' >NUMERO</font></strong></div></td>

<td align=\"center\"  bgcolor='blue' width='200' style='border:1px solid blue' >
<div align='center' class='Estilo2'>
<strong><font color='white' >CEDULA EST.</font></strong></div></td>
<td align=\"center\"  bgcolor='blue' width='200' style='border:1px solid blue' >
<div align='center' class='Estilo2'>
<strong><font color='white' >NOMBRE EST.</font></strong></div></td>
<td align=\"center\"  bgcolor='blue' width='200' style='border:1px solid blue' >
<div align='center' class='Estilo2'>
<strong><font color='white' >APELLIDO EST.</font></strong></div></td>

<td align=\"center\"  bgcolor='blue' width='200' style='border:1px solid blue' >
<div align='center' class='Estilo2'>
<strong><font color='white' >CEDULA REP.</font></strong></div></td>
<td align=\"center\"  bgcolor='blue' width='200' style='border:1px solid blue' >
<div align='center' class='Estilo2'>
<strong><font color='white' >NOMBRE REP.</font></strong></div></td>
<td align=\"center\"  bgcolor='blue' width='200' style='border:1px solid blue' >
<div align='center' class='Estilo2'>
<strong><font color='white' >APELLIDO REP.</font></strong></div></td>

<td align=\"center\"  bgcolor='blue' width='200' style='border:1px solid blue' ><div align='center' class='Estilo2'>
<strong><font color='white' >CEDULA DOC.</font></strong></div></td>
<td align=\"center\"  bgcolor='blue' width='200' style='border:1px solid blue' >
<div align='center' class='Estilo2'>
<strong><font color='white' >NOMBRE DOC.</font></strong></div></td>
<td align=\"center\"  bgcolor='blue' width='200' style='border:1px solid blue' >
<div align='center' class='Estilo2'>
<strong><font color='white' >APELLIDO DOC.</font></strong></div></td>


<td align=\"center\"  bgcolor='blue' width='100' style='border:1px solid blue' ><div align='center' class='Estilo2'><strong><font color='white' >GRADO</font></strong></div></td>

<td align=\"center\"  bgcolor='blue' width='100' style='border:1px solid blue' ><div align='center' class='Estilo2'><strong><font color='white' >SECCION</font></strong></div></td>

<td  bgcolor='blue' width='200' align=\"center\" style='border:1px solid blue' ><div align='center' class='Estilo2'><strong><font color='white' >OPCIÓN</font></strong></div></td>";


$sql = "SELECT inscripcion.nuemeroins as numeroins, inscripcion.cedulaalu as cedulaalu, inscripcion.cedularep as cedularep, inscripcion.ceduladoc as ceduladoc, inscripcion.seccion as seccion, inscripcion.grado as grado, alumno.nombrealu as nombrealu, apllidoalu as apellidoalu, repre.nombrerep as nombrerep, repre.apellidorep as apellidorep, docente.nombredoc as nombredoc, docente.apellidodoc as apellidodoc
FROM inscripcion
INNER JOIN alumno ON alumno.cedulaalu = inscripcion.cedulaalu
INNER JOIN repre ON repre.cedularep = inscripcion.cedularep
INNER JOIN docente ON docente.ceduladoc = inscripcion.ceduladoc
order by grado, seccion";
      $resultado = mysql_query($sql, $link);

      while($lleno = mysql_fetch_array($resultado))
           {
             {
              printf("<tr> 
<td align=\"center\" width='200' style='border:1px solid blue' ><div align='center' class='Estilo2'><strong>%s</strong></div></td>
<td align=\"center\" width='200' style='border:1px solid blue' ><div align='center' class='Estilo2'><strong>%s</strong></div></td>
<td align=\"center\" width='200' style='border:1px solid blue' ><div align='center' class='Estilo2'><strong>%s</strong></div></td>
<td align=\"center\" width='200' style='border:1px solid blue' ><div align='center' class='Estilo2'><strong>%s</strong></div></td>
<td align=\"center\" width='200' style='border:1px solid blue' ><div align='center' class='Estilo2'><strong>%s</strong></div></td>
<td align=\"center\" width='200' style='border:1px solid blue' ><div align='center' class='Estilo2'><strong>%s</strong></div></td>
<td align=\"center\" width='200' style='border:1px solid blue' ><div align='center' class='Estilo2'><strong>%s</strong></div></td>
<td align=\"center\" width='200' style='border:1px solid blue' ><div align='center' class='Estilo2'><strong>%s</strong></div></td>
<td align=\"center\" width='200' style='border:1px solid blue' ><div align='center' class='Estilo2'><strong>%s</strong></div></td>
<td align=\"center\" width='200' style='border:1px solid blue' ><div align='center' class='Estilo2'><strong>%s</strong></div></td>
<td align=\"center\" width='200' style='border:1px solid blue' ><div align='center' class='Estilo2'><strong>%s</strong></div></td>
<td align=\"center\" width='200' style='border:1px solid blue' ><div align='center' class='Estilo2'><strong>%s</strong></div></td>
<td align=\"center\" width='200' style='border:1px solid blue' ><div align='center' class='Estilo2'>
<font color='blue' ><strong> <a href = \"eliins.php?eliins=%s\" onclick=\"if(!confirm('¿Desea eliminar los datos de la inscripción?'))return false\">Eliminar</a></strong></font> </div>
</td>
 </td>",$lleno['numeroins'],$lleno["cedulaalu"],$lleno["nombrealu"],$lleno["apellidoalu"],$lleno["cedularep"],$lleno["nombrerep"],$lleno["apellidorep"],$lleno["ceduladoc"],$lleno["nombredoc"],$lleno["apellidodoc"],$lleno["grado"],$lleno["seccion"],$lleno["numeroins"]);
                }
             }
            $sql = "SELECT * FROM parametros WHERE id='1'";
            $resultado = mysql_query($sql, $link);
            $lleno = mysql_fetch_array($resultado);
            $menu= $lleno['menu'];
            echo "
        </tbody>
      </table>
      </td>
    </tr>
    <tr>
      <td colspan='3'>
      <div align='center'> <font color='blue'> </font>

      <h3><font color='blue'><br>
            <a href='$menu' class='enlacenava'>Menú principal</a> </font>
</h3>

      </td>
    </tr>
  </tbody>
";
             mysql_free_result($resultado);
     ?>
</table>

</body></html>
