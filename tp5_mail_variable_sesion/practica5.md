# Soluciones Práctica PHP N°5
## Función mail() y Variables de sesión

---

## **EJERCICIO 1: Script para enviar correo HTML**

### Script básico para envío de correo con formato HTML:

```php
<?php
// ejercicio1_mail_html.php

// Configuración del correo
$destinatario = "destinatario@ejemplo.com";
$asunto = "Correo con formato HTML";

// Cuerpo del mensaje en HTML
$cuerpo = "
<html>
<head>
    <title>Correo de prueba</title>
</head>
<body>
    <h1 style='color: blue;'>¡Hola desde PHP!</h1>
    <p>Este es un correo electrónico con <strong>formato HTML</strong>.</p>
    <p>Puedes incluir:</p>
    <ul>
        <li>Texto formateado</li>
        <li><a href='https://www.ejemplo.com'>Enlaces</a></li>
        <li>Imágenes</li>
        <li>Tablas</li>
    </ul>
    <hr>
    <p><em>Enviado desde mi script PHP</em></p>
</body>
</html>
";

// Cabeceras para correo HTML
$cabeceras = "MIME-Version: 1.0" . "\r\n";
$cabeceras .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$cabeceras .= "From: remitente@ejemplo.com" . "\r\n";
$cabeceras .= "Reply-To: noreply@ejemplo.com" . "\r\n";

// Enviar el correo
if (mail($destinatario, $asunto, $cuerpo, $cabeceras)) {
    echo "Correo enviado exitosamente.";
} else {
    echo "Error al enviar el correo.";
}
?>
```

### Versión mejorada con formulario:

```php
<!DOCTYPE html>
<html>
<head>
    <title>Envío de Correo HTML</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, textarea { width: 100%; padding: 8px; border: 1px solid #ccc; }
        button { background-color: #007cba; color: white; padding: 10px 20px; border: none; cursor: pointer; }
        .success { color: green; }
        .error { color: red; }
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
        $cabeceras .= "From: $nombre <noreply@ejemplo.com>" . "\r\n";
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
```

---

## **EJERCICIO 2: Página de Contacto**

```php
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
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
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
        input, textarea, select {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }
        input:focus, textarea:focus, select:focus {
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
                <input type="text" name="nombre" value="<?php echo isset($nombre) ? htmlspecialchars($nombre) : ''; ?>" required>
            </div>
            
            <div class="form-group">
                <label>Email <span class="required">*</span></label>
                <input type="email" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" required>
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
                <input type="text" name="asunto" value="<?php echo isset($asunto) ? htmlspecialchars($asunto) : ''; ?>" required>
            </div>
            
            <div class="form-group">
                <label>Mensaje <span class="required">*</span></label>
                <textarea name="mensaje" rows="6" placeholder="Describe tu consulta detalladamente..." required><?php echo isset($mensaje) ? htmlspecialchars($mensaje) : ''; ?></textarea>
            </div>
            
            <button type="submit">📤 Enviar Consulta</button>
        </form>
        
        <hr>
        <p><small>Los campos marcados con <span class="required">*</span> son obligatorios.</small></p>
    </div>
</body>
</html>
```

---

## **EJERCICIO 3: Recomendar sitio a un amigo**

```php
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
            box-shadow: 0 5px 20px rgba(0,0,0,0.2);
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
        input, textarea {
            width: 100%;
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }
        input:focus, textarea:focus {
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
            if (empty($tu_nombre)) $errores[] = "Tu nombre es obligatorio";
            if (empty($tu_email) || !filter_var($tu_email, FILTER_VALIDATE_EMAIL)) {
                $errores[] = "Tu email es inválido";
            }
            if (empty($amigo_nombre)) $errores[] = "El nombre de tu amigo es obligatorio";
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
                    <input type="text" name="tu_nombre" value="<?php echo isset($tu_nombre) ? htmlspecialchars($tu_nombre) : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label>Tu email</label>
                    <input type="email" name="tu_email" value="<?php echo isset($tu_email) ? htmlspecialchars($tu_email) : ''; ?>" required>
                </div>
            </div>
            
            <h3>👥 Datos de tu amigo</h3>
            <div class="form-row">
                <div class="form-group">
                    <label>Nombre de tu amigo</label>
                    <input type="text" name="amigo_nombre" value="<?php echo isset($amigo_nombre) ? htmlspecialchars($amigo_nombre) : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label>Email de tu amigo</label>
                    <input type="email" name="amigo_email" value="<?php echo isset($amigo_email) ? htmlspecialchars($amigo_email) : ''; ?>" required>
                </div>
            </div>
            
            <div class="form-group">
                <label>💌 Mensaje personal (opcional)</label>
                <textarea name="mensaje_personal" rows="4" placeholder="Escribe un mensaje personal para tu amigo..."><?php echo isset($mensaje_personal) ? htmlspecialchars($mensaje_personal) : ''; ?></textarea>
            </div>
            
            <button type="submit">🚀 Enviar Recomendación</button>
        </form>
        
        <div class="preview">
            <h3>📧 Vista previa del email</h3>
            <p>Tu amigo recibirá un email atractivo con tu recomendación, tu mensaje personal y un enlace directo al sitio.</p>
        </div>
    </div>
</body>
</html>
```

---

## **EJERCICIO 4: Contador de páginas visitadas**

### Página principal (index.php):
```php
<?php
session_start();

// Inicializar contador si no existe
if (!isset($_SESSION['paginas_visitadas'])) {
    $_SESSION['paginas_visitadas'] = 0;
    $_SESSION['historial'] = [];
    $_SESSION['hora_inicio'] = date('H:i:s');
}

// Incrementar contador
$_SESSION['paginas_visitadas']++;

// Agregar página actual al historial
$pagina_actual = basename($_SERVER['PHP_SELF']);
$_SESSION['historial'][] = [
    'pagina' => $pagina_actual,
    'hora' => date('H:i:s'),
    'timestamp' => time()
];

?>
<!DOCTYPE html>
<html>
<head>
    <title>Inicio - Contador de Páginas</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f7fa;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            padding: 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 10px;
        }
        .stats {
            display: flex;
            justify-content: space-around;
            margin: 20px 0;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
        }
        .stat-item {
            text-align: center;
        }
        .stat-number {
            font-size: 2em;
            font-weight: bold;
            color: #667eea;
        }
        .navigation {
            margin: 20px 0;
            text-align: center;
        }
        .navigation a {
            display: inline-block;
            margin: 5px 10px;
            padding: 10px 20px;
            background-color: #667eea;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .navigation a:hover {
            background-color: #5a67d8;
        }
        .historial {
            margin-top: 20px;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #e9ecef;
            border-radius: 8px;
        }
        .historial h3 {
            margin-top: 0;
            color: #495057;
        }
        .historial-item {
            padding: 10px;
            margin: 5px 0;
            background-color: #f8f9fa;
            border-left: 4px solid #667eea;
            border-radius: 4px;
        }
        .botones-accion {
            text-align: center;
            margin: 20px 0;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 5px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
        }
        .btn-warning {
            background-color: #ffc107;
            color: #212529;
        }
        .btn-danger {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🏠 Página Principal</h1>
            <p>Sistema de seguimiento de navegación</p>
        </div>
        
        <div class="stats">
            <div class="stat-item">
                <div class="stat-number"><?php echo $_SESSION['paginas_visitadas']; ?></div>
                <div>Páginas Visitadas</div>
            </div>
            <div class="stat-item">
                <div class="stat-number"><?php echo count(array_unique(array_column($_SESSION['historial'], 'pagina'))); ?></div>
                <div>Páginas Únicas</div>
            </div>
            <div class="stat-item">
                <div class="stat-number"><?php echo $_SESSION['hora_inicio']; ?></div>
                <div>Sesión Iniciada</div>
            </div>
        </div>
        
        <div class="navigation">
            <h3>🧭 Navegar por el sitio:</h3>
            <a href="pagina1.php">📄 Página 1</a>
            <a href="pagina2.php">📄 Página 2</a>
            <a href="pagina3.php">📄 Página 3</a>
            <a href="about.php">ℹ️ Acerca de</a>
            <a href="contacto.php">📞 Contacto</a>
        </div>
        
        <div class="botones-accion">
            <a href="reset_session.php" class="btn btn-warning">🔄 Reiniciar Contador</a>
            <a href="destroy_session.php" class="btn btn-danger">🗑️ Terminar Sesión</a>
        </div>
        
        <div class="historial">
            <h3>📋 Historial de Navegación</h3>
            <?php if (count($_SESSION['historial']) > 0): ?>
                <?php foreach (array_reverse($_SESSION['historial']) as $index => $visita): ?>
                    <div class="historial-item">
                        <strong><?php echo $visita['pagina']; ?></strong> - 
                        Visitada a las <?php echo $visita['hora']; ?>
                        <?php if ($index == 0): ?>
                            <span style="color: #28a745; font-weight: bold;">(Actual)</span>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No hay historial disponible.</p>
            <?php endif; ?>
        </div>
        
        <div style="margin-top: 30px; padding: 15px; background-color: #e9ecef; border-radius: 5px; font-size: 14px;">
            <strong>ℹ️ Información de la sesión:</strong><br>
            ID de Sesión: <?php echo session_id(); ?><br>
            Hora actual: <?php echo date('H:i:s'); ?><br>
            Tiempo de sesión: <?php echo gmdate('H:i:s', time() - strtotime($_SESSION['hora_inicio'])); ?>
        </div>
    </div>
</body>
</html>
```

### Páginas adicionales para navegar:

**pagina1.php:**
```php
<?php
session_start();

if (!isset($_SESSION['paginas_visitadas'])) {
    $_SESSION['paginas_visitadas'] = 0;
    $_SESSION['historial'] = [];
    $_SESSION['hora_inicio'] = date('H:i:s');
}

$_SESSION['paginas_visitadas']++;
$_SESSION['historial'][] = [
    'pagina' => basename($_SERVER['PHP_SELF']),
    'hora' => date('H:i:s'),
    'timestamp' => time()
];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Página 1 - Contador de Páginas</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 0 auto; padding: 20px; }
        .container { background-color: #f8f9fa; padding: 30px; border-radius: 10px; }
        .header { background-color: #28a745; color: white; padding: 20px; border-radius: 10px; text-align: center; }
        .stats { background-color: #d4edda; padding: 15px; border-radius: 5px; margin: 20px 0; }
        .navigation a { display: inline-block; margin: 5px; padding: 10px 15px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📄 Página 1</h1>
            <p>Contenido de la primera página</p>
        </div>
        
        <div class="stats">
            <strong>📊 Estadísticas:</strong><br>
            Total de páginas visitadas: <?php echo $_SESSION['paginas_visitadas']; ?><br>
            Páginas únicas: <?php echo count(array_unique(array_column($_SESSION['historial'], 'pagina'))); ?>
        </div>
        
        <div class="navigation">
            <a href="index.php">🏠 Inicio</a>
            <a href="pagina2.php">📄 Página 2</a>
            <a href="pagina3.php">📄 Página 3</a>
            <a href="about.php">ℹ️ Acerca de</a>
            <a href="contacto.php">📞 Contacto</a>
        </div>
        
        <div style="margin-top: 20px; padding: 15px; background-color: white; border-radius: 5px;">
            <h3>🎯 Contenido de la Página 1</h3>
            <p>Esta es la primera página de nuestro sitio web. Aquí puedes encontrar información importante sobre nuestros servicios.</p>
            <p>Cada vez que visitas una página, el contador se incrementa y se registra en tu historial de navegación.</p>
        </div>
    </div>
</body>
</html>
```

**reset_session.php:**
```php
<?php
session_start();

// Reiniciar solo el contador, mantener la sesión
$_SESSION['paginas_visitadas'] = 1; // 1 porque esta página cuenta como visita
$_SESSION['historial'] = [[
    'pagina' => basename($_SERVER['PHP_SELF']),
    'hora' => date('H:i:s'),
    'timestamp' => time()
]];
$_SESSION['hora_inicio'] = date('H:i:s');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Contador Reiniciado</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 50px auto; padding: 20px; }
        .container { text-align: center; background-color: #fff3cd; padding: 30px; border-radius: 10px; border: 1px solid #ffeaa7; }
        .btn { display: inline-block; padding: 10px 20px; margin: 10px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>🔄 Contador Reiniciado</h1>
        <p>El contador de páginas visitadas ha sido reiniciado exitosamente.</p>
        <p>Páginas visitadas: <strong><?php echo $_SESSION['paginas_visitadas']; ?></strong></p>
        <a href="index.php" class="btn">🏠 Volver al Inicio</a>
    </div>
</body>
</html>
```

**destroy_session.php:**
```php
<?php
session_start();

// Guardar estadísticas antes de destruir
$total_paginas = $_SESSION['paginas_visitadas'] ?? 0;
$tiempo_sesion = isset($_SESSION['hora_inicio']) ? 
    gmdate('H:i:s', time() - strtotime($_SESSION['hora_inicio'])) : '00:00:00';

// Destruir la sesión
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sesión Terminada</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 50px auto; padding: 20px; }
        .container { text-align: center; background-color: #f8d7da; padding: 30px; border-radius: 10px; border: 1px solid #f5c6cb; }
        .stats { background-color: #d1ecf1; padding: 20px; border-radius: 5px; margin: 20px 0; }
        .btn { display: inline-block; padding: 10px 20px; margin: 10px; background-color: #28a745; color: white; text-decoration: none; border-radius: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>🗑️ Sesión Terminada</h1>
        <p>Tu sesión ha sido terminada exitosamente.</p>
        
        <div class="stats">
            <h3>📊 Resumen de tu sesión:</h3>
            <p>Total de páginas visitadas: <strong><?php echo $total_paginas; ?></strong></p>
            <p>Tiempo de sesión: <strong><?php echo $tiempo_sesion; ?></strong></p>
        </div>
        
        <p>¡Gracias por visitar nuestro sitio!</p>
        <a href="index.php" class="btn">🆕 Iniciar Nueva Sesión</a>
    </div>
</body>
</html>
```



