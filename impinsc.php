<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head>
<?php include("verificar.php") ?><title>Sistema de Inscripción para el Registro y Control de Estudiantes</title></head><body>
<div align="center">
  <table align="center" style="text-align: left; width: 866px; height: 236px;" border="0" cellpadding="2" cellspacing="2">
    
    <?php $numins=$_POST['numins'];


  include("conectar.php");
   $link = conectarse();
   $sql = "SELECT * FROM inscripcion WHERE nuemeroins='$numins'";
   $resultado = mysql_query($sql, $link);
   $lleno = mysql_fetch_array($resultado);

   $cedalu= $lleno['cedulaalu'];
   $cedpad= $lleno['cedulapad'];
   $cedmad= $lleno['cedulamad'];
   $cedrep= $lleno['cedularep']; 
   $ceddoc= $lleno['ceduladoc'];
   $grains= $lleno['grado'];
   $secins= $lleno['seccion'];
   $fecins= $lleno['fechains'];
   $plaori= $lleno['plantelorigen'];
   $obsins= $lleno['observacion'];
   $anoesc= $lleno['anoescolar'];

     if ($cedalu=="") 
        {
        echo "<div align='center'><font color='blue'><h2>El numero de inscripcion $numins no está registrado</h2><br></font></div>";
        echo "<div align='center'><font color='blue'>
        <h4><a href='impins.php'>Regresar</a></h4>
        </font></div>";
	        exit();
        }else {
      
     
     $sql = "SELECT * FROM alumno where cedulaalu='$cedalu'";
     $resultado = mysql_query($sql, $link);

     $nomalu= $lleno['nombrealu'];
     $apealu= $lleno['apllidoalu'];
     $fecnacalu= $lleno['fechanacalu'];
     $lugnacalu= $lleno['lugnacalu']; 
     $sexalu= $lleno['sexoalu'];
     

     $sql = "SELECT * FROM repre where cedularep='$cedmad'";
     $resultado = mysql_query($sql, $link);
     $nommad= $lleno['nombrerep'];
     $apemad= $lleno['apellidorep'];
     $telmad= $lleno['telefonorep'];
     $celmad= $lleno['celularrep']; 
     $promad= $lleno['profesionrep'];


     $sql = "SELECT * FROM repre where cedularep='$cedpad'";
     $resultado = mysql_query($sql, $link);
     $nompad= $lleno['nombrerep'];
     $apepad= $lleno['apellidorep'];
     $telpad= $lleno['telefonorep'];
     $celpad= $lleno['celularrep']; 
     $propad= $lleno['profesionrep'];


     $sql = "SELECT * FROM repre where cedularep='$cedrep'";
     $resultado = mysql_query($sql, $link);
     $nommrep= $lleno['nombrerep'];
     $aperep= $lleno['apellidorep'];
     $telrep= $lleno['telefonorep'];
     $celrep= $lleno['celularrep']; 
     $prorep= $lleno['profesionrep'];


     $sql = "SELECT * FROM docente where ceduladoc='$ceddoc'";
     $resultado = mysql_query($sql, $link);
     $nomdoc= $lleno['nombredoc'];
     $apedoc= $lleno['apellidodoc'];
     $teldoc= $lleno['telefonodoc'];
     $celdoc= $lleno['celulardoc']; 
     $prodoc= $lleno['profesiondoc'];
}
  ?>
    <tbody
    <tr style="font-weight: bold;" align="center">
      <td colspan="1" rowspan="1" style="vertical-align: top;"><br>
      <img src="membrete1.png" alt="q" width="1000" height="147">    </td>
        </tr>
    <tr style="font-weight: bold;" align="center">
      <td colspan="1" rowspan="1" style="vertical-align: top;"><big><big style="color: rgb(0, 0, 0);">Sistema de Inscripción </big></big><br>
        <big><big style="color: rgb(0, 0, 0);"><big style="color: rgb(0, 0, 0);"> </big><small><big>para el Registro y
          Control
        de Estudiantes</big></small></big></big><br>      </td>
      </tr>
    <tr style="color: black;">
      <td colspan="1" rowspan="1" style="vertical-align: top; text-align: center;"><big><small>República de El Salvador
        <br>
        </small></big><big><small>Ministerio De Educasion de el Salvador </small></big><br>
      <big><big><small>Centro Escolar Canton Sam Sebastian Arriba </small></big></big></td>
      </tr>
    
    </tbody>
  </table>
</div>
<form action="regnueinsc.php" name="form1" method="post">  
  <div align="center">
    <fieldset style="border: 2px solid rgb(0, 0, 0); width: 800px;">
      <legend style="color: rgb(0, 0, 0); font-weight: bold; font-style: italic;" class="Estilo2"></legend>
      <small> </small><small> </small>
      <small>
        
        
          </small><small>
              
              </small>
     <table style="width: 869px; height: 194px; text-align: left; margin-left: auto; margin-right: auto;" border="0" cellpadding="0" cellspacing="0">
       <tbody>
         <tr>
           <td colspan="3" height="20"><small> </small>
                 
                 
                 
                 
                 
                 
                 
                 
             <div align="center">
               <h2><small style="color: black;">PLANILLA DE INSCRIPCIÓN</small></h2>
               <table style="text-align: left; width: 857px; height: 64px;" border="0" cellpadding="2" cellspacing="2">
                 <tbody>
                      
                      
                   <tr>
                        
                        
                     <td style="vertical-align: top; text-align: right; color: black;"><span style="font-weight: bold; font-style: italic;">Numero de inscripcion:</span><br></td>
    <td style="vertical-align: top; text-align: center;"><input style="border: 1px solid rgb(0, 0, 0);" name="numins" id="numins" title="NUMERO DE INCRIPCION" size="10" maxlength="10" readonly="readonly" value="<?php echo $numins;?>"></td>
                 
<td style="vertical-align: top; color: rgb(0, 0, 0); text-align: right;"><span style="font-style: italic; font-weight: bold; color: black;">Fecha de
  inscripcion:</span><br></td>
    <td style="vertical-align: top; white-space: nowrap;"><input style="border: 1px solid rgb(0, 0, 0);" name="fecins" id="fecins" title="FECHA DE INCRIPCION" size="10" maxlength="10" readonly="readonly" value="<?php echo $fecins;?>"></td></tr>
                      
                      
                   <tr><td style="vertical-align: top; text-align: right;"><span style="font-weight: bold; font-style: italic; color: black;">Grado a cursar:</span><br></td>
    <td style="vertical-align: top;"><input style="border: 1px solid rgb(0, 0, 0);" name="grains" id="fecins" title="FECHA DE INCRIPCION" size="1" maxlength="1" readonly="readonly" value="<?php echo $grains;?>"></td>
    
<td style="vertical-align: top; font-style: italic; font-weight: bold; color: rgb(0, 0, 0); text-align: right;"><span style="color: black;">Sección a cursar:</span><br></td>
    <td style="vertical-align: top;"><input maxlength="1" size="1" style="border: 1px solid rgb(0, 0, 0);" name="secins" id="secins" title="SECCION" value="<?php echo $secins;?>" readonly="readonly"></td>
              </tr>
                 </tbody>
               </table>
    
        <small style="color: rgb(0, 0, 0);"><br>
          </small> </div>        </td>
         </tr>
             
             
         <tr><td><small>
               
            </small><small>
            </small><small>
                   
              </small><small>
                     
                     
                </small><small>
                       
                       
                       
                </small><small>
                </small><small>
                           
                </small><table style="border: 1px solid rgb(0, 0, 0); width: 905px; height: 26px; text-align: left; margin-left: auto; margin-right: auto; font-style: italic; color: black;" border="1" cellpadding="3" cellspacing="0"><tbody align="center"><tr><td colspan="5" style="border: 1px solid black; width: 200px; background-color: rgb(253, 253, 253); vertical-align: middle; text-align: left;">Datos del estudiante<small>
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
<font color='black' >NACIMIENTO</font></div></td>
<td align=\"center\"  bgcolor='#D1D1D1' width='200' style='border:1px solid black' >
<div align='center' class='Estilo2'>
<font color='black' >SEXO</font></div></td>";

     $sql = "SELECT * FROM alumno where cedulaalu='$cedalu'";
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
 </td>",$lleno['cedulaalu'],$lleno["nombrealu"],$lleno["apllidoalu"],$lleno["fechanacalu"],$lleno["sexoalu"]);



                }
             }
             mysql_free_result($resultado);

 
     ?>
                               
                               
                               
                      </small></div><br>
                    </td></tr>
                  </tbody>
                             
                             
                  </table>
    
  <small>    </small><small>
    </small><small>
      
      </small><small>
        
        
        
        </small><small>
          </small><small>
            </small><center><table style="border: 1px solid rgb(0, 0, 0); width: 950px; height: 1px; text-align: left; margin-left: auto; margin-right: auto; font-style: italic; color: black;" border="1" cellpadding="3" cellspacing="0"><tbody align="center"><tr><td colspan="6" style="border: 1px solid black; width: 200px; text-align: left; background-color: rgb(253, 253, 253); vertical-align: middle;">Datos de la madre<small>
              
              
              </small><div style="" col="5" class="Estilo2" align="left"><small>
                
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
<font color='black' >PROFESIÓN</font></div></td>";
     $sql = "SELECT * FROM repre where cedularep='$cedmad'";
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
<td align=\"center\" width='200' style='border:1px solid black' ><div align='center' class='Estilo2'>%s</div></td>
 </td>",$lleno['cedularep'],$lleno["nombrerep"],$lleno["apellidorep"],$lleno["telefonorep"],$lleno["celularrep"],$lleno["profesionrep"]);



                }
             }
             mysql_free_result($resultado);

 
     ?>
                
                </small></div></td></tr></tbody></table>
    

      <small>      </small><small>
        
        </small><small>
          
          
          </small><small>
            
            
            </small><small>
              
              </small><small>
                
              </small><table style="border: 1px solid rgb(0, 0, 0); width: 950px; height: 17px; text-align: left; margin-left: auto; margin-right: auto; font-style: italic; color: black;" border="1" cellpadding="3" cellspacing="0"><tbody align="center"><tr><td colspan="6" style="border: 1px solid black; width: 200px; text-align: left; background-color: rgb(253, 253, 253); vertical-align: middle;">Datos del padre<small>
                  </small><div style="" col="5" class="Estilo2" align="left"><small>
                    
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
<font color='black' >PROFESIÓN</font></div></td>";
     $sql = "SELECT * FROM repre where cedularep='$cedpad'";
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
<td align=\"center\" width='200' style='border:1px solid black' ><div align='center' class='Estilo2'>%s</div></td>
 </td>",$lleno['cedularep'],$lleno["nombrerep"],$lleno["apellidorep"],$lleno["telefonorep"],$lleno["celularrep"],$lleno["profesionrep"]);

                }
             }
             mysql_free_result($resultado);

 
     ?>
                    
                    
                    </small></div></td></tr></tbody></table>
    

      <small>      </small><small>
        
        
        </small><small>
          
          </small><small>
            
            
            </small><small>
              
              
              </small><small>
              </small><table style="border: 1px solid rgb(0, 0, 0); width: 950px; height: 1px; text-align: left; margin-left: auto; margin-right: auto; font-style: italic; color: black;" border="1" cellpadding="3" cellspacing="0"><tbody align="center"><tr><td colspan="6" style="border: 1px solid black; width: 200px; text-align: left; background-color: rgb(253, 253, 253); vertical-align: middle;">Datos del representante<small>
                  </small><div style="background-color: rgb(253, 253, 253);" col="5" class="Estilo2" align="left"><small>
                    
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
<div align='center' class='Estilo2'><font color='black' >PROFESIÓN</font></div></td>";
     $sql = "SELECT * FROM repre where cedularep='$cedrep'";
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
<td align=\"center\" width='200' style='border:1px solid black' ><div align='center' class='Estilo2'>%s</div></td>
 </td>",$lleno['cedularep'],$lleno["nombrerep"],$lleno["apellidorep"],$lleno["telefonorep"],$lleno["celularrep"],$lleno["profesionrep"]);



                }
             }
             mysql_free_result($resultado);

 
     ?>
                    
                    </small></div></td></tr></tbody></table>
    

      <small>      </small><small>
        
        </small><small>
          </small><small>
            
            
            
            </small><small>
              
              
              </small><small>
              </small><table style="border: 1px solid rgb(0, 0, 0); width: 950px; height: 1px; text-align: left; margin-left: auto; margin-right: auto; font-style: italic; color: black;" border="1" cellpadding="3" cellspacing="0"><tbody align="center"><tr><td colspan="6" style="border: 1px solid black; width: 200px; text-align: left; background-color: rgb(253, 253, 253); vertical-align: middle;">Datos del docente<small>
                  
                  </small><div style="background-color: rgb(253, 253, 253);" col="5" class="Estilo2" align="left"><small>
                    
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
<div align='center' class='Estilo2'><font color='black' >PROFESIÓN</font></div></td>";
     $sql = "SELECT * FROM docente where ceduladoc='$ceddoc'";
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
<td align=\"center\" width='200' style='border:1px solid black' ><div align='center' class='Estilo2'>%s</div></td>
 </td>",$lleno['ceduladoc'],$lleno["nombredoc"],$lleno["apellidodoc"],$lleno["telefonodoc"],$lleno["celulardoc"],$lleno["profesiondoc"]);

                }
             }


             mysql_free_result($resultado);

 
     ?>
                    
                    
                    </small></div></td></tr></tbody></table>
    
  <br>
              
              <br>
              <table style="text-align: left; width: 953px; height: 257px;" border="0" cellpadding="2" cellspacing="2">
                <tbody>
                  
                  
                  
                  <tr>
                    
                    <td colspan="5" rowspan="1" style="vertical-align: top; white-space: nowrap; text-align: left;"><span style="font-style: italic; font-weight: bold; color: rgb(51, 51, 0);">&nbsp;INTITUCIÓN
                    DE ORIGEN: </span><p><input name="insori" id="insori" title="PLANTEL DE ORIGEN" size="80" maxlength="80" style="border: 1px solid rgb(0, 0, 0);" value="<?php echo $plaori;?>" readonly="readonly"> </p></td>
        </tr>
                  
                  <tr align="center">
                    <td colspan="5" rowspan="1" style="vertical-align: top; text-align: left;"><span style="font-weight: bold; font-style: italic; color: rgb(51, 51, 0);">OBSERVACIÓN:
                    </span><p><input name="obsins" id="obsins" title="OBSERVACION" size="100" maxlength="100" style="border: 1px solid rgb(0, 0, 0);" value="<?php echo $obsins;?>" readonly="readonly"></p></td>
          </tr>
                  
                  <tr align="center">
                    <td colspan="5" rowspan="1" style="vertical-align: top;"><span style="font-style: italic; font-weight: bold; color: rgb(51, 51, 0);">RECAUDOS
                    A ENTREGAR (FOTOCOPIAS)</span><br>                  </td>
        </tr>
                  
                  
                  
                  <tr>
                    
                    <td style="vertical-align: top;"><small>Cedula ____</small><br>                  </td>
            <td style="vertical-align: top;"><small>Partida de nacimiento ____</small><br>            </td>
    
        <td style="vertical-align: top;"><small>Constancia de calificacion ___</small><br>          </td>
    

            <td style="vertical-align: top;"><small>Fotografia ___</small><br>            </td>
            <td style="vertical-align: top;"><small>Cedula del representante ___</small><br>            </td>
        </tr>
                  
                  <tr>
                    
                    
                    <td style="vertical-align: top;"><br>                  </td>
    
        <td style="vertical-align: top;"><br>          </td>
            <td style="vertical-align: top;"><br>            </td>
    
        <td style="vertical-align: top;"><br>          </td>
    
        <td style="vertical-align: top;"><br>          </td>
          </tr>
                  
                  <tr>
                    <td colspan="2" rowspan="1" style="vertical-align: top; text-align: center;">__________________________</td>
    

            <td style="vertical-align: top;"><br>            </td>
    

            <td colspan="2" rowspan="1" style="vertical-align: top; text-align: center;">__________________________</td>
          </tr>
                  <tr>
                    <td colspan="2" rowspan="1" style="vertical-align: top; text-align: center;">Firma del
                    representante <br>                  </td>
    
        <td style="vertical-align: top;"><br>          </td>
    
        <td colspan="2" rowspan="1" style="vertical-align: top; text-align: center;">Firma del funcionario
          que realizo la inscripción</td>
          </tr>
                  <tr>
                    
                    
                    <td style="vertical-align: top;"><br>                  </td>
    

            <td style="vertical-align: top;"><br>            </td>
    
        <td style="vertical-align: top;"><br>          </td>
    
        <td colspan="2" rowspan="1" style="vertical-align: top;">
          <div style="text-align: center;">Sello de la institución<br>
            </div>        </td>
        </tr>
                </tbody>
              </table></center>
    <?php 
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
><a href='$menu' class='enlacenava'><input name='Submit2' value='Menú principal' type='button'></a></font>";
?>
            <div align="center">
                 
                 
              <h3><small> </small></h3>
      </div>
    
  
    

    
  
    

    
</td></tr></tbody>
        </table>
    </fieldset>
  </div>
</form>
</body></html>
