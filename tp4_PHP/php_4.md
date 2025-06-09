# Práctica PHP N°4

## Variables, tipos, operadores, expresiones, estructuras de control y arrays

---

## **EJERCICIO 1**

### Análisis del código:

```php
<?php
function doble($i) {
    return $i*2;
}
$a = TRUE;
$b = "xyz";
$c = 'xyz';
$d = 12;
echo gettype($a);
echo gettype($b);
echo gettype($c);
echo gettype($d);
if (is_int($d)) {
    $d += 4;
}
if (is_string($a)) {
    echo "Cadena: $a";
}
$d = $a ? ++$d : $d*3;
$f = doble($d++);
$g = $f += 10;
echo $a, $b, $c, $d, $f , $g;
?>
```

### **Variables y sus tipos:**

- `$a` = TRUE (boolean)
- `$b` = "xyz" (string)
- `$c` = 'xyz' (string)
- `$d` = 12 (integer)
- `$i` = parámetro de función (integer)
- `$f` = resultado de función (integer)
- `$g` = resultado de asignación (integer)

### **Operadores:**

- **Aritméticos:** `*`, `+`, `++`, `+=`
- **Lógicos:** `?:` (operador ternario)
- **Comparación:** implícitos en funciones de tipo
- **Asignación:** `=`, `+=`

### **Funciones y sus parámetros:**

- `doble($i)` - función definida, parámetro: $i
- `gettype($variable)` - función built-in, parámetro: variable
- `is_int($variable)` - función built-in, parámetro: variable
- `is_string($variable)` - función built-in, parámetro: variable
- `echo` - función de salida, múltiples parámetros

### **Estructuras de control:**

- `if (is_int($d))` - condicional simple
- `if (is_string($a))` - condicional simple
- `$d = $a ? ++$d : $d*3;` - operador ternario

### **Salida por pantalla:**

```
booleantringstringingxyzxyz17271827
```

**Explicación paso a paso:**

1. `gettype($a)` → "boolean"
2. `gettype($b)` → "string"
3. `gettype($c)` → "string"
4. `gettype($d)` → "integer"
5. `$d += 4` → $d = 16 (porque is_int($d) es true)
6. No se ejecuta el segundo if porque $a no es string
7. `$d = $a ? ++$d : $d*3` → Como $a es TRUE, $d = ++$d = 17
8. `$f = doble($d++)` → $f = doble(17) = 34, después $d = 18
9. `$g = $f += 10` → $f = 44, $g = 44
10. `echo $a, $b, $c, $d, $f, $g` → "1xyzxyz184444"

---

## **EJERCICIO 2**

### **a) Comparación de bucles:**

**Código 1:**

```php
<?php
$i = 1;
while ($i <= 10) {
    print $i++;
}
?>
```

**Código 2:**

```php
<?php
$i = 1;
while ($i <= 10):
    print $i;
    $i++;
endwhile;
?>
```

**¿Son equivalentes?** **NO**

- **Código 1:** Imprime `12345678910` (post-incremento)
- **Código 2:** Imprime `12345678910` (pre-incremento separado)

Aunque el resultado final es el mismo, el mecanismo es diferente.

### **b) Comparación de bucles do-while y for:**

**Código 1:**

```php
<?php
$i = 0;
do {
    print ++$i;
} while ($i<10);
?>
```

**Código 2:**

```php
<?php
for ($i = 1; $i <= 10; $i++) {
    print $i;
}
?>
```

**¿Son equivalentes?** **SÍ**
Ambos imprimen: `12345678910`

### **c) Variaciones de bucles for:**

Todos los siguientes códigos son **EQUIVALENTES** y producen la misma salida `12345678910`:

```php
// Código 1
for ($i = 1; $i <= 10; $i++) {
    print $i;
}

// Código 2
for ($i = 1; ;$i++) {
    if ($i > 10) {
        break;
    }
    print $i;
}

// Código 3
$i = 1;
for (;;) {
    if ($i > 10) {
        break;
    }
    print $i;
    $i++;
}

// Código 4
for ($i = 1; $i <= 10; print $i, $i++) ;
```

---

## **EJERCICIO 3**

### **a) Comparación if-elseif vs switch:**

**Código con if-elseif:**

```php
if ($i == 0) {
    print "i equals 0";
} elseif ($i == 1) {
    print "i equals 1";
} elseif ($i == 2) {
    print "i equals 2";
}
```

**Código con switch:**

```php
switch ($i) {
    case 0:
        print "i equals 0";
        break;
    case 1:
        print "i equals 1";
        break;
    case 2:
        print "i equals 2";
        break;
}
```

**¿Para qué se utilizan?**
Ambos códigos son **funcionalmente equivalentes**. Se utilizan para evaluar múltiples condiciones mutuamente excluyentes sobre una misma variable. La estructura `switch` es más eficiente y legible cuando se tienen muchas comparaciones de igualdad.

### **b) Generación de tabla HTML:**

```php
echo "<table width = 90% border = '1' >";
$row = 5;
$col = 2;
for ($r = 1; $r <= $row; $r++) {
    echo "<tr>";
    for ($c = 1; $c <= $col;$c++) {
        echo "<td>&nbsp;</td>\n";
    }
    echo "</tr>\n";
}
echo "</table>\n";
```

**Propósito:** Genera una tabla HTML de 5 filas y 2 columnas vacía, con bordes.

### **c) Formulario de edad:**

```php
if (!isset($_POST['submit'])) {
    // Mostrar formulario
} else {
    $age = $_POST['age'];
    if ($age >= 21) {
        echo 'Mayor de edad';
    } else {
        echo 'Menor de edad';
    }
}
```

**Propósito:** Crea un formulario que solicita la edad y determina si la persona es mayor o menor de edad (usando 21 como límite).

---

## **EJERCICIO 4**

**Archivo datos.php:**

```php
<?php
$color = 'blanco';
$flor = 'clavel';
?>
```

**Código principal:**

```php
<?php
echo "El $flor $color \n";
include 'datos.php';
echo " El $flor $color";
?>
```

### **Salida:**

```
El
 El clavel blanco
```

**Justificación:**

1. Primera línea: Las variables `$flor` y `$color` no están definidas, por lo que se imprimen como cadenas vacías.
2. Se incluye el archivo `datos.php`, definiendo las variables.
3. Segunda línea: Ahora las variables tienen valores y se imprimen correctamente.

---

## **EJERCICIO 5 - Contador de visitas**

### **Análisis del código:**

**contador.php:**

- Abre archivo "contador.dat" en modo lectura
- Lee el contenido (número actual de visitas)
- Cierra el archivo
- Reabre en modo escritura
- Incrementa el contador en 1
- Guarda el nuevo valor
- Muestra el total de visitas

**visitas.php:**

- Página HTML que incluye el contador

### **Funcionamiento:**

1. Cada vez que se accede a `visitas.php`, se ejecuta `contador.php`
2. El contador se incrementa y se guarda en `contador.dat`
3. Se muestra el número actualizado de visitas

**Archivo contador.dat inicial:** Debe contener un número (ej: 0)

---

## **EJERCICIOS DE ARRAYS**

### **Ejercicio 1 - Arrays equivalentes:**

**Código A:**

```php
$a = array( 'color' => 'rojo',
           'sabor' => 'dulce',
           'forma' => 'redonda',
           'nombre' => 'manzana',
           4
);
```

**Código B:**

```php
$a['color'] = 'rojo';
$a['sabor'] = 'dulce';
$a['forma'] = 'redonda';
$a['nombre'] = 'manzana';
$a[] = 4;
```

**¿Son equivalentes?** **SÍ**
Ambos crean el mismo array asociativo con los mismos elementos.

### **Ejercicio 2 - Salidas de arrays:**

**a)**

```php
$matriz = array("x" => "bar", 12 => true);
echo $matriz["x"];     // Salida: bar
echo $matriz[12];      // Salida: 1 (true se convierte a 1)
```

**b)**

```php
$matriz = array("unamatriz" => array(6 => 5, 13 => 9, "a" => 42));
echo $matriz["unamatriz"][6];    // Salida: 5
echo $matriz["unamatriz"][13];   // Salida: 9
echo $matriz["unamatriz"]["a"];  // Salida: 42
```

**c)**

```php
$matriz = array(5 => 1, 12 => 2);
$matriz[] = 56;          // Se agrega en índice 13
$matriz["x"] = 42;       // Se agrega con clave "x"
unset($matriz[5]);       // Se elimina elemento con índice 5
unset($matriz);          // Se elimina todo el array
```

### **Ejercicio 3 - Funciones con arrays:**

**a)**

```php
$fun = getdate();
echo "Has entrado en esta pagina a las $fun[hours] horas, con $fun[minutes] minutos y $fun[seconds] segundos, del $fun[mday]/$fun[mon]/$fun[year]";
```

**Salida:** Muestra la fecha y hora actual del servidor.

**b)**

```php
function sumar($sumando1,$sumando2){
    $suma=$sumando1+$sumando2;
    echo $sumando1."+".$sumando2."=".$suma;
}
sumar(5,6);
```

**Salida:** `5+6=11`

### **Ejercicio 4 - Función de validación:**

**Función analizada:**

```php
function comprobar_nombre_usuario($nombre_usuario){
    // Verifica longitud (entre 3 y 20 caracteres)
    if (strlen($nombre_usuario)<3 || strlen($nombre_usuario)>20){
        echo $nombre_usuario . " no es válido<br>";
        return false;
    }

    // Verifica caracteres permitidos
    $permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_";
    for ($i=0; $i<strlen($nombre_usuario); $i++){
        if (strpos($permitidos, substr($nombre_usuario,$i,1))===false){
            echo $nombre_usuario . " no es válido<br>";
            return false;
        }
    }
    echo $nombre_usuario . " es válido<br>";
    return true;
}
```

**Script de prueba:**

```php
<?php
// Función comprobar_nombre_usuario aquí...

// Pruebas
comprobar_nombre_usuario("ab");           // Muy corto
comprobar_nombre_usuario("usuario123");   // Válido
comprobar_nombre_usuario("user@name");    // Carácter inválido
comprobar_nombre_usuario("nombre_muy_largo_para_ser_valido"); // Muy largo
comprobar_nombre_usuario("User-123");     // Válido
?>
```

**Propósito:** Valida nombres de usuario verificando que tengan entre 3-20 caracteres y solo contengan letras, números, guiones y guiones bajos.
