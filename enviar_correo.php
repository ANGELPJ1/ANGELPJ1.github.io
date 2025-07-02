<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'Conexion_BD/bd.php'; // Conexión a la base de datos

session_start(); // Iniciar sesión para usar variables de sesión

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = htmlspecialchars($_POST['nombre']);
    $correo = htmlspecialchars($_POST['correo']);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    try {
        // Generar el token
        $token = bin2hex(random_bytes(16)); // Token de 32 caracteres

        // Insertar en la tabla mensajes con el token
        $stmt = $conn->prepare("INSERT INTO mensajes (nombre, correo, mensaje, token, confirmado) VALUES (?, ?, ?, ?, 0)");
        $stmt->bind_param("ssss", $nombre, $correo, $mensaje, $token);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            // Preparar el enlace de confirmación
            // Local
            $urlConfirmacion = "http://192.168.0.242/Consultoria/confirmar_correo.php?token=" . $token;

            // Servidor
            //$urlConfirmacion = "https://angeltech.caisolutions.store/confirmar_correo.php?token=" . $token;

            // Enviar correo con el token
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.hostinger.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'angeltech@caisolutions.store';
            $mail->Password = '|7FqW@>hH';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            $mail->setFrom('angeltech@caisolutions.store', 'Angel Tech');
            $mail->addAddress($correo, $nombre);
            $mail->isHTML(true);
            $mail->Subject = "Confirmación de Correo Electrónico";
            $mail->CharSet = 'UTF-8'; // Asegura que los caracteres se envíen correctamente
            $mail->Encoding = 'base64'; // Codifica el contenido correctamente
            $mail->isHTML(true); // Especifica que el correo es HTML
            $mail->AddEmbeddedImage('white_on_trans.png', 'logo_cid');
            $mail->Body = "
<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <title>Confirmación de Correo</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f4; }
        .container { max-width: 600px; margin: 20px auto; background: #1e1e1e; padding: 20px; border-radius: 10px; color: #ffffff; }
        .header { text-align: center; padding: 10px 0; }
        .header img { max-width: 200px; display: block; margin: 0 auto; }
        .content { text-align: center; padding: 20px; }
        h3 { color: #ffffff; }
        p { color: #bbbbbb; line-height: 1.6; }
        .btn { display: inline-block; background-color: #d9534f; color: white; padding: 12px 20px; text-decoration: none; font-weight: bold; border-radius: 5px; margin-top: 20px; }
        .footer { text-align: center; padding: 10px; font-size: 12px; color: #777; }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <h3 style='color: white; margin-bottom: 10px;'>Angel Tech</h3>
            <hr style='border: 1px solid white; margin: 0 20px;'>
        </div>
        
        <div class='content'>
            <h3>Confirmación de Correo Electrónico</h3>
            <p>Hola <b>$nombre</b>,</p>
            <p>Gracias por contactarme. Para continuar con la gestión, por favor confirma tu correo electrónico haciendo clic en el siguiente botón:</p>
            <a class='btn' href='$urlConfirmacion'>Confirmar Correo</a>
            <p>Si el botón no funciona, puedes copiar y pegar el siguiente enlace en tu navegador:</p>
            <p><a href='$urlConfirmacion' style='color:#d9534f;'>$urlConfirmacion</a></p>
        </div>
        <div class='footer'>
            <p>&copy; 2025 Angel Tech. Todos los derechos reservados.</p>
        </div>
    </div>
</body>
</html>";

            // Enviar correo
            if ($mail->send()) {
                // Redirigir con éxito y guardar estado en la sesión
                $_SESSION['status'] = 'success';
                header("Location: index.php#FormularioCorreo");
                exit();
            } else {
                // Redirigir con error y guardar estado en la sesión
                $_SESSION['status'] = 'error';
                header("Location: index.php#FormularioCorreo");
                exit();
            }

        } else {
            echo "Error al almacenar el mensaje en la base de datos.";
        }
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Acceso no permitido.";
}
?>