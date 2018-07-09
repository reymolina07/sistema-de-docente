<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head><?php include("verificar.php") ?><title>Sistema de Inscripción para el Registro y Control de Estudiantes</title></head><body>
<table style="text-align: left; width: 100%;" border="0" cellpadding="2" cellspacing="2">

  <tbody>
    <tr style="font-weight: bold;" align="center">
      <td colspan="1" rowspan="1" style="vertical-align: top;"><img style="width: 974px; height: 50px;" alt="MPPE" title="Miniseterio del Poder Popular para la Educación" src="membrete1.png"><br>
      </td>
    </tr>
    <tr style="font-weight: bold;" align="center">
      <td colspan="1" rowspan="1" style="vertical-align: top;"><big><big style="color: rgb(0, 0, 153);">Sistema de Inscripción </big></big><br>
      <big><big style="color: rgb(0, 0, 153);"><big style="color: rgb(0, 0, 153);"> </big><small><big>para el Registro y
Control
de Estudiantes</big></small></big></big><br>
      <big style="color: blue;"><big style="color: rgb(0, 0, 153);"><small></small></big></big></td>
    </tr>
    <tr>
      <td colspan="1" rowspan="1" style="vertical-align: top; text-align: center;"><big style="color: rgb(0, 0, 153);"><small>centro escolar canton san sebastian arriba</small></big></td>
    </tr>
  </tbody>
</table>

<div style="text-align: center; color: rgb(0, 0, 153);"><big>
<h4 style="background-color: rgb(198, 198, 214);">CREAR CUENTA DE
USUARIO</h4>
</big></div>

<div style="text-align: center;"><?php
   $usu = $_POST["usua"];
   $cla1 = $_POST["clave1"];
   $cla2 = $_POST["clave2"];
   $nom = $_POST["nomb"];
   $ape = $_POST["apel"]; 
   $tip = $_POST["tipo"];
   include("conectar.php");
   $link = conectarse();

   if ($usu=="")
    {
     echo "<div align=\"center\"><br><h2><font color='blue'>Error: Introduzca un Usuario</font></h2></div>";
     echo "<div align=\"center\"><font color='blue'><h2><a href='javascript:window.history.go(-1)' class='enlacenava'>Regresar</font></h2></a></div>";
     exit(); // Salir del programa...!
    }

   $cancar = strlen($usu);

     if ($cancar>12)
         {
          echo "<div align=\"center\"><br><h2><font color='blue'>Error: Los campos no deben ser mayor a 12 caracteres</font></h2></div><br>";
          echo "<div align=\"center\"><h2><a href='javascript:window.history.go(-1)' class='enlacenava'>Regresar</a><h2></div>";
          exit(); // Salir del programa...!
         }


   for($i = 0; $i < strlen($usu); $i++)
    {
    if (!(($usu[$i] >= "a" && $usu[$i] <= "z")))
    {
     echo "<br><h2><font color='blue'>Error en el Usuario: </font><br><h2>";
      echo "<div align=\"center\"><h2><font color=\"black\">Usuario: </font><font color=\"blue\">$usu</font></h2></div>";
   echo"<div align=\"center\"><h2><font color='black'>Los caracteres deben ser alfabeticos, en minusculas y sin espacios!!</font></h2></div>";
     echo "<div align=\"center\"><h2><a href='javascript:window.history.go(-1)' class='enlacenava'>Regresar</a></h2></div>";
     exit();
    }
    }

    if ($cla1=="")
    {
     echo "<div align=\"center\"><br><h2><font color='blue'>Error: Introduzca la clave</font></h2></div>";
     echo "<div align=\"center\"><font color='blue'><h2><a href='javascript:window.history.go(-1)' class='enlacenava'>Regresar</font></h2></a></div>";
     exit(); // Salir del programa...!
    }
        if ($nom=="")
    {
     echo "<div align=\"center\"><br><h2><font color='blue'>Error: Introduzca el nombre</font></h2></div>";
     echo "<div align=\"center\"><font color='blue'><h2><a href='javascript:window.history.go(-1)' class='enlacenava'>Regresar</font></h2></a></div>";
     exit(); // Salir del programa...!
    }
    if ($ape=="")
    {
     echo "<div align=\"center\"><br><h2><font color='blue'>Error: Introduzca el apellido</font></h2></div>";
     echo "<div align=\"center\"><font color='blue'><h2><a href='javascript:window.history.go(-1)' class='enlacenava'>Regresar</font></h2></a></div>";
     exit(); // Salir del programa...!
    }
   if ($tip=="")
    {
     echo "<div align=\"center\"><br><h2><font color='blue'>Error: Introduzca el tipo de usuario</font></h2></div>";
     echo "<div align=\"center\"><font color='blue'><h2><a href='javascript:window.history.go(-1)' class='enlacenava'>Regresar</font></h2></a></div>";
     exit(); // Salir del programa...!
    }
   function comprobar_clave($cla1)
    {

    if (ereg("[0-9]{1,8}",$cla1))
       {
        return 1;
       }
     else
       {
       return 0;
       }
    }

   $swcla = comprobar_clave($cla1);

   if ($swcla=="0")
      {
       echo "<br><h2><font color='blue'>Error: La clave no debe ser mayor a 8 caracteres y en formato numerico!! </font><br></h2>";
          echo "<div align=\"center\"><h2><font color=\"black\">Clave: </font><font color=\"blue\">$cla1</font></h2></div>";
  echo "<div align=\"center\"><h2><a href='javascript:window.history.go(-1)' class='enlacenava'>Regresar</a></h2></div>";
       exit();
      }

      if ($cla2=="")
    {
     echo "<div align=\"center\"><br><h2><font color='blue'>Error: Confirme la clave</font></h2></div>";
     echo "<div align=\"center\"><font color='blue'><h2><a href='javascript:window.history.go(-1)' class='enlacenava'>Regresar</font></h2></a></div>";
     exit(); // Salir del programa...!
    }
  $swcla = 0;

  if ($cla1==$cla2)
      {
        $swcla = 1;
      }

       if ($swcla=="0")
   {
       echo "<br><div align=\"center\"><h2><font color='blue'>Error: Las claves no coiciden !!<h2></font></div>";
       echo "<div align=\"center\"><h2><a href='javascript:window.history.go(-1)' class='enlacenava'>Regresar</a></h2></div>";
      exit();
    }
    
   if ($cla2<>$cla1)
   {
       echo "<br><div align=\"center\"><font color='blue'><h2>Error: Las Claves no Coiciden !!</h2></font></div>";
       echo "<div align=\"center\"><h2><a href='javascript:window.history.go(-1)' class='enlacenava'>Regresar</a></h2></div>";
       exit();
    }

 $buscar = mysql_query("select * from user where usuario = '$usu'");
 if(mysql_fetch_array($buscar))
  {
     echo "<div align=\"center\"><br><h2><font color='blue'> Error: Ya existe una cuenta con el mismo nombre de usuario </font></h2></div>";
     echo "<div align=\"center\"><h2><font color=\"black\">Usuario: </font><font color=\"blue\">$usu</font></h2></div>";
    echo "<div align=\"center\"><h2><a href=\"javascript:window.history.go(-1)\" class=\"enlacenava\">Regresar</a></h2></div>";
     exit(); // Salir del programa...!
  }

 mysql_query("INSERT INTO user (usuario, clave, nombre, apellido, tipo) VALUES ('$usu','$cla1','$nom','$ape','$tip');", $link);
 echo "<div align=\"center\"><br><h2>La cuenta de usuario se registró exitosamente:<h2></div>";
    echo "<div align=\"center\"><h2><font color=\"black\">Usuario: </font><font color=\"blue\">$usu</font></h2></div>";
          echo "<div align=\"center\"><h2><font color=\"black\">Clave: </font><font color=\"blue\">$cla1</font></h2></div>";
 
 
 
  ?></div>

<div align="center"> <font color="blue"> </font>
<h2><font color="blue"><a href="menu.php" class="enlacenava">Menú
principal</a> </font> </h2>
</div>

</body></html>
