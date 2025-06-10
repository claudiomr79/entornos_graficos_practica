<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // ejercicio1_mail_html.php
    
    // Configuración del correo
    $destinatario = "claudiomr79@gmail.com";
    $asunto = "Correo con formato HTML";

    // Cuerpo del mensaje en HTML
    $cuerpo = "
                <html>
                <head>
                    <title>Correo de prueba</title>
                </head>
                <body>
                    <h1 style='color: blue;'>¡Hola desde PHP!</h1>
                    <p>Este es un correo de prueba enviado desde un script PHP.</p>
                    <hr>
                </body>
                </html>
                ";

    // Cabeceras para correo HTML
    $cabeceras = "MIME-Version: 1.0" . "\r\n";
    $cabeceras .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $cabeceras .= "From: claudiomr79@gmail.com" . "\r\n";
    $cabeceras .= "Reply-To: claudiomr79@gmail.com" . "\r\n";

    // Enviar el correo
    if (mail($destinatario, $asunto, $cuerpo, $cabeceras)) {
        echo "Correo enviado exitosamente.";
    } else {
        echo "Error al enviar el correo.";
    }
    ?>
</body>

</html>