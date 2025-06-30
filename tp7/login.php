<?php
// EJERCICIO 5: Manejo de sesiones - 3 páginas

?>
<!DOCTYPE html>
<html>

<head>
    <title>Ejercicio 5 - Login</title>
    <style>
        body {
            font-family: Arial;
            padding: 20px;
        }
    </style>
</head>

<body>
    <h1>Iniciar Sesión</h1>
    <form action="crear_sesion.php" method="post">
        <label>Usuario:</label><br>
        <input type="text" name="usuario" required><br><br>
        <label>Clave:</label><br>
        <input type="password" name="clave" required><br><br>
        <button type="submit">Ingresar</button>
    </form>
</body>

</html>