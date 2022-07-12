<?php
    $host = "localhost";
    $database = "campus";
    $user = "root";
    $password = "";

    try {
        $usersDB = new PDO("mysql:host=$host;dbname=$database", $user, $password);
    } catch (PDOException $e) {
        die("PDO Connection Error: " . $e ->getMessage());
    }
?>