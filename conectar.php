<?php
  function conectarse()
  { // comienzo de la funcion
       if (!($enlace = mysql_connect("localhost","root",""))) //se configura la conexion del usuario administrador mas la contraseña
       {
            // si no coincide la base de datos, el usuario o la contraseña deveria aparecer el mensaje de no conexion y envia enlace a la pagina index
             echo "<font color='red'><h2><div align=\"center\">Error: No hay conexion a la Base de Datos</div><h2></font><BR><BR>";
             echo"<div align=\"center\"> <font color='blue'><h2><a href='index.php' class='enlacenav'>Volver a la Pagina Principal</a><h2></font></div>";
             exit();
       }
       if (!mysql_select_db("incripcion",$enlace)) // se selecciona la base de datos que vamos a utilizar
       {
             echo "<font color='red'><h2><div align=\"center\">Error: No hay conexion a la Base de Datos</div><h2></font><BR><BR>"; // si no esta la base de datos envia mensaje de error y coloca el enlace a la pagina principal
             echo"<div align=\"center\"> <font color='blue'><h2><a href='index.php' class='enlacenav'>Volver a la Pagina Principal</a><h2></font></div>";
             exit();
        }
       return $enlace;
  }


?>
