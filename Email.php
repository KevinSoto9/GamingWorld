<?php

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

    require 'vendor/phpmailer/phpmailer/src/Exception.php';
    require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require 'vendor/phpmailer/phpmailer/src/SMTP.php';

function procesarCompra($usuarioID) {
  $output = "";

  require 'bd.php';
  $selCarrito = "SELECT cj.juegoID, j.nombre, cj.precio, cj.cantidad 
                 FROM carrito_juegos cj 
                 INNER JOIN juegos j ON cj.juegoID = j.juegoID 
                 WHERE cj.carritoID IN (SELECT carritoID FROM carrito WHERE usuarioID = :usuarioID)";
  $stmtCarrito = $bd->prepare($selCarrito);
  $stmtCarrito->bindParam(':usuarioID', $usuarioID);
  $stmtCarrito->execute();
  $carrito = $stmtCarrito->fetchAll(PDO::FETCH_ASSOC);

  if (empty($carrito)) {
    $output .= "El carrito está vacío. No hay nada que procesar.";
    return $output;
  }

  $output .= "Detalles de la compra:\n";
  $output .= "Nombre del Juego | Precio | Cantidad\n";

  $total = 0;

  foreach ($carrito as $item) {
    $nombreJuego = $item['nombre'];
    $precio = $item['precio'];
    $cantidad = $item['cantidad'];

    $subtotal = $precio * $cantidad;
    $total += $subtotal;

    $output .= "$nombreJuego | $precio | $cantidad unidades\n";
  }

  $output .= "Total de la compra: $total";

  // Eliminar los elementos del carrito de la base de datos
  $delCarrito = "DELETE FROM carrito_juegos WHERE carritoID IN (SELECT carritoID FROM carrito WHERE usuarioID = :usuarioID)";
  $stmtDelCarrito = $bd->prepare($delCarrito);
  $stmtDelCarrito->bindParam(':usuarioID', $usuarioID);
  $stmtDelCarrito->execute();

  return $output;
}


function enviarCorreoCompra($usuarioID) {
    
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; 
    $mail->SMTPAuth = true;
    $mail->Username = 'zoidel97@gmail.com'; 
    $mail->Password = 'zham llez etie fggc'; 
    $mail->SMTPSecure = 'tls'; 
    $mail->Port = 587; 

    $mail->setFrom('zoidel97@gmail.com');

    require 'bd.php'; 
    $selEmail = "SELECT Email FROM usuarios WHERE UsuarioID = :usuarioID";
    $stmtEmail = $bd->prepare($selEmail);
    $stmtEmail->bindParam(':usuarioID', $usuarioID);
    $stmtEmail->execute();
    $email = $stmtEmail->fetchColumn();


    $mail->addAddress($email);

    $mail->Subject = 'Compra realizada correctamente';
    $mail->isHTML(false); 
    $mail->Body = "Tu compra ha sido procesada con éxito.\n\n";
    $mail->Body .= procesarCompra($usuarioID);

    try {

        $mail->send();
        
        header("Location: PagPrincipal.php");
    } catch (Exception $e) {
        echo 'Error al enviar correo electrónico: ', $e->getMessage();
    }
}

$usuarioID = $_SESSION['UsuarioID'];
enviarCorreoCompra($usuarioID);
