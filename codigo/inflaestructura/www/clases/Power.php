<?php

class Power extends Connection {
    private $nombrePoder;
    private $daño;
    private $coste;

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
        } else {
            echo "No rows found for $nombrePoder";
        }
    }

    public function __toString() {
        return "Nombre del poder: " . $this->nombrePoder . ", Daño: " . $this->daño . ", Coste: " . $this->coste;

<<<<<<< HEAD
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $this->nombrePoder = $row['nombrePoder'];
    $this->daño = $row['daño'];
    $this->coste = $row['coste'];
x
}

    public function getNombre(){
=======
    }

    public function getNombre() {
>>>>>>> f4d1aba8a84976994e01db3f2cdb70a5f324f868
        return $this->nombrePoder;
    }

    public function setDaño($daño) {
        $this->daño = $daño;
    }

    public function getDaño() {
        return $this->daño;
    }

    public function getCoste() {
        return $this->coste;
    }
}
?>
