<?php
session_start();
if (isset($_POST['mail'])) {
    $conexion = new mysqli("localhost", "root", "", "base2");

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    $mail = $conexion->real_escape_string($_POST['mail']);
    $resultado = $conexion->query("SELECT nombre FROM alumnos WHERE mail = '$mail'");

    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        $_SESSION['nombre'] = $fila['nombre'];
        echo "<!DOCTYPE html>
        <html>
        <head>
            <title>Alumno Encontrado</title>
            <style>body { font-family: Arial; padding: 20px; }</style>
        </head>
        <body>
            <h1>Alumno Encontrado</h1>
            <p>Bienvenido {$fila['nombre']}</p>
            <a href='bienvenida.php'>Ir a página de bienvenida</a>
        </body>
        </html>";
    } else {
        echo "<!DOCTYPE html>
        <html>
        <head>
            <title>Alumno No Encontrado</title>
            <style>body { font-family: Arial; padding: 20px; }</style>
        </head>
        <body>
            <h1>Error</h1>
            <p>No se encontró ningún alumno con ese email.</p>
            <a href='buscar_alumno.php'>Volver</a>
        </body>
        </html>";
    }
    $conexion->close();
}
