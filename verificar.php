<?php

ini_set("session.use_only_cookies","1"); 
ini_set("session.use_trans_sid","0"); 

//iniciamos la sesi�n de usuario
session_name("entrausu"); 
session_start(); 
// duracion del cookie


//antes de hacer los c�lculos, compruebo que el usuario est� logueado 
//utilizamos el mismo script que antes 
if ($_SESSION["autentificado"] != "SI") { 
    //si no est� logueado lo env�o a la p�gina de autentificaci�n 
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
     //si pasaron 2 minutos o m�s
      session_destroy(); // destruyo la sesi�n 
      header("Location: index.php"); //env�o al usuario a la pag. de verificacion de usuario
      //sino, actualizo el tiempo de comienzo o actividad de la sesi�n 
    }else { 
    $_SESSION["ultimoAcceso"] = $ahora; 
   } 
} 

?> 


