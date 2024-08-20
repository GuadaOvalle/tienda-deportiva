<?php
session_start();
if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])) {
    header("Location: productos.php"); // Redirigir si el carrito está vacío
    exit;
}

// Aquí podrías agregar la lógica para procesar el formulario de checkout
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<header>
    <nav>
        <ul>
            <h2>BlazeSports</h2>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="productos.php">Productos</a></li>
            <li><a href="contacto.php">Contacto</a></li>

            <?php if ($_SESSION['username'] == "Invitado"): ?>
                <li><a href="login.php"><button>Iniciar Sesión</button></a></li>
                <li><a href="registro.php"><button>Registrarse</button></a></li>
            <?php else: ?>
                <li><a href="logout.php"><button>Cerrar Sesión</button></a></li>
            <?php endif; ?>
            
            <!-- Botón de carrito -->
            <li>
                <a href="#carrito-container" class="btn btn-primary">🛒 Carrito (<span id="cart-count">0</span>)</a>
            </li>
        </ul>
    </nav>
</header>

<main>
    <div class="container mt-5">
        <h1>Finalizar Compra</h1>
        <form method="POST" action="procesar_checkout.php">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre Completo</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="direccion" class="form-label">Dirección de Envío</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="tel" class="form-control" id="telefono" name="telefono">
                    </div>
                </div>
                <div class="col-md-6">
                    <h3>Resumen del Pedido</h3>
                    <ul id="resumen-pedido" class="list-group">
                        <?php
                        $total = 0;
                        foreach ($_SESSION['carrito'] as $item) {
                            $subtotal = $item['precio'] * $item['cantidad'];
                            $total += $subtotal;
                            echo "<li class='list-group-item'>";
                            echo htmlspecialchars($item['nombre']) . " - $" . number_format($item['precio'], 2) . " x " . htmlspecialchars($item['cantidad']) . " = $" . number_format($subtotal, 2);
                            echo "</li>";
                        }
                        ?>
                    </ul>
                    <h4 class="mt-3">Total: $<?php echo number_format($total, 2); ?></h4>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Realizar Pedido</button>
        </form>
    </div>
</main>

<footer>
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
