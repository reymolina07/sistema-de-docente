
<html><head>
  <title>Sistema de Inscripción para el Registro y Control de
Estudiantes</title>
     <table style="border: 1px solid rgb(0, 0, 255);" align="center" border="1" cellpadding="3" cellspacing="0">
        <tbody align="center">
<?php echo"<tr><td align=\"center\"  bgcolor='#FF0000' width='200' style='border:1px solid #FF0000' ><div align='center' class='Estilo2'><strong><font color='white' >USUARIO</font></strong></div></td><td  bgcolor='#FF0000' width='200' align=\"center\" style='border:1px solid #FF0000' ><div align='center' class='Estilo2'><font color='white' >OPCI&Oacute;N</font></strong></div></td></tr>";
      $sql = "SELECT * FROM usuario";
      $resultado = mysql_query($sql, $link);

      while($lleno = mysql_fetch_array($resultado))
           {
             {
              printf("<tr><td align=\"center\" width='200' style='border:1px solid blue' ><div align='center' class='Estilo2'><strong>%s</strong></div></td><td  align=\"center\" style='border:1px solid blue' ><a href = \"eliusu.php?usuario=%s\"><div align='center' class='Estilo2'><font color='blue' ><strong>Eliminar</strong></font></div></a>",
               $lleno["usuario"], $lleno["usuario"], $lleno["nivel"]);
                }
             }
             mysql_free_result($resultado);




    //conecta a la base de datos

     
     
    $sql = "SELECT ceduladoc FROM inscripcion";
     
    $runsql = mysql_query($sql) or die (mysql_error());
     
        while ($row1 = mysql_fetch_array($runsql){
     
            $email = $row1[0];
     
            //calcula duplicados
     
            $duplicado = "SELECT ceduladoc FROM inscripcion WHERE ceduladoc LIKE '$email'";
            $run_duplicado = mysql_query($duplicado) or die (mysql_error());
            $cant_dup = mysql_num_rows ($run_duplicado);
     
            $tot_duplicado = $cant_dup-1;
            echo "Existen <br>".$tot_duplicado."</b> Registros duplicados para la direccion de correo ".$email."<br>";

    }
     
     

     ?>

        </tbody>
      </table>
</body></html>


