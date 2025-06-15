<?php
// Configuración de la base de datos
$servidor = "localhost";
$usuario = "root";
$password = "";
$base_datos = "Capitales";

// Intentar conectar a la base de datos
$conexion = mysqli_connect($servidor, $usuario, $password, $base_datos);

// Verificar la conexión
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Establecer el conjunto de caracteres a UTF-8
mysqli_set_charset($conexion, "utf8");
