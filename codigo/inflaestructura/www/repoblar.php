<?php
require_once "autoloader.php";
$conexion = new Connection();

function importar($conexion) {
    $ficheros = ["cuenta.csv", "personajes.csv", "poderes.csv"];

    foreach ($ficheros as $fichero) {
        $gestor = fopen($fichero, "r");
        
        if ($gestor !== false) {
            switch ($fichero) {
                case "cuenta.csv":
                    importarCuentas($gestor, $conexion);
                    break;
                case "personajes.csv":
                    importarPersonajes($gestor, $conexion);
                    break;
                case "poderes.csv":
                    importarPoderes($gestor, $conexion);
                    break;
                default:
                    echo "Archivo no reconocido: $fichero";
                    break;
            }

            fclose($gestor);//preuba
        } else {
            echo "Fallo al abrir el fichero: $fichero";
        }
    }
}

function importarCuentas($gestor, $conexion) {
    while (($element = fgetcsv($gestor)) !== false) {
        $query = "INSERT INTO Cuenta (correo, contraseña, nombre) VALUES (?, ?, ?)";
        $statement = $conexion->getConn()->prepare($query);

        if ($statement !== false) {
            $correo = $element[0];
            $contraseña = $element[1];
            $securePassword = password_hash($contraseña, PASSWORD_DEFAULT);
            $nombre = $element[2];

            $statement->bind_param("sss", $correo, $securePassword, $nombre);
            $statement->execute();
        }
    }
}

function importarPersonajes($gestor, $conexion) {
    while (($element = fgetcsv($gestor)) !== false) {
        $query = "INSERT INTO Personaje (nombre, energia, correocuenta, vida, daño) VALUES (?, ?, ?, ?, ?)";
        $statement = $conexion->getConn()->prepare($query);

        if ($statement !== false) {
            $statement->bind_param("ssssi", $element[0], $element[1], $element[2], $element[3], $element[4]);
            $statement->execute();
        }
    }
}

function importarPoderes($gestor, $conexion) {
    while (($element = fgetcsv($gestor)) !== false) {
        $query = "INSERT INTO Poder (nombrePoder, daño, coste) VALUES (?, ?, ?)";
        $statement = $conexion->getConn()->prepare($query);

        if ($statement !== false) {
            $statement->bind_param("sii", $element[0], $element[1], $element[2]);
            $statement->execute();
        }
    }
}

function borrar($conexion) {
    $query1 = "DELETE FROM Personaje";
    $query2 = "DELETE FROM Poder";
    $query3 = "DELETE FROM Cuenta";

    $result1 = $conexion->getConn()->query($query1);
    $result2 = $conexion->getConn()->query($query2);
    $result3 = $conexion->getConn()->query($query3);
}

function init($conexion) {
    borrar($conexion);

    $query1 = "SELECT COUNT(*) FROM Personaje";
    $query2 = "SELECT COUNT(*) FROM Poder";
    $query3 = "SELECT COUNT(*) FROM Cuenta";
    $result1 = $conexion->getConn()->query($query1)->fetch_row()[0];
    $result2 = $conexion->getConn()->query($query2)->fetch_row()[0];
    $result3 = $conexion->getConn()->query($query3)->fetch_row()[0];
    
    if ($result1 == 0 && $result2 == 0 && $result3 == 0) {
        importar($conexion);
    }

}

init($conexion);
?>

