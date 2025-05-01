# Bootstrap Exercises Solution

## Práctica 1: Introducción / Instalar Bootstrap

### Ejercicio 1: Importar Bootstrap

```html
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Práctica Bootstrap</title>
    <!-- Bootstrap CSS desde CDN -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <!-- Alternativa: Descarga local -->
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="estilo.css" rel="stylesheet" />
  </head>
  <body>
    <!-- Contenido aquí -->

    <!-- Bootstrap JS desde CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Alternativa: Descarga local -->
    <!-- <script src="js/bootstrap.bundle.min.js"></script> -->
  </body>
</html>
```

### Ejercicio 2: Crear container con fila y columna

```html
<div class="container">
  <div class="row">
    <div class="col">Contenido de la columna</div>
  </div>
</div>
```

### Ejercicio 3: Crear y aplicar estilo personalizado

#### estilo.css

```css
.contenedor {
  background-color: #f0ad4e; /* color naranja como ejemplo */
  padding: 20px;
  margin-top: 20px;
  border-radius: 5px;
}
```

#### Aplicación en HTML

```html
<div class="container contenedor">
  <div class="row">
    <div class="col">Contenido de la columna con estilo personalizado</div>
  </div>
</div>
```

## Práctica 2: Sistema de Grilla o Rejillas

### Ejercicio 1: Estructura con comportamiento responsivo

```html
<div class="container">
  <!-- Primera fila - siempre ocupa el 100% -->
  <div class="row">
    <div class="col-12">Primera fila - Columna única</div>
  </div>

  <!-- Segunda fila - se divide en 2 columnas para resoluciones mayores a sm -->
  <div class="row">
    <div class="col-12 col-md-6">
      Segunda fila - Primera columna (ocupa el 50% en md o superior)
    </div>
    <div class="col-12 col-md-6">
      Segunda fila - Segunda columna (ocupa el 50% en md o superior)
    </div>
  </div>
</div>
```

### Ejercicio 2: Estructura de sitio web completa

```html
<div class="container">
  <!-- Encabezado -->
  <div class="row mb-3">
    <div class="col-12 bg-primary p-3 text-white">Encabezado</div>
  </div>

  <!-- Contenido principal -->
  <div class="row">
    <!-- Sidebar - 3 columnas para md+ y 12 para sm- -->
    <div class="col-12 col-md-3 bg-success p-3 mb-3">
      Sidebar

      <!-- Botón para abrir el modal (Práctica 3, ejercicio 2) -->
      <button
        type="button"
        class="btn btn-primary mt-3"
        data-bs-toggle="modal"
        data-bs-target="#exampleModal"
      >
        Abrir Modal
      </button>

      <!-- Modal -->
      <div
        class="modal fade"
        id="exampleModal"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">
                Título del Modal
              </h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">Contenido del modal</div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-secondary"
                data-bs-dismiss="modal"
              >
                Cerrar
              </button>
              <button type="button" class="btn btn-primary">
                Guardar cambios
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Contenido principal - 9 columnas para md+ y 12 para sm- -->
    <div class="col-12 col-md-9">
      <!-- Primera fila del contenido principal -->
      <div class="row mb-3">
        <div class="col-12 col-md-4">
          <!-- Card 1 (Práctica 3, ejercicio 3) -->
          <div class="card">
            <img
              src="https://via.placeholder.com/150"
              class="card-img-top"
              alt="Imagen de ejemplo"
            />
            <div class="card-body">
              <h5 class="card-title">Título de la Card 1</h5>
              <p class="card-text">Contenido de ejemplo para la card 1.</p>
              <a href="#" class="btn btn-primary">Más información</a>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-4">
          <!-- Card 2 (Práctica 3, ejercicio 3) -->
          <div class="card">
            <img
              src="https://via.placeholder.com/150"
              class="card-img-top"
              alt="Imagen de ejemplo"
            />
            <div class="card-body">
              <h5 class="card-title">Título de la Card 2</h5>
              <p class="card-text">Contenido de ejemplo para la card 2.</p>
              <a href="#" class="btn btn-primary">Más información</a>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-4">
          <!-- Card 3 (Práctica 3, ejercicio 3) -->
          <div class="card">
            <img
              src="https://via.placeholder.com/150"
              class="card-img-top"
              alt="Imagen de ejemplo"
            />
            <div class="card-body">
              <h5 class="card-title">Título de la Card 3</h5>
              <p class="card-text">Contenido de ejemplo para la card 3.</p>
              <a href="#" class="btn btn-primary">Más información</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Segunda fila del contenido principal -->
      <div class="row mb-3">
        <div class="col-12 col-md-6">
          <!-- Card 4 (Práctica 3, ejercicio 3) -->
          <div class="card">
            <img
              src="https://via.placeholder.com/150"
              class="card-img-top"
              alt="Imagen de ejemplo"
            />
            <div class="card-body">
              <h5 class="card-title">Título de la Card 4</h5>
              <p class="card-text">Contenido de ejemplo para la card 4.</p>
              <a href="#" class="btn btn-primary">Más información</a>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 bg-info p-3">
          <!-- Slider/Carousel (Práctica 3, ejercicio 4) -->
          <div
            id="carouselExample"
            class="carousel slide"
            data-bs-ride="carousel"
          >
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img
                  src="https://via.placeholder.com/800x400?text=Slide+1"
                  class="d-block w-100"
                  alt="Slide 1"
                />
              </div>
              <div class="carousel-item">
                <img
                  src="https://via.placeholder.com/800x400?text=Slide+2"
                  class="d-block w-100"
                  alt="Slide 2"
                />
              </div>
              <div class="carousel-item">
                <img
                  src="https://via.placeholder.com/800x400?text=Slide+3"
                  class="d-block w-100"
                  alt="Slide 3"
                />
              </div>
            </div>
            <button
              class="carousel-control-prev"
              type="button"
              data-bs-target="#carouselExample"
              data-bs-slide="prev"
            >
              <span
                class="carousel-control-prev-icon"
                aria-hidden="true"
              ></span>
              <span class="visually-hidden">Anterior</span>
            </button>
            <button
              class="carousel-control-next"
              type="button"
              data-bs-target="#carouselExample"
              data-bs-slide="next"
            >
              <span
                class="carousel-control-next-icon"
                aria-hidden="true"
              ></span>
              <span class="visually-hidden">Siguiente</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Pie de página -->
  <div class="row">
    <div class="col-12 bg-dark p-3 text-white">Pie de página</div>
  </div>
</div>
```

## Práctica 3: Componentes

### Ejercicio 1: Alerta en div verde (Ya implementado en el ejercicio anterior)

```html
<!-- Alerta para colocar dentro del div de color verde (sidebar) -->
<div class="alert alert-success" role="alert">
  Este es un mensaje de alerta con clase alert-success. ¡La operación fue
  exitosa!
</div>
```

### Ejercicio 2: Botón y Modal (Ya implementado en el ejercicio anterior)

Implementado en el sidebar en el ejercicio anterior.

### Ejercicio 3: Cards (Ya implementado en el ejercicio anterior)

Implementado en el contenido principal en el ejercicio anterior.

### Ejercicio 4: Slider (Ya implementado en el ejercicio anterior)

Implementado en el rectángulo celeste en el ejercicio anterior.

### Ejercicio 5: Formulario de contacto

```html
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Formulario de Contacto</title>
    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
  </head>
  <body>
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header bg-primary text-white">
              <h4 class="mb-0">Formulario de Contacto</h4>
            </div>
            <div class="card-body">
              <form>
                <div class="mb-3">
                  <label for="nombre" class="form-label">Nombre</label>
                  <input
                    type="text"
                    class="form-control"
                    id="nombre"
                    placeholder="Ingrese su nombre"
                  />
                </div>

                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input
                    type="email"
                    class="form-control"
                    id="email"
                    placeholder="Ingrese su email"
                  />
                </div>

                <div class="mb-3">
                  <label for="telefono" class="form-label">Teléfono</label>
                  <input
                    type="text"
                    class="form-control"
                    id="telefono"
                    placeholder="Ingrese su teléfono"
                  />
                </div>

                <div class="mb-3">
                  <label for="asunto" class="form-label">Asunto</label>
                  <input
                    type="text"
                    class="form-control"
                    id="asunto"
                    placeholder="Ingrese el asunto"
                  />
                </div>

                <div class="mb-3">
                  <label for="mensaje" class="form-label">Mensaje</label>
                  <textarea
                    class="form-control"
                    id="mensaje"
                    rows="5"
                    placeholder="Escriba su mensaje aquí"
                  ></textarea>
                </div>

                <button type="submit" class="btn btn-primary">
                  Enviar Mensaje
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
```
