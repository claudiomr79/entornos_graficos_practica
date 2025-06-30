<?php
// Ejercicio 2: Contador de Visitas con Cookies
if (isset($_COOKIE['contador'])) {
    $contador = $_COOKIE['contador'] + 1;
    setcookie('contador', $contador, time() + 3600);
    $mensaje = "Has visitado esta página $contador veces.";
} else {
    $contador = 1;
    setcookie('contador', $contador, time() + 3600);
    $mensaje = "¡Bienvenido! Esta es tu primera visita.";
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Ejercicio 2 - Contador</title>
    <style>
        body {
            font-family: Arial;
            padding: 20px;
        }
    </style>
</head>

<body>
    <h1>Contador de Visitas</h1>
    <p><?php echo $mensaje; ?></p>
    <a href="contador.php">Recargar página</a>
</body>

</html>

<?
