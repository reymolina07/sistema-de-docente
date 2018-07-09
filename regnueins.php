<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head><?php include("verificar.php") ?><title>Sistema de Inscripción para el Registro y Control de Estudiantes</title></head><body>
<table style="text-align: left; width: 100%;" border="0" cellpadding="2" cellspacing="2">

  <tbody>
    <tr style="font-weight: bold;" align="center">
      <td colspan="1" rowspan="1" style="vertical-align: top;"><img src="membrete1.png" alt="q" width="919" height="118"><br>
      </td>
    </tr>
    <tr style="font-weight: bold;" align="center">
      <td colspan="1" rowspan="1" style="vertical-align: top;"><big><big style="color: rgb(0, 0, 153);">Sistema de Inscripción </big></big><br>
      <big><big style="color: rgb(0, 0, 153);"><big style="color: rgb(0, 0, 153);"> </big><small><big>para el Registro y
Control
de Estudiantes</big></small></big></big><br></td>
    </tr>
    <tr>
      <td colspan="1" rowspan="1" style="vertical-align: top; text-align: center;"><big style="color: rgb(0, 0, 153);"><small>Centro Escolar Canton San Sebastian Arriba - San Tiango Nonualco </small></big></td>
    </tr>
  </tbody>
</table>
<form action="regnueinsc.php" name="form1" method="post">
  <center>
  <fieldset style="border: 2px solid rgb(0, 0, 255); width: 768px;"><legend style="color: rgb(0, 0, 153); font-weight: bold; font-style: italic;" class="Estilo2"></legend>
<div align="center"> </div>

<small> </small><small> </small>
<table style="width: 100%; height: 10px; text-align: left; margin-left: auto; margin-right: auto;" border="0" cellpadding="0" cellspacing="0">

  <tbody>
    <tr>
      <td colspan="3" height="20"><small> </small>
      <div align="center"><small style="color: rgb(0, 0, 153);">
      <h2>NUEVA INSCRIPCIÓN</h2>
      </small>
      </div></td>
    </tr>
    <tr>
      <td>
    <?php include("conectar.php");
     $link = conectarse();

     $cedalu=$_POST['cedalu'];
     $cedmad=$_POST['cedmad'];
     $cedpad=$_POST['cedpad'];
     $cedrep=$_POST['cedrep'];
     $ceddoc=$_POST['ceddoc'];

     $sql = "SELECT * FROM alumno where cedulaalu='$cedalu'";
     $resultado = mysql_query($sql, $link);
     $nomalu= $lleno['nombrealu'];
     $apealu= $lleno['apllidoalu'];
     $fecnacalu= $lleno['fechanacalu'];
     $lugnacalu= $lleno['lugnacalu']; 
     $sexalu= $lleno['sexoalu'];
     if(!(mysql_fetch_array($resultado)))
        {
        echo "<div align='center'><font color='blue'><h2>Debe introducir la cedula del estudiante que esté registrado</h2><br></font></div>";
        echo "<div align='center'><font color='blue'>
        <h4><a href='regins.php'>Regresar</a></h4>
        </font></div>";
        exit();
        }

     $sql = "SELECT * FROM repre where cedularep='$cedmad'";
     $resultado = mysql_query($sql, $link);
     $nommad= $lleno['nombrerep'];
     $apemad= $lleno['apellidorep'];
     $telmad= $lleno['telefonorep'];
     $celmad= $lleno['celularrep']; 
     $promad= $lleno['profesionrep'];
     if(!(mysql_fetch_array($resultado)))
        {
        echo "<div align='center'><font color='blue'><h2>Debe introducir la cedula de la madre que esté registrado</h2><br></font></div>";
        echo "<div align='center'><font color='blue'>
        <h4><a href='regins.php'>Regresar</a></h4>
        </font></div>";
        exit();
        }    

     $sql = "SELECT * FROM repre where cedularep='$cedpad'";
     $resultado = mysql_query($sql, $link);
     $nompad= $lleno['nombrerep'];
     $apepad= $lleno['apellidorep'];
     $telpad= $lleno['telefonorep'];
     $celpad= $lleno['celularrep']; 
     $propad= $lleno['profesionrep'];
     if(!(mysql_fetch_array($resultado)))
        {
        echo "<div align='center'><font color='blue'><h2>Debe introducir la cedula del padre que esté registrado</h2><br></font></div>";
        echo "<div align='center'><font color='blue'>
        <h4><a href='regins.php'>Regresar</a></h4>
        </font></div>";
        exit();
        }    

     $sql = "SELECT * FROM repre where cedularep='$cedrep'";
     $resultado = mysql_query($sql, $link);
     $nommrep= $lleno['nombrerep'];
     $aperep= $lleno['apellidorep'];
     $telrep= $lleno['telefonorep'];
     $celrep= $lleno['celularrep']; 
     $prorep= $lleno['profesionrep'];
     if(!(mysql_fetch_array($resultado)))
        {
        echo "<div align='center'><font color='blue'><h2>Debe introducir la cedula del representante que esté registrado</h2><br></font></div>";
        echo "<div align='center'><font color='blue'>
        <h4><a href='regins.php'>Regresar</a></h4>
        </font></div>";
        exit();
        }    

     $sql = "SELECT * FROM docente where ceduladoc='$ceddoc'";
     $resultado = mysql_query($sql, $link);
     $nomdoc= $lleno['nombredoc'];
     $apedoc= $lleno['apellidodoc'];
     $teldoc= $lleno['telefonodoc'];
     $celdoc= $lleno['celulardoc']; 
     $prodoc= $lleno['profesiondoc'];
     if(!(mysql_fetch_array($resultado)))
        {
        echo "<div align='center'><font color='blue'><h2>Debe introducir la cedula del docente que esté registrado</h2><br></font></div>";
        echo "<div align='center'><font color='blue'>
        <h4><a href='regins.php'>Regresar</a></h4>
        </font></div>";
        exit();
        }    
  ?>
      
      <table style="border: 1px solid rgb(0, 0, 255); width: 1069px; height: 32px; text-align: left; margin-left: auto; margin-right: auto; font-style: italic;" border="1" cellpadding="3" cellspacing="0">
       <tbody align="center">
      <tr><td colspan="2" style="border: 1px solid blue; width: 200px; text-align: left; background-color: gray; vertical-align: middle;">
       <div style="background-color: rgb(146, 147, 150);" col="5" class="Estilo2" align="center">
     <strong><font color="white">DATOS DEL ESTUDIANTE</font></strong></div></td>

<?php echo"<tr>
<td align=\"center\"  bgcolor='#D1D1D1' width='200' style='border:1px solid blue' >
<div align='center' class='Estilo2'>
<font color='black' >CEDULA</font></div></td>
<td align=\"center\"  bgcolor='#D1D1D1' width='200' style='border:1px solid blue' >
<div align='center' class='Estilo2'>
<font color='black' >NOMBRES</font></div></td>
<td align=\"center\"  bgcolor='#D1D1D1' width='200' style='border:1px solid blue' >
<div align='center' class='Estilo2'>
<font color='black' >APELLIDOS</font></div></td>
<td align=\"center\"  bgcolor='#D1D1D1' width='200' style='border:1px solid blue' >
<div align='center' class='Estilo2'>
<font color='black' >NACIMIENTO</font></div></td>
<td align=\"center\"  bgcolor='#D1D1D1' width='200' style='border:1px solid blue' >
<div align='center' class='Estilo2'>
<font color='black' >SEXO</font></div></td>";

     $sql = "SELECT * FROM alumno where cedulaalu='$cedalu'";
     $resultado = mysql_query($sql, $link);

      while($lleno = mysql_fetch_array($resultado))
           {
             {
              printf("<tr> 
<td align=\"center\" width='200' style='border:1px solid blue' ><div align='center' class='Estilo2'>%s</div></td>
<td align=\"center\" width='200' style='border:1px solid blue' ><div align='center' class='Estilo2'>%s</div></td>
<td align=\"center\" width='200' style='border:1px solid blue' ><div align='center' class='Estilo2'>%s</div></td>
<td align=\"center\" width='200' style='border:1px solid blue' ><div align='center' class='Estilo2'>%s</div></td>
<td align=\"center\" width='200' style='border:1px solid blue' ><div align='center' class='Estilo2'>%s</div></td>
 </td>",$lleno['cedulaalu'],$lleno["nombrealu"],$lleno["apllidoalu"],$lleno["fechanacalu"],$lleno["sexoalu"]);



                }
             }
             mysql_free_result($resultado);

 
     ?>
        </tr></tbody>
      </table>
      </td>
    </tr>



</tbody></table><table style="border: 1px solid rgb(0, 0, 255); width: 1069px; height: 32px; text-align: left; margin-left: auto; margin-right: auto; font-style: italic;" border="1" cellpadding="3" cellspacing="0">
       <tbody align="center">
      <tr><td colspan="2" style="border: 1px solid blue; width: 200px; text-align: left; background-color: gray; vertical-align: middle;">
       <div style="background-color: rgb(146, 147, 150);" col="5" class="Estilo2" align="center">
     <strong><font color="white">DATOS DE LA MADRE</font></strong></div></td>

<?php echo"<tr>
<td align=\"center\"  bgcolor='#D1D1D1' width='200' style='border:1px solid blue' >
<div align='center' class='Estilo2'>
<font color='black' >CEDULA</font></div></td>
<td align=\"center\"  bgcolor='#D1D1D1' width='200' style='border:1px solid blue' >
<div align='center' class='Estilo2'>
<font color='black' >NOMBRES</font></div></td>
<td align=\"center\"  bgcolor='#D1D1D1' width='200' style='border:1px solid blue' >
<div align='center' class='Estilo2'>
<font color='black' >APELLIDOS</font></div></td>
<td align=\"center\"  bgcolor='#D1D1D1' width='200' style='border:1px solid blue' >
<div align='center' class='Estilo2'>
<font color='black' >TELEFONO</font></div></td>
<td align=\"center\"  bgcolor='#D1D1D1' width='200' style='border:1px solid blue' >
<div align='center' class='Estilo2'>
<font color='black' >CELULAR</font></div></td>
<td align=\"center\"  bgcolor='#D1D1D1' width='200' style='border:1px solid blue' >
<div align='center' class='Estilo2'>
<font color='black' >PROFESIÓN</font></div></td>";
     $sql = "SELECT * FROM repre where cedularep='$cedmad'";
     $resultado = mysql_query($sql, $link);

      while($lleno = mysql_fetch_array($resultado))
           {
             {
              printf("<tr> 
<td align=\"center\" width='200' style='border:1px solid blue' ><div align='center' class='Estilo2'>%s</div></td>
<td align=\"center\" width='200' style='border:1px solid blue' ><div align='center' class='Estilo2'>%s</div></td>
<td align=\"center\" width='200' style='border:1px solid blue' ><div align='center' class='Estilo2'>%s</div></td>
<td align=\"center\" width='200' style='border:1px solid blue' ><div align='center' class='Estilo2'>%s</div></td>
<td align=\"center\" width='200' style='border:1px solid blue' ><div align='center' class='Estilo2'>%s</div></td>
<td align=\"center\" width='200' style='border:1px solid blue' ><div align='center' class='Estilo2'>%s</div></td>
 </td>",$lleno['cedularep'],$lleno["nombrerep"],$lleno["apellidorep"],$lleno["telefonorep"],$lleno["celularrep"],$lleno["profesionrep"]);



                }
             }
             mysql_free_result($resultado);

 
     ?>
        </tr></tbody>
      </table>
      
    



<table style="border: 1px solid rgb(0, 0, 255); width: 1069px; height: 32px; text-align: left; margin-left: auto; margin-right: auto; font-style: italic;" border="1" cellpadding="3" cellspacing="0">
       <tbody align="center">
      <tr><td colspan="2" style="border: 1px solid blue; width: 200px; text-align: left; background-color: gray; vertical-align: middle;">
       <div style="background-color: rgb(146, 147, 150);" col="5" class="Estilo2" align="center">
     <strong><font color="white">DATOS DEL PADRE</font></strong></div></td>

<?php echo"<tr>
<td align=\"center\"  bgcolor='#D1D1D1' width='200' style='border:1px solid blue' >
<div align='center' class='Estilo2'>
<font color='black' >CEDULA</font></div></td>
<td align=\"center\"  bgcolor='#D1D1D1' width='200' style='border:1px solid blue' >
<div align='center' class='Estilo2'>
<font color='black' >NOMBRES</font></div></td>
<td align=\"center\"  bgcolor='#D1D1D1' width='200' style='border:1px solid blue' >
<div align='center' class='Estilo2'>
<font color='black' >APELLIDOS</font></div></td>
<td align=\"center\"  bgcolor='#D1D1D1' width='200' style='border:1px solid blue' >
<div align='center' class='Estilo2'>
<font color='black' >TELEFONO</font></div></td>
<td align=\"center\"  bgcolor='#D1D1D1' width='200' style='border:1px solid blue' >
<div align='center' class='Estilo2'>
<font color='black' >CELULAR</font></div></td>
<td align=\"center\"  bgcolor='#D1D1D1' width='200' style='border:1px solid blue' >
<div align='center' class='Estilo2'>
<font color='black' >PROFESIÓN</font></div></td>";
     $sql = "SELECT * FROM repre where cedularep='$cedpad'";
     $resultado = mysql_query($sql, $link);

      while($lleno = mysql_fetch_array($resultado))
           {
             {
              printf("<tr> 
<td align=\"center\" width='200' style='border:1px solid blue' ><div align='center' class='Estilo2'>%s</div></td>
<td align=\"center\" width='200' style='border:1px solid blue' ><div align='center' class='Estilo2'>%s</div></td>
<td align=\"center\" width='200' style='border:1px solid blue' ><div align='center' class='Estilo2'>%s</div></td>
<td align=\"center\" width='200' style='border:1px solid blue' ><div align='center' class='Estilo2'>%s</div></td>
<td align=\"center\" width='200' style='border:1px solid blue' ><div align='center' class='Estilo2'>%s</div></td>
<td align=\"center\" width='200' style='border:1px solid blue' ><div align='center' class='Estilo2'>%s</div></td>
 </td>",$lleno['cedularep'],$lleno["nombrerep"],$lleno["apellidorep"],$lleno["telefonorep"],$lleno["celularrep"],$lleno["profesionrep"]);



                }
             }
             mysql_free_result($resultado);

 
     ?>
        </tr></tbody>
      </table>
      
    



<table style="border: 1px solid rgb(0, 0, 255); width: 1069px; height: 32px; text-align: left; margin-left: auto; margin-right: auto; font-style: italic;" border="1" cellpadding="3" cellspacing="0">
       <tbody align="center">
      <tr><td colspan="2" style="border: 1px solid blue; width: 200px; text-align: left; background-color: gray; vertical-align: middle;">
       <div style="background-color: rgb(146, 147, 150);" col="5" class="Estilo2" align="center">
     <strong><font color="white">DATOS DEL REPRESENTANTE</font></strong></div></td>

<?php echo"<tr>
<td align=\"center\"  bgcolor='#D1D1D1' width='200' style='border:1px solid blue' >
<div align='center' class='Estilo2'>
<font color='black' >CEDULA</font></div></td>
<td align=\"center\"  bgcolor='#D1D1D1' width='200' style='border:1px solid blue' >
<div align='center' class='Estilo2'>
<font color='black' >NOMBRES</font></div></td>
<td align=\"center\"  bgcolor='#D1D1D1' width='200' style='border:1px solid blue' >
<div align='center' class='Estilo2'>
<font color='black' >APELLIDOS</font></div></td>
<td align=\"center\"  bgcolor='#D1D1D1' width='200' style='border:1px solid blue' >
<div align='center' class='Estilo2'>
<font color='black' >TELEFONO</font></div></td>
<td align=\"center\"  bgcolor='#D1D1D1' width='200' style='border:1px solid blue' >
<div align='center' class='Estilo2'>
<font color='black' >CELULAR</font></div></td>
<td align=\"center\"  bgcolor='#D1D1D1' width='200' style='border:1px solid blue' >
<div align='center' class='Estilo2'><font color='black' >PROFESIÓN</font></div></td>";
     $sql = "SELECT * FROM repre where cedularep='$cedrep'";
     $resultado = mysql_query($sql, $link);

      while($lleno = mysql_fetch_array($resultado))
           {
             {
              printf("<tr> 
<td align=\"center\" width='200' style='border:1px solid blue' ><div align='center' class='Estilo2'>%s</div></td>
<td align=\"center\" width='200' style='border:1px solid blue' ><div align='center' class='Estilo2'>%s</div></td>
<td align=\"center\" width='200' style='border:1px solid blue' ><div align='center' class='Estilo2'>%s</div></td>
<td align=\"center\" width='200' style='border:1px solid blue' ><div align='center' class='Estilo2'>%s</div></td>
<td align=\"center\" width='200' style='border:1px solid blue' ><div align='center' class='Estilo2'>%s</div></td>
<td align=\"center\" width='200' style='border:1px solid blue' ><div align='center' class='Estilo2'>%s</div></td>
 </td>",$lleno['cedularep'],$lleno["nombrerep"],$lleno["apellidorep"],$lleno["telefonorep"],$lleno["celularrep"],$lleno["profesionrep"]);



                }
             }
             mysql_free_result($resultado);

 
     ?>
        </tr></tbody>
      </table>
      
    


<table style="border: 1px solid rgb(0, 0, 255); width: 1069px; height: 32px; text-align: left; margin-left: auto; margin-right: auto; font-style: italic;" border="1" cellpadding="3" cellspacing="0">
       <tbody align="center">
      <tr><td colspan="2" style="border: 1px solid blue; width: 200px; text-align: left; background-color: gray; vertical-align: middle;">
       <div style="background-color: rgb(146, 147, 150);" col="5" class="Estilo2" align="center">
     <strong><font color="white">DATOS DEL DOCENTE</font></strong></div></td>

<?php echo"<tr>
<td align=\"center\"  bgcolor='#D1D1D1' width='200' style='border:1px solid blue' >
<div align='center' class='Estilo2'>
<font color='black' >CEDULA</font></div></td>
<td align=\"center\"  bgcolor='#D1D1D1' width='200' style='border:1px solid blue' >
<div align='center' class='Estilo2'>
<font color='black' >NOMBRES</font></div></td>
<td align=\"center\"  bgcolor='#D1D1D1' width='200' style='border:1px solid blue' >
<div align='center' class='Estilo2'>
<font color='black' >APELLIDOS</font></div></td>
<td align=\"center\"  bgcolor='#D1D1D1' width='200' style='border:1px solid blue' >
<div align='center' class='Estilo2'>
<font color='black' >TELEFONO</font></div></td>
<td align=\"center\"  bgcolor='#D1D1D1' width='200' style='border:1px solid blue' >
<div align='center' class='Estilo2'>
<font color='black' >CELULAR</font></div></td>
<td align=\"center\"  bgcolor='#D1D1D1' width='200' style='border:1px solid blue' >
<div align='center' class='Estilo2'><font color='black' >PROFESIÓN</font></div></td>";
     $sql = "SELECT * FROM docente where ceduladoc='$ceddoc'";
     $resultado = mysql_query($sql, $link);

      while($lleno = mysql_fetch_array($resultado))
           {
             {
              printf("<tr> 
<td align=\"center\" width='200' style='border:1px solid blue' ><div align='center' class='Estilo2'>%s</div></td>
<td align=\"center\" width='200' style='border:1px solid blue' ><div align='center' class='Estilo2'>%s</div></td>
<td align=\"center\" width='200' style='border:1px solid blue' ><div align='center' class='Estilo2'>%s</div></td>
<td align=\"center\" width='200' style='border:1px solid blue' ><div align='center' class='Estilo2'>%s</div></td>
<td align=\"center\" width='200' style='border:1px solid blue' ><div align='center' class='Estilo2'>%s</div></td>
<td align=\"center\" width='200' style='border:1px solid blue' ><div align='center' class='Estilo2'>%s</div></td>
 </td>",$lleno['ceduladoc'],$lleno["nombredoc"],$lleno["apellidodoc"],$lleno["telefonodoc"],$lleno["celulardoc"],$lleno["profesiondoc"]);



                }
             }
             mysql_free_result($resultado);

 
     ?>
        </tr></tbody>
      </table><br>
  <table style="text-align: left; width: 789px; height: 125px;" border="0" cellpadding="2" cellspacing="2">
    <tbody>
      <tr>
        <td style="vertical-align: top; text-align: center;"><span style="font-style: italic; font-weight: bold; color: rgb(51, 51, 255);">FECHA</span><br>
        </td>
        <td style="vertical-align: top; text-align: center;"><span style="font-style: italic; font-weight: bold; color: rgb(51, 51, 255);">* GRADO</span><br>
        </td>
        <td style="vertical-align: top; text-align: center;"><span style="color: rgb(51, 51, 255); font-style: italic; font-weight: bold;">* SECCIÓN</span><br>
        </td><td style="vertical-align: top; color: white;"><br>
        </td>
        <td style="vertical-align: top; color: white;"><br>
        </td>
<input style="border: 1px solid rgb(0, 0, 255);" name="cedalu" id="cedalu" title="cedalu" size="10" maxlength="10" value="<?php echo $cedalu; ?>" readonly="readonly" type="hidden">
<input style="border: 1px solid rgb(0, 0, 255);" name="cedpad" id="cedpad" title="cedalu" size="10" maxlength="10" value="<?php echo $cedpad; ?>" readonly="readonly" type="hidden">
<input style="border: 1px solid rgb(0, 0, 255);" name="cedmad" id="cedmad" title="cedmad" size="10" maxlength="10" value="<?php echo $cedmad; ?>" readonly="readonly" type="hidden">
<input style="border: 1px solid rgb(0, 0, 255);" name="cedrep" id="cedalu" title="cedrep" size="10" maxlength="10" value="<?php echo $cedrep; ?>" readonly="readonly" type="hidden">
<input style="border: 1px solid rgb(0, 0, 255);" name="ceddoc" id="ceddoc" title="ceddoc" size="10" maxlength="10" value="<?php echo $ceddoc; ?>" readonly="readonly" type="hidden">
      </tr>
      <tr>
        <td style="vertical-align: top; text-align: center;"><input style="border: 1px solid rgb(0, 0, 255);" name="fecins" id="fecins" title="FECHA DE INCRIPCION" size="10" maxlength="10" value="<?php echo date('d/m/Y'); ?>" readonly="readonly"></td>
        <td style="vertical-align: top; text-align: center;">

        <select name="grains" id="grains" size="1">
 
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
        </select>

        </td>
        <td style="vertical-align: top; text-align: center;">
<select name="secins" id="secins" size="1">
 
<option value="A">A</option>
<option value="B">B</option>
<option value="C">C</option>
<option value="D">D</option>
<option value="E">E</option>
<option value="F">F</option>
<option value="G">G</option>
<option value="H">H</option>
        </select>       </td><td style="vertical-align: top;"><br>
        </td>
        <td style="vertical-align: top;"><br>
        </td>

      </tr>
      <tr>
        <td colspan="5" rowspan="1" style="vertical-align: top; white-space: nowrap; text-align: center;"><span style="font-style: italic; font-weight: bold; color: rgb(51, 51, 255);">* INTITUCIÓN DE ORIGEN</span><br>
        </td>
        
      </tr>
      <tr align="center">
        <td colspan="5" rowspan="1" style="vertical-align: top;"><input name="insori" id="insori" title="PLANTEL DE ORIGEN" size="100" maxlength="100" style="border: 1px solid rgb(0, 0, 255);"></td>
      </tr>
<tr>
        <td colspan="5" rowspan="1" style="vertical-align: middle; white-space: nowrap; text-align: center;"><span style="font-weight: bold; font-style: italic; color: rgb(51, 51, 255);">OBSERVACIÓN</span><br>
        </td>
        
      </tr><tr align="center">
        <td colspan="5" rowspan="1" style="vertical-align: top;"><input name="obsins" id="obsins" title="OBSERVACION" size="100" maxlength="100" style="border: 1px solid rgb(0, 0, 255);"></td>
      </tr>

    </tbody>
  </table>
 <br>

    
      
      <div align="center"> <font color="blue"> </font>
      <h3><small><font color="blue"><span style="color: black; font-weight: normal;">El * indica que los campos deben ser introducidos de forma obligatoria.</span><br>

<a href="regins.php" class="enlacenava"> <input name="Submit2" value="Regresar" type="button"> </a>  

<input name="Submit2" value="Limpiar" type="reset">
<input value="Procesar" class="botones" type="submit"> 



  </font>

      </small></h3>
      </div>

      
    
  

  </fieldset>
</center>
</form>



</body></html>
