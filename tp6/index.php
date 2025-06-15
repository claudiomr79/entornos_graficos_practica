<!DOCTYPE html>
<html>

<head>
    <title>Gestión de Ciudades</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }

        .menu {
            background: #f0f0f0;
            padding: 50px;
            border-radius: 5px;
        }

        .menu a {
            display: block;
            margin: 10px 100px 10px 100px;
            padding: 10px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 3px;
        }

        .menu a:hover {
            background: #0056b3;
        }
    </style>
</head>

<body>
    <h1>Sistema de Gestión de Ciudades</h1>
    <div class="menu">
        <h2>Menú Principal</h2>
        <a href="listar.php">Listar Ciudades</a>
        <a href="agregar.php">➕ Agregar Ciudad</a>
        <a href="modificar.php">✏️ Modificar Ciudad</a>
        <a href="eliminar.php">🗑️ Eliminar Ciudad</a>
        <a href="listar_paginado.php">Listar con Paginación</a>
    </div>
</body>

</html>