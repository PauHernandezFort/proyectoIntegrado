<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Nuevo Poder</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
<style>
    body {
        background-image: url('fondo.jpeg');
        background-color: #000;
        color: #00FF00;
        font-family: 'Press Start 2P', cursive;
    }
    #form_container {
        background-color: #a07474;
        padding: 20px;
        border-radius: 5px;
        margin: 50px auto;
        max-width: 400px;
        border: 1px solid #444;
    }
    h1 {
        text-align: center;
        color: #FFD700;
    }
    .form-description {
        margin-bottom: 20px;
    }
 
    label[for="nombrePoder"] {
        color: #FF6347; 
    }
    label[for="daño"] {
        color: #00CED1; 
    }
    label[for="coste"] {
        color: #FFD700; 
    }
    label[for="descripcion"] {
        color: #00FF7F;
    }
</style>
</head>
<body id="main_body">
    <div id="form_container">
        <h1>Nuevo Poder</h1>
        <form class="appnitro" method="post" action="procesarPoder.php">
            <div class="form-description">
                <p>¡Prepara tu mejor ataque!</p>
            </div>
            <div class="form-group">
                <label for="nombrePoder">Nombre del Poder</label>
                <input name="nombrePoder" class="form-control" type="text" maxlength="255" value="">
            </div>
            <div class="form-group">
                <label for="daño">Daño</label>
                <input name="daño" class="form-control" type="number">
            </div>
            <div class="form-group">
                <label for="coste">Coste</label>
                <input name="coste" class="form-control" type="number">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <input name="descripcion" class="form-control" type="text">
            </div>
            <div class="form-group">
                <input type="hidden" name="id" value="12028">
                <input class="btn btn-primary" type="submit" name="submit" value="¡A la Batalla!">
            </div>
        </form>
    </div>
</body>
</html>