<?php
    session_start();

    if (!isset($_SESSION["user"])) {
        header("Location: ../index.html");
        return;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Campus</title>

    <script defer src="https://kit.fontawesome.com/8bb0facd32.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/panel/panel.css">
</head>
<body>
    <div class="card">
        <i class="fas fa-user-circle"></i>
        <div class="card__credentials">
            <p>NOMBRE: <a>Enzo</a></p>
            <p>APELLIDO: <a>Cazenave</a></p>
            <p>UNIVERSIDAD: <a>UADE</a></p>
            <p>N DE LEGAJO: <a>116321</a></p>
            <p>CARERA: <a>Ingeniería en informática</a></p>
            <p>MATERIAS: <a>4/64</a></p>
        </div>
        <a id="card__buttons" href="logout.php">Cerrar sesión</a>
        <a id="card__buttons" href="edit_info.html">Editar informacion</a>
        <a id="card__buttons" href="subjects.html">Ver materias</a>
    </div>
</body>
</html>