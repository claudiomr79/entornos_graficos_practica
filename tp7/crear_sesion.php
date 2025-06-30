<?php
session_start();
if (isset($_POST['usuario']) && isset($_POST['clave'])) {
    $_SESSION['usuario'] = $_POST['usuario'];
    $_SESSION['clave'] = $_POST['clave'];
    echo "<!DOCTYPE html>
    <html>
    <head>
        <title>Sesión Creada</title>
        <style>body { font-family: Arial; padding: 20px; }</style>
    </head>
    <body>
        <h1>Sesión Creada</h1>
        <p>Las variables de sesión han sido creadas exitosamente.</p>
        <a href='mostrar_sesion.php'>Ver datos de sesión</a>
    </body>
    </html>";
} else {
    header('Location: login.php');
}
