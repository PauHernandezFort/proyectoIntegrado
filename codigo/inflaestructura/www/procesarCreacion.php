<?php

    $conexion = new Connecrion;
   $nombre = $_POST["nombre"];
   $danio = $_POST["danio"];
   $energia = $_POST["energia"];
   $vida = $_POST["vida"];
   $poder1 = $_POST["poder1"];
   $poder2 = $_POST["poder2"];
   $poder3 = $_POST["poder3"];
   $correo = $usuario = $_COOKIE['correo'];
   
   public function insertarPersonaje($nombre,$correo,$daño,$energia,$salud,$poder1,$poder2,$poder3){
    $sql = "INSERT INTO `Personaje`(`nombre`, `energia`, `correocuenta`, `vida`, `daño`) VALUES ('$nombre','$energia','$correo','$salud','$daño')";
    $result = $this->conn->query($sql);
    $sql2 = "INSERT INTO `PersonajePoder`(`nombrePersonaje`, `nombrePoder`) VALUES ('$nombre','$poder1')";
    $result = $this->conn->query($sql2);
    $sql3 = "INSERT INTO `PersonajePoder`(`nombrePersonaje`, `nombrePoder`) VALUES ('$nombre','$poder2')";
    $result = $this->conn->query($sql3);
    $sql4 = "INSERT INTO `PersonajePoder`(`nombrePersonaje`, `nombrePoder`) VALUES ('$nombre','$poder3')";
    $result = $this->conn->query($sql4);
}

?>