<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'Conexion_BD/bd.php'; // Conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['token'])) {
    $token = htmlspecialchars($_GET['token']);

    try {
        // Verificar si el token existe y no está confirmado en la tabla mensaje
        $stmt = $conn->prepare("SELECT id, correo, nombre, mensaje, confirmado FROM mensajes WHERE token = ? AND confirmado = 0");
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Si el token es válido, recuperar los datos
            $row = $result->fetch_assoc();
            $id = $row['id'];
            $correo = $row['correo'];
            $nombre = $row['nombre'];
            $mensaje = $row['mensaje'];

            // Actualizar el campo confirmado a 1 (confirmado) para ese token
            $stmtUpdate = $conn->prepare("UPDATE mensajes SET confirmado = 1 WHERE token = ?");
            $stmtUpdate->bind_param("s", $token);
            $stmtUpdate->execute();

            if ($stmtUpdate->affected_rows > 0) {
                // Enviar un correo de confirmación al administrador
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = 'smtp.hostinger.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'angeltech@caisolutions.store';
                $mail->Password = '|7FqW@>hH';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port = 465;

                $mail->setFrom('angeltech@caisolutions.store', 'Angel Tech');
                $mail->addAddress('angeltech@caisolutions.store', 'Angel Tech');
                $mail->addReplyTo($correo, $nombre);
                $mail->Subject = "Solicitud Confirmada - Correo: $correo";

                $cuerpoMensaje = "
                <h3>Solicitud de informacion</h3>
                <p><strong>Cliente:</strong> $nombre</p>
                <p><strong>Correo Electronico del cliente:</strong> $correo</p>
                <p><strong>Mensaje:</strong><br>$mensaje</p>";

                // Modificar el cuerpo del correo para incluir nombre, correo y mensaje
                $mail->isHTML(true);
                $mail->Body = "El usuario $nombre ha pasado la verificacion de seguridad.\n\n\n$cuerpoMensaje";


                if ($mail->send()) {
                    echo "<!DOCTYPE html>
                    <html lang='en'>
                    <head>
                        <meta charset='UTF-8'>
                        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                        <title>Éxito</title>
                        <link rel='apple-touch-icon' sizes='180x180' href='white_on_trans.png' />
                        <link rel='icon' type='image/png' sizes='32x32' href='white_on_trans.png' />
                        <link rel='icon' type='image/png' sizes='16x16' href='white_on_trans.png' />
                        <style>
                            body {
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                height: 100vh;
                                margin: 0;
                                background-color: #f8f9fa;
                                font-family: 'Inter', Arial, sans-serif;
                            }
                            .success-container {
                                text-align: center;
                                background: #ffffff;
                                border-radius: 10px;
                                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                                padding: 2rem;
                                max-width: 400px;
                                width: 90%;
                                animation: fadeIn 0.5s ease-in-out;
                            }
                            .success-container h1 {
                                font-size: 1.8rem;
                                color: #28a745;
                                margin-bottom: 1rem;
                            }
                            .success-container p {
                                color: #6c757d;
                                margin-bottom: 1rem;
                            }
                            .success-icon {
                                font-size: 3rem;
                                color: #28a745;
                                margin-bottom: 1rem;
                            }
                            @keyframes fadeIn {
                                from {
                                    opacity: 0;
                                    transform: scale(0.9);
                                }
                                to {
                                    opacity: 1;
                                    transform: scale(1);
                                }
                            }
                        </style>
                    </head>
                    <body>
                        <div class='success-container'>
                            <div class='success-icon'>&#10004;</div>
                            <h1>¡Solicitud Confirmada!</h1>
                            <p>Tu correo ha sido enviado correctamente.</p>
                            <p>Ya puedes cerrar esta pestaña.</p>
                        </div>
                    </body>
                    </html>";
                } else {
                    echo "<!DOCTYPE html>
                    <html lang='en'>
                    <head>
                        <meta charset='UTF-8'>
                        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                        <title>Error</title>
                        <link rel='apple-touch-icon' sizes='180x180' href='white_on_trans.png' />
                        <link rel='icon' type='image/png' sizes='32x32' href='white_on_trans.png' />
                        <link rel='icon' type='image/png' sizes='16x16' href='white_on_trans.png' />
                        <style>
                            body {
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                height: 100vh;
                                margin: 0;
                                background-color: #f8f9fa;
                                font-family: 'Inter', Arial, sans-serif;
                            }
                            .error-container {
                                text-align: center;
                                background: #ffffff;
                                border-radius: 10px;
                                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                                padding: 2rem;
                                max-width: 400px;
                                width: 90%;
                                animation: fadeIn 0.5s ease-in-out;
                            }
                            .error-container h1 {
                                font-size: 1.8rem;
                                color: #dc3545;
                                margin-bottom: 1rem;
                            }
                            .error-container p {
                                color: #6c757d;
                                margin-bottom: 1rem;
                            }
                            .error-icon {
                                font-size: 3rem;
                                color: #dc3545;
                                margin-bottom: 1rem;
                            }
                            @keyframes fadeIn {
                                from {
                                    opacity: 0;
                                    transform: scale(0.9);
                                }
                                to {
                                    opacity: 1;
                                    transform: scale(1);
                                }
                            }
                        </style>
                    </head>
                    <body>
                        <div class='error-container'>
                            <div class='error-icon'>&#10006;</div>
                            <h1>¡Error!</h1>
                            <p>Hubo un problema al enviar su correo.</p>
                            <p>Por favor, intenta nuevamente más tarde.</p>
                        </div>
                    </body>
                    </html>";
                }
            } else {
                echo "<!DOCTYPE html>
                <html lang='en'>
                <head>
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title>Error</title>
                    <link rel='apple-touch-icon' sizes='180x180' href='white_on_trans.png' />
                    <link rel='icon' type='image/png' sizes='32x32' href='white_on_trans.png' />
                    <link rel='icon' type='image/png' sizes='16x16' href='white_on_trans.png' />
                    <style>
                        body {
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            height: 100vh;
                            margin: 0;
                            background-color: #f8f9fa;
                            font-family: 'Inter', Arial, sans-serif;
                        }
                        .error-container {
                            text-align: center;
                            background: #ffffff;
                            border-radius: 10px;
                            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                            padding: 2rem;
                            max-width: 400px;
                            width: 90%;
                            animation: fadeIn 0.5s ease-in-out;
                        }
                        .error-container h1 {
                            font-size: 1.8rem;
                            color: #dc3545;
                            margin-bottom: 1rem;
                        }
                        .error-container p {
                            color: #6c757d;
                            margin-bottom: 1rem;
                        }
                        .error-icon {
                            font-size: 3rem;
                            color: #dc3545;
                            margin-bottom: 1rem;
                        }
                        @keyframes fadeIn {
                            from {
                                opacity: 0;
                                transform: scale(0.9);
                            }
                            to {
                                opacity: 1;
                                transform: scale(1);
                            }
                        }
                    </style>
                </head>
                <body>
                    <div class='error-container'>
                        <div class='error-icon'>&#10006;</div>
                        <h1>¡Error!</h1>
                        <p>Error al confirmar el token en la base de datos !</p>
                        <p>Por favor, intenta nuevamente más tarde.</p>
                    </div>
                </body>
                </html>";
            }
        } else {
            echo "<!DOCTYPE html>
                <html lang='en'>
                <head>
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title>Error</title>
                    <link rel='apple-touch-icon' sizes='180x180' href='white_on_trans.png' />
                    <link rel='icon' type='image/png' sizes='32x32' href='white_on_trans.png' />
                    <link rel='icon' type='image/png' sizes='16x16' href='white_on_trans.png' />
                    <style>
                        body {
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            height: 100vh;
                            margin: 0;
                            background-color: #f8f9fa;
                            font-family: 'Inter', Arial, sans-serif;
                        }
                        .error-container {
                            text-align: center;
                            background: #ffffff;
                            border-radius: 10px;
                            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                            padding: 2rem;
                            max-width: 400px;
                            width: 90%;
                            animation: fadeIn 0.5s ease-in-out;
                        }
                        .error-container h1 {
                            font-size: 1.8rem;
                            color: #dc3545;
                            margin-bottom: 1rem;
                        }
                        .error-container p {
                            color: #6c757d;
                            margin-bottom: 1rem;
                        }
                        .error-icon {
                            font-size: 3rem;
                            color: #dc3545;
                            margin-bottom: 1rem;
                        }
                        @keyframes fadeIn {
                            from {
                                opacity: 0;
                                transform: scale(0.9);
                            }
                            to {
                                opacity: 1;
                                transform: scale(1);
                            }
                        }
                    </style>
                </head>
                <body>
                    <div class='error-container'>
                        <div class='error-icon'>&#10006;</div>
                        <h1>¡Error!</h1>
                        <p>Ya has confirmado tu correo, espera nuestra respuesta !</p>
                        <p>Ya puedes cerrar esta pestaña.</p>
                    </div>
                </body>
                </html>";
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