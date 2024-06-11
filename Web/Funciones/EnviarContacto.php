<?php

//Archivos de PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/phpmailer/phpmailer/src/Exception.php';
require '../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../../vendor/phpmailer/phpmailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST['nombre']);
    $email = htmlspecialchars($_POST['email']);
    $asunto = htmlspecialchars($_POST['asunto']);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'zoidel97@gmail.com';
    $mail->Password = 'zham llez etie fggc';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Configuración del remitente y receptor
    $mail->setFrom($email);
    $mail->addAddress('KevinS9sotob@hotmail.com');

    // Contenido del correo
    $mail->isHTML(true);
    $mail->Subject = $asunto;
    $mail->Body = "<h3>Nuevo mensaje de contacto</h3>
                          <p><strong>Nombre:</strong> $nombre</p>
                          <p><strong>Direccion de Correo:</strong> $email</p>
                          <p><strong>Mensaje:</strong><br>$mensaje</p>";

    $mail->send();

    header("Location: ../PaginasPrincipales/PagPrincipal.php");
}
?>
