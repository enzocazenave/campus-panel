<?php
    $error = null;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        if (empty($username) || empty($password)) {
            $error = "Please fill all the fields.";
        } else {
            require "databases/users_db.php";

            $statement = $users_db->prepare("SELECT * FROM users WHERE username = :username LIMIT 1");
            $statement->bindParam(":username", $username);
            $statement->execute();

            if ($statement->rowCount() > 0) {
                $error = "El usuario ya existe";
            } else {
                $users_db
                    ->prepare("INSERT INTO users (username, password) VALUES(:username, :password)")
                    ->execute([
                        ":username" => $username,
                        ":password" => password_hash($password, PASSWORD_DEFAULT),
                    ]);


                $statement = $users_db->prepare("SELECT * FROM users WHERE username = :username LIMIT 1");
                $statement->bindParam(":username", $username);
                $statement->execute();
                $user = $statement->fetch(PDO::FETCH_ASSOC);

                session_start();

                unset($user["password"]);
                $_SESSION["user"] = $user;
                
                $id = $_SESSION["user"]["id"];

                header("Location: panel/add_info.php?id=$id");
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

    <link rel="stylesheet" href="css/register.css">
</head>
<body>
    <form method="POST">
        <h2>Crea tu cuenta</h2>
        <input name="username" placeholder="Usuario" type="text">
        <input name="password" placeholder="Contraseña" type="password">
        <input id="createAccountButton" type="submit" value="Crear cuenta">
        <p>Si ya tienes una cuenta, <a href="login.php">inicia sesion</a>.</p>
    </form>
</body>
</html>