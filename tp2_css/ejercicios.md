# Práctica N°2 - CSS

## Ejercitación 1: Responder

### 1. ¿Qué es CSS y para qué se usa?

CSS (Cascading Style Sheets o Hojas de Estilo en Cascada) es un lenguaje utilizado para describir la presentación de documentos HTML o XML, incluyendo elementos como colores, diseños y fuentes. Su principal función es separar el contenido (HTML) de la presentación (CSS), lo que permite mayor flexibilidad y control sobre la apariencia de los sitios web, reduciendo la complejidad y repetición en el contenido estructural.

### 2. CSS utiliza reglas para las declaraciones de estilo, ¿cómo funcionan?

Las reglas CSS funcionan con la siguiente estructura:

```css
selector {
  propiedad: valor;
  propiedad2: valor2;
  /* más propiedades y valores */
}
```

- **Selector**: Define a qué elementos HTML se aplicará el estilo.
- **Declaración**: Consiste en una propiedad y su valor, separados por dos puntos y terminando con punto y coma.
- **Bloque de declaraciones**: Conjunto de declaraciones entre llaves `{}`.

### 3. ¿Cuáles son las tres formas de dar estilo a un documento?

1. **CSS Inline**: Utilizando el atributo `style` directamente en los elementos HTML.

   ```html
   <p style="color: blue; font-size: 16px;">Texto con estilo inline</p>
   ```

2. **CSS Interno**: Definiendo los estilos en la sección `<head>` del documento HTML dentro de la etiqueta `<style>`.

   ```html
   <head>
     <style>
       p {
         color: blue;
         font-size: 16px;
       }
     </style>
   </head>
   ```

3. **CSS Externo**: Creando un archivo CSS separado que se vincula al documento HTML.
   ```html
   <head>
     <link rel="stylesheet" href="estilos.css" />
   </head>
   ```

### 4. ¿Cuáles son los distintos tipos de selectores más utilizados? Ejemplifique cada uno.

1. **Selector de elemento**: Selecciona todos los elementos de un tipo específico.

   ```css
   p {
     color: blue;
   }
   ```

2. **Selector de ID**: Selecciona un elemento con un ID específico (único en la página).

   ```css
   #header {
     background-color: black;
   }
   ```

3. **Selector de clase**: Selecciona elementos con una clase específica.

   ```css
   .destacado {
     font-weight: bold;
   }
   ```

4. **Selector universal**: Selecciona todos los elementos.

   ```css
   * {
     margin: 0;
     padding: 0;
   }
   ```

5. **Selector descendente**: Selecciona elementos que son descendientes de otro elemento.

   ```css
   div p {
     color: red;
   }
   ```

6. **Selector de atributo**: Selecciona elementos con un atributo específico.

   ```css
   input[type="text"] {
     border: 1px solid gray;
   }
   ```

7. **Selector de hijo directo**: Selecciona elementos que son hijos directos de otro elemento.

   ```css
   ul > li {
     color: green;
   }
   ```

8. **Selector adyacente**: Selecciona un elemento que está inmediatamente después de otro elemento.
   ```css
   h1 + p {
     font-weight: bold;
   }
   ```

### 5. ¿Qué es una pseudo-clase? ¿Cuáles son las más utilizadas aplicadas a vínculos?

Una pseudo-clase es una palabra clave que se añade a un selector para especificar un estado especial del elemento seleccionado.

Las pseudo-clases más utilizadas para vínculos (enlaces) son:

- `:link` - Enlace no visitado
- `:visited` - Enlace ya visitado
- `:hover` - Cuando el cursor está sobre el enlace
- `:active` - Cuando el enlace está siendo activado (pulsado)
- `:focus` - Cuando el enlace recibe el foco (por ejemplo, mediante tabulación)

Ejemplo:

```css
a:link {
  color: blue;
}
a:visited {
  color: purple;
}
a:hover {
  color: red;
}
a:active {
  color: orange;
}
```

### 6. ¿Qué es la herencia?

La herencia en CSS es el mecanismo por el cual algunas propiedades de estilo aplicadas a un elemento se transmiten a sus elementos descendientes. No todas las propiedades se heredan, pero muchas relacionadas con el texto (como `color`, `font-family`, `font-size`, etc.) sí lo hacen.

Ejemplo:

```css
body {
  font-family: Arial, sans-serif;
  color: #333;
}
```

En este caso, todos los elementos dentro del `body` heredarán la fuente Arial y el color #333, a menos que se especifique lo contrario para ellos.

### 7. ¿En qué consiste el proceso denominado cascada?

La cascada es el algoritmo que determina qué estilos se aplican a un elemento cuando existen múltiples reglas que podrían afectarlo. La cascada funciona según tres factores principales (en orden de prioridad):

1. **Importancia**: Las declaraciones con `!important` tienen la prioridad más alta.
2. **Especificidad**: Cuanto más específico sea un selector, mayor será su prioridad.
3. **Orden de aparición**: Si dos reglas tienen la misma importancia y especificidad, se aplicará la que aparezca en último lugar.

La especificidad se calcula según la siguiente jerarquía (de mayor a menor):

- Estilos inline
- IDs
- Clases, pseudo-clases y atributos
- Elementos y pseudo-elementos

## Ejercicio 2

Analizar el siguiente código señalando declaraciones y aplicaciones de reglas, y su efecto.

```css
p#normal {
  font-family: arial, helvetica;
  font-size: 11px;
  font-weight: bold;
}
*#destacado {
  border-style: solid;
  border-color: blue;
  border-width: 2px;
}
#distinto {
  background-color: #9ec7eb;
  color: red;
}
```

```html
<p id="normal">Este es un párrafo</p>
<p id="destacado">Este es otro párrafo</p>
<table id="destacado">
  <tr>
    <td>Esta es una tabla</td>
  </tr>
</table>
<p id="distinto">Este es el último párrafo</p>
```

**Análisis:**

1. `p#normal`: Esta regla selecciona elementos `<p>` con el ID "normal". Aplica:

   - Fuente Arial o Helvetica
   - Tamaño de fuente de 11px
   - Texto en negrita

2. `*#destacado`: Esta regla selecciona cualquier elemento (\*) con el ID "destacado". Aplica:

   - Borde sólido
   - Color de borde azul
   - Ancho de borde de 2px

3. `#distinto`: Esta regla selecciona cualquier elemento con el ID "distinto". Aplica:
   - Color de fondo #9EC7EB (azul claro)
   - Color de texto rojo

**Efectos:**

- El primer párrafo (`<p id="normal">`) tendrá fuente Arial/Helvetica, tamaño 11px y en negrita.
- El segundo párrafo (`<p id="destacado">`) tendrá un borde sólido azul de 2px.
- La tabla (`<table id="destacado">`) también tendrá un borde sólido azul de 2px.
- El último párrafo (`<p id="distinto">`) tendrá fondo azul claro y texto rojo.

## Ejercicio 3

Analizar el siguiente código señalando declaraciones y aplicaciones de reglas, y su efecto.

```css
p.quitar {
  color: red;
}
*.desarrollo {
  font-size: 8px;
}
.importante {
  font-size: 20px;
}
```

```html
<p class="desarrollo">
  En este primer párrafo trataremos lo siguiente:
  <br />xxxxxxxxxxxxxxxxxxxxxxxxx
</p>
<p class="quitar">
  Este párrafo debe ser quitado de la obra…
  <br />xxxxxxxxxxxxxxxxxxxxxxxxx
</p>
<p>
  En este otro párrafo trataremos otro tema:<br />
  xxxxxxxxxxxxxxxxxxxxxxxxx
</p>
<p class="importante">
  Y este es el párrafo más importante de la obra…
  <br />xxxxxxxxxxxxxxxxxxxxxxxxx
</p>
<h1 class="quitar">Este encabezado también debe ser quitado de la obra</h1>
<p class="quitar importante">Se pueden aplicar varias clases a la vez</p>
```

**Análisis:**

1. `p.quitar`: Esta regla selecciona elementos `<p>` con la clase "quitar". Aplica:

   - Color de texto rojo

2. `*.desarrollo`: Esta regla selecciona cualquier elemento con la clase "desarrollo". Aplica:

   - Tamaño de fuente de 8px

3. `.importante`: Esta regla selecciona cualquier elemento con la clase "importante". Aplica:
   - Tamaño de fuente de 20px

**Efectos:**

- El primer párrafo (`<p class="desarrollo">`) tendrá un tamaño de fuente de 8px.
- El segundo párrafo (`<p class="quitar">`) tendrá color de texto rojo.
- El tercer párrafo (`<p>`) no tiene clases asignadas, por lo que tendrá los estilos por defecto.
- El cuarto párrafo (`<p class="importante">`) tendrá un tamaño de fuente de 20px.
- El encabezado (`<h1 class="quitar">`) no se verá afectado por la regla `p.quitar` ya que no es un párrafo, mantendrá los estilos por defecto de h1.
- El último párrafo (`<p class="quitar importante">`) tendrá color de texto rojo (por la clase "quitar") y tamaño de fuente de 20px (por la clase "importante"). En caso de conflicto, la clase "importante" tiene prioridad para el tamaño de fuente porque está definida después en el CSS.

## Ejercicio 4

Dadas las siguientes declaraciones:

```css
* {
  color: green;
}
a:link {
  color: gray;
}
a:visited {
  color: blue;
}
a:hover {
  color: fuchsia;
}
a:active {
  color: red;
}
p {
  font-family: arial, helvetica;
  font-size: 10px;
  color: black;
}
.contenido {
  font-size: 14px;
  font-weight: bold;
}
```

Analizar los siguientes códigos y comparar sus efectos:

**Código 1:**

```html
<body>
  <p class="contenido" style="font-weight: normal;">
    Este es un texto ...............
  </p>
  <table>
    <tr>
      <td>Y esta es una tabla.......</td>
    </tr>
    <tr>
      <td><a href="http://www.google.com.ar">con un enlace</a></td>
    </tr>
  </table>
</body>
```

**Código 2:**

```html
<body class="contenido">
  <p>Este es un texto................</p>
  <table>
    <tr>
      <td>Y esta es una tabla.......</td>
    </tr>
    <tr>
      <td><a href="http://www.google.com.ar">con un enlace</a></td>
    </tr>
  </table>
</body>
```

**Análisis y comparación:**

**Código 1:**

- El selector universal `*` establece color verde para todos los elementos, pero luego se sobrescriben para elementos específicos.
- El párrafo `<p>` tiene la clase "contenido", por lo que tiene tamaño de fuente 14px y debería tener negrita, pero el estilo inline `style="font-weight: normal;"` anula la negrita.
- El texto del párrafo es negro (por la regla `p {color:black;}`).
- El texto de la tabla es verde (por la regla `* {color:green;}`).
- El enlace será gris cuando no se haya visitado, azul después de visitado, fucsia al pasar el cursor por encima y rojo al hacer clic.

**Código 2:**

- La clase "contenido" se aplica al elemento `<body>`, por lo que todos los elementos dentro del body heredarán los estilos de esta clase donde sea posible.
- El párrafo `<p>` heredará el tamaño de fuente de 14px y la negrita de su padre `<body class="contenido">`, pero mantendrá su color negro por la regla específica `p {color:black;}`.
- El texto de la tabla será verde (por la regla `* {color:green;}`) pero tendrá tamaño de fuente 14px y estará en negrita (heredados del body).
- El enlace seguirá el mismo comportamiento para los estados `:link`, `:visited`, `:hover` y `:active`, pero heredará el tamaño de fuente 14px y la negrita del `<body>`.

**Principales diferencias:**

1. En el Código 1, solo el párrafo tiene tamaño 14px y no tiene negrita (por el estilo inline).
2. En el Código 2, todos los elementos heredan tamaño 14px y negrita del body, excepto donde se sobrescriben por reglas más específicas.

## Ejercicio 5

En cada caso, declarar una regla CSS que produzca el siguiente efecto:

### 1. Los textos enfatizados dentro de cualquier título deben ser rojos.

```css
h1 em,
h2 em,
h3 em,
h4 em,
h5 em,
h6 em {
  color: red;
}
```

Alternativamente:

```css
:is(h1, h2, h3, h4, h5, h6) em {
  color: red;
}
```

### 2. Cualquier elemento que tenga asignado el atributo "href" y que esté dentro de cualquier párrafo que a su vez esté dentro de un bloque debe ser color negro.

```css
div p [href] {
  color: black;
}
```

### 3. El texto de las listas no ordenadas que estén dentro del bloque identificado como "ultimo" debe ser amarillo pero si es un enlace a otra página debe ser azul.

```css
#ultimo ul {
  color: yellow;
}

#ultimo ul a {
  color: blue;
}
```

### 4. Los elementos identificados como "importante" dentro de cualquier bloque deben ser verdes, pero si están dentro de un título deben ser rojos.

```css
div #importante {
  color: green;
}

h1 #importante,
h2 #importante,
h3 #importante,
h4 #importante,
h5 #importante,
h6 #importante {
  color: red;
}
```

### 5. Todos los elementos h1 que especifique el atributo title, cualquiera que sea su valor, deben ser azules.

```css
h1[title] {
  color: blue;
}
```

### 6. El color de los enlaces en las listas ordenadas debe ser azul para los enlaces aún no visitados, y violeta para los ya visitados y, además, no deben aparecer subrayados.

```css
ol a:link {
  color: blue;
  text-decoration: none;
}

ol a:visited {
  color: violet;
  text-decoration: none;
}
```

## Ejercicio 6

Dado los códigos de los documentos principal.html y estilo2.css, realizar las modificaciones necesarias en el documento HTML para reemplazar la hoja de estilo interna por la externa estilo2.css (sin modificarla) y obtener la misma salida en el navegador.

**Solución: principal.html modificado**

```html
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML lang=es xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
  <TITLE>Página Principal</TITLE>
  <META http-equiv=Content-Type content="text/html; charset=iso-8859-1"></META>
  <link rel="stylesheet" href="estilo2.css">
</HEAD>
<BODY>
  <DIV id=encabezado><H1>ASIGNATURA ELECTIVA</H1></DIV>
  <DIV id=contenido>
    <H2>Contenido</H2>
    <p>En esta asignatura ...........................<BR></p>
    <P>El objetivo fundamental ..................</P>
    <P>etc., etc., ...........................................</P>
    <P>etc., etc., ...........................................</P>
    <P>Adem&aacute;s, ...........................................</P>
    <P>etc., etc., ...........................................</P>
    <P class="resaltado">Pero, lo más importante es ..............................</P>
    <P class="resaltado">etc., etc., ...........................................</P>
    <P>Y, entonces, podemos continuar con ..................</P>
    <P>etc., etc., ...........................................</P>
    <P>&nbsp;</P>
  </DIV>
  <DIV id=menu>
    <H3>Enlaces</H3>
    <UL class="vineta">
      <LI><A href="http://www.e-style.com.ar/moodle" target=_blank>Curso Actual</A>
      <LI><A href="http://www.e-style.com.ar/logica" target=_blank>Curso anterior</A> </LI>
      <LI><A href="http://www.e-style.com.ar/ntedu/consultas.htm" target=_blank>Contacto</A></LI>
    </UL>
  </DIV>
  <DIV id=pie class="estilopie">Ingeniería en Sistemas de Información - Universidad Tecnológica Nacional Rosario</DIV>
  <p>&nbsp;</p>
</BODY>
</HTML>
```

**Cambios realizados:**

1. Eliminé la etiqueta `<style>` y su contenido, y agregué un enlace a la hoja de estilo externa:

   ```html
   <link rel="stylesheet" href="estilo2.css" />
   ```

2. Cambié el `id="titulo"` por `id="encabezado"` para que coincida con el selector en estilo2.css.

3. Eliminé la clase `class="navBar"` del div con id "menu" ya que en estilo2.css las propiedades están definidas directamente para el id #menu.

4. Agregué la clase `class="vineta"` a la lista desordenada (UL) para aplicar el estilo de viñeta cuadrada.

5. Agregué la clase `class="estilopie"` al div con id "pie" para aplicar los estilos de borde, tamaño de fuente y color.

## Ejercicio 7

Completar el juego para practicar sobre selectores http://flukeout.github.io/
