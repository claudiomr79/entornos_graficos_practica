# Práctica Complementaria - HTML5

## Ejercitación 1 - Ventajas de HTML5

### 1. ¿Ventajas de HTML5?

- Semántica mejorada con nuevas etiquetas estructurales (`<header>`, `<footer>`, `<article>`, `<section>`, etc.)
- Soporte nativo para multimedia (audio y video)
- Mejores capacidades para formularios con nuevos tipos de inputs y validación
- Almacenamiento local y offline
- Mejor rendimiento y eficiencia
- Compatibilidad con dispositivos móviles

### 2. ¿Por qué utilizarlo?

- Es el estándar web actual y tiene amplio soporte en navegadores
- Reduce la dependencia de plugins como Flash
- Mejora la accesibilidad y SEO
- Facilita el desarrollo de aplicaciones web responsivas
- Proporciona APIs modernas para desarrollo web

### 3. Nombre ventajas

- `<canvas>` para gráficos dinámicos
- Geolocalización
- WebSockets para comunicación en tiempo real
- Drag and Drop nativo
- APIs de almacenamiento local (localStorage, sessionStorage)

## Ejercitación 2 - Etiquetas de Audio

### 2.A) ¿Qué formatos soporta?

- MP3
- WAV
- OGG
- AAC (en algunos navegadores)

### 2.B) Crear un elemento audio

```html
<audio controls>
  <source
    src="https://html5tutorial.info/media/vincent.mp3"
    type="audio/mpeg"
  />
</audio>
```

## Ejercitación 3 - Etiquetas de Video

### 3.A) ¿Qué formatos soporta?

- MP4 (H.264)
- WebM
- OGG (Theora)

### 3.B) Crear un elemento video

```html
<video width="320" height="240" controls>
  <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4" />
  <source src="https://www.w3schools.com/html/mov_bbb.ogg" type="video/ogg" />
</video>
```

## Ejercitación 4 - Aplicación en Formularios

### 4.A) Crear un formulario con un campo requerido

```html
<form>
  <label for="nombre">Nombre:</label>
  <input type="text" id="nombre" name="nombre" required />
  <input type="submit" value="Enviar" />
</form>
```

### 4.B) Crear un formulario con un campo de tipo email

```html
<form>
  <label for="email">Correo electrónico:</label>
  <input type="email" id="email" name="email" />
  <input type="submit" value="Enviar" />
</form>
```

### 4.C) Crear un formulario con un campo de tipo fecha

```html
<form>
  <label for="fecha">Fecha:</label>
  <input type="date" id="fecha" name="fecha" />
  <input type="submit" value="Enviar" />
</form>
```

### 4.D) Crear un formulario con un campo de tipo color

```html
<form>
  <label for="color">Selecciona un color:</label>
  <input type="color" id="color" name="color" />
  <input type="submit" value="Enviar" />
</form>
```

### 4.E) Crear un formulario con un campo de tipo number con valores mínimos y máximos

```html
<form>
  <label for="numero">Número (entre 1 y 10):</label>
  <input type="number" id="numero" name="numero" min="1" max="10" />
  <input type="submit" value="Enviar" />
</form>
```
