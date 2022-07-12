<?php
    $error = null;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        if (empty($username) || empty($password)) {
            $error = "Por favor completa todos los campos";
        } else {
            require "databases/usersDB.php";

            $statement = $usersDB->prepare("SELECT * FROM users WHERE username = :username LIMIT 1");
            $statement->bindParam(":username", $username);
            $statement->execute();

            if ($statement->rowCount() == 0) {
                $error = "Credenciales inválidas";
            } else {
                $user = $statement->fetch(PDO::FETCH_ASSOC);
                
                if (!password_verify($password, $user["password"])) {
                    $error = "Credenciales inválidas";
                } else {
                    session_start();

                    unset($user["password"]);
                    $_SESSION["user"] = $user;

                    header("Location: panel/panel.php");
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Campus</title>

    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <form method="POST">
        <h2>Inicia sesión</h2>
        <input name="username" placeholder="Usuario" type="text">
        <input name="password" placeholder="Contraseña" type="password">
        <input id="loginAccountButton" type="submit" value="Iniciar sesión">
        <p>Si no tienes una cuenta, <a href="register.php">crea una</a>.</p>
    </form>
</body>
</html>