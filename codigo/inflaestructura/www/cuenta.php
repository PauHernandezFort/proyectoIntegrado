<?php
require_once "autoloader.php";
$conexion = new Connection();
$fichero = 'cuenta.csv'; 
$gestor = fopen($fichero, "r");

if ($gestor !== false) {
    while (($element = fgetcsv($gestor)) !== false) {
        $query = "INSERT INTO Cuenta (correo, contraseña, nombre) VALUES (?, ?, ?)";
        $statement = $conexion->getConn()->prepare($query);

        if ($statement !== false) {
            $correo = $element[0];
            $contraseña = $element[1];
            $nombre = $element[2];

            $statement->bind_param("sss", $correo, $contraseña, $nombre);
            $statement->execute();
        }
    }
    fclose($gestor); 
} else {
    echo "Failed to open file.";
}

?>
