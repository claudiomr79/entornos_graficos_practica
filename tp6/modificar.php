<?php include 'conexion.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Modificar Ciudad</title>
</head>

<body>
    <h1>Modificar Ciudad</h1>

    <?php
    if (isset($_POST['actualizar'])) {
        $id = $_POST['id'];
        $ciudad = $_POST['ciudad'];
        $pais = $_POST['pais'];
        $habitantes = $_POST['habitantes'];
        $superficie = $_POST['superficie'];
        $tieneMetro = isset($_POST['tieneMetro']) ? 1 : 0;

        $sql = "UPDATE ciudades SET ciudad='$ciudad', pais='$pais', habitantes=$habitantes, 
                superficie=$superficie, tieneMetro=$tieneMetro WHERE id=$id";

        if (mysqli_query($conexion, $sql)) {
            echo "<p style='color: green;'>✅ Ciudad actualizada exitosamente</p>";
        } else {
            echo "<p style='color: red;'>❌ Error: " . mysqli_error($conexion) . "</p>";
        }
    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM ciudades WHERE id = $id";
        $resultado = mysqli_query($conexion, $sql);
        $ciudad_data = mysqli_fetch_array($resultado);
    }
    ?>

    <!-- Seleccionar ciudad para modificar -->
    <?php if (!isset($_GET['id'])) { ?>
        <h3>Seleccionar Ciudad a Modificar:</h3>
        <?php
        $sql = "SELECT id, ciudad, pais FROM ciudades";
        $resultado = mysqli_query($conexion, $sql);
        while ($fila = mysqli_fetch_array($resultado)) {
            echo "<a href='modificar.php?id=" . $fila['id'] . "'>" . $fila['ciudad'] . " (" . $fila['pais'] . ")</a><br>";
        }
        ?>
    <?php } else { ?>
        <!-- Formulario de modificación -->
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $ciudad_data['id']; ?>">
            <p>Ciudad: <input type="text" name="ciudad" value="<?php echo $ciudad_data['ciudad']; ?>" required></p>
            <p>País: <input type="text" name="pais" value="<?php echo $ciudad_data['pais']; ?>" required></p>
            <p>Habitantes: <input type="number" name="habitantes" value="<?php echo $ciudad_data['habitantes']; ?>" required></p>
            <p>Superficie: <input type="number" step="0.01" name="superficie" value="<?php echo $ciudad_data['superficie']; ?>" required></p>
            <p>Tiene Metro: <input type="checkbox" name="tieneMetro" value="1" <?php echo $ciudad_data['tieneMetro'] ? 'checked' : ''; ?>></p>
            <p><input type="submit" name="actualizar" value="Actualizar Ciudad"></p>
        </form>
    <?php } ?>

    <a href="index.php">🏠 Volver al Menú</a>

    <?php mysqli_close($conexion); ?>
</body>

</html>