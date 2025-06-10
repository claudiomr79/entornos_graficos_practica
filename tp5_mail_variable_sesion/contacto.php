<!DOCTYPE html>
<html>

<head>
    <title>Contacto - Consultas al Webmaster</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }

        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #007cba;
            outline: none;
        }

        button {
            background-color: #007cba;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        button:hover {
            background-color: #005a8b;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .required {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>📧 Contacto</h1>
        <p>¿Tienes alguna consulta o sugerencia? Envíanos un mensaje y te responderemos a la brevedad.</p>

        <?php
        if ($_POST) {
            // Validar campos
            $errores = [];

            $nombre = trim($_POST['nombre']);
            $email = trim($_POST['email']);
            $asunto = trim($_POST['asunto']);
            $tipo_consulta = $_POST['tipo_consulta'];
            $mensaje = trim($_POST['mensaje']);

            // Validaciones
            if (empty($nombre)) {
                $errores[] = "El nombre es obligatorio";
            }

            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errores[] = "Email inválido o vacío";
            }

            if (empty($asunto)) {
                $errores[] = "El asunto es obligatorio";
            }

            if (empty($mensaje)) {
                $errores[] = "El mensaje es obligatorio";
            }

            // Si no hay errores, enviar email
            if (empty($errores)) {
                $webmaster_email = "webmaster@ejemplo.com";
                $asunto_completo = "[$tipo_consulta] $asunto";

                // Cuerpo del mensaje HTML
                $cuerpo = "
                <html>
                <head>
                    <title>Consulta desde el sitio web</title>
                </head>
                <body>
                    <h2>Nueva consulta desde el sitio web</h2>
                    <table border='1' cellpadding='10' style='border-collapse: collapse;'>
                        <tr>
                            <td><strong>Nombre:</strong></td>
                            <td>$nombre</td>
                        </tr>
                        <tr>
                            <td><strong>Email:</strong></td>
                            <td>$email</td>
                        </tr>
                        <tr>
                            <td><strong>Tipo de consulta:</strong></td>
                            <td>$tipo_consulta</td>
                        </tr>
                        <tr>
                            <td><strong>Asunto:</strong></td>
                            <td>$asunto</td>
                        </tr>
                    </table>
                    
                    <h3>Mensaje:</h3>
                    <div style='border: 1px solid #ccc; padding: 15px; background-color: #f9f9f9;'>
                        " . nl2br(htmlspecialchars($mensaje)) . "
                    </div>
                    
                    <hr>
                    <p><small>Enviado el " . date('d/m/Y H:i:s') . " desde el formulario de contacto</small></p>
                </body>
                </html>
                ";

                // Cabeceras
                $cabeceras = "MIME-Version: 1.0" . "\r\n";
                $cabeceras .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $cabeceras .= "From: $nombre <$email>" . "\r\n";
                $cabeceras .= "Reply-To: $email" . "\r\n";

                // Enviar correo
                if (mail($webmaster_email, $asunto_completo, $cuerpo, $cabeceras)) {
                    echo "<div class='success'>
                            <strong>✓ Mensaje enviado exitosamente</strong><br>
                            Gracias por contactarnos, $nombre. Responderemos a tu consulta lo antes posible.
                          </div>";

                    // Limpiar variables para el formulario
                    $nombre = $email = $asunto = $mensaje = "";
                    $tipo_consulta = "General";
                } else {
                    echo "<div class='error'>
                            <strong>✗ Error al enviar el mensaje</strong><br>
                            Por favor, inténtalo nuevamente o contacta directamente al webmaster.
                          </div>";
                }
            } else {
                // Mostrar errores
                echo "<div class='error'>";
                echo "<strong>Errores encontrados:</strong><ul>";
                foreach ($errores as $error) {
                    echo "<li>$error</li>";
                }
                echo "</ul></div>";
            }
        }
        ?>

        <form method="post">
            <div class="form-group">
                <label>Nombre completo <span class="required">*</span></label>
                <input type="text" name="nombre" value="<?php echo isset($nombre) ? htmlspecialchars($nombre) : ''; ?>"
                    required>
            </div>

            <div class="form-group">
                <label>Email <span class="required">*</span></label>
                <input type="email" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>"
                    required>
            </div>

            <div class="form-group">
                <label>Tipo de consulta</label>
                <select name="tipo_consulta">
                    <option value="General" <?php echo (isset($tipo_consulta) && $tipo_consulta == 'General') ? 'selected' : ''; ?>>Consulta General</option>
                    <option value="Soporte Técnico" <?php echo (isset($tipo_consulta) && $tipo_consulta == 'Soporte Técnico') ? 'selected' : ''; ?>>Soporte Técnico</option>
                    <option value="Sugerencia" <?php echo (isset($tipo_consulta) && $tipo_consulta == 'Sugerencia') ? 'selected' : ''; ?>>Sugerencia</option>
                    <option value="Reporte de Error" <?php echo (isset($tipo_consulta) && $tipo_consulta == 'Reporte de Error') ? 'selected' : ''; ?>>Reporte de Error</option>
                    <option value="Otros" <?php echo (isset($tipo_consulta) && $tipo_consulta == 'Otros') ? 'selected' : ''; ?>>Otros</option>
                </select>
            </div>

            <div class="form-group">
                <label>Asunto <span class="required">*</span></label>
                <input type="text" name="asunto" value="<?php echo isset($asunto) ? htmlspecialchars($asunto) : ''; ?>"
                    required>
            </div>

            <div class="form-group">
                <label>Mensaje <span class="required">*</span></label>
                <textarea name="mensaje" rows="6" placeholder="Describe tu consulta detalladamente..."
                    required><?php echo isset($mensaje) ? htmlspecialchars($mensaje) : ''; ?></textarea>
            </div>

            <button type="submit">📤 Enviar Consulta</button>
        </form>

        <hr>
        <p><small>Los campos marcados con <span class="required">*</span> son obligatorios.</small></p>
    </div>
</body>

</html>