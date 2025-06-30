<?php
// EJERCICIO 3: Formulario con último usuario

if (isset($_POST['usuario'])) {
    setcookie('ultimo_usuario', $_POST['usuario'], time() + 3600);
    $ultimo_usuario = $_POST['usuario'];
} else {
    $ultimo_usuario = isset($_COOKIE['ultimo_usuario']) ? $_COOKIE['ultimo_usuario'] : '';
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Ejercicio 3 - Usuario</title>
    <style>
        body {
            font-family: Arial;
            padding: 20px;
        }
    </style>
</head>

<body>
    <h1>Formulario de Usuario</h1>
    <?php if ($ultimo_usuario): ?>
        <p>Último usuario ingresado: <strong><?php echo htmlspecialchars($ultimo_usuario); ?></strong></p>
    <?php endif; ?>

    <form method="post">
        <label>Nombre de usuario:</label><br>
        <input type="text" name="usuario" value="<?php echo htmlspecialchars($ultimo_usuario); ?>" required><br><br>
        <button type="submit">Guardar Usuario</button>
    </form>
</body>

</html>