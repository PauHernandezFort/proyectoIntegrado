<?php

class Repoblar extends Connection{

    public function importarCuentas(){
        $cuentas = fopen("cuentas.csv","r") or die("Unable to open file!"); 
        while (($data = fgetcsv($cuentas)) !== false) {
            $query = "INSERT INTO Cuenta (correo, contraseña, nombre) VALUES ('$data[0]', '$data[1]', '$data[2]')";
            $result = mysqli_query($this->conn, $query);
        }
        fclose($cuentas);
    }

    public function importarPersonajes() {
        $personajes = fopen("Personajes.csv","r") or die("Unable to open file!"); 
        while (($data = fgetcsv($personajes)) !== false) {
            $query = "INSERT INTO Personaje (nombre, energia, correocuenta, vida, daño) VALUES ('$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]')";
            $result = mysqli_query($this->conn, $query);
        }
        fclose($personajes);
    }

    public function importarPoderes(){
        $poderes = fopen("Poderes.csv","r") or die("Unable to open file!"); 
        while (($data = fgetcsv($poderes)) !== false) {
            $query = "INSERT INTO Poder (nombrePoder, daño, coste, descripcion) VALUES ('$data[0]', '$data[1]', '$data[2]', '$data[3]')";
            $result = mysqli_query($this->conn, $query); 
        }
        fclose($poderes);
    }

    public function borrar() {
        $query1 = "DELETE FROM Personaje";
        $query2 = "DELETE FROM Poder";
        $query3 = "DELETE FROM Cuenta";

        $result1 = mysqli_query($this->conn, $query1);
        $result2 = mysqli_query($this->conn, $query2);
        $result3 = mysqli_query($this->conn, $query3);
    }

    public function importar(){
        $this->importarCuentas();
        $this->importarPersonajes();
        $this->importarPoderes(); 
    }

    public function init() {
        $this->borrar();

        $query1 = "SELECT COUNT(*) FROM Personaje";
        $query2 = "SELECT COUNT(*) FROM Poder";
        $query3 = "SELECT COUNT(*) FROM Cuenta";
        $result1 = mysqli_query($this->conn, $query1)->fetch_row()[0];
        $result2 = mysqli_query($this->conn, $query2)->fetch_row()[0];
        $result3 = mysqli_query($this->conn, $query3)->fetch_row()[0];
        
        if ($result1 == 0 && $result2 == 0 && $result3 == 0) {
            $this->importar();
        }
    }
}
?>


