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


    public function drawList(){
        $poderes = fopen("poderes.csv", "r") or die("Unable to open file!");
        echo "<table>"; 
        while (!feof($poderes)){
            $datos = fgetcsv($poderes);

            if($datos !== false){
                echo "<tr>";
               
                echo "<td><strong>Nombre:</strong> $datos[0] <strong>Daño:</strong> $datos[1] <strong>Coste:</strong> $datos[2] <strong>Descripcion:</strong> $datos[3]</td>"; 
                echo "</tr>";
            }


    }
    echo "</table>"; 
    fclose($poderes); 

}





}

?>
