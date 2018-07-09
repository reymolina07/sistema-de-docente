<?php
 include("conectar.php");
  
   
class myDBC {
    public $mysqli = null;
 
    public function __construct() {
 
        include_once "dbconfig.php";
        $this->mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
 
        if ($this->mysqli->connect_errno) {
            echo "Error MySQLi: ("&nbsp. $this->mysqli->connect_errno.") " . $this->mysqli->connect_error;
            exit();
        }
        $this->mysqli->set_charset("utf8");
    }
 
    public function __destruct() {
      
    }
 
    public function runQuery($qry) {
        $result = $this->mysqli->query($qry);
        return $result;
    }
 
    public function seleccionar_datos()
    {

        $q = "SELECT * FROM inscripcion 
INNER JOIN alumno ON inscripcion.cedulaalu = alumno.cedulaalu 
INNER JOIN repre ON inscripcion.cedularep = repre.cedularep
INNER JOIN docente ON inscripcion.ceduladoc = docente.ceduladoc
 order by grado,seccion,apllidoalu";

        $result = $this->mysqli->query($q);
 
        //Array asociativo que contendrá los datos
        $valores = array();
 
        if( $result->num_rows == 0)
        {
                    echo'<script type="text/javascript">
                alert("ningun registro");
                </script>';

        }
 
        else{
 
            while($row = mysqli_fetch_assoc($result))
            {
                //Se crea un arreglo asociativo
                array_push($valores, $row);
            }
        
        }
        //Regresa array asociativo
        return $valores;
    }
}
?>
