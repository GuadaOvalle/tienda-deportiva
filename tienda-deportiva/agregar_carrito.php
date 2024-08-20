<!-- agregar carrito -->

<?php
session_start();
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    $productId = $data['productId'];
    $quantity = $data['quantity'];

    // Verificar que el producto exista
    $query = $conn->prepare("SELECT * FROM productos WHERE id = ?");
    $query->execute([$productId]);
    $product = $query->fetch();

// ...
if ($product) {
    if ($quantity > $product['stock']) {
        echo json_encode(['success' => false, 'message' => 'La cantidad solicitada supera el stock disponible.']);
        exit;
    }
    // ...
}

        // Si el producto ya está en el carrito, actualizar la cantidad
        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId]['quantity'] += $quantity;
        } else {
            // Si no está, agregar al carrito
            $_SESSION['cart'][$productId] = [
                'name' => $product['nombre'],
                'price' => $product['precio'],
                'quantity' => $quantity
            ];
        }

        // Calcular el total de productos en el carrito
        $totalItems = 0;
        foreach ($_SESSION['cart'] as $item) {
            $totalItems += $item['quantity'];
        }

        // Responder con el carrito actualizado
        echo json_encode([
            'success' => true,
            'cart' => [
                'totalItems' => $totalItems,
                'items' => array_values($_SESSION['cart']),
            ]
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Producto no encontrado']);
    }
?>
