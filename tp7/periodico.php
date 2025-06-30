<?php

if (isset($_POST['tipo_noticia'])) {
    setcookie('tipo_noticia', $_POST['tipo_noticia'], time() + 3600);
    $tipo_seleccionado = $_POST['tipo_noticia'];
} else {
    $tipo_seleccionado = isset($_COOKIE['tipo_noticia']) ? $_COOKIE['tipo_noticia'] : 'todos';
}

$noticias = [
    'politica' => 'POLÍTICA: Nuevo proyecto de ley presentado en el Congreso',
    'economica' => 'ECONOMÍA: Mercados financieros registran alza del 3%',
    'deportiva' => 'DEPORTES: Equipo local clasifica a la final del torneo'
];
?>
<!DOCTYPE html>
<html>

<head>
    <title>Ejercicio 4 - Periódico</title>
    <style>
        body {
            font-family: Arial;
            padding: 20px;
        }

        .noticia {
            background: #f5f5f5;
            padding: 15px;
            margin: 10px 0;
            border-left: 4px solid #007bff;
        }
    </style>
</head>

<body>
    <h1>Periódico Digital</h1>

    <form method="post">
        <label>Tipo de noticia:</label><br>
        <input type="radio" name="tipo_noticia" value="politica" <?php echo $tipo_seleccionado == 'politica' ? 'checked' : ''; ?>> Política<br>
        <input type="radio" name="tipo_noticia" value="economica" <?php echo $tipo_seleccionado == 'economica' ? 'checked' : ''; ?>> Económica<br>
        <input type="radio" name="tipo_noticia" value="deportiva" <?php echo $tipo_seleccionado == 'deportiva' ? 'checked' : ''; ?>> Deportiva<br>
        <button type="submit">Filtrar Noticias</button>
    </form>

    <div>
        <?php if ($tipo_seleccionado == 'todos'): ?>
            <?php foreach ($noticias as $noticia): ?>
                <div class="noticia"><?php echo $noticia; ?></div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="noticia"><?php echo $noticias[$tipo_seleccionado]; ?></div>
        <?php endif; ?>
    </div>

    <p><a href="borrar_cookie.php">Borrar preferencias</a></p>

</body>

</html>