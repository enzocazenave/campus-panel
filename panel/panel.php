<?php
    session_start();

    if (!isset($_SESSION["user"])) {
        header("Location: ../index.html");
        return;
    }

    require "../databases/users_db.php";

    $id = $_SESSION["user"]["id"];

    $statement = $users_db->prepare("SELECT * FROM users_info WHERE id = :id LIMIT 1");
    $statement->bindParam(":id", $id);
    $statement->execute();

    $user = $statement->fetch(PDO::FETCH_ASSOC);
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
            <p>NOMBRE: <a><?= $user["name"] ?></a></p>
            <p>APELLIDO: <a><?= $user["surname"] ?></a></p>
            <p>UNIVERSIDAD: <a><?= $user["university"] ?></a></p>
            <p>N DE LEGAJO: <a><?= $user["file_number"] ?></a></p>
            <p>CARERA: <a><?= $user["career"] ?></a></p>
            <p>MATERIAS: <a><?= $user["subjects"] ?>/<?= $user["total_subjects"] ?></a></p>
        </div>
        
        <a id="card__buttons" href="logout.php">Cerrar sesión</a>
        <a id="card__buttons" href="edit_info.html">Editar informacion</a>
        <a id="card__buttons" href="subjects.html">Ver materias</a>
    </div>
</body>
</html>