<?php
include 'conexion.php';

// Procesar eliminación
if (isset($_POST['confirmar'])) {
    $id = (int)$_POST['id'];
    $stmt = mysqli_prepare($conexion, "DELETE FROM ciudades WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);

    $mensaje = mysqli_stmt_execute($stmt)
        ? "<p style='color: green;'>✅ Ciudad eliminada exitosamente</p>"
        : "<p style='color: red;'>❌ Error al eliminar</p>";

    mysqli_stmt_close($stmt);
}

// Obtener datos de ciudad para confirmación
$ciudad_data = null;
if (isset($_GET['id']) && !isset($_POST['confirmar'])) {
    $id = (int)$_GET['id'];
    $stmt = mysqli_prepare($conexion, "SELECT * FROM ciudades WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $ciudad_data = mysqli_fetch_array(mysqli_stmt_get_result($stmt));
    mysqli_stmt_close($stmt);
}

// Obtener lista de ciudades
function obtenerCiudades($conexion)
{
    $resultado = mysqli_query($conexion, "SELECT id, ciudad, pais FROM ciudades ORDER BY ciudad");
    return $resultado ? mysqli_fetch_all($resultado, MYSQLI_ASSOC) : [];
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Eliminar Ciudad</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .mensaje {
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
        }

        .ciudad-link {
            display: block;
            padding: 8px;
            margin: 5px 0;
            text-decoration: none;
            background: #f0f0f0;
            border-radius: 3px;
        }

        .ciudad-link:hover {
            background: #e0e0e0;
        }

        .btn-eliminar {
            background: #dc3545;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-cancelar {
            margin-left: 10px;
            padding: 10px 20px;
            text-decoration: none;
            background: #6c757d;
            color: white;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <h1>Eliminar Ciudad</h1>

    <?php if (isset($mensaje)) echo $mensaje; ?>

    <?php if ($ciudad_data): ?>
        <!-- Confirmación de eliminación -->
        <h3>¿Está seguro que desea eliminar esta ciudad?</h3>
        <div class="mensaje" style="background: #fff3cd; border: 1px solid #ffeaa7;">
            <strong>Ciudad:</strong> <?= htmlspecialchars($ciudad_data['ciudad']) ?><br>
            <strong>País:</strong> <?= htmlspecialchars($ciudad_data['pais']) ?>
        </div>

        <form method="POST" style="margin: 20px 0;">
            <input type="hidden" name="id" value="<?= $ciudad_data['id'] ?>">
            <button type="submit" name="confirmar" class="btn-eliminar">Sí, Eliminar</button>
            <a href="eliminar.php" class="btn-cancelar">Cancelar</a>
        </form>

    <?php else: ?>
        <!-- Lista de ciudades -->
        <h3>Seleccionar Ciudad a Eliminar:</h3>
        <?php
        $ciudades = obtenerCiudades($conexion);
        if ($ciudades):
        ?>
            <?php foreach ($ciudades as $ciudad): ?>
                <a href="eliminar.php?id=<?= $ciudad['id'] ?>" class="ciudad-link">
                    🏙️ <?= htmlspecialchars($ciudad['ciudad']) ?> (<?= htmlspecialchars($ciudad['pais']) ?>)
                </a>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No hay ciudades para eliminar.</p>
        <?php endif; ?>
    <?php endif; ?>

    <br><a href="index.php">🏠 Volver al Menú</a>

    <?php mysqli_close($conexion); ?>
</body>

</html>