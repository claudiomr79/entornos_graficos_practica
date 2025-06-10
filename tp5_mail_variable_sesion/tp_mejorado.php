<!DOCTYPE html>
<html>

<head>
    <title>Envío de Correo HTML</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input,
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
        }

        button {
            background-color: #007cba;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        .success {
            color: green;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>
    <h1>Enviar Correo HTML</h1>

    <?php
    if ($_POST) {
        $destinatario = $_POST['destinatario'];
        $asunto = $_POST['asunto'];
        $nombre = $_POST['nombre'];
        $mensaje = $_POST['mensaje'];

        // Crear cuerpo HTML
        $cuerpo = "
        <html>
        <head>
            <title>$asunto</title>
        </head>
        <body>
            <h2>Mensaje de $nombre</h2>
            <div style='border: 1px solid #ccc; padding: 15px; margin: 10px 0;'>
                $mensaje
            </div>
            <hr>
            <p><small>Enviado desde el formulario web</small></p>
        </body>
        </html>
        ";

        // Cabeceras
        $cabeceras = "MIME-Version: 1.0" . "\r\n";
        $cabeceras .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $cabeceras .= "From: $nombre <claudiomr79@gmail.com>" . "\r\n";
        $cabeceras .= "Reply-To: $destinatario" . "\r\n";

        // Enviar correo
        if (mail($destinatario, $asunto, $cuerpo, $cabeceras)) {
            echo "<p class='success'>✓ Correo enviado exitosamente a $destinatario</p>";
        } else {
            echo "<p class='error'>✗ Error al enviar el correo</p>";
        }
    }
    ?>

    <form method="post">
        <div class="form-group">
            <label>Destinatario:</label>
            <input type="email" name="destinatario" required>
        </div>

        <div class="form-group">
            <label>Tu nombre:</label>
            <input type="text" name="nombre" required>
        </div>

        <div class="form-group">
            <label>Asunto:</label>
            <input type="text" name="asunto" required>
        </div>

        <div class="form-group">
            <label>Mensaje:</label>
            <textarea name="mensaje" rows="6" required></textarea>
        </div>

        <button type="submit">Enviar Correo</button>
    </form>
</body>

</html>