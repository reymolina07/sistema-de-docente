    <?php
    //conecta a la base de datos
    $conexion = mysql_connect("localhost", "root", "");
    mysql_select_db("incripcion", $conexion);
     
     
     
    $sql = "SELECT ceduladoc FROM inscripcion";
     
    $runsql = mysql_query($sql) or die (mysql_error());
     
        while ($row1 = mysql_fetch_array($runsql){
     
            $email = $row1[0];
     
            //calcula duplicados
     
            $duplicado = "SELECT ceduladoc FROM inscripcion WHERE ceduladoc LIKE '$email'";
            $run_duplicado = mysql_query($duplicado) or die (mysql_error());
            $cant_dup = mysql_num_rows ($run_duplicado);
     
            $tot_duplicado = $cant_dup-1;
            echo "Existen ".$tot_duplicado."</b> Registros duplicados para la direccion de correo ".$email." ";

    }
     
     
    ?>
