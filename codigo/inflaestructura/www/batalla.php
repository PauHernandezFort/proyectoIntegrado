<?php
$nombrePoder1j1 = "saco";
$nombrePoder2j1 = "fumar";
$nombrePoder3j1 = "curar";
$nombrePoder1j2 = "fumar";
$nombrePoder2j2 = "saco";
$nombrePoder3j2 = "curar";
//$jugador1= $_COOKIE['correo'];
//session_start();
//$jugador2 = $_SESSION['email'];
//echo $jugador1;
//echo $jugador2;
$vidaj1 = 140;
$vidaj2 = 160;
$dañoj1 = 18;
$dañoj2 = 14;
$energiaj1 = 60;
$energiaj2 = 60;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Batalla</title>
    <style>
         body {
         background-image: url('escenariobatalla1.jpg');
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
            margin-bottom: 30px;
            transition: width 0.5s ease;
        }
 
 #barraVerde {
    background-color: #2E8B57;
     width: 49%;
     padding: 10px; 
     
    
 }
 #barraBlanca {
     flex: 1;
     background-color: transparent;
 }
 #barraAzul {
    background-color: #483D8B;
     width: 49%;
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
        #energia1, #energia2 {
            margin: 10px;
        }
        .energia-container h5 {
    color: white;
}
    </style>
</head>
<body>
    <div id="container">
        <div id="barraVerde" class="barra"></div>
        <div id="barraBlanca" class="barra"></div>
        <div id="barraAzul" class="barra"></div>
    </div>
    <div class="energia-container">
    <h5>Energia Jugador 1: <span id="energia1"><?php echo $energiaj1; ?></span></h5>
    <h5>Energia Jugador 2: <span id="energia2"><?php echo $energiaj2; ?></span></h5>
</div>

    <h3 id="error"></h3>
    <h3 id="turno">Turno: <span id="numTurno">1</span></h3>
    <h3 id="pepe">Vida Jugador 2: <?php echo $vidaj2; ?></h3>
    <h3 id="pepe2">Vida Jugador 1: <?php echo $vidaj1; ?></h3>

    <div id="botones">
        <div>
            <button class="boton" onclick="botonClickeado('<?php echo $nombrePoder1j1; ?>', 1)"><?php echo $nombrePoder1j1; ?></button>
            <button class="boton" onclick="botonClickeado('<?php echo $nombrePoder2j1; ?>', 1)"><?php echo $nombrePoder2j1; ?></button>
            <button class="boton" onclick="botonClickeado('<?php echo $nombrePoder3j1; ?>', 1)"><?php echo $nombrePoder3j1; ?></button>
            <button class="boton" onclick="botonClickeado('saltarTurno', 1)">Saltar turno</button>
        </div>
        <div>
            <button class="boton" onclick="botonClickeado('<?php echo $nombrePoder1j2; ?>', 2)"><?php echo $nombrePoder1j2; ?></button>
            <button class="boton" onclick="botonClickeado('<?php echo $nombrePoder2j2; ?>', 2)"><?php echo $nombrePoder2j2; ?></button>
            <button class="boton" onclick="botonClickeado('<?php echo $nombrePoder3j2; ?>', 2)"><?php echo $nombrePoder3j2; ?></button>
            <button class="boton" onclick="botonClickeado( 'saltarTurno', 2)">Saltar turno</button>
        </div>
    </div>

    <script>
        let array =[];
        let vidaj1 = <?php echo $vidaj1; ?>;
        let vidaj2 = <?php echo $vidaj2; ?>;
        let dañoj1 = <?php echo $dañoj1; ?>;
        let dañoj2 = <?php echo $dañoj2; ?>;
        let energiaj1 = <?php echo $energiaj1; ?>;
        let energiaj2 = <?php echo $energiaj2; ?>;
        let turno = 1;

        function botonClickeado(poder, jugador) {
            if (jugador === 1 && turno % 2 === 1) {
                realizarAccion(poder, 1);
            } else if (jugador === 2 && turno % 2 === 0) {
                realizarAccion(poder, 2);
            } else {
                document.getElementById("error").innerText = "No es tu turno";
            }
        }

        function realizarAccion(poder, jugador) {
            if (poder === "saco") {
                saco(jugador);
            } else if (poder === "saltar") {
                // Lógica para el poder "saltar"
            } else if (poder === "curar") {
                curar(jugador);
            } else if (poder === "morder") {
                morder(jugador);
            } else if (poder === "patear") {
                // Lógica para el poder "patear"
            } else if (poder === "fumar") {
                fumar(jugador);
            } else if (pdoer= "saltarTurno"){
                saltarTurno(jugador)
            }
            document.getElementById("numTurno").innerText = turno;
        }

        function actualizarBarraVida(jugador) {
            let porcentaje;
            if (jugador === 1) {
                porcentaje = ((vidaj1 * 100) / <?php echo $vidaj1; ?>)/2;
                document.getElementById("barraVerde").style.width = porcentaje + "%";
                document.getElementById("pepe2").innerText = "Vida Jugador 1: " + vidaj1;
            } else {
                porcentaje = ((vidaj2 * 100) / <?php echo $vidaj2; ?>)/2;
                document.getElementById("barraAzul").style.width = porcentaje + "%";
                document.getElementById("pepe").innerText = "Vida Jugador 2: " + vidaj2;
            }
            comprobar()
        }

        function saco(jugador) { //este poder escla con la vida enemiga 
            let dañoPoder = 5;
            let energiaPoder = 25;
            let errorElement = document.getElementById("error");

            if (jugador === 1) {
                if (energiaj1 < energiaPoder) {
                    errorElement.innerText = "No tienes suficiente energía";
                    return;
                }
                let daño = dañoPoder + ( vidaj2 *0.3) +dañoj1/2
                let dañoRedondeado = Math.ceil(daño);
                vidaj2 -= dañoRedondeado;

                if (vidaj2 < 0) {
                    vidaj2 = 0;
                }

                energiaj1 -= energiaPoder;
                energiaj1 += 5;
                let arrayTurno= ['saco',1,dañoRedondeado,energiaPoder];
                array.push(arrayTurno);
                document.getElementById("energia1").innerText = energiaj1;
                actualizarBarraVida(2);
            } else {
                if (energiaj2 < energiaPoder) {
                    errorElement.innerText = "No tienes suficiente energía";
                    return;
                }
                let daño = dañoPoder + ( vidaj1 *0.3) +dañoj2/2
                let dañoRedondeado = Math.ceil(daño);
                vidaj1 -= dañoRedondeado;

                if (vidaj1 < 0) {
                    vidaj1 = 0;
                }

                energiaj2 -= energiaPoder;
                energiaj2 += 5;
                document.getElementById("energia2").innerText = energiaj2;
                let arrayTurno= ['saco',2,dañoRedondeado,energiaPoder];
                array.push(arrayTurno);
                actualizarBarraVida(1);
            }

            errorElement.innerText = "";
            turno++;
        }
        function morder(jugador) { //este poder hace mucho daño que escala con tu daño y tu vida
            let dañoPoder = 25;
            let energiaPoder = 30;
            let errorElement = document.getElementById("error");

            if (jugador === 1) {
                if (energiaj1 < energiaPoder) {
                    errorElement.innerText = "No tienes suficiente energía";
                    return;
                }
                let daño = (dañoPoder +(dañoj1/2)+(vidaj1/6));
                let dañoRedondeado = Math.ceil(daño);
                vidaj2 -= dañoRedondeado;

                if (vidaj2 < 0) {
                    vidaj2 = 0;
                }
                energiaj1 -= energiaPoder;
                energiaj1 += 5;
                let arrayTurno= ['morder',1,dañoRedondeado,energiaPoder];
                array.push(arrayTurno);
                document.getElementById("energia1").innerText = energiaj1;
                actualizarBarraVida(2);
            } else {
                if (energiaj2 < energiaPoder) {
                    errorElement.innerText = "No tienes suficiente energía";
                    return;
                }
                let daño = (dañoPoder +(dañoj1/2)+(vidaj1/6));
                let dañoRedondeado = Math.ceil(daño);
                vidaj1 -= dañoRedondeado;

                if (vidaj1 < 0) {
                    vidaj1 = 0;
                }

                energiaj2 -= energiaPoder;
                energiaj2 += 5;
                document.getElementById("energia2").innerText = energiaj2;
                let arrayTurno= ['morder',2,dañoRedondeado,energiaPoder];
                array.push(arrayTurno);
                actualizarBarraVida(1);
            }

            errorElement.innerText = "";
            turno++;
        }
    function curar(jugador) {  //este podcer te cura vida segun tu vida maxima
    let energiaPoder = 30;
    let errorElement = document.getElementById("error");

    if (jugador === 1) {
        if (energiaj1 < energiaPoder) {
            errorElement.innerText = "No tienes suficiente energía";
            return;
        }
        let cura = 15 + (vidaj1 * 0.16);
        let curarRedondeado = Math.ceil(cura);
        vidaj1 += curarRedondeado;
        if(vidaj1 > <?php echo $vidaj1;?>){
            vidaj1 = <?php echo $vidaj1;?>
        }
        energiaj1 -= energiaPoder;
        energiaj1 += 5;
        let arrayTurno = ['curar', 1, 0, energiaPoder];
        array.push(arrayTurno);
        document.getElementById("energia1").innerText = energiaj1;
        actualizarBarraVida(1);
    } else {
        if (energiaj2 < energiaPoder) {
            errorElement.innerText = "No tienes suficiente energía";
            return;
        }
        let cura = 15 + (vidaj2 * 0.16);
        let curarRedondeado = Math.ceil(cura);
        vidaj2 += curarRedondeado;
        if(vidaj2 > <?php echo $vidaj2;?>){
            vidaj2 = <?php echo $vidaj2;?>
        }
        energiaj2 -= energiaPoder;
        energiaj2 += 5;
        let arrayTurno = ['curar', 2, 0, energiaPoder];
        array.push(arrayTurno);
        document.getElementById("energia2").innerText = energiaj2;
        actualizarBarraVida(2);
    }

    errorElement.innerText = "";
    turno++;
}
    function fumar(jugador) {  
        let energiaPoder = 5;      
        let dañoPoder = 10;
        let errorElement = document.getElementById("error");

        if (jugador === 1) {
            if (energiaj1 < energiaPoder) {
                errorElement.innerText = "No tienes suficiente energía";
                return;
            }
            let sumaEnergia = (<?php echo $energiaj1; ?> * 0.25) + 5;
            let vidaPerdida = <?php echo $vidaj1; ?> * 0.25; 
            energiaj1 += sumaEnergia;
            vidaj1 -= vidaPerdida;
            vidaj2 -= dañoPoder;
            energiaj1 -= energiaPoder;
            energiaj1 += 5;

            let arrayTurno = ['fumar', 1, dañoPoder, energiaPoder];
            array.push(arrayTurno);

            document.getElementById("energia1").innerText = energiaj1;
            actualizarBarraVida(1);
            actualizarBarraVida(2);
        } else {
            if (energiaj2 < energiaPoder) {
                errorElement.innerText = "No tienes suficiente energía";
                return;
            }
            let sumaEnergia = (<?php echo $energiaj2; ?> * 0.25) + 5;
            let vidaPerdida = <?php echo $vidaj2; ?> * 0.25; 
            energiaj2 += sumaEnergia;
            vidaj2 -= vidaPerdida;
            vidaj1 -= dañoPoder;
            energiaj2 -= energiaPoder;
            energiaj2 += 5;

            let arrayTurno = ['fumar', 2, dañoPoder, energiaPoder];
            array.push(arrayTurno);

            document.getElementById("energia2").innerText = energiaj2;
            actualizarBarraVida(2);
            actualizarBarraVida(1);
        }

        errorElement.innerText = "";
        turno++;
    }


function saltarTurno(jugador) {
    if (jugador === 1) {
        energiaj1 += 10; 
        document.getElementById("energia1").innerText = energiaj1; 
    } else {
        energiaj2 += 10; 
        document.getElementById("energia2").innerText = energiaj2; 
    }

    turno++; 
    let arrayTurno= ['saltarTurno',jugador,0,0];
    array.push(arrayTurno);
    document.getElementById("numTurno").innerText = turno; 
}   
function comprobar() {
    let botonesDiv = document.getElementById("botones");

    if (vidaj1 <= 0) {
        botonesDiv.innerHTML = "";
        let nuevoBoton = document.createElement("button");
        nuevoBoton.innerText = "¡Jugador 2 Gana!";
        nuevoBoton.className = "boton";
        nuevoBoton.onclick = function() {
            let arrayJSON = encodeURIComponent(JSON.stringify(array));
            window.location.href = "registrarBatalla.php?ganador=Jugador2&array=" + arrayJSON;
        };
        botonesDiv.appendChild(nuevoBoton);
    }

    if (vidaj2 <= 0) {
        botonesDiv.innerHTML = "";
        let nuevoBoton = document.createElement("button");
        nuevoBoton.innerText = "¡Jugador 1 Gana!";
        nuevoBoton.className = "boton";
        nuevoBoton.onclick = function() {
            let arrayJSON = encodeURIComponent(JSON.stringify(array));
            window.location.href = "registrarBatalla.php?ganador=Jugador1&array=" + arrayJSON;
        };
        botonesDiv.appendChild(nuevoBoton);
    }
}



</script>