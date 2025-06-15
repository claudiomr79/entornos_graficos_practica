<?php include 'conexion.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Agregar Ciudad</title>
</head>

<body>
    <h1>Agregar Nueva Ciudad</h1>

    <?php
    if ($_POST) {
        $ciudad = $_POST['ciudad'];
        $pais = $_POST['pais'];
        $habitantes = $_POST['habitantes'];
        $superficie = $_POST['superficie'];
        $tieneMetro = isset($_POST['tieneMetro']) ? 1 : 0;

        $sql = "INSERT INTO ciudades (ciudad, pais, habitantes, superficie, tieneMetro) 
                VALUES ('$ciudad', '$pais', $habitantes, $superficie, $tieneMetro)";

        if (mysqli_query($conexion, $sql)) {
            echo "<p style='color: green;'>✅ Ciudad agregada exitosamente</p>";
        } else {
            echo "<p style='color: red;'>❌ Error: " . mysqli_error($conexion) . "</p>";
        }
    }
    ?>

    <form method="POST">
        <p>Ciudad: <input type="text" name="ciudad" required></p>
        <p>País: <input type="text" name="pais" required></p>
        <p>Habitantes: <input type="number" name="habitantes" required></p>
        <p>Superficie: <input type="number" step="0.01" name="superficie" required></p>
        <p>Tiene Metro: <input type="checkbox" name="tieneMetro" value="1"></p>
        <p><input type="submit" value="Agregar Ciudad"></p>
    </form>

    <a href="index.php">🏠 Volver al Menú</a>

    <?php mysqli_close($conexion); ?>
</body>

</html>