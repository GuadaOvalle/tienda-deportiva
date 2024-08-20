<?php
session_start();
include('db.php');

if (!isset($_SESSION['carrito'])) {
  $_SESSION['carrito'] = [];
}

$filtro_precio = isset($_GET['precio']) ? $_GET['precio'] : '';
$filtro_popularidad = isset($_GET['popularidad']) ? $_GET['popularidad'] : '';
$filtro_categoria = isset($_GET['categoria']) ? $_GET['categoria'] : '';
$filtro_disponible = isset($_GET['disponible']) ? $_GET['disponible'] : '';
$orden = isset($_GET['orden']) ? $_GET['orden'] : '';

$sql = "SELECT id, nombre, descripcion, precio, precio_anterior, en_oferta, stock FROM productos WHERE 1=1";

if ($filtro_precio != '') {
  $sql .= " AND precio <= $filtro_precio";
}
if ($filtro_popularidad != '') {
  $sql .= " AND popularidad >= $filtro_popularidad";
}
if ($filtro_categoria != '') {
  $sql .= " AND categoria = '$filtro_categoria'";
}
if ($filtro_disponible == 'en_stock') {
  $sql .= " AND stock > 0";
} elseif ($filtro_disponible == 'sin_stock') {
  $sql .= " AND stock = 0";
}

if ($orden == 'precio_asc') {
  $sql .= " ORDER BY precio ASC";
} elseif ($orden == 'precio_desc') {
  $sql .= " ORDER BY precio DESC";
} elseif ($orden == 'popularidad') {
  $sql .= " ORDER BY popularidad DESC";
}

$result = $conn->query($sql);
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
    <h1>Todos los Productos</h1>

    <form method="GET" action="productos.php">
      <div class="row">
        <div class="col-md-3">
          <label for="precio">Precio Máximo:</label>
          <input type="number" name="precio" id="precio" class="form-control" value="<?php echo htmlspecialchars($filtro_precio); ?>">
        </div>
        <div class="col-md-3">
          <label for="categoria">Categoría:</label>
          <select name="categoria" id="categoria" class="form-control">
            <option value="">Todas</option>
            <option value="calzado" <?php echo $filtro_categoria == 'calzado' ? 'selected' : ''; ?>>Calzado</option>
            <option value="ropa" <?php echo $filtro_categoria == 'ropa' ? 'selected' : ''; ?>>Ropa</option>
            <option value="accesorios" <?php echo $filtro_categoria == 'accesorios' ? 'selected' : ''; ?>>Accesorios</option>
            <option value="equipamiento" <?php echo $filtro_categoria == 'equipamiento' ? 'selected' : ''; ?>>Equipamiento</option>
          </select>
        </div>
        <div class="col-md-3">
          <label for="disponible">Disponibilidad:</label>
          <select name="disponible" id="disponible" class="form-control">
            <option value="">Todos</option>
            <option value="en_stock" <?php echo $filtro_disponible == 'en_stock' ? 'selected' : ''; ?>>En Stock</option>
            <option value="sin_stock" <?php echo $filtro_disponible == 'sin_stock' ? 'selected' : ''; ?>>Sin Stock</option>
          </select>
        </div>
        <div class="col-md-3">
          <label for="orden">Ordenar por:</label>
          <select name="orden" id="orden" class="form-control">
            <option value="">Sin Orden</option>
            <option value="precio_asc" <?php echo $orden == 'precio_asc' ? 'selected' : ''; ?>>Precio: Menor a Mayor</option>
            <option value="precio_desc" <?php echo $orden == 'precio_desc' ? 'selected' : ''; ?>>Precio: Mayor a Menor</option>
            <option value="popularidad" <?php echo $orden == 'popularidad' ? 'selected' : ''; ?>>Popularidad</option>
          </select>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-md-12">
          <button type="submit" class="btn btn-primary">Aplicar Filtros</button>
        </div>
      </div>
    </form>

    <div class="productos-container">
    <?php
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo '<div class="producto">';
        echo '<h3>' . htmlspecialchars($row["nombre"]) . '</h3>';
        echo '<p>Stock: ' . htmlspecialchars($row["stock"]) . '</p>';
        echo '<p>' . htmlspecialchars($row["descripcion"]) . '</p>';
        
        if ($row["en_oferta"]) {
          if (!empty($row["precio_anterior"]) && $row["precio_anterior"] > $row["precio"]) {
            echo '<p class="precio-anterior">Precio Anterior: <del>$' . htmlspecialchars($row["precio_anterior"]) . '</del></p>';
          }
          echo '<p>Precio con Oferta: $' . htmlspecialchars($row["precio"]) . '</p>';
        } else {
          echo '<p>Precio: $' . htmlspecialchars($row["precio"]) . '</p>';
        }
        
        echo '<input type="number" min="1" value="1" id="cantidad-' . htmlspecialchars($row["id"]) . '" class="cantidad-producto">';
        echo '<button class="btn btn-success agregar-carrito" data-id="' . htmlspecialchars($row["id"]) . '" data-nombre="' . htmlspecialchars($row["nombre"]) . '" data-precio="' . htmlspecialchars($row["precio"]) . '" data-stock="' . htmlspecialchars($row["stock"]) . '">Agregar al Carrito</button>';
        echo '</div>';
      }
    } else {
      echo "<p>No se encontraron productos con los filtros aplicados.</p>";
    }
    ?>
    </div>

    <div id="carrito-container">
  <h3>Carrito de Compras</h3>
  <div id="lista-carrito">
  </div>
  <div id="total-carrito">
  </div>
  <form method="GET" action="checkout.php">
      <input type="hidden" name="carrito" value="<?php echo htmlspecialchars(json_encode($_SESSION['carrito'])); ?>">
      <button type="submit" class="btn btn-primary">Completar Compra</button>
  </form>
  

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
<script src="carrito.js" defer></script>

</html>