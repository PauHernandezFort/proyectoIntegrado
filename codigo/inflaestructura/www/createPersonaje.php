<?php 
require_once 'autoloader.php';

$poderes = array("Poder1", "Poder2", "Poder3","poder4");

if(isset($_COOKIE['correo'])) {
    $usuario = $_COOKIE['correo'];
    echo "El valor de la cookie 'usuario' es: " . $usuario;
} else {
    echo "Error inesperado, vuelve a iniciar sesión";
}
?>

<!DOCTYPE html >
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Crear Personaje</title>
</head>
<body>

<h2>Crear Personaje</h2>
<h3> Puntos disponibles: </h3>
<h3 id="puntos">100</h3>

<form action="procesarCreacion.php" method="POST" onsubmit="return validarFormulario()">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required><br><br>
    
    <label for="danio">Daño:</label>
    <input type="number" id="danio" name="danio" value="0" min="0" step="1">
    <button type="button" onclick="incrementar('danio')">+</button>
    <button type="button" onclick="decrementar('danio')">-</button><br><br>
    
    <label for="energia">Energía:</label>
    <input type="number" id="energia" name="energia" value="0" min="0" step="1">
    <button type="button" onclick="incrementar('energia')">+</button>
    <button type="button" onclick="decrementar('energia')">-</button><br><br>
    
    <label for="vida">Vida:</label>
    <input type="number" id="vida" name="vida" value="0" min="0" step="1">
    <button type="button" onclick="incrementar('vida')">+</button>
    <button type="button" onclick="decrementar('vida')">-</button><br><br>
    
    <label for="poder1">Poder1:</label>
    <select id="poder1" name="poder1">
    </select><br><br>
    
    <label for="poder2">Poder 2:</label>
    <select id="poder2" name="poder2">
    </select><br><br>
    
    <label for="poder3">Poder 3:</label>
    <select id="poder3" name="poder3">
    </select><br><br>
    
    <input type="submit" value="Crear">
</form>

<script>
var poderes = <?php echo json_encode($poderes); ?>;

window.onload = agregarPoderes;

function incrementar(id) {
    var input = document.getElementById(id);
    var valor = parseInt(input.value);
    if (valor >= 0) {
        input.value = valor + 1;

        var puntos = document.getElementById("puntos").textContent;
        puntos = parseInt(puntos); 
        puntos = puntos - 1; 
        document.getElementById("puntos").textContent = puntos;
    }
}

function decrementar(id) {
    var input = document.getElementById(id);
    var valor = parseInt(input.value);
    if (valor > 0) { 
        input.value = valor - 1;

        var puntos = document.getElementById("puntos").textContent;
        puntos = parseInt(puntos); 
        puntos = puntos + 1; 
        document.getElementById("puntos").textContent = puntos;
    }
}

function agregarPoderes() {
    for (var i = 0; i < poderes.length; i++) {
        var option = document.createElement("option");
        option.text = poderes[i];
        option.value = poderes[i];
        
        var selectPoder1 = document.getElementById("poder1");
        var selectPoder2 = document.getElementById("poder2");
        var selectPoder3 = document.getElementById("poder3");
        
        selectPoder1.add(option.cloneNode(true));
        selectPoder2.add(option.cloneNode(true));
        selectPoder3.add(option.cloneNode(true));
    }
}

function validarFormulario() {
    var danio = parseInt(document.getElementById("danio").value);
    var energia = parseInt(document.getElementById("energia").value);
    var vida = parseInt(document.getElementById("vida").value);
    var poder1 = document.getElementById("poder1").value;
    var poder2 = document.getElementById("poder2").value;
    var poder3 = document.getElementById("poder3").value;

    if (danio + energia + vida !== 100) {
        alert("La suma de los campos de daño, energía y vida debe ser igual a 100.");
        return false;
    }

    if (poder1 === poder2 || poder1 === poder3 || poder2 === poder3) {
        alert("No puedes seleccionar el mismo poder en diferentes campos.");
        return false;
    }

    return true;
}
</script>
</body>
</html>