<?php
    require_once 'autoloader.php';
    $conexion = new Connection;
   
    $daño = $_POST["daño"];
    $energia = $_POST["energia"];
    $vida = $_POST["vida"];
    $poder1 = $_POST["poder1"];
    $poder2 = $_POST["poder2"];
    $poder3 = $_POST["poder3"];
    $correo = $_COOKIE['correo'];
    $conn = $conexion->getConn();

    
    $query = "SELECT nombre FROM Personaje WHERE correocuenta='$correo'";
    $resultado = mysqli_query($conn, $query);
    $fila = $resultado->fetch_assoc();
    $nombrePersonaje = $fila['nombre'];

    $query = "SELECT nombrePoder FROM PersonajePoder WHERE nombrePersonaje='$nombrePersonaje'";
    $resultado = mysqli_query($conn, $query);
    
    $poderes = array();
    while ($fila = $resultado->fetch_assoc()) {
        $poderes[] = $fila['nombrePoder'];
    }
    
        $poder1old = $poderes[0];
        $poder2old = $poderes[1];
        $poder3old = $poderes[2];
        
    

    if($poder1 == $poder2 || $poder1 == $poder3 || $poder2 == $poder3 ){
        echo "error no se puede poner iguales";
    }else{
        
    $sql = "UPDATE Personaje SET energia='$energia', vida='$vida', daño='$daño' WHERE nombre='$nombrePersonaje' AND correocuenta='$correo'";
    $result = mysqli_query($conn, $sql);

   
    $sql2 = "UPDATE PersonajePoder SET nombrePoder='$poder1' WHERE nombrePersonaje='$nombrePersonaje' AND nombrePoder='$poder1old'";
    $result2 = mysqli_query($conn, $sql2);
    $sql3 = "UPDATE PersonajePoder SET nombrePoder='$poder2' WHERE nombrePersonaje='$nombrePersonaje' AND nombrePoder='$poder2old'";
    $result3 = mysqli_query($conn, $sql3);
    $sql4 = "UPDATE PersonajePoder SET nombrePoder='$poder3' WHERE nombrePersonaje='$nombrePersonaje' AND nombrePoder='$poder3old'";
    $result4 = mysqli_query($conn, $sql4);
    
    
    header("location: home.php");
    }
?>
