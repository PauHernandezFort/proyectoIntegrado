<?php

class Power extends Connection{
    private $nombrePoder;
    private $daño;
    private $coste;

    public function __construct($nombrePoder){
        $conn= $this->getConn();
        $this->nombrePoder=$nombrePoder;
        $query = 'SELECT * FROM Poder WHERE nombrePoder = "Volar"';
        $result = mysqli_query($this->conn, $query);
        var_dump($result);


    $row = $result->fetch_array(MYSQLI_ASSOC);
    $this->nombrePoder = $row['nombrePoder'];
    $this->daño = $row['daño'];
    $this->coste = $row['coste'];
x
}

    public function getNombre(){
        return $this->nombrePoder;
    }
    public function setDaño($nombrePoder){
        $this->nombrePoder=$nombrePoder;
    }
    public function getDaño(){
        return $this->daño;
    }
   
    public function getCoste(){
        return $this->coste;
    }
    
    public function getmodelId($conn) {
        
    }


}