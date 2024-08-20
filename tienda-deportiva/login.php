<?php
session_start();
include('db.php');

if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['guest'])) {
    $_SESSION['username'] = "Invitado";
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            header("Location: index.php");
            exit();
        } else {
            echo "Contraseña incorrecta";
        }
    } else {
        echo "Usuario no encontrado";
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/login-registro.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Playwrite+HR+Lijeva:wght@100..400&family=Raleway:ital,wght@0,604;1,604&family=Rock+Salt&display=swap" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <h1>BlazeSports</h1>
    <div class="caja">
    <form method="POST" action="">
        <h2>Login</h2>
        <label>Nombre de usuario:</label><br>
        <input type="text" name="username" required><br>
        <label>Contraseña:</label><br>
        <input type="password" name="password" required><br><br>
        <input id="button" type="submit" value="Login">
    </form>
    <br>

</div>

<div class="caja">
    <p>¿No tienes una cuenta?</p>
    <a href="registro.php"><button>Registrarse</button></a>
    <p>o</p>
    <form method="post" action="login.php">
            <button type="submit" name="guest">Entrar como Invitado</button>
        </form></div>
</body>
</html>