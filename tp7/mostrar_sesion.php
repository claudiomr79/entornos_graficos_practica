<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Datos de Sesión</title>
    <style>
        body {
            font-family: Arial;
            padding: 20px;
        }
    </style>
</head>

<body>
    <h1>Datos de Sesión</h1>
    <?php if (isset($_SESSION['usuario'])): ?>
        <p>Usuario: <strong><?php echo htmlspecialchars($_SESSION['usuario']); ?></strong></p>
        <p>Clave: <strong><?php echo str_repeat('*', strlen($_SESSION['clave'])); ?></strong></p>
    <?php else: ?>
        <p>No hay datos de sesión disponibles.</p>
    <?php endif; ?>
    <a href="login.php">Volver al login</a>
</body>

</html>