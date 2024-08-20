<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Productos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Jersey+10&family=Playwrite+HR+Lijeva:wght@100..400&family=Raleway:ital,wght@0,604;1,604&family=Rock+Salt&display=swap" rel="stylesheet">


  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Playwrite+HR+Lijeva:wght@100..400&family=Raleway:ital,wght@0,604;1,604&family=Rock+Salt&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="estilos/styles.css">
</head>
<body>

<header>
        <nav>
            <ul>
                <h2 id="logo">BlazeSports</h2>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="productos.php">Productos</a></li>
                <li><a href="contacto.php">Contacto</a></li>

                <?php if ($_SESSION['username'] == "Invitado"): ?>
                    <li><a href="login.php"><button>Iniciar Sesión</button></a></li>
                    <li><a href="registro.php"><button>Registrarse</button></a></li>
                <?php else: ?>
                    <li><a href="logout.php"><button>Cerrar Sesión</button></a></li>
                <?php endif; ?>
                
                <li>
                <a href="#carrito-container" class="btn btn-primary">🛒 Carrito (<span id="cart-count">0</span>)</a>
            </li>
            </ul>
        </nav>
    </header>

<main>
    <div class="container no-margin">
        <h1>Contáctanos</h1>
        <p>¡Síguenos en nuestras redes sociales!</p>
        <div class="social-buttons">
            <a href="https://www.instagram.com" target="_blank" class="social-button instagram">
                <img src="img/instagram (1).png" alt="Instagram">
            </a>
            <a href="https://twitter.com" target="_blank" class="social-button twitter">
                <img src="img/gorjeo.png" alt="Twitter">
            </a>
            <a href="https://www.facebook.com" target="_blank" class="social-button facebook">
                <img src="img/facebook.png" alt="Facebook">
            </a>
        </div>

        <div class="row">
            <div class="container no-margin">
                <h3>Información de Contacto</h3>
                <p><strong>Dirección:</strong>Av. Bartolomé Mitre 1532, B1870 Avellaneda, Provincia de Buenos Aires</p>
                <p><strong>Teléfono:</strong> +123 456 7890</p>
                <p><strong>Email:</strong> contacto@blazesports.com</p>
                <p><strong>Horario de Atención:</strong> Lunes a Viernes, 9:00 AM - 6:00 PM</p>
            </div>
            <div class="col-md-6">
                <h3>Formulario de Contacto</h3>
                <form action="enviar_mensaje.php" method="POST">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre Completo:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="mensaje" class="form-label">Mensaje:</label>
                        <textarea class="form-control" id="mensaje" name="mensaje" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-12">
                <h3>Ubicación</h3>
                <p>Nos encontramos en el corazón de Avellaneda.</p>
                <iframe src="https://www.google.com/maps/place/All+Sports/@-34.6658402,-58.3559785,16z/data=!4m6!3m5!1s0x95bccacbd2e6d01d:0xfce4260e65d1c9c!8m2!3d-34.666352!4d-58.356987!16s%2Fg%2F1wd3x76t?entry=ttu" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</main>

<footer>
<div class="social-buttons">
            <a href="https://www.instagram.com" target="_blank" class="social-button instagram">
                <img src="img/instagram (1).png" alt="Instagram">
            </a>
            <a href="https://twitter.com" target="_blank" class="social-button twitter">
                <img src="img/gorjeo.png" alt="Twitter">
            </a>
            <a href="https://www.facebook.com" target="_blank" class="social-button facebook">
                <img src="img/facebook.png" alt="Facebook">
            </a>
        </div>
<p><strong>Dirección:</strong>Av. Bartolomé Mitre 1532, B1870 Avellaneda, Provincia de Buenos Aires</p>
                <p><strong>Teléfono:</strong> +123 456 7890</p>
                <p><strong>Email:</strong> contacto@blazesports.com</p>
                <p><strong>Horario de Atención:</strong> Lunes a Viernes, 9:00 AM - 6:00 PM</p>
    <?php if ($_SESSION['username'] === "Invitado"): ?>
        <a href="login.php">Iniciar Sesión</a> | 
        <a href="registro.php">Registrarse</a> | 
    <?php else: ?>
        <a href="logout.php">Cerrar Sesión</a>
    <?php endif; ?>
    <p>&copy; 2024 BlazeSports. Todos los derechos reservados.</p>
</footer>

</body>
</html>
