<?php

require_once 'autoloader.php';

$conexion = new Connection(); 
$conn = $conexion->getConn(); 

$query = "SELECT * FROM `PersonajePoder`"; 
$result = mysqli_query($conn, $query); 


$poderes = array(); 

if ($result->num_rows > 0) { 
    while ($row = mysqli_fetch_assoc($result)) {
        $poderes[] = $row;
    }
}

$arrayPoderes = []; 

foreach($poderes as $poder){
   array_push($arrayPoderes, $poder['nombrePoder']); 
}




$nombrePoder1j1 = $arrayPoderes[0];
$nombrePoder2j1 = $arrayPoderes[1];
$nombrePoder3j1 = $arrayPoderes[2];
$nombrePoder1j2 = $arrayPoderes[3];
$nombrePoder2j2 = $arrayPoderes[4];
$nombrePoder3j2 = $arrayPoderes[5];


$vidaj1 = 100;
$vidaj2 = 100;
$dañoj1 = 10;
$dañoj2 = 10;
$energiaj1 = 50;
$energiaj2 = 50;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Batalla</title>
    <style>
       body {
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
       
    }
    #container {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .barra {
        height: 10px;
        margin-bottom:30px;
    }
    #barraVerde {
        background-color: green;
        width: 50%;
        padding: 10px; 
        
       
    }

    #barraBlanca {
        flex: 1;
        background-color: white;
    }
    #barraAzul {
        background-color: blue;
        width: 50%;
        padding: 10px; 
      
    }
    #botones {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 20px;
    }
    .boton {
        padding: 10px 20px;
        background-color: #ccc;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    h3 {
    color: red; 
    text-align: left;
     display: flex;
    }
    </style>
</head>
<body>
    <div id="container">
        <div id="barraVerde" class="barra"></div>
        <div id="barraBlanca" class="barra"></div>
        <div id="barraAzul" class="barra"></div>
    </div>
    <h3 id="error"></h3>
    <h3 id="turno"></h3>
    <h3 id="pepe"></h3> <br>
    <h3 id="pepe2"></h3>

    <div id="botones">
        <div>
            <button class="boton" onclick="botonClickeado('<?php echo $nombrePoder1j1; ?>', 1)"><?php echo $nombrePoder1j1; ?></button>
            <button class="boton" onclick="botonClickeado('<?php echo $nombrePoder2j1; ?>', 1)"><?php echo $nombrePoder2j1; ?></button>
            <button class="boton" onclick="botonClickeado('<?php echo $nombrePoder3j1; ?>', 1)"><?php echo $nombrePoder3j1; ?></button>
        </div>
        <div>
            <button class="boton" onclick="botonClickeado('<?php echo $nombrePoder1j2; ?>', 2)"><?php echo $nombrePoder1j2; ?></button>
            <button class="boton" onclick="botonClickeado('<?php echo $nombrePoder2j2; ?>', 2)"><?php echo $nombrePoder2j2; ?></button>
            <button class="boton" onclick="botonClickeado('<?php echo $nombrePoder3j2; ?>', 2)"><?php echo $nombrePoder3j2; ?></button>
        </div>
    </div>

    <script>
        let vidaj1 = <?php echo $vidaj1; ?>;
        let vidaj2 = <?php echo $vidaj2; ?>;
        let dañoj1 = <?php echo $dañoj1; ?>;
        let dañoj2 = <?php echo $dañoj2; ?>;
        let energiaj1 = <?php echo $energiaj1; ?>;
        let energiaj2 = <?php echo $energiaj2; ?>;
        let turno = 1;

        function botonClickeado(poder, jugador) {
            if (poder.trim() === "<?php echo $arrayPoderes[0]; ?>") {
                fumar(turno, jugador);
                // Lógica para el poder 1
            } else if (poder.trim() === "<?php echo $arrayPoderes[1]; ?>") {
                fumar(turno, jugador);
                // Lógica para el poder 2
            } else if (poder.trim() === "<?php echo $arrayPoderes[2]; ?>") {
                fumar(turno, jugador);
                // Lógica para el poder 3
            } else if (poder.trim() === "<?php echo $arrayPoderes[3]; ?>") {
                morder(turno, jugador);
                // Lógica para el poder 4
            } else if (poder.trim() === "<?php echo $arrayPoderes[4]; ?>") {
                morder(turno, jugador);
                // Lógica para el poder 5
            } else if (poder.trim() === "<?php echo $arrayPoderes[5]; ?>") {
                morder(turno, jugador);
                // Lógica para el poder 6
        }
    }

        function cambiarTamaño(nuevo, jugador) {
            turno += 1;
            let barraVerde = document.getElementById("barraVerde");
            let barraAzul = document.getElementById("barraAzul");
            let nuevoPorcentaje = (nuevo / 2) + "%";
            if (jugador === 1) {
                barraAzul.style.width = nuevoPorcentaje;
                document.getElementById("pepe").innerHTML = vidaj2;
            } else {
                barraVerde.style.width = nuevoPorcentaje;
                document.getElementById("pepe2").innerHTML = vidaj1;
            }
        }

        function fumar(turno, jugador) {
            let dañoPoder = 5;
            if (jugador === 1) {
                if (turno % 2 === 0) {
                    document.getElementById("error").innerHTML = "No es tu turno";
                } else {
                    let daño = dañoPoder + (dañoj1 + vidaj2) * 0.30;
                    let dañoRedondeado = Math.ceil(daño);
                    vidaj2 -= dañoRedondeado;
                    let porcentaje = (vidaj2 * 100) / <?php echo $vidaj2; ?>;
                    if (vidaj2 < 0) {
                        porcentaje = 0;
                        vidaj2 = 0;
                    }
                    document.getElementById("error").innerHTML = "";
                    cambiarTamaño(porcentaje, 1);
                }
            } else {
                if (turno % 2 !== 0) {
                    document.getElementById("error").innerHTML = "No es tu turno";
                } else {
                    let daño = dañoPoder + (dañoj2 + vidaj1) * 0.30;
                    let dañoRedondeado = Math.ceil(daño);
                    vidaj1 -= dañoRedondeado;
                    let porcentaje = (vidaj1 * 100) / <?php echo $vidaj1; ?>;
                    if (vidaj1 < 0) {
                        porcentaje = 0;
                        vidaj1 = 0;
                    }
                    document.getElementById("error").innerHTML = "";
                    cambiarTamaño(porcentaje, 2);
                }
            }
        }

        function morder(turno, jugador) {
            let dañoPoder = 5;
            if (jugador === 1) {
                if (turno % 2 === 0) {
                    document.getElementById("error").innerHTML = "No es tu turno";
                } else {
                    let daño = dañoPoder + (dañoj1 + vidaj2) * 0.30;
                    let dañoRedondeado = Math.ceil(daño);
                    vidaj2 -= dañoRedondeado;
                    let porcentaje = (vidaj2 * 100) / <?php echo $vidaj2; ?>;
                    if (vidaj2 < 0) {
                        porcentaje = 0;
                        vidaj2 = 0;
                    }
                    document.getElementById("error").innerHTML = "";
                    cambiarTamaño(porcentaje, 1);
                }
            } else {
                if (turno % 2 !== 0) {
                    document.getElementById("error").innerHTML = "No es tu turno";
                } else {
                    let daño = dañoPoder + (dañoj2 + vidaj1) * 0.30;
                    let dañoRedondeado = Math.ceil(daño);
                    vidaj1 -= dañoRedondeado;
                    let porcentaje = (vidaj1 * 100) / <?php echo $vidaj1; ?>;
                    if (vidaj1 < 0) {
                        porcentaje = 0;
                        vidaj1 = 0;
                    }
                    document.getElementById("error").innerHTML = "";
                    cambiarTamaño(porcentaje, 2);
                }
            }
        }
    </script>
</body>
</html>