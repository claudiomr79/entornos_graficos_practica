<?php
// EJERCICIO 8: Buscador de canciones

$conexion = new mysqli("localhost", "root", "", "prueba");
$resultados = [];

if (isset($_POST['buscar'])) {
    $termino = $conexion->real_escape_string($_POST['termino']);
    $query = "SELECT * FROM buscador WHERE canciones LIKE '%$termino%'";
    $resultado = $conexion->query($query);
    while ($fila = $resultado->fetch_assoc()) {
        $resultados[] = $fila;
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Ejercicio 8 - Buscador de Canciones</title>
    <style>
        body {
            font-family: Arial;
            padding: 20px;
        }

        .resultado {
            background: #f9f9f9;
            padding: 10px;
            margin: 5px 0;
            border-left: 3px solid #007bff;
        }
    </style>
</head>

<body>
    <h1>Buscador de Canciones</h1>

    <form method="post">
        <label>Buscar canción:</label><br>
        <input type="text" name="termino" placeholder="Ingrese nombre de la canción" required>
        <button type="submit" name="buscar">Buscar</button>
    </form>

    <?php if (!empty($resultados)): ?>
        <h3>Resultados de la búsqueda:</h3>
        <?php foreach ($resultados as $cancion): ?>
            <div class="resultado">
                <?php echo htmlspecialchars($cancion['canciones']); ?>
            </div>
        <?php endforeach; ?>
    <?php elseif (isset($_POST['buscar'])): ?>
        <p>No se encontraron canciones con ese criterio.</p>
    <?php endif; ?>
</body>

</html>