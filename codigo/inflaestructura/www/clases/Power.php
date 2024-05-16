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
    
    
    public function updatePower($nombre, $poder, $coste, $descripcion) {
        
        
    
        $query = "UPDATE Poder SET nombrePoder='$nombre', poder='$poder', coste='$coste',descripcion='$descripcion' WHERE nombrePoder=$nombre";
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
        $query = "SELECT * FROM Poder";
        $result = mysqli_query($this->conn, $query);
        $powers = []; 
        $arrNombre = [];
        
        while ($row = mysqli_fetch_assoc($result)){
            $powers[] = $row;
            $arrNombre[] = $row['nombrePoder']; 
        }

        
        
        $output = "";
        
        foreach ($powers as $power){
            $output .= "<div class='card' style='width: 18rem;'>
                        <div class='card-body'>
                        <h5 class='card-title'>" . $power['nombrePoder'] . "</h5>
                        <p class='card-text'>" . $power['descripcion'] . "</p>
                        <div class='card-footer text-body-secondary'>
                        <p class='card-text'>Daño: " . $power['daño'] . "</p>
                        <p class='card-text'>Coste: " . $power['coste'] . "</p>
                        </div>
                        <a href='#' class='btn btn-primary'>Go somewhere</a>
                        </div>
                        </div>";
        }
        return $output;
       
    }
    
    
    
    
            
}














?>
