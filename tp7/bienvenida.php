<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Página de Bienvenida</title>
    <style>
        body {
            font-family: Arial;
            padding: 20px;
        }
    </style>
</head>

<body>
    <?php if (isset($_SESSION['nombre'])): ?>
        <h1>¡Bienvenido <?php echo htmlspecialchars($_SESSION['nombre']); ?>!</h1>
        <p>Has accedido correctamente a la página.</p>
    <?php else: ?>
        <h1>Acceso Denegado</h1>
        <p>No puedes visitar esta página sin haberte autenticado primero.</p>
        <a href="buscar_alumno.php">Ir al login</a>
    <?php endif; ?>
</body>

</html>