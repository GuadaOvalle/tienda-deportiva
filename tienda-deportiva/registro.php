<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro exitoso";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Playwrite+HR+Lijeva:wght@100..400&family=Raleway:ital,wght@0,604;1,604&family=Rock+Salt&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estilos/login-registro.css">

    <title>Registro</title>
</head>
<body>
    <div class="caja">
    <h2>Registro</h2>
    <form method="POST" action="">
        <label>Nombre de usuario:</label><br>
        <input type="text" name="username" required><br>
        <label>Email:</label><br>
        <input type="email" name="email" required><br>
        <label>Contraseña:</label><br>
        <input type="password" name="password" required><br><br>
        <input id="button" type="submit" value="Registrarse">
    </form></div>
    <br>
    <div class="caja">
    <p>¿Ya tienes una cuenta?</p>
    <a href="login.php"><button>Login</button></a>
    <form method="post" action="login.php">
            <button type="submit" name="guest">Entrar como Invitado</button>
        </form></div>
</body>
</html>