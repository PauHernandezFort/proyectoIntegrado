<?php

class Power extends Connection {
    private $nombrePoder;
    private $daño;
    private $coste;
    private $descripcion;

    public function __construct($nombrePoder) {
        parent::__construct();
        $conn = $this->getConn();
        $this->nombrePoder = $nombrePoder;
        $query = "SELECT * FROM Poder WHERE nombrePoder = '$nombrePoder'";
        $result = mysqli_query($conn, $query);
        $row = $result->fetch_array(MYSQLI_ASSOC);
       
        if ($row) {
            $this->nombrePoder = $row['nombrePoder'];
            $this->daño = $row['daño'];
            $this->coste = $row['coste'];
            $this->descripcion = $row["descripcion"];
        } else {
          //  echo "No rows found for $nombrePoder";
        }
    }

    public function __toString() {
        return "Nombre del poder: " . $this->nombrePoder . ", Daño: " . $this->daño . ", Coste: " . $this->coste . ", Descrpcion:" . $this->descripcion;

    }

    public function getNombre() {
        return $this->nombrePoder;
    }
    public function setNombre($nombrePoder) {
        return $this->nombrePoder;
    }
    public function getDaño() {
        return $this->daño;
    }
    public function setDaño($daño) {
        $this->daño = $daño;
    }
    public function getCoste() {
        return $this->coste;
    }
    public function setCoste($coste) {
        return $this->coste;
    }
    public function getDescripcion() {
        return $this->descripcion;
    }
    public function setDescripicion($descripcion) {
        return $this->descripcion;
    }

   
    
    function getAllPowers(){
        $query = "SELECT nombrePoder FROM Poder";
        $result = $this->conn->query($query);

        $poderes = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $poderes[] = $row;
            }
        }
        $array=[];
       
         for ($i=0; $i < count($poderes) ; $i++) { 
            $array[$i]= $poderes[$i]['nombrePoder'];
         }
        
        return $array;
        
    }
    
    
    public function updatePower($nombre, $daño, $coste, $descripcion) {
        $query = "UPDATE Poder SET `nombrePoder`='$nombre', `daño`='$daño', `coste`='$coste',`descripcion`='$descripcion' WHERE `nombrePoder`='$nombre'";
        $resultado = $this->conn->query($query);
    
        if (!$resultado) {
            
          
            die("Error en la consulta: " . $this->conn->error);
        } 
    }
    public function findName($nombre) {
        $query = "SELECT * FROM Poder WHERE nombrePoder = $nombre";
        $resultado = $this->conn->query($query);
        if ($resultado && $resultado->num_rows > 0) {
            $row = $resultado->fetch_object();
            return $row;
        } else {
            return null; 
    }
}

    public function drawList(){
        $poderes = fopen("poderes.csv", "r") or die("Unable to open file!");
        echo "<table>"; 
        while (!feof($poderes)){
            $datos = fgetcsv($poderes);
            $output=";";
            if($datos !== false){
            $output.="<div class='card'style='width: 18rem;''>
            <div class='card-body'>
              <h5 class='card-title'>$datos[0]</h5>
              <p class='card-text'>$datos[4]</p>
              <div class='card-footer text-body-secondary'>
              <p class='card-text'> $datos[1]</p>
            </div>
              <a href='#' class='btn btn-primary'>Go somewhere</a>
            </div>
          </div>";
              
            }


    }
    echo "</table>"; 
    fclose($poderes); 

}





}

?>
