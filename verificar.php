<?php

ini_set("session.use_only_cookies","1"); 
ini_set("session.use_trans_sid","0"); 

//iniciamos la sesión de usuario
session_name("entrausu"); 
session_start(); 
// duracion del cookie


//antes de hacer los cálculos, compruebo que el usuario está logueado 
//utilizamos el mismo script que antes 
if ($_SESSION["autentificado"] != "SI") { 
    //si no está logueado lo envío a la página de autentificación 
    header("Location: index.php");
  echo "<font color='red'><h2><div align=\"center\">Error: No hay conexion a la Base de Datos</div><h2></font><BR><BR>";
    exit();
} else { 
    //sino, calculamos el tiempo transcurrido 
    $fechaGuardada = $_SESSION["ultimoAcceso"]; 
    $ahora = date("Y-n-j H:i:s"); 
    $tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada)); 

    //comparamos el tiempo transcurrido 

    // Cambiar el tiempo a 2 minutos

     if($tiempo_transcurrido >= 7000) {
     //si pasaron 2 minutos o más
      session_destroy(); // destruyo la sesión 
      header("Location: index.php"); //envío al usuario a la pag. de verificacion de usuario
      //sino, actualizo el tiempo de comienzo o actividad de la sesión 
    }else { 
    $_SESSION["ultimoAcceso"] = $ahora; 
   } 
} 

?> 


