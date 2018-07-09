<?php
//vemos si el usuario y contraseña es válido
//conecto con la base de datos 

$link = mysql_connect("localhost","root","");
//selecciono la BD 

mysql_select_db("incripcion",$link);

//si es necesario cambiar la config. del php.ini desde tu script
ini_set("session.use_only_cookies","1"); 
ini_set("session.use_trans_sid","0"); 
 
$clave = $_POST['clave'];
$usuario = $_POST['usuario'];
$nivel = $_POST['nivel'];

$result = mysql_query("select * from user where (clave = '$clave' and usuario = '$usuario')", $link);
if (mysql_fetch_array($result))
   {
    //usuario y contraseña válidos 
    session_name("entrausu");

    //asigno un nombre a la sesión para poder guardar diferentes datos 
    session_start();

    // inicio la sesión
    session_set_cookie_params(0, "/", $HTTP_SERVER_VARS["HTTP_HOST"], 0);
    $_SESSION["autentificado"]= "SI";

    //defino la sesión que demuestra que el usuario está autorizado 
    $_SESSION["ultimoAcceso"]= date("Y-n-j H:i:s");

    //defino la fecha y hora de inicio de sesión en formato aaaa-mm-dd hh:mm:ss 
    $result = mysql_query("select * from user where (clave = '$clave' and usuario = '$usuario' and tipo='administrador')", $link);
     if (mysql_fetch_array($result))
        {
          $sql = "SELECT * FROM parametros WHERE id='1'";
          $resultado = mysql_query($sql, $link);
          $lleno = mysql_fetch_array($resultado);
          $menu= "menu.php";
          mysql_query("UPDATE parametros SET id = '1', menu = '$menu'", $link);
	  header ("Location: $menu");
            }
    else
         {
          $sql = "SELECT * FROM parametros WHERE id='1'";
          $resultado = mysql_query($sql, $link);
          $lleno = mysql_fetch_array($resultado);
          $menu= "menu1.php";
          mysql_query("UPDATE parametros SET id = '1', menu = '$menu'", $link);
	  header ("Location: $menu");
            }

     }

else
 {
    //si no existe le mando otra vez a la portada
    header("Location: index.php?errorusuario=si");
    $_SESSION["autentificado"]= "NO";
}

mysql_free_result($result);
mysql_close($link);
?>
