<?php include 'conexion.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Listar Ciudades</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Listado de Ciudades</h1>

    <?php
    $sql = "SELECT * FROM ciudades";
    $resultado = mysqli_query($conexion, $sql) or die("Error en consulta: " . mysqli_error($conexion));
    ?>

    <table>
        <tr>
            <th>ID</th>
            <th>Ciudad</th>
            <th>País</th>
            <th>Habitantes</th>
            <th>Superficie</th>
            <th>Tiene Metro</th>
        </tr>

        <?php while ($fila = mysqli_fetch_array($resultado)) { ?>
            <tr>
                <td><?php echo $fila['id']; ?></td>
                <td><?php echo $fila['ciudad']; ?></td>
                <td><?php echo $fila['pais']; ?></td>
                <td><?php echo number_format($fila['habitantes']); ?></td>
                <td><?php echo $fila['superficie']; ?></td>
                <td><?php echo $fila['tieneMetro'] ? 'Sí' : 'No'; ?></td>
            </tr>
        <?php } ?>
    </table>

    <br><a href="index.php">🏠 Volver al Menú</a>

    <?php
    mysqli_free_result($resultado);
    mysqli_close($conexion);
    ?>
</body>

</html>