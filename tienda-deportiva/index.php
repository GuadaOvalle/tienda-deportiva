<?php
session_start();
include('db.php');

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}


$sql = "SELECT * FROM productos LIMIT 4";
$result = $conn->query($sql);

$sql_ofertas = "SELECT * FROM productos WHERE oferta = TRUE LIMIT 4";
$result_ofertas = $conn->query($sql_ofertas);


$suscriptores = $conn->query("SELECT email FROM suscriptores");

if ($suscriptores->num_rows > 0) {
    while ($row = $suscriptores->fetch_assoc()) {
        $to = $row['email'];
        $subject = "Nuevo Producto en Oferta";
        $message = "Hola,\n\nTe informamos que un nuevo producto con oferta ha sido agregado a nuestra tienda. ¡No te lo pierdas!\n\nSaludos,\nBlazeSports";
        $headers = "From: no-reply@blazesports.com";

        mail($to, $subject, $message, $headers);
    }
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Playwrite+HR+Lijeva:wght@100..400&family=Raleway:ital,wght@0,604;1,604&family=Rock+Salt&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Jersey+10&family=Playwrite+HR+Lijeva:wght@100..400&family=Raleway:ital,wght@0,604;1,604&family=Rock+Salt&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estilos/styles.css">


    <title>BlazeSports</title>
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

    <div class="hero">
        <div class="hero-contenido">
            <h3>Bienvenido/a, <?php echo $_SESSION['username']; ?>!</h3>
            <h1>Equipando tu pasión deportiva</h1>
            <a href="#destacados"><button id="button">Explorar</button></a>
        </div>
    </div>

    
    <section id="destacados">
        <h2>Productos Destacados</h2>
    <h3>Tu destino online para los mejores productos deportivos</h3>
    <div class="productos-container">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="producto">';
                echo '<h3>' . htmlspecialchars($row["nombre"]) . '</h3>';
                echo '<p>Stock: ' . htmlspecialchars($row["stock"]) . '</p>';
                echo '<p>' . htmlspecialchars($row["descripcion"]) . '</p>';
                echo '<p>Precio: $' . htmlspecialchars($row["precio"]) . '</p>';
                echo '</div>';
            }
        } else {
            echo "<p>No se encontraron productos con los filtros aplicados.</p>";
        }
        ?>
    </div>
    <a href="productos.php" class="ver-mas">Ver más</a>
</section>


<section id="ofertas">
    <h2>Ofertas Especiales de la Semana</h2>
    <p>No te pierdas nuestras ofertas limitadas en una selección especial de productos. ¡Solo por tiempo limitado!</p>
    <div class="productos-container">
        <?php
        include('db.php');

        $sql_ofertas = "SELECT nombre, descripcion, precio, precio_anterior FROM productos WHERE en_oferta = TRUE LIMIT 4";
        $result_ofertas = $conn->query($sql_ofertas);

        if ($result_ofertas->num_rows > 0) {
            while($row = $result_ofertas->fetch_assoc()) {
                echo '<div class="producto">';
                echo '<h3>' . htmlspecialchars($row["nombre"]) . '</h3>';
                echo '<p>' . htmlspecialchars($row["descripcion"]) . '</p>';

                if (!empty($row["precio_anterior"]) && $row["precio_anterior"] > $row["precio"]) {
                    echo '<del style="color: grey;">$' . htmlspecialchars($row["precio_anterior"]) . '</del>';
                }

                echo '<p>Precio con oferta: $' . htmlspecialchars($row["precio"]) . '</p>';
                echo '</div>';
            }
        } else {
            echo "<p>No hay ofertas especiales disponibles en este momento.</p>";
        }
        ?>
    </div>
</section>




    <section id="suscripcion">
    <form method="POST" action="suscribir.php">
    <label for="email"><h2>¡Suscríbete a Nuestro Boletín!</h2></label>
    <p>Recibe las últimas noticias, ofertas exclusivas y consejos deportivos directamente en tu correo electrónico.</p>
    <input type="email" name="email" id="email" required><br>
    <button type="submit">Suscribirse</button>
</form>

    </section>

    <section id="testimonios">
    <h2>Lo que dicen nuestros clientes</h2>
   
    <div class="testimonio">
        <b>Sofia G.</b>
        <p>"He comprado varios productos de entrenamiento y siempre me sorprende la calidad. La atención al cliente es excelente, siempre dispuestos a ayudar con cualquier consulta. ¡Definitivamente seguiré comprando aquí!"</p>
    </div>

    <div class="testimonio">
        <b>Juan O.</b>
        <p>"Encontré todo lo que necesitaba para armar mi gimnasio en casa. Los precios son competitivos y la entrega fue rápida. ¡Recomiendo esta tienda a todos los deportistas!"</p>
    </div>

    <div class="testimonio">
        <b>Guadalupe O.</b>
        <p>"Soy fanática del running y aquí encontré las mejores zapatillas a un precio increíble. Además, siempre tienen ofertas especiales que no puedo resistir. ¡Muy contenta con mis compras!"</p>
    </div>

    <div class="testimonio">
        <b>Dante P.</b>
        <p>"Llevo meses comprando en esta tienda y nunca he tenido problemas. Los productos son de primera calidad, y el proceso de compra es súper sencillo. ¡Un 10/10 en mi experiencia!"</p>
    </div>
</section>


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
<script src="carrito.js"></script>
</html>