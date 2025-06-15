# Práctica 6: Manejo de Bases de Datos con PHP

## Ejercicio 1: Completar

### Conexión a Base de Datos MySQL

**Para comenzar la comunicación con un servidor de base de datos MySQL, es necesario abrir una conexión a ese servidor. Para inicializar esta conexión, PHP ofrece la función:**

```php
mysqli_connect()
```

**Todos sus parámetros son opcionales, pero hay tres de ellos que generalmente son necesarios:**

- **servidor/host** (ejemplo: "localhost")
- **usuario** (ejemplo: "root")
- **contraseña** (ejemplo: "password")

**Una vez abierta la conexión, se debe seleccionar una base de datos para su uso, mediante la función:**

```php
mysqli_select_db()
```

**Esta función debe pasar como parámetro:**

- **la conexión** y **el nombre de la base de datos**

**La función mysqli_query() se utiliza para:**
**ejecutar consultas SQL (SELECT, INSERT, UPDATE, DELETE)**

**y requiere como parámetros:**

- **la conexión** y **la consulta SQL**

**La cláusula or die() se utiliza para:**
**detener la ejecución del script si ocurre un error**

**y la función mysqli_error() se puede usar para:**
**mostrar el mensaje de error específico que ocurrió**

### Explicación del código:

```php
<?php
while ($fila = mysqli_fetch_array($vResultado))
{
?>
<tr>
<td><?php echo ($fila[0]); ?></td>
<td><?php echo ($fila[1]); ?></td>
<td><?php echo ($fila[2]); ?></td>
</tr>
<?php
}
mysqli_free_result($vResultado);
mysqli_close($link);
?>
```

**Explicación:**

- `while ($fila = mysqli_fetch_array($vResultado))`: Recorre cada fila del resultado de la consulta
- `$fila[0], $fila[1], $fila[2]`: Accede a las columnas por índice numérico
- `mysqli_free_result()`: Libera la memoria ocupada por el resultado
- `mysqli_close()`: Cierra la conexión a la base de datos

---

## Ejercicio 2: Sistema ABML para Tabla Ciudades

### 1. Estructura de la Base de Datos

```sql
CREATE DATABASE Capitales;
USE Capitales;

CREATE TABLE ciudades (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ciudad VARCHAR(100) NOT NULL,
    pais VARCHAR(100) NOT NULL,
    habitantes INT,
    superficie DECIMAL(10,2),
    tieneMetro TINYINT(1) DEFAULT 0
);

INSERT INTO ciudades VALUES
(1, 'México D.F.', 'México', 555666, 23434.34, 1),
(2, 'Barcelona', 'España', 444333, 1111.11, 0),
(3, 'Buenos Aires', 'Argentina', 888111, 333.33, 1),
(4, 'Medellín', 'Colombia', 999222, 888.88, 0),
(5, 'Lima', 'Perú', 999111, 222.22, 0),
(6, 'Caracas', 'Venezuela', 111222, 111.11, 1),
(7, 'Santiago', 'Chile', 777666, 222.22, 1),
(8, 'Antigua', 'Guatemala', 444222, 877.33, 0),
(9, 'Quito', 'Ecuador', 333111, 999.11, 1),
(10, 'La Habana', 'Cuba', 111222, 333.11, 0);
```

### 2. Archivo de Conexión (conexion.php)

```php
<?php
$servidor = "localhost";
$usuario = "root";
$password = "";
$base_datos = "Capitales";

$conexion = mysqli_connect($servidor, $usuario, $password, $base_datos);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>
```

### 3. Menú Principal (index.php)

```php
<!DOCTYPE html>
<html>
<head>
    <title>Gestión de Ciudades</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .menu { background: #f0f0f0; padding: 20px; border-radius: 5px; }
        .menu a { display: block; margin: 10px 0; padding: 10px; background: #007bff; color: white; text-decoration: none; border-radius: 3px; }
        .menu a:hover { background: #0056b3; }
    </style>
</head>
<body>
    <h1>Sistema de Gestión de Ciudades</h1>
    <div class="menu">
        <h2>Menú Principal</h2>
        <a href="listar.php">📋 Listar Ciudades</a>
        <a href="agregar.php">➕ Agregar Ciudad</a>
        <a href="modificar.php">✏️ Modificar Ciudad</a>
        <a href="eliminar.php">🗑️ Eliminar Ciudad</a>
        <a href="listar_paginado.php">📄 Listar con Paginación</a>
    </div>
</body>
</html>
```

### 4. Listar Ciudades (listar.php)

```php
<?php include 'conexion.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Listar Ciudades</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Listado de Ciudades</h1>

    <?php
    $sql = "SELECT * FROM ciudades";
    $resultado = mysqli_query($conexion, $sql) or die("Error en consulta: " . mysqli_error($conexion));
    ?>

    <table>
        <tr>
            <th>ID</th>
            <th>Ciudad</th>
            <th>País</th>
            <th>Habitantes</th>
            <th>Superficie</th>
            <th>Tiene Metro</th>
        </tr>

        <?php while($fila = mysqli_fetch_array($resultado)) { ?>
        <tr>
            <td><?php echo $fila['id']; ?></td>
            <td><?php echo $fila['ciudad']; ?></td>
            <td><?php echo $fila['pais']; ?></td>
            <td><?php echo number_format($fila['habitantes']); ?></td>
            <td><?php echo $fila['superficie']; ?></td>
            <td><?php echo $fila['tieneMetro'] ? 'Sí' : 'No'; ?></td>
        </tr>
        <?php } ?>
    </table>

    <br><a href="index.php">🏠 Volver al Menú</a>

    <?php
    mysqli_free_result($resultado);
    mysqli_close($conexion);
    ?>
</body>
</html>
```

### 5. Agregar Ciudad (agregar.php)

```php
<?php include 'conexion.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Agregar Ciudad</title>
</head>
<body>
    <h1>Agregar Nueva Ciudad</h1>

    <?php
    if ($_POST) {
        $ciudad = $_POST['ciudad'];
        $pais = $_POST['pais'];
        $habitantes = $_POST['habitantes'];
        $superficie = $_POST['superficie'];
        $tieneMetro = isset($_POST['tieneMetro']) ? 1 : 0;

        $sql = "INSERT INTO ciudades (ciudad, pais, habitantes, superficie, tieneMetro)
                VALUES ('$ciudad', '$pais', $habitantes, $superficie, $tieneMetro)";

        if (mysqli_query($conexion, $sql)) {
            echo "<p style='color: green;'>✅ Ciudad agregada exitosamente</p>";
        } else {
            echo "<p style='color: red;'>❌ Error: " . mysqli_error($conexion) . "</p>";
        }
    }
    ?>

    <form method="POST">
        <p>Ciudad: <input type="text" name="ciudad" required></p>
        <p>País: <input type="text" name="pais" required></p>
        <p>Habitantes: <input type="number" name="habitantes" required></p>
        <p>Superficie: <input type="number" step="0.01" name="superficie" required></p>
        <p>Tiene Metro: <input type="checkbox" name="tieneMetro" value="1"></p>
        <p><input type="submit" value="Agregar Ciudad"></p>
    </form>

    <a href="index.php">🏠 Volver al Menú</a>

    <?php mysqli_close($conexion); ?>
</body>
</html>
```

### 6. Modificar Ciudad (modificar.php)

```php
<?php include 'conexion.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Modificar Ciudad</title>
</head>
<body>
    <h1>Modificar Ciudad</h1>

    <?php
    if (isset($_POST['actualizar'])) {
        $id = $_POST['id'];
        $ciudad = $_POST['ciudad'];
        $pais = $_POST['pais'];
        $habitantes = $_POST['habitantes'];
        $superficie = $_POST['superficie'];
        $tieneMetro = isset($_POST['tieneMetro']) ? 1 : 0;

        $sql = "UPDATE ciudades SET ciudad='$ciudad', pais='$pais', habitantes=$habitantes,
                superficie=$superficie, tieneMetro=$tieneMetro WHERE id=$id";

        if (mysqli_query($conexion, $sql)) {
            echo "<p style='color: green;'>✅ Ciudad actualizada exitosamente</p>";
        } else {
            echo "<p style='color: red;'>❌ Error: " . mysqli_error($conexion) . "</p>";
        }
    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM ciudades WHERE id = $id";
        $resultado = mysqli_query($conexion, $sql);
        $ciudad_data = mysqli_fetch_array($resultado);
    }
    ?>

    <!-- Seleccionar ciudad para modificar -->
    <?php if (!isset($_GET['id'])) { ?>
        <h3>Seleccionar Ciudad a Modificar:</h3>
        <?php
        $sql = "SELECT id, ciudad, pais FROM ciudades";
        $resultado = mysqli_query($conexion, $sql);
        while($fila = mysqli_fetch_array($resultado)) {
            echo "<a href='modificar.php?id=".$fila['id']."'>".$fila['ciudad']." (".$fila['pais'].")</a><br>";
        }
        ?>
    <?php } else { ?>
        <!-- Formulario de modificación -->
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $ciudad_data['id']; ?>">
            <p>Ciudad: <input type="text" name="ciudad" value="<?php echo $ciudad_data['ciudad']; ?>" required></p>
            <p>País: <input type="text" name="pais" value="<?php echo $ciudad_data['pais']; ?>" required></p>
            <p>Habitantes: <input type="number" name="habitantes" value="<?php echo $ciudad_data['habitantes']; ?>" required></p>
            <p>Superficie: <input type="number" step="0.01" name="superficie" value="<?php echo $ciudad_data['superficie']; ?>" required></p>
            <p>Tiene Metro: <input type="checkbox" name="tieneMetro" value="1" <?php echo $ciudad_data['tieneMetro'] ? 'checked' : ''; ?>></p>
            <p><input type="submit" name="actualizar" value="Actualizar Ciudad"></p>
        </form>
    <?php } ?>

    <a href="index.php">🏠 Volver al Menú</a>

    <?php mysqli_close($conexion); ?>
</body>
</html>
```

### 7. Eliminar Ciudad (eliminar.php)

```php
<?php include 'conexion.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Eliminar Ciudad</title>
</head>
<body>
    <h1>Eliminar Ciudad</h1>

    <?php
    if (isset($_POST['confirmar'])) {
        $id = $_POST['id'];
        $sql = "DELETE FROM ciudades WHERE id = $id";

        if (mysqli_query($conexion, $sql)) {
            echo "<p style='color: green;'>✅ Ciudad eliminada exitosamente</p>";
        } else {
            echo "<p style='color: red;'>❌ Error: " . mysqli_error($conexion) . "</p>";
        }
    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM ciudades WHERE id = $id";
        $resultado = mysqli_query($conexion, $sql);
        $ciudad_data = mysqli_fetch_array($resultado);
    }
    ?>

    <!-- Seleccionar ciudad para eliminar -->
    <?php if (!isset($_GET['id'])) { ?>
        <h3>Seleccionar Ciudad a Eliminar:</h3>
        <?php
        $sql = "SELECT id, ciudad, pais FROM ciudades";
        $resultado = mysqli_query($conexion, $sql);
        while($fila = mysqli_fetch_array($resultado)) {
            echo "<a href='eliminar.php?id=".$fila['id']."'>".$fila['ciudad']." (".$fila['pais'].")</a><br>";
        }
        ?>
    <?php } else { ?>
        <!-- Confirmación de eliminación -->
        <h3>¿Está seguro que desea eliminar esta ciudad?</h3>
        <p><strong>Ciudad:</strong> <?php echo $ciudad_data['ciudad']; ?></p>
        <p><strong>País:</strong> <?php echo $ciudad_data['pais']; ?></p>

        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $ciudad_data['id']; ?>">
            <input type="submit" name="confirmar" value="Sí, Eliminar" style="background: red; color: white;">
            <a href="eliminar.php" style="margin-left: 10px;">Cancelar</a>
        </form>
    <?php } ?>

    <a href="index.php">🏠 Volver al Menú</a>

    <?php mysqli_close($conexion); ?>
</body>
</html>
```

### 8. Listado con Paginación (listar_paginado.php)

```php
<?php include 'conexion.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Listado Paginado</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .pagination { margin: 20px 0; }
        .pagination a { padding: 8px 16px; margin: 0 4px; background: #007bff; color: white; text-decoration: none; }
        .pagination a.active { background: #0056b3; }
    </style>
</head>
<body>
    <h1>Listado Paginado de Ciudades</h1>

    <?php
    // Configuración de paginación
    $registros_por_pagina = 3;
    $pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
    $inicio = ($pagina_actual - 1) * $registros_por_pagina;

    // Obtener total de registros
    $sql_total = "SELECT COUNT(*) as total FROM ciudades";
    $resultado_total = mysqli_query($conexion, $sql_total);
    $fila_total = mysqli_fetch_array($resultado_total);
    $total_registros = $fila_total['total'];
    $total_paginas = ceil($total_registros / $registros_por_pagina);

    // Consulta con LIMIT
    $sql = "SELECT * FROM ciudades LIMIT $inicio, $registros_por_pagina";
    $resultado = mysqli_query($conexion, $sql);
    ?>

    <table>
        <tr>
            <th>ID</th>
            <th>Ciudad</th>
            <th>País</th>
            <th>Habitantes</th>
            <th>Superficie</th>
            <th>Tiene Metro</th>
        </tr>

        <?php while($fila = mysqli_fetch_array($resultado)) { ?>
        <tr>
            <td><?php echo $fila['id']; ?></td>
            <td><?php echo $fila['ciudad']; ?></td>
            <td><?php echo $fila['pais']; ?></td>
            <td><?php echo number_format($fila['habitantes']); ?></td>
            <td><?php echo $fila['superficie']; ?></td>
            <td><?php echo $fila['tieneMetro'] ? 'Sí' : 'No'; ?></td>
        </tr>
        <?php } ?>
    </table>

    <!-- Paginación -->
    <div class="pagination">
        <?php for($i = 1; $i <= $total_paginas; $i++) { ?>
            <a href="listar_paginado.php?pagina=<?php echo $i; ?>"
               <?php echo ($i == $pagina_actual) ? 'class="active"' : ''; ?>>
               <?php echo $i; ?>
            </a>
        <?php } ?>
    </div>

    <p>Mostrando página <?php echo $pagina_actual; ?> de <?php echo $total_paginas; ?>
       (<?php echo $total_registros; ?> registros total)</p>

    <a href="index.php">🏠 Volver al Menú</a>

    <?php
    mysqli_free_result($resultado);
    mysqli_close($conexion);
    ?>
</body>
</html>
```
