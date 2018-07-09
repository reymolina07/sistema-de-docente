<?php
ini_set("session.use_only_cookies","1"); 
ini_set("session.use_trans_sid","0"); 

//iniciamos la sesión de usuario
session_name("entrausu"); 
session_start(); 
// duracion del cookie
session_set_cookie_params(0, "/", $HTTP_SERVER_VARS["HTTP_HOST"], 0);



setcookie("entrausu", "", time()+3600);//borro la cookie
session_destroy(); 
header("Location: index.php"); 
?>

