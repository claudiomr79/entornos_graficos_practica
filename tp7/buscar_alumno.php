<!DOCTYPE html>
<html>

<head>
    <title>Ejercicio 6 - Buscar Alumno</title>
    <style>
        body {
            font-family: Arial;
            padding: 20px;
        }
    </style>
</head>

<body>
    <h1>Buscar Alumno</h1>
    <form action="verificar_alumno.php" method="post">
        <label>Email del alumno:</label><br>
        <input type="email" name="mail" required><br><br>
        <button type="submit">Buscar</button>
    </form>
</body>

</html>