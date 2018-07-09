<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head><?php include("verificar.php") ?><title>Sistema de Inscripción para el Registro y Control de Estudiantes</title></head><body>
<table style="text-align: left; width: 866px; height: 236px;" align="center" border="0" cellpadding="2" cellspacing="2">

<?php include("conectar.php");
   $link = conectarse();
$grado = 4;
$seccion = 'A';
$fecha= date("d/m/y"); 
   
   $sql = "SELECT * FROM parametros";
   $resultado = mysql_query($sql, $link);
   $lleno = mysql_fetch_array($resultado);


   $anoesc = $lleno['anoescolar'];

   $sql = "SELECT *
FROM inscripcion
INNER JOIN alumno ON alumno.cedulaalu = inscripcion.cedulaalu
WHERE grado =$grado
AND seccion = '$seccion'
AND anoescolar = '$anoesc'";

   $resultado = mysql_query($sql, $link);
   $lleno = mysql_fetch_array($resultado);
   $cedalu = $lleno['cedulaalu'];


     if ($cedalu=="") 
        {
        echo "<div align='center'><font color='blue'><h2>No existen alumnos en el grado $grado y sección $seccion</h2><br></font></div>";
        echo "<div align='center'><font color='blue'>
        <h4><a href='impinsfil.php'>Regresar</a></h4>
        </font></div>";
echo "$grado";
echo "$seccion";
echo "$anoesc";
         exit();
        }else {
      
     
 
     



  
}
  ?>
 <tbody
    <tr style="font-weight: bold;" align="center">
      <td colspan="1" rowspan="1" style="vertical-align: top;"><img src="membrete1.png" alt="q" width="984" height="150"><br>
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
      <td colspan="1" rowspan="1" style="vertical-align: top; text-align: center;"><big><small>República de el Salvador
<br>
      </small></big><big><small>Ministerio de educacion de el Salvador </small></big><br>
<span style="color: #333333"><big style="color: rgb(0, 0, 153);"><small>Centro Escolar Canton San Sebastian Arriba - San Tiango Nonualco </small></big></span></td>
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
        <h2>LISTADO DE ALUMNOS POR SECCION Y GRADO</h2><?php echo"<p>Generado $fecha"?>
        </small>
        <table style="text-align: left; width: 603px; height: 66px;" border="0" cellpadding="2" cellspacing="2">
          <tbody>


            <tr>


            

<tr><td style="vertical-align: top; text-align: left;"><span style="font-weight: bold; font-style: italic; color: black;">Grado: </span><input style="border: 0px solid rgb(0, 0, 0);" name="grains" id="fecins" title="FECHA DE INCRIPCION" size="1" maxlength="1" readonly="readonly" value="<?php echo $grado;?>"></td>

<td style="vertical-align: top; font-style: italic; font-weight: bold; color: rgb(0, 0, 0); text-align: right;"><span style="color: black;">Año escolar:</span><br></td>
<td style="vertical-align: top;"><input maxlength="11" size="11" style="border: 0px solid rgb(0, 0, 0);" name="secins" id="secins" title="SECCION" value="<?php echo $anoesc;?>" readonly="readonly"></td>
<td style="vertical-align: top; font-style: italic; font-weight: bold; color: rgb(0, 0, 0); text-align: right;"><span style="color: black;">Sección:</span><br></td>
<td style="vertical-align: top;"><input maxlength="1" size="1" style="border: 0px solid rgb(0, 0, 0);" name="secins" id="secins" title="SECCION" value="<?php echo $seccion;?>" readonly="readonly"></td>

            </tr>


          </tbody>

        </table>

        <small style="color: rgb(0, 0, 0);"><br>

        </small> </div>

        </td>
      </tr>


      <tr><td>
        <div style="text-align: center;"><small>

        </small><small>
          </small><small>

            </small><small>


              </small><small>



            </small><small>
          </small><small>

        </small></div>
<table style="border: 1px solid rgb(0, 0, 0); width: 953px; height: 72px; text-align: left; margin-left: auto; margin-right: auto; font-style: italic; color: black;" border="1" cellpadding="3" cellspacing="0"><tbody align="center"><tr><td colspan="5" style="border: 1px solid black; width: 200px; background-color: rgb(253, 253, 253); vertical-align: middle; text-align: left;">
              <div style="text-align: center;"><span style="font-weight: bold;">Datos del Alumno</span><small>
              </small></div>
<div col="5" class="Estilo2" align="left"><small>


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
<font color='black' >NACIMIENTO</font></div></td>
<td align=\"center\"  bgcolor='#D1D1D1' width='200' style='border:1px solid black' >
<div align='center' class='Estilo2'>
<font color='black' >SEXO</font></div></td>";

     $sql = "SELECT *
FROM inscripcion
INNER JOIN alumno ON alumno.cedulaalu = inscripcion.cedulaalu
WHERE grado =$grado
AND seccion = '$seccion'
AND anoescolar = '$anoesc'";
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
 </td>",$lleno['cedulaalu'],$lleno["apllidoalu"],$lleno["nombrealu"],$lleno["fechanacalu"],$lleno["sexoalu"]);



                }
             }
             mysql_free_result($resultado);
 $sql = "SELECT * FROM parametros WHERE id='1'";
    $resultado = mysql_query($sql, $link);
    $lleno = mysql_fetch_array($resultado);
    $menu= $lleno['menu'];
    echo "
        </small></div><br>
</td></tr>
    </tbody>


  </table><small></small><br>
        <br>
<small></small>



  <br>

  <br>
     <br>
</td></tr>
    </tbody>



  </table>

<font color='blue'> </font> <div style='text-align: center;'><font color='blue'><span style='color: black; font-weight: normal;'></span
><a href='$menu' class='enlacenava'><input name='Submit2' value='Menú principal' type='button'></a></font><input value='Imprimir' class='botones' onclick='window.print()' type='button'>";

 
     ?>
           




  </font><div align="center">


<font color="blue">  </font><h3><font color="blue"><small> </small></font></h3>
<font color="blue">  </font></div>

<font color="blue">  



  



</font></div></fieldset></form>



</body>

</html>
