<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["contrasena"];

    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND contrasena = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION["user"] = $email;
        if (!isset($_SESSION["id"])) {
            session_regenerate_id();
            $_SESSION["id"] = session_id();
        }
        header("Location: inicio.php");
        exit();
    } else {
        echo "Usuario o contraseña incorrectos";
    }
}