<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<?php include("verificar.php") ?>
<html><head><title>Sistema de Inscripci�n para el Registro y Control de Estudiantes</title></head><body>
<table style="text-align: left; width: 100%;" border="0" cellpadding="2" cellspacing="2">

  <tbody>
    <tr style="font-weight: bold;" align="center">
      <td colspan="1" rowspan="1" style="vertical-align: top;"><img src="membrete1.png" alt="Q" width="1077" height="151"><br>
      </td>
    </tr>
    <tr style="font-weight: bold;" align="center">
      <td colspan="1" rowspan="1" style="vertical-align: top;"><big><big style="color: rgb(0, 0, 153);">Sistema de Inscripci�n </big></big><br>
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
      <h4 style="background-color: rgb(204, 204, 204);"><b>ELIMINAR REGISTRO DE REPRESENTANTE</b></h4>
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
  $cedrep = $_GET["elirep"];
  $buscar = mysql_query("select * from inscripcion where cedulamad = '$cedrep' or cedulapad = '$cedrep' or cedularep = '$cedrep'");
 if(mysql_fetch_array($buscar))
  {
     echo "<div align=\"center\"><br><h3><font color='blue'> Error: El representante tiene asignada inscripciones, integridad referencial de los datos</font></h3></div>";
     echo "<div align=\"center\"><br><h3><font color='blue'>El registro del representante no se puede eliminar ya que tiene asignada inscripciones</font></h3></div>";
     echo "<div align=\"center\"><br><h3><font color='blue'>Para poder eliminarlo, debe eliminar las inscripciones de dicho representante</font></h3></div>";
     echo "<div align=\"center\"><h3><font color=\"black\">Cedula: </font><font color=\"blue\">$cedrep</font></h3></div>";
    echo "<div align=\"center\"><h3><a href=\"javascript:window.history.go(-1)\" class=\"enlacenava\">Regresar</a></h3></div>";
     exit(); // Salir del programa...!
  }

  mysql_query("DELETE FROM repre WHERE cedularep='$cedrep'", $link);

echo "<div align='center'><font color='blue'><h3>El reigistro $cedrep fue eliminado con exito!!</h3></font></div>";
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
            <a href='$menu' class='enlacenava'>Men� principal</a> </font>
</h3>

      </td>
    </tr>
  </tbody>
";
?>
    </td></tr></tbody>
    </table>
 </body></html>
