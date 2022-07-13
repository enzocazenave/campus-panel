<?php
    $id = $_GET["id"];
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Campus</title>

    <link rel="stylesheet" href="../css/panel/add_info.css">
</head>
<body>
    <form method="POST">
        <h2>Agregar información</h2>

        <input name="name" placeholder="Nombre" type="text">
        <input name="surname" placeholder="Apellido" type="text">
        <input name="university" placeholder="Universidad" type="text">
        <input name="file_number" placeholder="Número de legajo" type="number">
        <input name="career" placeholder="Carrera" type="text">
        <input name="subjects" placeholder="Materias aprobadas" type="number">
        <input name="total_subjects" placeholder="Cantidad total de materias" type="number">

        <input id="createAccountButton" type="submit" value="Agregar información">
    </form>
</body>
</html>