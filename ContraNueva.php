<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
require 'bd.php'; // Conexión a la base de datos

$message = '';

function generarNuevaContrasena($longitud = 8) {
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $caracteresLong = strlen($caracteres);
    $contrasena = '';
    for ($i = 0; $i < $longitud; $i++) {
        $contrasena .= $caracteres[rand(0, $caracteresLong - 1)];
    }
    return $contrasena;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    try {
        // Comprobar si el correo electrónico existe en la base de datos
        $selEmail = "SELECT UsuarioID FROM usuarios WHERE Email = :email";
        $stmtEmail = $bd->prepare($selEmail);
        $stmtEmail->bindParam(':email', $email);
        $stmtEmail->execute();
        $usuarioID = $stmtEmail->fetchColumn();

        if ($usuarioID) {
            // Generar una nueva contraseña
            $newPassword = generarNuevaContrasena();

            // Actualizar la nueva contraseña en la base de datos
            $update_query = "UPDATE usuarios SET Password = :password WHERE UsuarioID = :usuarioID";
            $stmtUpdate = $bd->prepare($update_query);
            $stmtUpdate->bindParam(':password', $newPassword); // Utilizamos la contraseña generada directamente
            $stmtUpdate->bindParam(':usuarioID', $usuarioID);
            $stmtUpdate->execute();

            // Enviar el correo electrónico con la nueva contraseña
            $mail = new PHPMailer(true);
             $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'zoidel97@gmail.com';
            $mail->Password = 'zham llez etie fggc';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('zoidel97@gmail.com');
            $mail->addAddress($email);

            $mail->Subject = 'Correo de Nueva Clave de tu cuenta de GamingWorld';
            $mail->Body = "Tu nueva clave es: $newPassword";

            $mail->send();
            $message = 'La nueva contraseña ha sido enviada a tu correo electrónico.';
        } else {
            $message = 'El correo electrónico no está registrado.';
        }
    } catch (Exception $e) {
        $message = 'Error al enviar el correo electrónico: ' . $e->getMessage();
    } catch (PDOException $e) {
        $message = 'Error al actualizar la contraseña en la base de datos: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recuperar Contraseña</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/cssPlus/cssPlus.css">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h1 class="text-center">Recuperar Contraseña</h1>
            <?php if ($message): ?>
                <p class="text-center text-info"><?php echo htmlspecialchars($message); ?></p>
            <?php endif; ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                <a href="index.php" class="btn btn-secondary btn-block">Volver</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
