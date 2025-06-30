<?php

session_start();
$conexion = new mysqli("localhost", "root", "", "compras");

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Función para limpiar productos inexistentes del carrito
function limpiarCarrito($conexion)
{
    if (isset($_SESSION['carrito'])) {
        foreach ($_SESSION['carrito'] as $id => $cantidad) {
            if (!is_numeric($id)) {
                unset($_SESSION['carrito'][$id]);
                continue;
            }
            $stmt = $conexion->prepare("SELECT id FROM catalogo WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows == 0) {
                unset($_SESSION['carrito'][$id]);
            }
        }
    }
}

// Función para normalizar las cantidades del carrito
function normalizarCarrito()
{
    if (isset($_SESSION['carrito'])) {
        foreach ($_SESSION['carrito'] as $id => $cantidad) {
            if (is_array($cantidad)) {
                // Si es array, tomar el primer valor o 1
                $_SESSION['carrito'][$id] = isset($cantidad[0]) ? max(1, intval($cantidad[0])) : 1;
            } else {
                // Asegurar que sea un entero positivo
                $_SESSION['carrito'][$id] = max(1, intval($cantidad));
            }
        }
    }
}

// Limpiar y normalizar el carrito al cargar la página
normalizarCarrito();
limpiarCarrito($conexion);

if (isset($_POST['agregar'])) {
    $id = intval($_POST['id']);
    if ($id > 0) {
        // Asegurar que la cantidad siempre sea un número entero
        if (isset($_SESSION['carrito'][$id])) {
            $cantidadActual = is_array($_SESSION['carrito'][$id]) ? 1 : intval($_SESSION['carrito'][$id]);
            $_SESSION['carrito'][$id] = $cantidadActual + 1;
        } else {
            $_SESSION['carrito'][$id] = 1;
        }
    }
}

if (isset($_POST['vaciar_carrito'])) {
    $_SESSION['carrito'] = [];
}

$productos = $conexion->query("SELECT * FROM catalogo");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Ejercicio 7 - Catálogo</title>
    <style>
        body {
            font-family: Arial;
            padding: 20px;
        }

        .producto {
            border: 1px solid #ddd;
            padding: 10px;
            margin: 10px 0;
        }

        .carrito {
            background: #f0f0f0;
            padding: 15px;
            margin: 20px 0;
        }
    </style>
</head>

<body>
    <h1>Catálogo de Productos</h1>

    <?php while ($producto = $productos->fetch_assoc()): ?>
        <div class="producto">
            <h3><?php echo $producto['producto']; ?></h3>
            <p>Precio: $<?php echo number_format($producto['precio'], 2); ?></p>
            <form method="post" style="display: inline;">
                <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
                <button type="submit" name="agregar">Agregar al Carrito</button>
            </form>
        </div>
    <?php endwhile; ?>

    <div class="carrito">
        <h3>Carrito de Compras</h3>
        <?php if (empty($_SESSION['carrito'])): ?>
            <p>El carrito está vacío</p>
        <?php else: ?>
            <form method="post" style="margin-bottom: 10px;">
                <button type="submit" name="vaciar_carrito" style="background: #dc3545; color: white; border: none; padding: 5px 10px; cursor: pointer;">Vaciar Carrito</button>
            </form>
            <?php
            $total = 0;
            foreach ($_SESSION['carrito'] as $id => $cantidad):
                // Validar que el ID sea numérico
                if (!is_numeric($id)) continue;

                // Validar y normalizar la cantidad
                if (is_array($cantidad)) {
                    // Si la cantidad es un array, tomar el primer valor o 1 por defecto
                    $cantidad = isset($cantidad[0]) ? intval($cantidad[0]) : 1;
                } else {
                    $cantidad = intval($cantidad);
                }

                // Si la cantidad es 0 o negativa, eliminar del carrito
                if ($cantidad <= 0) {
                    unset($_SESSION['carrito'][$id]);
                    continue;
                }

                // Usar prepared statement para mayor seguridad
                $stmt = $conexion->prepare("SELECT * FROM catalogo WHERE id = ?");
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $result = $stmt->get_result();
                $prod = $result->fetch_assoc();

                if ($prod && isset($prod['precio']) && isset($prod['producto']) && is_numeric($prod['precio'])):
                    $subtotal = floatval($prod['precio']) * $cantidad;
                    $total += $subtotal;
            ?>
                    <p><?php echo $prod['producto']; ?> - Cantidad: <?php echo $cantidad; ?> - Subtotal: $<?php echo number_format($subtotal, 2); ?></p>
                <?php
                else:
                ?>
                    <p>Producto con ID <?php echo $id; ?> no encontrado - Cantidad: <?php echo $cantidad; ?></p>
            <?php
                endif;
            endforeach; ?>
            <p><strong>Total: $<?php echo number_format($total, 2); ?></strong></p>
        <?php endif; ?>
    </div>
</body>

</html>