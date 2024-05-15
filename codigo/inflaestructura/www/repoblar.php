<?php
require_once "autoloader.php";
$conexion = new Connection();

function cuenta($conexion){
$fichero = 'cuenta.csv'; 
$gestor = fopen($fichero, "r");

if ($gestor !== false) {
    while (($element = fgetcsv($gestor)) !== false) {
        $query = "INSERT INTO Cuenta (correo, contraseña, nombre) VALUES (?, ?, ?)";
        $statement = $conexion->getConn()->prepare($query);

        if ($statement !== false) {
            $correo = $element[0];
            $contraseña = $element[1];
            $securePassword= password_hash($contraseña, PASSWORD_DEFAULT);
            $nombre = $element[2];

            $statement->bind_param("sss", $correo, $securePassword, $nombre);
            $statement->execute();
        }
    }
    fclose($gestor); 
} else {
    echo "Failed to open file.";
}
}


?>
