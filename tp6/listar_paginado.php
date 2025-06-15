<?php include 'conexion.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Listado Paginado</title>
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

        .pagination {
            margin: 20px 0;
        }

        .pagination a {
            padding: 8px 16px;
            margin: 0 4px;
            background: #007bff;
            color: white;
            text-decoration: none;
        }

        .pagination a.active {
            background: #0056b3;
        }
    </style>
</head>

<body>
    <h1>Listado Paginado de Ciudades</h1>

    <?php
    // Configuración de paginación
    $registros_por_pagina = 3;
    $pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
    $inicio = ($pagina_actual - 1) * $registros_por_pagina;

    // Obtener total de registros
    $sql_total = "SELECT COUNT(*) as total FROM ciudades";
    $resultado_total = mysqli_query($conexion, $sql_total);
    $fila_total = mysqli_fetch_array($resultado_total);
    $total_registros = $fila_total['total'];
    $total_paginas = ceil($total_registros / $registros_por_pagina);

    // Consulta con LIMIT
    $sql = "SELECT * FROM ciudades LIMIT $inicio, $registros_por_pagina";
    $resultado = mysqli_query($conexion, $sql);
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

    <!-- Paginación -->
    <div class="pagination">
        <?php for ($i = 1; $i <= $total_paginas; $i++) { ?>
            <a href="listar_paginado.php?pagina=<?php echo $i; ?>"
                <?php echo ($i == $pagina_actual) ? 'class="active"' : ''; ?>>
                <?php echo $i; ?>
            </a>
        <?php } ?>
    </div>

    <p>Mostrando página <?php echo $pagina_actual; ?> de <?php echo $total_paginas; ?>
        (<?php echo $total_registros; ?> registros total)</p>

    <a href="index.php">🏠 Volver al Menú</a>

    <?php
    mysqli_free_result($resultado);
    mysqli_close($conexion);
    ?>
</body>

</html>