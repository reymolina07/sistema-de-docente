
<?php include("verificar.php") ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head>


  <title>Sistema de Inscripci�n para el Registro y Control de
Estudiantes</title>

  
</head><body>
<table style="text-align: left; width: 100%;" border="0" cellpadding="2" cellspacing="2">

  <tbody>
    <tr style="font-weight: bold;" align="center">
      <td colspan="1" rowspan="1" style="vertical-align: top;"><img src="membrete1.png" alt="q" width="958" height="136"><br>
      </td>
    </tr>
    <tr style="font-weight: bold;" align="center">
      <td colspan="1" rowspan="1" style="vertical-align: top;"><big><big style="color: rgb(0, 0, 153);">Sistema de Inscripci�n </big></big><br>
      <big><big style="color: rgb(0, 0, 153);"><big style="color: rgb(0, 0, 153);"> </big><small><big>para el Registro y
Control
de Estudiantes</big></small></big></big><br></td>
    </tr>
    <tr>
      <td colspan="1" rowspan="1" style="vertical-align: top; text-align: center;"><span style="font-size: 18px"><big style="color: rgb(0, 0, 153);"><small>Centro Escolar Canton San Sebastian Arriba </small></big></span></td>
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
      <h2>Usuarios registrados en el Sistema</h2>
      </small>
      <div style="text-align: left;"><br>
      </div>
      <div style="text-align: left;"><br>
      </div>
      </div>
      <small> </small></td>
    </tr>
    <tr style="color: rgb(0, 0, 153); font-weight: bold;">
      <td colspan="3" style="text-align: center; background-color: rgb(204, 204, 204);">CONSULTA DE CUENTAS
DE USUARIO DEL SISTEMA </td>
    </tr>
    <tr>
      <td><?php include("conectar.php");
     $link = conectarse();
     $sql = "SELECT * FROM user";
     $resultado = mysql_query($sql, $link);
     if(!(mysql_fetch_array($resultado)))
        {
        echo "<div align='center'><font color='blue'><h2>No Hay Cuentas de Usuario</h2><br></font></div>";
        echo "<div align='center'><font color='blue'>
        <h4><a href=''menu.php' class='enlacenava'>Men{u principal</a></h4>
        </font></div>";
        exit(); 
        }
    ?>
      <br>
      <table style="border: 1px solid rgb(0, 0, 255);" align="center" border="1" cellpadding="3" cellspacing="0">
        <tbody align="center">
<?php echo"<tr>
<td align=\"center\"  bgcolor='blue' width='200' style='border:1px solid blue' >
<div align='center' class='Estilo2'>
<strong><font color='white' >NOMBRES</font></strong></div></td>
<td align=\"center\"  bgcolor='blue' width='200' style='border:1px solid blue' >
<div align='center' class='Estilo2'>
<strong><font color='white' >APELLIDOS</font></strong></div></td>
<td align=\"center\"  bgcolor='blue' width='200' style='border:1px solid blue' >
<div align='center' class='Estilo2'>
<strong><font color='white' >USUARIO</font></strong></div></td>
<td align=\"center\"  bgcolor='blue' width='200' style='border:1px solid blue' >
<div align='center' class='Estilo2'>
<strong><font color='white' >TIPO</font></strong></div></td>
<td  bgcolor='blue' width='200' align=\"center\" style='border:1px solid blue' ><div align='center' class='Estilo2'><strong><font color='white' >OPCIONES</font></strong></div></td>";
      $sql = "SELECT * FROM user";
      $resultado = mysql_query($sql, $link);

      while($lleno = mysql_fetch_array($resultado))
           {
             {
              printf("<tr> 
<td align=\"center\" width='200' style='border:1px solid blue' ><div align='center' class='Estilo2'><strong>%s</strong></div></td>
<td align=\"center\" width='200' style='border:1px solid blue' ><div align='center' class='Estilo2'><strong>%s</strong></div></td>
<td align=\"center\" width='200' style='border:1px solid blue' ><div align='center' class='Estilo2'><strong>%s</strong></div></td>
<td align=\"center\" width='200' style='border:1px solid blue' ><div align='center' class='Estilo2'><strong>%s</strong></div></td>
<td align=\"center\" width='200' style='border:1px solid blue' > <div align='center' class='Estilo2'><font color='blue' ><strong>
<a href = \"modusu.php?modusu=%s\" onclick=\"if(!confirm('�Desea modificar el usuario?'))return false\">Modificar</a>
<a href = \"eliusu.php?eliusuar=%s\" onclick=\"if(!confirm('�Desea eliminar el usuario?'))return false\">Eliminar</strong></font></div></a>
</td>



 </td>", $lleno["nombre"],$lleno["apellido"],$lleno["usuario"],$lleno["tipo"], $lleno["usuario"],$lleno["usuario"]);
                }
             }
             mysql_free_result($resultado);
     ?>
        </tbody>
      </table>
      </td>
    </tr>
    <tr>
      <td colspan="3">
      <div align="center"> <font color="blue"> </font>
      <h3><font color="blue"><br>
      <a href="menu.php" class="enlacenava">Men� principal</a> </font>
      </h3>
      </div>
      </td>
    </tr>
  </tbody>
</table>

</body></html>
