<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<?php include("verificar.php") ?>
<html><head><title>Sistema de Inscripción para el Registro y Control de Estudiantes</title></head><body>
<table style="text-align: left; width: 100%;" border="0" cellpadding="2" cellspacing="2">

  <tbody>
    <tr style="font-weight: bold;" align="center">
      <td colspan="1" rowspan="1" style="vertical-align: top;"><img src="membrete1.png" alt="Q" width="981" height="125"><br>
      </td>
    </tr>
    <tr style="font-weight: bold;" align="center">
      <td colspan="1" rowspan="1" style="vertical-align: top;"><big><big style="color: rgb(0, 0, 153);">Sistema de Inscripción </big></big><br>
      <big><big style="color: rgb(0, 0, 153);"><big style="color: rgb(0, 0, 153);"> </big><small><big>para el Registro y
Control
de Estudiantes</big></small></big></big><br>
      <big style="color: blue;"><big style="color: rgb(0, 0, 153);"><small></small></big></big></td>
    </tr>
    <tr>
      <td colspan="1" rowspan="1" style="vertical-align: top; text-align: center;"><big style="color: rgb(0, 0, 153);"><small>Centro Escolar Canton San Sebastian Arriba </small></big></td>
    </tr>
  </tbody>
</table>

<div align="center">
    </div><table style="width: 1057px; height: 108px;" align="center" border="0" cellpadding="0" cellspacing="0">
<tbody><tr style="color: rgb(0, 0, 153);">
  <td colspan="1" align="center">
      <h4 style="background-color: rgb(204, 204, 204);"><b>ELIMINAR INSCRIPCIÓN</b></h4>
</td>
 </tr> 
 <tr>
  <td colspan="3" height="20">
   <div align="center"><font color="red"><br>
      </font></div>
  </td>
 </tr>  
 <tr> 
   <td colspan="3" align="center" bgcolor="blue">
      <font color="White">
      
     </font>
   
  <br>
</td>
 </tr> 
 <tr>
  <td>

 <?php include("conectar.php");
  $link = conectarse();
  $numins = $_GET["eliins"];

  mysql_query("DELETE FROM inscripcion WHERE nuemeroins='$numins'", $link);
  echo "<div align='center'><font color='blue'><h3>El la inscripcion N°: $numins fué eliminada con exito!!</h3></font></div>";
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
";?>

    </table>
       
 


</body></html>
