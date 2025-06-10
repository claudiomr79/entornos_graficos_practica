<!DOCTYPE html>
<html>

<head>
    <title>Recomienda nuestro sitio</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 700px;
            margin: 0 auto;
            padding: 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }

        .container {
            background-color: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
        }

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 10px;
        }

        .subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-row {
            display: flex;
            gap: 15px;
        }

        .form-row .form-group {
            flex: 1;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        input:focus,
        textarea:focus {
            border-color: #667eea;
            outline: none;
        }

        button {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            transition: transform 0.2s;
        }

        button:hover {
            transform: translateY(-2px);
        }

        .success {
            background-color: #d4edda;
            color: #155724;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .preview {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 20px;
            margin: 20px 0;
        }

        .preview h3 {
            margin-top: 0;
            color: #495057;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>🌟 ¡Recomienda nuestro sitio!</h1>
        <p class="subtitle">Ayúdanos a crecer compartiendo nuestro sitio con tus amigos</p>

        <?php
        if ($_POST) {
            // Validar datos
            $errores = [];

            $tu_nombre = trim($_POST['tu_nombre']);
            $tu_email = trim($_POST['tu_email']);
            $amigo_nombre = trim($_POST['amigo_nombre']);
            $amigo_email = trim($_POST['amigo_email']);
            $mensaje_personal = trim($_POST['mensaje_personal']);

            // Validaciones
            if (empty($tu_nombre))
                $errores[] = "Tu nombre es obligatorio";
            if (empty($tu_email) || !filter_var($tu_email, FILTER_VALIDATE_EMAIL)) {
                $errores[] = "Tu email es inválido";
            }
            if (empty($amigo_nombre))
                $errores[] = "El nombre de tu amigo es obligatorio";
            if (empty($amigo_email) || !filter_var($amigo_email, FILTER_VALIDATE_EMAIL)) {
                $errores[] = "El email de tu amigo es inválido";
            }

            // Si no hay errores, enviar recomendación
            if (empty($errores)) {
                $sitio_nombre = "Mi Sitio Web Fantástico";
                $sitio_url = "https://www.ejemplo.com";
                $asunto = "$tu_nombre te recomienda visitar $sitio_nombre";

                // Mensaje personalizado o predeterminado
                if (empty($mensaje_personal)) {
                    $mensaje_personal = "¡Hola! Encontré este sitio web increíble y pensé que te podría interesar. ¡Échale un vistazo!";
                }

                // Cuerpo del email
                $cuerpo = "
                <html>
                <head>
                    <title>Recomendación de sitio web</title>
                    <style>
                        body { font-family: Arial, sans-serif; line-height: 1.6; }
                        .header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 20px; text-align: center; }
                        .content { padding: 20px; }
                        .recommendation { background-color: #f8f9fa; padding: 20px; border-left: 4px solid #667eea; margin: 20px 0; }
                        .site-info { background-color: #e3f2fd; padding: 15px; border-radius: 8px; margin: 20px 0; }
                        .button { display: inline-block; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 12px 25px; text-decoration: none; border-radius: 5px; margin: 10px 0; }
                        .footer { font-size: 12px; color: #666; border-top: 1px solid #ddd; padding-top: 20px; margin-top: 20px; }
                    </style>
                </head>
                <body>
                    <div class='header'>
                        <h1>🌟 ¡$tu_nombre te recomienda algo genial!</h1>
                    </div>
                    
                    <div class='content'>
                        <h2>¡Hola $amigo_nombre!</h2>
                        
                        <div class='recommendation'>
                            <p><strong>Mensaje de $tu_nombre:</strong></p>
                            <p><em>\"" . nl2br(htmlspecialchars($mensaje_personal)) . "\"</em></p>
                        </div>
                        
                        <div class='site-info'>
                            <h3>📍 Sitio recomendado: $sitio_nombre</h3>
                            <p>Tu amigo $tu_nombre piensa que este sitio te va a encantar.</p>
                            <a href='$sitio_url' class='button'>🚀 Visitar sitio ahora</a>
                        </div>
                        
                        <p>¡Esperamos que disfrutes explorando el sitio tanto como nosotros!</p>
                        
                        <div class='footer'>
                            <p>Este mensaje fue enviado por $tu_nombre ($tu_email) el " . date('d/m/Y H:i:s') . "</p>
                            <p>Si no deseas recibir más recomendaciones, puedes contactar directamente a tu amigo.</p>
                        </div>
                    </div>
                </body>
                </html>
                ";

                // Cabeceras
                $cabeceras = "MIME-Version: 1.0" . "\r\n";
                $cabeceras .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $cabeceras .= "From: $tu_nombre <noreply@ejemplo.com>" . "\r\n";
                $cabeceras .= "Reply-To: $tu_email" . "\r\n";

                // Enviar correo
                if (mail($amigo_email, $asunto, $cuerpo, $cabeceras)) {
                    echo "<div class='success'>
                            <h3>🎉 ¡Recomendación enviada!</h3>
                            <p>Tu recomendación ha sido enviada exitosamente a <strong>$amigo_nombre</strong> ($amigo_email).</p>
                            <p>¡Gracias por ayudarnos a crecer!</p>
                          </div>";

                    // Limpiar formulario
                    $tu_nombre = $tu_email = $amigo_nombre = $amigo_email = $mensaje_personal = "";
                } else {
                    echo "<div class='error'>
                            <strong>❌ Error al enviar</strong><br>
                            No pudimos enviar la recomendación. Por favor, inténtalo nuevamente.
                          </div>";
                }
            } else {
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
            <h3>📝 Tus datos</h3>
            <div class="form-row">
                <div class="form-group">
                    <label>Tu nombre</label>
                    <input type="text" name="tu_nombre"
                        value="<?php echo isset($tu_nombre) ? htmlspecialchars($tu_nombre) : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label>Tu email</label>
                    <input type="email" name="tu_email"
                        value="<?php echo isset($tu_email) ? htmlspecialchars($tu_email) : ''; ?>" required>
                </div>
            </div>

            <h3>👥 Datos de tu amigo</h3>
            <div class="form-row">
                <div class="form-group">
                    <label>Nombre de tu amigo</label>
                    <input type="text" name="amigo_nombre"
                        value="<?php echo isset($amigo_nombre) ? htmlspecialchars($amigo_nombre) : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label>Email de tu amigo</label>
                    <input type="email" name="amigo_email"
                        value="<?php echo isset($amigo_email) ? htmlspecialchars($amigo_email) : ''; ?>" required>
                </div>
            </div>

            <div class="form-group">
                <label>💌 Mensaje personal (opcional)</label>
                <textarea name="mensaje_personal" rows="4"
                    placeholder="Escribe un mensaje personal para tu amigo..."><?php echo isset($mensaje_personal) ? htmlspecialchars($mensaje_personal) : ''; ?></textarea>
            </div>

            <button type="submit">🚀 Enviar Recomendación</button>
        </form>

        <div class="preview">
            <h3>📧 Vista previa del email</h3>
            <p>Tu amigo recibirá un email atractivo con tu recomendación, tu mensaje personal y un enlace directo al
                sitio.</p>
        </div>
    </div>
</body>

</html>