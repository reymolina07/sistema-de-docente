<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head><?php include("verificar.php") ?><title>Sistema de Inscripción para el Registro y Control de Estudiantes</title>
  
   


    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><!-- AQUÍ SE DEBE INCLUIR EL FICHERO DE ESTILOS ELEGIDO, ASÍ COMO SU RUTA, SI PROCEDE. -->

	<link rel="stylesheet" type="text/css" href="css/estilos_1.css"><!-- EN EL DOCUMENTO HTML SE COLOCARÁN LAS CLASES NECESARIAS SEGUN SE DESEE. --><!-- EL SIGUIENTE CÓDIGO JAVASCRIPT CONTIENE LA ACCIÓN QUE SE DEBERÁ
LLEVAR A CABO CUANDO EL USUARIO PULSE EL BOTÓN DE CANCELAR. ESTA ACCIÓN
ESTÁ EN UNA FUNCIÓN CUYO CONTENIDO DEBE SER MODIFICADO DE ACUERDO CON
LAS NECESIDADES DE PROGRAMACIÓN DE LA PÁGINA. -->


    <script language="javascript" type="text/javascript">
      function botonCancelar (){
        location.href="";
      }
    </script><!-- AQUÍ ACABA EL AVASCRIPT NECESARIO PARA EL BOTÓN CANCELAR. --></head><body>
<table style="text-align: left; width: 100%;" border="0" cellpadding="2" cellspacing="2">

  <tbody>
    <tr style="font-weight: bold;" align="center">
      <td colspan="1" rowspan="1" style="vertical-align: top;"><img src="membrete1.png" alt="q" width="956" height="131"></td>
    </tr>
    <tr style="font-weight: bold;" align="center">
      <td colspan="1" rowspan="1" style="vertical-align: top;"><big><big style="color: rgb(0, 0, 153);">Sistema de Inscripción </big></big><br>
      <big><big style="color: rgb(0, 0, 153);"><big style="color: rgb(0, 0, 153);"> </big><small><big>para el Registro y
Control
de Estudiantes</big></small></big></big><br></td>
    </tr>
    <tr>
      <td colspan="1" rowspan="1" style="vertical-align: top; text-align: center;"><big style="color: rgb(0, 0, 153);"><small>Centro Escolar Canton San Sebastian Arriba </small></big></td>
    </tr>
  </tbody>
</table>
  <?php if (!isset ($_FILES["ficheroDeCopia"])){ // Se comprueba si ya existe un fichero enviado o aun no.
/* Si aun no existe un fichero enviado, se define un formulario para que el usuario
pueda enviarlo. Este debe ser el fichero de copia de seguridad con la consulta SQL para
recrear la base de datos perdida o estropeada.
En el formulario se deben incluir las clases que definen el aspecto de los distintos elementos,
a partir del fichero de estilos CSS.*/
      $contenidoDeFormulario="  <center><h2><form action='restaurar.php' method='post' enctype='multipart/form-data' name='formularioDeRestauracion'";
      $contenidoDeFormulario.="id='formularioDeRestauracion'>\n";
      $contenidoDeFormulario.="    <table width='600' border='0' class=''>\n";
      $contenidoDeFormulario.="      <tbody class=''>\n";
      $contenidoDeFormulario.="        <tr style='font-weight: bold;' align='center'>\n";
      $contenidoDeFormulario.="         <div style='color: rgb(0, 0, 153);' align='left'>
<div style=text-align: center;'><h4 align='center' style='background-color: rgb(198, 198, 214);'>RESTAURAR BASE DE DATOS<br> </h4></div>\n";
      $contenidoDeFormulario.="        </tr>\n";
      $contenidoDeFormulario.="         <tr style='font-weight: bold;' align='center'>\n";
      $contenidoDeFormulario.="          <td width='82' class=''>&nbsp;</td><p><p><p><p>\n";
      $contenidoDeFormulario.="          <td colspan='2' class=''><strong><big style='color: rgb(0, 0, 255);'>Indique el origen del archivo de copia </big></strong><BR><BR><BR></td>\n";
      $contenidoDeFormulario.="          <td width='60' class=''>&nbsp;</td>\n";
      $contenidoDeFormulario.="        </tr>\n";
      $contenidoDeFormulario.="        <tr>\n";
      $contenidoDeFormulario.="          <td class=''>&nbsp;</td>\n";
      $contenidoDeFormulario.="          <td colspan='2' class=''><input type='file' name='ficheroDeCopia' id='ficheroDeCopia'";
      $contenidoDeFormulario.="size='50'></td>\n";
      $contenidoDeFormulario.="          <td class=''>&nbsp;</td>\n";
      $contenidoDeFormulario.="        </tr>\n";
      $contenidoDeFormulario.="        <tr>\n";
      $contenidoDeFormulario.="          <td class=''>&nbsp;</td>\n";
      $contenidoDeFormulario.="          <td colspan='2' class=''>&nbsp;</td>\n";
      $contenidoDeFormulario.="          <td class=''>&nbsp;</td>\n";
      $contenidoDeFormulario.="        </tr>\n";
      $contenidoDeFormulario.="        <tr>\n";
      $contenidoDeFormulario.="          <td class=''>&nbsp;</td>\n";

      $contenidoDeFormulario.="          <td width='204' align='center' class=''><input name='envio' type='submit' ";
      $contenidoDeFormulario.="id='envio' value='Procesar'></td>\n";

      $contenidoDeFormulario.="          <td width='204' align='center' class=''><a href='menu.php'><input value='Menú principal' name='rees' type='button'></a></td>\n";

      $contenidoDeFormulario.="          <td class=''>&nbsp;</td>\n";
      $contenidoDeFormulario.="        </tr>\n";
      $contenidoDeFormulario.="      </tbody>\n";
      $contenidoDeFormulario.="    </table>\n";
      $contenidoDeFormulario.="  </form></center></h2>\n";
/* Se muestra el formulario. */
      echo ($contenidoDeFormulario);
    } else {
/* Si el fichero ya existe, se efectúa la carga del mismo y se inicia su procesado. */
/* Empezamos grabando el archivo de copia en el servidor. */
      $archivoRecibido=$_FILES["ficheroDeCopia"][tmp_name];
      $destino="./ficheroParaRestaurar.sql";
	  if (!@move_uploaded_file ($archivoRecibido, $destino)){
          echo "        <center> <div style='color: rgb(0, 0, 153);' align='left'>
<div style=text-align: center;'><h2 align='center' style='background-color: rgb(198, 198, 214);'>El proceso ha fallado, debe elegir el archivo del respaldo<br> </h4></div>\n";
 echo "          <center><td width='204' align='center' class=''><a href='menu.php'><input value='Menú principal' name='rees' type='button'></a></td>\n";
        die ();
      }

/* DATOS QUE CAMBIAN EN CADA INSTALACIÓN DE LA APLICACIÓN. */
      $usuario = "root";
      $clave = "";
      $servidor = "localhost";
      $baseDeDatos = "incripcion";
/* AQUÍ TERMINAN LOS DATOS QUE CAMBIAN EN CADA INSTALACIÓN DE LA APLICACIÓN. */
/* Se conecta con la base de datos elegida. */
      $conexion = mysql_connect($servidor,$usuario,$clave) or die(mysql_error());
      @mysql_select_db($baseDeDatos,$conexion);

/* Una vez subido el fichero al servidor, se abre para su lectura, línea a linea. */
      $manejadorDeFichero=fopen ("ficheroParaRestaurar.sql", "r");
/* Se inicializa una variable que se usará para almacenar las consultas antes de
ejecutarlas sobre la base de datos. */
      $consultaSQL="";
/* Mediante un bucle se va a leer el fichero hasta encontrar el final del mismo. */ 
      while (!feof($manejadorDeFichero)){
/* Se almacena el contenido, línea a línea. */
        $lectura=fgets($manejadorDeFichero);
/* A continuación se comprueba si la línea empieza por "# ". Esto indica que se trata de
un comentario. En ese caso se pasa a la siguiente iteración, ignorando toda esa línea
recién leida. También se pasa a la siguiente línea si la que estamos leyendo no tiene más
contenido que el salto de línea.*/
        if (substr ($lectura,0,2)=="# " || $lectura=="\n") continue;
/* Se determina la longitud de la línea restando el carácter de salto. */
		$longitudLeida=strlen ($lectura)-1;
/* Se elimina el carácter de salto de línea */
        $lectura=chop($lectura);
/* Llegados a este punto, la línea leida es parte de una consuilta SQL,
por lo que se incorpora a la variable que contendrá la misma para su
posterior ejecución. */
        $consultaSQL.=$lectura;
/* A continuación se comprueba si el último carácter de la ínea es un punto y coma,
lo que determina el final de una consulta SQL. Dado el formato que ha recibido el fichero,
el último carácter puede no ser un caracter válido, por lo que se comprueba si el punto y coma
el último o el penúltimo. */
        if (substr($lectura, $longitudLeida-2, 1)==";" || substr($lectura, $longitudLeida-1, 1)==";"){
/* Llegados aqui, ya tenemos la consulta SQL lista para su ejecución. */
          mysql_query($consultaSQL,$conexion);
          if (mysql_errno()!=0){ // Si se produce algún error, a pesar de todo.
            $mensajeDeError="SE HA PRODUCIDO EL ERROR SIGUIENTE<br>";
            $mensajeDeError.=mysql_errno()."***".mysql_error()."<br>";
            $mensajeDeError.="NO SE HA PODIDO COMPLETAR LA OPERACIÓN.";
            die ($mensajeDeError);
          }
/* Ahora e limpia la variable donde se almacena la consulta SQL, para empezar con la siguiente. ppp*/       
          $consultaSQL="";

        }
      }
      fclose ($manejadorDeFichero); // Se cierra el fichero.
/* Se elimina el fichero del servidor. */
	  unlink ("ficheroParaRestaurar.sql");
          echo "        <center> <div style='color: rgb(0, 0, 153);' align='left'>
<div style=text-align: center;'><h2 align='center' style='background-color: rgb(198, 198, 214);'>SE HA RESTAURADO LA BASE DE DATOS EXITOSAMENTE<br> </h4></div>\n";
      echo "          <center><td width='204' align='center' class=''><a href='menu.php'><input value='Menú principal' name='rees' type='button'></a></td>\n";
    }
  ?>
  </body></html>
