<?php
class Character extends Connection{

    protected $energia; 
    protected $vida; 
    protected $nonbre; 
    protected $daño; 
    protected $nombrePoder1;
    protected $nombrePoder2; 
    protected $nombrePoder3; 

    public function __construct($nombre){
        parent::__construct();
        $this->nombre = $nombre;
        $query = "SELECT * FROM Personaje1 WHERE nombre = '$nombre'"; 
        $result =  mysqli_query($this->conn, $query);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        if ($row) {
            $this->energia = $row['energia'];
            $this->vida = $row['vida'];
            $this->nombre = $row['nombre'];
            $this->daño = $row['daño'];
        } else {
            echo "No rows found for $nombre";
        }
        
    }


    public function getEnergia(){
        return $this->energia; 
    }

    public function getVida(){
        return $this->vida;
    }

    public function getnombre(){
        return $this->nombre; 
    }

    public function getDaño(){
        return $this->daño; 
    }

    public function getNombrePoder1(){
        return $this->nombrePoder1;
    }

    public function getNombrePoder2(){
        return $this->nombrePoder2;
    }

    public function getNombrePoder3(){
        return $this->nombrePoder3; 
    }

    public function importar(){
        $personajes = fopen("personajes.csv", "r") or die("Unable to open file!");
        while (!feof($personajes)) {
            $data = fgetcsv($personajes);
            $query1 = "INSERT INTO Personaje1 (energia, vida, nombre, daño, NombrePoder)
             VALUES ('$data[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]');";
            $result1 = mysqli_query($this->conn, $query1);
            $query2 = "INSERT INTO Personaje2 (energia, vida, nombre, daño, NombrePoder)
            VALUES ('$data[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]');";
           $result2 = mysqli_query($this->conn, $query2);
        }
        fclose($personajes);
    }

    public function borrar(){
        $query1 = "DELETE FROM Personaje1;";
        $result1 = mysqli_query($this->conn, $query1);
        $query2 = "DELETE FROM Personaje2;";
        $result2 = mysqli_query($this->conn, $query2);
    }

    public function init(){
        $this->borrar();
        $query1 = "SELECT COUNT(*) FROM Personaje1;";
        $result1 = mysqli_query($this->conn, $query1)->fetch_row()[0];
        $query2 = "SELECT COUNT(*) FROM Personaje2;";
        $result2 = mysqli_query($this->conn, $query2)->fetch_row()[0];
        if ($result1 == 0 && $result2 == 0){
            $this->importar();
        }
    }


}


?>