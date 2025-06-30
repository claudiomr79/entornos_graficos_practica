<?php
if (isset($_POST['estilo'])) {
    setcookie('estilo_pagina', $_POST['estilo'], time() + 3600);
    $estilo_actual = $_POST['estilo'];
} else {
    $estilo_actual = isset($_COOKIE['estilo_pagina']) ? $_COOKIE['estilo_pagina'] : 'azul';
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Ejercicio 1 - Estilos</title>
    <style>
        .azul {
            background: #e3f2fd;
            color: #1976d2;
        }

        .verde {
            background: #e8f5e8;
            color: #388e3c;
        }

        .rojo {
            background: #ffebee;
            color: #d32f2f;
        }

        body {
            font-family: Arial;
            padding: 20px;
        }

        form {
            margin: 20px 0;
        }
    </style>
</head>

<body class="<?php echo $estilo_actual; ?>">
    <h1>Página con Estilo Personalizable</h1>
    <p>El estilo actual es: <strong><?php echo ucfirst($estilo_actual); ?></strong></p>

    <form method="post">
        <label>Selecciona un estilo:</label><br>
        <input type="radio" name="estilo" value="azul" <?php echo $estilo_actual == 'azul' ? 'checked' : ''; ?>> Azul<br>
        <input type="radio" name="estilo" value="verde" <?php echo $estilo_actual == 'verde' ? 'checked' : ''; ?>> Verde<br>
        <input type="radio" name="estilo" value="rojo" <?php echo $estilo_actual == 'rojo' ? 'checked' : ''; ?>> Rojo<br>
        <button type="submit">Cambiar Estilo</button>
    </form>
</body>

</html>

<?php
