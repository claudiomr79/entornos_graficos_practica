### Ejercitación 1 - Cuestionario sobre HTML

#### 1. ¿Qué es HTML, cuándo fue creado, cuáles fueron las distintas versiones y cuál es la última?

HTML (HyperText Markup Language) es un lenguaje de marcado utilizado para crear y estructurar páginas web. Fue creado por Tim Berners-Lee en 1991.
Versiones principales:

HTML 1.0 (1991) - Versión inicial
HTML 2.0 (1995) - Primera especificación oficial
HTML 3.2 (1997) - Incorporó tablas y más opciones de formato
HTML 4.0 (1997) - Añadió hojas de estilo (CSS), scripts y frames
HTML 4.01 (1999) - Versión revisada de HTML 4.0
XHTML 1.0 (2000) - Reformulación de HTML como aplicación XML
HTML5 (2014) - Versión oficial publicada por W3C
HTML 5.1 (2016) - Mejoras a HTML5
HTML 5.2 (2017) - Última versión recomendada por W3C

La versión más reciente es HTML 5.2

#### 2. ¿Cuáles son los principios básicos que el W3C recomienda seguir para la creación de documentos con HTML?

Separación de contenido y presentación: Usar HTML para estructura y CSS para presentación
Código válido: Cumplir con las especificaciones del W3C
Semántica: Usar etiquetas que describan el significado del contenido, no su apariencia
Accesibilidad: Crear contenido accesible para todos los usuarios, incluidos aquellos con discapacidades
Compatibilidad: Asegurar que el sitio funcione en diferentes navegadores y dispositivos
Progresividad: Diseñar pensando en que funcione en versiones antiguas y mejore en las modernas
Internacionalización: Facilitar la adaptación a diferentes idiomas y culturas

#### 3. En las Especificaciones de HTML, ¿cuándo un elemento o atributo se considera desaprobado? ¿y obsoleto?

Desaprobado (Deprecated): Un elemento o atributo se considera desaprobado cuando su uso ya no se recomienda en la especificación actual, pero aún se mantiene por compatibilidad con versiones anteriores. Los navegadores siguen reconociéndolos, pero se advierte que en futuras versiones podrían eliminarse.
Obsoleto (Obsolete): Un elemento o atributo se considera obsoleto cuando ha sido completamente eliminado de la especificación y no debería utilizarse. Los navegadores pueden seguir reconociéndolos por compatibilidad, pero no hay garantía de que continúen siendo soportados.

#### 4. ¿Qué es el DTD y cuáles son los posibles DTDs contemplados en la especificación de HTML 4.01?

DTD (Document Type Definition) es una declaración que define la estructura y los elementos permitidos en un documento HTML. En HTML 4.01 existen tres tipos de DTD:

Strict DTD: Excluye elementos y atributos de presentación desaprobados. Se enfoca en la estructura y semántica del documento.

Transitional DTD: Incluye elementos y atributos de presentación desaprobados para mantener compatibilidad con navegadores antiguos.

Frameset DTD: Extiende el transitional e incluye elementos para crear marcos (frames).

#### 5. ¿Qué son los metadatos y cómo se especifican en HTML?

Los metadatos son datos que proporcionan información sobre otros datos, en este caso, información sobre el documento HTML. Describen características como el autor, palabras clave, descripción, codificación de caracteres, etc.
En HTML, los metadatos se especifican principalmente dentro del elemento `<head>` utilizando las siguientes etiquetas:

`<meta>`: Para información general como descripción, palabras clave, autor, etc.
`<meta name="description" content="Descripción de la página">`
`<meta name="keywords" content="HTML, CSS, JavaScript">`
`<meta name="author" content="Nombre del Autor">`
`<meta http-equiv="content-type" content="text/html; charset=UTF-8">`

`<title>`: Define el título del documento que aparece en la pestaña del navegador
`<title>Título de la página</title>`

`<link>`: Para relacionar el documento con recursos externos, como hojas de estilo
`<link rel="stylesheet" href="estilos.css">`

// ...existing code...
`<style>`: Para definir estilos CSS internos

```html
<style>
  body {
    background-color: lightblue;
  }
</style>
```

### Ejercitación 2 - Análisis de código HTML

#### 2.a) Comentario HTML

```html
<!-- Código controlado el día 12/08/2009 -->
```

**Sección**: Puede estar en cualquier parte del documento  
**Efecto**: Es un comentario, no produce ningún efecto visual en el navegador  
**Elementos**: Es un comentario HTML, no un elemento en sí  
**Etiquetas**: Etiqueta de inicio `<!--` y cierre `-->`  
**Atributos**: No tiene atributos

#### 2.b) Div

```html
<div id="bloque1">Contenido del bloque1</div>
```

**Sección**: Típicamente en el `<body>`, pero puede estar en cualquier lugar dentro de él  
**Efecto**: Crea un bloque de contenido (división) en la página  
**Elementos**: Elemento div con contenido "Contenido del bloque1"  
**Etiquetas**: Etiqueta de apertura `<div>` y cierre `</div>`  
**Atributos**: id="bloque1" (no obligatorio, pero útil para identificar el elemento)

#### 2.c) Imagen

```html
<img
  src=""
  alt="lugar imagen"
  id="im1"
  name="im1"
  width="32"
  height="32"
  longdesc="detalles.htm"
/>
```

**Sección**: En el `<body>`  
**Efecto**: Inserta una imagen (aunque la fuente está vacía)  
**Elementos**: Elemento img (vacío)  
**Etiquetas**: Etiqueta única `<img />` (elemento vacío)  
**Atributos**:

- src="" (obligatorio, pero en este caso está vacío)
- alt="lugar imagen" (obligatorio para accesibilidad)
- id="im1" (no obligatorio)
- name="im1" (no obligatorio, desaprobado en HTML5)
- width="32" (no obligatorio)
- height="32" (no obligatorio)
- longdesc="detalles.htm" (no obligatorio, desaprobado en HTML5)

#### 2.d) Metadatos

```html
<meta name="keywords" lang="es" content="casa, compra, venta, alquiler " />
<meta http-equiv="expires" content="16-Sep-2019 7:49 PM" />
```

**Sección**: En el `<head>`  
**Efecto**: Define metadatos para el documento  
**Elementos**: Dos elementos meta (vacíos)  
**Etiquetas**: `<meta />` (elemento vacío)  
**Atributos (primera etiqueta)**:

- name="keywords" (no obligatorio, pero necesario para definir el tipo de metadato)
- lang="es" (no obligatorio)
- content="casa, compra, venta, alquiler" (obligatorio cuando se usa name)

**Atributos (segunda etiqueta)**:

- http-equiv="expires" (no obligatorio, pero necesario para este tipo de metadato)
- content="16-Sep-2019 7:49 PM" (obligatorio cuando se usa http-equiv)

#### 2.e) Enlace

```html
<a
  href="http://www.e-style.com.ar/resumen.html"
  type="text/html"
  hreflang="es"
  charset="utf-8"
  rel="help"
  >Resumen HTML
</a>
```

**Sección**: En el `<body>`  
**Efecto**: Crea un enlace a otra página web  
**Elementos**: Elemento a con contenido "Resumen HTML"  
**Etiquetas**: Etiqueta de apertura `<a>` y cierre `</a>`  
**Atributos**:

- href="http://www.e-style.com.ar/resumen.html" (obligatorio para crear un enlace)
- type="text/html" (no obligatorio)
- hreflang="es" (no obligatorio)
- charset="utf-8" (no obligatorio, desaprobado en HTML5)
- rel="help" (no obligatorio)

#### 2.f) Tabla

```html
<table width="200" summary="Datos correspondientes al ejercicio vencido">
  <caption align="top">
    Título
  </caption>
  <tr>
    <th scope="col">&nbsp;</th>
    <th scope="col">A</th>
    <th scope="col">B</th>
    <th scope="col">C</th>
  </tr>
  <tr>
    <th scope="row">1º</th>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row">2º</th>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
```

**Sección**: En el `<body>`  
**Efecto**: Crea una tabla con encabezados de columnas y filas  
**Elementos**: table, caption, tr, th, td  
**Etiquetas**: Etiquetas de apertura y cierre para cada elemento  
**Atributos**:

En `<table>`:

- width="200" (no obligatorio, desaprobado en HTML5)
- summary="Datos correspondientes al ejercicio vencido" (no obligatorio, desaprobado en HTML5)

En `<caption>`:

- align="top" (no obligatorio, desaprobado en HTML5)

En `<th>`:

- scope="col" o scope="row" (no obligatorio, pero recomendado para accesibilidad)

### Ejercitación 3 - Diferencias entre segmentos de código

#### 3.a) Enlaces (anchors)

```html
<a href="http://www.google.com.ar">Click aquí para ir a Google</a>
<a href="http://www.google.com.ar" target="_blank"
  >Click aquí para ir a Google</a
>
<a
  href="http://www.google.com.ar"
  type="text/html"
  hreflang="es"
  charset="utf-8"
  rel="help"
>
  <a href="#">Click aquí para ir a Google</a>
  <a href="#arriba">Click aquí para volver arriba</a>
  <a name="arriba" id="arriba"></a
></a>
```

**Diferencias**:

- **Primer enlace**: Enlace estándar a Google que se abre en la misma ventana/pestaña
- **Segundo enlace**: Enlace a Google que se abre en una nueva ventana/pestaña (`target="_blank"`)
- **Tercer enlace**: Enlace incompleto (falta cierre) con atributos adicionales de tipo, idioma, codificación y relación
- **Cuarto enlace**: Enlace a la página actual (`href="#"`)
- **Quinto enlace**: Enlace a un marcador en la misma página (`href="#arriba"`)
- **Sexto elemento**: Define un marcador llamado "arriba" para navegación interna en la página (no es un enlace visible)

#### 3.b) Combinación de imágenes y enlaces

```html
<p>
  <img src="im1.jpg" alt="imagen1" /><a href="http://www.google.com.ar"
    >Click aquí</a
  >
</p>
<p>
  <a href="http://www.google.com.ar"><img src="im1.jpg" alt="imagen1" /></a>
  Click aquí
</p>
<p>
  <a href="http://www.google.com.ar"
    ><img src="im1.jpg" alt="imagen1" />Click aquí</a
  >
</p>
<p>
  <a href="http://www.google.com.ar"><img src="im1.jpg" alt="imagen1" /></a>
  <a href="http://www.google.com.ar">Click aquí</a>
</p>
```

**Diferencias**:

- **Primer caso**: Imagen y enlace separados (la imagen no es clickeable)
- **Segundo caso**: Imagen clickeable (enlace) y texto "Click aquí" normal (no clickeable)
- **Tercer caso**: Tanto la imagen como el texto "Click aquí" son clickeables (parte del mismo enlace)
- **Cuarto caso**: Imagen clickeable y texto "Click aquí" clickeable como enlaces separados (ambos van a la misma URL)

#### 3.c) Listas

```html
<ul>
  <li>xxx</li>
  <li>yyy</li>
  <li>zzz</li>
</ul>

<ol>
  <li>xxx</li>
  <li>yyy</li>
  <li>zzz</li>
</ol>

<ol>
  <li>xxx</li>
</ol>
<ol>
  <li value="2">yyy</li>
</ol>
<ol>
  <li value="3">zzz</li>
</ol>

<blockquote>
  <p>
    1. xxx<br />
    2. yyy<br />
    3. zzz
  </p>
</blockquote>
```

**Diferencias**:

- **Primer caso**: Lista no ordenada (viñetas)
- **Segundo caso**: Lista ordenada (números 1, 2, 3)
- **Tercer caso**: Tres listas ordenadas separadas, con valores específicos (1, 2, 3)
- **Cuarto caso**: Texto con formato de bloque de cita que simula una lista numerada (no es realmente una lista, solo texto con formato)

#### 3.d) Tablas con cabeceras

```html
<table border="1" width="300">
  <tr>
    <th>Columna 1</th>
    <th>Columna 2</th>
  </tr>
  <tr>
    <td>Celda 1</td>
    <td>Celda 2</td>
  </tr>
  <tr>
    <td>Celda 3</td>
    <td>Celda 4</td>
  </tr>
</table>

<table border="1" width="300">
  <tr>
    <td>
      <div align="center"><strong>Columna1</strong></div>
    </td>
    <td>
      <div align="center"><strong>Columna2</strong></div>
    </td>
  </tr>
  <tr>
    <td>Celda 1</td>
    <td>Celda 2</td>
  </tr>
  <tr>
    <td>Celda 3</td>
    <td>Celda 4</td>
  </tr>
</table>
```

**Diferencias**:

- **Primer tabla**: Usa elementos `<th>` para las cabeceras (semánticamente correcto)
- **Segunda tabla**: Simula cabeceras usando celdas normales (`<td>`) con texto centrado y en negrita (menos semántico)

#### 3.e) Tablas con títulos

```html
<table width="200">
  <caption>
    Título
  </caption>
  <tr>
    <td bgcolor="#dddddd">&nbsp;</td>
    <td bgcolor="#dddddd">&nbsp;</td>
    <td bgcolor="#dddddd">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#dddddd">&nbsp;</td>
    <td bgcolor="#dddddd">&nbsp;</td>
    <td bgcolor="#dddddd">&nbsp;</td>
  </tr>
</table>

<table width="200">
  <tr>
    <td colspan="3"><div align="center">Título</div></td>
  </tr>
  <tr>
    <td bgcolor="#dddddd">&nbsp;</td>
    <td bgcolor="#dddddd">&nbsp;</td>
    <td bgcolor="#dddddd">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#dddddd">&nbsp;</td>
    <td bgcolor="#dddddd">&nbsp;</td>
    <td bgcolor="#dddddd">&nbsp;</td>
  </tr>
</table>
```

**Diferencias**:

- **Primera tabla**: Usa el elemento `<caption>` para el título (fuera de las filas de la tabla)
- **Segunda tabla**: Usa una fila normal con una celda que abarca tres columnas (`colspan="3"`) para simular un título

#### 3.f) Combinación de celdas

```html
<table width="200">
  <tr>
    <td colspan="3"><div align="center">Título</div></td>
  </tr>
  <tr>
    <td rowspan="2" bgcolor="#dddddd">&nbsp;</td>
    <td bgcolor="#dddddd">&nbsp;</td>
    <td bgcolor="#dddddd">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#dddddd">&nbsp;</td>
    <td bgcolor="#dddddd">&nbsp;</td>
  </tr>
</table>

<table width="200">
  <tr>
    <td colspan="3"><div align="center">Título</div></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#dddddd">&nbsp;</td>
    <td bgcolor="#dddddd">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#dddddd">&nbsp;</td>
    <td bgcolor="#dddddd">&nbsp;</td>
    <td bgcolor="#dddddd">&nbsp;</td>
  </tr>
</table>
```

**Diferencias**:

- **Primera tabla**: Usa `rowspan="2"` para que una celda ocupe dos filas verticalmente
- **Segunda tabla**: Usa `colspan="2"` para que una celda ocupe dos columnas horizontalmente

#### 3.g) Estructura de tablas complejas

```html
<table width="200" border="1">
  <tr>
    <td colspan="3"><div align="center">Título</div></td>
  </tr>
  <tr>
    <td colspan="2" rowspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="50%">&nbsp;</td>
  </tr>
</table>

<table width="200" border="1" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2"><div align="center">Título</div></td>
  </tr>
  <tr>
    <td rowspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="50%">&nbsp;</td>
  </tr>
</table>
```

**Diferencias**:

- **Primera tabla**:

  - Tiene una estructura de 3 columnas en la primera fila
  - Segunda fila tiene una celda que abarca 2 columnas y 2 filas
  - No especifica cellpadding o cellspacing

- **Segunda tabla**:
  - Tiene una estructura de 2 columnas en todas las filas
  - Usa cellpadding="0" y cellspacing="0" para eliminar espacios entre celdas

#### 3.h) Formularios

```html
<form id="form1" name="form1" action="procesar.php" method="post" target="_blank">
  <fieldset>
    <legend>LOGIN</legend>
    Usuario: <input type="text" id="usu1" name="usu1" value="xxx" /><br />
    Clave: <input type="password" id="clave1" name="clave1" value="xxx" />
  </fieldset>
  <input type="submit" id="boton1" name="boton1" value="Enviar" />
</form>

<form id="form2" name="form2" action="" method="get" target="_blank">
  LOGIN<br />
  <label>Usuario: <input type="text" id="usu2" name="usu2" /></label><br />
  <label>Clave: <input type="text" id="clave2" name="clave2" /></label><br />
  <input type="submit" id="boton2" name="boton2" value="Enviar" />
</form>

<form id="form3" name="form3" action="mailto:xx@xx.com" enctype=text/plain method="post" target="_blank">
  <fieldset>
    <legend>LOGIN</legend>
    Usuario: <input type="text" id="usu3" name="usu3" /><br />
    Clave: <input type="password" id="clave3" name="clave3" />
  </fieldset>
  <input type="reset" id="boton3" name="boton3" value="Enviar" />
</form>
```

**Diferencias**:

- **Primer formulario**:

  - Envía datos a "procesar.php" usando POST
  - Usa fieldset y legend para agrupar campos
  - Contraseña oculta con type="password"
  - Tiene valores predeterminados (value="xxx")
  - Botón de tipo "submit"

- **Segundo formulario**:

  - No especifica URL de destino (action="")
  - Usa método GET
  - No usa fieldset, solo texto "LOGIN"
  - Usa etiquetas `<label>` para asociar texto con campos
  - La contraseña es visible (usa type="text" en lugar de "password")
  - No tiene valores predeterminados

- **Tercer formulario**:
  - Envía por correo electrónico (action="mailto:xx@xx.com")
  - Especifica enctype=text/plain
  - Usa fieldset y legend
  - Contraseña oculta con type="password"
  - Usa botón de tipo "reset" (borra el formulario) aunque el valor dice "Enviar"

#### 3.i) Botones

```html
<label
  >Botón 1
  <button type="button" name="boton1" id="boton1">
    <img src="logo.jpg" alt="Botón con imagen " width="30" height="20" /><br />
    <b>CLICK AQUÍ</b>
  </button>
</label>

<label
  >Botón 2
  <input type="button" name="boton2" id="boton2" value="CLICK AQUÍ" />
</label>
```

**Diferencias**:

- **Primer botón**:

  - Usa elemento `<button>` que puede contener otros elementos HTML
  - Incluye una imagen y texto en negrita
  - Permite diseño más complejo

- **Segundo botón**:
  - Usa elemento `<input>` con type="button"
  - Solo puede contener texto simple (valor del atributo value)
  - Diseño más limitado

#### 3.j) Botones de radio

```html
<p>
  <label><input type="radio" name="opcion" id="X" value="X" />X</label><br />
  <label><input type="radio" name="opcion" id="Y" value="Y" />Y</label>
</p>

<p>
  <label><input type="radio" name="opcion1" id="X" value="X" />X</label><br />
  <label><input type="radio" name="opcion2" id="Y" value="Y" />Y</label>
</p>
```

**Diferencias**:

- **Primer grupo**:

  - Ambos botones tienen el mismo nombre (name="opcion")
  - Forman un grupo donde solo se puede seleccionar uno a la vez

- **Segundo grupo**:
  - Tienen nombres diferentes (name="opcion1" y name="opcion2")
  - Son independientes, ambos pueden seleccionarse simultáneamente

#### 3.k) Listas desplegables

```html
<select name="lista">
  <optgroup label="Caso 1">
    <option>Mayo</option>
    <option>Junio</option>
  </optgroup>
  <optgroup label="Caso 2">
    <option>Mayo</option>
    <option>Junio</option>
  </optgroup>
</select>

<select name="lista[]" multiple="multiple">
  <optgroup label="Caso 1">
    <option>Mayo</option>
    <option>Junio</option>
  </optgroup>
  <optgroup label="Caso 2">
    <option>Mayo</option>
    <option>Junio</option>
  </optgroup>
</select>
```

**Diferencias**:

- **Primera lista**:

  - Lista desplegable estándar donde solo se puede seleccionar una opción
  - Nombre simple name="lista"

- **Segunda lista**:
  - Lista de selección múltiple (multiple="multiple")
  - Permite seleccionar varias opciones (manteniendo presionada la tecla Ctrl o Cmd)
  - Nombre con notación de array name="lista[]"
